<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
 date_default_timezone_set($TimeZoneCustome);
$end_start = date('Y-m-d H:i:s');
$history =$_REQUEST['history_id'];
$dept =$_REQUEST['dept_id'];
$adept =$_REQUEST['adept_id'];
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{
  		$hid=$_POST['history'];
  		$end_time=$_POST['endid'];
  		$tremarks =$_POST['remark'];
  		$lessonid =$_POST['lesson'];
  		$sub1 =$_POST['description1'];
  		$subi1 =$_POST['description2'];
  		$man1 =$_POST['description3'];
			$sql = "UPDATE class_history SET lesson_id = '$lessonid', teacher_remarks = '$tremarks', end_time = '$end_start', sabaq = '$sub1', sabaqi = '$subi1', manzil = '$man1', monitor_id = '9' WHERE history_id = '$hid'";
					if ($conn->query($sql) === TRUE) {
					header("Location: teacher-home");
					}
			}
?>
<?php
$page_title = 'Add Attendance';
$page_subtitle = 'Add Attendance';
$table_name = 'Add Attendance';
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
															<label>Select Lesson</label>
															<div>
															<select required class="form-control" name="lesson"  id="lesson" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM lesson_pages WHERE dept_id = $dept ORDER BY lesson_id");			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                    <option value="<?php echo $row['lesson_id'];?>"><?php echo $row['lesson_name'];?></option>
                    <?php } ?>
                    </select>															
                    </div>
												</div>
										<div class="form-group">
															<label>Remarks</label>
															<div>
															<select required class="form-control" name="remark"  id="remark" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM remaks ORDER BY remk_id");			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                    <option value="<?php echo $row['remk_id'];?>"><?php echo $row['remak'];?> </option>
                   <?php } ?>
                    </select>															
                    </div>
												</div>
												<div class="form-group">
													<label>Subaq</label>
													<div>
														<input type="text" class="form-control" placeholder="Enter Subaq" name="description1" id="description1">
													</div>
												</div>
												<div class="form-group">
													<label>Subaqi</label>
													<div>
														<input type="text" class="form-control" placeholder="Enter Subaqi" name="description2" id="description2">
													</div>
												</div>
												<div class="form-group">
													<label>Manzil</label>
													<div>
														<input type="text" class="form-control" placeholder="Enter Manzil" name="description3" id="description3">
													</div>
												</div>
												<input type="hidden" value="<?php echo $history; ?>" class="form-control" name="history" id="history">
												<input type="hidden" value="<?php echo $end_start; ?>" class="form-control" name="endid" id="endid">
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">Submit</button>
														<button type="button" class="btn btn-circle default">Cancel</button>
													</div>
												</div>
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