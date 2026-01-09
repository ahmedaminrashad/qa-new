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
    margin: 60mm 20mm 25mm 20mm;  
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
p.big {
    line-height: 180%;
}
div {
    text-align:justify;  
    text-justify:inter-word;
}
    .auto-style1 {
	text-align: center;
}
p {
    font-size: 20px;
}
.auto-style2 {
	font-size: 20px;
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
						<div class="portlet-body">
							<p><h1 class="auto-style1">WITNESS LETTER</h1>
							<h3 class="auto-style1">TARTEEL TECHNOLOGIES (SMC-PVT) LTD</h3></p><br>
							<p class="big">I, ___________________________________ certify that I know <?php echo $tname; ?> <?php if ($tg == Male) {echo 'S/O';} else {echo 'D/O';} ?> <?php echo $fname; ?>, holding CNIC No: <?php echo $cnic; ?>, since __________ years and assure you that he has a good character and an honest person in my best knowledge. He will be beneficial for your Company. If he causes any damage/loss, I shall be held responsible.</p>
							<br>
							<table style="width: 100%">
								<tr>
									<td class="auto-style2">Relationship:</td>
									<td>______________________________________</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td class="auto-style2">CNIC:</td>
									<td>______________________________________</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td class="auto-style2">Complete Address:</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td colspan="7">__________________________________________________________________________________________________________________</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td colspan="7">__________________________________________________________________________________________________________________</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td colspan="7">__________________________________________________________________________________________________________________</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td class="auto-style2">Cell Phone No.</td>
									<td>______________________________________</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td class="auto-style2">Alternative Contact No.</td>
									<td>______________________________________</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td class="auto-style2">Signature of Witness:</td>
									<td>______________________________________</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
							</table>
							<hr>
							<p class="auto-style1">FOR OFFICE USE ONLY</p>
									
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