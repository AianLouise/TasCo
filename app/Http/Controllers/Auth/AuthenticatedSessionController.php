<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{

    /**
     * Display the login view.
     */
    public function create(): View
    {        
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $url = '';
        if($request->user()->role === 'admin'){
            $url = 'admin/dashboard';
        }elseif($request->user()->role === 'worker'){
            $url = 'worker/dashboard';
        }elseif($request->user()->role === 'user'){
            $url = 'home';
        }

        // Check if the user is verified
        if (!Auth::user()->hasVerifiedEmail()) {
            // Send the email verification notification
            Auth::user()->sendEmailVerificationNotification();

            // You can customize the message to inform the user about the resend.
            return redirect()->route('verification.notice')->with('resent', true);
        }
        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        activity('logged_out')
            ->causedBy(Auth::user()) // Set the user who caused the activity (optional)
            ->performedOn(Auth::user()) // Set the user as the subject of the activity
            ->log('User logged out');

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
