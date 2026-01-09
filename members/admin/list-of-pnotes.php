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
function ParentName($var){
$sql = "SELECT parent_name FROM account Where parent_id = '$var'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$sched111 = $row['parent_name'];
					echo $sched111;

			}
			}
}
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
$sql = "SELECT * FROM diary_notes WHERE reminder <= '$var1' AND teacher_id = '$var2' AND status = '$var3'";
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
function coming($var1, $var2){
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM diary_notes WHERE reminder > '$var1' AND teacher_id = '$var2' AND status = '$var3'";
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
$page_title = 'Diary Notes';
$page_subtitle = 'Daily Reminders';
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
                                                        <div class="tab-subheading"><?php echo pending("$sy","$ID","1"); ?></div>
                                                    </a></li>
                                                <li class="nav-item">
                                                    <a data-toggle="tab" href="#tab-eg9-1" class="nav-link">
                                                        <div class="widget-number">Completed</div>
                                                        <div class="tab-subheading"><?php echo pending("$sy","$ID","2"); ?></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a data-toggle="tab" href="#tab-eg9-2" class="nav-link">
                                                        <div class="widget-number text-success">Upcoming</div>
                                                        <div class="tab-subheading"><?php echo coming("$sy","$ID","1"); ?></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-eg9-0" role="tabpanel">
                                                <div class="card-body">
                                                <?php 
// sending query
$sql = "SELECT * FROM diary_notes WHERE status = '1' AND teacher_id = '$ID' AND reminder <= '$sy' ORDER BY note_id DESC;";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo 'No Active Reminder!';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$note_id = $row['note_id'];
            $parent_id = $row['parent_id'];
            $teacher_id = $row['teacher_id'];
            $user_id = $row['user_id'];
            $date = $row['date'];
            $reminder = $row['reminder'];
            $status = $row['status'];
            $note_text = $row['note_text'];
?>
                                                <div class="col-md-12">
                                    <div class="card-hover-shadow-2x mb-3 card">
                                        <div class="card-header">Added By: <?php echo TeacherName("$user_id",'1'); ?> For: <?php echo TeacherName("$teacher_id",'1'); ?> <?php echo ParentName($parent_id); ?>  on <?php echo date('D jS F-Y', strtotime($date)); ?></div>
                                        <div class="card-body"><p><?php echo $note_text; ?></p>
                                            <p class="mb-0">Reminder Date <a class="invoicelink" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="<?php echo $note_id; ?>" date="<?php echo $reminder; ?>" note="<?php echo $note_text; ?>"><?php echo date('D jS F-Y',strtotime($reminder)); ?></a></p></div>
                                        <div class="d-block text-right card-footer">
                                            <a href="note-completed?note_id=<?php echo $note_id; ?>"><button type="button" class="btn red btn-xs">Pending</button></a>
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
$sql = "SELECT * FROM diary_notes WHERE status = '2' AND teacher_id = '$ID' ORDER BY note_id DESC;";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo 'No Active Reminder!';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$note_id = $row['note_id'];
            $parent_id = $row['parent_id'];
            $teacher_id = $row['teacher_id'];
            $user_id = $row['user_id'];
            $date = $row['date'];
            $reminder = $row['reminder'];
            $status = $row['status'];
            $note_text = $row['note_text'];
?>
                                                <div class="col-md-12">
                                    <div class="card-hover-shadow-2x mb-3 card">
                                        <div class="card-header">Added By: <?php echo TeacherName("$user_id",'1'); ?> For: <?php echo TeacherName("$teacher_id",'1'); ?> <?php echo ParentName($parent_id); ?>  on <?php echo date('D jS F-Y', strtotime($date)); ?></div>
                                        <div class="card-body"><p><?php echo $note_text; ?></p>
                                            <p class="mb-0">Reminder Date <a class="invoicelink" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="<?php echo $note_id; ?>" date="<?php echo $reminder; ?>" note="<?php echo $note_text; ?>"><?php echo date('D jS F-Y',strtotime($reminder)); ?></a></p></div>
                                        <div class="d-block text-right card-footer">
                                            <a href="note-completed?note_id=<?php echo $note_id; ?>"><button type="button" class="btn red btn-xs">Pending</button></a>
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
$sql = "SELECT * FROM diary_notes WHERE status = '1' AND teacher_id = '$ID' AND reminder > '$sy' ORDER BY note_id DESC;";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo 'No Active Reminder!';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$note_id = $row['note_id'];
            $parent_id = $row['parent_id'];
            $teacher_id = $row['teacher_id'];
            $user_id = $row['user_id'];
            $date = $row['date'];
            $reminder = $row['reminder'];
            $status = $row['status'];
            $note_text = $row['note_text'];
?>
                                                <div class="col-md-12">
                                    <div class="card-hover-shadow-2x mb-3 card">
                                        <div class="card-header">Added By: <?php echo TeacherName("$user_id",'1'); ?> For: <?php echo TeacherName("$teacher_id",'1'); ?> <?php echo ParentName($parent_id); ?>  on <?php echo date('D jS F-Y', strtotime($date)); ?></div>
                                        <div class="card-body"><p><?php echo $note_text; ?></p>
                                            <p class="mb-0">Reminder Date <a class="invoicelink" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="<?php echo $note_id; ?>" date="<?php echo $reminder; ?>" note="<?php echo $note_text; ?>"><?php echo date('D jS F-Y',strtotime($reminder)); ?></a></p></div>
                                        <div class="d-block text-right card-footer">
                                            <a href="note-completed?note_id=<?php echo $note_id; ?>"><button type="button" class="btn red btn-xs">Pending</button></a>
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
                <!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>                
<div class="modal fade bd-example-modal-lg" id="invoice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        </div>
    </div>
</div>
<!-- Large modal end  -->
<?php echo $footer; ?>
<script>
$('.invoicelink').click(function(){
    var famID=$(this).attr('data-id');
    var famDate=$(this).attr('date');
    var famNote=$(this).attr('note');

    $.ajax({url:"note-date.php?famID="+famID+"&famDate="+famDate+"&famNote="+famNote,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>