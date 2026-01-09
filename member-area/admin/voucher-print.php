<?
require ("../includes/dbconnection.php");
$famID=$_GET['vid'];
$famName=$_GET['vname'];
$famValue=$_GET['vvalue'];
$date=$_GET['vdate'];
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
<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="../assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="../assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="../assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<style type="text/css" media="print">
  @page  
{ 
    size: auto;   /* auto is the initial value */ 

    /* this affects the margin in the printer settings */ 
    margin: 50mm 15mm 35mm 15mm;  
} 

body  
{ 
    /* this affects the margin on the content before sending to printer */ 
    margin: 0px;  
} 
.auto-style1 {
	text-align: left;
}
table#sum_table {
    counter-reset: rowNumber;
}

table#sum_table tr:nth-child(n+2) {
    counter-increment: rowNumber;
}

table#sum_table tr:nth-child(n+2) td:first-child::before {
    content: counter(rowNumber);
    min-width: 1em;
    margin-right: 0.5em;
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
						<div class="portlet-body alll">
							<p>Tateel Technologies (SMC) Pvt Ltd<br>Office No. 01, 3rd Floor, Fazal Arcade, F-11 Markaz, Islamabad<br>Phone: 051-2228066, 0336-5162638</p>
							<p>Subject: <span class="auto-style1"><strong>Salary Transfer of the Employees of TARTEEL TECHNOLOGIES (SMC-PVT) LTD</strong></span></p>
							<p>Dear Sir/Madam,</p>
							<p>With due respect it is stated to transfer the salaries of the company employee(s) by debiting the account No 0010028933070019:</p>
							<p>Date: <?php echo $sy1; ?></p>
								<table width="100%" id="sum_table">

								<tr>
								<th class="auto-style1">
									 #
								</th>
								<th class="auto-style1">
									 Teacher Name
								</th>
								<th class="auto-style1">
									 Amount in Rs.
								</th>
								<th class="auto-style1">
									 Bank
								</th>
								<th class="auto-style1">
									 Branch Code
								</th>
								<th class="auto-style1">
									 Account No
								</th>
								<?php 
// sending query
$checkbox = $_POST['checkbox'];

for($i=0;$i<count($checkbox);$i++){
$del_id = $checkbox[$i];
$result = mysql_query("SELECT `profile`.*, `Gender`.`gender`, `shift`.`shift_name`, `hello`.`inout_name` FROM
  			`profile`,`Gender`,`shift`,`hello` WHERE profile.g_id=Gender.g_id and profile.shift_id=shift.shift_id and profile.inout_id=hello.inout_id HAVING teacher_id ='$del_id'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
else if ($numberOfRows > 0) 
	{
	while($row = mysql_fetch_array($result))
		{	?>	
			</tr>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									
								</td>
								<td>
									 <?php echo $row['account_title']; ?>
								</td>
								<td class="rowDataSd"><?php echo salary1("$del_id", "$mm_id", "$yy_id"); ?></td>
								<td>
									 <?php echo $row['bank']; ?>
								</td>
								<td>
									 <?php echo $row['branch_code']; ?>
								</td>
								<td>
									 <?php echo $row['account_no']; ?>
								</td>
							</tr>
							<?php		
		}
	}
	}
?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<th>
									--
								</th>
								<th>
									Total
								</th>
								<td class="totalCol"></td>
								<th>
									 
								</th>
								<th>
									 
								</th>
								<th>
									 
								</th>
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