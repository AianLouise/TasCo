<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view("admin.admin-dashboard");
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
        return view("admin.admin-auditTrail");
    }

    public function AdminSettings(){
        return view("admin.admin-settings");
    }
}
