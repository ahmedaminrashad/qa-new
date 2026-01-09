<?php
require ("../includes/dbconnection.php");
$date = date('Y-m-d', time());
$teacher =$_REQUEST['pteacher'];
  $c =$_REQUEST['date'];
  $posted_date = strtotime($c);
$posted_day = date('N', $posted_date);
  if ($c > $date)
  		{
  		header('Location: create-advance-class?&teacher='.$teacher.'&date='.$c.'&day='.$posted_day.'');
  		}
  else 	{
  		header('Location: teacher-class-search-results-past?&teacher='.$teacher.'&date='.$c.'&check=1');
  		}
?>