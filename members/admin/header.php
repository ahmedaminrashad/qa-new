<?php
$ID = $_SESSION['is']['teacher_id'];
$TIMG = $_SESSION['is']['image_name'];
$TNAME = $_SESSION['is']['teacher_name'];
$right = $_SESSION['is']['dept'];
$degi = $_SESSION['is']['deg'];
$syw = date('Y');
$q1 = "'";
$meu = '<li>
                                		<a href="#">
                                   		<i class="metismenu-icon pe-7s-note2"></i>
                                    	Accounts
                                    	<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                		</a>
                               	 		<ul>
                                    		<li>
                                                <a href="list-of-voucher">
                                                    <i class="metismenu-icon">
                                                    </i>Vouchers<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                                </a>
                                                <ul>
                                    		<li>
                                                <a href="list-of-voucher">
                                                    <i class="metismenu-icon">
                                                    </i>List of Vouchers
                                                </a>
                                            </li>
                                            <li>
                                                <a href="add-voucher-payment">
                                                    <i class="metismenu-icon">
                                                    </i>Add Payment Voucher
                                                </a>
                                            </li>
                                            <li>
                                                <a href="add-voucher-reciept">
                                                    <i class="metismenu-icon">
                                                    </i>Add Reciept Voucher
                                                </a>
                                            </li>
                                            <li>
                                                <a href="add-voucher-payment-salary">
                                                    <i class="metismenu-icon">
                                                    </i>Add Salary Voucher
                                                </a>
                                            </li>
                                         </ul>
                                            </li>
                                            <li>
                                                <a href="list-of-voucher">
                                                    <i class="metismenu-icon">
                                                    </i>Adjustment Accounts<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                                </a>
                                                <ul>
                                    		<li>
                                                <a href="depreciation-home">
                                                    <i class="metismenu-icon">
                                                    </i>DEP/Amort Expense
                                                </a>
                                            </li>
                                            <li>
                                                <a href="adjustment-entry-home">
                                                    <i class="metismenu-icon">
                                                    </i>Advances/Accrued
                                                </a>
                                            </li>
                                            <li>
                                                <a href="add-gen-account-entry">
                                                    <i class="metismenu-icon">
                                                    </i>General Entry
                                                </a>
                                            </li>
                                         </ul>
                                            </li>
                                            <li>
                                                <a href="list-of-voucher">
                                                    <i class="metismenu-icon">
                                                    </i>On-Going Reports<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                                </a>
                                                <ul>
                                    		<li>
                                                <a href="receipt-payment">
                                                    <i class="metismenu-icon">
                                                    </i>Receipt & Payment Monthly
                                                </a>
                                            </li>
                                            <li>
                                                <a href="receipt-payment-year">
                                                    <i class="metismenu-icon">
                                                    </i>Receipt & Payment Yearly
                                                </a>
                                            </li>
                                            <li>
                                                <a href="cash-book">
                                                    <i class="metismenu-icon">
                                                    </i>Cash Book
                                                </a>
                                            </li>
                                            <li>
                                                <a href="balance-sheet">
                                                    <i class="metismenu-icon">
                                                    </i>Balance Sheet
                                                </a>
                                            </li>
                                         </ul>
                                            </li>
                                            <li>
                                                <a href="generate-reports">
                                                    <i class="metismenu-icon">
                                                    </i>Generate Report
                                                </a>
                                            </li>
                                            <li>
                                                <a href="list-of-voucher">
                                                    <i class="metismenu-icon">
                                                    </i>Other Options<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                                </a>
                                                <ul>
                                    		<li>
                                                <a href="add-account-head">
                                                    <i class="metismenu-icon">
                                                    </i>Add New Head
                                                </a>
                                            </li>
                                            <li>
                                                <a href="add-vendor">
                                                    <i class="metismenu-icon">
                                                    </i>Add New Vendor
                                                </a>
                                            </li>
                                            <li>
                                                <a href="list-of-account-head">
                                                    <i class="metismenu-icon">
                                                    </i>List of Heads
                                                </a>
                                            </li>
                                            <li>
                                                <a href="list-of-vendor">
                                                    <i class="metismenu-icon">
                                                    </i>List of Vendors
                                                </a>
                                            </li>
                                         </ul>
                                            </li>
                                         </ul>
                                    	</li>
                                	<li>
                                    	<a href="#">
                                   		<i class="metismenu-icon pe-7s-graph2"></i>
                                    	Reports
                                    	<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                		</a>
                                        <ul>
                                            <li>
                                                <a href="sign-ups-report?year_id='.$syw.'">
                                                    <i class="metismenu-icon">
                                                    </i>Sign-Ups Reports
                                                </a>
                                            </li>
                                            <li>
                                                <a href="expense-report?year_id='.$syw.'">
                                                    <i class="metismenu-icon">
                                                    </i>Expense Report
                                                </a>
                                            </li>
                                            <li>
                                                <a href="expense-head-report?year_id='.$syw.'">
                                                    <i class="metismenu-icon">
                                                    </i>Account Head Expenses
                                                </a>
                                            </li>
                                            <li>
                                                <a href="generate-monthly-salary-ana">
                                                    <i class="metismenu-icon">
                                                    </i>Salary Records
                                                </a>
                                            </li>
                                            <li>
                                                <a href="find-student-record">
                                                    <i class="metismenu-icon">
                                                    </i>Teacher-Student Report
                                                </a>
                                            </li>
                                            <li>
                                                <a href="sign-anylasis-search">
                                                    <i class="metismenu-icon">
                                                    </i>Sign-Up By Date
                                                </a>
                                            </li>
                                            <li>
                                                <a href="student-details-country">
                                                    <i class="metismenu-icon">
                                                    </i>Student Distribution Country
                                                </a>
                                            </li>
                                            <li>
                                                <a href="student-details">
                                                    <i class="metismenu-icon">
                                                    </i>Student Distribution Course
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                    	<a href="#">
                                   		<i class="metismenu-icon pe-7s-graph2"></i>
                                    	Settings
                                    	<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                		</a>
                                        <ul>
                                            <li>
                                                <a href="system-settings">
                                                    <i class="metismenu-icon">
                                                    </i>System Settings
                                                </a>
                                            </li>
                                            <li>
                                                <a href="email-settings">
                                                    <i class="metismenu-icon">
                                                    </i>Email Settings
                                                </a>
                                            </li>
                                            <li>
                                                <a href="whatsapp-settings">
                                                    <i class="metismenu-icon">
                                                    </i>WhatsApp Settings
                                                </a>
                                            </li>
                                            <li>
                                                <a href="note-settings">
                                                    <i class="metismenu-icon">
                                                    </i>Notification Settings
                                                </a>
                                            </li>
                                        </ul>
                                    </li>';
