<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  include("monitoring-functions.php");
   $link = $_SERVER['REQUEST_URI'];
   $ccc =$_REQUEST['ID'];
// sending query
$tt = $_SESSION['is']['teacher_id'];
$sql = "SELECT * FROM `reports` WHERE report_id = '$ccc' ORDER BY date DESC";
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
	}
	}
   ?>
<?php
$page_title = 'Student Report';
$page_subtitle = 'Student Report Details';
$table_name = 'Student Report';
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
                                        <form target="_blank" action="../pdf/generate_pdf.php" method="post">
                                        <table class="mb-0 table">
								<thead>
								<tr>
								<th width="200">
									 Teacher Name
								</th>
								<th>
									 <?php echo TeacherName("$Teacher_ID"); ?> <input type="hidden" name="Tname" value="<?php echo TeacherName("$Teacher_ID"); ?>" />
								</th>
								</tr>
								<tr>
								<th>
									 Student Name
								</th>
								<th>
									 <?php echo StudentName("$Course_ID"); ?> <input type="hidden" name="Sname" value="<?php echo StudentName("$Course_ID"); ?>" />
								</th>
								</tr>
								<tr>
								<th>
									 Course
								</th>
								<th>
									 <?php echo DeptName("$Dept_ID"); ?> <input type="hidden" name="Course" value="<?php echo DeptName("$Dept_ID"); ?>" />
								</th>
								</tr>
								<tr>
								<th>
									 Date
								</th>
								<th>
									 <?php echo date("jS F, Y", strtotime($date)); ?> <input type="hidden" name="Date" value="<?php echo date("dS F, Y", strtotime($date)); ?>" />
								</th>
								</tr>
								</thead>
								</table>
							<table class="table table-hover" id="sampleTbl">
								<thead>
								<tr>
								    <th>
									 Degree
								</th>
								<?php if ($noorani_qaida == 1) { echo '<th>
									 Noorani Qaida <input type="hidden" name="heading[]" value="Noorani Qaida" />
								</th>'; } ?>
								<?php if ($quran_reading == 1) { echo '<th>
									 Quran Reading <input type="hidden" name="heading[]" value="Quran Reading" />
								</th>'; } ?>
								<?php if ($tajweed_rules == 1) { echo '<th>
									 Tajweed Rules <input type="hidden" name="heading[]" value="Tajweed Rules" />
								</th>'; } ?>
								<?php if ($memorization == 1) { echo '<th>
									 Memorization <input type="hidden" name="heading[]" value="Memorization" />
								</th>'; } ?>
								<?php if ($revision == 1) { echo '<th>
								    Revision <input type="hidden" name="heading[]" value="Revision" />
								</th>'; } ?>
								<?php if ($ijaazah == 1) { echo '<th>
								    Ijazah <input type="hidden" name="heading[]" value="Ijazah" />
								</th>'; } ?>
								<?php if ($studies == 1) { echo '<th>
								    Islamic Studies <input type="hidden" name="heading[]" value="Islamic Studies" />
								</th>'; } ?>
								<?php if ($supplication == 1) { echo '<th>
								    Supplication <input type="hidden" name="heading[]" value="Supplication" />
								</th>'; } ?>
								<?php if ($arabic == 1) { echo '<th>
								    Arabic <input type="hidden" name="heading[]" value="Arabic" />
								</th>'; } ?>
							</tr>
								</thead>
								<tbody>
								<tr class="bg-danger">
								<td>
									 <b>RATING</b>
								</td>
								<?php if ($noorani_qaida == 1) { echo '<td>
									 '.$noorani_qaida_number.' / 10 '.(($noorani_qaida_number < '6')?'Good':"").' '.(($noorani_qaida_number > '5' && $noorani_qaida_number < '9')?'Very Good':"").' '.(($noorani_qaida_number > '8')?'Excellent':"").'
								<input type="hidden" name="rating[]" value="'.$noorani_qaida_number.' / 10 '.(($noorani_qaida_number < '6')?'Good':"").' '.(($noorani_qaida_number > '5' && $noorani_qaida_number < '9')?'Very Good':"").' '.(($noorani_qaida_number > '8')?'Excellent':"").'" /></td>'; } ?>
								<?php if ($quran_reading == 1) { echo '<td>
									 '.$quran_reading_number.' / 10 '.(($quran_reading_number < '6')?'Good':"").' '.(($quran_reading_number > '5' && $quran_reading_number < '9')?'Very Good':"").' '.(($quran_reading_number > '8')?'Excellent':"").'
								<input type="hidden" name="rating[]" value="'.$quran_reading_number.' / 10 '.(($quran_reading_number < '6')?'Good':"").' '.(($quran_reading_number > '5' && $quran_reading_number < '9')?'Very Good':"").' '.(($quran_reading_number > '8')?'Excellent':"").'" /></td>'; } ?>
								<?php if ($tajweed_rules == 1) { echo '<td>
									 '.$tajweed_rules_number.' / 10 '.(($tajweed_rules_number < '6')?'Good':"").' '.(($tajweed_rules_number > '5' && $tajweed_rules_number < '9')?'Very Good':"").' '.(($tajweed_rules_number > '8')?'Excellent':"").'
								<input type="hidden" name="rating[]" value="'.$tajweed_rules_number.' / 10'.(($tajweed_rules_number < '6')?'Good':"").' '.(($tajweed_rules_number > '5' && $tajweed_rules_number < '9')?'Very Good':"").' '.(($tajweed_rules_number > '8')?'Excellent':"").'" /></td>'; } ?>
								<?php if ($memorization == 1) { echo '<td>
									 '.$memorization_number.' / 10 '.(($memorization_number < '6')?'Good':"").' '.(($memorization_number > '5' && $memorization_number < '9')?'Very Good':"").' '.(($memorization_number > '8')?'Excellent':"").'
								<input type="hidden" name="rating[]" value="'.$memorization_number.' / 10'.(($memorization_number < '6')?'Good':"").' '.(($memorization_number > '5' && $memorization_number < '9')?'Very Good':"").' '.(($memorization_number > '8')?'Excellent':"").'" /></td>'; } ?>
								<?php if ($revision == 1) { echo '<td>
									 '.$revision_number.' / 10 '.(($revision_number < '6')?'Good':"").' '.(($revision_number > '5' && $revision_number < '9')?'Very Good':"").' '.(($revision_number > '8')?'Excellent':"").'
								<input type="hidden" name="rating[]" value="'.$revision_number.' / 10'.(($revision_number < '6')?'Good':"").' '.(($revision_number > '5' && $revision_number < '9')?'Very Good':"").' '.(($revision_number > '8')?'Excellent':"").'" /></td>'; } ?>
								<?php if ($ijaazah == 1) { echo '<td>
									 '.$ijaazah_number.' / 10 '.(($ijaazah_number < '6')?'Good':"").' '.(($ijaazah_number > '5' && $ijaazah_number < '9')?'Very Good':"").' '.(($ijaazah_number > '8')?'Excellent':"").'
								<input type="hidden" name="rating[]" value="'.$ijaazah_number.' / 10'.(($ijaazah_number < '6')?'Good':"").' '.(($ijaazah_number > '5' && $ijaazah_number < '9')?'Very Good':"").' '.(($ijaazah_number > '8')?'Excellent':"").'" /></td>'; } ?>
								<?php if ($studies == 1) { echo '<td>
									 '.$studies_number.' / 10 '.(($studies_number < '6')?'Good':"").' '.(($studies_number > '5' && $studies_number < '9')?'Very Good':"").' '.(($studies_number > '8')?'Excellent':"").'
								<input type="hidden" name="rating[]" value="'.$studies_number.' / 10'.(($studies_number < '6')?'Good':"").' '.(($studies_number > '5' && $studies_number < '9')?'Very Good':"").' '.(($studies_number > '8')?'Excellent':"").'" /></td>'; } ?>
								<?php if ($supplication == 1) { echo '<td>
									 '.$supplication_number.' / 10 '.(($supplication_number < '6')?'Good':"").' '.(($supplication_number > '5' && $supplication_number < '9')?'Very Good':"").' '.(($supplication_number > '8')?'Excellent':"").'
								<input type="hidden" name="rating[]" value="'.$supplication_number.' / 10'.(($supplication_number < '6')?'Good':"").' '.(($supplication_number > '5' && $supplication_number < '9')?'Very Good':"").' '.(($supplication_number > '8')?'Excellent':"").'" /></td>'; } ?>
								<?php if ($arabic == 1) { echo '<td>
									 '.$arabic_number.' / 10 '.(($arabic_number < '6')?'Good':"").' '.(($arabic_number > '5' && $arabic_number < '9')?'Very Good':"").' '.(($arabic_number > '8')?'Excellent':"").'
								<input type="hidden" name="rating[]" value="'.$arabic_number.' / 10'.(($arabic_number < '6')?'Good':"").' '.(($arabic_number > '5' && $arabic_number < '9')?'Very Good':"").' '.(($arabic_number > '8')?'Excellent':"").'" /></td>'; } ?>
							</tr>
							<tr class="bg-success">
								<td>
									 <b>NOTES</b>
								</td>
								<?php if ($noorani_qaida == 1) { echo '<td>
									 '.$noorani_qaida_des.' <input type="hidden" name="notes[]" value="'.$noorani_qaida_des.'" />
								</td>'; } ?>
								<?php if ($quran_reading == 1) { echo '<td>
									 '.$quran_reading_des.' <input type="hidden" name="notes[]" value="'.$quran_reading_des.'" />
								</td>'; } ?>
								<?php if ($tajweed_rules == 1) { echo '<td>
									 '.$tajweed_rules_des.' <input type="hidden" name="notes[]" value="'.$tajweed_rules_des.'" />
								</td>'; } ?>
								<?php if ($memorization == 1) { echo '<td>
									 '.$memorization_des.' <input type="hidden" name="notes[]" value="'.$memorization_des.'" />
								</td>'; } ?>
								<?php if ($revision == 1) { echo '<td>
									 '.$revision_des.' <input type="hidden" name="notes[]" value="'.$revision_des.'" />
								</td>'; } ?>
								<?php if ($ijaazah == 1) { echo '<td>
									 '.$ijaazah_des.' <input type="hidden" name="notes[]" value="'.$ijaazah_des.'" />
								</td>'; } ?>
								<?php if ($studies == 1) { echo '<td>
									 '.$studies_des.' <input type="hidden" name="notes[]" value="'.$studies_des.'" />
								</td>'; } ?>
								<?php if ($supplication == 1) { echo '<td>
									 '.$supplication_des.' <input type="hidden" name="notes[]" value="'.$supplication_des.'" />
								</td>'; } ?>
								<?php if ($arabic == 1) { echo '<td>
									 '.$arabic_des.' <input type="hidden" name="notes[]" value="'.$arabic_des.'" />
								</td>'; } ?>
							</tr>
							<tr class="bg-info">
								<td>
									 <b>NEXT COURSE</b>
								</td>
								<?php if ($noorani_qaida == 1) { echo '<td>
									 '.$noorani_qaida_next.' <input type="hidden" name="next[]" value="'.$noorani_qaida_next.'" />
								</td>'; } ?>
								<?php if ($quran_reading == 1) { echo '<td>
									 '.$quran_reading_next.' <input type="hidden" name="next[]" value="'.$quran_reading_next.'" />
								</td>'; } ?>
								<?php if ($tajweed_rules == 1) { echo '<td>
									 '.$tajweed_rules_next.' <input type="hidden" name="next[]" value="'.$tajweed_rules_next.'" />
								</td>'; } ?>
								<?php if ($memorization == 1) { echo '<td>
									 '.$memorization_next.' <input type="hidden" name="next[]" value="'.$memorization_next.'" />
								</td>'; } ?>
								<?php if ($revision == 1) { echo '<td>
									 '.$revision_next.' <input type="hidden" name="next[]" value="'.$revision_next.'" />
								</td>'; } ?>
								<?php if ($ijaazah == 1) { echo '<td>
									 '.$ijaazah_next.' <input type="hidden" name="next[]" value="'.$ijaazah_next.'" />
								</td>'; } ?>
								<?php if ($studies == 1) { echo '<td>
									 '.$studies_next.' <input type="hidden" name="next[]" value="'.$studies_next.'" />
								</td>'; } ?>
								<?php if ($supplication == 1) { echo '<td>
									 '.$supplication_next.' <input type="hidden" name="next[]" value="'.$supplication_next.'" />
								</td>'; } ?>
								<?php if ($arabic == 1) { echo '<td>
									 '.$arabic_next.' <input type="hidden" name="next[]" value="'.$arabic_next.'" />
								</td>'; } ?>
							</tr>
								</tbody>
								</table>
								<button type="submit" class="mb-2 mr-2 btn btn-shadow btn-success btn-sm">Print Report</button>
								</from>
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
    $('#sampleTbl tr').each(function(row, tr){
    TableData = TableData 
        + $(tr).find('td:eq(0)').text() + ' '  // Task No.
        + $(tr).find('td:eq(1)').text() + ' '  // Date
        + $(tr).find('td:eq(2)').text() + ' '  // Description
        + $(tr).find('td:eq(3)').text() + ' '  // Task
        + '\n';
});
var TableData = new Array();
    
$('#sampleTbl tr').each(function(row, tr){
    TableData[row]={
        "taskNo" : $(tr).find('td:eq(0)').text()
        , "date" :$(tr).find('td:eq(1)').text()
        , "description" : $(tr).find('td:eq(2)').text()
        , "task" : $(tr).find('td:eq(3)').text()
    }
});
var TableData;
TableData = storeTblValues()
TableData = $.toJSON(TableData);

function storeTblValues()
{
    var TableData = new Array();

    $('#sampleTbl tr').each(function(row, tr){
        TableData[row]={
            "taskNo" : $(tr).find('td:eq(0)').text()
            , "date" :$(tr).find('td:eq(1)').text()
            , "description" : $(tr).find('td:eq(2)').text()
            , "task" : $(tr).find('td:eq(3)').text()
        }    
    }); 
    TableData.shift();  // first row will be empty - so remove
    return TableData;
}
var TableData;
TableData = $.toJSON(storeTblValues());
                
 $.ajax({
    type: "POST",
    url: "1.php",
    data: "pTableData=" + TableData,
    success: function(msg){
        // return value stored in msg variable
    }
});
</script>
<script>
$('.allocation').click(function(){
    var famID=$(this).attr('data-id');

    $.ajax({url:"allocate-test.php?famID="+famID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>