<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    public function Home()
    {
        $workerUsers = User::where('role', 'worker')->get();
        // Retrieve categories
        $categories = Category::all();

        return view("tasco.home", compact('workerUsers', 'categories'));
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

        return view("tasco.job-listing", compact('workerUsers', 'categories'));
    }

    public function Settings()
    {
        return view("tasco.settings");
    }

    
    public function CustomerService()
    {
        return view("tasco.customer-service");
    }

    public function ActivityLog()
    {
        return view("tasco.activity-logs");
    }

    public function Terms()
    {
        return view("tasco.terms");
    }

    public function Guidelines()
    {
        return view("tasco.guidelines");
    }

    public function AboutUs()
    {
        return view("tasco.about-us");
    }
}
