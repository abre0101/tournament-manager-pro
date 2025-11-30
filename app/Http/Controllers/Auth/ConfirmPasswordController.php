<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmPasswordController extends Controller
{
    use ConfirmsPasswords;

    // Show the password confirmation form
    public function showConfirmForm(Request $request)
    {
        return view('auth.passwords.confirm'); // Return the confirmation view
    }

    // Confirm the user's password
    public function confirm(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->password])) {
            // Password is confirmed, redirect to intended page
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['password' => 'The provided password is incorrect.']);
    }
}