<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function AdminDashboard(){
        $activityLogs = ActivityLog::all();
        return view('admin.admin-dashboard', compact('activityLogs'));
    }

    public function AdminJobSeeker(){
        return view("admin.admin-jobSeeker");
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
