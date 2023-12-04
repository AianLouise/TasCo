<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use App\Models\Employment;
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

    public function updateStatus(Request $request, $id)
    {
        $hiringForm = HiringForm::find($id);

        if ($hiringForm) {
            // Update the hiring form status
            $hiringForm->status = 'Accepted'; // You might want to set a default status here
            $hiringForm->save();

            // Create a new employment record with the associated hiring_form_id
            Employment::create([
                'hiring_form_id' => $hiringForm->id,
                // Other columns in the employment table
            ]);

            // Create a new event record with the associated hiring_form_id, employer_id, and worker_id
            Event::create([
                'hiring_form_id' => $hiringForm->id,
                'title' => $hiringForm->projectTitle,
                'start' => $hiringForm->startDate,
                'end' => $hiringForm->endDate,
                'employer_id' => $hiringForm->employer_id,
                'worker_id' => $hiringForm->worker_id,
                'user_id' => Auth::user()->id,
            ]);

            return redirect()->back()->with('success', 'Status updated successfully');
        }

        return redirect()->back()->with('error', 'Hiring form not found');
    }


    public function WorkView($HiringForm_id)
    {
        // Assuming your hiring_forms table has an 'id' column and you want to find the row based on the ID.
        $hiringForm = HiringForm::find($HiringForm_id);

        // Check if the HiringForm record exists before trying to access its attributes.
        if ($hiringForm) {
            // Retrieve the employer_id from the HiringForm
            $employer_id = $hiringForm->employer_id;
            // dd($employer_id);
            // Use the employer_id to find the corresponding user in the users table
            $user = User::find($employer_id);

            return view('worker.work-view', compact('hiringForm', 'user', 'employer_id'));
        } else {
            // Handle the case where the HiringForm record with the given ID doesn't exist.
            return redirect()->route('some.redirect.route');
        }
    }
}
