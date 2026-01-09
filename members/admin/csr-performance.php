<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $csr_id =$_REQUEST['csr'];
  $csr_name =$_REQUEST['name'];
  $yy_id = $_REQUEST['year'];
  $mm_id = $_REQUEST['month'];
function csr_allocated($var,$mm_id)//currently active request
{
require ("../includes/dbconnection.php");
$yy_id=date('Y');
   $sql = "SELECT * FROM csr_performance Where csr_id = $var AND status = 1 AND MONTH(date) = $mm_id AND YEAR(date) = $yy_id";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '--';
			}
		elseif ($numberOfRows > 0) 
			{
			echo = $numberOfRows;
			}
}
function csr_active($var)//currently active request
{
require ("../includes/dbconnection.php");
   $sql = "SELECT * FROM new_request Where csr_id = $var AND status = 7";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '--';
			}
		elseif ($numberOfRows > 0) 
			{
			echo = $numberOfRows;
			}
}
function csr_remove($var)//currently removed
{
require ("../includes/dbconnection.php");
   $sql = "SELECT * FROM new_request Where csr_id = $var AND status = 6";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '--';
			}
		elseif ($numberOfRows > 0) 
			{
			echo = $numberOfRows;
			}
}
function csr_trials($var,$mm_id)//schedule trial this month
{
require ("../includes/dbconnection.php");
$yy_id=date('Y');
$sql = "SELECT * FROM account Where csr_id = $var AND MONTH(trial_date) = $mm_id AND YEAR(trial_date) = $yy_id";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '--';
			}
		elseif ($numberOfRows > 0) 
			{
			echo = $numberOfRows;
			}
}
function csr_trials_running($var,$mm_id)//schedule trial this month
{
require ("../includes/dbconnection.php");
$yy_id=date('Y');
$sql = "SELECT * FROM account Where csr_id = $var AND MONTH(trial_date) = $mm_id AND YEAR(trial_date) = $yy_id AND active = 11";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '--';
			}
		elseif ($numberOfRows > 0) 
			{
			echo = $numberOfRows;
			}
}
function csr_regulars($var,$mm_id)//regulars this month
{
require ("../includes/dbconnection.php");
$yy_id=date('Y');
$sql = "SELECT * FROM account Where csr_id = $var AND MONTH(regular_date) = $mm_id AND YEAR(regular_date) = $yy_id";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '--';
			}
		elseif ($numberOfRows > 0) 
			{
			echo = $numberOfRows;
			}
}
function csr_per_exp($var,$mm_id)//performance average all
{
require ("../includes/dbconnection.php");
$yy_id = date('Y');
$result = mysqli_query($conn, $sql);
$regular = mysqli_num_rows($result);
$sql = "SELECT * FROM csr_performance Where csr_id = $var AND status = 1 AND MONTH(date) = $mm_id AND YEAR(date) = $yy_id";
$result = mysqli_query($conn, $sql);
$total = mysqli_num_rows($result);
$avg = ($regular/$total)*100;
echo number_format($avg, 2);
}
function csr_per_real($var,$mm_id)//performance average all
{
require ("../includes/dbconnection.php");
$yy_id = date('Y');
$sql = "SELECT * FROM account Where csr_id = $var AND MONTH(regular_date) = $mm_id AND YEAR(regular_date) = $yy_id";
$result = mysqli_query($conn, $sql);
$regular = mysqli_num_rows($result);
$sql = "SELECT * FROM csr_performance Where csr_id = $var AND status = 1 AND MONTH(date) = $mm_id AND YEAR(date) = $yy_id";
$result = mysqli_query($conn, $sql);
$total = mysqli_num_rows($result);
$avg = ($regular/$total)*100;
echo number_format($avg, 2);
}
?>
<?php
$sy = date('Y-m-d');
$yy_id=date('Y');
?>
<?php
$page_title = 'CSR Performance';
$page_subtitle = 'CSR Performance';
$table_name = 'CSR Performance';
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
								<tr>
								<th>
									 Month
								</th>
								<th>
									 Attended
								</th>
								<th>
									 Scheduled Trials
								</th>
								<th>
									 Running Trials
								</th>
								<th>
									 Regulars
								</th>
								<th>
									 Expected
								</th>
								<th>
									 Realized
								</th>
							</tr>
								</thead>
								<tbody>
								<tr>
								<td>
									 January-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","01"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","01"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","01"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","01"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","01"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","01"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 February-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","02"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","02"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","02"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","02"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","02"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","02"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 March-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","03"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","03"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","03"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","03"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","03"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","03"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 April-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","04"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","04"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","04"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","04"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","04"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","04"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 May-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","05"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","05"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","05"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","05"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","05"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","05"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 June-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","06"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","06"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","06"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","06"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","06"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","06"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 July-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","07"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","07"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","07"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","07"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","07"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","07"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 August-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","08"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","08"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","08"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","08"); ?>
								</td>
								<td>
									<span class='bold font-blue'><?php echo csr_per_exp("$csr_id","08"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","08"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 September-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","09"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","09"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","09"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","09"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","09"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","09"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 October-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","10"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","10"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","10"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","10"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","10"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","10"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 November-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","11"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","11"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","11"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","11"); ?>
								</td>
								<td>
									<span class='bold font-blue'><?php echo csr_per_exp("$csr_id","11"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","11"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 December-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","12"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","12"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","12"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","12"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","12"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","12"); ?>%</span>
								</td>
								</tr>
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