if ($right == 4) { $rg = $meu;}
else {$rg = '';}
$meu2 = '<li>
                                    	<a href="invoice-details?cid=1&sig=$">
                                    	<i class="metismenu-icon pe-7s-cash"></i>
                                    	Billing<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                		</a>
                                		<ul>
                                    		<li>
                                                <a href="invoice-details?cid=1&sig=$">
                                                    <i class="metismenu-icon">
                                                    </i>Invoice Details
                                                </a>
                                            </li>
                                            <li>
                                                <a href="create-monthly-invoice">
                                                    <i class="metismenu-icon">
                                                    </i>Send Monthly Invoice
                                                </a>
                                            </li>
                                         </ul>
                                    </li>
                                    <li>
                                    	<a href="invoice-details?cid=1&sig=$">
                                    	<i class="metismenu-icon pe-7s-cash"></i>
                                    	Salaries<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                		</a>
                                		<ul>
                                    		<li>
                                                <a href="add-salary-all">
                                                    <i class="metismenu-icon">
                                                    </i>Generate Salaries
                                                </a>
                                            </li>
                                            <li>
                                                <a href="generate-monthly-salary-ana">
                                                    <i class="metismenu-icon">
                                                    </i>Salary Records
                                                </a>
                                            </li>
                                         </ul>
                                    </li>';
