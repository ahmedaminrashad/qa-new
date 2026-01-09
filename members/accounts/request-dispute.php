<?php session_start(); ?>
<?php
 require ("../includes/dbconnection.php");
 include("../includes/main-var.php");
 date_default_timezone_set($TimeZoneCustome);
$time_start = date('Y-m-d H:i:s');
$parentID =base64_decode($_REQUEST['parentID']);
$parentName =base64_decode($_REQUEST['parentName']);
$studentName =base64_decode($_REQUEST['studentName']);
$teacherID =base64_decode($_REQUEST['teacherID']);
$studentID =base64_decode($_REQUEST['studentID']);
$teacherName =base64_decode($_REQUEST['teacherName']);
$historyID =base64_decode($_REQUEST['historyID']);
$date =base64_decode($_REQUEST['date']);
$sql = "SELECT * FROM class_disputes WHERE history_id = '$historyID'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
$sql = "INSERT INTO class_disputes (parent_id, student_name, teacher_id, date, reported, teacher_name, parent_name, history_id, student_id)
					VALUES('$parentID','$studentName','$teacherID','$date','$time_start','$teacherName','$parentName','$historyID','$studentID')";
					if ($conn->query($sql) === TRUE) { echo '<script type="text/javascript"> alert("You dispute has been register. Plase give us some time to check records so that we can give you details on your request.");close_window();</script>'; }
}
elseif ($numberOfRows > 0)
{
    echo '<script type="text/javascript"> alert("You have already registered a dispute on this class. We will get bank to you very soon. For instant assistance please contact Admin TarteeleQuran HelpDesk.");close_window();</script>';
}

  ?>