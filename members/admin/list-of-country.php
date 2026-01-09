<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
function abc($er)
{
// sending query
require ("../includes/dbconnection.php");
   $sql = "SELECT * FROM course Where c_id = $er";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
echo $tnumberOfRows;
}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<?php
$page_title = 'List of Countries';
$page_subtitle = 'List of All Countries added in the system';
$table_name = 'Countries';
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
                                <div class="card-body"><h5 class="card-title"><?php echo $table_name; ?></h5>
                                    <div class="table-responsive">
                                        <table class="mb-0 table">
                                            <thead>
								<tr>
								<th>
									 Sr.No
								</th>
								<th>
									 Country Name
								</th>
								<th>
									 Country Abbreviation
								</th>
								<th>
									 No. of Students
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
                                            </thead>
                                            <tbody>
                                            <?php 
// sending query
$sql = "SELECT * FROM country";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
If ($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
else if ($numberOfRows > 0) 
	{
	while($row = mysqli_fetch_assoc($result)){		
		
			$country_id = $row['c_id'];
			$country_abb = $row['c_name'];
			$country_name = $row['c_a'];
?>
								<tr>
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo $country_name; ?> (<?php echo $country_id; ?>)
								</td>
								<td>
									 <?php echo $country_abb; ?>
								</td>
								<td>
									 No. of Students <a href="country-student-list?pT=<?php echo base64_encode($country_id); ?>"><button type="button" class="btn green btn-xs"><?php echo abc("$country_id"); ?></button></a>
								</td>
								<td>
									 <a href="list-of-country-timezone?con=<?php echo $country_id; ?>"><button type="button" class="btn green btn-xs">List of Timezones</button></a>
								</td>
								<td><a href="edit-country?pT=<?php echo base64_encode($country_id); ?>"><button type="button" class="btn yellow btn-xs">Edit Country</button></a></td>
								<td><a href="add-timezone?pT=<?php echo base64_encode($country_id); ?>"><button type="button" class="btn blue btn-xs">Add Timezone</button></a></td>
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