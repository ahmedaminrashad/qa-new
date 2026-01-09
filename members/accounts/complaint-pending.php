<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $tt = $_SESSION['is']['parent_id'];
  function pen_com($var)
  	{
  	require ("../includes/dbconnection.php");
  		$sql = "SELECT * FROM complaint WHERE cn_id = '1' AND parent_id = '$var'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo number_format($numberOfRows, 0);
}
function com_com($var)
  	{
  	require ("../includes/dbconnection.php");
  		$sql = "SELECT * FROM complaint WHERE cn_id = '2' AND parent_id = '$var'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo number_format($numberOfRows, 0);
}
function teacher($var)
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM profile WHERE teacher_id = '$var'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$hidden_pcourse = $row['teacher_id'];
					$hidden_proom = $row['teacher_name'];
					echo $hidden_proom;
			
			}
			}
	}
?>
<?php
$page_title = 'Complaint Records';
$page_subtitle = 'Complaint Records';
$table_name = 'Complaint Records';
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
                                                        <div class="tab-subheading"><?php echo pen_com("$tt"); ?></div>
                                                    </a></li>
                                                <li class="nav-item">
                                                    <a data-toggle="tab" href="#tab-eg9-1" class="nav-link">
                                                        <div class="widget-number">All</div>
                                                        <div class="tab-subheading"><?php echo com_com("$tt"); ?></div>
                                                    </a>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-eg9-0" role="tabpanel">
                                                <div class="card-body">
                                                <?php 
// sending query
$sql = "SELECT * FROM complaint WHERE cn_id = '1' AND parent_id = '$tt' ORDER BY com_id DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo 'No Active Complaint Found!';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$cid = $row['com_id'];
			$pid = $row['parent_id'];
			$tid = $row['teacher_id'];
			$pinida = $row['cn_id'];
			$complaint = $row['issue'];
			$tname = $row['teacher_name'];
			$sname = $row['student_name'];
			$sid = $row['student_id'];
			$dateos = $row['date1'];
			$timeos = $row['time'];
			$pnidp = $row['cn_idp'];
			$who = $row['type'];
			$pname = $row['parent_name'];
?>
                                                <!-- TIMELINE ITEM -->
						<div class="vertical-timeline-item vertical-timeline-element">
                                                    <div>
                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                            <i class="badge badge-dot badge-dot-xl badge-success"></i>
                                                        </span>
                                                        <div class="vertical-timeline-element-content bounce-in">
                                                            <h4 class="timeline-title text-info">On: <?php echo $dateos; ?></h4>
                                                            <p><strong class="timeline-title text-danger">COMPLAINT:</strong> <?php echo $complaint; ?></p>
                                                            <p class="timeline-title text-danger">Response Awaiting</p>
                                                            <span class="vertical-timeline-element-date"><?php echo 'Regarding:<br>'.$tname.''; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
						<!-- END TIMELINE ITEM -->
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
$sql = "SELECT * FROM complaint WHERE cn_id = '2' AND parent_id = '$tt' ORDER BY com_id DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo 'No Complaint Found!';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$cid = $row['com_id'];
			$pid = $row['parent_id'];
			$tid = $row['teacher_id'];
			$pinida = $row['cn_id'];
			$complaint = $row['issue'];
			$tname = $row['teacher_name'];
			$sname = $row['student_name'];
			$sid = $row['student_id'];
			$dateos = $row['date1'];
			$timeos = $row['time'];
			$pnidp = $row['cn_idp'];
			$who = $row['type'];
			$pname = $row['parent_name'];
			$res = $row['feed'];
			$res_date = $row['feed_date'];
			$res_time = $row['feed_time'];
			$res_id = $row['feed_id'];
?>
                                                <!-- TIMELINE ITEM -->
						<div class="vertical-timeline-item vertical-timeline-element">
                                                    <div>
                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                            <i class="badge badge-dot badge-dot-xl badge-success"></i>
                                                        </span>
                                                        <div class="vertical-timeline-element-content bounce-in">
                                                            <h4 class="timeline-title text-info">On: <?php echo $dateos; ?></h4>
                                                            <p><strong class="timeline-title text-danger">COMPLAINT:</strong> <?php echo $complaint; ?></p>
                                                            <p><strong  class="timeline-title text-success">Responce: <?php echo teacher("$res_id"); ?>:</strong> <?php echo $res; ?><br><?php echo $res_date; ?></p>
                                                            <span class="vertical-timeline-element-date"><?php echo 'Regarding:<br>'.$tname.''; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
						<!-- END TIMELINE ITEM -->
                                    <?php 	
		}
	}	
?>
 </div>
                                        </div>
                                    </div>
                    </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>