<?php /* <body><pre>
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

-------------------------------------------------------------------------------------------
  CKEditor - Posted Data

  We are sorry, but your Web server does not support the PHP language used in this script.

  Please note that CKEditor can be used with any other server-side language than just PHP.
  To save the content created with CKEditor you need to read the POST data on the server
  side and write it to a file or the database.

  Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
  For licensing, see LICENSE.md or <a href="http://ckeditor.com/license">http://ckeditor.com/license</a>
-------------------------------------------------------------------------------------------

</pre><div style="display:none"></body> */ include "assets/posteddata.php"; ?>
