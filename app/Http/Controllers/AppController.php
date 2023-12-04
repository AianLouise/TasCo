<?php

namespace App\Http\Controllers;

use App\Models\JobSeekerApplication;
use App\Models\User;
use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use App\Models\EmployerApplication;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerServiceMessage;

class AppController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        // Retrieve worker users and categories
        $workerUsers = User::where('role', 'worker')->get();
        $categories = Category::all();
        $pageTitle = 'Home';

        return view("tasco.home", compact('workerUsers', 'categories', 'pageTitle'));
    }

    /**
     * Display the user profile page.
     *
     * @return \Illuminate\View\View
     */
    public function showProfile()
    {
        $pageTitle = 'Profile';

        return view("tasco.profile", compact('pageTitle'));
    }

    /**
     * Display the job seeker application page.
     *
     * @return \Illuminate\View\View
     */
    public function applyJobseeker()
    {
        $categories = Category::all();
        $pageTitle = 'Job Seeker Application';

        $user = auth()->user();

        // Check if the user has already submitted an employer application
        $hasSubmittedApplication = JobSeekerApplication::where('user_id', $user->id)->exists();

        if ($hasSubmittedApplication) {
            // User has already submitted an application, return a view with a message
            return view('tasco.application-already-submitted');
        }

        return view("tasco.apply-jobseeker", compact('categories', 'pageTitle'));
    }

    /**
     * Display the employer application page.
     *
     * @return \Illuminate\View\View
     */
    public function applyEmployer()
    {
        $pageTitle = 'Employer Application';

        $user = auth()->user();

        // Check if the user has already submitted an employer application
        $hasSubmittedApplication = EmployerApplication::where('user_id', $user->id)->exists();

        if ($hasSubmittedApplication) {
            // User has already submitted an application, return a view with a message
            return view('tasco.application-already-submitted');
        }

        // User hasn't submitted an application yet, proceed to the application form
        return view('tasco.apply-employer', compact('pageTitle'));
    }

    /**
     * Display the job listing page with filters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function jobListing(Request $request)
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

    /**
     * Display the settings page.
     *
     * @return \Illuminate\View\View
     */
    public function settings()
    {
        $pageTitle = 'Settings';

        return view("tasco.settings", compact('pageTitle'));
    }

    /**
     * Display the Learn More page.
     *
     * @return \Illuminate\View\View
     */
    public function LearnMore()
    {
        $pageTitle = 'Learn More';

        return view("tasco.learn-more", compact('pageTitle'));
    }

    /**
     * Display the Calendar page.
     *
     * @return \Illuminate\View\View
     */
    public function Calendar()
    {
        $pageTitle = 'TasCo Calendar';

        return view("tasco.calendar", compact('pageTitle'));
    }

    /**
     * Display the service page.
     *
     * @return \Illuminate\View\View
     */
    public function Services()
    {
        $pageTitle = 'TasCo Services';

        return view("tasco.services", compact('pageTitle'));
    }

    /**
     * Display the customer service page.
     *
     * @return \Illuminate\View\View
     */
    public function customerService()
    {
        $pageTitle = 'Customer Service';

        return view("tasco.customer-service", compact('pageTitle'));
    }

    /**
     * Store a new customer service message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Display the activity log page.
     *
     * @return \Illuminate\View\View
     */
    public function activityLog()
    {
        $activityLogs = ActivityLog::where('causer_id', auth()->id())->get();
        $pageTitle = 'Activity Log';
        $users = User::all();

        return view("tasco.activity-logs", compact('pageTitle', 'activityLogs', 'users'));
    }

    /**
     * Display the terms and conditions page.
     *
     * @return \Illuminate\View\View
     */
    public function terms()
    {
        $pageTitle = 'Terms & Conditions';

        return view("tasco.terms", compact('pageTitle'));
    }

    /**
     * Display the guidelines page.
     *
     * @return \Illuminate\View\View
     */
    public function guidelines()
    {
        $pageTitle = 'Community Guidelines';

        return view("tasco.guidelines", compact('pageTitle'));
    }

    /**
     * Display the about us page.
     *
     * @return \Illuminate\View\View
     */
    public function aboutUs()
    {
        $pageTitle = 'About Us';

        return view("tasco.about-us", compact('pageTitle'));
    }

    /**
     * Display the Chatify page.
     *
     * @return \Illuminate\View\View
     */
    public function chatify()
    {
        return view("tasco.chatify");
    }

    public function UserChatify($user_id)
    {
        // Retrieve the user based on the user_id
        $user = User::find($user_id);

        if (!$user) {
            // Handle the case where the user is not found
            abort(404);
        }

        // Load or create the chat conversation for the specific user
        // Your logic to load or create the chat conversation goes here

        // Return the chatify view with the user and chat data
        return view("tasco.chatify", compact('user', 'chat'));
    }
}
