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
?>
<?php
$page_title = 'Generate Monthly Salary Analysis';
$page_subtitle = 'Generate Monthly Salary';
$table_name = 'Generate Monthly Salary';
?>
<?php echo $main_header; ?>
<head>
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
										<form id="signupForm" class="col-md-10 mx-auto" method="post" action="monthly-salary-details-ana">
                                <div class="form-group">
                                    <label for="firstname">Month</label>
                                    <div>
                                        <select required class="form-control input-circle" name="mon"  id="mon" onchange="javascript: return optionList49_SelectedIndex()">
                      							<option value="01">January</option>
												<option value="02">February</option>
												<option value="03">March</option>
												<option value="04">April</option>
												<option value="05">May</option>
												<option value="06">June</option>
												<option value="07">July</option>
												<option value="08">August</option>
												<option value="09">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
              									</select>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="lastname">Year</label>
                                    <div>
                                        <select required class="form-control" data-placeholder="Select..." name="yyy"  id="yyy">
												<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM school_yr ORDER BY year_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
  <option value="<?php echo $row['school_year'];?>"><?php echo $row['school_year'];?> </option>
  <?php } ?>
</select>
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
<?php echo $footer; ?>