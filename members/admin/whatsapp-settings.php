<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $sql = "SELECT * FROM settings_email WHERE id = 1";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$id = $row['id'];
					$ins_id= $row['ins_id'];
					$client_id= $row['client_id'];
					$sec= $row['sec'];
					$admin= $row['admin'];
			}
			}
  if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$insid= $_POST['insid'];
		 	$cliid= $_POST['cliid'];
		 	$secr= $_POST['secr'];
		 	$admin= $_POST['admin'];
		 	$sql = "UPDATE settings_email SET ins_id = '$insid', client_id = '$cliid', sec = '$secr', admin = '$admin' WHERE id = '1'"; 
		 	if ($conn->query($sql) === TRUE) {
					header('Location: dashboard');
					}
			 	else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
				}
?>
<?php
$page_title = 'WhatsApp Settings';
$page_subtitle = 'WhatsApp Settings';
$table_name = 'WhatsApp Settings';
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
                                    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                		<div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Instant ID</h5></label>
                                            <div class="col-sm-8"><input name="insid" id="insid" value="<?php echo $ins_id; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Client ID</h5></label>
                                            <div class="col-sm-8"><input name="cliid" id="cliid" value="<?php echo $client_id; ?>" type="email" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Client Secret</h5></label>
                                            <div class="col-sm-8"><input name="secr" id="secr" value="<?php echo $sec; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Admin Number</h5></label>
                                            <div class="col-sm-8"><input name="admin" id="admin" value="<?php echo $admin; ?>" type="number" class="form-control"></div>
                                        </div>
                                        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Save Settings</button>
                                </div>
                            </form>
                            <script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.monthly_invoices.value = ("<?php echo $monins; ?>");
	form.monthly_ins.value = ("<?php echo $monains; ?>");
	form.invoice_reminders.value = ("<?php echo $monred; ?>");
	//alert (form.pCityM.value);				
</script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.monthly_invoices.value = ("<?php echo $monins; ?>");
	form.monthly_ins.value = ("<?php echo $monains; ?>");
	form.invoice_reminders.value = ("<?php echo $monred; ?>");
	//alert (form.pCityM.value);				
</script>