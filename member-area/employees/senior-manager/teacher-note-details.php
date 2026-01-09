<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
?>
<?php 
// sending query
$result = mysql_query("SELECT * FROM profile WHERE teacher_id = $famID");
	if (!$result) 
	{
    die("There is an issue in data");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'No Entry Found';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			$atname = MYSQL_RESULT($result,$i,"teacher_name");
			$anote = MYSQL_RESULT($result,$i,"note");
?>
<div class="portlet-body">
							<div class="note note-success">
								<h4 class="block"><?php echo $atname; ?></h4>
								<p>
									 <?php echo $anote; ?>
								</p>
							</div>
							</div>
							<?php 	
		$i++;		
		}
	}	
?>
