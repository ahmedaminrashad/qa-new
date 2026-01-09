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
		 	$entry = $_POST['avou_id'];
			$head = $_POST['cat_id'];
			$ven = $_POST['ven_id'];
			$mod = $_POST['head_id'];
			$amu = $_POST['amu'];
			$dat = $_POST['edate'];
			$des = $_POST['edes'];
			$bank = $_POST['ebank'];
			$office = $_POST['eoffice'];
			$pot = $_POST['taxp'];

			$sql = "INSERT INTO account_entry(date, voucher_id, description, amount, vendor_id, ac_cat_id, account_head, bank_id, office_id, tax)
					VALUES('$dat','$entry','" . mysql_real_escape_string($des) . "','$amu','$ven','$head','$mod','$bank','$office','$pot')"; 
			if ($conn->query($sql) === TRUE) {
					 header(
			 	"Location: list-of-voucher");
			 	}
			 	else {
  echo "Error: " . $sql . "<br>" . $conn->error;
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
$page_title = 'Add details of voucher';
$page_subtitle = 'Add details of voucher Number '.$voun.'';
$table_name = 'Voucher Form';
?>
<?php echo $main_header; ?>
<head>
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
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
                                    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                <div class="form-group">
                                    <label for="firstname">Voucher</label>
                                    <div>
                                        <input type="text" class="form-control" value="N-A" readonly>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="lastname">Category</label>
                                    <div>
                                        <select class="form-control" name="cat_id" id="categoriesSelect"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Vendor</label>
                                    <div>
                                        <select required class="form-control" name="ven_id"  id="ven_id">
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
                                <div class="form-group">
                                    <label for="lastname">Head</label>
                                    <div>
                                        <select class="form-control" name="head_id" id="subcatsSelect"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Amount</label>
                                    <div>
                                        <input type="text" class="form-control" name="amu" id="amu">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Date</label>
                                    <div>
                                        <input type="date" class="form-control" name="edate" id="edate">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Bank</label>
                                    <div>
                                        <select required class="form-control" name="ven_id"  id="ven_id">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM bank_account ORDER BY bank_id";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['bank_id'];?>"><?php echo $row['bank_name'];?> </option>
                      <?php } ?>
               </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Office</label>
                                    <div>
                                        <select required class="form-control" name="ven_id"  id="ven_id">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM branch_office ORDER BY office_id";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['office_id'];?>"><?php echo $row['office_name'];?> </option>
                      <?php } ?>
               </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Tax Provision</label>
                                    <div>
                                        <input type="text" class="form-control" value="0" name="taxp" id="taxp">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Description</label>
                                    <div>
                                        <textarea class="form-control" name="edes" id="edes"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Sign up</button>
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