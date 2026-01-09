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
include("../includes/session.php");
  include("../includes/manager_rights.php");
  require ("../includes/dbconnection.php");
  include("header.php");
  $link = $_SERVER['REQUEST_URI'];
  $pnid =base64_decode($_GET["parent_id"]);
?>
<?php
date_default_timezone_set("Asia/Karachi");
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
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Invoice Details<small> <?php $result = mysql_query("SELECT * FROM school_yr WHERE year_id = $y");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
$pidm = MYSQL_RESULT($result,$i,"school_year");
echo $pidm;?></small></h1>
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
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">
							Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="parent-accounts">List of Parent Accounts</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Invoice Details of <?php 
$g =$_REQUEST['par_id'];
$result1 = mysql_query("SELECT * FROM account HAVING parent_id = $pnid");	
$pname = MYSQL_RESULT($result1,$i,"parent_name");
echo $pname;	
?>			
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h3>For the Year: <span class="caption-subject font-green-sharp bold uppercase"><?php $result = mysql_query("SELECT * FROM school_yr WHERE year_id = $y");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
$pidm = MYSQL_RESULT($result,$i,"school_year");
echo $pidm ?></span></h3>
						<form action="ind_details_b?pti=<?php echo $tt; ?>" method="GET" class="form-horizontal form-row-sepe">
										<label class="control-label">Select Year</label>
											<select class="form-control input-small select2me" data-placeholder="Select..." name="pdept"  id="pdept" onchange="this.form.submit()">
												<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM school_yr ORDER BY year_id ");			  	
				do {  ?>
  <option value="<?php echo $row['year_id'];?>"><?php echo $row['school_year'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>
<input type="hidden" id="hidden_pdept_id" name="hidden_p_pdept_id"  value="<?PHP echo trim($_POST['hidden_pdept_id']); ?>" />
                <input type="hidden" id="hidden_dept" name="pti" value="<?PHP echo $pnid; ?>"/>

											</form>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									#
								</th>
								<th>
									<i class="fa fa-calendar"></i> Month
								</th>
								<th>
									<i class="fa fa-calendar"></i> Due Date
								</th>
								<th>
									<i class="fa fa-calendar"></i> Paid Date
								</th>
								<th>
									<i class="fa fa-money"></i> Fee
								</th>
								<th>
									<i class="fa fa-money"></i> Adjustment
								</th>
								<th>
									<i class="fa fa-money"></i> Amount
								</th>
															<th>
															</th>
								<?php 
$result = mysql_query("SELECT `invoice`.*, `month`.`month_name`, `statusp`.`status_name`, `currency`.`currency_name` FROM `invoice`,`month`,`statusp`,`currency` WHERE invoice.mon_id=month.month_id and invoice.status=statusp.s_id and invoice.currency_id=currency.currency_id HAVING parent_id = $pnid and y_id = $y ORDER BY mon_id DESC");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<font color="#0DB5C0">Sorry No Invoice Send Yet!</font>';
	}
else if ($numberOfRows > 0) 
	{
	while($row = mysql_fetch_array($result))
		{		
			if($row['status']=='1') 
				{
					$bgcolor ='#FE2E2E';
				}
			else if($row['status']=='2')
				{
					$bgcolor ='#04B404';
				}		
				else
				{
					$bgcolor ='#ffffff';
				}
			$pidy = MYSQL_RESULT($result,$i,"py_id");
			$prid = MYSQL_RESULT($result,$i,"parent_id");
			$iss = MYSQL_RESULT($result,$i,"issue");
			$du = MYSQL_RESULT($result,$i,"due");
			$sub = MYSQL_RESULT($result,$i,"submit");
			$fe = MYSQL_RESULT($result,$i,"fee");
			$fe_add = MYSQL_RESULT($result,$i,"invoice_add");
			$sts = MYSQL_RESULT($result,$i,"status_name");
			$mon = MYSQL_RESULT($result,$i,"month_name");
			$s = MYSQL_RESULT($result,$i,"status");
			$cuan = MYSQL_RESULT($result,$i,"currency_name");
			$order = MYSQL_RESULT($result,$i,"order_num");
			$anote = MYSQL_RESULT($result,$i,"add_note");
?>
														</tr>
														</thead>
														<tbody>
														<tr>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $order; ?></font>															</td>
															<td class="hidden-xs">
																 <font color="<?php echo $bgcolor; ?>"><?php echo $mon; ?></font>
															</td>
															<td>
																 <font color="<?php echo $bgcolor; ?>"><?php echo $du; ?></font>															</td>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $sub; ?></font>
															</td>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $cuan; ?><?php echo $fe; ?></font>
															</td>
															<td>
																<font color="<?php echo $bgcolor; ?>"><a class="invoicesnote" href="#invoice" data-toggle="modal" data-target="#invoice" data-add="<?php echo $fe_add; ?>" data-note="<?php echo $anote; ?>"><?php echo $cuan; ?><?php echo $fe_add; ?>/-</a></font>
															</td>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $cuan; ?><?php echo $fe+$fe_add; ?>/-</font>
															</td>
															<td>
																<a class="invoices" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="<?php echo $pidy; ?>" data-add="<?php echo $fe_add; ?>" data-note="<?php echo $anote; ?>" data-name="<?php echo $pname; ?>"><button type="button" class="btn blue btn-xs"><i class="fa fa-money"></i></button></a>
															</td>
														</tr>
														<?php
														$i++;		
		}
	}	
?>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
			<div class="modal fade bs-modal-lg" id="invoice" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.pdept.value = ("<?php echo $y; ?>");
	//alert (form.pCityM.value);				
</script>
<script>
$('.invoices').click(function(){
    var famID=$(this).attr('data-id');
    var famAdd=$(this).attr('data-add');
    var famNote=$(this).attr('data-note');
    var famName=$(this).attr('data-name');

    $.ajax({url:"add-invoice-adjustment.php?famID="+famID+"&famAdd="+famAdd+"&famNote="+famNote+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>
<script>
$('.invoicesnote').click(function(){
    var famAdd=$(this).attr('data-add');
    var famNote=$(this).attr('data-note');

    $.ajax({url:"invoice-adjustment-details.php?famAdd="+famAdd+"&famNote="+famNote,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>