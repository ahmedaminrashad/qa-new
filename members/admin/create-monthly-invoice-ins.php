<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
$pid =$_REQUEST['pids'];
$frs =$_REQUEST['frr'];
$cu =$_REQUEST['cur'];
$link =$_REQUEST['link'];
    if (isset($_POST['cmdSubmit'])) 
  	{ 		
$hidden_pdept= $_POST['hidden_pdept'];
			 echo "<script>window.open('up-ins.php?month=".$_POST['pdept']."&due=". $_POST['due']."&year=". $_POST['pgender']."&pid=". $_POST['pcon']."&fr=". $_POST['frr']."&link2=". $_POST['link1']."','_self')</script>";
			}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$mon = date('F');

if($mon== "January") 
        {
            $m = 1;
        }
    elseif($mon== "February")
        {
            $m = 2;
        } 
    elseif($mon== "March") 
        {
            $m = 3;
        } 
    elseif($mon== "April")
        {
            $m = 4;
        } 
    elseif($mon== "May")
        {
            $m = 5;
        } 
    elseif($mon== "June") 
        {
            $m = 6;
        } 
    elseif($mon== "July")
        {
            $m = 7;
        } 
    elseif($mon== "August") 
        {
            $m = 8;
        } 
    elseif($mon== "September")
        {
            $m = 9;
        } 
    elseif($mon== "October")
        {
            $m = 10;
        } 
    elseif($mon== "November") 
        {
            $m = 11;
        }
    else 
        {
    // Since it is not any of the days above it must be Saturday
            $m = 12;
        }
?>
<?php
$sy = date('Y');
if($sy == "2014") 
        {
            $y = 1;
        }
    elseif($sy == "2015")
        {
           $y = 2;
        } 
    elseif($sy == "2016") 
        {
            $y = 3;
        }
    elseif($sy == "2017") 
        {
            $y = 4;
        } 
    elseif($sy == "2018") 
        {
            $y = 5;
        }
    elseif($sy == "2019") 
        {
            $y = 6;
        }
        elseif($sy == "2020") 
        {
            $y = 7;
        }
        elseif($sy == "2021") 
        {
            $y = 8;
        }
        elseif($sy == "2022") 
        {
            $y = 9;
        }
        elseif($sy == "2023") 
        {
            $y = 10;
        }
?>
<?php
$page_title = 'Create Monthly Invoice';
$page_subtitle = 'Create Monthly Invoice';
$table_name = 'Create Monthly Invoice';
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
                                    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
										<div class="form-group">
															<label>
															Select Parent</label>
															<div>
															<select required class="form-control" name="pcon"  id="pcon">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM account HAVING parent_id = $pid";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
  <option value="<?php echo $row['parent_id'];?>"><?php echo $row['parent_name'];?> </option>
  <?php } ?>
</select>															</div>
												</div>
										<div class="form-group">
															<label>
															Select Month</label>
															<div>
															<select required class="form-control" name="pdept"  id="pdept">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM month ORDER BY month_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
  <option value="<?php echo $row['month_id'];?>"><?php echo $row['month_name'];?> </option>
  <?php } ?>
</select>															</div>
												</div>
										<div class="form-group">
															<label>
															Select Year</label>
															<div>
															<select required class="form-control" name="pgender"  id="pgender">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM school_yr ORDER BY year_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
  <option value="<?php echo $row['year_id'];?>"><?php echo $row['school_year'];?> </option>
  <?php } ?>
</select>															</div>
												</div>
												<div class="form-group">
													<label>Fee in (<?php echo $cu; ?>)</label>
													<div>
														<input required type="text" name="frr" id="frr" value="<?php echo $frs; ?>" class="form-control input-circle">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">Due Date</label>
													<div>
														<input required type="date" name="due" id="due" class="form-control input-circle">
													</div>
												</div>
												<input type="hidden" value="<?php echo $link; ?>" name="link1" id="link1" class="form-control input-circle">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Create</button>
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
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.pcon.value = ("<?php echo $pid; ?>");
	form.pdept.value = ("<?php echo $m; ?>");
	form.pgender.value = ("<?php echo $y; ?>");
	//alert (form.pCityM.value);				
</script>
<script>
function goBack() {
    window.history.back();
}
</script>