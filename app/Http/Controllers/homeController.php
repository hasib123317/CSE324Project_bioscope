<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Hall;
use App\Movie;
use App\Shows;
use App\User;
use DB;

class homeController extends Controller
{
    //
	public function index() {
		
		$movies = DB::select(DB::raw("SELECT DISTINCT(m.name),m.img_path FROM `movie` m join shows s on(m.id=s.movie_id) WHERE s.start_time>=now()"));

		return view('home', [ 'movies' => $movies ]);
	}

	public function seeProfile()
    {
        
        if(Auth::check()){
            return view('member');      
        }

    }

    public function saveUser(Request $request) 
	{
		if(Auth::check()){
			$this->validate($request, [
			'email' => 'email|required',
			'name' => 'required',
			'password' => 'required',
			'phone_no' => 'required',
			]);
		
			$user = User::find(Auth::user()->id);
			$user->name = $request->get('name');
			$user->email = $request->get('email');
			$user->password = \Hash::make($request->get('password'));
			$user->phone_no = $request->get('phone_no');
			$user->save();
					
			return view('member');
		}
	}

	public function updateUser() 
	{
		if(Auth::check()){
			return view('updateUser');
		}
	}

}