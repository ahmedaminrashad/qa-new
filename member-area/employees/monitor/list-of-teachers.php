<?php session_start(); ?>
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("header.php");
function abc($er)
{
// sending query
   $result = mysql_query("SELECT * FROM course Where Teacher = $er");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo $tnumberOfRows;
}

function abc1($er)
{
// sending query
   $result = mysql_query("SELECT * FROM profile Where teacher_id = '$er' and schedule_status = '1'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '';
			}
		else if ($tnumberOfRows > 0) 
			{
			echo '<button type="button" class="btn red btn-xs">Blocked</button>';
			}
	}
	
function abc2($er)
{
// sending query
   $result = mysql_query("SELECT * FROM profile Where teacher_id = '$er' and schedule_status = '2'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '';
			}
		else if ($tnumberOfRows > 0) 
			{
			echo '<button type="button" class="btn green btn-xs">Un-block</button>';
			}
	}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $search_bar; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Teachers<small> Active</small></h1>
			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">
			</div>
			<!-- END PAGE TOOLBAR -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">

			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 List of Active Teachers
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4><?php 
$result = mysql_query("SELECT * FROM profile WHERE (cat_id = 8 OR  teacher_rights = 1) AND active = 1");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo "Total Number of Active Teachers: $numberOfRows"; ?></h4>
						<div class="portlet-title">

															<a href="list-of-teachers" class="btn blue"><i class="fa fa-user"></i> Active Teachers <b>(No. <?php 
$result = mysql_query("SELECT * FROM profile WHERE (cat_id = 8 OR  teacher_rights = 1) AND active = 1");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
															<a href="list-of-inactive-teachers" class="btn red"><i class="fa fa-user-times"></i> In-active Teachers <b>(No. <?php 
$result = mysql_query("SELECT * FROM profile WHERE (cat_id = 8 OR  teacher_rights = 1) AND active = 2");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>

						</div>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover table-light">
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
									 &nbsp;
								</th>
								<th>
									 Status
								</th>
								<th>
									 Attendance
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT `profile`.*, `Gender`.`gender`, `shift`.`shift_name`, `hello`.`inout_name`, `employee_catagory`.`cat_name` FROM
  			`profile`,`Gender`,`shift`,`hello`,`employee_catagory` WHERE profile.g_id=Gender.g_id and profile.shift_id=shift.shift_id and profile.inout_id=hello.inout_id and profile.cat_id=employee_catagory.cat_id HAVING (cat_id = 8 OR  teacher_rights = 1) AND active = 1");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while($row = mysql_fetch_array($result))
		{		
			if($row['g_id']==1 and $row['inout_id']==1) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#D3D3D3';
				}		
				$profile_no = MYSQL_RESULT($result,$i,"teacher_id");
			$tname = MYSQL_RESULT($result,$i,"teacher_name");
			$shift = MYSQL_RESULT($result,$i,"shift_name");
			$q1 = MYSQL_RESULT($result,$i,"Qualification1");
			$gender = MYSQL_RESULT($result,$i,"gender");
			$sky = MYSQL_RESULT($result,$i,"Skype");		
			$pT = MYSQL_RESULT($result,$i,"teacher_id");
			$spass = MYSQL_RESULT($result,$i,"s_pass");
			$hello = MYSQL_RESULT($result,$i,"inout_name");
			$aimage = MYSQL_RESULT($result,$i,"ima");
			$witness_id1 = MYSQL_RESULT($result,$i,"w1");
			$witness_id2 = MYSQL_RESULT($result,$i,"w2");
			$cheque_id = MYSQL_RESULT($result,$i,"cheque");
			$agree_id = MYSQL_RESULT($result,$i,"agreement");
			$employ = MYSQL_RESULT($result,$i,"cat_name");
			$rg_training = MYSQL_RESULT($result,$i,"training");

?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td class="fit">
										<img class="user-pic" src="../../uploads/thumb/<?php echo $aimage; ?>">
									</td>
								<td>
									 <b><a href="teacher-accounts-profile?profile_no=<?php echo base64_encode($profile_no); ?>"><?php echo $tname; ?> (<?php echo $profile_no; ?>)</a> <?php if ($witness_id1 == 1 OR $witness_id2 == 1 OR $cheque_id == 1 Or $agree_id == 1) {echo '<i class="fa fa-warning font-yellow"></i>';} else {echo '';} ?></b>
								</td>
								<td>
									 <a href="teacher-student-list?ptec=<?php echo base64_encode($pT); ?>"><button type="button" class="btn green btn-xs"><?php echo abc("$pT"); ?></button></a>
								</td>
								<td>
									 <a href="teacher-schedule?pT=<?php echo $profile_no; ?>"><button type="button" class="btn green btn-xs">Schedule</button></a>
								</td>
								<td>
									 <?php echo $hello; ?>
								</td>
								<td>
									 <?php echo $gender; ?>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo $profile_no; ?>"><span class="label label-sm label-info" title="Leave">Check</span></a>
								</td>
								<td><a href="block-schedule?t_id=<?php echo $pT; ?>&block=2"><?php echo abc1("$profile_no"); ?></a>
									<a href="block-schedule?t_id=<?php echo $pT; ?>&block=1"><?php echo abc2("$profile_no"); ?></a>
								</td>
								<td>
									<?php if ($rg_training == 2){ echo '<font color="FE2E2E"><b><a href="teacher-rights-training?a_id='.$profile_no.'&link='.$link.'&sts=1">On Training</a></b></font>'; } else {echo 'Active';} ?>
								</td>
								<td><a href="attendence-calander?ptec=<?php echo base64_encode($pT); ?>"><button type="button" class="btn green btn-xs">Attendance</button></a></td>
							</tr>
							<?php 	
		$i++;		
		}
	}	
?>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
					<div class="modal fade bs-modal-lg" id="notes-d" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>
<script>
$('.notes').click(function(){
    var famID=$(this).attr('data-id');

    $.ajax({url:"skype-details.php?famID="+famID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>