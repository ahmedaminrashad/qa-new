<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Find Student Records';
$page_subtitle = 'Find Student Records';
$table_name = 'Find Student Records';
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
                                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="report-definer">
                                <div class="form-group">
                                    <label for="firstname">Teacher </label>
                                    <div>
                                        <input type="text" autocomplete="off" name="pteacher" list="cars" class="form-control"  required/>
<datalist id="cars">
<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
$sql = "SELECT * FROM profile ORDER BY teacher_id ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){  ?>
<option value="<?php echo $row['teacher_id'];?>"> <?php echo $row['teacher_name'];?> (<?php echo $row['Nationality'];?> <?php if ($row['g_id'] == 1) { echo 'Male'; } else { echo 'Female'; }?>)</option>
<?php } ?>
</datalist>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="lastname">From </label>
                                    <div>
                                        <input type="date" name="date1" id="date1" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="lastname">To </label>
                                    <div>
                                        <input type="date" name="date2" id="date2" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="lastname">Report Type</label>
                                    <div>
                                        <select required class="form-control" name="type"  id="type">
<option value="1">All</option>
<option value="2">By Selected Date</option>
</select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="cmdSubmit" value="Sign up">Search</button>
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