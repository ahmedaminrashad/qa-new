<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  include("load-data-files/home-functions.php");
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
function book($d, $t){
require ("../includes/dbconnection.php");
$pT =$_REQUEST['pT'];
$sql = "SELECT * FROM book_time HAVING teacher_id = '$pT' and day_id = '$d' and start_time <= '$t' and end_time > '$t'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0){
echo '<a class="time" href="#invoice" data-toggle="modal" data-target="#invoice" teacher-id="'.$pT.'"">///</a>';
}
elseif ($numberOfRows > 0)
{
while($row = mysqli_fetch_assoc($result))
{
$sched12 = $row['des'];
echo $sched12;
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
echo '<a class="add" href="#invoice" data-toggle="modal" data-target="#invoice" teacher-id="'.$pT.'" time-id="'.$t.'" day-id="'.$d.'"><font color="#FFFFFF">--</font></a>';
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

$sql = "SELECT teacher_name, time FROM profile WHERE teacher_id = '$pT'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$tzy_tech = $row['time'];
$hidden_pt = $row['teacher_name'];

$sql = "SELECT course_yrSec FROM course WHERE course_id = '$SID'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$hidden_pcourse = $row['course_yrSec'];

$local_tz = new DateTimeZone($tzy_tech);
$local = new DateTime('now', $local_tz);

$user_tz = new DateTimeZone($tzy_stud);
$user = new DateTime('now', $user_tz);

$local_offset = $local->getOffset() / 60;
$user_offset = $user->getOffset() / 60;

$Sdiff = $user_offset - $local_offset;

$stud_startTime = date('H:i:s',strtotime($Sdiff. 'minutes',strtotime($tt1)));
if ($ts1 != $stud_startTime) { $er = '<a href="0001.php?teacherID='.$pT.'&studentID='.$SID.'"><div class="ml-auto badge badge-danger" title = "Change Teacher Time While Student Time will remain same."><i class="lnr-users"></i></div></a> <a href="0002.php?teacherID='.$pT.'&studentID='.$SID.'"><div class="ml-auto badge badge-warning" title = "Change Student Time While Teacher Time will remain same"><i class="lnr-graduation-hat"></i></div></a>'; }
else {$er = ''; }
echo '<a class="edit" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="'.$sched.'" tech-id="'.$TID.'" sut-id="'.$SID.'"><font color="#FFFFFF">'.$hidden_pcourse.'</font></a> <a href="parent-accounts-profile?parent_id='.base64_encode($PID).'" target="_blank"><i class="lnr-users"></i></a> '.$er.'';
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
                                <div class="card-body"><h5 class="card-title"><button class="mb-2 mr-2 btn btn-outline-success"><?php
$sql = "SELECT * FROM profile HAVING teacher_id='$pT'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$teacher = $row['teacher_name'];
$sss = $row['schedule_status'];
}
}
echo "Teacher Name: <b>$teacher</b>"; ?><br><?php
$sql = "SELECT * FROM `sched` WHERE teacher_id='$pT'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo "Classes in a Week: <b>0</b>";
			}
		elseif ($numberOfRows > 0) 
			{
echo "Classes in a Week: <b>".$numberOfRows."</b>";
}
?></button></h5>
                                    <div class="table-responsive">
                                        <table class="mb-0 table">
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
<td bgcolor="<?php echo color("1","$name"); ?><?php echo color2('1','$name'); ?>"><font color="#FFFFFF"><?php echo abc("1","$name"); ?> <?php echo book("1","$name"); ?></font></td>
<td bgcolor="<?php echo color("2","$name"); ?><?php echo color2('2','$name'); ?>"><font color="#FFFFFF"><?php echo abc("2","$name"); ?> <?php echo book("2","$name"); ?></font></td>
<td bgcolor="<?php echo color("3","$name"); ?><?php echo color2('3','$name'); ?>"><font color="#FFFFFF"><?php echo abc("3","$name"); ?> <?php echo book("3","$name"); ?></font></td>
<td bgcolor="<?php echo color("4","$name"); ?><?php echo color2('4','$name'); ?>"><font color="#FFFFFF"><?php echo abc("4","$name"); ?> <?php echo book("4","$name"); ?></font></td>
<td bgcolor="<?php echo color("5","$name"); ?><?php echo color2('5','$name'); ?>"><font color="#FFFFFF"><?php echo abc("5","$name"); ?> <?php echo book("5","$name"); ?></font></td>
<td bgcolor="<?php echo color("6","$name"); ?><?php echo color2('6','$name'); ?>"><font color="#FFFFFF"><?php echo abc("6","$name"); ?> <?php echo book("6","$name"); ?></font></td>
<td bgcolor="<?php echo color("7","$name"); ?><?php echo color2('7','$name'); ?>"><font color="#FFFFFF"><?php echo abc("7","$name"); ?> <?php echo book("7","$name"); ?></font></td>
</tr>
							<?php 		
		}
	}	
?>
                                            </tbody>
                                        </table>
                                        <table class="mb-0 table">
<thead>
<tr>
<th>#</th>
<th>Teacher Name</th>
<th>Day</th>
<th>From</th>
<th>To</th>
<th>Description</th>
<th></th>
</tr>
</thead>
<tbody>
<?php
// sending query
$sql = "SELECT * FROM book_time WHERE teacher_id = $pT";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$book_id = $row['book_id'];
$teacher_id = $row['teacher_id'];
$day_id = $row['day_id'];
$start_time = $row['start_time'];
$end_time = $row['end_time'];
$des = $row['des'];
if ($day_id == 1) { $a = 'Monday'; }
elseif ($day_id == 2) { $a = 'Tuesday'; }
elseif ($day_id == 3) { $a = 'Wednesday'; }
elseif ($day_id == 4) { $a = 'Thursad'; }
elseif ($day_id == 5) { $a = 'Friday'; }
elseif ($day_id == 6) { $a = 'Saturday'; }
elseif ($day_id == 7) { $a = 'Sunday'; }
$d1=strtotime($start_time);
$d2=strtotime($end_time);
?>
<tr>
<td><?php echo ++$counter; ?></td>
<td><?php echo $tt; ?></td>
<td><?php echo $a; ?></td>
<td><?php echo date("h:i:s a", $d1); ?></td>
<td><?php echo date("h:i:s a", $d2); ?></td>
<td><?php echo $des; ?></td>
<td><a href="delete-break?ddd=<?php echo $book_id; ?>"><button class="mb-2 mr-2 btn btn-outline-success">Delete</button></a></td>
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
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="invoice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<script>
$('.add').click(function(){
var TeacherID=$(this).attr('teacher-id');
var TimeID=$(this).attr('time-id');
var DayID=$(this).attr('day-id');

$.ajax({url:"01-add-schedule.php?TeacherID="+TeacherID+"&TimeID="+TimeID+"&DayID="+DayID,cache:false,success:function(result){
$(".modal-content").html(result);
}});
});
</script>
<script>
$('.time').click(function(){
var TeacherID=$(this).attr('teacher-id');

$.ajax({url:"set-break.php?TeacherID="+TeacherID,cache:false,success:function(result){
$(".modal-content").html(result);
}});
});
</script>
<script>
$('.edit').click(function(){
var famID=$(this).attr('data-id');
var TechID=$(this).attr('tech-id');
var SutID=$(this).attr('sut-id');

$.ajax({url:"01-edit-schedule.php?famID="+famID+"&TechID="+TechID+"&SutID="+SutID,cache:false,success:function(result){
$(".modal-content").html(result);
}});
});
</script>