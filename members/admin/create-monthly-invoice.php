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
$page_title = 'Create Monthly Invoice';
$page_subtitle = 'Create Monthly Invoice';
$table_name = 'Create Monthly Invoice';
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
										<form action="up1" method="post" class="form-horizontal form-row-seperated">
										<div class="form-group">
															<label>
															Select Month</label>
															<div>
															<select required class="form-control" name="pdept"  id="pdept">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM month ORDER BY month_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
  <option value="<?php echo $row['month_id'];?>"><?php echo $row['month_name'];?> </option>
  <?php } ?>
</select>															</div>
												</div>
										<div class="form-group">
															<label>
															Select Year</label>
															<div>
															<select required class="form-control" name="pgender"  id="pgender">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM school_yr ORDER BY year_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
  <option value="<?php echo $row['year_id'];?>"><?php echo $row['school_year'];?> </option>
  <?php } ?>
</select>															</div>
												</div>
												<div class="form-group">
													<label>Due Date</label>
													<div>
														<input required type="date" name="due" id="due" class="form-control input-circle">
													</div>
												</div>
											<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Create</button>
                                </div>
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
<script>
function goBack() {
    window.history.back();
}
</script>