<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\ChatifyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityLogController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/view-all-users', [AdminController::class, 'AdminViewAllUsers'])->name('admin.viewAllUsers');
    Route::get('/admin/jobSeeker', [AdminController::class, 'AdminJobSeeker'])->name('admin.jobSeeker');
    Route::get('/admin/employer', [AdminController::class, 'AdminEmployer'])->name('admin.employer');
    Route::get('/admin/edit-profile/{id}', [AdminController::class, 'AdminEditProfile'])->name('admin.editProfile');
    Route::put('/update-profile/{id}', [AdminController::class, 'updateProfile'])->name('update.profile');
    Route::get('/admin/services', [AdminController::class, 'AdminServices'])->name('admin.services');
    Route::get('/admin/application', [AdminController::class, 'AdminApplication'])->name('admin.application');
    Route::get('/admin/inbox', [AdminController::class, 'AdminInbox'])->name('admin.inbox');
    Route::get('/admin/auditTrail', [AdminController::class, 'AdminAuditTrail'])->name('admin.auditTrail');
    Route::get('/admin/settings', [AdminController::class, 'AdminSettings'])->name('admin.settings');
}); //End Group Admin Middleware

Route::middleware(['auth', 'role:worker'])->group(function () {
    Route::get('/worker/dashboard', [WorkerController::class, 'WorkerDashboard'])->name('worker.dashboard');
}); //End Group Worker Middleware

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
}); //End Group User Middleware

// //Route for Chatify
Route::group(['middleware' => 'chatify'], function () {
    Route::get('Chatify', 'ChatifyController@chatify')->name('Chatify');
    // Add other Chatify routes here as needed
});


// Route::get('/edit-profile/{id}', [WorkerController::class, 'editProfile'])->name('admin.edit-profile');