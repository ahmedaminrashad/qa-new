<?php
/**
 * Batch Migration Script
 * This script helps migrate multiple PHP files to MVC pattern
 * 
 * Usage: Run this to generate controllers for multiple files at once
 */

// Define base paths
$adminDir = __DIR__ . '/../admin';
$controllersDir = __DIR__ . '/Controllers';
$routesFile = __DIR__ . '/index.php';

// List of files to migrate (prioritized)
$filesToMigrate = [
    // High priority - frequently used
    'list-of-new-request' => 'ListOfNewRequest',
    'parent-accounts' => 'ParentAccounts',
    'expense-report' => 'ExpenseReport',
    'teacher-search-local-time' => 'TeacherSearchLocalTime',
    
    // Parent accounts variants
    'parent-accounts-active' => 'ParentAccountsActive',
    'parent-accounts-deactive' => 'ParentAccountsDeactive',
    'parent-accounts-on-trial' => 'ParentAccountsOnTrial',
    'parent-accounts-on-leave' => 'ParentAccountsOnLeave',
    'parent-accounts-on-suspension' => 'ParentAccountsOnSuspension',
    
    // List variants
    'list-of-new-request-csr' => 'ListOfNewRequestCsr',
    'list-of-new-request-teaching' => 'ListOfNewRequestTeaching',
    'list-of-allocated-request' => 'ListOfAllocatedRequest',
    'list-of-archives-request' => 'ListOfArchivesRequest',
    'list-of-responded-request' => 'ListOfRespondedRequest',
    'list-of-later-request' => 'ListOfLaterRequest',
    
    // Admin home variants
    'admin-home-absents' => 'AdminHomeAbsents',
    'admin-home-advance' => 'AdminHomeAdvance',
    'admin-home-current-classes' => 'AdminHomeCurrentClasses',
    'admin-home-taken-classes' => 'AdminHomeTakenClasses',
    'admin-home-suspended' => 'AdminHomeSuspended',
    'admin-home-rescheduled' => 'AdminHomeRescheduled',
    
    // Reports
    'expense-report-details' => 'ExpenseReportDetails',
    'expense-report-details-income' => 'ExpenseReportDetailsIncome',
    'profit-loss' => 'ProfitLoss',
    'balance-sheet' => 'BalanceSheet',
    'cash-book' => 'CashBook',
    
    // Tasks
    'pending-task' => 'PendingTask',
    'pending-given-tasks' => 'PendingGivenTasks',
    'pending-issued-tasks' => 'PendingIssuedTasks',
    'awaiting-given-tasks' => 'AwaitingGivenTasks',
    'awaiting-issued-tasks' => 'AwaitingIssuedTasks',
    'completed-task' => 'CompletedTask',
    
    // Announcements
    'all-announcement' => 'AllAnnouncement',
    'current-announcement' => 'CurrentAnnouncement',
    
    // Employees
    'list-of-employees' => 'ListOfEmployees',
    'list-of-teachers' => 'ListOfTeachers',
    
    // Students
    'list-of-inactive-students' => 'ListOfInactiveStudents',
    'list-of-inactive-teachers' => 'ListOfInactiveTeachers',
    
    // Accounts
    'list-of-account-head' => 'ListOfAccountHead',
    'list-of-voucher' => 'ListOfVoucher',
    'list-of-fee-packages' => 'ListOfFeePackages',
    
    // Schedule & Classes
    'add-schedule' => 'AddSchedule',
    'add-schedule-one' => 'AddScheduleOne',
    'add-schedule-local' => 'AddScheduleLocal',
    'history_course' => 'HistoryCourse',
    'history-details' => 'HistoryDetails',
    'create_daily_classes' => 'CreateDailyClasses',
    
    // Invoice & Payments
    'invoice-details' => 'InvoiceDetails',
    'invoice-received' => 'InvoiceReceived',
    'invoice-adjusted' => 'InvoiceAdjusted',
    'create-monthly-invoice' => 'CreateMonthlyInvoice',
    'create-recurring-invoice' => 'CreateRecurringInvoice',
    
    // Salary & Employee
    'monthly-salary-record' => 'MonthlySalaryRecord',
    'monthly-salary-details' => 'MonthlySalaryDetails',
    'generate-salary' => 'GenerateSalary',
    'teacher-salary-record' => 'TeacherSalaryRecord',
    
    // Student Management
    'add-student-account' => 'AddStudentAccount',
    'edit-student-account' => 'EditStudentAccount',
    'add-parent-account' => 'AddParentAccount',
    'edit-parent-account' => 'EditParentAccount',
    'parent-accounts-profile' => 'ParentAccountsProfile',
    'parent-accounts-student' => 'ParentAccountsStudent',
    
    // Teacher Management
    'add-teacher-account' => 'AddTeacherAccount',
    'edit-teacher-account' => 'EditTeacherAccount',
    'teacher-performance' => 'TeacherPerformance',
    
    // Course & Lesson
    'add-new-course' => 'AddNewCourse',
    'edit-course' => 'EditCourse',
    'add-new-lesson' => 'AddNewLesson',
    'edit-lesson' => 'EditLesson',
    'course-material' => 'CourseMaterial',
    
    // Entry & Accounting
    'add-account-entry' => 'AddAccountEntry',
    'edit-account-entry' => 'EditAccountEntry',
    'entry-details' => 'EntryDetails',
    'add-voucher' => 'AddVoucher',
    'edit-voucher' => 'EditVoucher',
    
    // Test & Results
    'add-test' => 'AddTest',
    'enter_test_results' => 'EnterTestResults',
    'test_today' => 'TestToday',
    
    // Complaint & Notes
    'complaint-pending' => 'ComplaintPending',
    'complaint-completed' => 'ComplaintCompleted',
    'pending-notes' => 'PendingNotes',
    'one-note' => 'OneNote',
    
    // Settings & Configuration
    'list-of-country' => 'ListOfCountry',
    'add-country' => 'AddCountry',
    'edit-country' => 'EditCountry',
    'list-of-country-timezone' => 'ListOfCountryTimezone',
    'add-timezone' => 'AddTimezone',
    'edit-timezone' => 'EditTimezone',
    'banners' => 'Banners',
    
    // Reports & Analytics
    'sign-ups-report' => 'SignUpsReport',
    'date-sign-ups' => 'DateSignUps',
    'revenue-expense-report' => 'RevenueExpenseReport',
    'entry-details-cash' => 'EntryDetailsCash',
    'entry-details-year' => 'EntryDetailsYear',
    
    // Allocate & Manage
    'allocate-csr' => 'AllocateCsr',
    'change-teacher' => 'ChangeTeacher',
    'change-schedule' => 'ChangeSchedule',
    'change-trial-date' => 'ChangeTrialDate',
    
    // Rights & Permissions
    'accounts_rights' => 'AccountsRights',
    'billing_rights' => 'BillingRights',
    'csr_rights' => 'CsrRights',
    'manager_rights' => 'ManagerRights',
    'monitor_rights' => 'MonitorRights',
    'teacher_rights' => 'TeacherRights',
];

