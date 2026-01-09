<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $SID =$_REQUEST['SID'];
  $Sname =$_REQUEST['Sname'];

function abc($er)
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM course Where Teacher = $er";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo '0';
	}
elseif ($numberOfRows > 0) 
	{
echo $numberOfRows;
}
}

function abc1($er)
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM profile Where teacher_id = '$er' and schedule_status = '1'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo '';
	}
elseif ($numberOfRows > 0) 
	{
			echo '<button class="mb-2 mr-2 btn btn-outline-danger btn-sm">Blocked</button>';
			}
	}
	
function abc2($er)
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM profile Where teacher_id = '$er' and schedule_status = '2'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo '';
	}
elseif ($numberOfRows > 0) 
	{
			echo '<button class="mb-2 mr-2 btn btn-outline-success btn-sm">Un-block</button>';
			}
	}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'List of Certificates';
$page_subtitle = 'List of Certificates';
$table_name = 'List of Certificates';
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
                                        <table class="mb-0 table">
                                            <thead>
								<tr>
								<th>
									 Sr.No
								</th>
								<th>
									 Student Name
								</th>
								<th>
									 Teacher Name
								</th>
								<th>
									 Date
								</th>
								<th>
									 Line 01
								</th>
								<th>
									 Line 02
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								</tr>
								</thead>
                                            <tbody>
                                            <?php 
// sending query
$sql = "SELECT * FROM certificates WHERE student_id = '$SID'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$cer_ID = $row['cer_id'];
			$student_ID = $row['student_id'];
			$student_name = $row['student_name'];
			$teacher_name = $row['teacher_name'];
			$line01 = $row['line01'];
			$line02 = $row['line02'];
			$date = $row['date'];
			$wdate = date('jS F, Y',strtotime($date));

?>
								<tr>
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo $student_name; ?>
								</td>
								<td>
									 <?php echo $teacher_name; ?>
								</td>
								<td>
									 <?php echo $wdate; ?>
								</td>
								<td>
									 <?php echo $line01; ?>
								</td>
								<td>
									 <?php echo $line02; ?>
								</td>
								<td><a class="edit-certificate" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="<?php echo $cer_ID; ?>"><button class="mb-2 mr-2 btn btn-outline-warning">Edit Certificate</button></a></td>
								<td><a href="<?php echo $site; ?>/members/pdf/certificate.php?ID=<?php echo $cer_ID; ?>" target="_blank"><button class="mb-2 mr-2 btn btn-outline-success">Print</button></a></td>
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
<div class="modal fade bd-example-modal-lg" id="invoice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<?php echo $fot; ?>
<script>
$('.edit-certificate').click(function(){
    var famID=$(this).attr('data-id');

    $.ajax({url:"edit-certificate.php?famID="+famID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>