<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error.log');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

// Check if user is already logged in
$isLogin = isset($_SESSION['is']['login']) && $_SESSION['is']['login'];
if ($isLogin) {
    header("Location:dashboard");
    exit;
}

// Check if dbconnection exists
if (!file_exists("../includes/dbconnection.php")) {
    die("Database configuration file not found. Please contact administrator.");
}

require("../includes/dbconnection.php");

// Verify database connection is available
if (!isset($conn) || !$conn instanceof mysqli) {
    die("Database connection not available. Please contact administrator.");
}

$error = '';
$userNEror = false;
$passEror = false;

if (isset($_POST['submit'])) { // if form has been submitted
    // Validate and sanitize input
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['pass'] ?? '';
    
    // Check input is not empty
    if (empty($username) || empty($password)) {
        $error = 'You did not fill in a required field.';
        $userNEror = true;
    } else {
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? LIMIT 1");
        if (!$stmt) {
            error_log("Prepare failed: " . $conn->error);
            $error = 'Database error. Please try again later.';
            $userNEror = true;
        } else {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            
            // Check if user exists
            if ($result->num_rows == 0) {
                $error = 'That user does not exist in our database. Please contact the administrator to ask for assistance.';
                $userNEror = true;
            } else {
                $info = $result->fetch_assoc();
                $stmt->close();
                
                // Verify password (NOTE: This should be upgraded to password_verify() with hashed passwords)
                // TODO: Implement proper password hashing using password_hash() and password_verify()
                if ($password != $info['userpass']) {
                    $error = 'Incorrect combination, please try again.';
                    $passEror = true;
                } else {
                    // Login successful - check if admin (dept_id == 4)
                    if ($info['dept_id'] == '4') {
                        $_SESSION['is']['login'] = true;
                        $_SESSION['is']['username1'] = $username;
                        $_SESSION['is']['user_id'] = $info['user_id'];
                        $_SESSION['is']['admin'] = true;
                        
                        // Regenerate session ID for security
                        session_regenerate_id(true);
                        
                        header("Location:dashboard");
                        exit;
                    } else {
                        $error = 'Access denied. Admin privileges required.';
                    }
                }
            }
        }
    }
}
?>
<!-- Error Display Section - Remove in production -->
<?php if (ini_get('display_errors')): ?>
<div style="background: #ff4444; color: white; padding: 10px; margin: 10px; border-radius: 5px;">
    <strong>Debug Mode Active</strong> - Errors will be displayed below if any occur.
    <?php
    // Display any PHP errors/warnings
    if (error_get_last()) {
        $last_error = error_get_last();
        echo '<br><strong>Last Error:</strong> ' . htmlspecialchars($last_error['message']) . ' in ' . htmlspecialchars($last_error['file']) . ' on line ' . $last_error['line'];
    }
    ?>
</div>
<?php endif; ?>
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
</head>

<body>


<main>
    <div class="row no-gutters mb-0">
        <div id="LoginPage" class="col-12"
             style="background: #7A1C1A;margin-top: 0px; height: 100vh;background-size: cover;">
            <div id="StLoginForm" class="PageInternal">
                <h2 style="margin-bottom: 0;">
                    <a href="https://qarabic.com" class="btn-logo">
                        <img style="height: 200px;" src="https://qarabic.com/vendor/local/imgs/logo-white.png">
                    </a>
                    <br>
                    <br>
                    Welcome
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
                                            <input class="form-control form-control-solid placeholder-no-fix"
                                                   type="text" autocomplete="off" placeholder="Username" name="username"
                                                   required>
                                            <label for="username">Username</label>
                                            <?php echo $userNEror ? '<span style="color: red; font-size: 12px;">This user does not exist.</span>' : ''; ?>
                                        </div>
                                        <div class="input-field col s12">
                                            <input class="form-control form-control-solid placeholder-no-fix"
                                                   type="password" autocomplete="off" placeholder="Password" name="pass"
                                                   required>
                                            <label for="passwd">Password</label>
                                            <?php echo $passEror ? '<span style="color: red; font-size: 12px;">The password is incorrect.</span>' : ''; ?>
                                        </div>
                                        <?php if (!empty($error) && !$userNEror && !$passEror): ?>
                                            <div class="col s12" style="color: red; padding: 10px;">
                                                <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                    <div class="">
                                        <div class="btnGroup col-12">
                                            <button class="btn waves-effect waves-light" type="submit" name="submit">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mb-0 feedbackDiv">
                                        <div id="feedback"></div>
                                    </div>

                                </form>
                            </div>
                        </div>

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


<!-- Mirrored from www.qarabic.com/Student by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Oct 2019 12:40:18 GMT -->
</html>