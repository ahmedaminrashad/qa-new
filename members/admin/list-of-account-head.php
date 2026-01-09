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
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Accounts';
$page_subtitle = 'Accounts';
$table_name = 'Accounts';
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
									 Sr.No
								</th>
								<th>
									 Account Head Title
								</th>
								<th>
									 Account Category
								</th>
								<th>
									 Note
								</th>
								<th>
									 &nbsp;
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT `accounts_head`.*, `accounts_cat`.`accounts_cat_name` FROM `accounts_head`,`accounts_cat` WHERE accounts_head.account_cat_id=accounts_cat.accounts_cat_id";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){	
		
				$h_id = $row['account_head_id'];
			$h_name = $row['account_head_name'];
			$h_note = $row['note'];
			$h_cat = $row['accounts_cat_name'];
?>
								<tr>
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo $h_name; ?>
								</td>
								<td>
									 <?php echo $h_cat; ?>
								</td>
								<td>
									 <?php echo $h_note; ?>
								</td>
								<td><a href="edit-account-head?pT=<?php echo base64_encode($h_id); ?>"><button type="button" class="btn yellow btn-xs">Edit Head</button></a></td>
							</tr>
							<?php 	
		}
	}	
?>
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