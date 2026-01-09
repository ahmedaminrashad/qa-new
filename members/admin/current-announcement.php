<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
?>
<?php
function group_name($var)
  {
  require ("../includes/dbconnection.php");
$sql = "SELECT * FROM employee_catagory WHERE cat_id = $var";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$hidden_pcourse = $row['cat_id'];
					$hidden_proom = $row['cat_name'];
					echo $hidden_proom;	
			}
			}
	}
function cun_ann()
  	{
  	require ("../includes/dbconnection.php");
  	$sy = date('Y-m-d');
$sql = "SELECT * FROM announcement WHERE ann_date <= '$sy' AND ann_end >= '$sy'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '0';
			}
		elseif ($numberOfRows > 0) 
			{
echo number_format($numberOfRows, 0);
}
}
function all_ann()
  	{
  	require ("../includes/dbconnection.php");
  	$sy = date('Y-m-d');
$sql = "SELECT * FROM announcement";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '0';
			}
		elseif ($numberOfRows > 0) 
			{
echo number_format($numberOfRows, 0);
}
}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Announcements';
$page_subtitle = 'Current Announcements';
$table_name = 'Announcements';
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
                                <div class="col-md-12">
                                    <div class="mb-3 card">
                                        <div class="tabs-lg-alternate card-header">
                                            <ul class="nav nav-justified">
                                                <li class="nav-item">
                                                    <a data-toggle="tab" href="#tab-eg9-0" class="active nav-link">
                                                        <div class="widget-number text-danger">Active</div>
                                                        <div class="tab-subheading"><?php echo cun_ann(); ?></div>
                                                    </a></li>
                                                <li class="nav-item">
                                                    <a data-toggle="tab" href="#tab-eg9-1" class="nav-link">
                                                        <div class="widget-number">All</div>
                                                        <div class="tab-subheading"><?php echo all_ann(); ?></div>
                                                    </a>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-eg9-0" role="tabpanel">
                                                <div class="card-body">
                                                <?php 
// sending query
$sql = "SELECT * FROM announcement WHERE ann_date <= '$sy' AND ann_end >= '$sy'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo 'No Active Task Found!';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$annid = $row['ann_id'];
			$sdate = $row['ann_date'];
			$anncat = $row['ann_cat'];
			$msg = $row['ann_msg'];
			$edate = $row['ann_end'];
?>
                                                <div class="col-md-12">
                                    <div class="card-hover-shadow-2x mb-3 card">
                                        <div class="card-header"><font color="#A80707">For <?php echo group_name("$anncat"); ?></font></div>
                                        <div class="card-body"><p><?php echo $msg; ?></p>
                                            <p class="mb-0">From: <?php echo $sdate; ?> To: <?php echo $edate; ?></p></div>
                                        <div class="d-block text-right card-footer">
                                            <a href="delete-announcement?pT=<?php echo $annid; ?>"><button class="btn-shadow-primary btn btn-danger btn-lg">Delete</button></a>
                                        </div>
                                    </div>
                                    </div>
                                    <?php 	
		}
	}	
?>
                                    </div>
                                            </div>
                                            <div class="tab-pane" id="tab-eg9-1" role="tabpanel">
                                                <div class="card-body">
                                                <?php 
// sending query
$sql = "SELECT * FROM announcement";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo 'No Active Task Found!';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$annid = $row['ann_id'];
			$sdate = $row['ann_date'];
			$anncat = $row['ann_cat'];
			$msg = $row['ann_msg'];
			$edate = $row['ann_end'];
?>
                                                <div class="col-md-12">
                                    <div class="card-hover-shadow-2x mb-3 card">
                                        <div class="card-header"><font color="#A80707">For <?php echo group_name("$anncat"); ?></font></div>
                                        <div class="card-body"><p><?php echo $msg; ?></p>
                                            <p class="mb-0">From: <?php echo $sdate; ?> To: <?php echo $edate; ?></p></div>
                                        <div class="d-block text-right card-footer">
                                            <a href="delete-announcement?pT=<?php echo $annid; ?>"><button class="btn-shadow-primary btn btn-danger btn-lg">Delete</button></a>
                                        </div>
                                    </div>
                                    </div>
                                    <?php 	
		}
	}	
?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>