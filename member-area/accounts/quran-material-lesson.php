<?php session_start(); ?>
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
<?php
  include("../includes/session.php");
  include("../includes/main-var.php");
  include("header.php");
  $cid =$_REQUEST['c_id'];
  $tt = $_SESSION['is']['parent_id'];
?>
<?php 
$result1 = mysql_query("SELECT * FROM dept HAVING dept_id='$cid'");
if (!$result1) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result1);
			If ($numberOfRows == 0) 
				{
				echo '';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$cname = MYSQL_RESULT($result1,$i,"name");
				}			
?>
<?php
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo $title; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->

  <link rel="stylesheet" href="https://quransquare.com/resources/newassets/styles/uikit.css">
    <link id="pagestyle" rel="stylesheet" href="https://quransquare.com/resources/newassets/styles/style.css">
    <link rel="stylesheet" href="https://quransquare.com/resources/newassets/styles/global.css">
    <link rel="stylesheet" href="https://quransquare.com/resources/newassets/styles/materialize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://quransquare.com/resources/newassets/scripts/uikit.js"></script>
    <script src="https://quransquare.com/resources/newassets/scripts/uikit-icons.min.js"></script>


<link href="https://fonts.googleapis.net/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link href="../assets/admin/pages/css/search.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="../assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="../assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="../assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<!-- END THEME STYLES -->
     <link rel="shortcut icon" href="https://quransquare.com/resources/newassets/images/icon.png">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER TOP -->
	<div class="page-header-top">
		<div class="container">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="<?php echo $site; ?>"><img src="../assets/admin/layout3/img/logo-default.png" alt="logo" class="logo-default"></a>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler"></a>
			<!-- END RESPONSIVE MENU TOGGLER -->
<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-bell"></i>
						<?php 
$result = mysql_query("SELECT * FROM invoice WHERE status = 1 and parent_id =$tt");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '';
	}
else if ($numberOfRowsot > 0) 
	{
	echo '<span class="badge badge-default">'.$numberOfRowsot.'</span>';
	}
 ?>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php 
$result = mysql_query("SELECT * FROM invoice WHERE status = 1 and parent_id =$tt");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot1 = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '0';
	}
else if ($numberOfRowsot1 > 0) 
	{
	echo $numberOfRowsot1;
	}
 ?> Invoice(s)</strong> unpaid</h3>
								<a href="ind_details">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<li class="droddown dropdown-separator">
						<span class="separator"></span>
					</li>
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="../assets/admin/layout3/img/user-alt-128.png">
						<span class="username username-hide-mobile"><?php echo $_SESSION['is']['parent']; ?></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="logout">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
			</div>
	</div>
<?php echo $start_menu; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1><?php echo $cname; ?> <small>All Lessons</small></h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="parents-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="course-material">All Courses</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 <?php echo $cname; ?> Lessons
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-noborder">
						<ul class="nav nav-tabs">
							<li class="active">
								<a data-toggle="tab" href="#tab_2_2">
								<?php echo $cname; ?> </a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="tab_2_2" class="tab-pane active">
								<div class="row booking-results">
								<?php 
// sending query
$result = mysql_query("SELECT * FROM lesson_pages WHERE dept_id = $cid ORDER BY position_id ASC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'No lesson Found';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
		if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#F7F7FF';
				}
		
			$lid = MYSQL_RESULT($result,$i,"lesson_id");
			$ldept = MYSQL_RESULT($result,$i,"dept_id");
			$lpos = MYSQL_RESULT($result,$i,"position_id");
			$img = MYSQL_RESULT($result,$i,"image_name");
			$lname = MYSQL_RESULT($result,$i,"lesson_name");
			$ldes = MYSQL_RESULT($result,$i,"lesson_des");
			$scr = MYSQL_RESULT($result,$i,"src");
