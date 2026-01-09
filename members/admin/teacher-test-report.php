<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
function abc($er)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM course Where Teacher = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '--';
			}
		elseif ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			}
}

function test_created($t, $m, $y)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM test_results Where teacher_id = '$t' and MONTH(test_date) = $m AND YEAR(test_date) = $y";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '--';
			}
		elseif ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			}
	}
	
function test_taken($t, $m, $y)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM test_results Where teacher_id = '$t' and MONTH(test_date) = $m AND YEAR(test_date) = $y and status_id = 2";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '--';
			}
		elseif ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			}
	}
function test_remaining($t, $m, $y)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM test_results Where teacher_id = '$t' and MONTH(test_date) = $m AND YEAR(test_date) = $y and status_id = 1";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '--';
			}
		elseif ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			}
	}
function test_trash($t, $m, $y)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM test_results Where teacher_id = '$t' and MONTH(test_date) = $m AND YEAR(test_date) = $y and status_id = 3";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '--';
			}
		elseif ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			}
	}
?>
<?php
$sy = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
?>
<?php
$page_title = 'Teacher Student List';
$page_subtitle = 'Teacher Student List';
$table_name = 'Teacher Student List';
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
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
								<th>
									 Teacher Name
								</th>
								<th>
									 <i class="fa fa-child font-yellow"></i>
								</th>
								<th>
									 <i class="fa fa-thumbs-o-up font-blue"></i>
								</th>
								<th>
									 <i class="fa fa-graduation-cap font-green"></i>
								</th>
								<th>
									 <i class="fa fa-clock-o font-red"></i>
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT `profile`.*, `Gender`.`gender`, `shift`.`shift_name`, `hello`.`inout_name`, `employee_catagory`.`cat_name` FROM `profile`,`Gender`,`shift`,`hello`,`employee_catagory` WHERE profile.g_id=Gender.g_id and profile.shift_id=shift.shift_id and profile.inout_id=hello.inout_id and profile.cat_id=employee_catagory.cat_id HAVING (cat_id = 8 OR  teacher_rights = 1) AND active = 1";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			if($row['g_id']==1 and $row['inout_id']==1) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#D3D3D3';
				}		
				$profile_no = $row['teacher_id'];
			$tname = $row['teacher_name'];
			$shift = $row['shift_name'];
			$q1 = $row['Qualification1'];
			$gender = $row['gender'];
			$sky = $row['Skype'];		
			$pT = $row['teacher_id'];
			$spass = $row['s_pass'];
			$hello = $row['inout_name'];
			$aimage = $row['ima'];
			$witness_id1 = $row['w1'];
			$witness_id2 = $row['w2'];
			$cheque_id = $row['cheque'];
			$agree_id = $row['agreement'];
			$employ = $row['cat_name'];

?>
								<tr>
								<td>
										<div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle" src="../uploads/thumb/<?php echo $aimage; ?>" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading"><a href="teacher-accounts-profile?profile_no=<?php echo base64_encode($profile_no); ?>"><button class="mb-2 mr-2 border-0 btn-transition btn btn-outline-dark"><?php echo $tname; ?> (<?php echo $profile_no; ?>)</button></a> <?php if ($witness_id1 == 1 OR $witness_id2 == 1 OR $cheque_id == 1 Or $agree_id == 1) {echo '<i class="fa fa-warning font-yellow"></i>';} else {echo '';} ?></div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
								</td>
								<td>
									 <a href="teacher-student-list?ptec=<?php echo base64_encode($pT); ?>"><button type="button" class="btn yellow btn-xs"><b><?php echo abc("$pT"); ?></b></button></a>
								</td>
								<td>
									 <a href="teacher-student-list?ptec=<?php echo base64_encode($pT); ?>"><button type="button" class="btn blue btn-xs"><?php echo test_created("$pT","$mm_id","$yy_id"); ?></button></a>
								</td>
								<td>
									 <a href="teacher-student-list?ptec=<?php echo base64_encode($pT); ?>"><button type="button" class="btn green btn-xs"><?php echo test_taken("$pT","$mm_id","$yy_id"); ?></button></a>
								</td>
								<td>
									 <a href="teacher-student-list?ptec=<?php echo base64_encode($pT); ?>"><button type="button" class="btn red btn-xs"><?php echo test_trash("$pT","$mm_id","$yy_id"); ?></button></a>
								</td>
								<td>
									 <a href="teacher-student-list?ptec=<?php echo base64_encode($pT); ?>"><button type="button" class="btn red btn-xs"><?php echo test_remaining("$pT","$mm_id","$yy_id"); ?></button></a>
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
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="notes-d" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<script>
$('.notes').click(function(){
    var famID=$(this).attr('data-id');

    $.ajax({url:"skype-details.php?famID="+famID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>