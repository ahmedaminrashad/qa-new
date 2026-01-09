<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $cid =$_REQUEST['ptec'];
   $cname =$_REQUEST['name'];
	$sql = "SELECT * FROM profile WHERE teacher_id = '$cid'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$aaimg = $row['ima'];
			}
			}
?>
<?php
error_reporting(E_ALL & ~E_NOTICE);
@ini_set('post_max_size', '64M');
@ini_set('upload_max_filesize', '64M');

/* * *********************************************** */
// database constants
define('DB_DRIVER', 'mysql');
define('DB_SERVER', $server_db);
define('DB_SERVER_USERNAME', $username_db);
define('DB_SERVER_PASSWORD', $userpass_db);
define('DB_DATABASE', $name_db);

$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
  $DB = new PDO(DB_DRIVER . ':host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, $dboptions);
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}

if (isset($_POST["sub1"]) || isset($_POST["sub2"])) {
  // include resized library
  require_once('../php-image-magician/php_image_magician.php');
  $msg = "";
  $acid= $_POST['ccid'];
  $valid_image_check = array("image/gif", "image/jpeg", "image/jpg", "image/png", "image/bmp");
  if (count($_FILES["user_files"]) > 0) {
    $folderName = "../uploads/";
require ("../includes/dbconnection.php");
    $sql = "UPDATE profile SET ima = :img WHERE teacher_id = '$acid'";
    $stmt = $DB->prepare($sql);

    for ($i = 0; $i < count($_FILES["user_files"]["name"]); $i++) {

      if ($_FILES["user_files"]["name"][$i] <> "") {

        $image_mime = strtolower(image_type_to_mime_type(exif_imagetype($_FILES["user_files"]["tmp_name"][$i])));
        // if valid image type then upload
        if (in_array($image_mime, $valid_image_check)) {

          $ext = explode("/", strtolower($image_mime));
          $ext = strtolower(end($ext));
          $filename = rand(10000, 990000) . '_' . time() . '.' . $ext;
          $filepath = $folderName . $filename;

          if (!move_uploaded_file($_FILES["user_files"]["tmp_name"][$i], $filepath)) {
            $emsg .= "Failed to upload <strong>" . $_FILES["user_files"]["name"][$i] . "</strong>. <br>";
            $counter++;
          } else {
            $smsg .= "<strong>" . $_FILES["user_files"]["name"][$i] . "</strong> uploaded successfully.";

            $magicianObj = new imageLib($filepath);
            $magicianObj->resizeImage(41, 41, 'crop');
            $magicianObj->saveImage($folderName . 'thumb/' . $filename, 100);

            /*             * ****** insert into database starts ******** */
            try {
              $stmt->bindValue(":img", $filename);
              $stmt->execute();
              $result = $stmt->rowCount();
              if ($result > 0) {
                // file uplaoded successfully.
              } else {
                // failed to insert into database.
              }
            } catch (Exception $ex) {
              $emsg .= "<strong>" . $ex->getMessage() . "</strong>. <br>";
            }
            /*             * ****** insert into database ends ******** */
          }
        } else {
          $emsg .= "<strong>" . $_FILES["user_files"]["name"][$i] . "</strong> not a valid image. <br>";
        }
      }
    }


    $msg .= (strlen($smsg) > 0) ? successMessage($smsg) : "";
    $msg .= (strlen($emsg) > 0) ? errorMessage($emsg) : "";
  } else {
    $msg = errorMessage("You must upload atleast one file");
  }
echo "<script>window.open('teacher-accounts-profile?profile_no=".base64_encode($acid)."','_self')</script>";
    
}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = "Upload Teacher's Picture";
$page_subtitle = "Upload Teacher's Picture";
$table_name = "Upload Teacher's Picture";
?>
<?php echo $main_header; ?>
<head>
    <script>
      $(document).ready(function() {
        $(".add").click(function() {
          $('<div><input class="files" name="user_files[]" type="file" ><span class="rem" ><a href="javascript:void(0);" >Remove</span></div>').appendTo(".contents");

        });
        $('.contents').on('click', '.rem', function() {
          $(this).parent("div").remove();
        });

      });
    </script>
  </head>
<body>
<?php echo $top_bar_logo; ?>
<?php echo $search_bar; ?>
<?php echo $notification_bar; ?>
<?php echo $main_menu_start; ?>
<?php echo $main_menu; ?>
<?php echo $main_menu_end; ?>
<div class="app-main__outer">
            
            <!-- App inner start-->
                <div class="app-main__inner">
                
                <!-- Page Title Start-->
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                    </i>
                                </div>
                                <div><?php echo $page_title; ?>
                                    <div class="page-title-subheading"><?php echo $page_subtitle; ?>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <!-- Page Title End-->
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
										<form name="f1" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-row-seperated">
												<div class="form-group">
															<label></label>
															<div>
																<img src="../uploads/<?php echo $aaimg; ?>" alt=""/>
																<img src="../uploads/thumb/<?php echo $aaimg; ?>" alt=""/>	
														</div>
													</div>
												<div class="form-group">
															<label>Image*</label>
															<div>
															<input required type="file" name="user_files[]" type="file" multiple="multiple">														
															</div>
													</div>
												<input type="hidden" value="<?php echo $cid; ?>" name="ccid" id="ccid" class="form-control">
											<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="sub1" value="Sign up">Submit</button>
                                </div>
                            </form>
										</div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
<?php

function errorMessage($str) {
  return '<div style="width:50%; margin:0 auto; border:2px solid #F00;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}

function successMessage($str) {
  return '<div style="width:50%; margin:0 auto; border:2px solid #06C;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}
?>