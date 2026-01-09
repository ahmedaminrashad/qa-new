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
			echo '<button class="mb-2 mr-2 btn btn-outline-danger btn-sm" title="Block Teacher Schedule">Block</button>';
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
			echo '<button class="mb-2 mr-2 btn btn-outline-success btn-sm" title="Un-Block Teacher Schedule">Un-block</button>';
			}
	}
function actT($er)
{
require ("../includes/dbconnection.php");
// sending query
$sql = "SELECT * FROM profile WHERE (cat_id = 8 OR  teacher_rights = 1) AND active = $er";
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
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Active Teachers';
$page_subtitle = 'List of active Teachers';
$table_name = 'List of Teachers';
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
                                <div><?php echo $page_title; ?> (<?php echo actT("1"); ?>)
                                    <div class="page-title-subheading"><?php echo $page_subtitle; ?>
                                    </div>
                                </div>
                                </div>
                                <div class="page-title-actions">
                                <div class="d-inline-block dropdown">
                                    <a href="list-of-inactive-teachers"><button class="mb-2 mr-2 btn btn-shadow btn-danger">
                                        In-Active Teachers (<?php echo actT("2"); ?>)
                                    </button></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                    <!-- Page Title End-->
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="mb-3 card">
                                        <div class="card-body">
                                            <ul class="tabs-animated-shadow tabs-animated nav">
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link active" id="tab-c-0" data-toggle="tab" href="#tab-animated-0">
                                                        <span>All Teachers</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#tab-animated-1">
                                                        <span>Male Teachers</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#tab-animated-2">
                                                        <span>Female Teachers</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-animated-0" role="tabpanel">
                                                    <p class="mb-0"><div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
								<th>
									 TEACHER NAME
								</th>
								<th>
									 #
								</th>
								<th>
									 SCHEDULE
								</th>
								<th>
									 NATIONALITY
								</th>
								<th>
									 GENDER
								</th>
								<th>
									 ZOOM ID
								</th>
								<th>
									 STATUS
								</th>
								<th>
									 ATTENDENCE
								</th>
								<th>
									 &nbsp;
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT `profile`.*, `gender`.`gender`, `shift`.`shift_name`, `hello`.`inout_name`, `employee_catagory`.`cat_name` FROM
  			`profile`,`gender`,`shift`,`hello`,`employee_catagory` WHERE profile.g_id=gender.g_id and profile.shift_id=shift.shift_id and profile.inout_id=hello.inout_id and profile.cat_id=employee_catagory.cat_id HAVING cat_id = 8 AND active = 1";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
elseif ($numberOfRows > 0) 
	{
	while($row = mysqli_fetch_array($result)){		
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
			$HRate = $row['hour_rate'];

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
									 <a href="teacher-student-list?ptec=<?php echo base64_encode($pT); ?>"><button class="mb-2 mr-2 btn btn-outline-info btn-sm" title="Total Number of Students"><?php echo abc("$pT"); ?></button></a>
								</td>
								<td>
									 <a href="teacher-schedule?pT=<?php echo $profile_no; ?>"><button class="mb-2 mr-2 btn btn-outline-info btn-sm" title="Weekly Time Table">Schedule</button></a>
								</td>
								<td>
									 <div class="badge badge-info"><?php echo $hello; ?></div>
								</td>
								<td>
									 <a href="teacher-class-anylasis?profile_no=<?php echo base64_encode($profile_no); ?>"><button class="mb-2 mr-2 btn btn-outline-info btn-sm"><?php echo $gender; ?></button></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo $profile_no; ?>"><button class="mb-2 mr-2 btn btn-outline-info btn-sm" title="Check Zoom/Skype Password">Zoom</button></a>
								</td>
								<td>
									<?php if ($rg_training == 2){ echo '<div class="badge badge-danger">On Training</div>'; } else {echo '<div class="badge badge-success">Active</div>';} ?>
								</td>
								<td><a href="attendence-calander?ptec=<?php echo base64_encode($pT); ?>"><button class="mb-2 mr-2 btn btn-outline-success btn-sm">Attendance</button></a></td>
								<td><a href="block-schedule?t_id=<?php echo $pT; ?>&block=2"><?php echo abc1("$profile_no"); ?></a>
									<a href="block-schedule?t_id=<?php echo $pT; ?>&block=1"><?php echo abc2("$profile_no"); ?></a>
								</td>
							</tr>
							<?php 	
		}
	}	
?>
								</tbody>
								</table>
                                    </div></p>
                                                </div>
                                                <div class="tab-pane" id="tab-animated-1" role="tabpanel">
                                                    <p class="mb-0"><div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
								<th>
									 TEACHER NAME
								</th>
								<th>
									 #
								</th>
								<th>
									 SCHEDULE
								</th>
								<th>
									 NATIONALITY
								</th>
								<th>
									 GENDER
								</th>
								<th>
									 ZOOM ID
								</th>
								<th>
									 STATUS
								</th>
								<th>
									 ATTENDENCE
								</th>
								<th>
									 &nbsp;
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT `profile`.*, `gender`.`gender`, `shift`.`shift_name`, `hello`.`inout_name`, `employee_catagory`.`cat_name` FROM
  			`profile`,`gender`,`shift`,`hello`,`employee_catagory` WHERE profile.g_id=gender.g_id and profile.shift_id=shift.shift_id and profile.inout_id=hello.inout_id and profile.cat_id=employee_catagory.cat_id HAVING (cat_id = 8 OR  teacher_rights = 1) AND active = 1 AND g_id = 1";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
elseif ($numberOfRows > 0) 
	{
	while($row = mysqli_fetch_array($result)){		
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
									 <a href="teacher-student-list?ptec=<?php echo base64_encode($pT); ?>"><button class="mb-2 mr-2 btn btn-outline-info btn-sm" title="Total Number of Students"><?php echo abc("$pT"); ?></button></a>
								</td>
								<td>
									 <a href="teacher-schedule?pT=<?php echo $profile_no; ?>"><button class="mb-2 mr-2 btn btn-outline-info btn-sm" title="Weekly Time Table">Schedule</button></a>
								</td>
								<td>
									 <div class="badge badge-info"><?php echo $hello; ?></div>
								</td>
								<td>
									 <a href="teacher-class-anylasis?profile_no=<?php echo base64_encode($profile_no); ?>"><button class="mb-2 mr-2 btn btn-outline-info btn-sm"><?php echo $gender; ?></button></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo $profile_no; ?>"><button class="mb-2 mr-2 btn btn-outline-info btn-sm" title="Check Zoom/Skype Password">Zoom</button></a>
								</td>
								<td>
									<?php if ($rg_training == 2){ echo '<div class="badge badge-danger">On Training</div>'; } else {echo '<div class="badge badge-success">Active</div>';} ?>
								</td>
								<td><a href="attendence-calander?ptec=<?php echo base64_encode($pT); ?>"><button class="mb-2 mr-2 btn btn-outline-success btn-sm">Attendance</button></a></td>
								<td><a href="block-schedule?t_id=<?php echo $pT; ?>&block=2"><?php echo abc1("$profile_no"); ?></a>
									<a href="block-schedule?t_id=<?php echo $pT; ?>&block=1"><?php echo abc2("$profile_no"); ?></a>
								</td>
							</tr>
							<?php 	
		}
	}	
?>
								</tbody>
								</table>
                                    </div></p>
                                                </div>
                                                <div class="tab-pane" id="tab-animated-2" role="tabpanel">
                                                    <p class="mb-0"><div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
								<th>
									 TEACHER NAME
								</th>
								<th>
									 #
								</th>
								<th>
									 SCHEDULE
								</th>
								<th>
									 NATIONALITY
								</th>
								<th>
									 GENDER
								</th>
								<th>
									 ZOOM ID
								</th>
								<th>
									 STATUS
								</th>
								<th>
									 ATTENDENCE
								</th>
								<th>
									 &nbsp;
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT `profile`.*, `gender`.`gender`, `shift`.`shift_name`, `hello`.`inout_name`, `employee_catagory`.`cat_name` FROM
  			`profile`,`gender`,`shift`,`hello`,`employee_catagory` WHERE profile.g_id=gender.g_id and profile.shift_id=shift.shift_id and profile.inout_id=hello.inout_id and profile.cat_id=employee_catagory.cat_id HAVING (cat_id = 8 OR  teacher_rights = 1) AND active = 1 AND g_id = 2";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
elseif ($numberOfRows > 0) 
	{
	while($row = mysqli_fetch_array($result)){		
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
									 <a href="teacher-student-list?ptec=<?php echo base64_encode($pT); ?>"><button class="mb-2 mr-2 btn btn-outline-info btn-sm" title="Total Number of Students"><?php echo abc("$pT"); ?></button></a>
								</td>
								<td>
									 <a href="teacher-schedule?pT=<?php echo $profile_no; ?>"><button class="mb-2 mr-2 btn btn-outline-info btn-sm" title="Weekly Time Table">Schedule</button></a>
								</td>
								<td>
									 <div class="badge badge-info"><?php echo $hello; ?></div>
								</td>
								<td>
									 <a href="teacher-class-anylasis?profile_no=<?php echo base64_encode($profile_no); ?>"><button class="mb-2 mr-2 btn btn-outline-info btn-sm"><?php echo $gender; ?></button></a>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo $profile_no; ?>"><button class="mb-2 mr-2 btn btn-outline-info btn-sm" title="Check Zoom/Skype Password">Zoom</button></a>
								</td>
								<td>
									<?php if ($rg_training == 2){ echo '<div class="badge badge-danger">On Training</div>'; } else {echo '<div class="badge badge-success">Active</div>';} ?>
								</td>
								<td><a href="attendence-calander?ptec=<?php echo base64_encode($pT); ?>"><button class="mb-2 mr-2 btn btn-outline-success btn-sm">Attendance</button></a></td>
								<td><a href="block-schedule?t_id=<?php echo $pT; ?>&block=2"><?php echo abc1("$profile_no"); ?></a>
									<a href="block-schedule?t_id=<?php echo $pT; ?>&block=1"><?php echo abc2("$profile_no"); ?></a>
								</td>
							</tr>
							<?php 	
		}
	}	
?>
								</tbody>
								</table>
                                    </div></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="notes-d" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<script>
$('.notes').click(function(){
    var famID=$(this).attr('data-id');

    $.ajax({url:"skype-details.php?famID="+famID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>