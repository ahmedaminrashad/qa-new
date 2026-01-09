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
 * Class BalanceTransaction
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property int $available_on
 * @property int $created
 * @property string $currency
 * @property string $description
 * @property float $exchange_rate
 * @property int $fee
 * @property mixed $fee_details
 * @property int $net
 * @property string $source
 * @property string $status
 * @property string $type
 *
 * @package Stripe
 */
class BalanceTransaction extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Retrieve;

    /**
     * @return string The class URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     */
    public static function classUrl()
    {
        return "/v1/balance/history";
    }
}
