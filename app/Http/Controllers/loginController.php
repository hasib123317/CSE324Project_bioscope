<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class loginController extends Controller
{
    //
	public function login() {
		
		return redirect('/')->with([ 'user' => 'me' ]);
	}
}
