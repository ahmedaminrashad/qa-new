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
 * Class RecipientTransfer
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property int $amount_reversed
 * @property string $balance_transaction
 * @property string $bank_account
 * @property string $card
 * @property int $created
 * @property string $currency
 * @property int $date
 * @property string $description
 * @property string $destination
 * @property string $failure_code
 * @property string $failure_message
 * @property bool $livemode
 * @property StripeObject $metadata
 * @property string $method
 * @property string $recipient
 * @property mixed $reversals
 * @property bool $reversed
 * @property string $source_type
 * @property string $statement_descriptor
 * @property string $status
 * @property string $type
 *
 * @package Stripe
 */
class RecipientTransfer extends ApiResource
{

}
