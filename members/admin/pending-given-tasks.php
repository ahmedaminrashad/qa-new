<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
?>
<?php
$link = $_SERVER['REQUEST_URI'];
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
function pending($var1, $var2, $var3){
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM task_creator WHERE clear = '$var1' AND to_person = '$var2' AND status = '$var3'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '0';
			}
		elseif ($numberOfRows > 0) 
			{
	echo $numberOfRows;
}
  }
function closed($var1, $var2){
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM task_creator WHERE clear = '$var1' AND to_person = '$var2'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '0';
			}
		elseif ($numberOfRows > 0) 
			{
	echo $numberOfRows;
}
  }
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Pending Task Issued';
$page_subtitle = 'Pending Task Issued';
$table_name = 'Pending Task Issued';
?>
<?php echo $main_header; ?>
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
                                <div class="col-md-12">
                                    <div class="mb-3 card">
                                        <div class="tabs-lg-alternate card-header">
                                            <ul class="nav nav-justified">
                                                <li class="nav-item">
                                                    <a data-toggle="tab" href="#tab-eg9-0" class="active nav-link">
                                                        <div class="widget-number text-danger">Active</div>
                                                        <div class="tab-subheading"><?php echo pending("1","$ID","1"); ?></div>
                                                    </a></li>
                                                <li class="nav-item">
                                                    <a data-toggle="tab" href="#tab-eg9-1" class="nav-link">
                                                        <div class="widget-number">Awaiting</div>
                                                        <div class="tab-subheading"><?php echo pending("1","$ID","2"); ?></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a data-toggle="tab" href="#tab-eg9-2" class="nav-link">
                                                        <div class="widget-number text-success">Closed</div>
                                                        <div class="tab-subheading"><?php echo closed("2","$ID"); ?></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-eg9-0" role="tabpanel">
                                                <div class="card-body">
                                                <?php 
// sending query
$sql = "SELECT * FROM task_creator WHERE clear = '1' AND to_person = '$ID' AND status = '1' ORDER BY task_id DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo 'No Active Task Found!';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$taskid = $row['task_id'];
			$pid = $row['parent_id'];
			$pname = $row['parent_name'];
			$per_to = $row['to_person'];
			$per_from = $row['from_person'];
			$add_date = $row['date'];
			$tStatus = $row['status'];
			$tDes = $row['des'];
			$tClear = $row['clear'];
?>
                                                <div class="col-md-12">
                                    <div class="card-hover-shadow-2x mb-3 card">
                                        <div class="card-header">From: <?php echo TeacherName("$per_from",'1'); ?> To: <?php echo TeacherName("$per_to",'1'); ?> <?php if ($pid > 0){echo '<font color="#44B6AE">&nbsp;  (Family Name: <a href="parent-accounts-profile?parent_id='.base64_encode($pid).'">'.$pname.'</a></font>)';} else {echo '';} ?></div>
                                        <div class="card-body"><p><?php echo $tDes; ?></p>
                                            <p class="mb-0"><?php echo date('jS F-Y',strtotime($add_date)); ?></p></div>
                                        <div class="d-block text-right card-footer">
                                            <a href="task-string-given?task=<?php echo base64_encode($taskid); ?>"><button class="btn-shadow-primary btn btn-danger btn-lg">Open String</button></a>
                                        </div>
                                    </div>
                                    </div>
                                    <?php 	
		}
	}	
?>
                                    </div>
                                            </div>
                                            <div class="tab-pane" id="tab-eg9-1" role="tabpanel">
                                                <div class="card-body">
                                                <?php 
// sending query
$sql = "SELECT * FROM task_creator WHERE clear = '$ID' AND to_person = '$ID' AND status = '2' ORDER BY task_id DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo 'No Awaiting Task Found!';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$taskid = $row['task_id'];
			$pid = $row['parent_id'];
			$pname = $row['parent_name'];
			$per_to = $row['to_person'];
			$per_from = $row['from_person'];
			$add_date = $row['date'];
			$tStatus = $row['status'];
			$tDes = $row['des'];
			$tClear = $row['clear'];
?>
                                                <div class="col-md-12">
                                    <div class="card-hover-shadow-2x mb-3 card">
                                        <div class="card-header">From: <?php echo TeacherName("$per_from",'1'); ?> To: <?php echo TeacherName("$per_to",'1'); ?> <?php if ($pid > 0){echo '<font color="#44B6AE">&nbsp;  (Family Name: <a href="parent-accounts-profile?parent_id='.base64_encode($pid).'">'.$pname.'</a></font>)';} else {echo '';} ?></div>
                                        <div class="card-body"><p><?php echo $tDes; ?></p>
                                            <p class="mb-0"><?php echo date('jS F-Y',strtotime($add_date)); ?></p></div>
                                        <div class="d-block text-right card-footer">
                                            <a href="task-string?task=<?php echo base64_encode($taskid); ?>"><button class="btn-shadow-primary btn btn-danger btn-lg">Open String</button></a>
                                        </div>
                                    </div>
                                    </div>
                                    <?php 	
		}
	}	
?>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab-eg9-2" role="tabpanel">
                                                <div class="card-body">
                                                <?php 
// sending query
$sql = "SELECT * FROM task_creator WHERE clear = '2' AND to_person = '$ID' ORDER BY task_id DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo 'No Closed Task Found!';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$taskid = $row['task_id'];
			$pid = $row['parent_id'];
			$pname = $row['parent_name'];
			$per_to = $row['to_person'];
			$per_from = $row['from_person'];
			$add_date = $row['date'];
			$tStatus = $row['status'];
			$tDes = $row['des'];
			$tClear = $row['clear'];
?>
                                                <div class="col-md-12">
                                    <div class="card-hover-shadow-2x mb-3 card">
                                        <div class="card-header">From: <?php echo TeacherName("$per_from",'1'); ?> To: <?php echo TeacherName("$per_to",'1'); ?> <?php if ($pid > 0){echo '<font color="#44B6AE">&nbsp;  (Family Name: <a href="parent-accounts-profile?parent_id='.base64_encode($pid).'">'.$pname.'</a></font>)';} else {echo '';} ?></div>
                                        <div class="card-body"><p><?php echo $tDes; ?></p>
                                            <p class="mb-0"><?php echo date('jS F-Y',strtotime($add_date)); ?></p></div>
                                        <div class="d-block text-right card-footer">
                                            <a href="task-string?task=<?php echo base64_encode($taskid); ?>"><button class="btn-shadow-primary btn btn-danger btn-lg">Open String</button></a>
                                        </div>
                                    </div>
                                    </div>
                                    <?php 	
		}
	}	
?>
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