<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view("admin.admin-dashboard");
    }

    public function AdminLog(){
        return view("admin.admin-log-history");
    }
}
