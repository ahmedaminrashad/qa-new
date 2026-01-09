<?php session_start(); ?>
<?php
  include("../includes/session.php");
  include("../includes/manager_rights.php");
  require ("../includes/dbconnection.php");
require ("../includes/smsGateway.php");
include("header.php");

    $pnid =base64_decode($_GET["pT"]);
    $link =$_REQUEST['link'];
	$sql = "SELECT * FROM task WHERE task_id = '$pnid'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$taskid = MYSQL_RESULT($result,$i,"task_id");
			$pid = MYSQL_RESULT($result,$i,"parent_id");
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$taskdes = MYSQL_RESULT($result,$i,"task_des");
			$stu = MYSQL_RESULT($result,$i,"status");
			$reply = MYSQL_RESULT($result,$i,"responce");
			$adate = MYSQL_RESULT($result,$i,"task_date");
			$rdate = MYSQL_RESULT($result,$i,"responce_date");
			$type = MYSQL_RESULT($result,$i,"type_id");
			}
			}
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
			$ataskid= $_POST['s_task_id'];
			$ares= $_POST['s_res'];
			$adate= $_POST['s_date'];
			$apname= $_POST['name'];
			$alink= $_POST['link'];

			$sql = "UPDATE task SET responce = '$ares', responce_date = '$adate', status = '2' where task_id = '$ataskid'"; 
if ($conn->query($sql) === TRUE) {
			header("Location: ".$alink."");	
			}
				}
?>
<?php
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Clear Task';
$page_subtitle = 'Clear Task';
$table_name = 'Clear Task';
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
															<label>Task Query</label>
															<div>
															<input required type="text" value="<?php echo $taskdes; ?>" name="task_des" id="task_des" class="form-control input-circle" readonly>															</div>
												</div>
												<div class="form-group">
													<label>Task Responce</label>
													<div>
														<textarea required class="form-control" placeholder="Enter Task Responce" name="s_res" id="s_res"></textarea>													</div>
												</div>
												<input type="hidden" value="<?php echo $taskid; ?>" name="s_task_id" id="s_task_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $sy; ?>" name="s_date" id="s_date" class="form-control input-circle">
												<input type="hidden" value="<?php echo $pname; ?>" name="name" id="name" class="form-control input-circle">
												<input type="hidden" value="<?php echo $link; ?>" name="link" id="link" class="form-control input-circle">
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