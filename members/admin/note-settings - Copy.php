<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $sql = "SELECT * FROM settings_note WHERE id = 1";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$id = $row['id'];
					$monins = $row['monthly_invoices'];
					$monains = $row['monthly_ins'];
					$monred = $row['invoice_reminders'];
			}
			}
  if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$mic= $_POST['monthly_invoices'];
		 	$ins= $_POST['monthly_ins'];
		 	$red= $_POST['invoice_reminders'];
		 	$sql = "UPDATE settings_note SET monthly_invoices = '$mic', monthly_ins = '$ins', invoice_reminders = '$red' WHERE id = '1'"; 
		 	if ($conn->query($sql) === TRUE) {
					echo '';
					}
			 	else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
				}
?>
<?php
$page_title = 'System Notifictions Settings';
$page_subtitle = 'System Notifictions Settings';
$table_name = 'System Notifictions Settings';
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
                                <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-4 col-form-label"><h5>Regular Monthly Invoices</h5></label>
                                            <div class="col-sm-8"><select name="monthly_invoices" id="monthly_invoices" class="form-control">
                                            <option value="Account-Profile-Status">As Per Profile Status</option>
                                            <option value="Email">Email</option>
                                            <option value="WhatsApp">WhatsApp</option>
                                            </select></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-4 col-form-label"><h5>Single Invoice (Instant)</h5></label>
                                            <div class="col-sm-8"><select name="monthly_ins" id="monthly_ins" class="form-control">
                                            <option value="Account-Profile-Status">As Per Profile Status</option>
                                            <option value="Email">Email</option>
                                            <option value="WhatsApp">WhatsApp</option>
                                            </select></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-4 col-form-label"><h5>Invoice Reminders</h5></label>
                                            <div class="col-sm-8"><select name="invoice_reminders" id="invoice_reminders" class="form-control">
                                            <option value="Account-Profile-Status">As Per Profile Status</option>
                                            <option value="Email">Email</option>
                                            <option value="WhatsApp">WhatsApp</option>
                                            </select></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-4 col-form-label"><h5>Welcome Email</h5></label>
                                            <div class="col-sm-8"><select name="welcome_email" id="welcome_email" class="form-control" disabled="">
                                            <option value="Account-Profile-Status">As Per Profile Status</option>
                                            <option value="Email" selected="">Email</option>
                                            <option value="WhatsApp">WhatsApp</option>
                                            </select></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-4 col-form-label"><h5>New Account Email</h5></label>
                                            <div class="col-sm-8"><select name="new_account" id="new_account" class="form-control" disabled="">
                                            <option value="Account-Profile-Status">As Per Profile Status</option>
                                            <option value="Email" selected="">Email</option>
                                            <option value="WhatsApp">WhatsApp</option>
                                            </select></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-4 col-form-label"><h5>Zoom Link Message</h5></label>
                                            <div class="col-sm-8"><select name="zoom_link" id="zoom_link" class="form-control" disabled="">
                                            <option value="Account-Profile-Status" selected="">As Per Profile Status</option>
                                            <option value="Email">Email</option>
                                            <option value="WhatsApp">WhatsApp</option>
                                            </select></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-4 col-form-label"><h5>Lesson Details</h5></label>
                                            <div class="col-sm-8"><select name="lesson" id="lesson" class="form-control" disabled="">
                                            <option value="Account-Profile-Status" selected="">As Per Profile Status</option>
                                            <option value="Email">Email</option>
                                            <option value="WhatsApp">WhatsApp</option>
                                            </select></div>
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