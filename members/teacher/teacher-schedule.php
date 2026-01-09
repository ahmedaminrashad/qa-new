<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $pT =$_REQUEST['pT'];
$sql = "SELECT * FROM profile HAVING teacher_id = $pT";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0)
{
echo "";
}
elseif ($numberOfRows > 0)
{
while($row = mysqli_fetch_assoc($result))
{
$st1 = $row['st1'];
$st2 = $row['st2'];
$et1 = $row['et1'];
$et2 = $row['et2'];
$st3 = $row['st3'];
$et3 = $row['et3'];
}
}
function color($d, $t){
require ("../includes/dbconnection.php");
$pT =$_REQUEST['pT'];
$sql = "SELECT * FROM sched HAVING teacher_id = '$pT' and day_id = '$d' and time_start <= '$t' and time_end > '$t'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0){
echo '#CECE0F';
}
elseif ($numberOfRows > 0)
{
echo '#989800';
}
}
function color2($d, $t){
require ("../includes/dbconnection.php");
$pT =$_REQUEST['pT'];
$sql = "SELECT * FROM profile HAVING teacher_id = $pT";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0){
echo '';
}
elseif ($numberOfRows > 0)
{
while($row = mysqli_fetch_assoc($result))
{
$schedule_iti = $row['schedule_status'];
if ($schedule_iti == 1){
echo '';
}
elseif ($schedule_iti == 2){
echo '#000000';
}

}
}
}
function abc($d, $t)
{
require ("../includes/dbconnection.php");
$pT =$_REQUEST['pT'];
$sql = "SELECT * FROM sched WHERE teacher_id='$pT' and day_id = '$d' and time_start = '$t'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0){
echo '<font color="#FFFFFF">--</font>';
}
elseif ($numberOfRows > 0)
{
while($row = mysqli_fetch_assoc($result))
{
$sched = $row['sched_id'];
$PID = $row['parent_id'];
$TID = $row['teacher_id'];
$SID = $row['course_id'];
$hidden_pday = $row['day_id'];
$tt1 = $row['time_start'];
$tt2 = $row['time_end'];
$hidden_pdays = $row['sday_id'];
$ts1 = $row['start_time_S'];
$ts2 = $row['end_time_S'];
$trial = $row['status'];
$tzy_stud = $row['php_tz'];

$sql = "SELECT course_yrSec FROM course WHERE course_id = '$SID'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$hidden_pcourse = $row['course_yrSec'];

echo '<font color="#FFFFFF">'.$hidden_pcourse.'</font>';
if ($hidden_pday == $d && $trial == 11){
echo "*";
}
if ($hidden_pday == $d && $trial == 17){
echo "#";
}
}
}
}
function blocked($d){
require ("../includes/dbconnection.php");
$pT =$_REQUEST['pT'];
$sql = "SELECT * FROM profile HAVING teacher_id = $pT";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0){
echo '';
}
elseif ($numberOfRows > 0)
{
while($row = mysqli_fetch_assoc($result))
{
$schedule_iti = $row['schedule_status'];
if ($schedule_iti == 1){
echo '';
}
elseif ($schedule_iti == 2){
echo "<h4><font color='#EE1B1B'> <b>Schedule Blocked</b></font><h4>";
}
}
}
}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'List of Classes';
$page_subtitle = 'List of all classes today!';
$table_name = 'CLasses';
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
                                <div class="card-body"><h5 class="card-title"><div class="ml-auto badge badge-success">Teacher's Regular Schedule</div></h5>
                                    <div class="table-responsive">
                                        <table class="mb-0 table">
                                            <thead>
								<thead>
								<tr>
<th>Time/Date</th>
<th>MONDAY</th>
<th>TUESDAY</th>
<th>WEDNESDAY</th>
<th>THURSDAY</th>
<th>FRIDAY</th>
<th>SATURDAY</th>
<th>SUNDAY</th>
</tr>
                                            </thead>
                                            <tbody>
                                            <?php
// sending query
require ("../includes/dbconnection.php");
$pT =$_REQUEST['pT'];
$sql = "SELECT * FROM timetable WHERE (TimeID >= $st1 AND TimeID <=$et1) OR (TimeID >= $st2 AND TimeID <=$et2) OR (TimeID >= $st3 AND TimeID <=$et3) ANd TimeID != 97";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0){
echo 'Sorry no record found!';
}
elseif ($numberOfRows > 0)
{
while($row = mysqli_fetch_array($result))
{
$ID = $row['TimeID'];
$name = $row['TimeName'];
$list = $row['TimeList'];
if ($ID <= 48){$color = '#b3b3ff';}
else {$color = '#00a3cc';}

?>
								<tr>
<td bgcolor="<?php echo $color; ?>"><?php echo $list; ?></td>
<td bgcolor="<?php echo color("1","$name"); ?><?php echo color2('1','$name'); ?>"><font color="#FFFFFF"><?php echo abc("1","$name"); ?></font></td>
<td bgcolor="<?php echo color("2","$name"); ?><?php echo color2('2','$name'); ?>"><font color="#FFFFFF"><?php echo abc("2","$name"); ?></font></td>
<td bgcolor="<?php echo color("3","$name"); ?><?php echo color2('3','$name'); ?>"><font color="#FFFFFF"><?php echo abc("3","$name"); ?></font></td>
<td bgcolor="<?php echo color("4","$name"); ?><?php echo color2('4','$name'); ?>"><font color="#FFFFFF"><?php echo abc("4","$name"); ?></font></td>
<td bgcolor="<?php echo color("5","$name"); ?><?php echo color2('5','$name'); ?>"><font color="#FFFFFF"><?php echo abc("5","$name"); ?></font></td>
<td bgcolor="<?php echo color("6","$name"); ?><?php echo color2('6','$name'); ?>"><font color="#FFFFFF"><?php echo abc("6","$name"); ?></font></td>
<td bgcolor="<?php echo color("7","$name"); ?><?php echo color2('7','$name'); ?>"><font color="#FFFFFF"><?php echo abc("7","$name"); ?></font></td>
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