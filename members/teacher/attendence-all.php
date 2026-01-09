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
$apid =$_REQUEST['pid'];
$student =$_REQUEST['course_id'];
$ppis =$_REQUEST['ppis'];
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{
  	    require ("../includes/dbconnection.php");
  		$hid=$_POST['history'];
  		$end_time=$_POST['endid'];
  		$lessondis =$_POST['description'];
  		$tremarks =$_POST['remark'];
  		$lessonid =$_POST['lesson'];
  		$addlid =$_POST['aalesson'];
  		$adddes =$_POST['adddescription'];
  		$homework =$_POST['homework'];
  		$note =$_POST['note'];
  		$aapid1 =$_POST['aapid'];
  		$aadept =$_POST['depta'];
  		$aadepta =$_POST['adepta'];
  		$astudent =$_POST['student'];
  		$ppiss =$_POST['ppiss'];
			$sql = "UPDATE class_history SET lesson_id = '$lessonid', lesson_discription = '" . mysqli_real_escape_string($conn, $lessondis) . "', teacher_remarks = '$tremarks', end_time = '$end_start', alesson_id = '$addlid', additional_des = '" . mysqli_real_escape_string($conn, $adddes) . "', monitor_id = '9', home_work = '" . mysqli_real_escape_string($conn, $homework) . "', note = '" . mysqli_real_escape_string($conn, $note) . "' WHERE history_id = '$hid'";
					if ($conn->query($sql) === TRUE) {
					    echo "<script>window.open('send-lesson?dept=".$aadept."&lesson=".$lessonid."&description=".$lessondis."&homework=".$homework."&adept=".$aadepta."&alesson=".$addlid."&adescription=".$adddes."&note=".$note."&parent_id=".$aapid1."&student=".$astudent."&remarks=".$tremarks."','_self')</script>";
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
															<label>Select 
															Regular Lesson</label>
															<div>
															<select required class="form-control" name="lesson"  id="lesson" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM lesson_pages WHERE dept_id = $dept ORDER BY lesson_id";
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){?>
                    <option value="<?php echo $row['lesson_id'];?>"><?php echo $row['lesson_name'];?></option>
                    <?php } ?>
                    </select>															
                    </div>
												</div>
												<div class="form-group">
													<label>
													Lesson Description</label>
													<div>
														<textarea class="form-control" name="description" id="description"></textarea>
													</div>
												</div>
												<div class="form-group">
													<label>
													Home Work</label>
													<div>
														<input type="text" class="form-control" placeholder="Enter Home Work Detailed" name="homework" id="homework">
													</div>
												</div>
												<div class="form-group">
															<label>Select 
															Additional Lesson</label>
															<div>
															<select class="form-control" name="aalesson"  id="aalesson" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM lesson_pages WHERE dept_id = $adept OR dept_id = 100 ORDER BY lesson_id";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){?>
                    <option value="<?php echo $row['lesson_id'];?>"><?php echo $row['lesson_name'];?></option>
                    <?php } ?>
                    </select>															
                   							 </div>
												</div>
												<div class="form-group">
													<label>
													Lesson Description</label>
													<div>
														<textarea class="form-control" value="N-A" name="adddescription" id="adddescription"></textarea>
													</div>
												</div>
										<div class="form-group">
															<label>Remarks</label>
															<div>
															<select required class="form-control" name="remark"  id="remark" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM remaks ORDER BY remk_id";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                    <option value="<?php echo $row['remk_id'];?>"><?php echo $row['remak'];?> </option>
                   <?php } ?>
                    </select>															
                    </div>
												</div>
												<div class="form-group">
													<label>
													Note</label>
													<div>
														<input type="text" class="form-control" name="note" id="note">
													</div>
												</div>
												<input type="hidden" value="<?php echo $history; ?>" class="form-control" name="history" id="history">
												<input type="hidden" value="<?php echo $apid; ?>" class="form-control" name="aapid" id="aapid">
												<input type="hidden" value="<?php echo $dept; ?>" class="form-control" name="depta" id="depta">
												<input type="hidden" value="<?php echo $adept; ?>" class="form-control" name="adepta" id="adepta">
												<input type="hidden" value="<?php echo $student; ?>" class="form-control" name="student" id="student">
												<input type="hidden" value="<?php echo $ppis; ?>" class="form-control" name="ppiss" id="ppiss">
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
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.aalesson.value = ("<?php echo 100; ?>");
	//alert (form.pCityM.value);				
</script>