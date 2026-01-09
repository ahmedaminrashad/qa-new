<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
   $cid =$_REQUEST['c_id'];
$cname =$_REQUEST['cname'];
	$sql = "SELECT * FROM dept WHERE dept_id = '$cid'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$did = $row['dept_id'];
			$cname = $row['department'];
			$dcname = $row['name'];
			$img = $row['image_name'];
			$tid = $row['type_id'];
			$pid = $row['position_id'];
			$clevel = $row['course_level'];
			$cdes = $row['course_des'];
			$cage = $row['age'];

			}
			}
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
  	require ("../includes/dbconnection.php");
  $acname= $_POST['course'];
  $adcname= $_POST['dcourse'];
  $actype= $_POST['dept'];
  $aposi= $_POST['pos'];
  $alev= $_POST['level'];
  $adesi= $_POST['des'];
  $acage= $_POST['age'];
  $acid= $_POST['ccid'];

			$sql = "UPDATE dept SET department = '$acname', name = '$adcname', type_id = '$actype', position_id = '$aposi', course_level = '$alev', course_des = '$adesi', age = '$acage' WHERE dept_id = '$acid'"; 
							 if ($conn->query($sql) === TRUE) {
							 header("Location: course-material");
							 }
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = "Edit Course";
$page_subtitle = "Edit Course Details";
$table_name = "Edit Course";
?>
<?php echo $main_header; ?>
<head>
<script>
      $(document).ready(function() {
        $(".add").click(function() {
          $('<div><input class="files" name="user_files[]" type="file" ><span class="rem" ><a href="javascript:void(0);" >Remove</span></div>').appendTo(".contents");

        });
        $('.contents').on('click', '.rem', function() {
          $(this).parent("div").remove();
        });

      });
    </script>
</head>
<body>
<?php echo $top_bar_logo; ?>
<?php //echo $search_bar; ?>
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
															<label>Course Name*</label>
															<div>
																<input required type="text" value="<?php echo $cname; ?>" name="course" id="course" class="form-control">	
														</div>
														</div>
														<div class="form-group">
															<label>Display Name*</label>
															<div>
															<input required type="text" value="<?php echo $dcname; ?>" name="dcourse" id="dcourse" class="form-control">
														</div>
													</div>
														<div class="form-group">
															<label>Position*</label>
															<div>
																<input required type="number" value="<?php echo $pid; ?>" name="pos" id="pos" class="form-control">	
														</div>
														</div>
														<div class="form-group">
															<label>Age*</label>
															<div>
															<input required type="number" value="<?php echo $cage; ?>" name="age" id="age" class="form-control">														
															</div>
													</div>
														<div class="form-group">
															<label>Category*</label>
															<div>
																<select required class="form-control" name="dept"  id="dept" onchange="javascript: return optionList41119_SelectedIndex()">
              												<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM course_cata WHERE lev_id = 2 ORDER BY cata_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['code_id'];?>"><?php echo $row['cata_name'];?> </option>
                      <?php } ?>
               </select>
														</div>
														</div>
														<div class="form-group">
															<label>Description*</label>
															<div>
															<textarea required type="text" name="des" id="des" class="form-control"><?php echo $cdes; ?></textarea>														</div>
													</div>
												<input type="hidden" value="<?php echo $cid; ?>" name="ccid" id="ccid" class="form-control">
												<div class="row">
													<div>
														<div class="form-group">
															<label>Level*</label>
															<div>
																<select required class="form-control" name="level"  id="level" onchange="javascript: return optionList41119_SelectedIndex()">
              												<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM course_cata WHERE lev_id = 1 ORDER BY cata_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['code_id'];?>"><?php echo $row['cata_name'];?> </option>
                      <?php } ?>
               </select>
													</div>
														</div>
													</div>
													<!--/span-->
													<div>
															</div>
													</div>
													<!--/span-->
												<img src="../uploads/<?php echo $img; ?>"  height="20%" width="20%" alt=""/><br><br>
											<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Submit</button>
                                </div>
                            </form>
										<!-- END FORM-->
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
	form.dept.value = ("<?php echo $tid; ?>");
	form.level.value = ("<?php echo $clevel; ?>");
	//alert (form.pCityM.value);				
</script>