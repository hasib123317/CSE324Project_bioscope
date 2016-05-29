<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Hall;
use App\Movie;
use App\Shows;
use App\User;

class adminController extends Controller
{
    //
	public function index() 
	{
		if(Auth::check() && Auth::user()->isadmin){
			return view('index');
		}
	}
	
	public function profile() 
	{
		if(Auth::check() && Auth::user()->isadmin){
			return view('blank');
		}
	}

	public function stub(Request $request) 
	{
		if(Auth::check() && Auth::user()->isadmin){
			return $request->get('movie');
		}
	}

	public function showHall()
	{
		if(Auth::check() && Auth::user()->isadmin){
			$halls = Hall::all();

			return view('admin_panel.showHall', [ 'halls' => $halls ]);
		}
	}

	public function insertHall()
	{
		if(Auth::check() && Auth::user()->isadmin){
			
			return view('admin_panel.insertHall');
		}
	}
	
	public function createHall(Request $request)
	{
		if(!Auth::check() || !Auth::user()->isadmin){
			return;
		}

		$this->validate($request, [
			'seat' => 'required',
			'premium_ticket_price' => 'required',
			'regular_ticket_price' => 'required',
		]);
		
		$hall = new Hall;
		$hall->seat = $request->get('seat');
		$hall->premium_ticket_price = $request->get('premium_ticket_price');
		$hall->regular_ticket_price = $request->get('regular_ticket_price');		
		$hall->save();
				
		$halls = Hall::all();

		return redirect('/admin-panel/halls')->with([ 'halls' => $halls ]);
	}

	public function updateHall($id)
	{
		if(!Auth::check() || !Auth::user()->isadmin){
			return;
		}

		$hall = Hall::find($id);

		return view('admin_panel.updateHall', [ 'hall' => $hall ] );
	}

	public function saveHall(Request $request)
	{
		if(!Auth::check() || !Auth::user()->isadmin){
			return;
		}

		$this->validate($request, [
			'seat' => 'required',
			'premium_ticket_price' => 'required',
			'regular_ticket_price' => 'required',
		]);

		$hall = Hall::find($request->get('id'));
		$hall->seat = $request->get('seat');
		$hall->premium_ticket_price = $request->get('premium_ticket_price');
		$hall->regular_ticket_price = $request->get('regular_ticket_price');
		$hall->save();

		$halls = Hall::all();

		return redirect('/admin-panel/halls')->with([ 'halls' => $halls ]);
	}	

	public function deleteHall($id)
	{
		if(Auth::check() && Auth::user()->isadmin){
			Hall::destroy($id);

			$halls = Hall::all();
			return redirect('/admin-panel/halls')->with([ 'halls' => $halls ]);
		}
	}

	public function showMovie()
	{
		if(Auth::check() && Auth::user()->isadmin){
			$movies = Movie::all();

			return view('admin_panel.showMovie', [ 'movies' => $movies ]);
		}
	}
	public function insertMovie()
	{
		if(Auth::check() && Auth::user()->isadmin){
			
			return view('admin_panel.insertMovie');
		}
	}
	
	public function createMovie(Request $request)
	{
		if(!Auth::check() || !Auth::user()->isadmin){
			return;
		}

		$this->validate($request, [
			'name' => 'required',
			'genre' => 'required',
			'rating' => 'required',
			'certificate' => 'required',
		]);
		
		$movie = new Movie;
		$movie->name = $request->get('name');
		$movie->genre = $request->get('genre');
		$movie->rating = $request->get('rating');
		$movie->certificate = $request->get('certificate');		
		$movie->save();
				
		$movies = Movie::all();

		return redirect('/admin-panel/movies')->with([ 'movies' => $movies ]);
	}

	public function updateMovie($id)
	{
		if(!Auth::check() || !Auth::user()->isadmin){
			return;
		}

		$movie = Movie::find($id);

		return view('admin_panel.updateMovie', [ 'movie' => $movie ] );
	}

	public function saveMovie(Request $request)
	{
		if(!Auth::check() || !Auth::user()->isadmin){
			return;
		}

		$this->validate($request, [
			'name' => 'required',
			'genre' => 'required',
			'rating' => 'required',
			'certificate' => 'required',
		]);
		
		$movie = Movie::find($request->get('id'));
		$movie->name = $request->get('name');
		$movie->genre = $request->get('genre');
		$movie->rating = $request->get('rating');
		$movie->certificate = $request->get('certificate');		
		$movie->save();

		$movies = Movie::all();
		return redirect('/admin-panel/movies')->with([ 'movies' => $movies ]);
	}

	public function deleteMovie($id)
	{
		if(Auth::check() && Auth::user()->isadmin){
			Movie::destroy($id);

			$movies = Movie::all();
			return redirect('/admin-panel/movies')->with([ 'movies' => $movies ]);
		}
	}

	public function displayShow()
	{
		if(Auth::check() && Auth::user()->isadmin){		
			$shows = Shows::all();

			return view('admin_panel.displayShow', [ 'shows' => $shows]);
		}	
	}

	public function insertShow()
	{
		if(Auth::check() && Auth::user()->isadmin){
			$movies = Movie::all('name');
			$halls = Hall::all('id');

			return view('admin_panel.insertShow', [ 'movies' => $movies, 'halls' => $halls ]);
		}
	}

	public function showUser()
	{
		if(Auth::check() && Auth::user()->isadmin){
			$users = User::all();

			return view('admin_panel.showUser', [ 'users' => $users ]);
		}
	}
	public function showAdmin()
	{
		if(Auth::check() && Auth::user()->isadmin){
			$users = User::all();

			return view('admin_panel.showAdmin', [ 'users' => $users ]);
		}
	}
}
