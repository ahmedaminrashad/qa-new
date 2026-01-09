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
  require_once("dbcontroller.php");
	$db_handle = new DBController();
	
	$sql = "SELECT * from diary_notes";
	$productResult = $db_handle->readData($sql);
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
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<form>
				<input type="date" contentEditable="true" data-id="date">
				<input type="text" contentEditable="true" data-id="note">
								</form>
								<div id="btnSaveAction">Save to Database</div>
</div>
								<table class="table table-hover table-light">
								<thead>
								<tr>
								<th>
									 Teacher Name
								</th>
								<th>
									 No.
								</th>
							</tr>
								</thead>
								<tbody id="ajax-response">
								<?php 
// sending query
$result = mysql_query("SELECT * FROM diary_notes HAVING status = 1 ORDER BY note_id DESC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">No Active Note Found!</div>';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
		if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#F7F7FF';
				}
		
			$noteid = MYSQL_RESULT($result,$i,"note_id");
			$user = MYSQL_RESULT($result,$i,"user");
			$pid = MYSQL_RESULT($result,$i,"family");
			$ndate = MYSQL_RESULT($result,$i,"date");
			$note_des = MYSQL_RESULT($result,$i,"note");
			$nstatus = MYSQL_RESULT($result,$i,"status");
			$pname = MYSQL_RESULT($result,$i,"family_name");
			$ndatein = MYSQL_RESULT($result,$i,"dtae_in");
			$man = MYSQL_RESULT($result,$i,"user_name");
?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $ndate; ?>
								</td>
								<td>
									 <?php echo $note_des; ?>
								</td>
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
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
$("#btnSaveAction").on("click",function(){
	params = ""
	$("input[contentEditable='true']").each(function(){
		if($(this).text() != "") {
			if(params != "") {
				params += "&";
			}
			params += $(this).data('id')+"="+$(this).text();
		}
	});
	if(params!="") {
		$.ajax({
			url: "insert-row",
			type: "POST",
			data:params,
			success: function(response){
			  $("#ajax-response").append(response);
			  $("input[contentEditable='true']").text("");
			}
		});
	}
});
</script>