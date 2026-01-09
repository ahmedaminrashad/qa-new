<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
$studentid =$_REQUEST['sid'];
$student_name =$_REQUEST['sname'];
$teacherid =$_REQUEST['tid'];
$teacher_name =$_REQUEST['tname'];
$parentid =$_REQUEST['pid'];
date_default_timezone_set($TimeZoneCustome);
$sy11 = date('Y-m-d');
$date11 = date('h:i a', time());

    if (isset($_POST['cmdSubmit'])) 
  	{ 		require ("../includes/dbconnection.php");
		 	$sn= $_POST['student_name'];
		 	$snid= $_POST['student_id'];
		 	$tn= $_POST['teacher_name'];
		 	$tnid= $_POST['teacher_id'];
		 	$da= $_POST['date'];
		 	$ti= $_POST['time'];
		 	$de= $_POST['desc'];
		 	$pe= $_POST['pppid'];
		 	$pman= $_POST['pman'];
			$sql = "INSERT INTO note_student (note_text, date, time, course_id, teacher_id, student_name, teacher_name, parent_id, user_id)
					VALUES('" . mysqli_real_escape_string($conn, $de) . "', '$da', '$ti', '$snid', '$tnid', '$sn', '$tn', '$pe', '$pman')"; 
					if ($conn->query($sql) === TRUE) {
					 header(
			 	"Location: teacher-student-list");
			 	}
				}?>
<?php
$page_title = 'Add Note';
$page_subtitle = 'Add Note';
$table_name = 'Add Note';
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
															<label>Student Name</label>
															<div>
															<input type="text" name="student_name" id="student_name" class="form-control" value="<?php echo $student_name; ?>" readonly>															</div>
												</div>
												<div class="form-group">
															<label>Select Manager</label>
															<div>
															<select required class="form-control" name="pman" id="pman" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php include("../includes/main-var.php");
				$sql = "SELECT * FROM profile WHERE (cat_id < 6 or super_rights = 1) and active = 1 ORDER BY teacher_id";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } ?>
               </select>
															</div>
												</div>
										<div class="form-group">
															<label>Note</label>
															<div>
															<textarea required name="desc" id="desc" class="form-control" placeholder="Add Note"></textarea>															</div>
												</div>
												<input type="hidden" class="form-control" value="<?php echo $studentid; ?>" name="student_id" id="student_id">
												<input type="hidden" class="form-control" value="<?php echo $teacherid; ?>" name="teacher_id" id="teacher_id">
												<input type="hidden" class="form-control" value="<?php echo $teacher_name; ?>" name="teacher_name" id="teacher_name">
												<input type="hidden" class="form-control" value="<?php echo $sy11; ?>" name="date" id="date">
												<input type="hidden" class="form-control" value="<?php echo $date11; ?>" name="time" id="time">
												<input type="hidden" class="form-control" value="<?php echo $parentid; ?>" name="pppid" id="pppid">
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
	form.pcon.value = ("<?php echo $pid; ?>");
	form.pdept.value = ("<?php echo $m; ?>");
	form.pgender.value = ("<?php echo $y; ?>");
	//alert (form.pCityM.value);				
</script>