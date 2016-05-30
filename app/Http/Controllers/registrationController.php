<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Auth;

class registrationController extends Controller
{
    //
	public function signup(Request $request)
	{
		$this->validate($request, [
			'email' => 'email|required',
			'name' => 'required',
			'password' => 'required',
			'phone_no' => 'required',
		]);
		
		$user = new User;
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->password = \Hash::make($request->get('password'));
		$user->phone_no = $request->get('phone_no');
		$user->isadmin = false;
		$user->book_count = 0;
		$user->remember_token = '';		
		$user->save();
				
		Auth::attempt([ 'email' => $request->all()['email'], 'password' => $request->all()['password'] ]);
		return redirect('/');
	}
}
