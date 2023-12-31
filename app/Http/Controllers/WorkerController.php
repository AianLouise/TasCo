<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Worker;
use App\Models\Category;
use App\Models\HiringForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkerController extends Controller
{
    public function WorkerDashboard()
    {
        $pageTitle = 'Dashboard';
    
        // Get the authenticated user
        $worker = auth()->user();
    
        // Retrieve hiring forms where the worker_id matches the authenticated user's ID
        $hiringForms = HiringForm::where('worker_id', $worker->id)->get();
    
        // Retrieve all events with matching worker_id and hiring_form_id
        $events = Event::with('employer')->whereIn('hiring_form_id', $hiringForms->pluck('id'))->where('worker_id', $worker->id)->get();
    
        $employerUsers = User::where('role', 'user')->get();
        $categories = Category::all();
    
        return view("worker.worker-dashboard", compact('pageTitle', 'hiringForms', 'employerUsers', 'categories', 'events'));
    }
    



    public function WorkerProfile()
    {
        $pageTitle = 'Profile';

        return view("worker.worker-profile", compact('pageTitle'));
    }

    public function WorkerChatify()
    {
        $pageTitle = 'Chatify';

        return view("worker.chatify", compact('pageTitle'));
    }

}
