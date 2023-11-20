<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function WorkerDashboard(){
        return view("worker.worker-dashboard");
    }

    public function WorkerChatify(){
        return view("worker.chatify");
    }

    public function editProfile($id)
    {
        $worker = Worker::find($id);

        return view('admin.admin-editProfile', compact('worker'));
    }
}
