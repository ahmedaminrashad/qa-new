<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $sql = "SELECT * FROM settings WHERE id = 1";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$id = $row['id'];
					$name= $row['name'];
					$title= $row['title'];
					$site_nameC= $row['site_nameC'];
					$site_nameS= $row['site_nameS'];
					$site= $row['site'];
					$paypal_email= $row['paypal_email'];
					$CO_number= $row['CO_number'];
					$CO_Sec= $row['2CO_Sec'];
					$email1= $row['email1'];
					$email2= $row['email2'];
					$email3= $row['email3'];
					$social1= $row['social1'];
					$social2= $row['social2'];
					$social3= $row['social3'];
					$about= $row['about'];
					$phone1= $row['phone1'];
					$phone2= $row['phone2'];
					$phone3= $row['phone3'];
					$blog_url= $row['blog_url'];
					$contact_url= $row['contact_url'];
					$skype_zoom= $row['skype_zoom'];
					$TimeZoneCustome= $row['TimeZoneCustome'];
			}
			}
  if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$aname= $_POST['name'];
		 	$atitle= $_POST['title'];
		 	$asite_nameC= $_POST['site_nameC'];
		 	$asite_nameS= $_POST['site_nameS'];
		 	$asite= $_POST['site'];
		 	$apaypal_email= $_POST['paypal_email'];
		 	$aCO_number= $_POST['CO_number'];
		 	$aCO_Sec= $_POST['CO_Sec'];
		 	$aemail1= $_POST['email1'];
		 	$aemail2= $_POST['email2'];
		 	$aemail3= $_POST['email3'];
		 	$asocial1= $_POST['social1'];
		 	$asocial2= $_POST['social2'];
		 	$asocial3= $_POST['social3'];
		 	$aabout= $_POST['about'];
		 	$aphone1= $_POST['phone1'];
		 	$aphone2= $_POST['phone2'];
		 	$aphone3= $_POST['phone3'];
		 	$ablog_url= $_POST['blog_url'];
		 	$acontact_url= $_POST['contact_url'];
		 	$askype_zoom= $_POST['skype_zoom'];
		 	$aTimeZoneCustome= $_POST['TimeZoneCustome'];
		 	$sql = "UPDATE settings SET name = '$aname', title = '$atitle', site_nameC = '$asite_nameC', site_nameS = '$asite_nameS', site = '$asite',
		 	 paypal_email = '$apaypal_email', CO_number = '$aCO_number', 2CO_Sec = '$aCO_Sec', email1 = '$aemail1', email2 = '$aemail2',email3= '$aemail3',about= '$aabout',social1= '$asocial1',
		 	 social2= '$asocial2',social3= '$asocial3',phone1= '$aphone1',phone2= '$aphone2',phone3= '$aphone3',blog_url= '$ablog_url',contact_url= '$acontact_url', skype_zoom= '$askype_zoom', TimeZoneCustome= '$aTimeZoneCustome' WHERE id = '1'"; 
		 	if ($conn->query($sql) === TRUE) {
					header('Location: dashboard');
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
                                		<div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Main Representative Name</h5></label>
                                            <div class="col-sm-8"><input name="name" id="name" value="<?php echo $name; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Title of WebPages</h5></label>
                                            <div class="col-sm-8"><input name="title" id="title" value="<?php echo $title; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>SiteName Capital Letter</h5></label>
                                            <div class="col-sm-8"><input name="site_nameC" id="site_nameC" value="<?php echo $site_nameC; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>SiteName Small Letter</h5></label>
                                            <div class="col-sm-8"><input name="site_nameS" id="site_nameS" value="<?php echo $site_nameS; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Site Full URL</h5></label>
                                            <div class="col-sm-8"><input name="site" id="site" value="<?php echo $site; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>PayPal Email</h5></label>
                                            <div class="col-sm-8"><input name="paypal_email" id="paypal_email" value="<?php echo $paypal_email; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>2CheckOut Number</h5></label>
                                            <div class="col-sm-8"><input name="CO_number" id="CO_number" value="<?php echo $CO_number; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>2CheckOut Secret</h5></label>
                                            <div class="col-sm-8"><input name="CO_Sec" id="CO_Sec" value="<?php echo $CO_Sec; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Email Info</h5></label>
                                            <div class="col-sm-8"><input name="email1" id="email1" value="<?php echo $email1; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Email Accounts</h5></label>
                                            <div class="col-sm-8"><input name="email2" id="email2" value="<?php echo $email2; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Email Support</h5></label>
                                            <div class="col-sm-8"><input name="email3" id="email3" value="<?php echo $email3; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>FaceBook Full URL</h5></label>
                                            <div class="col-sm-8"><input name="social1" id="social1" value="<?php echo $social1; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Twitter Full URL</h5></label>
                                            <div class="col-sm-8"><input name="social2" id="social2" value="<?php echo $social2; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>YourTube Full URL</h5></label>
                                            <div class="col-sm-8"><input name="social3" id="social3" value="<?php echo $social3; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Phone One</h5></label>
                                            <div class="col-sm-8"><input name="phone1" id="phone1" value="<?php echo $phone1; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Phone Two</h5></label>
                                            <div class="col-sm-8"><input name="phone2" id="phone2" value="<?php echo $phone2; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Phone Three</h5></label>
                                            <div class="col-sm-8"><input name="phone3" id="phone3" value="<?php echo $phone3; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Admin Zoom/Skype ID</h5></label>
                                            <div class="col-sm-8"><input name="skype_zoom" id="skype_zoom" value="<?php echo $skype_zoom; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>PHP TimeZone</h5></label>
                                            <div class="col-sm-8"><input name="TimeZoneCustome" id="TimeZoneCustome" value="<?php echo $TimeZoneCustome; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Blog URL</h5></label>
                                            <div class="col-sm-8"><input name="blog_url" id="blog_url" value="<?php echo $blog_url; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>Contact Us URL</h5></label>
                                            <div class="col-sm-8"><input name="contact_url" id="contact_url" value="<?php echo $contact_url; ?>" type="text" class="form-control"></div>
                                        </div>
                                        
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-4 col-form-label"><h5>About US</h5></label>
                                            <div class="col-sm-8"><textarea name="about" id="about" class="form-control"><?php echo $about; ?></textarea></div>
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