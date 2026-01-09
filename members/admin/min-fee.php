<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("header.php");
  $tech_id =$_REQUEST['ptec'];
  $name_id =$_REQUEST['name'];
?>
<?php

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
							<h2><strong>Minimum Fee According to Classes</strong></h2>
							<div id="mytable" class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>
												Classes/Week
											</th>
											<th>
												Classes/Month
											</th>
											<th>
												In USD
											</th>
											<th>
												In GBP
											</th>
											<th>
												In AUD
											</th>
											<th>
												In CAD
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												01/Week
											</td>
											<td>
												04/Month
											</td>
											<td>
												09 USD	
											</td>
											<td>
												07 GBP
											</td>
											<td>
												11 AUD
											</td>
											<td>
												11 CAD
											</td>
										</tr>
										<tr>
											<td>
												02/Week
											</td>
											<td>
												08/Month
											</td>
											<td>
												17 USD	
											</td>
											<td>
												13 GBP
											</td>
											<td>
												22 AUD
											</td>
											<td>
												21 CAD
											</td>
										</tr>
										<tr>
											<td>
												03/Week
											</td>
											<td>
												12/Month
											</td>
											<td>
												25 USD	
											</td>
											<td>
												19 GBP
											</td>
											<td>
												32 AUD
											</td>
											<td>
												32 CAD
											</td>
										</tr>
										<tr>
											<td>
												04/Week
											</td>
											<td>
												16/Month
											</td>
											<td>
												33 USD	
											</td>
											<td>
												25 GBP
											</td>
											<td>
												43 AUD
											</td>
											<td>
												42 CAD
											</td>
										</tr>
										<tr>
											<td>
												05/Week
											</td>
											<td>
												20/Month
											</td>
											<td>
												41 USD	
											</td>
											<td>
												31 GBP
											</td>
											<td>
												53 AUD
											</td>
											<td>
												52 CAD
											</td>
										</tr>
										<tr>
											<td>
												06/Week
											</td>
											<td>
												24/Month
											</td>
											<td>
												65 USD	
											</td>
											<td>
												50 GBP
											</td>
											<td>
												85 AUD
											</td>
											<td>
												83 CAD
											</td>
										</tr>
										<tr>
											<td>
												07/Week
											</td>
											<td>
												28/Month
											</td>
											<td>
												95 USD	
											</td>
											<td>
												72 GBP
											</td>
											<td>
												123 AUD
											</td>
											<td>
												121 CAD
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