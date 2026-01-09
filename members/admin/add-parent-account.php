<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  if (isset($_POST['cmdSubmit'])) 
  	{
  	require ("../includes/dbconnection.php");
  				$pname= $_POST['pname'];
			$pemail= $_POST['pemail'];
			$puser= $_POST['pemail'];
			$ppass= 1234;
			$pcon = $_POST['pcon'];
			$pcity= $_POST['pname4'];
			$ptele= $_POST['pname1'];
			$pmob= $_POST['pname2'];
			$pskype= $_POST['pname3'];
			$pfee= $_POST['pfee'];
			$pman = $_POST['pman'];
			$pcur = $_POST['pcurrency'];
			$pmod = $_POST['pmode'];
			$pd = $_POST['pdate'];
			$bl = $_POST['pbelong'];
			$tz = $_POST['ptime'];
			$triald = $_POST['trialdate'];
			$areq =$_REQUEST['req'];
			$ainvoice =$_REQUEST['invoice'];
			$acycle =$_REQUEST['indate'];
			$agroup =$_REQUEST['group'];

$sql = "SELECT * FROM account";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
			$test_parent_id = $row['parent_id'];
			$test_email = $row['email'];
			if ($test_email == $pemail){
			   $sql = "SELECT * FROM account HAVING parent_id = '$test_parent_id'";
			 $result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
			$aa_pid = $row['parent_id'];
			$aa_parent = $row['parent_name'];
			$aa_email = $row['email']; 
			}
			}
			$note = '<div class="alert alert-danger">* An account with email <b>' . $aa_email. '</b> already exist in database with name <b>' . $aa_parent. '</b></div>';
			$conflict = true;
			end;
			} 
			}
			}
if ($conflict != true){
			$sql = "INSERT INTO account(parent_name, email, username, userpass, c_id, telephone, mobile, skype, fee, city, m_id, currency_id, mode_id, date, belong, timezone, trial_date, csr_id, invoice_type, payment_cycle, group_id, rate)
					VALUES('$pname','$pemail','$puser','$ppass','$pcon','$ptele','$pmob','$pskype','$pfee','$pcity','$pman','$pcur','$pmod','$pd','$bl','$tz','$triald','1','$ainvoice','1','$agroup','$pfee')"; 
				if ($conn->query($sql) === TRUE) {
				    $last_id = $conn->insert_id;
				$sql = "UPDATE new_request SET status = 5, csr_id = $ID WHERE request_id = '$areq'";
				$sql = "INSERT INTO csr_performance(req_id, csr_id, status, date)
					VALUES('1','$ID','1','$pd')";
 		echo "<script>window.open('new-account-email?name=".$pname."&email=".$pemail."&user=".$puser."&pass=".$ppass."&parent_id=".base64_encode($last_id)."','_self')</script>";
 		//echo "<script>window.open('parent-accounts-profile?parent_id=".base64_encode($last_id)."','_self')</script>";
						}
}
}

?>
<?php
$db = new mysqli($server_db,$username_db,$userpass_db,$name_db);
  $query = "SELECT * FROM country";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $categories[] = array("id" => $row['c_id'], "val" => $row['c_a']);
  }

  $query = "SELECT * FROM time_zone";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $subcats[$row['c_id']][] = array("id" => $row['tz_id'], "val" => $row['timezone_name'].$row['timezone_diff']);
  }

  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Add New Family Account';
$page_subtitle = 'You are adding a account!';
$table_name = 'Add Account';
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
        var c_id = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0; //delete all options if any present
        for(var i = 0; i < subcats[c_id].length; i++){
          subcatSelect.options[i] = new Option(subcats[c_id][i].val,subcats[c_id][i].id);
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
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Parent Name</label>
                                    <div>
                                        <input type="text" class="form-control" maxlength="16" value="<?php echo $aname; ?>" name="pname" id="pname" required>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Email</label>
                                    <div>
                                        <input type="email" class="form-control" value="<?php echo $aemail; ?>" name="pemail" id="pemail" required>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">TelePhone</label>
                                    <div>
                                        <input type="text" class="form-control" value="<?php echo $aphone; ?>" name="pname1" id="pname1">
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Mobile</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="Add Cell Number" name="pname2" id="pname2">
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Skype/Zoom</label>
                                    <div>
                                        <input type="text" class="form-control" value="<?php echo $askype; ?>" name="pname3" id="pname3">
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Rate/Fee</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="Add per hours rate" name="pfee" id="pfee" required>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Country</label>
                                    <div>
                                        <select required class="form-control" name="pcon" id="categoriesSelect"></select>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">City</label>
                                    <div>
                                        <input type="text" class="form-control" value="<?php echo $acity; ?>" name="pname4" id="pname4" required>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">TimeZone</label>
                                    <div>
                                        <select required class="form-control" name="ptime" id="subcatsSelect"></select>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Date</label>
                                    <div>
                                        <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="pdate" id="pdate" required>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Manager</label>
                                    <div>
                                        <select required class="form-control" name="pman"  id="pman" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM profile WHERE (cat_id = 5 or super_rights = 1) and active = 1 ORDER BY teacher_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } ?>
               </select>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Payment Mode</label>
                                    <div>
                                        <select required class="form-control" name="pmode"  id="pmode" onchange="javascript: return optionList492_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM payment_mode ORDER BY mode_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['mode_id'];?>"><?php echo $row['mode_name'];?> </option>
                      <?php } ?>
               </select>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Invoice Type</label>
                                    <div>
                                        <select required class="form-control" name="invoice"  id="invoice">
                      							<option value="1">Non-Recurring</option>
												<option value="2">Recurring</option>
               													</select>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Currency</label>
                                    <div>
                                        <select required class="form-control" name="pcurrency"  id="pcurrency" onchange="javascript: return optionList491_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM currency ORDER BY currency_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['currency_id'];?>"><?php echo $row['currency_name'];?> </option>
                      <?php } ?>
               </select>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="firstname">Trial End Date</label>
                                    <div>
                                        <input type="date" class="form-control" name="trialdate" id="trialdate" required>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label for="lastname">Group ID</label>
                                    <div>
                                        <input type="text" class="form-control" name="group" id="group" required>
                                    </div>
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