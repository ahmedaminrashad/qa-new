<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $tk_id =base64_decode($_REQUEST["task"]);
  function TeacherName($var, $a){
  require ("../includes/dbconnection.php");
$sql = "SELECT * FROM profile Where teacher_id = '$var'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
					$name = $row['teacher_name'];
					$img = $row['ima'];
	
			  		if ($a == 1){
			  		echo $name;
			  		}
			  		elseif ($a == 2){
			  		echo $img;
			  		}
			}
			}
}
  $sql = "SELECT * FROM `task_creator` WHERE task_id = '$tk_id'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$taskid = $row['task_id'];
			$pid = $row['parent_id'];
			$pname = $row['parent_name'];
			$to_p = $row['to_person'];
			$to_f = $row['from_person'];
			$add_date = $row['date'];
			$status = $row['status'];
			$type = $row['clear'];
			$des = $row['des'];
	}
	}
?>
<?php
$db = new mysqli($server_db,$username_db,$userpass_db,$name_db);
  $query = "SELECT * FROM employee_catagory WHERE cat_id > 1 OR cat_id < 10";
  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)){
    $categories[] = array("id" => $row['cat_id'], "val" => $row['cat_name']);
  }

  $query = "SELECT * FROM profile";
  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)){
    $subcats[$row['cat_id']][] = array("id" => $row['teacher_id'], "val" => $row['teacher_name']);
  }

  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);
?>
<?php
$page_title = 'Task String';
$page_subtitle = 'Task String';
$table_name = 'Task String';
?>
<?php echo $main_header; ?>
<script>
    function Reload()   {
        document.getElementById("mytable").innerHTML;
    }
    </script>
<head>
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
<style type="text/css">
.auto-style1 {
	color: #B70E0E;
}
.auto-style2 {
	color: #115911;
}
.auto-style3 {
	color: #0A0A87;
}
</style>
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
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                    <div>
                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                            <i class="badge badge-dot badge-dot-xl badge-success"></i>
                                                        </span>
                                                        <div class="vertical-timeline-element-content bounce-in text-success">
                                                            <h4 class="timeline-title">by: <?php echo TeacherName("$to_f",'1'); ?> Fo: <?php echo TeacherName("$to_p",'1'); ?> On <?php echo $add_date; ?></h4>
                                                            <p><?php echo $des; ?></p>
                                                            <span class="vertical-timeline-element-date"><div class="avatar-icon"><img
                                                                                src="../uploads/thumb/<?php echo TeacherName("$to_f","2"); ?>"
                                                                                alt=""></div></span>
                                                        </div>
                                                    </div>
                                                </div>
						<?php 
$tk_id =base64_decode($_REQUEST["task"]);
$sql = "SELECT * FROM `task_string` WHERE task_id = '$tk_id' ORDER BY string_id ASC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$stringid = $row['string_id'];
			$takid = $row['task_id'];
			$userid = $row['user'];
			$dateid = $row['date'];
			$msg = $row['msg'];
?>
<!-- TIMELINE ITEM -->
						<div class="vertical-timeline-item vertical-timeline-element">
                                                    <div>
                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                            <i class="badge badge-dot badge-dot-xl badge-success"></i>
                                                        </span>
                                                        <div class="vertical-timeline-element-content bounce-in <?php if ($userid == 1) { echo 'text-success'; } else { echo 'text-dark'; } ?>">
                                                            <h4 class="timeline-title"><?php echo TeacherName("$userid","1"); ?> Responded at <?php echo $dateid; ?></h4>
                                                            <p><?php echo $msg; ?></p>
                                                            <span class="vertical-timeline-element-date"><div class="avatar-icon"><img
                                                                                src="../uploads/thumb/<?php echo TeacherName("$userid","2"); ?>"
                                                                                alt=""></div></span>
                                                        </div>
                                                    </div>
                                                </div>
						<!-- END TIMELINE ITEM -->
<?php 	
		}
	}	
?>
					<div class="vertical-timeline-item vertical-timeline-element">
                                                    <div>
                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                            <i class="badge badge-dot badge-dot-xl badge-success"></i>
                                                        </span>
                                                        <div class="vertical-timeline-element-content bounce-in">
                                                            <h4 class="timeline-title"><?php if ($status == 2){ echo '<span class="text-danger">Action Pending from your side...</span>'; } elseif ($status == 1){ echo '<span class="text-success">No Action Required from your side...</span>';} ?></h4>
                                                            <p><?php if ($type == 1){ echo '<div class="page-title-actions">
                                <div class="d-inline-block dropdown">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                        <span class="btn-icon-wrapper pr-2 opacity-7">
                                            <i class="fa fa-business-time fa-w-20"></i>
                                        </span>
                                        Actions
                                    </button>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" data-target="#note" data-toggle="modal">
                                                    <i class="nav-link-icon lnr-inbox"></i>
                                                    <span>
                                                        Add New Comment
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-target="#task" data-toggle="modal">
                                                    <i class="nav-link-icon lnr-book"></i>
                                                    <span>
                                                        Re-Allocate
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="clear-issued-task?new_id='.$taskid.'">
                                                    <i class="nav-link-icon lnr-picture"></i>
                                                    <span>
                                                        Close Task
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>'; } elseif ($type == 2){ echo 'Task Closed'; } ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
					</div>
                                        </div>
                                    </div>
                    </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="note" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Comment <?php echo TeacherName("$to_p",'1'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="add-new-comment-issued-task">
				<input type="hidden" value="<?php echo $taskid; ?>" name="new_id" id="new_id" class="form-control input-circle">
				<input type="hidden" value="<?php echo $to_f; ?>" name="usertk_id" id="usertk_id" class="form-control input-circle">
                                <div class="form-group">
                                    <div>
                                    <div class="position-relative form-group"><label for="exampleSelect" class="">Your Comments</label>
                                                    <textarea class="form-control" placeholder="Enter Your Comments" name="comment" id="comment"></textarea>
                                                    </div>
                                                </div>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Submit</button>
                                </div>
                            </form>
        </div>
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="task" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Comment <?php echo TeacherName("$to_p",'1'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="add-new-comment-issued-task">
				<form action="re-allocate-issued-task" method="post" class="form-horizontal form-row-seperated">
												<div class="form-group">
															<label>Level</label>
															<div>
															<select class="form-control" name="catid" id="categoriesSelect"></select>
              												</div>
												</div>
												<div class="form-group">
															<label>To</label>
															<div>
															<select class="form-control" name="techid" id="subcatsSelect"></select>
              												</div>
												</div>
												<div class="form-group">
													<label>
													Your Comments</label>
													<div>
														<textarea class="form-control" placeholder="Enter Your Comments" name="comment" id="comment"></textarea>
													</div>
												</div>
												<input type="hidden" value="<?php echo $taskid; ?>" name="new_id" id="new_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $to_f; ?>" name="usertk_id" id="usertk_id" class="form-control input-circle">
												</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
    </div>
</div>
</div>
<!-- Large modal end  -->