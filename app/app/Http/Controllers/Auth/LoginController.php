<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->redirectAfterLogout = 'login';

    }

    public function redirectTo()
    {
            return route('dashboard');
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $this->data['title'] =  'Login'; // set the page title

        return view('auth.login', $this->data);
    }


    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function login(Request $request)
    {   
        $credentials = $request->only(['email', 'password']) ;
        $validate = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect('login')
                        ->withErrors($validate)
                        ->withInput();
        }


        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended($this->redirectTo);
        } else {
            $no_user_error = ['no_user_error' => 'Invalid user or password'];
            return redirect('login')
                        ->withErrors($no_user_error)
                        ->withInput();
        }
    }


    /**
     * Log the user out and redirect him to specific location.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // Do the default logout procedure
        Auth::logout();

        // And redirect to custom location
        return redirect($this->redirectAfterLogout);
    }


    

}
