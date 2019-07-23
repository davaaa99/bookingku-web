<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{
    /**
     * Access web recaptcha https://www.google.com/recaptcha/intro/v3.html 
     * Click button Admin Console
     * Fill registration form
     * Result :
     * - FrontEnd : 6Lf-zK4UAAAAAI0ywPHpXA8vQEQVFZvk4XcphPAg
     * - BackEnd : 6Lf-zK4UAAAAAIyjDXsmRja9Krr4xrE-CEBe0IzO
     */
    protected $GTOKEN = '6Lf-zK4UAAAAAIyjDXsmRja9Krr4xrE-CEBe0IzO';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'id_users' => Uuid::uuid1()->getHex(),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name' => $data['name'],
            'email_token' => base64_encode($data['email']),
            'users_type' => '2',
        ]);
    }

    /**
     * Registration callback.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function registration(Request $request) 
    {
        $validate = $this->validator($request->all());
        if ($validate->fails()) {
            return response()->json([
                'message' => 'Unable to save data. Bad config.',
                'serve' => [
                    'error' => $validate->errors()
                ]
            ], 401);
        }

        /* Remark : disabled recaptcha
        $clientIps = request()->getClientIps();
        $visitorIp = end($clientIps);

        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => $this->GTOKEN,
                'response' => $request->token,
                'remoteip' => $visitorIp
            ]
        ]);
        $dirtyResult = $response->getBody()->getContents();
        $result = json_decode($dirtyResult, true);

        if (!$result['success']) {
            return response()->json([
                'message' => 'Deleteing your data at ' . $visitorIp . '. Good luck.'
            ], 401);
        }
        */
        
        /**
         * Register
         * Sending email verification
         */
        event(new Registered($user = $this->create($request->all())));

        $success = [
            'message' => 'Successfully saved data.',
            'serve' => []
        ];
        return response()->json($success, 200);
    }

    /**
     * Login callback.
     * 
     * @param \Illuminate\Http|Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized. Bad username or password.',
                'serve' => []
            ], 401);

        $user = Auth::user();
        $now = \Carbon\Carbon::now();
        
        $tokenResult = $user->createToken('bookingku-'.$now.'-'.$user->email);
        $token = $tokenResult->token;        
        $token->save();

        return response()->json([
            'message' => 'Successfully logged in.',
            'serve' => [
                'access_token' => $tokenResult->accessToken,
                'user' => $user
            ]
        ], 200);
    }

    /**
     * Logout user and revoke token
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        return response()->json([
            'message' => 'Successfully logged out.'
        ], 200);
    }
}
