<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");

    $vouid =base64_decode($_GET["pT"]);
	$sql = "SELECT * FROM voucher where voucher_id = '$vouid'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$vou_id = $row['voucher_id'];
			$vou_num = $row['voucher_num'];
			$che_num = $row['cheque_num'];
			$vou_date = $row['date'];
			$vou_type = $row['type_id'];
			$vou_bank = $row['bank_id'];
			}
			}
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
  	require ("../includes/dbconnection.php");
			$vun= $_POST['vou_n'];
		 	$chn= $_POST['che_n'];
		 	$voui= $_POST['h_id'];
		 	$vdate= $_POST['vou_d'];
		 	$vtype= $_POST['vou_t'];
		 	$vbank= $_POST['vou_b'];
			$sql = "UPDATE voucher SET voucher_num = '$vun', cheque_num = '$chn', date = '$vdate', bank_id = '$vbank', type_id = '$vtype' where voucher_id = '$voui'"; 
							 if ($conn->query($sql) === TRUE) {
							 echo "<script>window.open('list-of-voucher','_self')</script>";
							 }
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Edit Voucher';
$page_subtitle = 'Edit Voucher';
$table_name = 'Edit Voucher';
?>
<?php echo $main_header; ?>
<body>
<?php echo $top_bar_logo; ?>
<?php //echo $search_bar; ?>
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
															<input required type="text" value="<?php echo $vou_num; ?><?php echo $vouid; ?>" name="vou_n" id="vou_n" class="form-control" readonly="">															</div>
												</div>
												<div class="form-group">
															<label>Cheque Number</label>
															<div>
															<input required type="text" value="<?php echo $che_num; ?>" name="che_n" id="che_n" class="form-control">															</div>
												</div>
												<div class="form-group">
															<label>Date</label>
															<div>
															<input required type="text" value="<?php echo $vou_date; ?>" name="vou_d" id="vou_d" class="form-control">															</div>
												</div>
												<div class="form-group">
															<label>Type</label>
															<div>
															<select required class="form-control" name="vou_t"  id="vou_t">
												<option value="2">Payment</option>
												<option value="1">Reciept</option>
              									</select>															</div>
												</div>
												<div class="form-group">
															<label>Bank Account</label>
															<div>
															<select required class="form-control" name="vou_b"  id="vou_b" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM bank_account ORDER BY bank_id ";			  	
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['bank_id'];?>"><?php echo $row['bank_name'];?> </option>
                      <?php } ?>
               </select>															</div>
												</div>
												<input type="hidden" value="<?php echo $vou_id; ?>" name="h_id" id="h_id" class="form-control">
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
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.vou_t.value = ("<?php echo $vou_type; ?>");
	form.vou_b.value = ("<?php echo $vou_bank; ?>");
	//alert (form.pCityM.value);				
</script>