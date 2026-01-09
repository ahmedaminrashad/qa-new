<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
$teacher =$_REQUEST['pteacher'];
$date1 =$_REQUEST['date1'];
$date2 =$_REQUEST['date2'];
function status($var, $var2)
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM course Where course_id = '$var'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$SNat = $row['nature'];
$sql = "SELECT * FROM account Where parent_id = '$var2'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$PNat = $row['active'];
if ($SNat == 1 && ($PNat != 7 OR $PNat != 3)) { echo '#BCF5A9';}
elseif ($SNat == 1 && ($PNat == 7 OR $PNat == 3)) { echo '#fffff';}
elseif ($SNat == 2 && ($PNat != 7 OR $PNat != 3)) { echo '#F5A9A9';}
elseif ($SNat == 2 && ($PNat == 7 OR $PNat == 3)) { echo '#F9BCBC';}

}
function SName($var)
{
require ("../includes/dbconnection.php");
$teacher =$_REQUEST['pteacher'];
$sql = "SELECT * FROM course Where course_id = '$var'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
					$hidden_tt = $row['course_yrSec'];
					$pt_tt = $row['parent_id'];
					$ptech = $row['Teacher'];

$sql = "SELECT * FROM sched Where course_id = $var";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			$l = '<i class="fa fa-exclamation font-red"></i>';
			}
		elseif ($numberOfRows > 0) 
			{
			$l = '<i class="fa fa-check font-green"></i>';
			}
			if ($ptech == 0 OR empty($ptech)) {
			echo '<td><a href="parent-accounts-profile?parent_id='.base64_encode($pt_tt).'">'.$hidden_tt.'</a> '.$l.'</td>
			  		<td><div class="ml-auto badge badge-danger">Not-Assiged</div></td>';
			  		}
			 elseif ($ptech > 0) {
	$sql = "SELECT * FROM profile Where teacher_id = '$ptech'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
	$Tname = $row['teacher_name'];
			  		echo '<td><a href="parent-accounts-profile?parent_id='.base64_encode($pt_tt).'">'.$hidden_tt.'</a> '.$l.'</td>
			  		<td>'.$Tname.'</td>';
			}}
			}
			}
			}
}
function PName($var)
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM account Where parent_id = '$var'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
					$hidden_tt = $row['parent_name'];
					$pt_tt = $row['parent_id'];
					$active_s = $row['active'];
					if ($active_s == 11){ $a = '<a href="parent-accounts-profile?parent_id='.base64_encode($pt_tt).'">'.$hidden_tt.'</a> <span class="label label-warning"><strong>On Trial</strong></span>'; } 
					elseif ($active_s == 7){ $a = '<a href="parent-accounts-profile?parent_id='.base64_encode($pt_tt).'">'.$hidden_tt.'</a> <span class="label label-info"><strong>On Leave</strong></span>'; } 
					elseif ($active_s == 3){ $a = '<a href="parent-accounts-profile?parent_id='.base64_encode($pt_tt).'">'.$hidden_tt.'</a> <span class="label label-danger"><strong>Deactived</strong></span>'; } 
					elseif ($active_s == 17){ $a = '<a href="parent-accounts-profile?parent_id='.base64_encode($pt_tt).'">'.$hidden_tt.'</a> <span class="label label-danger"><strong>Suspended</strong></span>'; } 
					else { echo '<a href="parent-accounts-profile?parent_id='.base64_encode($pt_tt).'">'.$hidden_tt.'</a> <span class="label label-success"><strong>Regular</strong></span>'; }
	
			  		echo $a;
			}
			}
}
?>
<?php
$sy = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
?>
<?php
$page_title = 'Student Details';
$page_subtitle = 'Student Details';
$table_name = 'Student Details';
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
<th>
Sr.No
</th>
<th>
Student Name
</th>
<th>
Current Teacher
</th>
<th>
Parent
</th>
</tr>
								</thead>
								<tbody>
<?php
// sending query
$sql = "SELECT * FROM class_history WHERE teacher_id = '$teacher' AND date_admin >= '$date1' AND date_admin <= '$date2' GROUP BY course_id";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$Course_ID = $row['course_id'];
$pid = $row['parent_id'];
?>
<tr bgcolor="<?php echo status("$Course_ID", "$pid"); ?>">
<td>
<?php echo ++$counter; ?>
</td>
<?php echo SName("$Course_ID"); ?>
<td>
<?php echo PName("$pid"); ?>
</td>
</tr>
<?php
}
}
?>
<?php echo $footer; ?>