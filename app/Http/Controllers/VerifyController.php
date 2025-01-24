<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function notice()
    {
        return view('auth.verify-email');
    }

    public function verification(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('index')->with('success', 'Ваша учетная запись подтверждена');
    }

    public function send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
