<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\HiringForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorkerHiringController extends Controller
{
    public function hireWorker(Request $request)
    {
        // Retrieve worker details using the worker ID from the route
        $userId = $request->route('worker');
        $user = User::find($userId);

        // Assuming you also want to retrieve the category
        $category = Category::find($user->category_id);

        // For demonstration purposes, let's redirect back to the worker's profile
        $pageTitle = 'Hire Worker';
        return view('worker.hiring-form', compact('pageTitle', 'user', 'category'));
    }

    public function submitHiringForm(Request $request, User $worker)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'subject' => 'required',
            'description' => 'required',
        ]);

        $hiringForm = new HiringForm;
        $hiringForm->worker_id = $worker->id;
        $hiringForm->employer_id = Auth::user()->id;
        $hiringForm->date = $validatedData['date'];
        $hiringForm->time = $validatedData['time'];
        $hiringForm->subject = $validatedData['subject'];
        $hiringForm->description = $validatedData['description'];
        $hiringForm->status = 'pending'; // Add this line
        $hiringForm->save();

        // Redirect back to the worker's profile
        return redirect()->route('app.workerprofile', ['worker' => $worker->id])->with('success', 'Form submitted successfully');
    }
}
