<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerServiceMessage;

class UserController extends Controller
{
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
}
