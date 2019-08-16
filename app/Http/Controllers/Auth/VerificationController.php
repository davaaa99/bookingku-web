<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Access\AuthorizationException;
use App\Http\Controllers\Controller;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/verified/email';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Override. Mark the authenticated user's email address as verified. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {        
        $u = \App\User::where('email_token', $request->route('id'))->first();
        if (!$u) {
            throw new AuthorizationException;
        }
        if ($request->route('id') != $u->email_token) {
            throw new AuthorizationException;
        }

        if ($u->hasVerifiedEmail()) {
            session()->flash('message','But hold on. Hmm, let me tell you something. Your email has been verified. Can we help you?');
            return redirect($this->redirectPath());
        }

        if ($u->markEmailAsVerified()) {
            event(new Verified($u));
        }

        session()->flash('message','Thank you for joining our family. Your email has been verified. Let\'s create something.');
        return redirect($this->redirectPath());
    }

    /**
     * User verified view
     * 
     * @return View
     */
    public function verifiedEmail()
    {
        if (session()->has('message')) {
            return redirect('/locations');
        }
        return redirect('/login');
    }
}
