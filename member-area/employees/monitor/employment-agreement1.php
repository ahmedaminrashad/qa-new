<?php
  require ("../includes/dbconnection.php");
    $tname =$_REQUEST['tech_name'];
    $doj =$_REQUEST['tech_doj'];
    $cnic =$_REQUEST['tech_cnic'];
    $fname =$_REQUEST['tech_father'];
    $tg =$_REQUEST['tech_gender'];
    $date = date('F j, Y',strtotime($doj));
?>
<!DOCTYPE html>
<!-- 
Author: Muhammad Farooq
Website: www.tarteeltechnologies.com/
Contact: info@tarteeltechnologies.com
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>TarteeleQuran | Online Learning Portal</title>
<meta https-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta https-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<style type="text/css" media="print">
  @page  
{ 
    size: auto;   /* auto is the initial value */ 

    /* this affects the margin in the printer settings */ 
    margin: 20mm 15mm 35mm 15mm;  
} 

body  
{ 
    /* this affects the margin on the content before sending to printer */ 
    margin: 0px;  
} 
p::first-line { 
text-indent: 30px;
text-align: justify;
text-justify: inter-word;
 } 
.indent { text-indent: 30px; }
ol li { padding: 5px 0px; }
ol.split { list-style-type: none; }
    ol.split li:before
    {
      counter-increment: mycounter;
      content: counter(mycounter) ".\00A0\00A0";
    }
    ol.split li
    {
      text-indent: -1.3em;
    }
    ol.start { counter-reset: mycounter; }
    .auto-style1 {
	text-align: center;
}
div {
    text-align:justify;  
    text-justify:inter-word;
}
</style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body onload=window.print();>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light">
					<p class="auto-style1"><img src="../assets/logo1.jpg" alt="logo" class="logo-default" height="99" width="97"></p>
						<div class="portlet-body">
							<p><h1 class="auto-style1">EMPLOYMENT AGREEMENT</h1>
							<h3 class="auto-style1">TARTEEL TECHNOLOGIES (SMC-PVT) LTD</h3></p><br>
							<p>This AGREEMENT, entered into this <?php echo $date; ?>, between TARTEEL TECHNOLOGIES (SMC-PVT) LTD and <?php echo $tname; ?> <?php if ($tg == Male) {echo 'S/O';} else {echo 'D/O';} ?> <?php echo $fname; ?>, holding CNIC No: <?php echo $cnic; ?>,</p>
							<h3 class="indent">WITNESSETH THAT:</h3>
							<p class="indent">WHEREAS, the parties hereto desire to enter into this Agreement to define and set forth the terms and conditions of the employment of the Employee by the Company;</p>
							<p class="indent">NOW, THEREFORE, in consideration of the mutual covenants and agreements set forth below, it is hereby covenanted and agreed by the Company and the Employee as follows:</p>
							<h3 class="indent">I. Position; Employment Period  </h3>
							<ol class="split start">
								<li>The Company hereby employs the Employee as Senior Teacher (Full Time), and the Employee hereby agrees to serve in such capacity from 
