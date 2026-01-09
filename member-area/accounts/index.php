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

session_start();

// Check if user is already logged in
$isLogin = isset($_SESSION['is']['login']) && $_SESSION['is']['login'];
if ($isLogin && isset($_SESSION['is']['username'])) {
    header("Location: parents-home?username=" . urlencode($_SESSION['is']['username']));
    exit;
}

//  echo $site_nameC ;
$msg = '';
$userNEror = false;
$passEror = false;
//if (isset($_GET["action"]) && ($_GET["action"] == "login")) {
//if the login form is submitted
if (isset($_POST['submit'])) {
    include("../includes/main-var.php");
    // if form has been submitted
// makes sure they filled it in
    if (!$_POST['username'] | !$_POST['pass']) {
        $error = 'You did not fill in a required field.';
    }
    // Validate and sanitize input
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['pass'] ?? '';
    
    // Check input is not empty
    if (empty($username) || empty($password)) {
        $error = 'You did not fill in a required field.';
        $userNEror = true;
        $passEror = false;
    } else {
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM account WHERE username = ? LIMIT 1");
        if (!$stmt) {
            error_log("Prepare failed: " . $conn->error);
            $error = 'Database error. Please try again later.';
            $userNEror = true;
            $passEror = false;
        } else {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            
            // Check if user exists
            if ($result->num_rows == 0) {
                $userNEror = true;
                $passEror = false;
            } else {
                $info = $result->fetch_assoc();
                $stmt->close();
                
                // Verify password (NOTE: This should be upgraded to password_verify() with hashed passwords)
                // TODO: Implement proper password hashing using password_hash() and password_verify()
                if ($password != $info['userpass']) {
                    $passEror = true;
                    $userNEror = false;
                } else {
                    // Login successful
                    $dept_id = $info['dept_id'];
                    $parent_id = $info['parent_id'];
                    $parent = $info['parent_name'];
                    $timezone = $info['timezone'];
                    $email1 = $info['email'];
                    $currency1 = $info['currency_id'];
                    $modeid = $info['mode_id'];
                    
                    // Check if user is student/parent (dept_id 1002 or 1003)
                    if ($dept_id == '1002' || $dept_id == '1003') {
                        session_start();
                        $_SESSION['is']['login'] = true;
                        $_SESSION['is']['username'] = $username;
                        $_SESSION['is']['parent_id'] = $parent_id;
                        $_SESSION['is']['parent'] = $parent;
                        $_SESSION['is']['timezone_id'] = $timezone;
                        $_SESSION['is']['email_id'] = $email1;
                        $_SESSION['is']['currency_id'] = $currency1;
                        $_SESSION['is']['mode_id'] = $modeid;
                        
                        // Regenerate session ID for security
                        session_regenerate_id(true);
                        
                        // Set secure cookies if needed (not recommended for storing credentials)
                        // Using sessions is more secure
                        
                        header("Location: parents-home?username=" . urlencode($username));
                        exit;
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qarabic - ONLINE QURAN AND ARABIC LEARNING INSTITUTE</title>
    <link rel="icon" type="image/png" href="https://qarabic.com/vendor/local/imgs/icons/meta/android-icon-192x192.png"/>
    <link rel="stylesheet" href="https://qarabic.com/resources/newassets/styles/bootstrap.min.css">
    <link rel="stylesheet" href="https://qarabic.com/resources/newassets/styles/uikit.css">
    <link id="pagestyle" rel="stylesheet" href="https://qarabic.com/resources/newassets/styles/style.css">
    <link rel="stylesheet" href="https://qarabic.com/resources/newassets/styles/global.css">
    <link rel="stylesheet" href="https://qarabic.com/resources/newassets/styles/materialize.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
        <div id="LoginPage" style="background: #7A1C1A;margin-top: 0px; height: 100vh;background-size: cover;"
             class="col-12">
            <div id="StLoginForm" class="PageInternal">
                <h2 style="margin-bottom: 0;">
                    <a href="https://qarabic.com" class="btn-logo">
                        <img style="height: 200px;" src="https://qarabic.com/vendor/local/imgs/logo-white.png">
                    </a>
                    <br>
                    <br>
                    Student/Family
                </h2>
                <div class="row justify-content-md-center mb-0">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="headerForm LoginPage">
                            <h4>Login</h4>
                            <div id="ActivatedAccount"></div>
                            <div class="row mb-0">
                                <form class="col s12" id="login-Form" action="<?php echo $_SERVER['PHP_SELF'] ?>"
                                      method="post">
                                    <div class="formInternal">
                                        <div class="input-field col s12">
                                            <input id="username" type="text" class="validate" name="username" required>
                                            <label for="username">Username</label>
                                            <?php echo $userNEror ? '<span style ="color: red;">This user does not exist.</span>' : ''; ?>
                                        </div>
                                        <div class="input-field col s12">
                                            <label for="passwd">Password</label>
                                            <input id="passwd" type="password" class="validate" name="pass" required>
                                            <?php echo $passEror ? '<span style ="color: red;">The password is incorrect.</span>' : ''; ?>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="btnGroup col-12">
                                            <button class="btn waves-effect waves-light" type="submit" name="submit">
                                                Login
                                            </button>
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


        </div>

        <div id="forgotPasswordModal" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <div class="formReg">
                    <div class="headerForm">
                        <h4>Forgot Password</h4>
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <div class="row mb-0">
                            <form class="col s12" method="post"
                                  action="https://qarabic.com/member-area/bat/rd-mailform6.php" accept-charset="utf-8">
                                <input name="form-type" type="hidden" value="contact"/>

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
                                        <button class="btn waves-effect waves-light" id="cmd_slider" type="submit"
                                                name="submit">
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
<script type="text/javascript" src="https://qarabic.com/resources/newassets/scripts/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="https://qarabic.com/resources/newassets/scripts/materialize.min.js"></script>
<script type="text/javascript" src="https://qarabic.com/resources/newassets/scripts/common.js"></script>
<script type="text/javascript" src="https://qarabic.com/resources/newassets/scripts/bootstrap.min.js"></script>

</body>

</html>