<?php session_start(); ?>
<?php
		unset($_SESSION['is']);
		session_destroy();
?>
<?php
//error_reporting(0);
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
if (isset($_POST['submit'])) {
require ("../includes/dbconnection.php"); // if form has been submitted
if(!$_POST['username'] | !$_POST['pass']){
$error = 'You did not fill in a required field.';
}

$sql = "SELECT * FROM account WHERE username = '".$_POST['username']."'";
$result = mysqli_query($conn, $sql);
$check2 = mysqli_num_rows($result);
if ($check2 == 0) {
$error ='Asalam-O-Elekum! This user does not exist in our database. Please contact the Admin for assistance.';
}
else{
while($row = mysqli_fetch_assoc($result)) 
{
$_POST['pass'] = stripslashes($_POST['pass']);
$row['userpass'] = stripslashes($row['userpass']);
$_POST['pass'] = $_POST['pass'];
$dept_id = $row['dept_id'];
$parent_id = $row['parent_id'];
$parent = $row['parent_name'];
$timezone = $row['timezone'];
$email1 = $row['email'];
$currency1 = $row['currency_id'];
$modeid = $row['mode_id'];
//gives error if the password is wrong
if ($_POST['pass'] != $row['userpass']) {
$error ='Incorrect combination, please try again.';
}
else 
{ 
// if login is ok then we add a cookie 
$_POST['username'] = stripslashes($_POST['username']); 
$hour = time() + 3600; 
setcookie(ID_my_site, $_POST['username'], $hour); 
setcookie(Key_my_site, $_POST['userpass'], $hour);	
//then redirect them to the members area 
if ($row['dept_id'] == '1'){
		session_start();
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$_SESSION['is']['parent_id'] = $parent_id;
		$_SESSION['is']['parent'] = $parent;
		$session = "1";	
 header(
			 		"Location: teacher.php?username=".md5($_POST['username'])
		 		   );
}
elseif($row['dept_id'] == '1002'){
		session_start();
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$_SESSION['is']['parent_id'] = $parent_id;
		$_SESSION['is']['parent'] = $parent;
		$_SESSION['is']['timezone_id'] = $timezone;
		$_SESSION['is']['email_id'] = $email1;
		$_SESSION['is']['$currency1'] = $currency1;
		$_SESSION['is']['$modeid'] = $modeid;
		$session = "1";	
 header(
			 		"Location: parents-home?username=". $_POST['username'] 
		 		   );
				   }
elseif($row['dept_id'] == '1003'){
		session_start();
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$_SESSION['is']['parent_id'] = $parent_id;
		$_SESSION['is']['parent'] = $parent;
		$_SESSION['is']['timezone_id'] = $timezone;
		$_SESSION['is']['email_id'] = $email1;
		$_SESSION['is']['$currency1'] = $currency1;
		$_SESSION['is']['$modeid'] = $modeid;
		$session = "1";	
 header(
			 		"Location: parents-home?username=". $_POST['username'] 
		 		   );
				   }	
}
}
} 	
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>LMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="Learning Managment & Scheduling System">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="./main.8d288f825d8dffbbe55e.css" rel="stylesheet"></head>

<body>
<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="d-none d-lg-block col-lg-4">
                        <div class="slider-light">
                            <div class="slick-slider">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('assets/images/originals/Allah.jpg');"></div>
                                        <div class="slider-content"><h3>Al Ahad</h3>
                                            <p>The Only One, the Unique — on one occasion in the Quran. Al-Ahad is the One who was, is, and will ever remain alone.</p></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('assets/images/originals/Allah.jpg');"></div>
                                        <div class="slider-content"><h3>Al Ahad</h3>
                                            <p>The Only One, the Unique — on one occasion in the Quran. Al-Ahad is the One who was, is, and will ever remain alone.</p></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('assets/images/originals/Allah.jpg');"></div>
                                        <div class="slider-content"><h3>Al Ahad</h3>
                                            <p>The Only One, the Unique — on one occasion in the Quran. Al-Ahad is the One who was, is, and will ever remain alone.</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                            <div class="app-logo1"></div>
                            <h4 class="mb-0">
                                <span class="d-block">Welcome back,</span>
                                <span>Please sign in to your account.</span></h4>
                            <h6 class="mt-3">No account? <a href="<?php echo $contact_url1; ?>" class="text-primary">Contact Us Now</a></h6>
                            <div class="divider row"></div>
                            <div>
                                <form class="" action="index.php" method="post">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="exampleEmail" class="">Email</label><input name="username" id="exampleEmail" placeholder="Email here..." type="text" class="form-control"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="examplePassword" class="">Password</label><input name="pass" id="examplePassword" placeholder="Password here..." type="password"
                                                                                                                                                   class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="position-relative form-check"><input name="check" id="exampleCheck" type="checkbox" class="form-check-input"><label for="exampleCheck" class="form-check-label">Keep me logged in</label></div>
                                    <div class="divider row"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="ml-auto">
                                            <button class="btn btn-primary btn-lg" name="submit">Login to Dashboard</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<script type="text/javascript" src="./assets/scripts/main.8d288f825d8dffbbe55e.js"></script></body>
</html>
