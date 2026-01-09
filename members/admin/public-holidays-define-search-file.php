<?php
require ("../includes/dbconnection.php");
$date = date('Y-m-d', time());
$msg =$_POST['msg'];
$teacher =$_POST['checkbox'];
  $c =$_POST['date'];
  $posted_date = strtotime($c);
$posted_day = date('N', $posted_date);
  if ($c > $date)
  		{
  		header('Location: public-holidays-advance-class?&teacher='.implode(',', array_map('intval', $teacher)).'&date='.$c.'&day='.$posted_day.'&msg='.$msg.'');
  		}
  else 	{
  		header('Location: public-holidays-teacher-class-search-results?&teacher='.$teacher.'&date='.$c.'&check=1&msg='.$msg.'');
  		}
?>