<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  include("monitoring-functions.php");
   $link = $_SERVER['REQUEST_URI'];
   $ccc =$_REQUEST['course'];
   ?>
<?php
$page_title = 'Pending Reports';
$page_subtitle = 'List of Pending Reports';
$table_name = 'Pending Reports';
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
									 Date
								</th>
								<th>
									 Student Name
								</th>
								<th>
									 Teacher Name
								</th>
								<th>
									 Course
								</th>
								<th>
									 See Report
								</th>
								<th>
									 Delete Report
								</th>
								<th>
									 Edit Report
								</th>
								<th>
									 Status
								</th>
								<?php 
// sending query
$tt = $_SESSION['is']['teacher_id'];
$sql = "SELECT * FROM `reports` WHERE status = 1 ORDER BY date DESC";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){				
			$Report_ID = $row['report_id'];
			$Course_ID = $row['course_id'];
			$Teacher_ID = $row['teacher_id'];
			$Dept_ID = $row['dept_id'];
			$date = $row['date'];
			$noorani_qaida = $row['noorani_qaida'];
			$noorani_qaida_number = $row['noorani_qaida_number'];
			$noorani_qaida_des = $row['noorani_qaida_des'];
			$noorani_qaida_next = $row['noorani_qaida_next'];
			$quran_reading = $row['quran_reading'];
			$quran_reading_number = $row['quran_reading_number'];
			$quran_reading_des = $row['quran_reading_des'];
			$quran_reading_next = $row['quran_reading_next'];
			$tajweed_rules = $row['tajweed_rules'];
			$tajweed_rules_number = $row['tajweed_rules_number'];
			$tajweed_rules_des = $row['tajweed_rules_des'];
			$tajweed_rules_next = $row['tajweed_rules_next'];
			$memorization = $row['memorization'];
			$memorization_number = $row['memorization_number'];
			$memorization_des = $row['memorization_des'];
			$memorization_next = $row['memorization_next'];
			$revision = $row['revision'];
			$revision_number = $row['revision_number'];
			$revision_des = $row['revision_des'];
			$revision_next = $row['revision_next'];
			$ijaazah = $row['ijaazah'];
			$ijaazah_number = $row['ijaazah_number'];
			$ijaazah_des = $row['ijaazah_des'];
			$ijaazah_next = $row['ijaazah_next'];
			$studies = $row['studies'];
			$studies_number = $row['studies_number'];
			$studies_des = $row['studies_des'];
			$studies_next = $row['studies_next'];
			$supplication = $row['supplication'];
			$supplication_number = $row['supplication_number'];
			$supplication_des = $row['supplication_des'];
			$supplication_next = $row['supplication_next'];
			$arabic = $row['arabic'];
			$arabic_number = $row['arabic_number'];
			$arabic_des = $row['arabic_des'];
			$arabic_next = $row['arabic_next'];
			$status = $row['status'];
?>
							</tr>
								</thead>
								<tbody>
								<tr>
								<td>
									 <?php echo date("dS F, Y", strtotime($date)); ?>
								</td>
								<td>
									 <?php echo StudentName("$Course_ID"); ?>
								</td>
								<td>
									 <?php echo TeacherName("$Teacher_ID"); ?>
								</td>
								<td>
									 <?php echo DeptName("$Dept_ID"); ?>
								</td>
								<td>
									 <a href="report-details?ID=<?php echo $Report_ID; ?>"><button type="button" class="mb-2 mr-2 btn btn-outline-success">See Report</button></a>
								</td>
								<td>
									 <a href="delete-report?ID=<?php echo $Report_ID; ?>"><button type="button" class="mb-2 mr-2 btn btn-outline-danger">Delete Report</button></a>
								</td>
								<td>
									 <a href="edit-report?ID=<?php echo $Report_ID; ?>&link=<?php echo $link; ?>"><button type="button" class="mb-2 mr-2 btn btn-outline-warning">Edit Report</button></a>
								</td>
								<td>
									 <?php if ($status == 1) { echo '<a href="approve-report?ID='.$Report_ID.'"><button class="mb-2 mr-2 btn btn-outline-danger">Approve Report</button></a>'; } 
									 else { echo '<button class="mb-2 mr-2 btn btn-outline-success">Approved</button>'; } ?>
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
<div class="modal fade bd-example-modal-lg" id="allocation-c" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<script>
$('.allocation').click(function(){
    var famID=$(this).attr('data-id');

    $.ajax({url:"allocate-test.php?famID="+famID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>