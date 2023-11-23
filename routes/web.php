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
require __DIR__.'/auth.php';

// Admin Routes (Requires Authentication and Admin Role)
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Admin Dashboard and Related Routes
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/view-all-users', [AdminController::class, 'AdminViewAllUsers'])->name('admin.viewAllUsers');
    Route::get('/admin/chatify', [AdminController::class, 'AdminChatify'])->name('admin.chatify');
    Route::get('/admin/jobSeeker', [AdminController::class, 'AdminJobSeeker'])->name('admin.jobSeeker');
    Route::get('/admin/chatify', [AdminController::class, 'AdminChatify'])->name('admin.chatify');
    Route::get('/admin/employer', [AdminController::class, 'AdminEmployer'])->name('admin.employer');
    Route::get('/admin/add-profile', [AdminController::class, 'AdminAddProfile'])->name('admin.addProfile');
    Route::post('/create-user', [AdminController::class, 'createUser'])->name('admin.createUser');
    Route::get('/admin/edit-profile/{id}', [AdminController::class, 'AdminEditProfile'])->name('admin.editProfile');
    Route::put('/update-profile/{id}', [AdminController::class, 'updateProfile'])->name('update.profile');
    Route::delete('/admin/deleteProfile/{id}', [AdminController::class, 'deleteProfile'])->name('admin.deleteProfile');
    Route::get('/admin/services', [AdminController::class, 'AdminServices'])->name('admin.services');
    Route::get('/admin/application', [AdminController::class, 'AdminApplication'])->name('admin.application');
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
    Route::get('/about-us', [AppController::class, 'AboutUs'])->name('app.aboutUs');
    Route::get('/apply-as-jobseeker', [AppController::class, 'ApplyJobseeker'])->name('app.applyJobseeker');
    Route::get('/apply-as-employer', [AppController::class, 'ApplyEmployer'])->name('app.applyEmployer');
    Route::get('/job-listing', [AppController::class, 'JobListing'])->name('app.jobListing');
    Route::get('/settings', [AppController::class, 'Settings'])->name('app.settings');
    Route::get('/customer-service', [AppController::class, 'CustomerService'])->name('app.customerService');
    Route::post('/email-sent', [AppController::class, 'storeCustomerServiceMessage'])->name('app.EmailSent');
    Route::get('/activity-logs', [AppController::class, 'ActivityLog'])->name('app.activitylog');
    Route::get('/terms', [AppController::class, 'Terms'])->name('app.terms');
    Route::get('/guidelines', [AppController::class, 'Guidelines'])->name('app.guidelines');
    Route::get('/messenger', [AppController::class, 'Chatify'])->name('app.chatify');
});

// Worker Routes (Requires Authentication and Worker Role)
Route::middleware(['auth', 'role:worker'])->group(function () {
    // Worker Dashboard and Related Routes
    Route::get('/worker/dashboard', [WorkerController::class, 'WorkerDashboard'])->name('worker.dashboard');
    Route::get('/worker/chatify', [WorkerController::class, 'WorkerChatify'])->name('worker.chatify');
    // Other Worker Routes...
});

// User Routes (Requires Authentication and User Role)
Route::middleware(['auth', 'role:user'])->group(function () {
    // User Dashboard and Related Routes
    Route::get('/user-dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
    Route::get('/home/sort', [UserController::class, 'Sort'])->name('workers.sort');
});
