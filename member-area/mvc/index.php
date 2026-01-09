<?php
/**
 * MVC Entry Point
 * This file should be accessed via URL rewriting or direct access
 */

// Bootstrap the MVC framework
require_once __DIR__ . '/bootstrap.php';

// Create router - detect base path automatically
$scriptName = $_SERVER['SCRIPT_NAME'];
$basePath = dirname($scriptName);
$router = new Router($basePath);

// Define routes with names
// Test route - Simple test page
$router->get('/test', 'Test@index', 'test');
$router->get('/', 'Test@index', 'home'); // Default route

// Dashboard route (migrated from dashboard.php)
$router->get('/dashboard', 'Dashboard@index', 'dashboard');

// Admin Home routes
$router->get('/admin-home', 'AdminHome@index', 'admin-home');
$router->get('/admin-home-all', 'AdminHome@all', 'admin-home-all');

// Student Management routes
$router->get('/list-of-active-students', 'ListOfActiveStudents@index', 'list-of-active-students');
 
// CSR Management routes
$router->get('/csr-performance', 'CsrPerformance@index', 'csr-performance');

// Request Management routes
$router->get('/list-of-new-request', 'ListOfNewRequest@index', 'list-of-new-request');

// Parent Accounts routes
$router->get('/parent-accounts', 'ParentAccounts@index', 'parent-accounts');
$router->get('/parent-accounts-active', 'ParentAccountsActive@index', 'parent-accounts-active');
$router->get('/parent-accounts-deactive', 'ParentAccountsDeactive@index', 'parent-accounts-deactive');
$router->get('/parent-accounts-on-trial', 'ParentAccountsOnTrial@index', 'parent-accounts-on-trial');
$router->get('/parent-accounts-on-leave', 'ParentAccountsOnLeave@index', 'parent-accounts-on-leave');
$router->get('/parent-accounts-on-suspension', 'ParentAccountsOnSuspension@index', 'parent-accounts-on-suspension');

// Request Management routes (variants)
$router->get('/list-of-new-request-csr', 'ListOfNewRequestCsr@index', 'list-of-new-request-csr');
$router->get('/list-of-new-request-teaching', 'ListOfNewRequestTeaching@index', 'list-of-new-request-teaching');
$router->get('/list-of-allocated-request', 'ListOfAllocatedRequest@index', 'list-of-allocated-request');
$router->get('/list-of-archives-request', 'ListOfArchivesRequest@index', 'list-of-archives-request');
$router->get('/list-of-responded-request', 'ListOfRespondedRequest@index', 'list-of-responded-request');
$router->get('/list-of-later-request', 'ListOfLaterRequest@index', 'list-of-later-request');

// Admin Home routes (variants)
$router->get('/admin-home-absents', 'AdminHomeAbsents@index', 'admin-home-absents');
$router->get('/admin-home-advance', 'AdminHomeAdvance@index', 'admin-home-advance');
$router->get('/admin-home-current-classes', 'AdminHomeCurrentClasses@index', 'admin-home-current-classes');
$router->get('/admin-home-taken-classes', 'AdminHomeTakenClasses@index', 'admin-home-taken-classes');
$router->get('/admin-home-suspended', 'AdminHomeSuspended@index', 'admin-home-suspended');
$router->get('/admin-home-rescheduled', 'AdminHomeRescheduled@index', 'admin-home-rescheduled');

// Reports routes
$router->get('/expense-report', 'ExpenseReport@index', 'expense-report');
$router->get('/expense-report-details', 'ExpenseReportDetails@index', 'expense-report-details');
$router->get('/expense-report-details-income', 'ExpenseReportDetailsIncome@index', 'expense-report-details-income');
$router->get('/profit-loss', 'ProfitLoss@index', 'profit-loss');
$router->get('/balance-sheet', 'BalanceSheet@index', 'balance-sheet');
$router->get('/cash-book', 'CashBook@index', 'cash-book');

