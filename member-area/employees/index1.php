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
// 		unset($_SESSION['is']);
// 		session_destroy();
require ("../admin/create_daily_classes.php");
$isLogin = $_SESSION['is']['login'] ;
if($isLogin){
  header("Location: home-login-index?username=".$_SESSION['is']['username'] );
}
?>
<?php
error_reporting(0);
  require ("../includes/dbconnection.php");
  $user =$_REQUEST['username'];
  $msg =''; 
  $userNEror = false;
  $passEror = false;
//if (isset($_GET["action"]) && ($_GET["action"] == "login")) {
//if the login form is submitted
if (isset($_POST['submit'])) { // if form has been submitted
// makes sure they filled it in
if(!$_POST['username'] | !$_POST['pass']){
$error ='You did not fill in a required field.';
}
// checks it against the database
if (!get_magic_quotes_gpc()) {
$_POST['email'] = addslashes($_POST['email']);
}
$check = mysql_query("SELECT * FROM profile WHERE username = '".$_POST['username']."'")or die(mysql_error());
//Gives error if user dosen't exist
$check2 = mysql_num_rows($check);
if ($check2 == 0) {
///die('Asalam-O-Elekum! This user does not exist in our database. Please contact the Admin for assistance.');
 $userNEror = true;
 $passEror = false;
}
while($info = mysql_fetch_array( $check )) 
{
$_POST['pass'] = stripslashes($_POST['pass']);
$info['userpass'] = stripslashes($info['userpass']);
$_POST['pass'] = $_POST['pass'];
$dept_id = $info['dept_id'];
$cat_id = $info['cat_id'];
$teacher_id = $info['teacher_id'];
$teacher = $info['teacher_name'];
$timezone = $info['time'];
$image = $info['ima'];
$salary_iiid = $info['Salary'];
$inout = $info['inout_id'];
$anu = $info['anu_status'];
//gives error if the password is wrong
if ($_POST['pass'] != $info['userpass']) {
//$error ='Incorrect combination, please try again.';
 $passEror = true;
 $userNEror = false;
}
else 
{ 
// if login is ok then we add a cookie 
$_POST['username'] = stripslashes($_POST['username']); 
$hour = time() + 3600; 
setcookie(ID_my_site, $_POST['username'], $hour); 
setcookie(Key_my_site, $_POST['userpass'], $hour);	
//then redirect them to the members area 
if($info['dept_id'] == '1001' && $info['cat_id'] == '4'){
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
		$session = "1";	
 header(
			 		"Location: home-login-index?username=". $_POST['username'] 
		 		   );
				   }
	elseif($info['dept_id'] == '1001' && $info['cat_id'] == '5'){
		session_start();
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$_SESSION['is']['teacher_id'] = $teacher_id;
		$_SESSION['is']['teacher_name'] = $teacher;
		$_SESSION['is']['teacher_time'] = $timezone;
		$_SESSION['is']['image_name'] = $image;
		$_SESSION['is']['salary_type'] = $salary_iiid;
		$session = "1";	
 header(
			 		"Location: home-login-index?username=". $_POST['username'] 
		 		   );
				     }
					 elseif($info['dept_id'] == '1001' && $info['cat_id'] == '6'){
		session_start();
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$_SESSION['is']['teacher_id'] = $teacher_id;
		$_SESSION['is']['teacher_name'] = $teacher;
		$_SESSION['is']['teacher_time'] = $timezone;
		$_SESSION['is']['image_name'] = $image;
		$_SESSION['is']['salary_type'] = $salary_iiid;
		$session = "1";	
 header(
			 		"Location: home-login-index?username=". $_POST['username'] 
		 		   );
				   }
	elseif($info['dept_id'] == '1001' && $info['cat_id'] == '7'){
		session_start();
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$_SESSION['is']['teacher_id'] = $teacher_id;
		$_SESSION['is']['teacher_name'] = $teacher;
		$_SESSION['is']['teacher_time'] = $timezone;
		$_SESSION['is']['image_name'] = $image;
		$_SESSION['is']['salary_type'] = $salary_iiid;
		$session = "1";	
 header(
			 		"Location: home-login-index?username=". $_POST['username'] 
		 		   );
				     }
		elseif($info['dept_id'] == '1001' && $info['cat_id'] == '8'){
		session_start();
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$_SESSION['is']['teacher_id'] = $teacher_id;
		$_SESSION['is']['teacher_name'] = $teacher;
		$_SESSION['is']['teacher_time'] = $timezone;
		$_SESSION['is']['image_name'] = $image;
		$_SESSION['is']['salary_type'] = $salary_iiid;
		$session = "1";	
 header(
			 		"Location: home-login-index?username=". $_POST['username'] 
		 		   );
				     }
}
}
} 
else 
{	
}
// if they are not logged in 
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.tareequljannah.com/Student by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Oct 2019 12:40:17 GMT -->
<!-- Added by HTTrack --><!-- /Added by HTTrack -->
<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qarabic - ONLINE QURAN AND ARABIC LEARNING INSTITUTE</title>
   	<link rel="icon" type="image/png" href="https://qarabic.com/vendor/local/imgs/icons/meta/android-icon-192x192.png" />
    <link rel="stylesheet" href="https://quransquare.com/resources/newassets/styles/bootstrap.min.css">
    <link rel="stylesheet" href="https://quransquare.com/resources/newassets/styles/uikit.css">
    <link id="pagestyle" rel="stylesheet" href="https://quransquare.com/resources/newassets/styles/style.css">
    <link rel="stylesheet" href="https://quransquare.com/resources/newassets/styles/global.css">
    <link rel="stylesheet" href="https://quransquare.com/resources/newassets/styles/materialize.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
       <script>
        function swapStyleSheet(sheet) {
            document.getElementById('pagestyle').setAttribute('href', sheet);
        }
    </script>

    <script src="https://qarabic.com/resources/newassets/scripts/uikit.js"></script>
    <script src="https://qarabic.com/resources/newassets/scripts/uikit-icons.min.js"></script>
    