if ($right == 4) { $rg2 = $meu2;}
else {$rg2 = '';}
if ($right == 4) {$rg3 = '<li>
                                    	<a href="#">
                                    	<i class="metismenu-icon pe-7s-study"></i>
                                    	Employees
                                    	<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                		</a>
                                		<ul>
                                			<li>
                                				<a href="list-of-employees">
                                                    <i class="metismenu-icon">
                                                    </i>All
                                                </a>
                                			</li>
                                			<li>
                                				<a href="list-of-teachers">
                                                    <i class="metismenu-icon">
                                                    </i>Teaching Staff
                                                </a>
                                			</li>
                                			<li>
                                				<a href="list-of-non-teaching">
                                                    <i class="metismenu-icon">
                                                    </i>Non-Teaching Staff
                                                </a>
                                			</li>
                                			<li>
                                				<a href="add-teacher-account">
                                                    <i class="metismenu-icon">
                                                    </i>Add New Employee
                                                </a>
                                			</li>
                                		</ul>
                                    </li>';}
else {$rg3 = '<li>
                                    	<a href="#">
                                    	<i class="metismenu-icon pe-7s-study"></i>
                                    	Employees
                                    	<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                		</a>
                                		<ul>
                                			<li>
                                				<a href="list-of-teachers">
                                                    <i class="metismenu-icon">
                                                    </i>Teaching Staff
                                                </a>
                                			</li>
                                			<li>
                                				<a href="add-teacher-account">
                                                    <i class="metismenu-icon">
                                                    </i>Add New Employee
                                                </a>
                                			</li>
                                		</ul>
                                    </li>';}
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
    <meta name="description" content="Learning Managment & Scheduling System">

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
$search_bar = '<!-- header left search bar -->
            <div class="app-header-left">
                <form class="form-inline" action="search" method="GET">
                                            <div class="position-relative form-group"><label for="exampleEmail33" class="sr-only">Email</label><input placeholder="Search" name="query" type="text" class="mr-2 form-control"></div>
                                            <button class="btn btn-primary">Submit</button>
                                        </form>
                        </div>
           <!-- header left search bar end -->';
$notification_bar = '<!-- header right notification bar start -->
            <div class="app-header-right">
            
            <!-- Blink notification start -->
                <div class="header-dots">
                '.$p_reports.'
                '.$suspension.'
                '.$leave.'
                '.$trial.'
                '.$despute.'
                '.$sched_request.'
                '.$complaints.'
                '.$announcements.'
                '.$newrequests.'
                '.$student_note.'
                '.$Dnote.'
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
                                                <div class="menu-header-image opacity-2" style="background-image: url('.$q1.'assets/images/dropdown-header/city3.jpg'.$q1.');"></div>
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
                                    	<a href="dashboard">
                                    	<i class="metismenu-icon pe-7s-graph1"></i>
                                    	Dashboard
                                		</a>
                                    </li>
                                    <li>
                                    	<a href="list-of-new-request">
                                    	<i class="metismenu-icon pe-7s-mail"></i>
                                    	New Requests
                                		</a>
                                    </li>
                                    <li>
                                    	<a href="#">
                                    	<i class="metismenu-icon pe-7s-users"></i>
                                    	Families
                                    	<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                		</a>
                                		<ul>
                                			<li>
                                				<a href="parent-accounts">
                                                    <i class="metismenu-icon">
                                                    </i>List of Families
                                                </a>
                                			</li>
                                			<li>
                                				<a href="list-of-active-students">
                                                    <i class="metismenu-icon">
                                                    </i>List of Students
                                                </a>
                                			</li>
                                			<li>
                                				<a href="add-parent-account-call">
                                                    <i class="metismenu-icon">
                                                    </i>Add New Family
                                                </a>
                                			</li>
                                		</ul>
                                	</li>
                                	'.$rg3.'
                                    '.$rg2.'
                                    <li>
                                		<a href="#">
                                   		<i class="metismenu-icon lnr-bullhorn"></i>
                                    	Task & Announcement
                                    	<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                		</a>
                               	 		<ul>
                                    		<li>
                                                <a href="add-new-task-manual">
                                                    <i class="metismenu-icon">
                                                    </i>Add Tasks
                                                </a>
                                            </li>
                                            <li>
                                                <a href="add-new-announcement">
                                                    <i class="metismenu-icon">
                                                    </i>Add Announcements
                                                </a>
                                            </li>
                                         </ul>
                                         </li>
                                    <li>
                                    	<a href="#">
                                   		<i class="metismenu-icon pe-7s-tools"></i>
                                    	Other Options
                                    	<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                		</a>
                                        <ul>
                                            <li>
                                                <a href="add-country">
                                                    <i class="metismenu-icon">
                                                    </i>Add New Country
                                                </a>
                                            </li>
                                            <li>
                                                <a href="add-year">
                                                    <i class="metismenu-icon">
                                                    </i>Add New Year
                                                </a>
                                            </li>
                                            <li>
                                                <a href="test_status">
                                                    <i class="metismenu-icon">
                                                    </i>See Test Status
                                                </a>
                                            </li>
                                            <li>
                                                <a href="list-of-country">
                                                    <i class="metismenu-icon">
                                                    </i>List of Country
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                            		<li>
                                    	<a href="teacher-search-local-time">
                                    	<i class="metismenu-icon pe-7s-search"></i>
                                    	Search Schedule<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                		</a>
                                		<ul>
                                            <li>
                                                <a href="teacher-search-local-time">
                                                    <i class="metismenu-icon">
                                                    </i>Search Schedule
                                                </a>
                                            </li>
                                            <li>
                                                <a href="list-of-requested-schedule">
                                                    <i class="metismenu-icon">
                                                    </i>Requested Schedule
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                    	<a href="#">
                                    	<i class="metismenu-icon pe-7s-headphones"></i>
                                    	Class Options
                                    	<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                		</a>
                                		<ul>
                                			<li>
                                				<a href="admin-home">
                                                    <i class="metismenu-icon">
                                                    </i>List of Todays Classes
                                                </a>
                                			</li>
                                			<li>
                                				<a href="create_daily_classes-panel">
                                                    <i class="metismenu-icon">
                                                    </i>Update Daily Classes
                                                </a>
                                			</li>
                                			<li>
                                				<a href="teacher-class-search">
                                                    <i class="metismenu-icon">
                                                    </i>Schedule Advance Class
                                                </a>
                                			</li>
                                			<li>
                                				<a href="teacher-class-anylasis-search">
                                                    <i class="metismenu-icon">
                                                    </i>Salary Class Report
                                                </a>
                                			</li>
                                			<li>
                                				<a href="teacher-class-anylasis-daily">
                                                    <i class="metismenu-icon">
                                                    </i>Daily Class Report
                                                </a>
                                			</li>
                                			<li>
                                				<a href="public-holidays-teacher-class-search">
                                                    <i class="metismenu-icon">
                                                    </i>Public Holidays
                                                </a>
                                			</li>
                                		</ul>
                                    </li>
                                    '.$rg.'
                            </ul>';
$main_menu_end = '<!-- Main menu end   -->
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