<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../../../includes/dbconnection.php");
require_once("../../../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}

namespace Stripe;

/**
 * Class SKU
 *
 * @property string $id
 * @property string $object
 * @property bool $active
 * @property mixed $attributes
 * @property int $created
 * @property string $currency
 * @property string $image
 * @property mixed $inventory
 * @property bool $livemode
 * @property StripeObject $metadata
 * @property mixed $package_dimensions
 * @property int $price
 * @property string $product
 * @property int $updated
 *
 * @package Stripe
 */
class SKU extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
