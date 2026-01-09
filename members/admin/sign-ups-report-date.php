<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  if ($right != 4)
  {
  header('Location: admin-home');
  }
  include("load-data-files/signup-functions.php");
  $s_date =$_REQUEST['start_date'];
$e_date =$_REQUEST['end_date'];
?>
<?php
$sy = date('Y-m-d');
$mm_id = date('m');
$yeaid =$_REQUEST['year_id'];
$yy_id = date('Y');
$year1 = date('Y');
$month1 = date('m');
$month_n = date('M');
$year1sm = date('y');
$ddd1 = ''.$year1.'-'.$month1.'-01';
$last_date1 = date("Y-m-t", strtotime($ddd1));
?>
<?php
$page_title = 'Sign Ups Report by Date';
$page_subtitle = 'Sign Ups Report by Date';
$table_name = 'Expense Report';
?>
<?php echo $main_header; ?>
<head>
<style>
.amcharts-chart-div a {display:none !important;}
</style>
</head>
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
                            <div class="no-gutters row">
                                <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" s-date="<?php echo $s_date; ?>" e-date="<?php echo $e_date; ?>" name="trial_date"><div class="col-md-4">
                                    <div class="widget-content">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-right ml-0 mr-3">
                                                <div class="widget-numbers text-success"><?php echo trials("$s_date","$e_date"); ?></div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Trials Over</div>
                                                <div class="widget-subheading">DUring Selected Dates</div>
                                            </div>
                                        </div>
                                    </div>
                                </div></a>
                               <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" s-date="<?php echo $s_date; ?>" e-date="<?php echo $e_date; ?>" name="regular_date"> <div class="col-md-4">
                                    <div class="widget-content">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-right ml-0 mr-3">
                                                <div class="widget-numbers text-warning"><?php echo regulars("$s_date","$e_date"); ?></div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Regulars</div>
                                                <div class="widget-subheading">($ <?php echo regularsfee("$s_date","$e_date", 1); ?>) (GBP <?php echo regularsfee("$s_date","$e_date", 2); ?>) ($A <?php echo regularsfee("$s_date","$e_date", 3); ?>)</div>
                                            </div>
                                        </div>
                                    </div>
                                </div></a>
                                <a class="notes2" href="#notes-d" data-toggle="modal" data-target="#notes-d" s-date="<?php echo $s_date; ?>" e-date="<?php echo $e_date; ?>" name="deactivation_date"><div class="col-md-4">
                                    <div class="widget-content">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-right ml-0 mr-3">
                                                <div class="widget-numbers text-danger"><?php echo leftsreal("$s_date","$e_date"); ?></div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Deactivations</div>
                                                <div class="widget-subheading">($ <?php echo leftsrealfee("$s_date","$e_date", 1); ?>) (GBP <?php echo leftsrealfee("$s_date","$e_date", 2); ?>) ($A <?php echo leftsrealfee("$s_date","$e_date", 3); ?>)</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></a>

                                <script src="./assets/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="./assets/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
<div id="chart4div" style="width:100%;height:300px;"></div>
<script>
var chart4 = AmCharts.makeChart("chart4div", {
"type": "serial",
"dataLoader": {
"url": "load-data-files/date-sign-ups.php?start_date=<?php echo $s_date; ?>&end_date=<?php echo $e_date; ?>"
},
"valueAxes": [{
"gridColor": "#697B15",
"gridAlpha": 0.2,
"dashLength": 2
}],
"gridAboveGraphs": true,
"startDuration": 1,
"graphs": [{
"alphaField": "alpha",
"balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
"dashLengthField": "dashLengthColumn",
"fillAlphas": 1,
"title": "Trials Ended",
"type": "column",
"valueField": "trial"
},{
"alphaField": "alpha",
"balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
"dashLengthField": "dashLengthColumn",
"fillAlphas": 1,
"title": "Total Regulars",
"type": "column",
"valueField": "regular"
},{
"alphaField": "alpha",
"balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
"dashLengthField": "dashLengthColumn",
"fillAlphas": 1,
"title": "Leaves Over",
"type": "column",
"valueField": "leave"
},{
"alphaField": "alpha",
"balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
"dashLengthField": "dashLengthColumn",
"fillAlphas": 1,
"title": "Suspensions Over",
"type": "column",
"valueField": "suspend"
},{
"alphaField": "alpha",
"balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
"dashLengthField": "dashLengthColumn",
"fillAlphas": 1,
"title": "Deactivations",
"type": "column",
"valueField": "left"
}],
"chartCursor": {
"categoryBalloonEnabled": false,
"cursorAlpha": 0,
"zoomable": false
},
"categoryField": "date",
"categoryAxis": {
"gridPosition": "start",
"gridAlpha": 0,
"tickPosition": "start",
"tickLength": 20
}
});

function setDataSet1(dataset_url) {
AmCharts.loadFile(dataset_url, {}, function(data) {
chart3.dataProvider = AmCharts.parseJSON(data);
chart3.validateData();
});
}
</script>
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
<div class="modal fade bd-example-modal-lg" id="notes-d" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="notes-d1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.year_id.value = ("<?php echo $yeaid; ?>");
	//alert (form.pCityM.value);				
</script>
<script>
$('.notes2').click(function(){
    var Date1=$(this).attr('s-date');
    var Date2=$(this).attr('e-date');
    var name=$(this).attr('name');

    $.ajax({url:"sign-ups-list-trial.php?Date1="+Date1+"&Date2="+Date2+"&name="+name,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>