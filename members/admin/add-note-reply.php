<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $pid =$_REQUEST['n_id'];
$user =$_SESSION['is']['username'];
$user_id =$_SESSION['is']['user_id'];
date_default_timezone_set("Africa/Cairo");
$sy11 = date('Y-m-d');
$date11 = date('h:i a', time());
$sql = "SELECT * FROM note_student WHERE note_id = $pid";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
		
			$anid = $row['note_id'];
			$anote = $row['note_text'];
			$astatus = $row['status'];
			$adate = $row['date'];
			$atime = $row['time'];
			$asid = $row['course_id'];
			$atid = $row['teacher_id'];
			$asname = $row['student_name'];
			$atname = $row['teacher_name'];
			$apid = $row['parent_id'];
			$ardate = $row['read_date'];
			$artime = $row['read_time'];
			}
			}
    if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$feed= $_POST['desc'];
		 	$uname= $_POST['user_name'];
		 	$uid= $_POST['user_id'];
		 	$rda= $_POST['rdate'];
		 	$rti= $_POST['rtime'];
		 	$rppid= $_POST['rpid'];
			$sql = "UPDATE note_student SET status = '2', read_date = '$rda', read_time = '$rti', user_name = '$uname', user_id = '$uid', feed_back = '$feed' WHERE note_id = '$rppid'"; 
					 if ($conn->query($sql) === TRUE) {
					 header(
			 	"Location: comment-timeline-all");
			 	}
				}?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Reply Note';
$page_subtitle = 'You are adding a note reply!';
$table_name = 'Add Reply';
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
                                    <input type="hidden" class="form-control" value="<?php echo $user; ?>" name="user_name" id="user_name">
												<input type="hidden" class="form-control" value="<?php echo $user_id; ?>" name="user_id" id="user_id">
												<input type="hidden" class="form-control" value="<?php echo $sy11; ?>" name="rdate" id="rdate">
												<input type="hidden" class="form-control" value="<?php echo $date11; ?>" name="rtime" id="rtime">
												<input type="hidden" class="form-control" value="<?php echo $pid; ?>" name="rpid" id="rpid">
                                <div class="form-group">
                                    <label for="firstname">Student Name</label>
                                    <div>
                                        <input type="text" name="1_name" id="1_name" class="form-control" value="<?php echo $asname; ?>" readonly>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="lastname">Teacher Name</label>
                                    <div>
                                        <input type="text" name="1_name" id="2_name" class="form-control" value="<?php echo $atname; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstname">Note</label>
                                    <div>
                                        <input type="text" name="1_name" id="2_name" class="form-control" value="<?php echo $anote; ?>" readonly>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="lastname">Feed Back</label>
                                    <div>
                                        <textarea required name="desc" id="desc" class="form-control" placeholder="Add Feed Back"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Sign up</button>
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