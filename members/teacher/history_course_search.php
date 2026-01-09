<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $Course_ID =base64_decode($_GET["Course_ID"]); 
$m =$_REQUEST['month_id'];
$y =$_REQUEST['year_id'];
function lesson($er)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM lesson_pages Where lesson_id = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$l_name = $row['lesson_name'];
			  		echo $l_name;
			}
			}
	}
?>
<?php
if ($m == "1"){$mon = 'January';}
elseif ($m == "2"){$mon = 'February';}
elseif ($m == "3"){$mon = 'March';}
elseif ($m == "4"){$mon = 'April';}
elseif ($m == "5"){$mon = 'May';}
elseif ($m == "6"){$mon = 'June';}
elseif ($m == "7"){$mon = 'July';}
elseif ($m == "8"){$mon = 'August';}
elseif ($m == "9"){$mon = 'September';}
elseif ($m == "10"){$mon = 'October';}
elseif ($m == "11"){$mon = 'November';}
elseif ($m == "12"){$mon = 'December';}
?>
<?php
$y =$_REQUEST['year_id'];
$yt=$y;
if ($yt == "1")
		{ 
			$sy = '2014';
		}
elseif ($yt == "2")
		{ 
			$sy = '2015';
		}
elseif ($yt == "3")
		{ 
			$sy = '2016';
		}

elseif ($yt == "4")
		{ 
			$sy = '2017';
		}

elseif ($yt == "5")
		{ 
			$sy = '2018';
		}
		elseif ($yt == "6")
		{ 
			$sy = '2019';
		}
		elseif ($yt == "7")
		{ 
			$sy = '2020';
		}
		elseif ($yt == "8")
		{ 
			$sy = '2021';
		}
		elseif ($yt == "9")
		{ 
			$sy = '2022';
		}
		elseif ($yt == "10")
		{ 
			$sy = '2023';
		}
		elseif ($yt == "11")
		{ 
			$sy = '2024';
		}
		elseif ($yt == "12")
		{ 
			$sy = '2025';
		}
		elseif ($yt == "13")
		{ 
			$sy = '2026';
		}
?>
<?php
$page_title = 'Lesson History';
$page_subtitle = 'Lesson History';
$table_name = 'Lesson History';
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
								<th>
									 Date
								</th>
								<th>
									 Class
								</th>
								<th>
									 Duration
								</th>
								<th>
									 Course
								</th>
								<th>
									 Lesson
								</th>
								<th>
									 Description
								</th>
								<th>
									 Sabaq
								</th>
								<th>
									 Sabaqi
								</th>
								<th>
									 Manzil
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
   $Course_ID =base64_decode($_GET["Course_ID"]);
$sql = "SELECT `History1`.*,`course`.`course_yrSec`,`attend`.`mark`,`day`.`day_name`,`month`.`month_name`,`school_yr`.`school_year`,`remaks`.`remak`,`profile`.`teacher_name` FROM `History1`,`course`,`attend`,`day`,`month`,`school_yr`,`remaks`,`profile` WHERE History1.course_id=course.course_id and History1.a_id=attend.a_id and History1.admin_day=day.day_id and History1.admin_month=month.month_id and History1.admin_year=school_yr.year_id and History1.teacher_remarks=remaks.remk_id and History1.teacher_id=profile.teacher_id HAVING course_id = '$Course_ID' and admin_month = '$m' and admin_year = '$y'  ORDER BY admin_date DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$hid = $row['history1_id'];
			$student = $row['course_yrSec'];
			$attendnce = $row['mark'];
			$day = $row['day_name'];
			$year = $row['school_year'];
			$mon = $row['month_name'];
			$remarkst = $row['remak'];
			$teacher = $row['teacher_name'];
			$a_date = $row['admin_date'];
			$tech_id = $row['teacher_id'];
			$year_name = $row['school_year'];
			$mon_name = $row['month_name'];
			$stur_course_id = $row['course_id'];
			$s_date = $row['admin_date'];
			$st = $row['start_time'];
			$et = $row['end_time'];
			$sabuq = $row['sabaq'];
			$sabuqi = $row['sabaqi'];
			$manz = $row['manzil'];
			$r_course_id = $row['dept_id'];
			$r_lesson_id = $row['lesson_id'];
			$r_lesson_des = $row['lesson_discription'];
			$a_course_id = $row['additional_dept'];
			$a_lesson_id = $row['additional_lesson'];
			$a_lesson_des = $row['additional_des'];

?>
							
								<tr>
								<td>
									 <?php echo $a_date; ?>
								</td>
								<td>
									 <?php echo lesson("$r_lesson_id"); ?>
								</td>
								<td>
									 <?php echo $r_lesson_des; ?>
								</td>
								<td>
									 <?php echo lesson("$a_lesson_id"); ?>
								</td>
								<td>
									 <?php echo $a_lesson_des; ?>
								</td>
								<td>
									 <?php echo $sabuq; ?>
								</td>
								<td>
									 <?php echo $sabuqi; ?>
								</td>
								<td>
									 <?php echo $manz; ?>
								</td>
							</tr>
							<?php 	
		}
	}	
?>								</tbody>
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