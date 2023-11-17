<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        $user = User::create([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'name' => $request->fname . ' ' . $request->lname,
            'address' => $request->address,
            'email' => $request->email,
            'messenger_color' => '#2180f3',
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);
        

        $user->sendEmailVerificationNotification();
    
        // Log the user registration as an activity
        activity('created')
            ->causedBy($user) // Set the user who caused the activity
            ->performedOn($user) // Set the user as the subject of the activity
            ->withProperties(['type' => 'registration']) // Add a property to specify the type
            ->log('User Registration');
    
        Auth::login($user);
    
        return redirect()->route('verification.notice')->with('resent', true);
    }
    
}
