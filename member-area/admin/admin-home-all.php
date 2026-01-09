<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

// Check if dbconnection exists
if (!file_exists("../includes/dbconnection.php")) {
    die("Database configuration file not found. Please contact administrator.");
}

include("../includes/session1.php");
require("../includes/dbconnection.php");

// Load mysql compatibility layer
require_once("../includes/mysql-compat.php");

// Verify database connection
if (!isset($conn) || !$conn instanceof mysqli) {
    die("Database connection not available. Please contact administrator.");
}

date_default_timezone_set("Africa/Cairo");
$data_date1 = date('Y-m-d', strtotime('now +1 hour'));

// Sanitize input
$date_get = isset($_REQUEST['date']) ? trim($_REQUEST['date']) : '';
$load = isset($_REQUEST['load']) ? (int)$_REQUEST['load'] : 0;
$pteacher = isset($_REQUEST['pteacher']) ? (int)$_REQUEST['pteacher'] : 0;

// Validate date format
if (!empty($date_get)) {
    // Validate date format YYYY-MM-DD
    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date_get)) {
        $data_date = $date_get;
    } else {
        $data_date = $data_date1;
        error_log("Invalid date format: " . $date_get);
    }
} else {
    $data_date = $data_date1;
}

// Only process load if not exporting
if ($load && $load==1 && (!isset($_REQUEST['export']) || $_REQUEST['export'] != '1')){
    $date=$data_date;
    $day = (int)date('N', strtotime($date)); // Ensure integer
    $date_escaped = db_escape($date);
    mysql_query("DELETE FROM class_history WHERE status < 18 AND monitor_id = 1 AND date_admin = '$date_escaped'") or die(mysql_error());
    $result = mysql_query("SELECT * FROM sched WHERE aday_id = $day") or die(mysql_error());
    if (!$result)
    {
        die("Query to show fields from table failed");
    }
    $numberOfRows = MYSQL_NUMROWS($result);
    If ($numberOfRows == 0)
    {
        // Don't echo anything during export
        if (!isset($_REQUEST['export']) || $_REQUEST['export'] != '1') {
            echo '';
        }
    }
    else if ($numberOfRows > 0)
    {
        while($row = mysql_fetch_assoc($result))
        {
            $id = $row['sched_id'];
            $dif=$row['day_id']-$row['aday_id'];
            if($dif == 6){$a1 = -1;}
            elseif($dif == -6){$a1 = 1;}
            else {$a1 = $dif;}
            $difs=$row['sday_id']-$row['aday_id'];
            if($difs == 6){$a2 = -1;}
            elseif($difs == -6){$a2 = 1;}
            else {$a2 = $difs;}
            $teacher_day = date('Y-m-d',strtotime("".$date." ".$a1." days"));
            $student_day = date('Y-m-d',strtotime("".$date." ".$a2." days"));
            $id_escaped = (int)$id; // Ensure integer
            $date_escaped = db_escape($date);
            $teacher_day_escaped = db_escape($teacher_day);
            $student_day_escaped = db_escape($student_day);
            mysql_query("UPDATE sched SET create_date_admin = '$date_escaped', create_date_teacher = '$teacher_day_escaped', create_date_student = '$student_day_escaped' WHERE sched_id = $id_escaped") or die(mysql_error());
        }
    }
    $day_escaped = (int)$day; // Ensure integer
    mysql_query("INSERT INTO class_history(uni, parent_id, course_id, teacher_id, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration, dept_id, adept_id, status, date_admin, date_student, date_teacher)
	SELECT sched_id, parent_id, course_id, teacher_id, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration, dept_id, adept_id, status, create_date_admin, create_date_student, create_date_teacher
	FROM sched WHERE aday_id = $day_escaped AND NOT EXISTS  (SELECT * FROM class_history WHERE class_history.date_admin = sched.create_date_admin AND class_history.uni = sched.sched_id);") or die(mysql_error());
}

// Handle CSV export - MUST be before any HTML output or includes that output content
if (isset($_REQUEST['export']) && $_REQUEST['export'] == '1') {
    // Clean all existing output buffers
    while (ob_get_level()) {
        ob_end_clean();
    }
    
    // Set headers for CSV download FIRST (before any includes or output)
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="admin-home-all-' . $data_date . '.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    
    // Start output buffering to catch any accidental output from includes
    ob_start();
    
    $sy = date('Y-m-d', strtotime('now +1 hour'));
    $mm_id = date('m', strtotime('now +1 hour'));
    $yy_id = date('Y', strtotime('now +1 hour'));
    include("monitoring-functions.php");
    
    // Discard any output from the include
    ob_end_clean();
    
    $data_date_escaped = db_escape($data_date);
    $export_pteacher = isset($_REQUEST['pteacher']) ? (int)$_REQUEST['pteacher'] : 0;
    
    // Open output stream
    $output = fopen('php://output', 'w');
    
    // Add BOM for UTF-8 (helps with Excel)
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
    
    // CSV Headers
    fputcsv($output, array('A-Time', 'T-Time', 'S-Time', 'Online Time', 'Student', 'Teacher', 'Status', 'Duration'));
    
    // Fetch data
    if ($export_pteacher) {
        $export_result = mysql_query("SELECT * FROM `class_history` WHERE date_admin = '$data_date_escaped' AND teacher_id = $export_pteacher ORDER BY start_time_A");
    } else {
        $export_result = mysql_query("SELECT * FROM `class_history` WHERE date_admin = '$data_date_escaped' ORDER BY start_time_A");
    }
    
    if ($export_result) {
        while ($row = mysql_fetch_assoc($export_result)) {
            $admin_timeS = $row['start_time_A'];
            $admin_timeE = $row['end_time_A'];
            $student_timeS = $row['start_time_S'];
            $teacher_timeS = $row['time_start'];
            $teacher_timeE = $row['time_end'];
            $duration = $row['duration'];
            $teacher_id = $row['teacher_id'];
            $student_id = $row['course_id'];
            $monitor = $row['monitor_id'];
            $status = $row['status'];
            $re_status = $row['re_status'];
            $wa = $row['activation'];
            
            // Format times
            $a_time = date("g:i a", strtotime($admin_timeS));
            if (!empty($admin_timeE) && !empty($admin_timeS)) {
                $startTime = new DateTime($admin_timeS);
                $endTime = new DateTime($admin_timeE);
                $duration_obj = $startTime->diff($endTime);
                $a_time .= ' (' . $duration_obj->format("%H:%I") . ')';
            }
            
            $t_time = date("g:i a", strtotime($teacher_timeS)) . ' - ' . date("g:i a", strtotime($teacher_timeE));
            $s_time = date("g:i a", strtotime($student_timeS));
            
            // Get names using existing functions (they echo, so we capture output)
            ob_start();
            StudentName("$student_id");
            $student_name = ob_get_clean();
            
            ob_start();
            TeacherName("$teacher_id");
            $teacher_name = ob_get_clean();
            
            ob_start();
            MonitorName("$monitor", "$status", "$re_status");
            $status_name = strip_tags(ob_get_clean()); // Remove HTML tags from status
            
            // Write CSV row
            fputcsv($output, array(
                $a_time,
                $t_time,
                $s_time,
                $wa,
                $student_name,
                $teacher_name,
                $status_name,
                $duration
            ));
        }
    }
    
    fclose($output);
    exit(); // Exit immediately to prevent any further output
}

$sy = date('Y-m-d', strtotime('now +1 hour'));
$mm_id = date('m', strtotime('now +1 hour'));
$yy_id = date('Y', strtotime('now +1 hour'));
include("monitoring-functions.php");

// Check if header file exists
if (!file_exists("header.php")) {
    die("Header file not found: header.php");
}

include("header.php");

if (!function_exists('ttm')) {
function ttm($t1, $t2)
{
    $startTime = new DateTime($t1);
    $endTime = new DateTime($t2);
    $duration = $startTime->diff($endTime); //$duration is a DateInterval object
    echo $duration->format("%H:%I");
}
}

?>
<?php echo $main_header; ?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $search_bar; ?>
<?php echo $main_menu; ?>
    <head>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $("#search-box").keyup(function () {
                    $.ajax({
                        type: "POST",
                        url: "readCountry.php",
                        data: 'keyword=' + $(this).val(),
                        beforeSend: function () {
                            $("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                        },
                        success: function (data) {
                            $("#suggesstion-box").show();
                            $("#suggesstion-box").html(data);
                            $("#search-box").css("background", "#FFF");
                        }
                    });
                });
            });

            function selectCountry(val) {
                $("#search-box").val(val);
                $("#suggesstion-box").hide();
            }
        </script>
    </head>
    <!-- BEGIN PAGE CONTAINER -->
    <div class="page-container">
        <!-- BEGIN PAGE HEAD -->
        <div class="page-head">
            <div class="container">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>Admin Home<small> Today's Classes</small></h1>
                </div>
                <!-- END PAGE TITLE -->
                <!-- BEGIN PAGE TOOLBAR -->
                <div class="page-toolbar">
                </div>
                <!-- END PAGE TOOLBAR -->
            </div>
        </div>
        <!-- END PAGE HEAD -->
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content">
            <div class="container">

                <!-- BEGIN PAGE BREADCRUMB -->
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="admin-home">Home</a><i class="fa fa-circle"></i>
                    </li>
                    <li class="active">
                        Current Day Class Progress
                    </li>
                </ul>
                <!-- END PAGE BREADCRUMB -->
                <!-- BEGIN PAGE CONTENT INNER -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="row">
                            <div class="tiles">
                                <a href="admin-home-all?date=<?php echo $data_date; ?>">
                                    <div class="tile bg-blue-hoki">
                                        <div class="tile-body">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Total
                                            </div>
                                            <div class="number">
                                                <?php                                                 $data_date_escaped = db_escape($data_date);
                                                $result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date_escaped'");
                                                if (!$result) {
                                                    die("Query to show fields from table failed");
                                                }
                                                $rnumberOfRows = MYSQL_NUMROWS($result);
                                                echo $rnumberOfRows; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="admin-home-taken-classes?date=<?php echo $data_date; ?>">
                                    <div class="tile bg-green-haze">
                                        <div class="tile-body">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Taken
                                            </div>
                                            <div class="number">
                                                <?php echo today("$data_date", "9"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="admin-home-remaining-classes?date=<?php echo $data_date; ?>">
                                    <div class="tile bg-red-intense">
                                        <div class="tile-body">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Remaining
                                            </div>
                                            <div class="number">
                                                <?php echo today("$data_date", "1"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="admin-home-running-classes?date=<?php echo $data_date; ?>">
                                    <div class="tile bg-yellow-crusta">
                                        <div class="tile-body">
                                            <i class="fa fa-asterisk"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Running
                                            </div>
                                            <div class="number">
                                                <?php echo today("$data_date", "3"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="admin-home-absents?date=<?php echo $data_date; ?>">
                                    <div class="tile bg-red">
                                        <div class="tile-body">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Absent
                                            </div>
                                            <div class="number">
                                                <?php echo today("$data_date", "4"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="admin-home-leaves?date=<?php echo $data_date; ?>">
                                    <div class="tile bg-blue-madison">
                                        <div class="tile-body">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Leave
                                            </div>
                                            <div class="number">
                                                <?php echo today("$data_date", "5"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="admin-home-declined?date=<?php echo $data_date; ?>">
                                    <div class="tile bg-grey-cascade">
                                        <div class="tile-body">
                                            <i class="fa fa-ban"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Declined
                                            </div>
                                            <div class="number">
                                                <?php echo today("$data_date", "6"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="admin-home-suspended?date=<?php echo $data_date; ?>">
                                    <div class="tile bg-red-thunderbird">
                                        <div class="tile-body">
                                            <i class="fa fa-frown-o"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Suspended
                                            </div>
                                            <div class="number">
                                                <?php $data_date_escaped = db_escape($data_date);
                                                $result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date_escaped' AND status = 17");
                                                if (!$result) {
                                                    die("Query to show fields from table failed");
                                                }
                                                $rnumberOfRows = MYSQL_NUMROWS($result);
                                                echo $rnumberOfRows; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="admin-home-on-trial?date=<?php echo $data_date; ?>">
                                    <div class="tile bg-yellow-gold">
                                        <div class="tile-body">
                                            <i class="fa fa-headphones"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Trial
                                            </div>
                                            <div class="number">
                                                <?php $data_date_escaped = db_escape($data_date);
                                                $result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date_escaped' AND status = 11");
                                                if (!$result) {
                                                    die("Query to show fields from table failed");
                                                }
                                                $rnumberOfRows = MYSQL_NUMROWS($result);
                                                echo $rnumberOfRows; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="admin-home-advance?date=<?php echo $data_date; ?>">
                                    <div class="tile bg-purple-medium">
                                        <div class="tile-body">
                                            <i class="fa fa-smile-o"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Advance
                                            </div>
                                            <div class="number">
                                                <?php $data_date_escaped = db_escape($data_date);
                                                $result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date_escaped' AND status = 19");
                                                if (!$result) {
                                                    die("Query to show fields from table failed");
                                                }
                                                $rnumberOfRows = MYSQL_NUMROWS($result);
                                                echo $rnumberOfRows; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="admin-home-rescheduled?date=<?php echo $data_date; ?>">
                                    <div class="tile bg-green-jungle">
                                        <div class="tile-body">
                                            <i class="fa fa-repeat"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Re-Scheduled
                                            </div>
                                            <div class="number">
                                                <?php $data_date_escaped = db_escape($data_date);
                                                $result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date_escaped' AND status = 20");
                                                if (!$result) {
                                                    die("Query to show fields from table failed");
                                                }
                                                $rnumberOfRows = MYSQL_NUMROWS($result);
                                                echo $rnumberOfRows; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="list-of-active-students">
                                    <div class="tile bg-purple-seance">
                                        <div class="tile-body">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Students
                                            </div>
                                            <div class="number">
                                                <?php
                                                // sending query
                                                $result = mysql_query("SELECT * FROM course WHERE nature = 1");
                                                if (!$result) {
                                                    die("Query to show fields from table failed");
                                                }
                                                $rnumberOfRows = MYSQL_NUMROWS($result);
                                                echo $rnumberOfRows; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="test_status">
                                    <div class="tile bg-purple-seance">
                                        <div class="tile-body">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Created
                                            </div>
                                            <div class="number">
                                                <?php
                                                // sending query
                                                $mm_id_escaped = (int)$mm_id; // Ensure integer
                                                $yy_id_escaped = (int)$yy_id; // Ensure integer
                                                $result = mysql_query("SELECT * FROM test_results WHERE MONTH(test_date) = $mm_id_escaped AND YEAR(test_date) = $yy_id_escaped");
                                                if (!$result) {
                                                    die("Query to show fields from table failed");
                                                }
                                                $anumberOfRows = MYSQL_NUMROWS($result);
                                                echo $anumberOfRows; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="test_status">
                                    <div class="tile bg-purple-seance">
                                        <div class="tile-body">
                                            <i class="fa fa-align-center"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Remaining
                                            </div>
                                            <div class="number">
                                                <?php
                                                // sending query
                                                $mm_id_escaped = (int)$mm_id; // Ensure integer
                                                $yy_id_escaped = (int)$yy_id; // Ensure integer
                                                $result = mysql_query("SELECT * FROM test_results WHERE status_id = 2 AND MONTH(test_date) = $mm_id_escaped AND YEAR(test_date) = $yy_id_escaped");
                                                if (!$result) {
                                                    die("Query to show fields from table failed");
                                                }
                                                $lnumberOfRows = MYSQL_NUMROWS($result);
                                                echo $lnumberOfRows; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="test_status">
                                    <div class="tile bg-purple-seance">
                                        <div class="tile-body">
                                            <i class="fa fa-thumbs-o-down"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Refused
                                            </div>
                                            <div class="number">
                                                <?php
                                                // sending query
                                                $mm_id_escaped = (int)$mm_id; // Ensure integer
                                                $yy_id_escaped = (int)$yy_id; // Ensure integer
                                                $result = mysql_query("SELECT * FROM test_results WHERE status_id = 3 AND MONTH(test_date) = $mm_id_escaped AND YEAR(test_date) = $yy_id_escaped");
                                                if (!$result) {
                                                    die("Query to show fields from table failed");
                                                }
                                                $lnumberOfRows = MYSQL_NUMROWS($result);
                                                echo $lnumberOfRows; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="admin-home-current-classes">
                                    <div class="tile bg-blue-chambray">
                                        <div class="tile-body">
                                            <i class="fa fa-repeat"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                See Current Classes
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet light">
                            <div class="portlet-title">
                                <?php $error_results = isset($_REQUEST['err']) ? $_REQUEST['err'] : '';
                                if ($error_results == 1) {
                                    echo '<div class="alert alert-danger">
								<strong>Error!</strong> Please Select atlest one Option.
							</div>';
                                } ?>
                                <form action="admin-home-all.php" class="horizontal-form" method="get">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Class Time</label>
                                                    <select class="form-control" name="time_id" id="time_id">
                                                        <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
                                                        // source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
                                                        $result = mysql_query("SELECT * FROM TimeTable ORDER BY TimeID");
                                                        if ($result) {
                                                            while ($row = mysql_fetch_assoc($result)) { ?>
                                                                <option value="<?php echo htmlspecialchars($row['TimeName']); ?>"><?php echo htmlspecialchars($row['TimeList']); ?></option>
                                                            <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="form-group has-error">
                                                    <label class="control-label">Date</label>
                                                    <input type="date" class="form-control" name="date" id="date" value="<?php echo htmlspecialchars($data_date); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="form-group has-error">
                                                    <label class="control-label">Teacher</label>
                                                    <input type="text" autocomplete="off" name="pteacher" list="cars"
                                                           class="form-control"/>
                                                    <datalist id="cars">
                                                        <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
                                                        // source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
                                                        $result = mysql_query("SELECT * FROM profile WHERE (cat_id = 8 or teacher_rights = 1) and active = 1 and training = 1 ORDER BY teacher_id ");
                                                        if ($result) {
                                                            while ($row = mysql_fetch_assoc($result)) { ?>
                                                                <option value="<?php echo htmlspecialchars($row['teacher_id']); ?>"> <?php echo htmlspecialchars($row['teacher_name']); ?>
                                                                    (<?php echo htmlspecialchars($row['Nationality']); ?> <?php if ($row['g_id'] == 1) {
                                                                        echo 'Male';
                                                                    } else {
                                                                        echo 'Female';
                                                                    } ?>)
                                                                </option>
                                                            <?php }
                                                        } ?>
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="form-actions right">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <button type="button" class="btn blue" id="export-btn" onclick="exportToCSV()">
                                                        <i class="fa fa-download"></i> Export to CSV
                                                    </button>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="portlet-body">
                                <h2><?php $old_date_timestamp = strtotime($data_date);
                                    $new_date = date('l jS F-Y', $old_date_timestamp);
                                    echo '<span class="label label label-success">' . $new_date . '</span>'; ?> <span
                                            class="label label bg-blue-hoki">All Classes</span></h2>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>
                                            A-Time
                                        </th>
                                        <th>
                                            T-Time
                                        </th>
                                        <th>
                                            S-Time
                                        </th>
                                        <th>
                                            Online Time
                                        </th>
                                        <th>
                                            Student
                                        </th>
                                        <th>
                                            History
                                        </th>
                                        <th>
                                            Teacher
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                        <?php
                                        // sending query - sanitize inputs
                                        $data_date_escaped = db_escape($data_date);
                                        if (isset($pteacher) && $pteacher) {
                                            $pteacher_escaped = (int)$pteacher; // Ensure integer
                                            $result = mysql_query("SELECT * FROM `class_history` WHERE date_admin = '$data_date_escaped' AND teacher_id = $pteacher_escaped ORDER BY start_time_A");
                                        } else {
                                            $result = mysql_query("SELECT * FROM `class_history` WHERE date_admin = '$data_date_escaped' ORDER BY start_time_A");
                                        }

                                        if (!$result) {
                                            die("Query to show fields from table failed");
                                        }
                                        $numberOfRows = MYSQL_NUMROWS($result);
                                        if ($numberOfRows == 0)
                                        {
                                            echo '<div class="label label-info">Sorry, no record found!</div><br/>';
                                            if ($data_date){
                                                echo '
 
                                                <a href="?load=1&date=' . $data_date . '" class="label label-info" style="    background: blue;
    padding: 10px;
    margin: 10px;
    display: block;
    width: fit-content;
    font-size: 14px;
    font-weight: bold;
">Hard Load!</a> 
                                                
                                                ';
                                            }


                                        }
                                        else if ($numberOfRows > 0)
                                        {
                                        $i = 0; // Initialize counter for MYSQL_RESULT
                                        while ($row = mysql_fetch_array($result))
                                        {
                                        if ($row['monitor_id'] == '2') //waiting
                                        {
                                            $bgcolor = '#F5A9A9';
                                        } else if ($row['monitor_id'] == '3') //running
                                        {
                                            $bgcolor = '#F2F5A9';
                                        } else if ($row['monitor_id'] == '4') //absent
                                        {
                                            $bgcolor = '#F9BCBC';
                                        } else if ($row['monitor_id'] == '5') //leave
                                        {
                                            $bgcolor = '#C3C3FA';
                                        } else if ($row['monitor_id'] == '6') //declined
                                        {
                                            $bgcolor = '#CEECF5';
                                        } else if ($row['monitor_id'] == '7') //still pending
                                        {
                                            $bgcolor = '#FE642E';
                                        } else if ($row['monitor_id'] == '8') //taken advance
                                        {
                                            $bgcolor = '#D8D8D8';
                                        } else if ($row['monitor_id'] == '9') //taken
                                        {
                                            $bgcolor = '#BCF5A9';
                                        } else {
                                            $bgcolor = '#fffff'; // pending
                                        }
                                        $sched_id = MYSQL_RESULT($result, $i, "history_id");
                                        $admin_timeS = MYSQL_RESULT($result, $i, "start_time_A");
                                        $admin_timeE = MYSQL_RESULT($result, $i, "end_time_A");
                                        $student_timeS = MYSQL_RESULT($result, $i, "start_time_S");
                                        $student_timeE = MYSQL_RESULT($result, $i, "end_time_S");
                                        $teacher_timeS = MYSQL_RESULT($result, $i, "time_start");
                                        $teacher_timeE = MYSQL_RESULT($result, $i, "time_end");
                                        $duration = MYSQL_RESULT($result, $i, "duration");
                                        $teacher_id = MYSQL_RESULT($result, $i, "teacher_id");
                                        $student_id = MYSQL_RESULT($result, $i, "course_id");
                                        $parent_id = MYSQL_RESULT($result, $i, "parent_id");
                                        $monitor = MYSQL_RESULT($result, $i, "monitor_id");// pending, taken, absent, leave, taken advance, running, waiting or still pending
                                        $dept_id = MYSQL_RESULT($result, $i, "dept_id");
                                        $pstr = MYSQL_RESULT($result, $i, "time_s_id");
                                        $wa = MYSQL_RESULT($result, $i, "activation");
                                        $status = MYSQL_RESULT($result, $i, "status");// Regular, Trial, Rescheduled or Suspended
                                        $re_status = MYSQL_RESULT($result, $i, "re_status");
                                        $his_date = MYSQL_RESULT($result, $i, "date_admin");
                                        ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr bgcolor="<?php echo $bgcolor; ?>">
                                        <td>
                                            <?php echo date("g:i a", strtotime($admin_timeS)); ?>
                                            (<?php echo ttm($teacher_timeS, $teacher_timeE); ?>)
                                        </td>
                                        <td>
                                            <?php echo date("g:i a", strtotime($teacher_timeS)); ?>
                                            - <?php echo date("g:i a", strtotime($teacher_timeE)); ?>
                                        </td>
                                        <td>
                                            <?php echo date("g:i a", strtotime($student_timeS)); ?>
                                        </td>
                                        <td>
                                            <?php echo $wa; ?>
                                        </td>
                                        <td>
                                            <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($parent_id); ?>"><?php echo StudentName("$student_id"); ?></a>
                                        </td>
                                        <td>
                                            <a href="history_course?Course_ID=<?php echo base64_encode($student_id); ?>">History</a>
                                        </td>
                                        <td>
                                            <a href="teacher-accounts-profile?profile_no=<?php echo base64_encode($teacher_id); ?>"><?php echo TeacherName("$teacher_id"); ?></a>
                                        </td>
                                        <td>
                                            <a href="history-details?cour=<?php echo $student_id; ?>&adate=<?php echo $his_date; ?>">
                                                <?php echo MonitorName("$monitor", "$status", "$re_status"); ?></a></td>
                                        <td><a href="valid.php?parent_id=<?php echo $sched_id; ?>">
                                                <button type="button" class="btn yellow btn-xs"><i
                                                            class='fa fa-history'></i></button>
                                            </a></td>
                                        <td>  <a class="allocation" href="#allocation-c" data-toggle="modal" data-target="#allocation-c" data-id="<?php echo $sched_id; ?>" data-name="<?php echo StudentName("$student_id"); ?>" data-time="<?php echo time1("$pstr"); ?>"><button type="button" class="btn green btn-xs">Shift</button></a></td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <div class="modal fade bs-modal-lg" id="allocation-c" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">


                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
    </div>

    <!-- END PAGE CONTAINER -->
<?php echo $fot; ?>
<script>
    $('.allocation').click(function(){
        var famID=$(this).attr('data-id');
        var famName=$(this).attr('data-name');
        var famTime=$(this).attr('data-time');

        $.ajax({url:"class-shift.php?famID="+famID+"&famName="+famName+"&famTime="+famTime,cache:false,success:function(result){
                $(".modal-content").html(result);
            }});
    });
    $('.allocation1').click(function(){
        var famID=$(this).attr('data-id');

        $.ajax({url:"class-time-change.php?famID="+famID,cache:false,success:function(result){
                $(".modal-content").html(result);
            }});
    });
    $('.invoicelink').click(function(){
        var famID=$(this).attr('data-id');
        var famAmu=$(this).attr('data-amu');

        $.ajax({url:"class-link-details.php?famID="+famID+"&famAmu="+famAmu,cache:false,success:function(result){
                $(".modal-content").html(result);
            }});
    });
    
    function exportToCSV() {
        var date = $('#date').val();
        var teacher = $('input[name="pteacher"]').val();
        var timeId = $('#time_id').val();
        
        var url = 'admin-home-all.php?export=1';
        
        if (date) {
            url += '&date=' + encodeURIComponent(date);
        }
        
        if (teacher) {
            url += '&pteacher=' + encodeURIComponent(teacher);
        }
        
        if (timeId) {
            url += '&time_id=' + encodeURIComponent(timeId);
        }
        
        window.location.href = url;
    }
</script>
