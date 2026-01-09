<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Mark Public Holidays';
$page_subtitle = 'Mark Public Holidays';
$table_name = 'Teacher Class Search';
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
										<form id="signupForm" class="col-md-10 mx-auto" method="post" action="public-holidays-define-search-file">
								<div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
								<th colspan="8" align="right">
									<button class="mb-2 mr-2 btn btn-outline-success">Submit</button></th>
							</tr>
							<tr>
								<th colspan="8" align="right">
								<div class="form-group">
															<label>Date:</label>
															<div>
															<input required type="date" name="date" id="date" class="form-control">															</div>
												</div>
							</tr>
							<tr>
								<th colspan="8" align="right">
								<div class="form-group">
															<label>Description:</label>
															<div>
															<textarea required name="msg" id="msg" class="form-control"></textarea>															</div>
												</div>
							</tr>
								<tr>
								<tr>
								<th>
									 
								</th>
								<th colspan="2">
										 Person Name
								</th>
								<th>
									 Profile
								</th>
								<th>
									 Designation
								</th>
								<th>
									 Gender
								</th>
								<th>
									 Status
								</th>
								<th>
									 Attendance
								</th>
								</tr>
								</thead>
								<?php 
// sending query
$sql = "SELECT `profile`.*, `gender`.`gender`, `shift`.`shift_name`, `hello`.`inout_name`, `employee_catagory`.`cat_name` FROM
  			`profile`,`gender`,`shift`,`hello`,`employee_catagory` WHERE profile.g_id=gender.g_id and profile.shift_id=shift.shift_id and profile.inout_id=hello.inout_id and profile.cat_id=employee_catagory.cat_id HAVING (cat_id = 8 OR  teacher_rights = 1) AND active = 1";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
				$profile_no = $row['teacher_id'];
			$tname = $row['teacher_name'];
			$shift = $row['shift_name'];
			$q1 = $row['Qualification1'];
			$gender = $row['gender'];
			$sky = $row['Skype'];		
			$pT = $row['teacher_id'];
			$spass = $row['s_pass'];
			$hello = $row['inout_name'];
			$aimage = $row['ima'];
			$witness_id1 = $row['w1'];
			$witness_id2 = $row['w2'];
			$cheque_id = $row['cheque'];
			$agree_id = $row['agreement'];
			$employ = $row['cat_name'];
			$rg_training = $row['training'];
			

?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <input name="checkbox[]" type="checkbox" value="<?php echo $profile_no; ?>">
								</td>
								<td class="fit">
										<img class="user-pic" src="../uploads/thumb/<?php echo $aimage; ?>">
									</td>
								<td>
									 <b><a href="teacher-accounts-profile?profile_no=<?php echo base64_encode($profile_no); ?>"><?php echo $tname; ?> (<?php echo $profile_no; ?>)</a> <?php if ($witness_id1 == 1 OR $witness_id2 == 1 OR $cheque_id == 1 Or $agree_id == 1) {echo '<i class="fa fa-warning font-yellow"></i>';} else {echo '';} ?></b>
								</td>
								<td>
									 <a href="teacher-schedule?pT=<?php echo $profile_no; ?>"><button type="button" class="btn green btn-xs">Schedule</button></a>
								</td>
								<td>
									 <a href="teacher-performance-anylasis?csr=<?php echo $profile_no; ?>&name=<?php echo $tname; ?>&month=<?php echo $mm_id; ?>&year=<?php echo $yy_id; ?>"><?php echo $employ; ?></a>
								</td>
								<td>
									 <?php echo $gender; ?>
								</td>
								<td>
									<?php if ($rg_training == 2){ echo '<font color="FE2E2E"><b><a href="teacher-rights-training?a_id='.$profile_no.'&link='.$link.'&sts=1">On Training</a></b></font>'; } else {echo 'Active';} ?>
								</td>
								<td><a href="attendence-calander?ptec=<?php echo base64_encode($pT); ?>"><button type="button" class="btn green btn-xs">Attendance</button></a></td>
							</tr>
							<?php 	
		}
	}	
?>
								<tr>
								<th colspan="7" align="right">
									<button class="mb-2 mr-2 btn btn-outline-success">Submit</button></th>
							</tr>
								</table>
								</form>
							</div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>