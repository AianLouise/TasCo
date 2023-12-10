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
            'paymentFrequency' => 'required|in:hourly,perDay',
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

    public function acceptStatus(Request $request, $id)
    {
        $hiringForm = HiringForm::find($id);

        if ($hiringForm) {
            // Update the hiring form status
            $hiringForm->status = 'Accepted'; // You might want to set a default status here
            $hiringForm->save();

            // Calculate the number of days between start and end dates
            $startDate = Carbon::parse($hiringForm->startDate);
            $endDate = Carbon::parse($hiringForm->endDate);
            $daysDifference = $endDate->diffInDays($startDate);

            // Create multiple events based on the days between start and end dates
            for ($i = 0; $i <= $daysDifference; $i++) {
                $eventDate = $startDate->copy()->addDays($i);

                // Create the event for the current day
                $event = Event::create([
                    'hiring_form_id' => $hiringForm->id,
                    'title' => $hiringForm->projectTitle,
                    'start' => $eventDate,
                    'end' => $eventDate, // Assuming each event is for a single day
                    'employer_id' => $hiringForm->employer_id,
                    'worker_id' => $hiringForm->worker_id,
                    'user_id' => Auth::user()->id,
                ]);

                // Create the employment with the associated event_id (ID of the Event)
                Employment::create([
                    'hiring_form_id' => $hiringForm->id,
                    'event_id' => $event->id,
                    // Other columns in the employment table
                ]);
            }

            return redirect()->back()->with('success', 'Status updated successfully');
        }

        return redirect()->back()->with('error', 'Hiring form not found');
    }

    public function rejectStatus(Request $request, $id)
    {
        $hiringForm = HiringForm::find($id);

        if ($hiringForm) {
            // Update the hiring form status
            $hiringForm->status = 'Rejected'; // You might want to set a default status here
            $hiringForm->save();

            return redirect()->back()->with('success', 'Status updated successfully');
        }

        return redirect()->back()->with('error', 'Hiring form not found');
    }

    // WorkerHiringController

    public function WorkView($event_id)
    {
        // Find the event by ID
        $event = Event::find($event_id);

        // Check if the event record exists before trying to access its attributes
        if ($event) {
            // Retrieve the hiringForm associated with the event
            $hiringForm = $event->hiringForm;

            // Retrieve the employer user associated with the hiringForm
            $user = User::find($hiringForm->employer_id);

            // Retrieve the employment associated with the event
            $employment = Employment::where('id', $event->id)->first();

            return view('worker.work-view', compact('event', 'hiringForm', 'user', 'employment'));
        } else {
            // Handle the case where the event record with the given ID doesn't exist.
            return redirect()->route('worker.dashboard')->with('error', 'Event not found.');
        }
    }



    public function startWorking($hiringFormId, $eventId)
    {
        // Find the HiringForm by ID
        $hiringForm = HiringForm::find($hiringFormId);

        if ($hiringForm) {
            // Update the status of the HiringForm to 'Ongoing'
            $hiringForm->update(['status' => 'Ongoing']);

            // Find the specific event by ID and update its status to 'Ongoing'
            $event = $hiringForm->events()->find($eventId);

            if ($event) {
                $event->update(['status' => 'Ongoing']);
                // Redirect back or to another page as needed
                return redirect()->back()->with('success', 'Started working successfully!');
            } else {
                // Handle the case where the event with the given ID doesn't exist for the specified HiringForm
                return redirect()->route('worker.dashboard')->with('error', 'Event not found for the specified HiringForm.');
            }
        }

        // Handle the case where the HiringForm record with the given ID doesn't exist.
        return redirect()->route('worker.dashboard')->with('error', 'HiringForm not found.');
    }



    public function uploadDocumentation(Request $request, $id, $eventId)
    {
        // Validate the form data, including the job description and images
        $request->validate([
            'jobDescription' => 'required|string|max:255',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle Image 1
        $path1 = $request->file('image1')->store('public/documentation');

        // Handle Image 2
        $path2 = $request->file('image2')->store('public/documentation');

        // Handle Image 3
        $path3 = $request->file('image3')->store('public/documentation');
        $path3 = str_replace('public/', '', $path3); // Adjust the path

        // Find the HiringForm by ID
        $hiringForm = HiringForm::find($id);

        if ($hiringForm) {
            // Find the Employment record with the same hiring_form_id
            $employment = Employment::where('hiring_form_id', $hiringForm->id)->first();

            // If Employment record doesn't exist, create a new one
            if (!$employment) {
                $employment = new Employment();
                $employment->hiring_form_id = $hiringForm->id;
                $employment->save();
            }

            $event = Event::find($eventId);

            if ($event) {
                // Update the existing Employment record with job description, current dates, and image paths
                $employment = Employment::where('event_id', $eventId)->first();

                if ($employment) {
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
                    // Handle the case where the Employment record with the given event_id doesn't exist.
                    return redirect()->route('worker.dashboard')->with('error', 'Employment record not found.');
                }

                // Update the status of the specific event to 'Done'
                $event->update(['status' => 'Done']);

                // Check if all events associated with the hiring form are done
                $allEventsDone = $hiringForm->events()->where('status', '<>', 'Done')->count() === 0;

                // Check if all events are done and update the status of the employment and hiring form to 'Finished'
                if ($allEventsDone) {
                    // Update the status of the employment to 'Finished'
                    // $employment->update(['status' => 'Finished']);

                    // Update the status of the hiring form to 'Finished'
                    $hiringForm->update(['status' => 'Finished']);
                }
            } else {
                // Handle the case where the event with the given ID doesn't exist
                return redirect()->route('worker.dashboard')->with('error', 'Event not found.');
            }
        } else {
            // Handle the case where the HiringForm record with the given ID doesn't exist.
            return redirect()->route('worker.dashboard')->with('error', 'HiringForm not found.');
        }

        // Redirect back to the previous page on success
        return redirect()->back()->with('success', 'Documentation uploaded successfully.');
    }

    public function MarkAsCompletedWorker(Request $request, $id)
    {
        // Find the HiringForm by ID
        $hiringForm = HiringForm::find($id);

        if ($hiringForm) {
            // Update the status of the HiringForm to 'Completed'
            $hiringForm->update(['status' => 'Completed']);

            // Redirect back or to another page as needed
            return redirect()->back()->with('success', 'Marked as completed successfully!');
        }

        // Handle the case where the HiringForm record with the given ID doesn't exist.
        return redirect()->back()->with('error', 'Hiring form not found');
    }
    
    

}
