<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
    $pnid =base64_decode($_GET["test_id"]);
	$sql = "SELECT `test_results`.*,`profile`.`teacher_name`,`course`.`course_yrSec`,`month`.`month_name`,`school_yr`.`school_year`,`timestart`.`time_s`,`dept`.`department`,`lan`.`lan_name`,`Gender`.`gender` FROM `test_results`,`profile`,`course`,`month`,`school_yr`,`timestart`,`dept`,`lan`,`Gender` WHERE test_results.teacher_id=profile.teacher_id and test_results.course_id=course.course_id and test_results.m_id=month.month_id and test_results.y_id=school_yr.year_id and test_results.test_time=timestart.time_s_id and test_results.dept_id=dept.dept_id and test_results.lan_id=lan.lan_id and test_results.g_id=Gender.g_id HAVING test_id = '$pnid'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$t_id = $row['test_id'];
			$student_name = $row['course_yrSec'];
			$teacher_name = $row['teacher_name'];
			$month = $row['month_name'];
			$year = $row['school_year'];
			$test_d = $row['test_date'];
			$test_t = $row['time_s'];
			$test_dis = $row['test_discription'];
			$course = $row['department'];
			$cdept = $row['dept_id'];
			$lan = $row['lan_name'];
			$gen = $row['Gender'];
			$makharij = $row['makharij'];
			$noon = $row['noon_sakin'];
			$meem = $row['meem_sakin'];
			$qulqala = $row['qulqala'];
			$guuna = $row['guuna'];
			$madda = $row['madda'];
			}
			}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
  	require ("../includes/dbconnection.php");
			$remarks_p = $_POST['p_remarks'];
			$remarks_t = $_POST['t_remarks'];
			$grade_a = $_POST['grade'];
			$gradet = $_POST['grade_t'];
			$ttt_id = $_POST['tt_id'];

			$sql = "UPDATE test_results SET parent_remarks = '" . mysql_real_escape_string($remarks_p) . "', test_remarks = '" . mysql_real_escape_string($remarks_t) . "', test_grade = '$grade_a', taken_date_admin = '$sy', status_id = '2', teacher_p = '$gradet', taken_by = '1' where test_id = '$ttt_id'"; 
							 if ($conn->query($sql) === TRUE) {
							 header("Location: test_status");
							 }
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Edit Test';
$page_subtitle = 'Edit Test';
$table_name = 'Edit Test';
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
								<tbody>
								<tr>
								<td>Student Name:</td>
								<td><font color="#44B6AE"> <b><?php echo $student_name; ?></b></font></td>
								</tr>
								<tr>
								<td>Teacher Name:</td>
								<td><font color="#44B6AE"> <b><?php echo $teacher_name; ?></b></font></td>
								</tr>
								<tr>
								<tr>
								<td>Test Month:</td>
								<td><font color="#44B6AE"> <b><?php echo $month; ?> - <?php echo $year; ?></b></font></td>
								</tr>
								<tr>
								<td>Creation Date/Class Time:</td>
								<td>
								<font color="#44B6AE"> <b><?php echo $test_d; ?> - <?php echo $test_t; ?></b></font>
								</td>
								</tr>
								<tr>
								<td>Other Details:</td>
								<td>
								<font color="#44B6AE"> Lang: <b><?php echo $lan; ?></b> Gender: <b><?php echo $gen; ?></b> Course: <b><?php echo $course; ?></b></font>
								</td>
								</tr>
								<tr>
								<td>Discription:</td>
								<td><font color="#44B6AE"> <b><?php echo $test_dis; ?></b></font></td>
								</tr>
								</tbody>
								</table>
										<!-- END FORM-->
									</div>
								</div>
							</div>
					<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
						<div class="tab-content">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>You are adding test result
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form id="signupForm" class="col-md-10 mx-auto" method="post" action="add-test-results-marks">
										<div class="form-group">
															<label class="control-label col-md-3">
															<h3><strong>TAJWEED</strong></h3></label>
										</div>
										<?php if ($makharij == 1){
										echo '<input type="hidden" value="6" name="makharij" id="makharij"><div class="form-group">
															<label class="control-label col-md-3">
															<strong>Makharij</strong></label>
															<div class="md-checkbox-inline col-md-9">
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox1" value="1:1" id="checkbox1" class="md-check">
											<label for="checkbox1">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Prononunciation of letters is not good. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox2" value="1:2" id="checkbox2" class="md-check">
											<label for="checkbox2">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Confusion in reading Haa and HHaa. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox3" value="1:3" id="checkbox3" class="md-check">
											<label for="checkbox3">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Confusion in reading Hamza and Ain. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox5" value="1:5" id="checkbox5" class="md-check">
											<label for="checkbox5">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Confusion in reading Thaa and Seen. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox4" value="1:4" id="checkbox4" class="md-check">
											<label for="checkbox4">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Not pronouncing the bold letters properly. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox6" value="1:6" id="checkbox6" class="md-check">
											<label for="checkbox6">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Not reading Zaal and Zaa from their articulation points. </label>
										</div>															
														</div>
												</div>'; } ?>
												<?php if ($noon == 1){
										echo '<input type="hidden" value="6" name="noon" id="noon"><div class="form-group">
															<label class="control-label col-md-3">
															<strong>Rules of Noon Sakin &amp; Tanween</strong></label>
															<div class="md-checkbox-inline col-md-9">
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox7" value="1:7" id="checkbox7" class="md-check">
											<label for="checkbox7">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Izhar is not memorized. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox8" value="1:8" id="checkbox8" class="md-check">
											<label for="checkbox8">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Idgham is not memorized. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox9" value="1:9" id="checkbox9" class="md-check">
											<label for="checkbox9">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Do not know about Ikhfa. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox10" value="1:10" id="checkbox10" class="md-check">
											<label for="checkbox10">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											 Iqlab is not memorized. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox11" value="1:11" id="checkbox11" class="md-check">
											<label for="checkbox11">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Memorized but unable to apply. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox12" value="1:12" id="checkbox12" class="md-check">
											<label for="checkbox12">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Applied but not memorized. </label>
										</div>															
														</div>
												</div>';} ?>
												<?php if ($meem == 1){
										echo '<input type="hidden" value="3" name="meem" id="meem"><div class="form-group">
															<label class="control-label col-md-3">
															<strong>Rules of Meem Sakin</strong></label>
															<div class="md-checkbox-inline col-md-9">
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox13" value="1:13" id="checkbox13" class="md-check">
											<label for="checkbox13">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Memorized but unable to apply. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox14" value="1:14" id="checkbox14" class="md-check">
											<label for="checkbox14">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Applied but not memorized. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox15" value="1:15" id="checkbox15" class="md-check">
											<label for="checkbox15">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Have no idea about Meem Sakin. </label>
										</div>														
											</div>
												</div>';} ?>
												<?php if ($qulqala == 1){
										echo '<input type="hidden" value="3" name="qulqala" id="qulqala"><div class="form-group">
															<label class="control-label col-md-3">
															<strong>Qalqalah</strong></label>
															<div class="md-checkbox-inline col-md-9">
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox16" value="1:16" id="checkbox16" class="md-check">
											<label for="checkbox16">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Memorized but unable to apply. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox17" value="1:17" id="checkbox17" class="md-check">
											<label for="checkbox17">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Applied but not memorized. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox18" value="1:18" id="checkbox18" class="md-check">
											<label for="checkbox18">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Have no idea about Qalqalah. </label>
										</div>													
											</div>
												</div>';} ?>
												<?php if ($guuna == 1){
										echo '<input type="hidden" value="3" name="guuna" id="guuna"><div class="form-group">
															<label class="control-label col-md-3">
															<strong>Ghunna</strong></label>
															<div class="md-checkbox-inline col-md-9">
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox21" value="1:21" id="checkbox21" class="md-check">
											<label for="checkbox21">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Have no idea about ghunna. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox19" value="1:19" id="checkbox19" class="md-check">
											<label for="checkbox19">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Not doing Ghunna properly. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox20" value="1:20" id="checkbox20" class="md-check">
											<label for="checkbox20">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Some times do not care of Ghunna. </label>
										</div>															
											</div>
												</div>';} ?>
												<?php if ($madda == 1){
										echo '<input type="hidden" value="5" name="madda" id="madda"><div class="form-group">
									<label class="control-label col-md-3">
												<strong>Madda Letters &amp; Madh</strong></label>
									<div class="md-checkbox-inline col-md-9">
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox26" value="1:26" id="checkbox26" class="md-check">
											<label for="checkbox26">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Have no idea about Madda &amp; Madh. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox22" value="1:22" id="checkbox22" class="md-check">
											<label for="checkbox22">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Not stretching madda letters. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox23" value="1:23" id="checkbox23" class="md-check">
											<label for="checkbox23">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Stretching the Harakat. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox24" value="1:24" id="checkbox24" class="md-check">
											<label for="checkbox24">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Not stretch Madd properly. </label>
										</div>
										<div class="md-checkbox col-md-5">
											<input type="checkbox" name="checkbox25" value="1:25" id="checkbox25" class="md-check">
											<label for="checkbox25">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Know about the madda letters but not reading accordingly. </label>
										</div>
											</div>
												</div>'; }?>
										<?php if ($cdept >= 2){
										echo '<div class="form-group">
															<label class="control-label col-md-3">
															<h3><strong>QURAN READING</strong></h3></label>
										</div>
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Reading Fluency</strong></label>
															<div class="col-md-4">
															<select required class="form-control input-circle" name="read"  id="read" onchange="javascript: return optionList49_SelectedIndex()">
                      							<option value="100">Excellent</option>
												<option value="75">Above Average</option>
												<option value="50">On Average</option>
												<option value="25">Below Average</option>
												<option value="0">Not Good</option>
              									</select>
															</div>
												</div>';} ?>
											<?php if ($cdept >= 3){
										echo '<div class="form-group">
															<label class="control-label col-md-3">
															<h3><strong>QURAN MEMORIZATION</strong></h3></label>
										</div>
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Munzil</strong></label>
															<div class="col-md-4">
															<select required class="form-control input-circle" name="manzil"  id="manzil" onchange="javascript: return optionList49_SelectedIndex()">
                      							<option value="100">Excellent</option>
												<option value="75">Above Average</option>
												<option value="50">On Average</option>
												<option value="25">Below Average</option>
												<option value="0">Not Good</option>
              									</select>
															</div>
												</div>';} ?>
												<div class="form-group">
															<label class="control-label col-md-3">
															<h3><strong>Teacher Performance</strong></h3></label>
										</div>
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Teacher Performance</strong></label>
															<div class="col-md-4">
															<select required class="form-control input-circle" name="tgrade"  id="tgrade" onchange="javascript: return optionList49_SelectedIndex()">
                      							<option value="100">Excellent</option>
												<option value="75">Above Average</option>
												<option value="50">On Average</option>
												<option value="25">Below Average</option>
												<option value="0">Not Good</option>
              									</select>
															</div>
												</div>
												<input type="hidden" value="<?php echo $pnid; ?>" name="test_id" id="test_id">
											<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Submit</button>
                                </div>
                            </form>
										</div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>