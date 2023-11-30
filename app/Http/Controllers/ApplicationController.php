<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $validIdFileName = $request->file('validId')->storeAs('application_documents', 'valid_id_' . $user->id . '.' . $request->file('validId')->extension());
        $barangayClearanceFileName = $request->file('barangayClearance')->storeAs('application_documents', 'barangay_clearance_' . $user->id . '.' . $request->file('barangayClearance')->extension());
        $latestPictureFileName = $request->file('latestPicture')->storeAs('application_documents', 'latest_picture_' . $user->id . '.' . $request->file('latestPicture')->extension());

        // Debug statements
        // dd([
        //     'User ID' => $user->id,
        //     'Valid ID File Name' => $validIdFileName,
        //     'Barangay Clearance File Name' => $barangayClearanceFileName,
        //     'Latest Picture File Name' => $latestPictureFileName,
        // ]);

        $user->employerApplication()->create([
            'valid_id' => $validIdFileName,
            'barangay_clearance' => $barangayClearanceFileName,
            'latest_picture' => $latestPictureFileName,
        ]);

        // You can add more logic, such as sending an email notification or redirecting to a confirmation page
        return back()->with('success', 'Application submitted successfully');
    }

}
