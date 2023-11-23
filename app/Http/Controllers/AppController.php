<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reply;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerServiceMessage;

class AppController extends Controller
{
    public function Home()
    {
        $workerUsers = User::where('role', 'worker')->get();
        // Retrieve categories
        $categories = Category::all();

        $pageTitle = 'Home';

        return view("tasco.home", compact('workerUsers', 'categories', 'pageTitle'));
    }

    public function ApplyJobseeker()
    {
        return view("tasco.apply-jobseeker");
    }

    public function ApplyEmployer()
    {
        return view("tasco.apply-employer");
    }

    public function JobListing(Request $request)
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
        $pageTitle = 'Job Listing';

        return view("tasco.job-listing", compact('workerUsers', 'categories', 'pageTitle'));
    }

    public function Settings()
    {
        $pageTitle = 'Settings';

        return view("tasco.settings", compact('pageTitle'));
    }


    public function CustomerService()
    {
        $pageTitle = 'Customer Service';

        return view("tasco.customer-service", compact('pageTitle'));
    }

    public function storeCustomerServiceMessage(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Get the authenticated user's ID
        $user_id = Auth::id();

        // Create a new CustomerServiceMessage model and save the data
        CustomerServiceMessage::create([
            'user_id' => $user_id,
            'subject' => $validatedData['subject'],
            'message' => $validatedData['message'],
        ]);

        return redirect()->route('app.customerService'); // Adjust the route name as needed
    }

    public function ActivityLog()
    {
        $pageTitle = 'Activity Log';

        return view("tasco.activity-logs", compact('pageTitle'));
    }

    public function Terms()
    {
        $pageTitle = 'Terms & Conditions';

        return view("tasco.terms", compact('pageTitle'));
    }

    public function Guidelines()
    {
        $pageTitle = 'Guidelines';

        return view("tasco.guidelines", compact('pageTitle'));
    }

    public function AboutUs()
    {
        $pageTitle = 'About Us';

        return view("tasco.about-us", compact('pageTitle'));
    }

    public function Chatify()
    {
        return view("tasco.chatify");
    }
}
