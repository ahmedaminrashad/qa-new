<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  
$mon = date('F');
$monid = date('n');
if($mon== "January") 
        {
            $m = 1;
        }
    elseif($mon== "February")
        {
            $m = 2;
        } 
    elseif($mon== "March") 
        {
            $m = 3;
        } 
    elseif($mon== "April")
        {
            $m = 4;
        } 
    elseif($mon== "May")
        {
            $m = 5;
        } 
    elseif($mon== "June") 
        {
            $m = 6;
        } 
    elseif($mon== "July")
        {
            $m = 7;
        } 
    elseif($mon== "August") 
        {
            $m = 8;
        } 
    elseif($mon== "September")
        {
            $m = 9;
        } 
    elseif($mon== "October")
        {
            $m = 10;
        } 
    elseif($mon== "November") 
        {
            $m = 11;
        }
    else 
        {
    // Since it is not any of the days above it must be Saturday
            $m = 12;
        }
$sy = date('Y');
if($sy == "2014") 
        {
            $y = 1;
        }
    elseif($sy == "2015")
        {
           $y = 2;
        } 
    elseif($sy == "2016") 
        {
            $y = 3;
        }
    elseif($sy == "2017") 
        {
            $y = 4;
        }
    elseif($sy == "2018") 
        {
            $y = 5;
        }
    elseif($sy == "2019") 
        {
            $y = 6;
        }
    elseif($sy == "2020") 
        {
            $y = 7;
        }

  require ("../includes/dbconnection.php");
  $TE_ID =base64_decode($_GET["ptec"]);
function status($d)
{
require ("../includes/dbconnection.php");
$TE_ID =base64_decode($_GET["ptec"]);
$sql = "SELECT * FROM teacher_attendance WHERE teacher_id = $TE_ID AND date = '$d'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '--';
			}
		else if ($numberOfRows > 0) 
			{echo '<div class="ml-auto badge badge-danger">Absent</div>';}
			}
function color($d)
{
require ("../includes/dbconnection.php");
$TE_ID =base64_decode($_GET["ptec"]);
$sql = "SELECT * FROM teacher_attendance WHERE teacher_id = $TE_ID AND date = '$d'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{echo '#F78181';}
			}
function delete($d)
{
require ("../includes/dbconnection.php");
$TE_ID =base64_decode($_GET["ptec"]);
$sql = "SELECT * FROM teacher_attendance WHERE teacher_id = $TE_ID AND date = '$d'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<a href="mark-attendence?t_id='.$TE_ID.'&date='.$d.'&status=2"><div class="ml-auto badge badge-info">Mark Absent</div></a>';
				}
			elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$attn_id = $row['attendence_id'];
			echo '<a href="attnd-delete?history_id='.$attn_id.'"><button class="mb-2 mr-2 btn btn-outline-danger">Delete</button></a>';
				}
				}
}
?>
<?php
$page_title = 'Teacher Attendance';
$page_subtitle = 'Teacher Attendance';
$table_name = 'Teacher Attendance';
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
									 Date/Day
								</th>
								<th>
									 Status
								</th>
								<th>
									 &nbsp;
								</th>
								</tr>
								</thead>
								
								<tbody>
								<?php
$date = ''.$sy.'-'.$monid.'-01';
$end = ''.$sy.'-'.$monid.'-' . date('t', strtotime($date)); //get end date of month
?>
<?php while(strtotime($date) <= strtotime($end)) {
        $day_num = date('Y-m-d', strtotime($date));
        $day_name = date('l', strtotime($date));
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
    ?>
    
								<tr>
								<td><?php echo $day_num; ?> - <?php echo $day_name; ?></td>
								<td><?php echo status($day_num); ?></td>
								<td><?php echo delete($day_num); ?></td>
    							</tr>
    							<?php 	
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
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Search For Previous Month Attendence Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="attendence-calander-search">
				<input type="hidden" id="ptec" name="ptec"  value="<?php echo base64_encode($pT); ?>" />
                                <div class="form-group">
<label>Month</label>
<div>
<select required class="form-control" name="month_id"  id="month_id">

<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
$sql = "SELECT * FROM month ORDER BY month_id ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){  ?>
<option value="<?php echo $row['num'];?>"><?php echo $row['month_name'];?> </option>
<?php } ?>
</select>
</div>
</div>
<div class="form-group">
<label>Year</label>
<div>
<select required class="form-control" name="year_id"  id="year_id">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Large modal end  -->