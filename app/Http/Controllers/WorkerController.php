<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function WorkerDashboard()
    {
        $pageTitle = 'Dashboard';

        return view("worker.worker-dashboard", compact('pageTitle'));
    }

    public function WorkerProfile()
    {
        $pageTitle = 'Settings';

        return view("worker.worker-profile", compact('pageTitle'));
    }

    public function WorkerChatify()
    {
        $pageTitle = 'Chatify';

        return view("worker.chatify", compact('pageTitle'));
    }

    public function hireWorker(Request $request)
    {
        // Logic for hiring the worker goes here
        // You can access the worker ID using $request->route('worker')

        // For demonstration purposes, let's redirect back to the worker's profile
        return view('worker.hiring-form');
    }
}
