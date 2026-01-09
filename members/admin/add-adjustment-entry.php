<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  if ($right != 4)
  {
  header('Location: admin-home');
  }
$enid =$_REQUEST['en_id'];
$acid =$_REQUEST['ac_c_id'];
$en_head =$_REQUEST['en_head'];
$link =$_REQUEST['link'];

    if (isset($_POST['cmdSubmit'])) 
  	{ 		
  	require ("../includes/dbconnection.php");
		 	$amount= $_POST['amu'];
		 	$adate= $_POST['date'];
		 	$anote= $_POST['head_note'];
		 	$end= $_POST['aen_id'];
		 	$acd= $_POST['aac_c_id'];
		 	$enhd= $_POST['aenh_id'];
		 	$link= $_POST['link'];
			$sql = "INSERT INTO adjusment_account (entry_id, ad_amount, ac_cat_id, date, note, head_id)
					VALUES('$end','$amount','$acd','$adate','" . mysqli_real_escape_string($conn, $anote) . "','$enhd')"; 
					if ($conn->query($sql) === TRUE) { 
					echo "<script>window.open('".$link."','_self')</script>";
			 	}
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'A & D Entry';
$page_subtitle = 'You are adding new D & A';
$table_name = 'A & D Entry';
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
                                <div class="card-body"><h5 class="card-title"><?php echo $table_name; ?></h5>
                                    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                <div class="form-group">
                                    <label for="firstname">Amount</label>
                                    <div>
                                        <input required type="text" name="amu" id="amu" class="form-control">
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="lastname">Date upto</label>
                                    <div>
                                        <input required type="date" name="date" id="date" class="form-control input-circle">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Notes (If any)</label>
                                    <div>
                                        <textarea class="form-control" name="head_note" id="head_note"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo $enid; ?>" name="aen_id" id="aen_id" class="form-control input-circle">
<input type="hidden" value="<?php echo $en_head; ?>" name="aenh_id" id="aenh_id" class="form-control input-circle">
<input type="hidden" value="<?php echo $acid; ?>" name="aac_c_id" id="aac_c_id" class="form-control input-circle">
<input type="hidden" value="<?php echo $link; ?>" name="link" id="link" class="form-control input-circle">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="cmdSubmit">Submit</button>
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