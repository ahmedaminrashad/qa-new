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
 * Class BitcoinReceiver
 *
 * @package Stripe
 *
 * @deprecated Bitcoin receivers are deprecated. Please use the sources API instead.
 * @link https://stripe.com/docs/sources/bitcoin
 */
class BitcoinReceiver extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Retrieve;

    /**
     * @return string The class URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     */
    public static function classUrl()
    {
        return "/v1/bitcoin/receivers";
    }

    /**
     * @return string The instance URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     */
    public function instanceUrl()
    {
        if ($this['customer']) {
            $base = Customer::classUrl();
            $parent = $this['customer'];
            $path = 'sources';
            $parentExtn = urlencode(Util\Util::utf8($parent));
            $extn = urlencode(Util\Util::utf8($this['id']));
            return "$base/$parentExtn/$path/$extn";
        } else {
            $base = BitcoinReceiver::classUrl();
            $extn = urlencode(Util\Util::utf8($this['id']));
            return "$base/$extn";
        }
    }
}
