<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $mm_id =$_REQUEST['month_id'];
  $yy_id =$_REQUEST['year_id'];
  $pT =base64_decode($_GET['ptec']);
  function abc($er)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM sched Where course_id = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<i class="fa fa-exclamation font-red"></i>';
			}
		elseif ($numberOfRows > 0) 
			{
			echo '<i class="fa fa-check font-green"></i>';
			}
	}
function schedule_classes($cr)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM sched Where course_id = $cr";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '0';
			}
		elseif ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			}
	}
function classes($cr, $tr, $mr, $yr, $sr)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM class_history Where course_id = $cr AND teacher_id = $tr AND MONTH(date_admin) = $mr AND YEAR(date_admin) = $yr AND monitor_id = $sr";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '0';
			}
		elseif ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			}
	}
function ratio($cr, $tr, $mr, $yr, $sr)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM class_history Where course_id = $cr AND teacher_id = $tr AND MONTH(date_admin) = $mr AND YEAR(date_admin) = $yr AND monitor_id = $sr";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '0%';
			}
		elseif (tnumberOfRows > 0) 
			{
	$sql = "SELECT * FROM sched Where course_id = $cr";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo 'N-A';
			}
		elseif ($numberOfRows > 0) 
			{
			$total = $numberOfRows*4;
			$rate = $tnumberOfRows/$total;
			$figure = $rate*100;
			echo ''.mb_substr($figure, 0, 5).'%';
			}
			}

	}
function ratio1($cr, $tr, $mr, $yr, $sr)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM class_history Where course_id = $cr AND teacher_id = $tr AND MONTH(date_admin) = $mr AND YEAR(date_admin) = $yr AND monitor_id = $sr";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '#FFFFFF';
			}
		elseif ($numberOfRows > 0) 
			{
	$sql = "SELECT * FROM sched Where course_id = $cr";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '#FFFFFF';
			}
		elseif ($numberOfRows > 0) 
			{
			$total = $numberOfRows*4;
			$rate = $numberOfRows/$total;
			$figure = $rate*100;
			if( $figure >= 25){echo '#BCF5A9';}
			}
			}

	}
  ?>
<?php
function test1($r, $mon, $yyy)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM test_results Where course_id = $r and MONTH(test_date) = $mon AND YEAR(test_date) = $yyy";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<span class="label label-sm label-warning">Nil</span>';
			}
		elseif ($numberOfRows > 0) 
			{
			echo '<span class="label label-sm label-info">Created</span>';
			}
	}
function test2($r, $mon, $yyy)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM test_results Where course_id = $r and MONTH(test_date) = $mon AND YEAR(test_date) = $yyy and status_id = 2";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			echo '<i class="fa fa-check font-green"></i>';
			}
	}
?>
<?php
$page_title = 'Teacher Student List';
$page_subtitle = 'Teacher Student List';
$table_name = 'Teacher Student List';
?>
<?php echo $main_header; ?>
<body>
<?php echo $top_bar_logo; ?>
<?php echo $search_bar; ?>
<?php echo $notification_bar; ?>
<?php echo $main_menu_start; ?>
<?php echo $main_menu; ?>
<?php echo $main_menu_end; ?>
<div class="app-main__outer">
            
            <!-- App inner start-->
                <div class="app-main__inner">
                
                <!-- Page Title Start-->
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                    </i>
                                </div>
                                <div><?php echo $page_title; ?>
                                    <div class="page-title-subheading"><?php echo $page_subtitle; ?>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <!-- Page Title End-->
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
								<th>
									 Sr.No
								</th>
								<th>
									 Student Name
								</th>
								<th>
									 Parent
								</th>
								<th>
									 Country
								</th>
								<th>
									 History
								</th>
								<th>
									 T-L-A-P
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT `course`.*, `account`.`parent_name`, `country`.`c_name` FROM `course`,`account`,`country` WHERE course.parent_id=account.parent_id AND course.c_id=country.c_id HAVING Teacher = $pT";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){				
			$Course_ID = $row['course_id'];
			$course_yrSec = $row['course_yrSec'];
			$pn = $row['parent_name'];
			$pid = $row['parent_id'];
			$pCourse = $row['course_id'];
			$cname = $row['c_name'];
?>
								<tr bgcolor="<?php echo ratio1("$Course_ID", "$pT", "$mm_id", "$yy_id", "9"); ?>">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo abc("$Course_ID"); ?> <a href="student-schedule?pT=<?php echo base64_encode($pCourse); ?>"><?php echo $course_yrSec; ?> (<?php echo $Course_ID; ?>)</a>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $pn; ?>
								</td>
								<td>
									 <?php echo $cname; ?>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($Course_ID); ?>">Daily Progress</a>
								</td>
								<td>
									 <span class="label label-sm label-success" title="Taken Regular"><?php echo classes("$Course_ID", "$pT", "$mm_id", "$yy_id", "9"); ?></span>-<span class="label label-sm label-info" title="Leave"><?php echo classes("$Course_ID", "$pT", "$mm_id", "$yy_id", "5"); ?></span>-<span class="label label-sm label-danger" title="Absent"><?php echo classes("$Course_ID", "$pT", "$mm_id", "$yy_id", "4"); ?></span>-<span class="label label-sm label-warning" title="Pending"><?php echo classes("$Course_ID", "$pT", "$mm_id", "$yy_id", "7"); ?></span>-<span class="label label-sm label-success" title="Classes/Week"><?php echo schedule_classes($Course_ID); ?></span>
								</td>
								<td>
								<a href="student_results?Course_ID=<?php echo base64_encode($Course_ID); ?>&link=<?php echo 'parent-accounts-profile?parent_id='.base64_encode($ppid).''; ?>&name=<?php echo base64_encode($pn); ?>"><?php test1("$Course_ID","$mm_id","$yy_id"); ?><?php test2("$Course_ID","$mm_id","$yy_id"); ?></a>
								</td>
								<td><?php echo ratio("$Course_ID", "$pT", "$mm_id", "$yy_id", "9") ?></td>
								<td><a href="re-add-schedule-local?cou_id=<?php echo $Course_ID; ?>"><span class="label label-sm label-warning" title="Re-Schedule"><i class="fa fa-history"></i></span></a></td>
							</tr>
							<?php 	
		}
	}	
?>
								</tbody>
								</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="invoice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="teacher-class-anylasis-search">
				<input type="hidden" id="ptec" name="ptec"  value="<?php echo base64_encode($pT); ?>" />
                                <div class="form-group">
<label>Month</label>
<div>
<select required class="form-control" name="month_id"  id="month_id">

<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
$sql = "SELECT * FROM month ORDER BY month_id ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){  ?>
<option value="<?php echo $row['num'];?>"><?php echo $row['month_name'];?> </option>
<?php } ?>
</select>
</div>
</div>
<div class="form-group">
<label>Year</label>
<div>
<select required class="form-control" name="year_id"  id="year_id">
<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
$sql = "SELECT * FROM school_yr ORDER BY year_id ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){  ?>
<option value="<?php echo $row['school_year'];?>"><?php echo $row['school_year'];?> </option>
<?php } ?>
</select>
</div>
</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Large modal end  -->