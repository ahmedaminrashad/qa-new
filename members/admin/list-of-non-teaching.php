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
$page_title = 'List of Employees';
$page_subtitle = 'List of All Employees';
$table_name = 'List of Employees';
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
                                        <table class="align-middle mb-0 table table-striped table-hover">
                                            <thead>
								<tr>
								<th>
										 Person Name
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
                                            <tbody>
                                            <?php 
// sending query
$sql = "SELECT `profile`.*, `gender`.`gender`, `shift`.`shift_name`, `hello`.`inout_name`, `employee_catagory`.`cat_name` FROM
  			`profile`,`gender`,`shift`,`hello`,`employee_catagory` WHERE profile.g_id=gender.g_id and profile.shift_id=shift.shift_id and profile.inout_id=hello.inout_id and profile.cat_id=employee_catagory.cat_id HAVING cat_id != 8 AND active = 1";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			if($row['g_id']==1 and $row['inout_id']==1) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#D3D3D3';
				}		
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
			$category = $row['cat_name'];
?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
										<div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle" src="../uploads/thumb/<?php echo $aimage; ?>" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading"><a href="teacher-accounts-profile?profile_no=<?php echo base64_encode($profile_no); ?>"><?php echo $tname; ?> (<?php echo $profile_no; ?>)</a> <?php if ($witness_id1 == 1 OR $witness_id2 == 1 OR $cheque_id == 1 Or $agree_id == 1) {echo '<i class="fa fa-warning font-yellow"></i>';} else {echo '';} ?></div>
                                                                <div class="widget-subheading opacity-7"><?php echo $category; ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
								</td>
								<td>
									 <?php echo $employ; ?>
								</td>
								<td>
									 <a href="teacher-class-anylasis?profile_no=<?php echo base64_encode($profile_no); ?>"><button class="mb-2 mr-2 btn btn-outline-info btn-sm"><?php echo $gender; ?></button></a>
								</td>
								<td>
									<?php if ($rg_training == 2){ echo '<div class="badge badge-danger">On Training</div>'; } else {echo '<div class="badge badge-success">Active</div>';} ?>
								</td>
								<td><a href="attendence-calander?ptec=<?php echo base64_encode($pT); ?>"><button class="mb-2 mr-2 btn btn-outline-success btn-sm">Attendance</button></a></td>
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