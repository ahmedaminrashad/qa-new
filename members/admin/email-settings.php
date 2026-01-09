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
					$sever1= $row['sever1'];
					$email1= $row['email1'];
					$pass1= $row['pass1'];
					$sever2= $row['sever2'];
					$email2= $row['email2'];
					$pass2= $row['pass2'];
					$sever3= $row['sever3'];
					$email3= $row['email3'];
					$pass3= $row['pass3'];
					$port= $row['port'];
			}
			}
  if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$asever1= $_POST['server1'];
		 	$aemail1= $_POST['email1'];
		 	$aemail2= $_POST['email2'];
		 	$aemail3= $_POST['email3'];
		 	$apass1= $_POST['pass1'];
		 	$apass2= $_POST['pass2'];
		 	$apass3= $_POST['pass3'];
		 	$aport= $_POST['port'];
		 	$sql = "UPDATE settings_email SET sever1 = '$asever1', sever2 = '$asever1', sever3 = '$asever1', email1 = '$aemail1', email2 = '$aemail2', email3 = '$aemail3', pass1 = '$apass1', pass2 = '$apass2', port = '$aport', pass3 = '$apass3' WHERE id = '1'"; 
		 	if ($conn->query($sql) === TRUE) {
					header('Location: dashboard');
					}
			 	else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
				}
?>
<?php
$page_title = 'Email Settings';
$page_subtitle = 'Email Settings';
$table_name = 'Email Settings';
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
                                		<div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Email Sever</h5></label>
                                            <div class="col-sm-8"><input name="server1" id="server1" value="<?php echo $sever1; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Email Address 1</h5></label>
                                            <div class="col-sm-8"><input name="email1" id="email1" value="<?php echo $email1; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Password 1</h5></label>
                                            <div class="col-sm-8"><input name="pass1" id="pass1" value="<?php echo $pass1; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Email Address 2</h5></label>
                                            <div class="col-sm-8"><input name="email2" id="email2" value="<?php echo $email2; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Password 2</h5></label>
                                            <div class="col-sm-8"><input name="pass2" id="pass2" value="<?php echo $pass2; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Email Address 3</h5></label>
                                            <div class="col-sm-8"><input name="email3" id="email3" value="<?php echo $email3; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Password 3</h5></label>
                                            <div class="col-sm-8"><input name="pass3" id="pass3" value="<?php echo $pass3; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Port</h5></label>
                                            <div class="col-sm-8"><input name="port" id="port" value="<?php echo $port; ?>" type="text" class="form-control"></div>
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