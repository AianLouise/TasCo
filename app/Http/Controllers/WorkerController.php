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

    public function WorkerChatify()
    {
        $pageTitle = 'Chatify';

        return view("worker.chatify", compact('pageTitle'));
    }

}