?>
									<div class="col-md-6">
										<div class="booking-result">
											<div class="booking-img">
												<img src="../uploads/quran/<?php echo $img; ?>" alt="">
											</div>
											<div class="booking-info">
												<h2>
											
											<?php echo $lname; ?> </a>
												</h2>
												<ul class="stars list-inline">
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>													
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>

													<li>
														<i class="fa fa-star-empty"></i>
													</li>
												</ul>
												<p>
													 <?php echo $ldes; ?>
												</p>
													<figure>
    
    <audio
        controls
        src="../uploads/quran/<?php echo $scr; ?>">
            Your browser does not support the
            <code>audio</code> element.
    </audio>
</figure>
											</div>
										</div>
									</div>
								

									<?php 	
		$i++;		
		}
	}	
?>
								</div>
							</div>
							<!--end tab-pane-->
						</div>
					</div>
				</div>
				<!--end tabbable-->
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<!-- BEGIN PRE-FOOTER -->
 <footer>
        <div class="row no-gutters">
            <div class="col-12 col-sm-6 col-lg-3 abtus">
                <div class="footHead">
                    <h6>About Us</h6>
                </div>
                <div class="footCont">
                    <p>We are leading online Quran & Arabic teaching institute. We are expert in using state of the art
                        technologies to teach online. We have teacher is who are certified by Al-Ahzar and also fluently
                        speaks in english and well trained to
                        teach online.</p>
                    <ul class="SocIcon">
                        <li><a href="https://www.facebook.com/quransquare" class="fbIco" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/quransquare" class="twIco" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCz2rDPNQZ97l0Sld77nv7Ow?view_as=subscriber" class="ytIco" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="https://www.instagram.com/quransquare" class="lkdIco" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <!--  <div class="appAvailable">
                        <a href="https://play.google.com/store/apps/details?id=com.Quran Square.mytj&amp;hl=en" target="_blank"><img src="resources/newassets/images/googleplay.png" alt=""></a>
                        <a href="https://itunes.apple.com/ca/app/mytj/id1447275870?mt=8" target="_blank"><img src="resources/newassets/images/iosapp.png" alt=""></a>
                    </div>-->
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 impLink">
                <div class="footHead">
                    <h6>Important Links</h6>
                    <ul class="ImpLinks">
                        <li><a href="https://quransquare.com/index.html#AllVideos" >Gallery</a></li>
                        <li><a href="#registerModal" uk-toggle>Request Demo</a></li>
                        <li><a href="https://quransquare.com/index.html#WhyUs" >Why Us</a></li>
                        <li><a href="https://quransquare.com/index.html#AllCourses">Programmes</a></li>
                        <li><a href="#contactModal" uk-toggle>Contact Us</a></li>
                    </ul>
                </div>
                <div class="footCont">
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 contac">
                <div class="footHead">
                    <h6>Contact</h6>
                    <ul class="ContactInfo">
                        <li>
                            <div class="addIcon"><i class="fa fa-home"></i></div>
                            <div class="addContent">
                                 <p>Old Bath Road Colnbrook, Slough, Berkshire, London,<br> SL3 0NS</p>
                            </div>
                        </li>
                        <li>
                            <div class="addIcon"><i class="fa fa-envelope"></i></div>
                            <div class="addContent">
                                <p><a href="mailto:support@quransqaure.com?Subject=Dear%20Quran%20Square" target="_top">support@quransqaure.com</a>
                                <p><a href="mailto:hr@quransqaure.com?Subject=Dear%20Quran%20Square" target="_top">hr@quransquare.com</a>
                                </p>
                            </div>
                        </li>
                        <li>
                          <div class="addIcon"><i class="fa fa-phone"></i></div>
                            <div class="addContent">
                                <a href="tel:+447418397601"> UK  +44-741-839-7601</a>
                                <a href="tel:+14453001433"> USA +1 (445) 300-1433</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="footCont">
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 paym">
                <div class="footHead">
                    <h6>Payments</h6>
                </div>
                <div class="footCon">
                    <p>Our payments are securely processed by paypal. We gurantee you that we do not store your credit card
                        info in our database.</p>
                    <ul class="payCards">
                        <li>
                            <a ><img src="https://quransquare.com/resources/newassets/images/visa.jpg" alt=""></a>
                        </li>
                        <li>
                            <a ><img src="https://quransquare.com/resources/newassets/images/discover.jpg" alt=""></a>
                        </li>
                        <li>
                            <a ><img src="https://quransquare.com/resources/newassets/images/mastercard.jpg" alt=""></a>
                        </li>
                        <li>
                            <a ><img src="https://quransquare.com/resources/newassets/images/paypal.jpg" alt=""></a>
                        </li>
                        <li>
                            <a><img src="https://quransquare.com/resources/newassets/images/western.png" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
               <!-- This is the modal -->
                            <div id="registerModal" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <div class="formReg">
                                        <div class="headerForm">
                                            <h2>FREE DEMO REGISTERATION</h2>
                                            <div class="row mb-0">
                                              <form class="col s12" method="post" action="https://quransquare.com/member-area/bat/rd-mailform.php" accept-charset="utf-8">
                                            <input name="form-type" type="hidden" value="contact" />
                                            <div class="row mb-0">
                                                <div class="input-field col s12 m6 l6">
                                                    <input id="name_slider" type="text" class="validate" name="name" required>
                                                    <label for="name_slider">Full Name</label>
                                                </div>
                                            </div>
                                            <div class="row mb-0">
                                                <div class="input-field col s12 m6 l6">
                                                    <input id="email_slider" type="email" class="validate" name="email" required>
                                                    <label for="email_slider">Email</label>
                                                </div>
                                            </div>
                                            <div class="row mb-0">
                                                
                                            </div>
                                            <div class="row mb-0">
                                                <div class="input-field col s12 m6 l6">
                                                    <input id="phone_slider" type="text" class="validate" name="phone" required>

                                                    <label for="phone_slider">Phone Number</label>
                                                </div>
                                            </div>
                                            <div class="row mb-0">
                                                <div class="btnGroup">
                                                    <button class="btn waves-effect waves-light" id="cmd_slider" type="submit" name="submit">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End Of Register Modal -->

        <!-- Modal Structure -->
         <!-- Contact Modal -->
          <div id="contactModal" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <div class="formReg">
                    <div class="headerForm">
                        <h2>Contact Us</h2>
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <div class="row mb-0">
                            <form class="col s12" action="https://quransquare.com/member-area/bat/rd-mailform2.php" method="post" name="contactform">
                                <input name="form-type" type="hidden" value="contact" />
                                <div class="row mb-0">
                                    <div class="input-field col s12 m6 l6">
                                        <input id="name" name="name" type="text" class="validate" required>
                                        <label for="name">Full Name</label>
                                    </div>
                                    <div class="input-field col s12 m6 l6">
                                        <input id="email" name="email" type="email" class="validate" required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="input-field col s12 m6 l6">
                                        <input id="phone" name="phone_number" type="text" class="validate" required>
                                        <label for="phone">Phone Number</label>
                                    </div> 
                                </div>
                                <div class="row mb-0">
                                    <div class="input-field col s12 m6 l12">
                                        <textarea id="your_message" name="message" type="text" class="validate materialize-textarea" required></textarea>
                                        <label for="your_message">Message</label>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="btnGroup">
                                        <button id="btn-send" class="btn waves-effect waves-light" type="submit" name="contact_us">Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  <!-- End of Contact Modal -->

    </footer>
                  <a style="max-width: 100%; height: auto;  box-sizing: border-box;" href="https://wa.me/447418397601" id="callnowbutton" target="_blank">
                         <i class="fa   fa-5x icon-whatsapp-bootom">  
                            <img name="icon" class="image image-icon-whatsapp" src="https://quransquare.com/resources/newassets/images/whatsapp.png" > 
                         </i>
                    </a> 
     <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src="https://embed.tawk.to/5d9f9bd4f82523213dc6ae93/default";
            s1.charset="UTF-8";
            s1.setAttribute("crossorigin","*");
            s0.parentNode.insertBefore(s1,s0);
            })();
    </script>
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script type="text/javascript" src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="../assets/admin/pages/scripts/search.js"></script>
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
   Search.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>