<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

	public function login()
	{
		return view('login.login');
	}

	public function authenticateAttempt(Request $request)
	{
		$this->validate($request, [
    		'email' => 'required',
    		'password' => 'required',
		]);
		
		if(Auth::attempt([ 'email' => $request->all()['email'], 'password' => $request->all()['password'] ])){
			$user = DB::select('select * from user where email=?', [ $request->all()['email'] ]);			
			session([ 'email' => $request->all()['email'] , 'name' => $user[0]->name ]);

			if($user[0]->isadmin == false){	
				return redirect('/')->with([ 'email' => $request->all()['email'] ]);
			}
			else{
				return redirect('/admin-panel')->with([ 'email' => $request->all()['email'] ]);				
			}
		}		
		else{
			return 	redirect('/login');
		}
	}

	public function logout()
	{
		if(Auth::check()){
			Auth::logout();
			return redirect('/');		
		}
		else{
			return redirect('/');			
		}
	}
}
