<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\ActivityLog;
use App\Models\ServicesLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function AdminDashboard(){
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

    public function AdminChatify(){
        return view('admin.admin-chatify');
    }

    public function AdminViewAllUsers(){
        $users = User::all();
        return view('admin.admin-viewAllUsers', compact('users'));
    }

    public function AdminJobSeeker(){
        $workers = User::where('role', 'worker')
                    ->where('is_verified', 1)
                    ->get();

        return view('admin.admin-jobSeeker', compact('workers'));
    }

    public function AdminEmployer(){
        $employers = User::where('role', 'user')
                    ->where('is_verified', 1)
                    ->get();

        return view("admin.admin-employer", compact("employers"));
    }

    public function AdminEditProfile($id){
        $user = User::find($id);

        return view('admin.admin-editProfile', ['user' => $user]);
    }

    public function deleteProfile($id){
        $user = User::findOrFail($id);

        // Perform any additional checks if needed before deleting
    
        $user->delete();
    
        return redirect()->route('admin.jobSeeker')->with('success', 'Profile deleted successfully');
    }
    

    public function updateProfile(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // 'password' => 'nullable|string|min:8', // Adjust validation rules for password as needed
            // 'birthday' => 'required|date',
            // Add more fields as needed
        ]);

        // Find the user by ID
        $user = User::find($id);

        // Update user data
        $user->update([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'name' => $request->fname . ' ' . $request->lname,
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            // 'password' => bcrypt($request->input('password')), // Hash the password if provided
            // 'birthday' => $request->input('birthday'),
            // Update more fields as needed
        ]);

        // Redirect back or wherever you want after the update
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function AdminServices(){
        $services = Service::with('category')->get();

        return view('admin.admin-services', compact('services'));
    }

    public function AdminApplication(){
        return view("admin.admin-application");
    }

    public function AdminInbox(){
        return view("admin.admin-inbox");
    }

    public function AdminAuditTrail(){
        $activityLogs = ActivityLog::all();
        return view('admin.admin-auditTrail', compact('activityLogs'));
    }

    public function AdminSettings(){
        return view("admin.admin-settings");
    }
}
