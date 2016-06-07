<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Hall;
use App\Movie;
use App\Shows;
use App\User;
use DB;

class adminController extends Controller
{
    //
	private $imgDestination = 'img';

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

	public function saveAdmin(Request $request) 
	{
		if(Auth::check() && Auth::user()->isadmin){
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
					
			return view('blank');
		}
	}

	public function updateAdmin() 
	{
		if(Auth::check() && Auth::user()->isadmin){
			return view('updateAdmin');
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
		$movie->rated_by = 0;				
		
		if($request->hasFile('img_path') && $request->file('img_path')->isValid()){
			$file = $request->file('img_path');
			$movie->img_path = $this->imgDestination.'/'.$request->get('name').'.'.substr($file->getMimeType(), 6);

			$file->move($this->imgDestination, $request->get('name').'.'.substr($file->getMimeType(), 6));
		}		
		else{
			$movie->img_path = NULL;
		}
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
		
		if($request->hasFile('img_path') && $request->file('img_path')->isValid()){
			if(file_exists($movie->img_path)){
				unlink($movie->img_path);
			}
	
			$file = $request->file('img_path');

			$filename = str_replace(':', '_', $request->get('name')).'.'.substr($file->getMimeType(), 6);
			//$filename = str_replace(':', '_', $filename);
			$movie->img_path = $this->imgDestination.'/'.$filename;

			$file->move($this->imgDestination, $filename);
		}		
		$movie->save();

		$movies = Movie::all();
		return redirect('/admin-panel/movies')->with([ 'movies' => $movies ]);
	}

	public function deleteMovie($id)
	{
		if(Auth::check() && Auth::user()->isadmin){
			$movie = Movie::find($id);			

			if(file_exists($movie->img_path)){
				unlink($movie->img_path);
			}
			Movie::destroy($id);

			$movies = Movie::all();
			return redirect('/admin-panel/movies')->with([ 'movies' => $movies ]);
		}
	}
	public function queryMovie(Request $request){
		if($request->get('rating')==NULL && $request->get('genre')==NULL){
			return redirect('/admin-panel/movies');
		}
		elseif ($request->get('genre')==NULL) {
			//return "eikhane mara";
			$movies = DB::table('movie')
                ->where('rating', '>=', $request->get('rating'))
                ->get();
			return view('admin_panel.showMovie', [ 'movies' => $movies ]);
		}
		elseif($request->get('rating')==NULL){
			$movies = DB::table('movie')
                ->where('genre', 'ilike', $request->get('genre'))
                ->get();
			return view('admin_panel.showMovie', [ 'movies' => $movies ]);
		}
		else{
			$movies = DB::table('movie')
                ->where('rating', '>=', $request->get('rating'))
                ->where('genre', 'like', $request->get('genre'))
                ->get();
			return view('admin_panel.showMovie', [ 'movies' => $movies ]);
		}
	}
	public function displayShow()
	{
		if(Auth::check() && Auth::user()->isadmin){		
			$shows = Shows::all();

			return view('admin_panel.displayShow', [ 'shows' => $shows]);
		}	
	}

	public function queryShow(Request $request){
		if($request->get('hall')==NULL && $request->get('date')==NULL){
			return redirect('/admin-panel/shows');
		}
		elseif ($request->get('date')==NULL) {
			$shows = DB::table('shows')
                ->where('hall_id', '=', $request->get('hall'))
                ->get();
			return view('admin_panel.displayShow', [ 'shows' => $shows]);
		}
		elseif($request->get('hall')==NULL){
			$shows = DB::table('shows')
                ->whereDate('start_time', '=',$request->get('date'))
                ->get();
			return view('admin_panel.displayShow', [ 'shows' => $shows]);
		}
		else{
			$shows = DB::table('shows')
                ->where('hall_id', '=', $request->get('hall'))
                ->whereDate('start_time', '=',$request->get('date'))
                ->get();
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
	
	public function createShow(Request $request)
	{
		if(!Auth::check() || !Auth::user()->isadmin){
			return;
		}

		$this->validate($request, [
			'hall' => 'required',
			'movie' => 'required',
			'language' => 'required',
			'start_time' => 'required'
		]);
		
		$show = new Shows();
		$show->hall_id = $request->get('hall');
		$show->movie_id = Movie::where('name', '=', $request->get('movie'))->first()->id;
		$show->start_time = date('Y-m-d H:i:s', strtotime($request->get('start_time')));
		$show->language = $request->get('language');
		$show->available_seat = Hall::find($request->get('hall'))->first()->seat;
		$show->save();
				
		$shows = Shows::all();

		return redirect('/admin-panel/shows')->with([ 'shows' => $shows ]);
	}

	public function updateShow($id)
	{
		if(!Auth::check() || !Auth::user()->isadmin){
			return;
		}

		$movies = Movie::all('name');
		$halls = Hall::all('id');
		$show = Shows::find($id);

		return view('admin_panel.updateShow', [ 'movies' => $movies, 'halls' => $halls , 'show' => $show ]);
	}

	public function saveShow(Request $request)
	{
		if(!Auth::check() || !Auth::user()->isadmin){
			return;
		}

		$this->validate($request, [
			'hall' => 'required',
			'movie' => 'required',
			'language' => 'required',
			'start_time' => 'required'
		]);
		
		$show = Shows::find($request->get('id'));
		$show->hall_id = $request->get('hall');
		$show->movie_id = Movie::where('name', '=', $request->get('movie'))->first()->id;
		$show->start_time = date('Y-m-d H:i:s', strtotime($request->get('start_time')));
		$show->language = $request->get('language');
		$show->available_seat = Hall::find($request->get('hall'))->first()->seat;
		$show->save();
				
		$shows = Shows::all();

		return redirect('/admin-panel/shows')->with([ 'shows' => $shows ]);
	}	

	public function deleteShow($id)
	{
		if(Auth::check() && Auth::user()->isadmin){
			Shows::destroy($id);

			$shows = Shows::all();
			return redirect('/admin-panel/shows')->with([ 'shows' => $shows ]);
		}
	}

	public function showUser()
	{
		if(Auth::check() && Auth::user()->isadmin){
			$users = User::all();

			return view('admin_panel.showUser', [ 'users' => $users ]);
		}
	}

	public function queryUser(Request $request){
		if($request->get('book_count')==NULL){
			return redirect('/admin-panel/users');
		}
		
		else{
			$users = DB::table('user')
                ->where('book_count', '>=', $request->get('book_count'))
                ->get();
			return view('admin_panel.showUser', [ 'users' => $users ]);
		}
	}

	public function insertAdmin()
	{
		if(Auth::check() && Auth::user()->isadmin){
			return view('admin_panel.insertAdmin');
		}
	}
	public function createAdmin(Request $request)
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
		$user->isadmin = true;
		$user->book_count = 0;
		$user->remember_token = '';		
		$user->save();
				
		$users = User::all();

		return view('admin_panel.showAdmin', [ 'users' => $users ]);
	}

	public function showAdmin()
	{
		if(Auth::check() && Auth::user()->isadmin){
			$users = User::all();

			return view('admin_panel.showAdmin', [ 'users' => $users ]);
		}
	}
}
