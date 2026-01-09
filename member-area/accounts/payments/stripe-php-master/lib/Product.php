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
 * Class Product
 *
 * @property string $id
 * @property string $object
 * @property bool $active
 * @property string[] $attributes
 * @property string $caption
 * @property int $created
 * @property string[] $deactivate_on
 * @property string $description
 * @property array $images
 * @property bool $livemode
 * @property StripeObject $metadata
 * @property string $name
 * @property mixed $package_dimensions
 * @property bool $shippable
 * @property Collection $skus
 * @property string $statement_descriptor
 * @property string $type
 * @property int $updated
 * @property string $url
 *
 * @package Stripe
 */
class Product extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
