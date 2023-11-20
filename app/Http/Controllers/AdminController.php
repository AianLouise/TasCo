<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Category;
use App\Models\ActivityLog;
use App\Models\ServicesLog;
use Illuminate\Http\Request;
use Symfony\Component\Mime\Email;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\CustomerServiceMessage;
use Illuminate\Support\Facades\Password;

class AdminController extends Controller
{
    // Dashboard view for the admin
    public function AdminDashboard()
    {
        // Retrieve necessary data for the admin dashboard
        $activityLogs = ActivityLog::all();
        $jobSeekersCount = User::where('role', 'worker')->where('is_verified', 1)->count();
        $employersCount = User::where('role', 'user')->where('is_verified', 1)->count();
        $allUsersCount = User::count();

        $workers = User::where('role', 'worker')
            ->where('is_verified', 1)
            ->get();

        $employers = User::where('role', 'user')
            ->where('is_verified', 1)
            ->get();

        // Pass data to the admin-dashboard view
        return view('admin.admin-dashboard', compact('activityLogs', 'jobSeekersCount', 'employersCount', 'allUsersCount', 'workers', 'employers'));
    }

    // Chatify view for the admin
    public function AdminChatify()
    {
        return view('admin.admin-chatify');
    }

    // View to display all users for the admin
    public function AdminViewAllUsers()
    {
        $users = User::all();
        return view('admin.admin-viewAllUsers', compact('users'));
    }

    // View to display job seekers for the admin
    public function AdminJobSeeker()
    {
        $workers = User::where('role', 'worker')
            ->where('is_verified', 1)
            ->get();

        return view('admin.admin-jobSeeker', compact('workers'));
    }

    // View to display employers for the admin
    public function AdminEmployer()
    {
        $employers = User::where('role', 'user')
            ->where('is_verified', 1)
            ->get();

        return view("admin.admin-employer", compact("employers"));
    }

    // View to add a new profile for the admin
    public function AdminAddProfile()
    {
        $categories = Category::all();
        return view('admin.admin-addProfile', compact('categories'));
    }

    // Create a new user based on the admin's input
    public function createUser(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:admin,worker,user',
        ], [
            'avatar.max' => 'The avatar file size must not exceed 2 MB.',
            'email.unique' => 'The email has already been taken.',
        ]);

        // Create a new user instance
        $user = new User;
        $user->first_name = $request->fname;
        $user->last_name = $request->lname;
        $user->name = $request->fname . ' ' . $request->lname;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->category_id = $request->category;
        $user->is_verified = $request->verified;

        // Handle file upload for the user's avatar
        if ($request->hasFile('avatar')) {
            // Process the uploaded avatar file
            $avatar = $request->file('avatar');
            // Check file size before storing
            if ($avatar->getSize() > 2048 * 1024) { // 2 MB in kilobytes
                return redirect()->back()->with('messages', 'The avatar file size must not exceed 2 MB.');
            }
            $avatarName = $avatar->hashName(); // Generate a unique file name
            $avatar->storeAs('public/users-avatar', $avatarName); // Store the file with the desired path and name
            $user->avatar = $avatarName; // Save the file name in the database
        }

        // Save the user instance to the database
        $user->save();

        // Retrieve all users and pass them to the admin-viewAllUsers view
        $users = User::all();
        return view('admin.admin-viewAllUsers', compact('users'));
    }

    // View to edit a user profile for the admin
    public function AdminEditProfile($id)
    {
        $categories = Category::all();
        $user = User::find($id);

        return view('admin.admin-editProfile', ['user' => $user, 'categories' => $categories]);
    }

    // Delete a user profile based on the provided user ID
    public function deleteProfile($id)
    {
        $user = User::findOrFail($id);

        // Additional checks if needed before deleting

        // Delete the user profile
        $user->delete();

        return redirect()->route('admin.jobSeeker')->with('success', 'Profile deleted successfully');
    }

    // Update a user profile based on the provided user ID and input data
    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);

        // Validate other form fields as needed
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string|in:admin,worker,user',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for the avatar as needed
        ], [
            'avatar.max' => 'The avatar file size must not exceed 2 MB.',
            'email.unique' => 'The email has already been taken.',
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

        // Update other user details
        $user->first_name = $request->input('fname');
        $user->last_name = $request->input('lname');
        $user->name = $request->fname . ' ' . $request->lname;
        $user->address = $request->input('address');
        $user->email = $request->input('email');
        $user->role = $request->role;
        $user->category_id = $request->category;
        $user->is_verified = $request->verified;

        // Save the updated user details
        $user->save();

        // Retrieve all users and pass them to the admin-viewAllUsers view
        $users = User::all();
        return view('admin.admin-viewAllUsers', compact('users'));
    }

    // View to display all services for the admin
    public function AdminServices()
    {
        $services = Service::with('category')->get();

        return view('admin.admin-services', compact('services'));
    }

    // View for admin application
    public function AdminApplication()
    {
        return view("admin.admin-application");
    }

    // View to display inbox messages for the admin
    public function AdminInbox()
    {
        $messages = CustomerServiceMessage::all();

        return view("admin.admin-inbox", compact('messages'));
    }

    public function showEmailView(User $user)
    {
        return view('admin.admin-inboxMessage', compact('user'));
    }

    public function replyEmail(Request $request, $emailId)
    {
        // Find the customer service message by its ID
        $email = CustomerServiceMessage::find($emailId);
    
        // Check if the message with the given $emailId exists
        if ($email) {
            // The $email variable is not null, and it represents an existing message
            // Now you can safely call the replies() method on the message
            $email->replies()->create([
                'user_id' => Auth::id(),            // Set the user ID for the reply
                'message' => $request->input('reply_message'),  // Set the reply message content
            ]);
    
            // Redirect back with a success message after submitting the reply
            return redirect()->back()->with('success', 'Reply submitted successfully.');
        } else {
            // Handle the case where the message with the given $emailId is not found
            // For example, you can redirect the user back or display an error message
            return redirect()->back()->with('error', 'Message not found.');
        }
    }


    // View to display the audit trail for the admin
    public function AdminAuditTrail()
    {
        $activityLogs = ActivityLog::all();
        return view('admin.admin-auditTrail', compact('activityLogs'));
    }

    // View for admin settings
    public function AdminSettings()
    {
        return view("admin.admin-settings");
    }
}
