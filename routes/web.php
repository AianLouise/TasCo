<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\ChatifyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\WorkerHiringController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Welcome Route
Route::get('/', function () {
    return view('welcome');
});

// Named Welcome Route
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Profile Routes (Requires Authentication)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes
require __DIR__ . '/auth.php';

// Admin Routes (Requires Authentication and Admin Role)
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Admin Dashboard and Related Routes
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/view-all-users', [AdminController::class, 'AdminViewAllUsers'])->name('admin.viewAllUsers');
    Route::get('/admin/chatify', [AdminController::class, 'AdminChatify'])->name('admin.chatify');
    Route::get('/admin/jobSeeker', [AdminController::class, 'AdminJobSeeker'])->name('admin.jobSeeker');
    Route::get('/admin/employer', [AdminController::class, 'AdminEmployer'])->name('admin.employer');
    Route::get('/admin/add-profile', [AdminController::class, 'AdminAddProfile'])->name('admin.addProfile');
    Route::post('/create-user', [AdminController::class, 'createUser'])->name('admin.createUser');
    Route::get('/admin/edit-profile/{id}', [AdminController::class, 'AdminEditProfile'])->name('admin.editProfile');
    Route::delete('/admin/deleteProfile/{id}', [AdminController::class, 'deleteProfile'])->name('admin.deleteProfile');
    Route::get('/admin/employment', [AdminController::class, 'AdminEmployment'])->name('admin.employment');
    Route::get('/admin/emergency-assistance', [AdminController::class, 'AdminEmergency'])->name('admin.emergency');
    Route::get('/admin/hiring-application', [AdminController::class, 'AdminHiringApplication'])->name('admin.hiringApplication');
    Route::get('/admin/hiring-application/{id}', [AdminController::class, 'AdminHiringApplicationView'])->name('admin.hiringApplicationView');

    Route::get('/admin/application', [AdminController::class, 'AdminApplication'])->name('admin.application');
    Route::get('/admin/application/{id}', [AdminController::class, 'AdminApplicationEmployerDetails'])->name('admin.employerapplication');
    Route::get('/admin/jobseeker-application/{id}', [AdminController::class, 'AdminApplicationJobseekerDetails'])->name('admin.jobseekerapplication');
    Route::get('/updateIsVerified/{user_id}/{id}', [AdminController::class, 'updateIsVerified'])->name('updateIsVerified');
    Route::get('/updateIsVerifiedjob/{user_id}/{id}', [AdminController::class, 'updateIsVerifiedJobSeeker'])->name('updateIsVerifiedJobSeeker');
    Route::get('/updateIsRejected/{user_id}/{id}', [AdminController::class, 'updateIsRejected'])->name('updateIsRejected');
    Route::get('/updateIsRejectedjob/{user_id}/{id}', [AdminController::class, 'updateIsRejectedJobSeeker'])->name('updateIsRejectedJobSeeker');

    Route::get('/admin/inbox', [AdminController::class, 'AdminInbox'])->name('admin.inbox');
    Route::get('/inbox/{user}/view', [AdminController::class, 'showEmailView'])->name('admin.showEmailView');
    Route::post('/admin/reply-email/{emailId}', [AdminController::class, 'replyEmail'])->name('admin.replyEmail');
    Route::delete('/admin/delete-email/{emailId}', [AdminController::class, 'deleteEmail'])->name('admin.deleteEmail');
    Route::get('/admin/auditTrail', [AdminController::class, 'AdminAuditTrail'])->name('admin.auditTrail');
    Route::get('/admin/settings', [AdminController::class, 'AdminSettings'])->name('admin.settings');
});

