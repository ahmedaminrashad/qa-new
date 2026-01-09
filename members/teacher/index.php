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

$sql = "SELECT * FROM profile WHERE username = '".$_POST['username']."'";
$result = mysqli_query($conn, $sql);
$check2 = mysqli_num_rows($result);
if ($check2 == 0) {
$error ='That user does not exist in our database. Please contact the administrator to ask for assistance.';
}
else{
while($row = mysqli_fetch_assoc($result)) 
{
$_POST['pass'] = stripslashes($_POST['pass']);
$info['userpass'] = stripslashes($row['userpass']);
$_POST['pass'] = $_POST['pass'];
$dept_id = $row['cat_id'];
$cat_id = $row['cat_id'];
$teacher_id = $row['teacher_id'];
$teacher = $row['teacher_name'];
$timezone = $row['time'];
$image = $row['ima'];
$salary_iiid = $row['Salary'];
$inout = $row['inout_id'];
$anu = $row['anu_status'];
$active = $row['active'];
//gives error if the password is wrong
if ($_POST['pass'] != $row['userpass']) {
$error ='Incorrect combination, please try again.';
}
else 
{ 
$_POST['username'] = stripslashes($_POST['username']); 
//$hour = time() + 3600; 
//setcookie(ID_my_site, $_POST['username'], $hour); 
//setcookie(Key_my_site, $_POST['userpass'], $hour);
if($dept_id == 8 && $active == 1){
		session_start();
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$_SESSION['is']['teacher_id'] = $teacher_id;
		$_SESSION['is']['teacher_name'] = $teacher;
		$_SESSION['is']['teacher_time'] = $timezone;
		$_SESSION['is']['image_name'] = $image;
		$_SESSION['is']['salary_type'] = $salary_iiid;
		$_SESSION['is']['inout_type'] = $inout;
		$_SESSION['is']['anu_type'] = $anu;
		$_SESSION['is']['deg'] = 'Teacher';
		$session = "1";	
 echo "<script>window.open('teacher-home','_self')</script>";
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
