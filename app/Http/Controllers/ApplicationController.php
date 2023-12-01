<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function submitApplication(Request $request)
    {
        // Validate the form data (you can add more validation rules)
        $request->validate([
            'validId' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'barangayClearance' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'latestPicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Save the files and associate them with the user
        $user = auth()->user();

        // Get file names
        $validIdFileName = $request->file('validId')->storeAs('public/application_documents', 'valid_id_' . $user->id . '.' . $request->file('validId')->extension());
        $barangayClearanceFileName = $request->file('barangayClearance')->storeAs('public/application_documents', 'barangay_clearance_' . $user->id . '.' . $request->file('barangayClearance')->extension());
        $latestPictureFileName = $request->file('latestPicture')->storeAs('public/application_documents', 'latest_picture_' . $user->id . '.' . $request->file('latestPicture')->extension());

        $user->employerApplication()->create([
            'valid_id' => $validIdFileName,
            'barangay_clearance' => $barangayClearanceFileName,
            'latest_picture' => $latestPictureFileName,
        ]);

        // Redirect to the submission confirmation page
        // After successful submission
        return redirect()->route('tasco.submissionConfirmationPage');
    }

    public function submitJobSeekerApplication(Request $request)
    {
        // dd($request->input('selectedCategoryId'));

        // Validate the form data (you can add more validation rules)
        $validatedData = $request->validate([
            'resume' => 'required|mimes:pdf,jpeg,png,jpg,gif,svg|max:2048',
            'validId' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'barangayClearance' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'policeClearance' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'latestPicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'selectedCategoryId' => 'required|integer', // Add validation for category ID
        ]);

        // Save the files and associate them with the user
        $user = auth()->user();

        // Get file names
        $resumeFileName = $request->file('resume')->storeAs('public/application_documents', "job_resume_{$user->id}.{$request->file('resume')->extension()}");
        $validIdFileName = $request->file('validId')->storeAs('public/application_documents', "job_valid_id_{$user->id}.{$request->file('validId')->extension()}");
        $barangayClearanceFileName = $request->file('barangayClearance')->storeAs('public/application_documents', "job_barangay_clearance_{$user->id}.{$request->file('barangayClearance')->extension()}");
        $policeClearanceFileName = $request->file('policeClearance')->storeAs('public/application_documents', "job_police_clearance_{$user->id}.{$request->file('policeClearance')->extension()}");
        $latestPictureFileName = $request->file('latestPicture')->storeAs('public/application_documents', "job_latest_picture_{$user->id}.{$request->file('latestPicture')->extension()}");

        // Save the application data to the database
        $application = $user->jobseekerApplication()->create([
            'resume' => $resumeFileName,
            'valid_id' => $validIdFileName,
            'barangay_clearance' => $barangayClearanceFileName,
            'police_clearance' => $policeClearanceFileName,
            'latest_picture' => $latestPictureFileName,
        ]);

        // Associate the category with the application
        $application->category()->associate($request->input('selectedCategoryId'));
        $application->save();

        // Redirect to the submission confirmation page
        return redirect()->route('tasco.submissionConfirmationPage');
    }

    public function showSubmissionConfirmationPage()
    {
        // Add any necessary logic for displaying the submission confirmation page
        return view('tasco.submissionConfirmationPage');
    }


}
