<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
function req_note($er)
{
require ("../includes/dbconnection.php");
// sending query
$sql = "SELECT * FROM new_request_comments Where request_id = $er";
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
function type($er)
{
require ("../includes/dbconnection.php");
// sending query
$sql = "SELECT * FROM new_request WHERE status = $er";
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
function csr($t)
  {
  require ("../includes/dbconnection.php");
$sql = "SELECT * FROM profile Where teacher_id = '$t'";
			$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$acat_id = $row['teacher_id'];
					$acat_name = $row['teacher_name'];
					echo $acat_name;
		
			}
			}
	}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'New Request';
$page_subtitle = 'New Request';
$table_name = 'New Request';
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
                    <div class="row">
                            <a href="list-of-new-request"><div class="col-lg-6 col-xl-2">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Active</div>
                                            <div class="widget-subheading">New Request</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-success"><span><?php echo type("1"); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div></a>
                            <a href="list-of-responded-request"><div class="col-lg-6 col-xl-2">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Responded</div>
                                            <div class="widget-subheading">Rejected</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-primary"><span><?php echo type("6"); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div></a>
                            <a href="list-of-allocated-request"><div class="col-lg-6 col-xl-2">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Allocated</div>
                                            <div class="widget-subheading">Assigned to CSR</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-warning"><span><?php echo type("7"); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div></a>
                            <a href="list-of-later-request"><div class="col-lg-6 col-xl-2">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Later</div>
                                            <div class="widget-subheading">See Later</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-danger"><span><?php echo type("10"); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div></a>
                            <a href="list-of-archives-request"><div class="col-lg-6 col-xl-2">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Archive</div>
                                            <div class="widget-subheading">Old Requests</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-danger"><span><?php echo type("2"); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div></a>
                            <a href="list-of-new-request-teaching"><div class="col-lg-6 col-xl-2">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Teaching</div>
                                            <div class="widget-subheading">Teaching Requests</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-danger"><span><?php echo type("3"); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div></a>
                        </div>
                    <!-- Table Row Start-->
                    <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
						<?php 
// sending query
$sql = "SELECT * FROM new_request WHERE status = 7 ORDER BY request_id DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$arequest_id = $row['request_id'];
			$aname = $row['name'];
			$aemail = $row['email'];
			$aphone = $row['phone'];
			$askype = $row['skype'];
			$acountry = $row['country'];
			$acity = $row['city'];
			$amessage = $row['message'];
			$adate = $row['date'];
			$atime = $row['time'];
			$aupdate = $row['time_update'];
			$asent = $row['sent'];
			$acsr_id = $row['csr_id'];
?>
						<div class="vertical-timeline-item vertical-timeline-element">
                                                    <div>
                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                            <i class="badge badge-dot badge-dot-xl badge-success"></i>
                                                        </span>
                                                        <div class="vertical-timeline-element-content bounce-in">
                                                            <h4 class="timeline-title"><?php echo $aname; ?> <?php if ($asite_id == 1){echo '<div class="ml-auto badge badge-info" title="Registartion Form"> Registartion Form</div>';} elseif ($asite_id == 2){echo '<div class="ml-auto badge badge-warning" title="Contact US Form"> Contact US Form</div>';} elseif ($asite_id == 3){echo '<div class="ml-auto badge badge-danger" title="Contact US Form"> Contact US Form</div>';} elseif ($asite_id == 4){echo '<div class="ml-auto badge badge-success" title="Subscribtion Only"> Subscribtion Only</div>';} elseif ($asite_id == 0){echo '<a href="parent-accounts-profile?parent_id='.base64_encode($parent_id).'"><span class="label label-sm label-danger" title="Refferal">Reffered by: '.$parent_name.'</span></a>';} ?></h4>
                                                            <p><div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
								<th>
									 Email
								</th>
								<th>
									 Phone
								</th>
								<th>
									 Skype
								</th>
								<th>
									 Country
								</th>
								<th>
									 City
								</th>
								</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $aemail; ?>
								</td>
								<td>
									 <?php echo $aphone; ?>
								</td>
								<td>
									 <?php echo $askype; ?>
								</td>
								<td>
									 <?php echo $acountry; ?>
								</td>
								<td>
										<?php echo $acity; ?>
								</td>
							</tr>
							<tr>
								<td>
								<strong>Message:</strong>
								</td>
								<td colspan="4">
									<?php echo $amessage; ?>
								</td>
							</tr>
							<tr>
								<td colspan="5">
								<div class="ml-auto badge badge-warning" title="Email Status"><i class="fa fa-envelope"> <?php if ($asent == 2){ echo '<font color="green">Sent</font>';} else { echo '<font color="red">Not Sent</font>';} ?></i></div>
								<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo $arequest_id; ?>" data-name="<?php echo $aname; ?>"><div class="ml-auto badge badge-success" title="Note Details"><i class="fa fa-comments-o"> <?php echo req_note("$arequest_id"); ?></i></div></a>
								<?php if ($acsr_id == 0){ echo '<div class="ml-auto badge badge-danger" title="Allocation"> Not Allocated</div>'; } else { echo '<div class="ml-auto badge badge-info" title="Allocation"><i class="fa fa-mail-forward"></i></div> '.csr("$acsr_id").''; }?>
								</td>
							</tr>
							</tbody>
								</table>
                                    </div></p>
                                    <p><div class="page-title-actions">
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
                                                <a class="nav-link" href="add-new-request-note?req=<?php echo $arequest_id; ?>&name=<?php echo $aname; ?>">
                                                    <i class="nav-link-icon lnr-inbox"></i>
                                                    <span>
                                                        Add Notes
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="welcome-email?request=<?php echo $arequest_id; ?>">
                                                    <i class="nav-link-icon lnr-book"></i>
                                                    <span>
                                                        Send Email
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#allocation-c" data-toggle="modal" data-target="#allocation-c" data-id="<?php echo $arequest_id; ?>" data-name="<?php echo $aname; ?>">
                                                    <i class="nav-link-icon lnr-picture"></i>
                                                    <span>
                                                        Allocate CSR
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="add-parent-account?req=<?php echo $arequest_id; ?>&name=<?php echo $aname; ?>&email=<?php echo $aemail; ?>&phone=<?php echo $aphone; ?>&skype=<?php echo $askype; ?>&city=<?php echo $acity; ?>">
                                                    <i class="nav-link-icon lnr-picture"></i>
                                                    <span>
                                                        Create Account
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="teaching-request?req=<?php echo $arequest_id; ?>">
                                                    <i class="nav-link-icon lnr-picture"></i>
                                                    <span>
                                                        Teaching
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="later-request?req=<?php echo $arequest_id; ?>">
                                                    <i class="nav-link-icon lnr-picture"></i>
                                                    <span>
                                                        Later
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="delete-request?req=<?php echo $arequest_id; ?>">
                                                    <i class="nav-link-icon lnr-picture"></i>
                                                    <span>
                                                        Delete
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div></p>
                                                            <span class="vertical-timeline-element-date"><?php echo $adate; ?><br><?php echo $atime; ?></span>
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
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="notes-d" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<script>
$('.notes').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');

    $.ajax({url:"note-details.php?famID="+famID+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
$('.allocation').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');

    $.ajax({url:"allocate-csr.php?famID="+famID+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>