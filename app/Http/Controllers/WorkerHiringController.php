<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
            return redirect()->route('worker.dashboard')->with('error', 'HiringForm not found.');
        }
    }

    public function startWorking($id)
    {
        // Find the HiringForm by ID
        $hiringForm = HiringForm::find($id);

        if ($hiringForm) {
            // Update the status to 'Ongoing'
            $hiringForm->update(['status' => 'Ongoing']);

            // Redirect back or to another page as needed
            return redirect()->back()->with('success', 'Started working successfully!');
        }

        // Handle the case where the HiringForm record with the given ID doesn't exist.
        return redirect()->route('worker.dashboard')->with('error', 'HiringForm not found.');
    }

    public function uploadDocumentation(Request $request, $id)
    {
        // Validate the form data, including the job description and images
        $request->validate([
            'jobDescription' => 'required|string|max:255',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle Image 1
        $path1 = $request->file('image1')->store('documentation');
        $path2 = $request->file('image2')->store('documentation');
        $path3 = $request->file('image3')->store('documentation');

        // Find the HiringForm by ID
        $hiringForm = HiringForm::find($id);

        if ($hiringForm) {
            // Update the status to 'Finished' or another appropriate status
            $hiringForm->update(['status' => 'Finished']);

            // Find the Employment record with the same hiring_form_id
            $employment = Employment::where('hiring_form_id', $hiringForm->id)->first();

            if ($employment) {
                // Update the existing Employment record with job description, current dates, and image paths
                $employment->update([
                    'job_description' => $request->input('jobDescription'),
                    'start_date' => Carbon::now(),
                    'end_date' => Carbon::now(),
                    'image1' => $path1,
                    'image2' => $path2,
                    'image3' => $path3,
                    // Repeat the process for Image 2 and Image 3
                ]);
            } else {
                // Handle the case where the Employment record with the given hiring_form_id doesn't exist.
                return redirect()->route('some.redirect.route')->with('error', 'Employment record not found.');
            }

            // Redirect back or to another page as needed
            return redirect()->back()->with('success', 'Finished working successfully!');
        }

        // Handle the case where the HiringForm record with the given ID doesn't exist.
        return redirect()->route('some.redirect.route')->with('error', 'HiringForm not found.');
    }


}
