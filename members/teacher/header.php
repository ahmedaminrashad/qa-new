<?php
include("../includes/main-var.php");
date_default_timezone_set($TimeZoneCustome);
$ID = $_SESSION['is']['teacher_id'];
$TIMG = $_SESSION['is']['image_name'];
$TNAME = $_SESSION['is']['teacher_name'];
$degi = $_SESSION['is']['deg'];
$syw = date('Y');
$trial_time = date('Y-m-d');
//task given start
$sql = "SELECT * FROM task_creator WHERE clear = '1' AND to_person = '$ID' AND status = '1'";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
If ($tnumberOfRows == 0) 
	{
	$task_given = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-danger"></span>
                                <i class="icon text-danger ion-android-bulb"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Tasks Given</h5>
                                        <h6 class="menu-header-subtitle">You have no Active Complaint</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="pending-given-tasks"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Task Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
elseif ($tnumberOfRows > 0){
	$task_given = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-danger"></span>
                                <i class="icon text-danger icon-anim-pulse ion-android-bulb"></i>
                                <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Tasks Given</h5>
                                        <h6 class="menu-header-subtitle">You have <b>'.$tnumberOfRows.'</b> Pending Tasks</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="pending-given-tasks"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Report Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
}
//task issued start
$sql = "SELECT * FROM task_creator WHERE clear = '1' AND from_person = '$ID' AND status = '2'";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
if ($tnumberOfRows == 0) 
	{
	$task_issued = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-success"></span>
                                <i class="icon text-success ion-android-bulb"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Task Assigned</h5>
                                        <h6 class="menu-header-subtitle">You have no Task Assigned</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="pending-issued-tasks"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Tasks Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
else if ($tnumberOfRows > 0){
	$task_issued = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-success"></span>
                                <i class="icon text-success icon-anim-pulse ion-android-bulb"></i>
                                <span class="badge badge-dot badge-dot-sm badge-success">Notifications</span>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Task Assigned</h5>
                                        <h6 class="menu-header-subtitle">You have <b>'.$tnumberOfRows.'</b> Task Assigned</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="pending-issued-tasks"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Tasks Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
}
//announcments
$sql = "SELECT * FROM announcement WHERE (ann_cat = 8 or ann_cat = 17) and ann_date <= '$trial_time' AND ann_end >= '$trial_time'";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
If ($tnumberOfRows == 0) 
	{
	$announcements = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-success"></span>
                                <i class="icon text-success lnr-bullhorn"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Active Announcements</h5>
                                        <h6 class="menu-header-subtitle">You have no Active Announcements</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="current-announcement"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Announcements Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
else if ($tnumberOfRows > 0) 
	{
$announcements = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-danger"></span>
                                <i class="icon text-danger icon-anim-pulse lnr-bullhorn"></i>
                                <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Active Announcements</h5>
                                        <h6 class="menu-header-subtitle">You have <b>'.$tnumberOfRows.'</b> Active Announcement(s)</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="current-announcement"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Announcements Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
}
//NOtes
$sql = "SELECT * FROM note_student WHERE status = 2 AND teacher_id = '$ID'";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
If ($tnumberOfRows == 0) 
	{
	$Note = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-success"></span>
                                <i class="icon text-success pe-7s-comment"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Notes</h5>
                                        <h6 class="menu-header-subtitle">You have no Note Reply</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="comment-timeline-teacher-all"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Announcements Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
else if ($tnumberOfRows > 0) 
	{
$Note = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-danger"></span>
                                <i class="icon text-danger icon-anim-pulse pe-7s-comment"></i>
                                <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Notes</h5>
                                        <h6 class="menu-header-subtitle">You have <b>'.$tnumberOfRows.'</b> Note Reply</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="comment-timeline-teacher-all"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Announcements Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
}
$main_header = '<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>'.$title.'</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="Tables are the backbone of almost all web applications.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="./main.8d288f825d8dffbbe55e.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>';
$top_bar_logo = '<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <!-- Main Top Bar Start -->
    <div class="app-header header-shadow">
    <!-- logo and menu sign -->
        <div class="app-header__logo">
        <p>'.$title1.'</p>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <!-- logo and menu sign -->
        <!-- main menu sign -->
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <!-- main menu sign -->
        <!-- close sign -->
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>    
        <!-- close sign -->
        <!-- Top Header start -->
        <div class="app-header__content">';
$search_bar = '';
$notification_bar = '<!-- header right notification bar start -->
            <div class="app-header-right">
            
            <!-- Blink notification start -->
                <div class="header-dots">
                '.$announcements.'
                '.$Note.'
                    </div>
                <!-- Blink notification end  -->
                <!-- person logout and avtar  -->
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                        <img width="42" class="rounded-circle" src="../uploads/thumb/'.$TIMG.'" alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                    <!-- main and logout -->
                                        <div class="dropdown-menu-header">
                                            <div class="dropdown-menu-header-inner bg-info">
                                                <div class="menu-header-image opacity-2" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                                <div class="menu-header-content text-left">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <img width="42" class="rounded-circle"
                                                                     src="../uploads/thumb/'.$TIMG.'"
                                                                     alt="">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">'.$TNAME.'
                                                                </div>
                                                                <div class="widget-subheading opacity-8">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-right mr-2">
                                                                <a href="logout"><button class="btn-pill btn-shadow btn-shine btn btn-focus">Logout
                                                                </button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- main and logout end -->
                                        </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    '.$TNAME.'
                                </div>
                                <div class="widget-subheading">
                                    '.$degi.'
                                </div>
                            </div>
                            <div class="header-dots">
                            &nbsp;'.$task_given.'
                            '.$task_issued.'
                            </div>
                        </div>
                    </div>
                </div>
               <!-- person logout and avtar end -->  
               </div>
               <!-- header right notification bar end  -->
               </div>
        <!-- Top Header end -->
    </div>
 <!-- Main Top Bar End  -->';
$main_menu_start = '<div class="app-main">
<!-- Menu Section Start  -->
            <div class="app-sidebar sidebar-shadow">
            
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>    
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                    <!-- Main menu start  -->';
$main_menu = '<ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Menu</li>
                            		<li>
                                    	<a href="teacher-home">
                                    	<i class="metismenu-icon pe-7s-home"></i>
                                    	Home
                                		</a>
                                    </li>
                                    <li>
                                    	<a href="teacher-schedule?pT='.$ID.'">
                                    	<i class="metismenu-icon pe-7s-users"></i>
                                    	Weekly Time-Table
                                		</a>
                                    </li>
                                    <li>
                                    	<a href="teacher-student-list">
                                    	<i class="metismenu-icon pe-7s-users"></i>
                                    	List of Students
                                		</a>
                                    </li>
                                    <li>
                                    	<a href="course-material">
                                    	<i class="metismenu-icon pe-7s-study"></i>
                                    	Course Material
                                		</a>
                                    </li>
                                    <li>
                                    	<a href="#">
                                    	<i class="metismenu-icon pe-7s-cash"></i>
                                    	Salary
                                    	<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                		</a>
                                		<ul>
                                			<li>
                                				<a href="teacher-salary-record-employee">
                                                    <i class="metismenu-icon">
                                                    </i>Salary Details
                                                </a>
                                			</li>
                                			<li>
                                				<a href="teacher-class-anylasis-search">
                                                    <i class="metismenu-icon">
                                                    </i>Class Details
                                                </a>
                                			</li>
                                		</ul>
                                	</li>
                                    <li>
                                    	<a href="logout">
                                    	<i class="metismenu-icon pe-7s-lock"></i>
                                    	Logout
                                		</a>
                                    </li>
                                	</ul>';
$main_menu_end = '<!-- Main menu end   -->
                    </div>
                </div>
            </div>
            <!-- Menu Section end  --> 
            <!-- Main Body Start  -->';
$footer = '<!-- Main menu end   -->
                    </div>
                </div>
            </div>
            <!-- Menu Section end  --> 
            <!-- Main Body Start  -->';
$footer = '<!-- Footer Start  -->
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                            </div>
                            <div class="app-footer-right">
                            </div>
                        </div>
                    </div>
                </div>    </div>
    </div>
</div>
<div class="app-drawer-wrapper">
    <div class="drawer-nav-btn">
        <button type="button" class="hamburger hamburger--elastic is-active">
            <span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
    </div>
    <div class="drawer-content-wrapper">
        <div class="scrollbar-container">
            <div class="drawer-section">
            </div>
        </div>
    </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div><script type="text/javascript" src="./assets/scripts/main.8d288f825d8dffbbe55e.js"></script></body>
</html>';