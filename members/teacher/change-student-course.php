<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");

    $sid =base64_decode($_GET["student_id"]);
    $did =base64_decode($_GET["d_id"]);
    $adid =base64_decode($_GET["ad_id"]);
    $name =base64_decode($_GET["name"]);
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
			$id_student= $_POST['con_id'];
			$id_dept= $_POST['r_dept'];
			$id_adept= $_POST['a_dept'];

			$sql = "UPDATE course SET dept_id = '$id_dept', adept_id = '$id_adept' where course_id = '$id_student'";
			if ($conn->query($sql) === TRUE) {
			echo '';
			}
			$sql = "UPDATE sched SET dept_id = '$id_dept', adept_id = '$id_adept' where course_id = '$id_student'";
			if ($conn->query($sql) === TRUE) {
			echo '';
			}
			$sql = "UPDATE sched3 SET dept_id = '$id_dept', adept_id = '$id_adept' where course_id = '$id_student'";
			if ($conn->query($sql) === TRUE) {
							 header("Location: teacher-student-list");
							 }
				}
?>
<?php
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Change Course';
$page_subtitle = 'Change Course';
$table_name = 'Change Course';
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
															<label>Regular Course</label>
															<div>
															<select class="form-control" name="r_dept"  id="r_dept" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM dept WHERE type_id = 1 ORDER BY dept_id ");			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['dept_id'];?>"><?php echo $row['department'];?> </option>
                      <?php } ?>
               </select>
															</div>
												</div>
												<div class="form-group">
													<label>Additional Course</label>
													<div>
														<select class="form-control" name="a_dept"  id="a_dept" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM dept WHERE type_id = 3 ORDER BY dept_id ");			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['dept_id'];?>"><?php echo $row['department'];?> </option>
                      <?php } ?>
               </select>

													</div>
												</div>
												<input type="hidden" value="<?php echo $sid; ?>" name="con_id" id="con_id" class="form-control input-circle">
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
	form.r_dept.value = ("<?php echo $did; ?>");
	form.a_dept.value = ("<?php echo $adid; ?>");
	//alert (form.pCityM.value);				
</script>