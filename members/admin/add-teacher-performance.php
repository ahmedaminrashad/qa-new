<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
$tid =$_REQUEST['t_id'];
$t_link =$_REQUEST['t_link'];
$month =$_REQUEST['mon'];
$year =$_REQUEST['yyy'];
$ddd = ''.$year.'-'.$month.'-01';
$last_date = date("Y-m-t", strtotime($ddd));
function attendence_p($m, $y, $t)
{
$sql = "SELECT * FROM teacher_attendance Where MONTH(date) = $m AND YEAR(date) = $y AND teacher_id = $t";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
$att_p = 100-($numberOfRows*3.33);
echo number_format($att_p, 2);
}

function classes_p($t)
{
$sql = "SELECT * FROM sched Where teacher_id = $t");
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo number_format($numberOfRows, 2);
}

function test_p($m, $y, $t)
{
$sql = "SELECT * FROM test_results Where MONTH(test_date) = $m AND YEAR(test_date) = $y AND teacher_id = $t AND status_id = 2";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
$sql = "select sum(teacher_p) from test_results Where MONTH(test_date) = $m AND YEAR(test_date) = $y AND teacher_id = $t AND status_id = 2";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$t = $row[0];
$avg = $t/$numberOfRows;
echo number_format($avg, 2);
}

function complaint_p($m, $y, $t)
{
$sql = "SELECT * FROM complaint Where MONTH(date1) = $m AND YEAR(date1) = $y AND teacher_id = $t";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
$com_p = 100-($numberOfRows*10);
echo number_format($com_p, 2);
}
if (isset($_POST['genSubmit'])) 
  	{ 		
		 	$p_att= $_POST['att'];
		 	$p_test= $_POST['test'];
		 	$p_comp= $_POST['comp'];
		 	$p_teach= $_POST['teach'];
		 	$p_lan= $_POST['lan'];
		 	$p_sub= $_POST['sub'];
		 	$p_aten= $_POST['aten'];
		 	$p_dress= $_POST['dress'];
		 	$p_bav= $_POST['bav'];
		 	$p_decl= $_POST['decl'];
		 	$p_link= $_POST['link_id'];
		 	$p_tid= $_POST['tech_id'];
		 	$p_date= $_POST['date'];
		 	$p_classes= $_POST['classes'];
		 	$p_ldate= $_POST['l_date'];
			$sql = "INSERT INTO teacher_performance_c (teacher_id, 	user_id, date, attendence, test, teaching, language, subject, attentiveness, dress_code, behaviour, discipline, complaints, last_date, classes)
					VALUES('$p_tid', '1', '$p_date', '$p_att', '$p_test', '$p_teach', '$p_lan', '$p_sub', '$p_aten', '$p_dress', '$p_bav', '$p_decl', '$p_comp', '$p_ldate', '$p_classes')"; 
					 if ($conn->query($sql) === TRUE) {header(
			 	"Location: $p_link");
			 	}
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Add Country';
$page_subtitle = 'You are adding a country!';
$table_name = 'Add Country';
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
                                    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
										<div class="form-group">
										<label>Attendence Performance</label>
										<div>
										<input type="text" value="<?php echo attendence_p("$month", "$year", "$tid"); ?>" name="att" id="att" class="form-control input-circle" readonly>
									</div>
									</div>
										<div class="form-group">
										<label>Test Performance</label>
										<div>
										<input type="text" value="<?php echo test_p("$month", "$year", "$tid"); ?>" name="test" id="test" class="form-control input-circle" readonly>
									</div>
									</div>
										<div class="form-group">
										<label>Classes/Week</label>
										<div>
										<input type="text" value="<?php echo classes_p("$tid"); ?>" name="classes" id="classes" class="form-control input-circle" readonly>
									</div>
									</div>
										<div class="form-group">
										<label>Complaints Records</label>
										<div>
										<input type="text" value="<?php echo complaint_p("$month", "$year", "$tid"); ?>" name="comp" id="comp" class="form-control input-circle" readonly>
									</div>
									</div>
										<div class="form-group">
										<label>Teaching Skills</label>
										<div>
											<div class="noUi-gree noUi-connect" id="slider1">
											</div>
											<input required type="text" placeholder="e.g. Pakistan" name="teach" id="slider1-span" class="form-control input-circle">
										</div>
									</div>
										<div class="form-group">
										<label>Language Skills</label>
										<div>
											<div class="noUi-gree noUi-connect" id="slider4">
											</div>
											<input required type="text" placeholder="e.g. Pakistan" name="lan" id="slider4-span" class="form-control input-circle">
										</div>
									</div>
										<div class="form-group">
										<label>Subject Knowledge</label>
										<div>
											<div class="noUi-gree noUi-connect" id="slider5">
											</div>
											<input required type="text" placeholder="e.g. Pakistan" name="sub" id="slider5-span" class="form-control input-circle">
										</div>
									</div>
										<div class="form-group">
										<label>Attentiveness</label>
										<div>
											<div class="noUi-bm noUi-connect" id="slider2">
											</div>
											<input required type="text" placeholder="e.g. Pakistan" name="aten" id="slider2-span" class="form-control input-circle">
										</div>
									</div>
										<div class="form-group">
										<label>Dress Code</label>
										<div>
											<div class="noUi-warning noUi-connect" id="slider6">
											</div>
											<input required type="text" placeholder="e.g. Pakistan" name="dress" id="slider6-span" class="form-control input-circle">
										</div>
									</div>
										<div class="form-group">
										<label>Behaviour</label>
										<div>
											<div class="noUi-danger noUi-connect" id="slider3">
											</div>
											<input required type="text" placeholder="e.g. Pakistan" name="bav" id="slider3-span" class="form-control input-circle">
										</div>
									</div>
										<div class="form-group">
										<label>Discipline</label>
										<div>
											<div class="noUi-bch noUi-connect" id="slider7">
											</div>
											<input required type="text" placeholder="e.g. Pakistan" name="decl" id="slider7-span" class="form-control input-circle">
											<a href="javascript:;" id="slider2-btn" class="btn btn-success" style="float:right;margin:20px 0 0">Lock</a>
										</div>
									</div>
												<input type="hidden" value="<?php echo $t_link; ?>" name="link_id" id="link_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $tid; ?>" name="tech_id" id="tech_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $sy; ?>" name="date" id="date" class="form-control input-circle">
												<input type="hidden" value="<?php echo $last_date; ?>" name="l_date" id="l_date" class="form-control input-circle">
											<?php
	$sql = "SELECT * FROM teacher_performance_c where teacher_id = '$tid' and MONTH(last_date) = '$month' AND YEAR(last_date) = '$year'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Submit</button>
                                </div>';
			}
		elseif ($numberOfRows > 0) 
			{
			echo '<span class="label label-sm label-success">Already Generated</span>';
				}
?>
										</form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
<script src="../assets/global/plugins/nouislider/jquery.nouislider.all.js"></script>
<script src="../assets/admin/pages/scripts/components-nouisliders.js"></script>
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features  // set current page
   ComponentsNoUiSliders.init();
});
</script>