<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
function abc($er)
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM course Where Teacher = $er";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo '0';
	}
elseif ($numberOfRows > 0) 
	{
echo $numberOfRows;
}
}

function abc1($er)
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM profile Where teacher_id = '$er' and schedule_status = '1'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo '';
	}
elseif ($numberOfRows > 0) 
	{
			echo '<button class="mb-2 mr-2 btn btn-outline-danger btn-sm">Blocked</button>';
			}
	}
	
function abc2($er)
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM profile Where teacher_id = '$er' and schedule_status = '2'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo '';
	}
elseif ($numberOfRows > 0) 
	{
			echo '<button class="mb-2 mr-2 btn btn-outline-success btn-sm">Un-block</button>';
			}
	}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'In-Active Teacher';
$page_subtitle = 'List of In-Active Teacher';
$table_name = 'In-Active Teacher';
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
                                        <table class="mb-0 table">
                                            <thead>
								<tr>
								<th colspan="2">
									 Teacher Name
								</th>
								<th>
									 No.
								</th>
								<th>
									 Records
								</th>
								<th>
									 Station
								</th>
								<th>
									 Gender
								</th>
								<th>
									 Skype ID
								</th>
								<th>
									 Pass
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 Status
								</th>
								</tr>
								</thead>
                                            <tbody>
                                            <?php 
// sending query
$sql = "SELECT `profile`.*, `gender`.`gender`, `shift`.`shift_name`, `hello`.`inout_name`, `employee_catagory`.`cat_name` FROM
  			`profile`,`gender`,`shift`,`hello`,`employee_catagory` WHERE profile.g_id=gender.g_id and profile.shift_id=shift.shift_id and profile.inout_id=hello.inout_id and profile.cat_id=employee_catagory.cat_id HAVING active = 2";
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

?>
								<tr>
								<td class="fit">
										<img class="user-pic" src="../uploads/thumb/<?php echo $aimage; ?>">
									</td>
								<td>
									 <b><a href="teacher-accounts-profile?profile_no=<?php echo base64_encode($profile_no); ?>"><?php echo $tname; ?> (<?php echo $profile_no; ?>)</a> <?php if ($witness_id1 == 1 OR $witness_id2 == 1 OR $cheque_id == 1 Or $agree_id == 1) {echo '<i class="fa fa-warning font-yellow"></i>';} else {echo '';} ?></b>
								</td>
								<td>
									 <a href="teacher-student-list?ptec=<?php echo base64_encode($pT); ?>"><button class="mb-2 mr-2 btn btn-success btn-sm"><?php echo abc("$pT"); ?></button></a>
								</td>
								<td>
									 <a href="teacher-schedule?pT=<?php echo $profile_no; ?>"><button class="mb-2 mr-2 btn btn-success btn-sm">Schedule</button></a>
								</td>
								<td>
									 <?php echo $hello; ?>
								</td>
								<td>
									 <?php echo $gender; ?>
								</td>
								<td>
									 <?php echo $sky; ?>
								</td>
								<td>
									 <?php echo $spass; ?>
								</td>
								<td><a href="block-schedule?t_id=<?php echo $pT; ?>&block=2"><?php echo abc1("$profile_no"); ?></a>
									<a href="block-schedule?t_id=<?php echo $pT; ?>&block=1"><?php echo abc2("$profile_no"); ?></a>
								</td>
								<td><a href="attendence-calander?ptec=<?php echo base64_encode($pT); ?>"><button class="mb-2 mr-2 btn btn-success btn-sm">Atted</button></a></td>
							</tr>
							<?php 		
		}
	}	
?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>