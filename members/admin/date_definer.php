<?php
date_default_timezone_set("Africa/Cairo");
$date_check = date('Y-m-d', time());
$teacher =$_REQUEST['pteacher'];
  $date =$_REQUEST['date'];
  $time =$_REQUEST['time_id'];
  $posted_date = strtotime($date);
$posted_day = date('N', $posted_date);
  if ($date > $date_check)
  		{
  		header('Location: search-advance-class?&teacher='.$teacher.'&date='.$date.'&day='.$posted_day.'&time='.$time.'');
  		}
  else {
  if (!empty($teacher) && !empty($date) && !empty($time)) 
  		{
  		header('Location: teacher_date_time?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  elseif (empty($teacher) && !empty($date) && !empty($time)) 
  		{
  		header('Location: date_time?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  elseif (!empty($teacher) && empty($date) && !empty($time)) 
  		{
  		header('Location: teacher_time?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  elseif (!empty($teacher) && !empty($date) && empty($time)) 
  		{
  		header('Location: teacher_date?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  elseif (empty($teacher) && empty($date) && !empty($time)) 
  		{
  		header('Location: time?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  elseif (empty($teacher) && !empty($date) && empty($time)) 
  		{
  		header('Location: date?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  elseif (!empty($teacher) && empty($date) && empty($time)) 
  		{
  		header('Location: teacher?&teacher='.$teacher.'&date='.$date.'&time='.$time.'');
  		}
  else header('Location: ' . $_SERVER['HTTP_REFERER'].'?err=1');
  	}
?>