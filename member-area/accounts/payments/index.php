<?php
require('config.php');
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
?>
<form action="submit.php" method="post">
	<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" 
	data-key="<?php echo $publishableKey ?>" 
	data-amount="<?php echo $amount ?>" 
	data-name="<?php echo $name ?>" 
	data-description="<?php echo $description ?>" 
	data-image="<?php echo $image ?>" 
	data-currency="<?php echo $currency ?>" 
	data-email="<?php echo $email ?>">
	</script>

</form>