<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        // apply rate limiter
        $this->rateLimit();

        // validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // attempt to login the user
        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.'
            ]);
        }

        // regenerate the session token
        request()->session()->regenerate();

        // redirect
        return redirect('/jobs');
    }

    protected function rateLimit()
    {
        $maxAttempts = 5;
        $decayMinutes = 1;

        if (RateLimiter::tooManyAttempts(request()->ip(), $maxAttempts)) {
            $seconds = RateLimiter::availableIn(request()->ip());

            throw ValidationException::withMessages([
                'email' => 'Too many login attempts. Please try again in ' . $seconds . ' seconds.'
            ]);
        }

        RateLimiter::hit(request()->ip(), $decayMinutes * 60);
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
