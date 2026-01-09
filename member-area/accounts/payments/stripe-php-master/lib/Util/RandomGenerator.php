<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../../../../includes/dbconnection.php");
require_once("../../../../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}

namespace Stripe\Util;

/**
 * A basic random generator. This is in a separate class so we the generator
 * can be injected as a dependency and replaced with a mock in tests.
 */
class RandomGenerator
{
    /**
     * Returns a random value between 0 and $max.
     *
     * @param float $max (optional)
     * @return float
     */
    public function randFloat($max = 1.0)
    {
        return mt_rand() / mt_getrandmax() * $max;
    }

    /**
     * Returns a v4 UUID.
     *
     * @return string
     */
    public function uuid()
    {
        $arr = array_values(unpack('N1a/n4b/N1c', openssl_random_pseudo_bytes(16)));
        $arr[2] = ($arr[2] & 0x0fff) | 0x4000;
        $arr[3] = ($arr[3] & 0x3fff) | 0x8000;
        return vsprintf('%08x-%04x-%04x-%04x-%04x%08x', $arr);
    }
}