echo "Batch Migration Script\n";
echo "=====================\n\n";

// Template for controller
$controllerTemplate = <<<'PHP'
<?php
/**
 * {CONTROLLER_NAME} Controller
 * Migrated from {FILE_NAME}.php
 */
class {CONTROLLER_CLASS} extends Controller {
    
    public function index() {
        // Date configuration
        date_default_timezone_set("Africa/Cairo");
        
        // Register helper functions if needed
        $this->registerHelperFunctions();
        
        // Prepare data for view
        $data = [];
        
        // Render using legacy header for compatibility
        $this->renderLegacyView('admin/{FILE_NAME}', $data);
    }
    
    /**
     * Register helper functions globally for view compatibility
     */
    private function registerHelperFunctions() {
        // Add helper functions here if needed
    }
    
    /**
     * Render view using legacy header/footer system
     */
    private function renderLegacyView($viewName, $data = []) {
        extract($data);
        
        // Change to admin directory context for relative paths in header-main.php
        $originalDir = getcwd();
        $adminDir = __DIR__ . '/../../admin';
        
        // Include legacy header
        if (file_exists($adminDir . '/header-main.php')) {
            if (is_dir($adminDir)) {
                chdir($adminDir);
            }
            include($adminDir . '/header-main.php');
            if ($originalDir) {
                chdir($originalDir);
            }
        }
        
        // Include the actual view content
        $viewFile = __DIR__ . '/../../admin/' . str_replace('admin/', '', $viewName) . '.php';
        if (file_exists($viewFile)) {
            if (is_dir($adminDir)) {
                chdir($adminDir);
            }
            extract($data);
            include($viewFile);
            if ($originalDir) {
                chdir($originalDir);
            }
        } else {
            throw new Exception("View file not found: $viewFile");
        }
    }
}
PHP;

$routes = [];
$created = 0;
$skipped = 0;

foreach ($filesToMigrate as $fileName => $controllerClass) {
    $sourceFile = $adminDir . '/' . $fileName . '.php';
    $controllerFile = $controllersDir . '/' . $controllerClass . 'Controller.php';
    
    // Check if source file exists
    if (!file_exists($sourceFile)) {
        echo "⚠️  Skipping $fileName - source file not found\n";
        $skipped++;
        continue;
    }
    
    // Check if controller already exists
    if (file_exists($controllerFile)) {
        echo "⏭️  Skipping $fileName - controller already exists\n";
        $skipped++;
        continue;
    }
    
    // Generate controller
    $controllerCode = str_replace(
        ['{CONTROLLER_NAME}', '{FILE_NAME}', '{CONTROLLER_CLASS}'],
        [$controllerClass, $fileName, $controllerClass],
        $controllerTemplate
    );
    
    // Write controller file
    if (file_put_contents($controllerFile, $controllerCode)) {
        echo "✅ Created controller for $fileName -> $controllerClass\n";
        $routes[] = "// {$controllerClass} route\n\$router->get('/{$fileName}', '{$controllerClass}@index');\n";
        $created++;
    } else {
        echo "❌ Failed to create controller for $fileName\n";
    }
}

echo "\n";
echo "Migration Summary:\n";
echo "==================\n";
echo "Created: $created controllers\n";
echo "Skipped: $skipped files\n\n";

if (!empty($routes)) {
    echo "Add these routes to index.php:\n";
    echo "===============================\n";
    foreach ($routes as $route) {
        echo $route;
    }
}

echo "\nDone!\n";