<?php echo $date; ?>.
</li>
<li>Your employment with the Company will be confirmed on successful assessment of your performance on completion of 3 months’ probation. </li>
<li>Your employment is subject to the terms and conditions contained herein, in addition to office rules and regulations, as may be applicable from time to time and the provisions of law, for the time being in force, governing and regulating conduct of Chartered Accountants including management consultancy practices in Pakistan.</li>
<li>Should you wish to resign or leave employment of the Company, you will be required to give at least one month notice in writing to the Company conveying your intention to do so or in alternative forego of one month salary in lieu of such notice.  The Company may likewise terminate your service subject to one month notice or one month’s salary in lieu of such notice save in cases of professional or other misconduct, loss to the business in any case where the Company shall be under no obligation to give any notice, or notice pay in lieu thereof.</li>
<li>In case of resign or leaving employment of the Company, in any case, you will have to properly shift all of your classes to the new teacher.</li>
							</ol>
							<h3 class="indent">II. Salary, Increments, Leaves</h3>
							<ol class="split">
							<li>You are working as full time employee; this is meant that you will be available for 9 hours six days a week.</li>
							<li>Your salary will be PKR 15000/= per month. The Company will decide the increase in the salary, if any, relaying on the schedule, performance and task assign by the company.</li>
							<li>There will be no paid leave except you take classes in advance.</li>
							</ol>
							<h3 class="indent">III. Performance of Duties, Obligations</h3>	
							<ol class="split">
							<li>During the course of your employment with the Company you must follow the office procedures including, but not limited to, dress code, office timings, and attendance, make up classes and classes other teachers if you are free at that time.</li>
							<li>The teacher is responsible for the monthly test of his students and must coordinate with the supervisor timely.</li>
							<li>The employee will be responsible for his own taxes, as the company won’t hold any taxes.</li>
							<li>While staying at the office you cannot bring in any guests in the office and no one can stay with you. If there is a complaint about you, this could lead to termination.</li>
							<li>If there is any damage due to your negligence in the office then you will have to pay for it.</li>
							<li>Any negligence in performing duties will lead to the termination from the employment of the Company.</li>
							</ol>	
							<h3 class="indent">IV. Competing Businesses</h3>	
							<ol class="split">
							<li>During the period of his employment under this Agreement, the Employee shall not be employed by or otherwise engage in or be interested in any business in competition with the Company, or with any of its subsidiaries or affiliates, except that the Employee's investment in any such business shall not be considered a violation.</li>
							</ol>
							<h3 class="indent">V. Confidentiality</h3>
							<ol class="split">
							<li>During and after the Employment Period, the Employee will not divulge the names, affairs, business practices or secrets of the Company or any of its local or overseas associated organizations, or any of its partners, or any of its directors or directors of associated organization, or any of its clients or organization which a likely to be its clients.  Further, you will not disclose without lawful written authority, any information on any aspects of professional practice, expertise or know-how that may become known to you during the course of your employment with the Company. If that is found to be the case then the employee could be immediately terminated. In case of any violations the Company would be entitled to take legal actions.</li>
							<li>The Employee cannot discuss any payment or schedule issues with the students.  For all such things they will have to send us an email.</li>
							<li>You cannot work outside of the Company or your own same or similar work or business as it leads to conflict of interest and that will lead to the low quality work at the Company. If there is an exam you have to let us know 2 weeks in advance so that you can make up the off days classes.  You cannot take any time off due to a course or a class or anything like that.</li>
							<li>The employee cannot associate in any way with clients or customers of the company, directly or indirectly after leaving the company for any reason for a period of 3 years. You will be honest in handling the students of the Company otherwise you can be sued in court of law.</li>
							<li>Any of the employees of the company is not allowed to take any kind of information that is Full Name, Skype Information, Phone Numbers, Email Addresses, Credit Card Details, Fee Information or any other Personal Bio Data of the customer/client/referrals of the company. If you find any data by any means, you are also not allowed to use/misuse the aforementioned details of the customer/client/referrals of the company.</li>
							</ol>	
							<h3 class="indent">VI. Company Resources, Assets</h3>
							<ol class="split">
							<li>Company recourses will only be used for or in the company interest. The Employee has no permission to use the Company resource for their personal interest.</li>
							</ol>
							<h3 class="indent">VII. Remedies</h3>
							<ol class="split">
							<li>If at any time the Employee violates to a material extent any of the covenants or agreements set forth in paragraphs IV, the Company shall have the right to terminate all of its obligations to make further payments under this Agreement. The Employee acknowledges that the Company would be irreparably injured by a violation of paragraph VI and agrees that the Company shall be entitled to an injunction restraining the Employee from any actual or threatened breach of paragraph VI or to any other appropriate equitable remedy without any bond or other security being required.</li>
							</ol>
							<h3 class="indent">VIII. Amendment and Termination</h3>
							<ol class="split">
							<li>This Agreement may be amended or cancelled by mutual agreement of the parties without the consent of any other person and, so long as the Employee lives, no person, other than the parties hereto, shall have any rights under or interest in this Agreement.</li>
							</ol>
							<h3 class="indent">IX. Notices</h3>
							<ol class="split">
							<li>Any notice required or permitted to be given under this Agreement shall be sufficient if in writing and if sent by registered mail to the Company at its principal executive offices or to the Employee at the last address filed by him in writing with the Company, as the case may be.</li>
							</ol>
							<h3 class="indent">X. Non-Assignment</h3>
							<ol class="split">
							<li>The interests of the Employee under this Agreement are not subject to the claims of his creditors and may not be voluntarily or involuntarily assigned, alienated or encumbered.</li>
							</ol>
							<h3 class="indent">XI. Successors</h3>
							<ol class="split">
							<li>This Agreement shall be binding upon, and inure to the benefit of, the Company and its successors and assigns and upon any person acquiring, whether by merger, consolidation, purchase of assets or otherwise, all or substantially all of the Company's assets and business.</li>
							</ol>
							<p>Any of the terms and conditions contained herein may be modified by mutual consent, which shall be constructed to be an integral part of this Agreement.</p>
							<p>If the above terms and conditions are acceptable to you, please sign the duplicate copy of this letter and return to the undersigned.</p>
							<p>Your agreement with the Company is not less than 1 year of service and it will be renewed every year.</p>
							<p>IN WITNESS WHEREOF, the Employee has hereunto set his hand, and the Company has caused these presents to be executed in its name and on its behalf, all as of the day and year first above written.</p>
								<hr>
								<p>The above terms and conditions are acceptable to me.</p>
							<table style="width: 100%">
								<tr>
									<td>Employee's Name:</td>
									<td>______________________________________</td>
									<td>Employee's Signature:</td>
									<td>______________________________________</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>Sign Date</td>
									<td>______________________________________</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
							</table>
									
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
</body>
</html>
<script>
       var totals=[0,0,0];
        $(document).ready(function(){

            var $dataRows=$("#sum_table tr:not('.totalColumn, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSd').each(function(i){        
                    totals[i]+=parseInt( $(this).html());
                });
            });
            $("#sum_table td.totalCol").each(function(i){  
                $(this).html(+totals[i]);
            });

        });
</script>