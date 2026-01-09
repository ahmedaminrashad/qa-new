<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
$student_id =$_REQUEST['student_id'];
$student_name =$_REQUEST['student_name'];
$student_Tzone =$_REQUEST['student_Tzone'];
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Schedule Request';
$page_subtitle = 'You are requsting schedule for student '.$student_name.' at '.$student_Tzone.'';
$table_name = 'Schedule Request';
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
										<!-- BEGIN FORM-->
										<form id="signupForm" class="col-md-10 mx-auto" method="post" action="teacher-definer?yyy=<?php echo time(); ?>">
												<div class="form-group">
															<label>Student Time Start</label>
															<div>
																<input required type="time" class="form-control" value="" name="STime" id="STime">
															</div>
														</div>
												<div class="form-group">
															<label>Student Time End</label>
															<div>
																<input required type="time" class="form-control" value="" name="ETime" id="ETime">
															</div>
														</div>
												<div class="form-group">
												<label>Student Day</label>
												<div>
												<div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" name="checkbox1" value="1" id="exampleCustomInline1" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                              for="exampleCustomInline1">Mon</label></div>
                                                        <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" name="checkbox2" value="2" id="exampleCustomInline2" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                               for="exampleCustomInline2">Tue</label></div>
                                                        <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" name="checkbox3" value="3" id="exampleCustomInline3" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                               for="exampleCustomInline3">Wed</label></div>
                                                        <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" name="checkbox4" value="4" id="exampleCustomInline4" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                               for="exampleCustomInline4">Thu</label></div>
                                                        <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" name="checkbox5" value="5" id="exampleCustomInline5" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                               for="exampleCustomInline5">Fri</label></div>
                                                        <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" name="checkbox6" value="6" id="exampleCustomInline6" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                               for="exampleCustomInline6">Sat</label></div>
                                                        <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" name="checkbox7" value="7" id="exampleCustomInline7" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                               for="exampleCustomInline7">Sun</label></div>
												</div>
												</div>
												<div class="form-group">
															<label>Student Needs</label>
															<div>
																<textarea required id="needs" name="needs" class="form-control" placeholder="Write Student's Needs"></textarea>
															</div>
														</div>
														<div class="form-group">
															<label>Select Teacher</label>
															<div>
																<select multiple required class="form-control" name="pteacher[]"  id="pteacher" size="20" onchange="javascript: return optionList43_SelectedIndex()">
<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
$sql = "SELECT * FROM profile WHERE (cat_id = 8 OR  teacher_rights = 1) AND active = 1 AND schedule_status = 1 AND training = 1 ORDER BY inout_id, g_id";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){  ?>
<option value="<?php echo $row['teacher_id'];?>" style="background: <?php if ($row['g_id'] == 2) { echo '#FC9393';} else {echo '#66cc66'; } ?>"><?php echo $row['teacher_name'];?> </option>
<?php } ?>
</select>
															</div>
														</div>
												<input type="hidden" value="<?php echo $student_id; ?>" name="studentID" id="studentID" class="form-control">
												<input type="hidden" value="<?php echo $student_Tzone; ?>" name="studentTZ" id="studentTZ" class="form-control">
												<input type="hidden" value="<?php echo $student_name; ?>" name="studentNA" id="studentNA" class="form-control">
											<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Submit</button>
                                </div>
                            </form>
							</div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>