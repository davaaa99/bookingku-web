<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (!Auth::attempt($credentials))
            {
                return redirect()->back()->with('alert',"Unauthorized. Bad username or password.");
                // return response()->json([
                //     'message' => 'Unauthorized. Bad username or password.',
                //     'serve' => []
                // ], 401);
            }
            $user = Auth::user();
            
            if(! $user->hasVerifiedEmail())
                return redirect('/email/verify');

            if($user->user_type == 2) 
                return redirect('/locations');

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed logged in.'. $e->getMessage(),
                'serve' => []
            ], 401);
        }

        return redirect('/verifybooking');
    }

}
