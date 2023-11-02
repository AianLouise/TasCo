<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function WorkerDashboard(){
        return view("worker.worker-dashboard");
    }
}
