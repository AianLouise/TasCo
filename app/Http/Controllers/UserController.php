<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerServiceMessage;
use Illuminate\Support\Facades\Validator;

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
        $workerUsers = User::where('role', 'worker')->get();
        // Retrieve categories
        $categories = Category::all();
        $pageTitle = 'Dashboard';

        return view("user.user-dashboard", compact('workerUsers', 'categories', 'pageTitle'));
    }

    public function sort(Request $request)
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

        // Pagination without sorting
        $workers = $query->paginate(6);
        $categories = Category::all();

        return view('tasco.home', ['workerUsers' => $workers, 'categories' => $categories]);
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

        // Send verification email
        Auth::user()->sendEmailVerificationNotification();

        return redirect()->route('verification.notice')->with('status', 'A verification link has been sent to your email.');
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

}
