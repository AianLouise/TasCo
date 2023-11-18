<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Category;
use App\Models\ActivityLog;
use App\Models\ServicesLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\CustomerServiceMessage;
use Illuminate\Support\Facades\Password;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
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

        return view('admin.admin-dashboard', compact('activityLogs', 'jobSeekersCount', 'employersCount', 'allUsersCount', 'workers', 'employers'));
    }

    public function AdminChatify()
    {
        return view('admin.admin-chatify');
    }

    public function AdminViewAllUsers()
    {
        $users = User::all();
        return view('admin.admin-viewAllUsers', compact('users'));
    }

    public function AdminJobSeeker()
    {
        $workers = User::where('role', 'worker')
            ->where('is_verified', 1)
            ->get();

        return view('admin.admin-jobSeeker', compact('workers'));
    }

    public function AdminEmployer()
    {
        $employers = User::where('role', 'user')
            ->where('is_verified', 1)
            ->get();

        return view("admin.admin-employer", compact("employers"));
    }

    public function AdminAddProfile()
    {
        $categories = Category::all();
        return view('admin.admin-addProfile', compact('categories'));
    }

    public function createUser(Request $request)
    {
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

        // Handle file upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');

            // Check file size before storing
            if ($avatar->getSize() > 2048 * 1024) { // 2 MB in kilobytes
                return redirect()->back()->with('messages', 'The avatar file size must not exceed 2 MB.');
            }

            $avatarName = $avatar->hashName(); // Generate a unique file name
            $avatar->storeAs('public/users-avatar', $avatarName); // Store the file with the desired path and name
            $user->avatar = $avatarName; // Save the file name in the database
        }

        $user->save();


        $users = User::all();
        return view('admin.admin-viewAllUsers', compact('users'));
    }

    public function AdminEditProfile($id)
    {
        $categories = Category::all();
        $user = User::find($id);

        return view('admin.admin-editProfile', ['user' => $user ,'categories'=> $categories]);
    }

    public function deleteProfile($id)
    {
        $user = User::findOrFail($id);

        // Perform any additional checks if needed before deleting

        $user->delete();

        return redirect()->route('admin.jobSeeker')->with('success', 'Profile deleted successfully');
    }


    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);

        // Validate other form fields as needed
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required|string|in:admin,worker,user',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for the avatar as needed
        ], [
            'avatar.max' => 'The avatar file size must not exceed 2 MB.',
            'email.unique' => 'The email has already been taken.',
        ]);
        

        // Handle file upload
        if ($request->hasFile('avatar')) {
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

        $user->save();

        $users = User::all();
        return view('admin.admin-viewAllUsers', compact('users'));
    }


    public function AdminServices()
    {
        $services = Service::with('category')->get();

        return view('admin.admin-services', compact('services'));
    }

    public function AdminApplication()
    {
        return view("admin.admin-application");
    }

    public function AdminInbox()
    {
        $messages = CustomerServiceMessage::all();

        return view("admin.admin-inbox", compact('messages'));
    }

    public function AdminAuditTrail()
    {
        $activityLogs = ActivityLog::all();
        return view('admin.admin-auditTrail', compact('activityLogs'));
    }

    public function AdminSettings()
    {
        return view("admin.admin-settings");
    }
}