// Task Management routes
$router->get('/pending-task', 'PendingTask@index', 'pending-task');
$router->get('/pending-given-tasks', 'PendingGivenTasks@index', 'pending-given-tasks');
$router->get('/pending-issued-tasks', 'PendingIssuedTasks@index', 'pending-issued-tasks');
$router->get('/awaiting-given-tasks', 'AwaitingGivenTasks@index', 'awaiting-given-tasks');
$router->get('/awaiting-issued-tasks', 'AwaitingIssuedTasks@index', 'awaiting-issued-tasks');
$router->get('/completed-task', 'CompletedTask@index', 'completed-task');

// Announcement routes
$router->get('/all-announcement', 'AllAnnouncement@index', 'all-announcement');
$router->get('/current-announcement', 'CurrentAnnouncement@index', 'current-announcement');

// List Management routes
$router->get('/list-of-employees', 'ListOfEmployees@index', 'list-of-employees');
$router->get('/list-of-teachers', 'ListOfTeachers@index', 'list-of-teachers');
$router->get('/list-of-inactive-teachers', 'ListOfInactiveTeachers@index', 'list-of-inactive-teachers');
$router->get('/list-of-account-head', 'ListOfAccountHead@index', 'list-of-account-head');
$router->get('/list-of-voucher', 'ListOfVoucher@index', 'list-of-voucher');
$router->get('/list-of-fee-packages', 'ListOfFeePackages@index', 'list-of-fee-packages');

// Teacher Search routes
$router->get('/teacher-search-local-time', 'TeacherSearchLocalTime@index', 'teacher-search-local-time');

// Schedule & Classes routes
$router->get('/add-schedule', 'AddSchedule@index', 'add-schedule');
$router->get('/add-schedule-one', 'AddScheduleOne@index', 'add-schedule-one');
$router->get('/add-schedule-local', 'AddScheduleLocal@index', 'add-schedule-local');
$router->get('/history_course', 'HistoryCourse@index', 'history_course');
$router->get('/history-course', 'HistoryCourse@index', 'history-course');
$router->get('/history-details', 'HistoryDetails@index', 'history-details');
$router->get('/create_daily_classes', 'CreateDailyClasses@index', 'create_daily_classes');
$router->get('/create-daily-classes', 'CreateDailyClasses@index', 'create-daily-classes');

// Invoice & Payments routes
$router->get('/invoice-details', 'InvoiceDetails@index', 'invoice-details');
$router->get('/invoice-received', 'InvoiceReceived@index', 'invoice-received');
$router->get('/invoice-adjusted', 'InvoiceAdjusted@index', 'invoice-adjusted');
$router->get('/create-monthly-invoice', 'CreateMonthlyInvoice@index', 'create-monthly-invoice');
$router->get('/create-recurring-invoice', 'CreateRecurringInvoice@index', 'create-recurring-invoice');

// Salary & Employee routes
$router->get('/monthly-salary-record', 'MonthlySalaryRecord@index', 'monthly-salary-record');
$router->get('/monthly-salary-details', 'MonthlySalaryDetails@index', 'monthly-salary-details');
$router->get('/generate-salary', 'GenerateSalary@index', 'generate-salary');
$router->get('/teacher-salary-record', 'TeacherSalaryRecord@index', 'teacher-salary-record');

// Student Management routes
$router->get('/add-student-account', 'AddStudentAccount@index', 'add-student-account');
$router->get('/edit-student-account', 'EditStudentAccount@index', 'edit-student-account');
$router->get('/add-parent-account', 'AddParentAccount@index', 'add-parent-account');
$router->get('/edit-parent-account', 'EditParentAccount@index', 'edit-parent-account');
$router->get('/parent-accounts-profile', 'ParentAccountsProfile@index', 'parent-accounts-profile');
$router->get('/parent-accounts-student', 'ParentAccountsStudent@index', 'parent-accounts-student');

// Teacher Management routes
$router->get('/add-teacher-account', 'AddTeacherAccount@index', 'add-teacher-account');
$router->get('/edit-teacher-account', 'EditTeacherAccount@index', 'edit-teacher-account');
$router->get('/teacher-performance', 'TeacherPerformance@index', 'teacher-performance');

