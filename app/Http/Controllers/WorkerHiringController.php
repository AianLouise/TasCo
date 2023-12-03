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
            'projectTitle' => 'required|string|max:255',
            'projectDescription' => 'required|string',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate',
            'scopeOfWork' => 'required|string',
            'totalPayment' => 'required|numeric',
            'paymentFrequency' => 'required|in:hourly,perMilestone',
            'paymentMethod' => 'required|in:bankTransfer,cash',
        ]);

        $hiringForm = new HiringForm($validatedData);
        $hiringForm->employer_id = auth()->id();
        $hiringForm->worker_id = $worker->id;
        $hiringForm->projectTitle = $request->projectTitle;
        $hiringForm->projectDescription = $request->projectDescription;
        $hiringForm->startDate = $request->startDate;
        $hiringForm->endDate = $request->endDate;
        $hiringForm->scopeOfWork = $request->scopeOfWork;
        $hiringForm->totalPayment = $request->totalPayment;
        $hiringForm->paymentFrequency = $request->paymentFrequency;
        $hiringForm->paymentMethod = $request->paymentMethod;
        $hiringForm->status = 'Pending';
        $hiringForm->save();

        // Redirect back to the worker's profile
        return redirect()->route('app.workerprofile', ['worker' => $worker->id])->with('success', 'Form submitted successfully');
    }
}
