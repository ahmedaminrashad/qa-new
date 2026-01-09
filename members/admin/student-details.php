<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php"); 
  if ($right != 4)
  {
  header('Location: admin-home');
  } 
  $link = $_SERVER['REQUEST_URI'];
  function student_all()
{
require ("../includes/dbconnection.php");
$sql = "SELECT course_id FROM course";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '0';
			}
		elseif ($numberOfRows > 0) 
			{
echo $numberOfRows;
}
	}
  function student_stu($var)
{
require ("../includes/dbconnection.php");
$sql = "SELECT course_id FROM course WHERE nature = '$var'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
echo $numberOfRows;
}
	}
	function student_gen($var,$g)
{
require ("../includes/dbconnection.php");
$sql = "SELECT course_id FROM course WHERE nature = '$var' AND g_id = '$g'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
echo $numberOfRows;
}
	}
  function student_tot($var)
{
require ("../includes/dbconnection.php");
$sql = "SELECT course_id FROM course WHERE dept_id = '$var'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '0';
			}
		elseif ($numberOfRows > 0) 
			{
echo $numberOfRows;
}
	}
function student_seg($var,$g,$a)
{
require ("../includes/dbconnection.php");
$sql = "SELECT course_id FROM course WHERE dept_id = '$var' AND g_id = '$g' AND nature = '$a'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
echo $numberOfRows;
}
	}
function student($var,$a)
{
require ("../includes/dbconnection.php");
$sql = "SELECT course_id FROM course WHERE dept_id = '$var' AND nature = '$a'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
echo $numberOfRows;
}
	}
?>
<?php
$sy = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
?>
<?php
$page_title = 'Student Details';
$page_subtitle = 'Student Details';
$table_name = 'Student Details';
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
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr class="bg-info">
								<th>
									 Sr.No
								</th>
								<th>
									 Course Name
								</th>
								<th>
									 Total Active 
								</th>
								<th>
									 Male Active 
								</th>
								<th>
									 Female Active 
								</th>
								<th>
									 Total In-Active 
								</th>
								<th>
									 Male In-Active 
								</th>
								<th>
									 Female In-Active 
								</th>
								<th>
									 All Total 
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT * FROM `dept` WHERE type_id = 1";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$Dept_ID = $row['dept_id'];
			$name = $row['department'];
?>
								<tr>
								<td bgcolor="#ffffcc">
									 <?php echo ++$counter; ?>
								</td>
								<td bgcolor="#ffffcc">
									 <?php echo $name; ?>
								</td>
								<td bgcolor="#ccffcc">
									 <?php echo student("$Dept_ID","1"); ?>
								</td>
								<td bgcolor="#ccffcc">
									 <?php echo student_seg("$Dept_ID","1","1"); ?>
								</td>
								<td bgcolor="#ccffcc">
									 <?php echo student_seg("$Dept_ID","2","1"); ?>
								</td>
								<td bgcolor="#e6f2ff">
									 <?php echo student("$Dept_ID","2"); ?>
								</td>
								<td bgcolor="#e6f2ff">
									 <?php echo student_seg("$Dept_ID","1","2"); ?>
								</td>
								<td bgcolor="#e6f2ff">
									 <?php echo student_seg("$Dept_ID","2","2"); ?>
								</td>
								<td class="bg-info">
									 <?php echo student_tot("$Dept_ID"); ?>
								</td>
							</tr>
							<?php 	
		}
	}	
?>
								<tr bgcolor="#ffffcc">
								    <td>
								        --
								    </td>
								    <td>
								        Total
								    </td>
								    <td>
								        <?php echo student_stu("1"); ?>
								    </td>
								    <td>
								        <?php echo student_gen("1", "1"); ?>
								    </td>
								    <td>
								        <?php echo student_gen("1", "2"); ?>
								    </td>
								    <td>
								        <?php echo student_stu("2"); ?>
								    </td>
								    <td>
								        <?php echo student_gen("2", "1"); ?>
								    </td>
								    <td>
								        <?php echo student_gen("2", "2"); ?>
								    </td>
								    <td>
								        <?php echo student_all(); ?>
								    </td>
								</tr>
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