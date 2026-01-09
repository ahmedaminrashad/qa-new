<?php
$zone =$_REQUEST['timezone'];
date_default_timezone_set($zone);
$time_start = date("H:i:s", time(true));
$TTS =$_REQUEST['TTS'];

$history =$_REQUEST['history_id'];
//if ($time_start <= $TTS){
header("Location: leave_absent_mark?history_id=".$history."&attend=5");
//}
//else {
//header("Location: teacher-home?error_id=2");
//}		
?>
