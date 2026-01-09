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
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$link = $_SERVER['REQUEST_URI'];
$vouid =$_REQUEST['vou_id'];
$voun =$_REQUEST['vou_n'];
$voub =$_REQUEST['vou_bank'];
$voubna =$_REQUEST['vou_bankna'];
$voudate =$_REQUEST['vou_date'];
   if (isset($_POST['cmdSubmit'])) 
{
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require ("../includes/dbconnection.php");
		 	$entry =$_REQUEST['vou_id'];
			$head = $_POST['cat_id'];
			$ven = $_POST['ven_id'];
			$mod = $_POST['head_id'];
			$amu = $_POST['amu'];
			$dat = $_POST['edate'];
			$des = $_POST['edes'];
			$bank =$_REQUEST['vou_bank'];
			$office = $_POST['eoffice'];
			$pot = $_POST['taxp'];

			$sql = "INSERT INTO account_entry(date, voucher_id, description, amount, vendor_id, ac_cat_id, account_head, bank_id, office_id, tax)
					VALUES('$dat','$entry','" . mysqli_real_escape_string($conn, $des) . "','$amu','$ven','$head','$mod','$bank','$office','$pot')"; 					
 		if ($conn->query($sql) === TRUE) {
 		$note = "<div class='alert alert-info'>
						<p>
							 Succrssfully added <strong>".$des."</strong>
						</p>
					</div>";
					}
					else {
					$note = "<div class='alert alert-info'>
						<p>
							 Succrssfully added <strong>Null</strong>
						</p>
					</div>";
					}
				}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$db = new mysqli($server_db,$username_db,$userpass_db,$name_db);
  $query = "SELECT * FROM accounts_cat";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $categories[] = array("id" => $row['accounts_cat_id'], "val" => $row['accounts_cat_name']);
  }

  $query = "SELECT * FROM accounts_head";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $subcats[$row['account_cat_id']][] = array("id" => $row['account_head_id'], "val" => $row['account_head_name']);
  }

  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);
?>
<?php
$page_title = 'Add Account Entry';
$page_subtitle = 'You are adding new Add Account Entry '.$voun.'';
$table_name = 'Add Account Entry';
?>
<?php echo $main_header; ?>
<head>
<script type="text/javascript" src="./assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
<style>
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
</style>
<script type='text/javascript'>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
      ?>
      function loadCategories(){
        var select = document.getElementById("categoriesSelect");
        select.onchange = updateSubCats;
        for(var i = 0; i < categories.length; i++){
          select.options[i] = new Option(categories[i].val,categories[i].id);          
        }
      }
      function updateSubCats(){
        var catSelect = this;
        var account_cat_id = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0; //delete all options if any present
        for(var i = 0; i < subcats[account_cat_id].length; i++){
          subcatSelect.options[i] = new Option(subcats[account_cat_id][i].val,subcats[account_cat_id][i].id);
        }
      }
    </script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readCountry.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
</head>
<body onload='loadCategories()'>
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
                                    <div class="table-responsive">
                                        <table class="mb-0 table">
                                            <tbody>
                                            <?php 
// sending query
$sql = "SELECT `account_entry`.*, `accounts_head`.`account_head_name`, `vendor`.`vendor_name` FROM `account_entry`,`accounts_head`, `vendor` WHERE account_entry.account_head=accounts_head.account_head_id and account_entry.vendor_id=vendor.vendor_id HAVING voucher_id = $vouid";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
If ($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
else if ($numberOfRows > 0) 
	{
	while($row = mysqli_fetch_assoc($result)){		
		
			$vid = $row['entry_id'];
			$vdate = $row['date'];
			$vdes = $row['description'];
			$vname = $row['vendor_name'];
			$vmod = $row['ac_cat_id'];
			$vamu = $row['amount'];
			$vhead = $row['account_head_name'];
?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $vdate; ?>
								</td>
								<td>
									 <?php echo $vhead; ?>
								</td>
								<td>
									 <?php echo $vdes; ?>
								</td>
								<td>
									 <?php echo $vname; ?>
								</td>
								<td>
									 Rs. <?php echo $vamu; ?>
								</td>
								<td>
									 <a href="delete-entry?cid=<?php echo $vid; ?>"><button class="mb-2 mr-2 btn btn-outline-danger btn-sm"><i class="lnr-cross-circle"></i></button></a>
								</td>
							</tr>
							<?php 		
		}
	}	
?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
                                    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="<?php echo $link; ?>">
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Voucher</label>
                                    <div>
                                        <input type="text" class="form-control" value="<?php echo $voun; ?>" readonly>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Category</label>
                                    <div>
                                        <select class="form-control" name="cat_id" id="categoriesSelect"></select>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Vendor</label>
                                    <div>
                                        <select required class="form-control" name="ven_id"  id="ven_id" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM vendor ORDER BY vendor_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['vendor_id'];?>"><?php echo $row['vendor_name'];?> </option>
                      <?php } ?>
               </select>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Head</label>
                                    <div>
                                        <select class="form-control" name="head_id" id="subcatsSelect"></select>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Amount</label>
                                    <div>
                                        <input type="text" class="form-control" name="amu" id="amu">
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Date</label>
                                    <div>
                                        <input type="text" class="form-control" value="<?php echo $voudate; ?>" name="edate" id="edate">
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Bank Account</label>
                                    <div>
                                        <input type="text" class="form-control" value="<?php echo $voubna; ?>" readonly>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Office</label>
                                    <div>
                                        <select required class="form-control" name="eoffice"  id="eoffice" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM branch_office ORDER BY office_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['office_id'];?>"><?php echo $row['office_name'];?> </option>
                      <?php } ?>
               </select>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Tax Provision</label>
                                    <div>
                                        <input type="text" class="form-control" value="0" name="taxp" id="taxp">
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Description</label>
                                    <div>
                                        <input type="text" class="form-control" name="edes" id="search-box">
														<div id="suggesstion-box"></div>
                                    </div>
                                </div>
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
                <!-- Footer Start  -->
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                            </div>
                            <div class="app-footer-right">
                            </div>
                        </div>
                    </div>
                </div>    </div>
    </div>
</div>
<div class="app-drawer-wrapper">
    <div class="drawer-nav-btn">
        <button type="button" class="hamburger hamburger--elastic is-active">
            <span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
    </div>
    <div class="drawer-content-wrapper">
        <div class="scrollbar-container">
            <div class="drawer-section">
            </div>
        </div>
    </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div></body>
</html>