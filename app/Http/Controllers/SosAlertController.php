<?php

namespace App\Http\Controllers;

use App\Models\SosAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SosAlertController extends Controller
{
    public function sendSOS(Request $request)
    {
        // Validate and store the SOS alert in the database
        $sosAlert = new SosAlert([
            'user_id' => auth()->id(), // Adjust this based on your authentication logic
            'location' => $request->input('location'),
            'details' => $request->input('details'),
            // Add any other fields as needed
        ]);

        $sosAlert->save();

        return response()->json(['message' => 'SOS alert stored successfully']);
    }
}
