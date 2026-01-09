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
 * Class Event
 *
 * @property string $id
 * @property string $object
 * @property string $api_version
 * @property int $created
 * @property mixed $data
 * @property bool $livemode
 * @property int $pending_webhooks
 * @property mixed $request
 * @property string $type
 *
 * @package Stripe
 */
class Event extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Retrieve;
}
