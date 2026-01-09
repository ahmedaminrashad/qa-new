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

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}

	/*	Purpose: Open image
     *	Usage:	 resize('filename.type')
     * 	Params:	 filename.type - the filename to open
     */
	$magicianObj = new imageLib('sample_images/racecar.jpg');


	/*	Purpose: Resize image
     *	Usage:	 resizeImage([width], [height], [resize type], [sharpen])
     * 	Params:	 width - the new width to resize to
     *			 height - the new height to resize to
     *			 resize type - choose from the below options
     *
     *      exact = The exact height and width dimensions you set. (Default)
     *      portrait = Whatever height is passed in will be the height that
     *          is set. The width will be calculated and set automatically 
     *          to a the value that keeps the original aspect ratio. 
     *      landscape = The same but based on the width. We try make the image 
     *         the biggest size we can while stil fitting inside the box size
     *      auto = Depending whether the image is landscape or portrait, this
     *          will automatically determine whether to resize via 
     *          dimension 1,2 or 0
     *      crop = Will resize and then crop the image for best fit. You can 
	 *			pass in an array with the crop position ("t", "bl", etc) or
  	 *			the exact position. eg. "50x60".
 	 *	
 	 *			 sharpen - set as true if you would like shapening applied to 
 	 *				to your resized image    
     */	
	
	$magicianObj -> resizeImage(200, 200, array('crop', 'tr'), true);
	$magicianObj -> saveImage('output_1.5_a.jpg', 100);
	
	// *** Or 
	$magicianObj -> reset();

	$magicianObj -> resizeImage(200, 200, 'crop-tr', true);
	$magicianObj -> saveImage('output_1.5_b.jpg', 100);

?>
