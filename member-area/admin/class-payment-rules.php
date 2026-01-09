<?php session_start(); ?>
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
  <?php
  include("../includes/session1.php");
  include("header.php");
  $tech_id =$_REQUEST['ptec'];
  $name_id =$_REQUEST['name'];
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $search_bar; ?>
<?php echo $main_menu; ?>
<style type="text/css">
.auto-style1 {
	text-align: center;
}
.auto-style2 {
	text-align: right;
    vertical-align: middle;
    padding: 5px;
    position: relative;
}
</style>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Class<small> Payment Rules</small></h1>
			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">
			</div>
			<!-- END PAGE TOOLBAR -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">

			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li>
					 Class Payment Rules
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-body">
							<h2><strong>CLASS PAYMENT SYSTEM</strong></h2>
							<p style="margin-left:25px">Below are the rules and regulations to how to deal with the classes at QuranSheikh.</p>
							<p style="margin-left:25px"><b>1.</b> Every teacher Male/Female/Local/Foreign has to activate the class sharp at the class time. E.g. If the class is scheduled at 05:00 PM, the teacher should click on <button type='button' style='width: 75px' class='btn red btn-xs'>Activate</button> Button at sharp 05:00 PM. This will mark your attendance for that class.</p>
							<p style="margin-left:25px"><b>2.</b> Once the class activated, you will see five new options as under.</p>
							<p style="margin-left:25px">a) <button type='button' style='width: 75px' class='btn green btn-xs'>Start</button> (To start a class)</p>
							 <p style="margin-left:25px">b) <button type='button' style='width: 75px' class='btn red btn-xs'>Absent</button> (Mark a class absent)</p>
							<p style="margin-left:25px">c) <button type='button' style='width: 75px' class='btn blue btn-xs'>Leave</button> (Mark a class on leave)</p>
							 <p style="margin-left:25px">d) <button type='button' class='btn btn-danger btn-xs'><i class='fa fa-frown-o'></i></button> (To declined a class)</p>
							<p style="margin-left:25px">e) <button type='button' class='btn btn-warning btn-xs'><i class='fa fa-check'></i></button> (To validate the class again)</p>
							<p style="margin-left:50px"><b>a)</b> If the student comes to take the class, just click on the <button type='button' style='width: 75px' class='btn green btn-xs'>Start</button> button and conduct the class.</p>
							<p style="margin-left:50px">If you <span class="font-green"><b>STARTED</b></span> the class and student comes online to take the class and you conducted the class successfully, you should end the class just by clicking on <button type='button' style='width: 75px' class='btn yellow btn-xs'>End</button> button. <button type='button' style='width: 75px' class='btn yellow btn-xs'>End</button> button will lead you to enter lesson history. Enter lesson history properly and submit lesson history form.</p>
							<p style="margin-left:50px">Once you submitted the lesson history form, the system will mark that class as taken. <span class="font-green"><b>The system will add this class in your WORKING HOURS as you have taken this class.</b></span></p>
							<div class="alert alert-danger" style="margin-left:25px">
								<strong>NOTE!</strong> We randomly check class duration from now. We consider class duration from your click on ACTIVATE button to your click on END button. So, class duration should not less than 25 minutes. If you find a double class of a student (means one hour class), you should START and END both of the classes on time to add one hour in your PAYMENTS HOURS.</div>
							<p style="margin-left:50px"><b>b)</b> If student is offline, kindly contact QuranSheikh Admin to call the student to check his or her status immediately. If admin gets no response from student, you should wait for at least 25 minutes. If student comes to take class any time during his class time, you should take the class and put history.  If you waited for the whole class time and the student did not come, click on <button type='button' style='width: 75px' class='btn red btn-xs'>Absent</button> button. When you click on the <button type='button' style='width: 75px' class='btn red btn-xs'>Absent</button> button, the system will mark that class as absent. <span class="font-green"><b>The system will add this class in your WORKING HOURS as you have waited for the whole class time.</b></span></p>
							<div class="alert alert-danger" style="margin-left:25px">
								<strong>NOTE!</strong> It is your duty to ADD NOTE for the student from ‘list of students’ if student is absent in two consecutive classes. Admin will call student and do suitable actions. You do not need to come for next class if and only if Admin again inform you before the class time that student will take class today. Else if system found 3 consecutive classes as absent for a student without any note, we will put a fine.
							</div>
							<p style="margin-left:50px"><b>c)</b> If student or admin inform you about the leave of the student at least 2 hours before the class time, just click on the <button type='button' style='width: 75px' class='btn blue btn-xs'>Leave</button> button. When you click on the <button type='button' style='width: 75px' class='btn blue btn-xs'>Leave</button> button, the system will mark that class as leave. <span class="font-red"><b>The system will not add this class in your WORKING HOURS as there is no need to come online for that class.</b></span></p>
							<p style="margin-left:50px"><b>d)</b> If the student comes online on call at the class time and then declined to take the class due to any reason, just click on the <button type='button' class='btn btn-danger btn-xs'><i class='fa fa-frown-o'></i></button> button. When you click on the <button type='button' class='btn btn-danger btn-xs'><i class='fa fa-frown-o'></i></button> button, the system will mark that class as declined. <span class="font-green"><b>The system will add this class in your WORKING HOURS as you came online to take the class at the scheduled time.</b></span></p>
							<p style="margin-left:50px"><b>e)</b> If you '<span class="font-red"><b>ACTIVATED</b></span>/<span class="font-green"><b>STARTED</b></span>', a class by a mistake you can validate the class again just by clicking on <button type='button' class='btn btn-warning btn-xs'><i class='fa fa-check'></i></button> button.</p>
							<p style="margin-left:25px"><b>3.</b> If the student asks for make-up class for the class with LEAVE status, you should do Re-scheduling by just dropping a message at QuranSheikh Admin that “Abdul Rahman missed a class on 15-09-2019, please Re-schedule this class on 17-09-2019 at 05:00 PM.” If you Re-scheduled a leave status class and took that class, <span class="font-green"><b>the system will add this class in your WORKING HOURS as you have taken the missed class by a proper Re-scheduling system.</b></span></p>
							<p style="margin-left:25px"><b>4.</b> A situation may come that the student did not come to take the class or declined to take the class at class time and you marked that class as <button type="button" style="width: 75px" class="btn red btn-xs disabled">Absent</button> or <button type="button" style="width: 75px" class="btn red btn-xs disabled">Declined</button>, you are not allowed to give student make-up class but if and only if Admin told you to give that student a make-up class then you should ask QuranSheikh Admin to add extra class as this is not your liability to give student a make-up class for <button type="button" style="width: 75px" class="btn red btn-xs disabled">Absent</button> or <button type="button" style="width: 75px" class="btn red btn-xs disabled">Declined</button>. Admin will add an extra class and system will pay you extra (double) one for ABSENT or DECLINED class and other for the class you have given by properly adding extra class.</p>
							<p style="margin-left:25px"><b>5.</b>You should schedule any class in ADVANCE. E.g. If there is a class of a student in future and if he requested you to take his/her class today, you should call Admin to schedule his/her class of '06-10-2019' on '05-10-2019' at 06:00 PM.</p>
							<p style="margin-left:25px"><b>6.</b> If you fails to start a class within 5 minutes from scheduled time, Admin will contact you on your phone or whatsapp, if you do not respond to calls from Admin we will mark that class on leave and we have right to put a fine of 0.5 to 1 USD.</p>
							<div id="mytable" class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>
												Class Status
											</th>
											<th>
												Your Actions
											</th>
											<th>
												Notes
											</th>
											<th>
												Hours added to salary
											</th>
										</tr>
									</thead>
									<tbody>
										<tr class="success">
											<td>
												TAKEN
											</td>
											<td>
												N/A
											</td>
											<td>
												Each TAKEN class will add 0.5 hour in your WORKING HOURS.	
											</td>
											<td>
												<strong>0.5</strong>
											</td>
										</tr>
										<tr class="danger">
											<td rowspan="2">
												ABSENT
											</td>
											<td>
												Case 01: No Action
											</td>
											<td>
												Each ABSENT class will add 0.5 hour in your WORKING HOURS.	
											</td>
											<td>
												<strong>0.5</strong>
											</td>
										</tr>
										<tr class="danger">
											<td>
												Case 02: Schedule Extra class
											</td>
											<td>
												Each ABSENT class will add 0.5 hour and if we add extra class it will give you 0.5 more so total one hour.	
											</td>
											<td>
												<strong>1</strong>
											</td>
										</tr>
										<tr class="info">
											<td rowspan="2">
												LEAVE
											</td>
											<td>
												Case 01: No Action
											</td>
											<td>
												Each LEAVE class will add nothing in your WORKING HOURS.	
											</td>
											<td>
												<strong>0</strong>
											</td>
										</tr>
										<tr class="info">
											<td>
												Case 02: Re-schedule that class
											</td>
											<td>
												But if you Re-schedule that class in some late time it will add 0.5 hour in your WORKING HOURS.	
											</td>
											<td>
												<strong>0.5</strong>
											</td>
										</tr>
										<tr class="info">
											<td rowspan="2">
												DECLINED
											</td>
											<td>
												Case 01: No Action
											</td>
											<td>
												Each DECLINED class will add 0.5 hour in your WORKING HOURS.	
											</td>
											<td>
												<strong>0.5</strong>
											</td>
										</tr>
										<tr class="info">
											<td>
												Case 02: Schedule Extra class
											</td>
											<td>
												Each DECLINED class will add 0.5 hour and if we add extra class it will give you 0.5 more so total one hour.	
											</td>
											<td>
												<strong>1</strong>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
					<div class="modal fade bs-modal-lg" id="fine-d" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
<div class="modal fade bs-modal-lg" id="leaves-d" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>
<script>
$('.fine').click(function(){
    var famID=$(this).attr('data-id');
    var famMonth=$(this).attr('data-month');
    var famYear=$(this).attr('data-year');
    var famType=$(this).attr('data-type');
    var famName=$(this).attr('data-name');

    $.ajax({url:"salary-fine-details.php?famID="+famID+"&famMonth="+famMonth+"&famYear="+famYear+"&famType="+famType+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
$('.leaves').click(function(){
    var famID=$(this).attr('data-id');
    var famMonth=$(this).attr('data-month');
    var famYear=$(this).attr('data-year');
    var famAmu=$(this).attr('data-amu');

    $.ajax({url:"salary-leaves-details.php?famID="+famID+"&famMonth="+famMonth+"&famYear="+famYear+"&famAmu="+famAmu,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>