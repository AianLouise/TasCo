<?php

namespace App\Http\Controllers;

use App\Models\EmployerApplication;
use App\Models\HiringForm;
use App\Models\JobSeekerApplication;
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
        $messages = CustomerServiceMessage::all();

        // Fetch pending applications from both tables
        $employerApplications = EmployerApplication::where('status', 'Pending')->get();
        $jobSeekerApplications = JobSeekerApplication::where('status', 'Pending')->get();

        // Merge the collections or combine them as needed
        $pendingApplications = $employerApplications->merge($jobSeekerApplications);

        $workers = User::where('role', 'worker')
            ->where('is_verified', 1)
            ->get();

        $employers = User::where('role', 'user')
            ->where('is_verified', 1)
            ->get();

        $pageTitle = 'Admin Dashboard';
        // Pass data to the admin-dashboard view
        return view('admin.admin-dashboard', compact('activityLogs', 'jobSeekersCount', 'employersCount', 'allUsersCount', 'workers', 'employers', 'pageTitle', 'messages', 'pendingApplications'));
    }

    // Chatify view for the admin
    public function AdminChatify()
    {
        $pageTitle = 'Chatify';

        return view('admin.admin-chatify', compact('pageTitle'));
    }

    // View to display all users for the admin
    public function AdminViewAllUsers()
    {
        $users = User::all();
        $pageTitle = 'All Users';

        return view('admin.admin-viewAllUsers', compact('users', 'pageTitle'));
    }

    // View to display job seekers for the admin
    public function AdminJobSeeker()
    {
        $workers = User::where('role', 'worker')
            ->where('is_verified', 1)
            ->get();
        $pageTitle = 'All Job Seekers';
        return view('admin.admin-jobSeeker', compact('workers', 'pageTitle'));
    }

    // View to display employers for the admin
    public function AdminEmployer()
    {
        $employers = User::where('role', 'user')
            ->where('is_verified', 1)
            ->get();

        $pageTitle = 'All Employers';
        return view("admin.admin-employer", compact("employers", 'pageTitle'));
    }

    // View to add a new profile for the admin
    public function AdminAddProfile()
    {
        $categories = Category::all();
        $pageTitle = 'Add New Profile';

        return view('admin.admin-addProfile', compact('categories', 'pageTitle'));
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

        activity('Admin Created an Account')
            ->causedBy(auth()->user()) // Assuming the authenticated user is causing the activity
            ->performedOn($user) // Set the user as the subject of the activity
            ->withProperties([
                'user_id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                // ... (other relevant properties)
            ]) // Add additional properties
            ->log('User created'); // Log the activity

        // Retrieve all users and pass them to the admin-viewAllUsers view
        return redirect()->back()->with('success', 'Reply submitted successfully.');
    }

    // View to edit a user profile for the admin
    public function AdminEditProfile($id)
    {
        $categories = Category::all();
        $user = User::find($id);
        $pageTitle = 'Edit Profile';

        return view('admin.admin-editProfile', ['user' => $user, 'categories' => $categories, 'pageTitle' => $pageTitle]);
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

        // Log the activity with a specific log_name
        activity('Admin Updated a User Profile')
            ->causedBy(auth()->user()) // Assuming the authenticated user is causing the activity
            ->performedOn($user) // Set the user as the subject of the activity
            ->withProperties([
                'user_id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                // ... (other relevant properties)
            ]) // Add additional properties
            ->log('Admin updated profile information.');

        return view('admin.admin-viewAllUsers', compact('users'));
    }

    // View to display all services for the admin
    public function AdminServices()
    {
        $services = Service::with('category')->get();
        $pageTitle = 'Services';

        return view('admin.admin-services', compact('services', 'pageTitle'));
    }

    public function AdminHiringApplication()
    {
        $categories = Category::all();
        $hiringForm = HiringForm::get();
        $pageTitle = 'Services';

        return view('admin.admin-hiring-application', compact('hiringForm', 'pageTitle'));
    }

    // View for admin application
    public function AdminApplication()
    {
        $pageTitle = 'Applications';
        $employerApplications = EmployerApplication::all();
        $jobseekerApplications = JobSeekerApplication::all();

        return view("admin.admin-application", compact('pageTitle', 'employerApplications', 'jobseekerApplications'));
    }

    public function AdminApplicationEmployerDetails()
    {
        $pageTitle = 'Application Details';
        $employerApplications = EmployerApplication::all();

        return view("admin.admin-employer-application-details", compact('pageTitle', 'employerApplications'));
    }

    public function AdminApplicationJobseekerDetails()
    {
        $pageTitle = 'Application Details';
        $jobseekerApplications = JobSeekerApplication::all();

        return view("admin.admin-jobseeker-application-details", compact('pageTitle', 'jobseekerApplications'));
    }

    public function updateIsVerified(Request $request)
    {
        $userId = $request->route('user_id'); // Use route() to get the parameter

        // Update the 'is_verified' field in the users table
        // Replace 'users' with your actual table name if different
        // Also, make sure to handle validation and error checking appropriately
        User::where('id', $userId)->update(['is_verified' => 1]);

        // Update the status in the employer_applications table
        EmployerApplication::where('user_id', $userId)->update(['status' => 'Accepted']);

        // return response()->json(['message' => 'User is now verified']);
        return redirect()->route('admin.application')->with('success', 'User is now verified');
    }

    public function updateIsRejected(Request $request)
    {
        $userId = $request->route('user_id'); // Use route() to get the parameter

        // Update the status in the employer_applications table to 'Rejected'
        EmployerApplication::where('user_id', $userId)->update(['status' => 'Rejected']);

        return redirect()->route('admin.application')->with('success', 'User application has been rejected');
    }

    public function updateIsVerifiedJobSeeker(Request $request)
    {
        $userId = $request->route('user_id'); // Use route() to get the parameter

        // Retrieve the 'category_id' from the 'jobseeker_applications' table
        $category = JobSeekerApplication::where('user_id', $userId)->value('category_id');

        // Update the user information in a single query
        User::where('id', $userId)->update([
            'is_verified' => 1,
            'role' => 'worker',
            'category_id' => $category,
        ]);

        // Update the status in the 'jobseeker_applications' table
        JobSeekerApplication::where('user_id', $userId)->update(['status' => 'Accepted']);

        // return response()->json(['message' => 'User is now verified']);
        return redirect()->route('admin.application')->with('success', 'User is now verified');
    }



    public function updateIsRejectedJobSeeker(Request $request)
    {
        $userId = $request->route('user_id'); // Use route() to get the parameter

        // Update the status in the employer_applications table to 'Rejected'
        EmployerApplication::where('user_id', $userId)->update(['status' => 'Rejected']);

        return redirect()->route('admin.application')->with('success', 'User application has been rejected');
    }


    // View to display inbox messages for the admin
    public function AdminInbox()
    {
        $messages = CustomerServiceMessage::all();
        $pageTitle = 'Inbox';

        return view("admin.admin-inbox", compact('messages', 'pageTitle'));
    }

    public function showEmailView(User $user)
    {
        $pageTitle = 'Email';

        return view('admin.admin-inboxMessage', compact('user', 'pageTitle'));
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

    public function deleteEmail($emailId)
    {
        // Find the email by ID
        $email = CustomerServiceMessage::findOrFail($emailId);

        // Delete related replies
        $email->replies()->delete();

        // Now, delete the email
        $email->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Email deleted successfully');
    }




    // View to display the audit trail for the admin
    public function AdminAuditTrail()
    {
        $activityLogs = ActivityLog::all();
        $pageTitle = 'Audit Trail';

        return view('admin.admin-auditTrail', compact('activityLogs', 'pageTitle'));
    }

    // View for admin settings
    public function AdminSettings()
    {
        $pageTitle = 'Admin Settings';

        return view("admin.admin-settings", compact('pageTitle'));
    }

}
