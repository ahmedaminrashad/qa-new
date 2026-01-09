<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
?>
<?php
function pen_com()
  	{
  	require ("../includes/dbconnection.php");
  		$sql = "SELECT * FROM complaint WHERE cn_id = '1'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo number_format($numberOfRows, 0);
}
function com_com()
  	{
  	require ("../includes/dbconnection.php");
  		$sql = "SELECT * FROM complaint WHERE cn_id = '2'";
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
$sy = date('Y-m-d');
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
                                                        <div class="tab-subheading"><?php echo pen_com(); ?></div>
                                                    </a></li>
                                                <li class="nav-item">
                                                    <a data-toggle="tab" href="#tab-eg9-1" class="nav-link">
                                                        <div class="widget-number">All</div>
                                                        <div class="tab-subheading"><?php echo com_com(); ?></div>
                                                    </a>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-eg9-0" role="tabpanel">
                                                <div class="card-body">
                                                <?php 
// sending query
$sql = "SELECT * FROM complaint WHERE cn_id = '1' ORDER BY com_id DESC";
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
			$pv = $row['validity'];
			if ($pv == 1){ $statusid='<a href="valid-complaint?cid='.$cid.'&vid=2"><button class="btn-shadow-primary btn btn-info btn-lg">Valid</button></a>'; }
			else { $statusid='<a href="valid-complaint?cid='.$cid.'&vid=1"><button class="btn-shadow-primary btn btn-danger btn-lg">Invalid</button></a>'; }
?>
                                                <div class="col-md-12">
                                    <div class="card-hover-shadow-2x mb-3 card">
                                        <div class="card-header"><?php echo '<font color="#44B6AE">From: <a href="parent-accounts-profile?parent_id='.base64_encode($pid).'">'.$pname.'</a></font> Regarding: '.$tname.''; ?></div>
                                        <div class="card-body"><p><?php echo $complaint; ?></p>
                                            <p class="mb-0"><i class="fa fa-calendar"></i> <?php echo ''.$dateos.' &nbsp;<i class="fa fa-clock"></i> '.$timeos.''; ?></p></div>
                                        <div class="d-block text-right card-footer">
                                            <a class="allocation" href="#allocation-c" data-toggle="modal" data-target="#allocation-c" data-id="<?php echo $cid; ?>" data-name="<?php echo $pname; ?>" data-value="<?php echo $complaint; ?>"><button class="btn-shadow-primary btn btn-danger btn-lg">Clear Now</button></a> <?php echo $statusid; ?>
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
$sql = "SELECT * FROM complaint WHERE cn_id = '2' ORDER BY com_id DESC";
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
			$pv = $row['validity'];
			if ($pv == 1){ $statusid='<a href="valid-complaint?cid='.$cid.'&vid=2"><button class="btn-shadow-primary btn btn-info btn-lg">Valid</button></a>'; }
			else { $statusid='<a href="valid-complaint?cid='.$cid.'&vid=1"><button class="btn-shadow-primary btn btn-danger btn-lg">Invalid</button></a>'; }
?>
                                                <div class="col-md-12">
                                    <div class="card-hover-shadow-2x mb-3 card">
                                        <div class="card-header"><?php echo '<font color="#44B6AE">From: <a href="parent-accounts-profile?parent_id='.base64_encode($pid).'">'.$pname.'</a></font> Regarding: '.$tname.'</font>'; ?></div>
                                        <div class="card-body"><p><strong>COMPLAINT:</strong> <?php echo $complaint; ?></p>
                                        <p><i class="fa fa-calendar"></i> <?php echo ''.$dateos.' &nbsp;<i class="fa fa-clock"></i> '.$timeos.''; ?></p>
                                            <p class="mb-0"><strong><?php echo teacher("$res_id"); ?>:</strong> <?php echo $res; ?></p>
                                            <p><i class="fa fa-calendar"></i> <?php echo ''.$res_date.' &nbsp;<i class="fa fa-clock"></i> '.$res_time.''; ?></p></div>
                                        <div class="d-block text-right card-footer">
                                            <?php echo $statusid; ?>
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
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="allocation-c" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<script>
$('.allocation').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');
    var famValue=$(this).attr('data-value');

    $.ajax({url:"clear-complaint.php?famID="+famID+"&famName="+famName+"&famValue="+famValue,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>