</head>
<body>
    
     
    <main>
        <div class="row no-gutters mb-0">
            <div id="LoginPage" class="col-12" style="background: #00613F;margin-top: 0px; height: 100vh;background-size: cover;">
                <div id="StLoginForm" class="PageInternal">
                          <h2 style="margin-bottom: 0;"> 
                     <a href="https://qarabic.com" class="btn-logo" >
                        <img style="height: 100px;" src="https://qarabic.com/vendor/local/imgs/logo-btm.svg">
                     </a>
                     <br>
                     <br>
                     Teacher
                    </h2>
                 <div class="row justify-content-md-center mb-0">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="headerForm LoginPage">
                                <h4>Login</h4>
                                <div id="ActivatedAccount"></div>
                                <div class="row mb-0">
                                    <form class="col s12" id="login-Form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                                        <div class="formInternal">
                                            <div class="input-field col s12">
                                                <input id="username" type="text" class="validate" name="username" required>
                                                <label for="username">Username</label>
                                                <?php echo $userNEror?'<span style ="color: red;">This user does not exist.</span>':''; ?>
                                            </div>
                                            <div class="input-field col s12">
                                                 <label for="passwd" >Password</label>
                                                <input id="passwd" type="password" class="validate"  name="pass" required>
                                                   <?php echo $passEror?'<span style ="color: red;">The password is incorrect.</span>':''; ?>
                                            </div>
                                        </div>                                        
                                        <div class="">
                                            <div class="btnGroup col-12">
                                                <button class="btn waves-effect waves-light" type="submit" name="submit" >Login</button>
                                            </div>
                                        </div>
                                      
                                    </form>
                                   
                                </div>
                            </div>
                            <div class="row mb-0 forgotPass">
                                            <a href="#forgotPasswordModal" uk-toggle></a>
                             </div>
                           
                        </div>
                    </div>
                </div>
                 <div class="orSignup  col-12">
                       
                             <div class="btnSignLogin">
                                    <a href="#forgotPasswordModal" uk-toggle>Forgot Password</a>
                                </div>
                                <br>
                                <p>join us</p>
                                <div class="btnSignLogin">
                                    <a href="https://qarabic.com/jobs.html">Register Now</a>
                                </div>
                            </div>
            </div>
        </div>
        <div id="forgotPasswordModal" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <div class="formReg">
                    <div class="headerForm">
                        <h4>Forgot Password</h4>
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <div class="row mb-0">
                                 <form class="col s12" method="post" action="https://qarabic.com/member-area/bat/rd-mailform6.php" accept-charset="utf-8">
                                            <input name="form-type" type="hidden" value="contact" />
                                          
                                            <div class="row mb-0">
                                                <div class="input-field col s12 m6 l6">
                                                    <input id="email_slider" type="email" class="validate" name="email" required>
                                                    <label for="email_slider">Email</label>
                                                </div>
                                                <div class="input-field col s12 m6 l6">
                                                    <input id="phone_slider" type="text" class="validate" name="phone" required>

                                                    <label for="phone_slider">Phone Number</label>
                                                </div>
                                            </div>
                                            <div class="row mb-0">
                                                <div class="btnGroup">
                                                    <button class="btn waves-effect waves-light" id="cmd_slider" type="submit" name="submit">
                                                        Recover Password
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                  
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
         

 

    <script type="text/javascript" src="https://quransquare.com/resources/newassets/scripts/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="https://quransquare.com/resources/newassets/scripts/materialize.min.js"></script>
    <script type="text/javascript" src="https://quransquare.com/resources/newassets/scripts/common.js"></script>
    <script type="text/javascript" src="https://quransquare.com/resources/newassets/scripts/bootstrap.min.js"></script>
</body>

</html>