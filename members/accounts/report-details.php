<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  include("monitoring-functions.php");
   $tt = $_SESSION['is']['parent_id'];
   $link = $_SERVER['REQUEST_URI'];
   $ccc =$_REQUEST['ID'];
// sending query
$tt = $_SESSION['is']['teacher_id'];
$sql = "SELECT * FROM `reports` WHERE report_id = '$ccc' ORDER BY date DESC";
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
	}
	}
   ?>
<?php
$page_title = 'Report Details';
$page_subtitle = 'Report Details';
$table_name = 'Report Details';
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
								<th width="200">
									 Teacher Name
								</th>
								<th>
									 <?php echo TeacherName("$Teacher_ID"); ?>
								</th>
								</tr>
								<tr>
								<th>
									 Student Name
								</th>
								<th>
									 <?php echo StudentName("$Course_ID"); ?>
								</th>
								</tr>
								<tr>
								<th>
									 Course
								</th>
								<th>
									 <?php echo DeptName("$Dept_ID"); ?>
								</th>
								</tr>
								<tr>
								<th>
									 Date
								</th>
								<th>
									 <?php echo date("dS F, Y", strtotime($date)); ?>
								</th>
								</tr>
								</thead>
								</table>
							<table class="table table-hover">
								<thead>
								<tr>
								    <th>
									 Degree
								</th>
								<?php if ($noorani_qaida == 1) { echo '<th>
									 Noorani Qaida
								</th>'; } ?>
								<?php if ($quran_reading == 1) { echo '<th>
									 Quran Reading
								</th>'; } ?>
								<?php if ($tajweed_rules == 1) { echo '<th>
									 Tajweed Rules
								</th>'; } ?>
								<?php if ($memorization == 1) { echo '<th>
									 Memorization
								</th>'; } ?>
								<?php if ($revision == 1) { echo '<th>
								    Revision
								</th>'; } ?>
								<?php if ($ijaazah == 1) { echo '<th>
								    Ijazah
								</th>'; } ?>
								<?php if ($studies == 1) { echo '<th>
								    Islamic Studies
								</th>'; } ?>
								<?php if ($supplication == 1) { echo '<th>
								    Supplication
								</th>'; } ?>
								<?php if ($arabic == 1) { echo '<th>
								    Arabic
								</th>'; } ?>
							</tr>
								</thead>
								<tbody>
								<tr class="danger">
								<td>
									 <b>RATING</b>
								</td>
								<?php if ($noorani_qaida == 1) { echo '<td>
									 '.$noorani_qaida_number.' / 10 '.(($noorani_qaida_number < '6')?'Good':"").' '.(($noorani_qaida_number > '5' && $noorani_qaida_number < '9')?'Very Good':"").' '.(($noorani_qaida_number > '8')?'Excellent':"").'
								</td>'; } ?>
								<?php if ($quran_reading == 1) { echo '<td>
									 '.$quran_reading_number.' / 10 '.(($quran_reading_number < '6')?'Good':"").' '.(($quran_reading_number > '5' && $quran_reading_number < '9')?'Very Good':"").' '.(($quran_reading_number > '8')?'Excellent':"").'
								</td>'; } ?>
								<?php if ($tajweed_rules == 1) { echo '<td>
									 '.$tajweed_rules_number.' / 10 '.(($tajweed_rules_number < '6')?'Good':"").' '.(($tajweed_rules_number > '5' && $tajweed_rules_number < '9')?'Very Good':"").' '.(($tajweed_rules_number > '8')?'Excellent':"").'
								</td>'; } ?>
								<?php if ($memorization == 1) { echo '<td>
									 '.$memorization_number.' / 10 '.(($memorization_number < '6')?'Good':"").' '.(($memorization_number > '5' && $memorization_number < '9')?'Very Good':"").' '.(($memorization_number > '8')?'Excellent':"").'
								</td>'; } ?>
								<?php if ($revision == 1) { echo '<td>
									 '.$revision_number.' / 10 '.(($revision_number < '6')?'Good':"").' '.(($revision_number > '5' && $revision_number < '9')?'Very Good':"").' '.(($revision_number > '8')?'Excellent':"").'
								</td>'; } ?>
								<?php if ($ijaazah == 1) { echo '<td>
									 '.$ijaazah_number.' / 10 '.(($ijaazah_number < '6')?'Good':"").' '.(($ijaazah_number > '5' && $ijaazah_number < '9')?'Very Good':"").' '.(($ijaazah_number > '8')?'Excellent':"").'
								</td>'; } ?>
								<?php if ($studies == 1) { echo '<td>
									 '.$studies_number.' / 10 '.(($studies_number < '6')?'Good':"").' '.(($studies_number > '5' && $studies_number < '9')?'Very Good':"").' '.(($studies_number > '8')?'Excellent':"").'
								</td>'; } ?>
								<?php if ($supplication == 1) { echo '<td>
									 '.$supplication_number.' / 10 '.(($supplication_number < '6')?'Good':"").' '.(($supplication_number > '5' && $supplication_number < '9')?'Very Good':"").' '.(($supplication_number > '8')?'Excellent':"").'
								</td>'; } ?>
								<?php if ($arabic == 1) { echo '<td>
									 '.$arabic_number.' / 10 '.(($arabic_number < '6')?'Good':"").' '.(($arabic_number > '5' && $arabic_number < '9')?'Very Good':"").' '.(($arabic_number > '8')?'Excellent':"").'
								</td>'; } ?>
							</tr>
							<tr class="success">
								<td>
									 <b>NOTES</b>
								</td>
								<?php if ($noorani_qaida == 1) { echo '<td>
									 '.$noorani_qaida_des.'
								</td>'; } ?>
								<?php if ($quran_reading == 1) { echo '<td>
									 '.$quran_reading_des.'
								</td>'; } ?>
								<?php if ($tajweed_rules == 1) { echo '<td>
									 '.$tajweed_rules_des.'
								</td>'; } ?>
								<?php if ($memorization == 1) { echo '<td>
									 '.$memorization_des.'
								</td>'; } ?>
								<?php if ($revision == 1) { echo '<td>
									 '.$revision_des.'
								</td>'; } ?>
								<?php if ($ijaazah == 1) { echo '<td>
									 '.$ijaazah_des.'
								</td>'; } ?>
								<?php if ($studies == 1) { echo '<td>
									 '.$studies_des.'
								</td>'; } ?>
								<?php if ($supplication == 1) { echo '<td>
									 '.$supplication_des.'
								</td>'; } ?>
								<?php if ($arabic == 1) { echo '<td>
									 '.$arabic_des.'
								</td>'; } ?>
							</tr>
							<tr class="info">
								<td>
									 <b>NEXT COURSE</b>
								</td>
								<?php if ($noorani_qaida == 1) { echo '<td>
									 '.$noorani_qaida_next.'
								</td>'; } ?>
								<?php if ($quran_reading == 1) { echo '<td>
									 '.$quran_reading_next.'
								</td>'; } ?>
								<?php if ($tajweed_rules == 1) { echo '<td>
									 '.$tajweed_rules_next.'
								</td>'; } ?>
								<?php if ($memorization == 1) { echo '<td>
									 '.$memorization_next.'
								</td>'; } ?>
								<?php if ($revision == 1) { echo '<td>
									 '.$revision_next.'
								</td>'; } ?>
								<?php if ($ijaazah == 1) { echo '<td>
									 '.$ijaazah_next.'
								</td>'; } ?>
								<?php if ($studies == 1) { echo '<td>
									 '.$studies_next.'
								</td>'; } ?>
								<?php if ($supplication == 1) { echo '<td>
									 '.$supplication_next.'
								</td>'; } ?>
								<?php if ($arabic == 1) { echo '<td>
									 '.$arabic_next.'
								</td>'; } ?>
							</tr>
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