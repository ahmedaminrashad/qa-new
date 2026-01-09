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

    if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$vun= $_POST['vou_n'];
		 	$chn= $_POST['che_n'];
		 	$vdate= $_POST['vou_date'];
		 	$vtype= $_POST['vou_type'];
		 	$vbank= $_POST['bank_id'];
			$sql = "INSERT INTO voucher (voucher_num, cheque_num, date, type_id, bank_id)
					VALUES('$vun','$chn','$vdate','$vtype','$vbank')"; 
					 if ($conn->query($sql) === TRUE) {
			 	echo "<script>window.open('list-of-voucher','_self')</script>";
			 	}
				}
?>
<?php
$sy = date('Y-m-d');
$month = date('M');
$year = date('y');
?>
<?php
$page_title = 'Add Payment Voucher';
$page_subtitle = 'You are adding a Payment Voucher!';
$table_name = 'Add Payment Voucher';
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
															<label>Voucher Number</label>
															<div>
															<input required type="text" value="<?php echo $month; ?>/<?php echo $year; ?>/" name="vou_n" id="vou_n" class="form-control" readonly="">															</div>
												</div>
												<div class="form-group">
															<label>Cheque Number</label>
															<div>
															<input required type="text" name="che_n" id="che_n" class="form-control">															</div>
												</div>
												<div class="form-group">
															<label>Date</label>
															<div>
															<input required type="date" name="vou_date" id="vou_date" class="form-control">															</div>
												</div>
												<div class="form-group">
															<label>Type</label>
															<div>
															<select required class="form-control" name="vou_type"  id="vou_type">
												<option value="2">Payment</option>
												<option value="1">Reciept</option>
              									</select>															</div>
												</div>
												<div class="form-group">
															<label>Bank Account</label>
															<div>
															<select required class="form-control" name="bank_id"  id="bank_id" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM bank_account ORDER BY bank_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['bank_id'];?>"><?php echo $row['bank_name'];?> </option>
                      <?php } ?>
               </select>															</div>
												</div>
											<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Submit</button>
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