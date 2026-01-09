<?php
date_default_timezone_set($TimeZoneCustome);
$ID = $_SESSION['is']['teacher_id'];
$trial_time = date('Y-m-d');
$syw = date('Y');
//Disputed class request
$sql = "SELECT * FROM class_disputes WHERE status = 1";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
if ($tnumberOfRows == 0) 
	{
	$despute = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-success"></span>
                                <i class="icon text-success lnr-sad"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Active Disputes</h5>
                                        <h6 class="menu-header-subtitle">There is no Active Dispute</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="admin-home-disputes"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Dispute Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
elseif ($tnumberOfRows > 0){
	$despute = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-danger"></span>
                                <i class="icon text-danger icon-anim-pulse lnr-sad"></i>
                                <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Active Disputes</h5>
                                        <h6 class="menu-header-subtitle">You have <b>'.$tnumberOfRows.'</b> Active Dispute</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="admin-home-disputes"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Dispute Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
}
//Accounts on Leave
$sql = "SELECT * FROM account WHERE active = '7' and leave_date < '$trial_time'";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
if ($tnumberOfRows == 0) 
	{
	$leave = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-success"></span>
                                <i class="icon text-success ion-android-calendar"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Families On Leave</h5>
                                        <h6 class="menu-header-subtitle">Families with Leave Over = 0</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="parent-accounts-in-active"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Leave Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
elseif ($tnumberOfRows > 0){
	$leave = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-danger"></span>
                                <i class="icon text-danger icon-anim-pulse ion-android-calendar"></i>
                                <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Families On Leave</h5>
                                        <h6 class="menu-header-subtitle">Families with Leave Over = <b>'.$tnumberOfRows.'</b></h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="parent-accounts-in-active"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Leave Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
}
//Dairy notes
$sql = "SELECT * FROM diary_notes WHERE teacher_id = 1 AND status = 1 AND reminder <= '$trial_time'";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
if ($tnumberOfRows == 0) 
	{
	$Dnote = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-success"></span>
                                <i class="icon text-success ion-android-document"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Diary Notes</h5>
                                        <h6 class="menu-header-subtitle">You have no Diary Notes</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="pending_reports"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Reminder Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
elseif ($tnumberOfRows > 0){
	$Dnote = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-danger"></span>
                                <i class="icon text-danger icon-anim-pulse ion-android-document"></i>
                                <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Diary Notes</h5>
                                        <h6 class="menu-header-subtitle">You have <b>'.$tnumberOfRows.'</b> Reminders Today</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="list-of-pnotes"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Reminder Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
}
//Pending reorts
$sql = "SELECT * FROM reports WHERE status = 1";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
if ($tnumberOfRows == 0) 
	{
	$p_reports = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-success"></span>
                                <i class="icon text-success ion-android-clipboard"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Pending Reports</h5>
                                        <h6 class="menu-header-subtitle">You have no Pending Reports</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="pending_reports"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Report Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
elseif ($tnumberOfRows > 0){
	$p_reports = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-danger"></span>
                                <i class="icon text-danger icon-anim-pulse ion-android-clipboard"></i>
                                <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Pending Reports</h5>
                                        <h6 class="menu-header-subtitle">You have <b>'.$tnumberOfRows.'</b> Pending Reports</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="pending_reports"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Report Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
}
//Accounts on Suspension
$sql = "SELECT * FROM account WHERE active = 17 and suspension_date < '$trial_time'";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
if ($tnumberOfRows == 0) 
	{
	$suspension= '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-success"></span>
                                <i class="icon text-success lnr-users"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Accounts on Suspension</h5>
                                        <h6 class="menu-header-subtitle">You have no Suspensions Over</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="parent-accounts-on-suspension"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Suspension Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
else if ($tnumberOfRows > 0) 
	{
	$suspension= '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-danger"></span>
                                <i class="icon text-danger icon-anim-pulse lnr-users"></i>
                                <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Accounts on Suspension</h5>
                                        <h6 class="menu-header-subtitle">You have <b>'.$tnumberOfRows.'</b> Account(s) on Suspension</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="parent-accounts-on-suspension"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Suspension Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
//Schedule Request
$sql = "SELECT * FROM class_resched";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
if ($tnumberOfRows == 0) 
	{
	$sched_request = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-success"></span>
                                <i class="icon text-success lnr-history"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Reschedule Requests</h5>
                                        <h6 class="menu-header-subtitle">You have no Reschedule Request</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="admin-home-reschedule"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">Reschedule Request Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
elseif ($tnumberOfRows > 0){
	$sched_request = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-danger"></span>
                                <i class="icon text-danger icon-anim-pulse lnr-history"></i>
                                <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Reschedule Requests</h5>
                                        <h6 class="menu-header-subtitle">You have <b>'.$tnumberOfRows.'</b> Reschedule Request(s)</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="admin-home-reschedule"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">Reschedule Request Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
}
//complaints
$sql = "SELECT * FROM complaint WHERE cn_id = '1'";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
if ($tnumberOfRows == 0) 
	{
	$complaints = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-success"></span>
                                <i class="icon text-success ion-android-alert"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Complaints</h5>
                                        <h6 class="menu-header-subtitle">You have no Active Complaint</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="complaint-pending"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">Reschedule Request Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
else if ($tnumberOfRows > 0) 
	{
$complaints = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-danger"></span>
                                <i class="icon text-danger icon-anim-pulse ion-android-alert"></i>
                                <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Complaints</h5>
                                        <h6 class="menu-header-subtitle">You have <b>'.$tnumberOfRows.'</b> Active Complaint(s)</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="complaint-pending"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Complaints Page</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
}
//announcments
$sql = "SELECT * FROM announcement WHERE ann_date <= '$trial_time' AND ann_end >= '$trial_time'";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
if ($tnumberOfRows == 0) 
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
//New Requests
$sql = "SELECT * FROM new_request WHERE status = 1";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
if ($tnumberOfRows == 0) 
	{
	$newrequests = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-success"></span>
                                <i class="icon text-success lnr-envelope"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">New Requests</h5>
                                        <h6 class="menu-header-subtitle">You have no Active Request</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="list-of-new-request"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See List of Requests</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
else if ($tnumberOfRows > 0) 
	{
$newrequests = '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-danger"></span>
                                <i class="icon text-danger icon-anim-pulse lnr-envelope"></i>
                                <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">New Requests</h5>
                                        <h6 class="menu-header-subtitle">You have <b>'.$tnumberOfRows.'</b> New Request(s)</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="list-of-new-request"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See List of Requests</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
}
//Trials
$sql = "SELECT * FROM account WHERE active = 11 and trial_date < '$trial_time'";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
if ($tnumberOfRows == 0) 
	{
	$trial= '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-success"></span>
                                <i class="icon text-success lnr-heart"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Accounts on Trial</h5>
                                        <h6 class="menu-header-subtitle">You have no Active Complaint</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="parent-accounts-on-trial"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Accounts on Trial</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
else if ($tnumberOfRows > 0) 
	{
	$trial= '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-danger"></span>
                                <i class="icon text-danger icon-anim-pulse lnr-heart"></i>
                                <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Accounts on Trial</h5>
                                        <h6 class="menu-header-subtitle">You have <b>'.$tnumberOfRows.'</b> Account(s) on Trial</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="parent-accounts-on-trial"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See Families on Trial</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
//Teacher notes
$sql = "SELECT * FROM note_student WHERE status = 1";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
if ($tnumberOfRows == 0) 
	{
	$student_note= '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-success"></span>
                                <i class="icon text-success ion-android-list"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Notes</h5>
                                        <h6 class="menu-header-subtitle">You have no New Note</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="comment-timeline-all"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See All Notes</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
else if ($tnumberOfRows > 0) 
	{
	$student_note= '<!-- Notification one sart-->
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-danger"></span>
                                <i class="icon text-danger icon-anim-pulse ion-android-list"></i>
                                <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header mb-0">
                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                    <div class="menu-header-image opacity-1" style="background-image: url("assets/images/dropdown-header/city3.jpg");"></div>
                                    <div class="menu-header-content text-dark">
                                        <h5 class="menu-header-title">Notes</h5>
                                        <h6 class="menu-header-subtitle">You have <b>'.$tnumberOfRows.'</b> New Note(s)</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item-btn text-center nav-item">
                                    <a href="comment-timeline-all"><button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">See All Notes</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- notification one end  -->';
	}
//task given start
$sql = "SELECT * FROM task_creator WHERE clear = '1' AND to_person = '$ID' AND status = '1'";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
if ($tnumberOfRows == 0) 
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
elseif ($tnumberOfRows > 0){
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
?>