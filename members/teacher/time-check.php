<?php
$zone =$_REQUEST['timezone'];
date_default_timezone_set($zone);
$time_start = date("H:i:s", time(true));
$TTS =$_REQUEST['TTS'];
$TTE =$_REQUEST['TTE'];

$history =$_REQUEST['history_id'];
//if ($time_start >= $TTS && $time_start <= $TTE )
if ( 1 == 1){
$history =$_REQUEST['history_id'];
$time =$_REQUEST['time_id'];
$Sid =$_REQUEST['Sid'];
  $Tid =$_REQUEST['Tid'];
  $Pid =$_REQUEST['Pid'];
header("Location: file-activate?history_id=".$history."&zoom=".$zoom_link."&Sid=".$Sid."&Tid=".$Tid."&Pid=".$Pid."");
}
else {
header("Location: teacher-home?error_id=1");
}		
?>
