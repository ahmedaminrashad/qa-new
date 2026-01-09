<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
$link =base64_decode($_REQUEST["link"]);
    $pnid =base64_decode($_REQUEST["parent_id"]);
	$sql = "SELECT * FROM `account` WHERE parent_id = '$pnid'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$pid = $row['parent_id'];
			$pname = $row['parent_name'];
			$pemail = $row['email'];
			$puser = $row['username'];
			$ppass = $row['userpass'];
			$pc11 = $row['c_id'];
			$pt = $row['telephone'];
			$pm = $row['mobile'];
			$ps = $row['skype'];
			$pfe = $row['fee'];
			$pcity = $row['city'];
			$pman = $row['m_id'];
			$pcur = $row['currency_id'];
			$pdate = $row['date'];
			$ppayment = $row['mode_id'];
			$pbelong = $row['belong'];
			$ptz = $row['timezone'];
			$active_s = $row['active'];
			$pmname = $row['username'];
			$t_date = $row['trial_date'];
			$t_group = $row['group_id'];
			}
			}
			echo $pnid;
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
$aname= $_POST['parent_name'];
$aissue= $_POST['issue'];
$adue= $_POST['due'];
$apaid= $_POST['paid'];
$amonth= $_POST['month'];
$ayear= $_POST['year'];
$afee= $_POST['pfe2'];
$astatus= $_POST['psus'];
$apid= $_POST['piid'];
$aemail= $_POST['piemail'];
$atele= $_POST['tcon'];
$amob= $_POST['mcon'];
$askype= $_POST['piskype'];
$acid= $_POST['picid'];
$amanid= $_POST['pimid'];
$acur= $_POST['picur'];
$amode= $_POST['pimode'];		
$sql = "INSERT INTO invoice (parent_id, parent_name, fee, issue, due, submit, status, mon_id, y_id, email, telephone, mobile, skype, c_id, currency_id, mode_id, m_id, group_id)
					VALUES('$apid', '$aname', '$afee', '$aissue', '$adue', '$apaid', '$astatus', '$amonth', '$ayear', '$aemail', '$atele', '$amob', '$askype', '$acid', '$acur', '$amode', '$amanid', '$t_group')"; 
					 if ($conn->query($sql) === TRUE) { header(
			 	"Location: $link");
			 	}
			 	else { echo 'error'; }
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Add Manual Invoice';
$page_subtitle = 'You are adding an Invoice!';
$table_name = 'Invoice Form';
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
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
                                    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="add-manual-invoice?parent_id=MTI=">
                                    <input type="hidden" class="form-control" value="<?php echo $pid; ?>" name="piid" id="piid">
											<input type="hidden" class="form-control" value="<?php echo $pemail; ?>" name="piemail" id="piemail">
											<input type="hidden" class="form-control" value="<?php echo $pt; ?>" name="tcon" id="tcon">
											<input type="hidden" class="form-control" value="<?php echo $pm; ?>" name="mcon" id="mcon">
											<input type="hidden" class="form-control" value="<?php echo $ps; ?>" name="piskype" id="piskype">
											<input type="hidden" class="form-control" value="<?php echo $pc11; ?>" name="picid" id="picid">
											<input type="hidden" class="form-control" value="<?php echo $pman; ?>" name="pimid" id="pimid">
											<input type="hidden" class="form-control" value="<?php echo $pcur; ?>" name="picur" id="picur">
											<input type="hidden" class="form-control" value="<?php echo $ppayment; ?>" name="pimode" id="pimode">
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Parent Name</label>
                                    <div>
                                        <input type="text" class="form-control" value="<?php echo $pname; ?>" name="parent_name" id="parent_name" readonly>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Issue Date</label>
                                    <div>
                                        <input type="text" class="form-control" value = "2018-06-25" name="issue" id="issue" required>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Due Date</label>
                                    <div>
                                        <input type="text" class="form-control" value = "2018-06-30" name="due" id="due" required>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Paid Date</label>
                                    <div>
                                        <input type="text" class="form-control" value = "0000-00-00" name="paid" id="paid">
                                    </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Month</label>
                                    <div>
                                        <select required class="form-control" name="month"  id="month">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM month ORDER BY month_id ";
				$result = mysqli_query($conn, $sql);			  	
				while ($row = mysqli_fetch_assoc($result)) {  ?>
  <option value="<?php echo $row['month_id'];?>"><?php echo $row['month_name'];?> </option>
  <?php } ?>
</select>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Year</label>
                                    <div>
                                        <select required class="form-control" name="year"  id="year" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM school_yr ORDER BY year_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)) {  ?>
  <option value="<?php echo $row['year_id'];?>"><?php echo $row['school_year'];?> </option>
  <?php } ?>
</select>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Fee</label>
                                    <div>
                                        <input required type="text" class="form-control" value="<?php echo $pfe; ?>" name="pfe2" id="pfe2">
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Status</label>
                                    <div>
                                        <select required class="form-control" name="psus"  id="psus" onchange="javascript: return optionList41119_SelectedIndex()">
              												<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM statusp ORDER BY s_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)) {  ?>
  <option value="<?php echo $row['s_id'];?>"><?php echo $row['name'];?> </option>
  <?php } ?>
</select>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Add Invoice</button>
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