// Worker Routes (Requires Authentication and Worker Role)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [AppController::class, 'Home'])->name('app.home');
    Route::get('/notification', [UserController::class, 'Notification'])->name('app.notifications');
    Route::post('/mark-as-read/{notification}', [UserController::class, 'MarkAsRead'])->name('markAsRead');
    Route::get('/about-us', [AppController::class, 'AboutUs'])->name('app.aboutUs');
    Route::get('/apply-as-jobseeker', [AppController::class, 'applyJobseeker'])->name('app.applyJobseeker');
    Route::get('/apply-as-employer', [AppController::class, 'applyEmployer'])->name('app.applyEmployer');
    Route::get('/job-listing', [AppController::class, 'JobListing'])->name('app.jobListing');
    Route::get('/settings', [AppController::class, 'Settings'])->name('app.settings');
    Route::get('/learn-more', [AppController::class, 'LearnMore'])->name('app.learnMore');
    Route::get('/tasco-calendar', [AppController::class, 'Calendar'])->name('app.Calendar');
    Route::get('/tasco-services', [AppController::class, 'Services'])->name('app.Services');
    Route::get('/tasco-customer-service', [AppController::class, 'CustomerService'])->name('app.customerService');
    Route::get('/home/sort', [UserController::class, 'Sort'])->name('workers.sort');

    Route::post('/email-sent', [AppController::class, 'storeCustomerServiceMessage'])->name('app.EmailSent');
    Route::get('/activity-logs', [AppController::class, 'ActivityLog'])->name('app.activitylog');
    Route::get('/terms', [AppController::class, 'Terms'])->name('app.terms');
    Route::get('/guidelines', [AppController::class, 'Guidelines'])->name('app.guidelines');

    Route::get('/chatify', [AppController::class, 'Chatify'])->name('app.chatify');
    Route::get('/chatify/{user_id}', [AppController::class, 'openChat'])->name('user.chatify');

    Route::get('/worker/profile/{worker}', [AppController::class, 'showProfile'])->name('app.workerprofile');
    Route::get('/worker/employments/{worker}', [AppController::class, 'workerEmployments'])->name('app.employments');

    Route::post('/update-profile/{id}', [UserController::class, 'updateProfile'])->name('update.profile');
    Route::post('/update-name', [UserController::class, 'updateName'])->name('update.name');
    Route::post('/update-address', [UserController::class, 'updateAddress'])->name('update.address');
    Route::post('/update-email', [UserController::class, 'updateEmail'])->name('update.email');
    Route::post('/update-phone', [UserController::class, 'updatePhone'])->name('update.phone');
    Route::post('/update-password', [UserController::class, 'updatePassword'])->name('update.password');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/hiring-form/{worker}', [WorkerHiringController::class, 'hireWorker'])->name('worker.hire');
    Route::post('/submit-hiring-form/{worker}', [WorkerHiringController::class, 'submitHiringForm'])->name('submit.hiring.form');

    Route::post('/employer-submit-application', [ApplicationController::class, 'submitApplication'])->name('submit.application');
    Route::post('/jobseeker-submit-application', [ApplicationController::class, 'submitJobSeekerApplication'])->name('submit.jobseekerapplication');
    Route::get('/submission-confirmation', [ApplicationController::class, 'showSubmissionConfirmationPage'])
        ->name('tasco.submissionConfirmationPage');

    Route::post('/sendSOS', [UserController::class, 'sendSOS'])->name('tasco.sendSOS');
});

// Worker Routes (Requires Authentication and Worker Role)
Route::middleware(['auth', 'role:worker'])->group(function () {
    // Worker Dashboard and Related Routes
    Route::get('/worker-dashboard', [WorkerController::class, 'WorkerDashboard'])->name('worker.dashboard');
    Route::get('/worker/profile', [WorkerController::class, 'WorkerProfile'])->name('worker.profile');
    Route::get('/worker/chatify', [WorkerController::class, 'WorkerChatify'])->name('worker.chatify');
    Route::get('/accept-status/{id}', [WorkerHiringController::class, 'acceptStatus'])->name('acceptStatus');
    Route::get('/reject-status/{id}', [WorkerHiringController::class, 'rejectStatus'])->name('rejectStatus');
    Route::get('/work/{HiringForm_id}', [WorkerHiringController::class, 'WorkView'])->name('work.view');
    Route::get('/start-working/{hiringFormId}/{eventId}', [WorkerHiringController::class, 'startWorking'])->name('startWorking');
    Route::post('/upload-documentation/{id}/{eventId}', [WorkerHiringController::class, 'uploadDocumentation'])->name('uploadDocumentation');
    Route::get('/mark-as-completed-worker/{id}', [WorkerHiringController::class, 'MarkAsCompletedWorker'])->name('worker.MarkAsCompleted');
});

// User Routes (Requires Authentication and User Role)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
});

Route::middleware(['auth', 'role:user', 'is_verified:1'])->group(function () {
    // User Dashboard and Related Routes
    Route::get('/employer-dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
    Route::get('/mark-as-completed/{id}', [UserController::class, 'MarkAsCompletedUser'])->name('user.MarkAsCompleted');
});

Route::middleware(['auth', 'is_verified:1'])->group(function () {
    Route::get('/work/{HiringForm_id}', [WorkerHiringController::class, 'WorkView'])->name('work.view');
});



Route::controller(FullCalenderController::class)->group(function () {
    Route::get('fullcalender', 'index');
    Route::post('fullcalenderAjax', 'ajax');
});