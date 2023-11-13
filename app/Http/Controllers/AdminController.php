<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function AdminDashboard(){
        $activityLogs = ActivityLog::all();
        $jobSeekersCount = User::where('role', 'worker')->where('is_verified', 1)->count();
        $employersCount = User::where('role', 'user')->where('is_verified', 1)->count();
        $allUsersCount = User::count();
        
        return view('admin.admin-dashboard', compact('activityLogs', 'jobSeekersCount', 'employersCount', 'allUsersCount'));
    }

    public function AdminJobSeeker(){
        $workers = User::where('role', 'worker')
                    ->where('is_verified', 1)
                    ->get();

        return view('admin.admin-jobSeeker', compact('workers'));
    }

    public function AdminEmployer(){
        return view("admin.admin-employer");
    }

    public function AdminDocument(){
        return view("admin.admin-document");
    }

    public function AdminInbox(){
        return view("admin.admin-inbox");
    }

    public function AdminAuditTrail(){
        $activityLogs = ActivityLog::all();
        return view('admin.admin-auditTrail', compact('activityLogs'));
    }

    public function AdminSettings(){
        return view("admin.admin-settings");
    }
}
