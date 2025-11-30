<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    use VerifiesEmails;

    // Show the email verification notice
    public function show(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended('dashboard'); // Redirect if already verified
        }

        return view('auth.verify'); // Show verification notice
    }

    // Resend the verification email
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended('dashboard'); // Redirect if already verified
        }

        $request->user()->sendEmailVerificationNotification(); // Send verification email

        return back()->with('resent', true); // Redirect back with success message
    }

    // Verify the user's email address
    public function verify(Request $request)
    {
        $user = \App\Models\User::findOrFail($request->route('id'));

        if (! hash_equals($request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new \Illuminate\Auth\Access\AuthorizationException;
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->intended('dashboard'); // Redirect if already verified
        }

        $user->markEmailAsVerified(); // Mark email as verified

        return redirect()->route('verification.notice')->with('verified', true); // Redirect with success message
    }
}