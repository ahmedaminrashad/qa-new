<?php

	require_once('../php_image_magician.php');
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../../includes/dbconnection.php");
require_once("../../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}

	/*	Purpose: Open image
     *	Usage:	 resize('filename.type')
     * 	Params:	 filename.type - the filename to open
     */
	$magicianObj = new imageLib('sample_images/racecar.jpg');


	/*	Purpose: Add text to your image
     *	Usage:	 addText([text], [position], [padding])
     * 	Params:	 text - the string of text to add
     * 			 position - choose from the below options
     * 
     * 				tl = top left,
     * 				t  = top (middle), 
     * 				tr = top right,
     * 				l  = left,
     * 				m  = middle,
     * 				r  = right,
     * 				bl = bottom left,
     * 				b  = bottom (middle),
     * 				br = bottom right

     * 			 padding - This moves the image away from the edges (in pixels)
     *	Output:	 This will add the word "test" to the middle of your image in
     *			 default color, white.
     */
	$magicianObj -> addText('test', 'm');


	/*	Purpose: Save image
     *	Usage:	 saveImage('[filename.type]', [quality])
     * 	Params:	 filename.type - the filename and file type to save as
 	 * 			 quality - (optional) 0-100 (100 being the highest (default))
     *				Only applies to jpg & png only
     */
	$magicianObj -> saveImage('output_5.1.png', 100);

?>
