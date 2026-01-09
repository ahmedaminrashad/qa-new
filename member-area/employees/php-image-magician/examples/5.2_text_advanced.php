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
     *	Usage:	 addText([text], [position], [padding], [font_color], [font_size], [angle], [font])
     * 	Params:	 text - the string of text to add
     * 			 position - Specified by "width x height". EG: 200 x 300
     * 			 padding - Ignored when specifying exact pixel location
     *			 font_color - The color of the font
     *			 font_size - The size of the font in pixels
     *			 angle - The angle of the text in degress
     *			 font - You can supply your own ttf font. Pass in the name and
     *				path
     *	Output:	 This will add the word "test" 20px in and 30px down on the 
     *			 original image. The text will be gray (#ccc), 12px high, read
	 * 				left to right (angle = 0) and will use the font arialbd.ttf
     *			 default color, white.
     */
	$magicianObj -> addText('test', '20x30', 0, '#ccc', 12, 0, 'image_lib/fonts/arimo.ttf');


	/*	Purpose: Save image
     *	Usage:	 saveImage('[filename.type]', [quality])
     * 	Params:	 filename.type - the filename and file type to save as
 	 * 			 quality - (optional) 0-100 (100 being the highest (default))
     *				Only applies to jpg & png only
     */
	$magicianObj -> saveImage('output_5.2.png', 100);

?>
