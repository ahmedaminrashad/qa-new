<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
function abc($er)
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM course Where Teacher = $er";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo '0';
	}
elseif ($numberOfRows > 0) 
	{
echo $numberOfRows;
}
}

function abc1($er)
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM profile Where teacher_id = '$er' and schedule_status = '1'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo '';
	}
elseif ($numberOfRows > 0) 
	{
			echo '<button class="mb-2 mr-2 btn btn-outline-danger btn-sm">Blocked</button>';
			}
	}
	
function abc2($er)
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM profile Where teacher_id = '$er' and schedule_status = '2'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo '';
	}
elseif ($numberOfRows > 0) 
	{
			echo '<button class="mb-2 mr-2 btn btn-outline-success btn-sm">Un-block</button>';
			}
	}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'List of Timezones';
$page_subtitle = 'List of Timezones';
$table_name = 'List of Timezones';
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
                                        <table class="mb-0 table">
                                            <thead>
								<tr>
								<th>
									 Sr.No
								</th>
								<th>
									 Timezone Name
								</th>
								<th>
									 Timezone Difference
								</th>
								<th>
									 PHP Timezone
								</th>
								<th>
									 &nbsp;
								</th>
								</tr>
								</thead>
                                            <tbody>
                                            <?php 
$g =$_REQUEST['con'];
$sql = "SELECT * FROM time_zone where c_id = $g";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$time_id = $row['tz_id'];
			$time_name = $row['timezone_name'];
			$time_diff = $row['timezone_diff'];
			$time_php = $row['php_tz'];

?>
								<tr>
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo $time_name; ?> (<?php echo $time_id; ?>)
								</td>
								<td>
									 <?php echo $time_diff; ?>
								</td>
								<td>
									 <?php echo $time_php; ?>
								</td>
								<td><a href="edit-timezone?pT=<?php echo base64_encode($time_id); ?>"><button type="button" class="btn yellow btn-xs">Edit Timezone</button></a></td>
							</tr>
							<?php 		
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