<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use App\Movie;

class ratingController extends Controller
{
    //
	public function ratingStart()
	{	
		$date = DB::select('select DATE_FORMAT(DATE_ADD( NOW(), INTERVAL 7 DAY)'.", '%d-%M-%Y'".') as showDate')[0]->showDate;
				
		$movies = DB::select( 
					 DB::raw(
						"select distinct movie.name , rating 
						 from shows inner join movie on shows.movie_id = movie.id 
						 where DATE_FORMAT(shows.start_time, '%d-%M-%Y') <= '$date'"
  					 ) 
				);
				
		return view('rating', [ 'movies' => $movies ] );
	}
	
	public function ratingFinish(Request $request)
	{
		$movie = Movie::where('name', '=', $request->get('name'))->first();
		//return $movie->name;
		$movie->rating = ($movie->rating * $movie->rated_by)+$request->get('rating');
		$movie->rated_by =  $movie->rated_by+1;
		$movie->rating = ($movie->rating)/($movie->rated_by); 
		$movie->save(); 		

		return redirect('/rate');		
	}
}
