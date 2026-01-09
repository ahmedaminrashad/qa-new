<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['cmdSubmit'])) 
  	{ 
  	require ("../includes/dbconnection.php");		
		 	$from_me = $ID;
		 	$to_you= $_POST['user'];
		 	$pid= 0;
		 	$pname= 0;
		 	$create_date= $_POST['date'];
		 	$task_status= 1;
		 	$description= $_POST['comment'];
			$sql = "INSERT INTO task_creator (from_person, to_person, date, status, des, parent_id, parent_name)
					VALUES('$from_me', '$to_you', '$create_date', '$task_status', '" . mysqli_real_escape_string($conn, $description) . "', '$pid', '$pname')"; 
					 if ($conn->query($sql) === TRUE) {
					 header(
			 	"Location: pending-issued-tasks");
			 	}
				}
    
?>
<?php
$db = new mysqli($server_db,$username_db,$userpass_db,$name_db);
  $query = "SELECT * FROM employee_catagory WHERE cat_id > 1 OR cat_id < 10";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $categories[] = array("id" => $row['cat_id'], "val" => $row['cat_name']);
  }

  $query = "SELECT * FROM profile";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $subcats[$row['cat_id']][] = array("id" => $row['teacher_id'], "val" => $row['teacher_name']);
  }

  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);
?>
<?php
$sy = date('Y-m-d h:i:sa');
?>
<?php
$page_title = 'Add Task';
$page_subtitle = 'You are adding new task!';
$table_name = 'Add New Task';
?>
<?php echo $main_header; ?>
<head>
<script type="text/javascript" src="./assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
<script type='text/javascript'>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
      ?>
      function loadCategories(){
        var select = document.getElementById("categoriesSelect");
        select.onchange = updateSubCats;
        for(var i = 0; i < categories.length; i++){
          select.options[i] = new Option(categories[i].val,categories[i].id);          
        }
      }
      function updateSubCats(){
        var catSelect = this;
        var teacher_id = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0; //delete all options if any present
        for(var i = 0; i < subcats[teacher_id].length; i++){
          subcatSelect.options[i] = new Option(subcats[teacher_id][i].val,subcats[teacher_id][i].id);
        }
      }
    </script>
</head>
<body onload='loadCategories()'>
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
                                    <input type="hidden" value="<?php echo $sy; ?>" name="date" id="date" class="form-control input-circle">
                                <div class="form-group">
                                    <label for="firstname">Level</label>
                                    <div>
                                        <select class="form-control" name="catid" id="categoriesSelect"></select>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="lastname">To</label>
                                    <div>
                                        <select class="form-control" name="user" id="subcatsSelect"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Description</label>
                                    <div>
                                        <textarea class="form-control" placeholder="Enter Your Comments" name="comment" id="comment"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Create Task</button>
                                </div>
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
                <!-- Footer Start  -->
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                            </div>
                            <div class="app-footer-right">
                            </div>
                        </div>
                    </div>
                </div>    </div>
    </div>
</div>
<div class="app-drawer-wrapper">
    <div class="drawer-nav-btn">
        <button type="button" class="hamburger hamburger--elastic is-active">
            <span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
    </div>
    <div class="drawer-content-wrapper">
        <div class="scrollbar-container">
            <div class="drawer-section">
            </div>
        </div>
    </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div></body>
</html>