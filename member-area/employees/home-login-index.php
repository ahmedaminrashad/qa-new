<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include("../includes/session.php");
require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}

date_default_timezone_set("Asia/Karachi");
$sy = date('Y-m-d');
$y = date('Y');

// Helper function to check rights with whitelisted field names
function checkRights($conn, $teacher_id, $rights_field, $rights_value, $panel_url, $panel_name) {
    if (!isset($teacher_id) || empty($teacher_id)) {
        return '';
    }
    
    // Whitelist allowed field names for security
    $allowed_fields = ['csr_rights', 'teacher_rights', 'super_rights', 's_supper_rights', 'monitor_rights', 'accounts', 'billing_rights'];
    if (!in_array($rights_field, $allowed_fields)) {
        error_log("Invalid rights field: $rights_field");
        return '';
    }
    
    $stmt = $conn->prepare("SELECT * FROM profile WHERE teacher_id = ? AND `$rights_field` = ? LIMIT 1");
    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error);
        return '';
    }
    
    $stmt->bind_param("ss", $teacher_id, $rights_value);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    if ($result->num_rows > 0) {
        return '<div class="lock-bottom">
                    <a href="' . htmlspecialchars($panel_url) . '"><button type="submit" class="btn btn-success uppercase">
                    Visit ' . htmlspecialchars($panel_name) . ' Panel</button></a>
        </div>';
    }
    return '';
}

function csr() {
    global $conn;
    $ID = isset($_SESSION['is']['teacher_id']) ? $_SESSION['is']['teacher_id'] : null;
    return checkRights($conn, $ID, 'csr_rights', '1', 'customer-service-representative/home', 'CSR');
}

function teacher() {
    global $conn;
    $ID = isset($_SESSION['is']['teacher_id']) ? $_SESSION['is']['teacher_id'] : null;
    return checkRights($conn, $ID, 'teacher_rights', '1', 'teacher/teacher-home', 'Teacher');
}

function manager() {
    global $conn;
    $ID = isset($_SESSION['is']['teacher_id']) ? $_SESSION['is']['teacher_id'] : null;
    return checkRights($conn, $ID, 'super_rights', '1', 'manager/admin-home', 'Manager');
}

function s_manager() {
    global $conn;
    $ID = isset($_SESSION['is']['teacher_id']) ? $_SESSION['is']['teacher_id'] : null;
    return checkRights($conn, $ID, 's_supper_rights', '1', 'senior-manager/admin-home', 'S-Manager');
}

function moni() {
    global $conn;
    $ID = isset($_SESSION['is']['teacher_id']) ? $_SESSION['is']['teacher_id'] : null;
    return checkRights($conn, $ID, 'monitor_rights', '2', 'monitor/admin-home', 'Monitor');
}

function accounts() {
    global $conn;
    $ID = isset($_SESSION['is']['teacher_id']) ? $_SESSION['is']['teacher_id'] : null;
    return checkRights($conn, $ID, 'accounts', '1', 'accounts/list-of-voucher', 'Accounts');
}

function billing() {
    global $conn;
    $ID = isset($_SESSION['is']['teacher_id']) ? $_SESSION['is']['teacher_id'] : null;
    return checkRights($conn, $ID, 'billing_rights', '1', 'billing/invoice-details', 'Billing');
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">

<title>Qarabic - ONLINE QURAN AND ARABIC LEARNING INSTITUTE</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>

<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="../assets/admin/pages/css/lock.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
    <link rel="shortcut icon" href="https://qarabic.com/vendor/local/imgs/icons/meta/android-icon-192x192.png"/>
   	<link rel="icon" type="image/png" href="https://qarabic.com/vendor/local/imgs/icons/meta/android-icon-192x192.png" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body style="background-color: #00613e !important;">
<div class="page-lock">
	<div class="page-logo">
		<a class="brand" >
		<img style="height: 18vh;" src="https://qarabic.com/vendor/local/imgs/logo-btm.svg" alt="logo"/>
		</a>
	</div>
	<!--<div class="page-logo" style ="color: white;-->
 <!--   font-size: 5VH;">-->
	<!--	Qarabic-->
	<!--</div>-->
	<div class="page-body" style="background-color: #00613e !important;">
	<div class="lock-head">
			 You have following rights
		</div>
		<?php echo csr(); ?>

		<?php echo teacher(); ?>
		<?php echo manager(); ?>
		<?php echo s_manager(); ?>
		<?php echo accounts(); ?>
		<?php echo billing(); ?>
		<?php echo moni(); ?>
	</div>
	<div class="page-footer-custom">
		 <?php echo $y; ?> Â© . Admin Dashboard
	</div>
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {    
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>