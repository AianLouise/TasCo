<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use App\Models\SosAlert;
use App\Models\HiringForm;
use Illuminate\Http\Request;
use App\Mail\NewSOSAlertMail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\CustomerServiceMessage;
use Illuminate\Support\Facades\Validator;
use App\Notifications\HiringFormCompletedPending;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $pageTitle = 'Profile';

        return view("user.user-profile", compact('user', 'pageTitle'));
    }

    public function UserDashboard()
    {
        // Get the authenticated user
        $employer = auth()->user();
    
        // Retrieve hiring forms where the employer_id matches the authenticated user's ID
        $hiringForms = HiringForm::where('employer_id', $employer->id)->get();
    
        // Retrieve events associated with the hiring forms, including the employer relationship
        $events = Event::with('employer')->whereIn('hiring_form_id', $hiringForms->pluck('id'))->get();
    
        $workerUsers = User::where('role', 'worker')->get();
        $categories = Category::all();
        $pageTitle = 'Dashboard';
    
        return view("user.user-dashboard", compact('hiringForms', 'workerUsers', 'categories', 'pageTitle', 'events'));
    }    

    public function Sort(Request $request)
    {
        $query = User::where('role', 'worker');

        // Category filter logic
        if ($request->has('category')) {
            $categoryId = $request->input('category');
            if ($categoryId !== 'all') {
                $query->where('category_id', $categoryId);
            }
        }

        // Search logic
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%$searchTerm%")
                    ->orWhereHas('category', function ($subQ) use ($searchTerm) {
                        $subQ->where('name', 'like', "%$searchTerm%");
                    });
            })->where('role', 'worker'); // Ensure only 'worker' role is included in the search

            // If both name and category are provided, refine the search
            if ($request->has('category') && $request->has('search')) {
                $query->whereHas('category', function ($subQ) use ($searchTerm) {
                    $subQ->where('name', 'like', "%$searchTerm%");
                });
            }
        }

        $workerUsers = $query->get();
        $categories = Category::all();

        return view('tasco.home', compact('workerUsers', 'categories'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            // Handle the case where the user is not found
            return redirect()->back()->with('error', 'User not found.');
        }

        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for the avatar as needed
        ], [
            'avatar.max' => 'The avatar file size must not exceed 2 MB.',
        ]);

        // Handle file upload for the updated avatar
        if ($request->hasFile('avatar')) {
            // Process the updated avatar file
            $avatar = $request->file('avatar');
            // Check file size before storing
            if ($avatar->getSize() > 2048 * 1024) { // 2 MB in kilobytes
                return redirect()->back()->with('messages', 'The avatar file size must not exceed 2 MB.');
            }
            $avatarName = $avatar->hashName(); // Generate a unique file name
            $avatar->storeAs('public/users-avatar', $avatarName); // Store the file with the desired path and name
            $user->avatar = $avatarName; // Save the file name in the database
        }

        // Save the updated user details
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }



    public function updateName(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ]);

        // Update the user's name
        $user = Auth::user();
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
        ]);

        // Log the activity with a specific log_name
        activity('User Informaton Updates')
            ->causedBy($user) // Set the user who caused the activity
            ->performedOn($user) // Set the user as the subject of the activity
            ->withProperties([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
            ]) // Add additional properties
            ->log('User updated their name');

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Name updated successfully');
    }

    public function updateAddress(Request $request)
    {
        // Validate the request
        $request->validate([
            'address' => 'required|string',
        ]);

        // Update the user's address
        $user = Auth::user();
        $user->update([
            'address' => $request->input('address'),
        ]);

        // Log the activity with a specific log_name
        activity('User Information Updates')
            ->causedBy($user) // Set the user who caused the activity
            ->performedOn($user) // Set the user as the subject of the activity
            ->withProperties([
                'address' => $request->input('address'),
            ]) // Add additional properties
            ->log('User updated their address');

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Address updated successfully');
    }

    public function updateEmail(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the email address temporarily
        $user = Auth::user();
        $user->temp_email = $request->input('email');
        $user->save();

        // Send verification email to the new email
        $user->sendEmailVerificationNotification();

        return redirect()->route('verification.notice')->with('status', 'A verification link has been sent to your new email.');
    }

    public function verifyEmail(Request $request, $id, $hash)
    {
        $user = User::find($id);

        if (!$user || !hash_equals($hash, sha1($user->getEmailForVerification()))) {
            return redirect('/');
        }

        // Update the email address in the database
        $user->email = $user->temp_email;
        $user->temp_email = null;
        $user->email_verified_at = now();
        $user->save();

        return redirect('/')->with('status', 'Email verified successfully.');
    }




    public function updatePhone(Request $request)
    {
        // Validate the request
        $request->validate([
            'phone' => 'required|string',
        ]);

        // Update the user's phone
        $user = Auth::user();
        $user->update([
            'phone' => $request->input('phone'),
        ]);

        // Log the activity with a specific log_name
        activity('User Information Updates')
            ->causedBy($user) // Set the user who caused the activity
            ->performedOn($user) // Set the user as the subject of the activity
            ->withProperties([
                'phone' => $request->input('phone'),
            ]) // Add additional properties
            ->log('User updated their phone number');

        return redirect()->back()->with('status', 'Phone updated successfully');
    }

    public function updatePassword(Request $request)
    {
        Log::info('Updating password...');

        $request->validate([
            'currentPassword' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
            'newPassword' => 'required|min:8|confirmed|different:currentPassword',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->newPassword);
        $user->save();

        Log::info('Password updated successfully.');

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    public function Notification(Request $request)
    {
        $user = Auth::user();
        $pageTitle = 'Notification';

        $notifications = $request->user()->notifications;

        return view("tasco.notification", compact('user', 'pageTitle', 'notifications', 'user'));
    }

    public function markAsRead(Request $request, $notificationId)
    {
        $notification = Auth::user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();

        return response()->json(['success' => true]);
    }

    public function notificationCount()
    {
        // Get the unread notifications count for the authenticated user
        $unreadNotificationsCount = Auth::user()->unreadNotifications->count();

        // Pass the variable to the view
        return view('components.user-profile', ['unreadNotificationsCount' => $unreadNotificationsCount]);
    }

    public function MarkAsCompletedUser(Request $request, $id)
    {
        $user = Auth::user();

        $hiringForm = HiringForm::find($id);

        if ($hiringForm) {
            // Update the hiring form status
            $hiringForm->status = 'Completed(Pending)'; // You might want to set a default status here
            $hiringForm->save();

            // Dispatch the notification to the user
            $jobseeker = $hiringForm->worker;
            $jobseeker->notify(new HiringFormCompletedPending($hiringForm));

            return redirect()->back()->with('success', 'Status updated successfully');
        }

        return redirect()->back()->with('error', 'Hiring form not found');
    }
    
    public function sendSOS(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'latitude' => 'required',
                'longitude' => 'required',
                'details' => 'required|string',
            ]);
    
            // Store the SOS alert in the database
            $sosAlert = SosAlert::create([
                'user_id' => auth()->id(),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'details' => $request->input('details'),
                'status' => 'emergency',
            ]);
    
            return redirect()->back()->with('success', 'SOS alert stored successfully');
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error storing SOS alert: ' . $e->getMessage());
    
            // Handle the error gracefully
            return redirect()->back()->with('error', 'An error occurred while storing the SOS alert. Please try again.');
        }
    }
    
    

}
