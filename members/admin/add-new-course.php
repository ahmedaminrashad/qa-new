<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
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
  $cname= $_POST['course'];
  $dcname= $_POST['dcourse'];
  $ctype= $_POST['dept'];
  $posi= $_POST['pos'];
  $lev= $_POST['level'];
  $desi= $_POST['des'];
  $cage= $_POST['age'];
  $valid_image_check = array("image/gif", "image/jpeg", "image/jpg", "image/png", "image/bmp");
  if (count($_FILES["user_files"]) > 0) {
    $folderName = "../uploads/";

    $sql = "INSERT INTO dept(image_name, department, name, type_id, position_id, course_level, course_des, age) VALUES (:img, '$cname', '$dcname', '$ctype', '$posi', '$lev', '$desi', '$cage')";
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
            $magicianObj->resizeImage(300, 202, 'crop');
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
}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Add Course';
$page_subtitle = 'You are adding a Course!';
$table_name = 'Add Course';
?>
<?php echo $main_header; ?>
<head>
<script src="jquery-1.9.0.min.js"></script>
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
                                    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Course Name</label>
                                    <div>
                                        <input required type="text" placeholder="Hiz-ul-Quran" name="course" id="course" class="form-control">
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Display Name</label>
                                    <div>
                                        <input required type="text" placeholder="Quran Usmani 16 Lines" name="dcourse" id="dcourse" class="form-control">
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Position</label>
                                    <div>
                                        <input required type="number" placeholder="1" name="pos" id="pos" class="form-control">
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Age</label>
                                    <div>
                                        <input required type="number" placeholder="1" name="age" id="age" class="form-control">
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Category</label>
                                    <div>
                                        <select required class="form-control" name="dept"  id="dept" onchange="javascript: return optionList41119_SelectedIndex()">
              												<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM course_cata WHERE lev_id = 2 ORDER BY cata_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['code_id'];?>"><?php echo $row['cata_name'];?> </option>
                      <?php } ?>
               </select>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Description</label>
                                    <div>
                                        <textarea required type="text" placeholder="This course is for beginners......some more text..." name="des" id="des" class="form-control"></textarea>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Level</label>
                                    <div>
                                        <select required class="form-control" name="level"  id="level" onchange="javascript: return optionList41119_SelectedIndex()">
              												<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM course_cata WHERE lev_id = 1 ORDER BY cata_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)) {  ?>
                      <option value="<?php echo $row['code_id'];?>"><?php echo $row['cata_name'];?> </option>
                      <?php } ?>
               </select>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Image</label>
                                    <div>
                                        <input required type="file" name="user_files[]" type="file" multiple="multiple">
                                    </div>
                                </div>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Add Course</button>
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