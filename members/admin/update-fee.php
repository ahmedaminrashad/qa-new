<?php

  require ("../includes/dbconnection.php"); 
  $p_id =$_REQUEST['parent_id']; 
$cur_id =$_REQUEST['ttcur'];
$nod =$_REQUEST['nnod'];
$aaa =$_REQUEST['aaa'];
$tid =$_REQUEST['emailid'];
$tname =$_REQUEST['emailname'];
	header('Location: parent-accounts-profile?parent_id='.$p_id);

?>