// Course & Lesson routes
$router->get('/add-new-course', 'AddNewCourse@index', 'add-new-course');
$router->get('/edit-course', 'EditCourse@index', 'edit-course');
$router->get('/add-new-lesson', 'AddNewLesson@index', 'add-new-lesson');
$router->get('/edit-lesson', 'EditLesson@index', 'edit-lesson');
$router->get('/course-material', 'CourseMaterial@index', 'course-material');

// Entry & Accounting routes
$router->get('/add-account-entry', 'AddAccountEntry@index', 'add-account-entry');
$router->get('/edit-account-entry', 'EditAccountEntry@index', 'edit-account-entry');
$router->get('/entry-details', 'EntryDetails@index', 'entry-details');
$router->get('/add-voucher', 'AddVoucher@index', 'add-voucher');
$router->get('/edit-voucher', 'EditVoucher@index', 'edit-voucher');

// Test & Results routes
$router->get('/add-test', 'AddTest@index', 'add-test');
$router->get('/enter_test_results', 'EnterTestResults@index', 'enter_test_results');
$router->get('/enter-test-results', 'EnterTestResults@index', 'enter-test-results');
$router->get('/test_today', 'TestToday@index', 'test_today');
$router->get('/test-today', 'TestToday@index', 'test-today');

// Complaint & Notes routes
$router->get('/complaint-pending', 'ComplaintPending@index', 'complaint-pending');
$router->get('/complaint-completed', 'ComplaintCompleted@index', 'complaint-completed');
$router->get('/pending-notes', 'PendingNotes@index', 'pending-notes');
$router->get('/one-note', 'OneNote@index', 'one-note');

// Settings & Configuration routes
$router->get('/list-of-country', 'ListOfCountry@index', 'list-of-country');
$router->get('/add-country', 'AddCountry@index', 'add-country');
$router->get('/edit-country', 'EditCountry@index', 'edit-country');
$router->get('/list-of-country-timezone', 'ListOfCountryTimezone@index', 'list-of-country-timezone');
$router->get('/add-timezone', 'AddTimezone@index', 'add-timezone');
$router->get('/edit-timezone', 'EditTimezone@index', 'edit-timezone');
$router->get('/banners', 'Banners@index', 'banners');

// Reports & Analytics routes
$router->get('/sign-ups-report', 'SignUpsReport@index', 'sign-ups-report');
$router->get('/date-sign-ups', 'DateSignUps@index', 'date-sign-ups');
$router->get('/revenue-expense-report', 'RevenueExpenseReport@index', 'revenue-expense-report');
$router->get('/entry-details-cash', 'EntryDetailsCash@index', 'entry-details-cash');
$router->get('/entry-details-year', 'EntryDetailsYear@index', 'entry-details-year');

// Allocate & Manage routes
$router->get('/allocate-csr', 'AllocateCsr@index', 'allocate-csr');
$router->get('/change-teacher', 'ChangeTeacher@index', 'change-teacher');
$router->get('/change-schedule', 'ChangeSchedule@index', 'change-schedule');
$router->get('/change-trial-date', 'ChangeTrialDate@index', 'change-trial-date');

// Rights & Permissions routes (support both underscore and hyphen)
$router->get('/accounts_rights', 'AccountsRights@index', 'accounts_rights');
$router->get('/accounts-rights', 'AccountsRights@index', 'accounts-rights');
$router->get('/billing_rights', 'BillingRights@index', 'billing_rights');
$router->get('/billing-rights', 'BillingRights@index', 'billing-rights');
$router->get('/csr_rights', 'CsrRights@index', 'csr_rights');
$router->get('/csr-rights', 'CsrRights@index', 'csr-rights');
$router->get('/manager_rights', 'ManagerRights@index', 'manager_rights');
$router->get('/manager-rights', 'ManagerRights@index', 'manager-rights');
$router->get('/monitor_rights', 'MonitorRights@index', 'monitor_rights');
$router->get('/monitor-rights', 'MonitorRights@index', 'monitor-rights');
$router->get('/teacher_rights', 'TeacherRights@index', 'teacher_rights');
$router->get('/teacher-rights', 'TeacherRights@index', 'teacher-rights');

// Add more routes as needed
// $router->get('/path', 'Controller@method', 'path');
// $router->post('/path', 'Controller@method', 'path');

// Dispatch the request
$router->dispatch();

