<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use App\Hall;
use App\Movie;

class scheduleController extends Controller
{
    //
	public function nextweek()
	{
		$halls = Hall::all();
		$dates = array();
		$data = array();
		$movies = Movie::all();
		
		for($l=0;$l<=7;$l++)
		{
			$dates[$l] = DB::select('select DATE_FORMAT(DATE_ADD( NOW(), INTERVAL '.$l.' DAY)'.", '%d-%M-%Y'".') as showDate')[0]->showDate;
			
			foreach($halls as $hall)
			{
				$data[$dates[$l]][$hall->id]['hallName'] = $hall->id;
				$data[$dates[$l]][$hall->id]['showCount'] = DB::select(
														DB::raw( 
															"select COUNT(*) as showCount 
															 from shows where shows.hall_id = $hall->id and 
															 DATE_FORMAT(shows.start_time, '%d-%M-%Y') = '$dates[$l]'"
   														)
														)[0]->showCount; 
				foreach($movies as $movie)
				{
					$data[$dates[$l]][$hall->id][$movie->name] = DB::select( 
														 DB::raw(
															"select DATE_FORMAT(shows.start_time,'%h:%i') as showTime  
															 from shows inner join movie on shows.movie_id = movie.id 
															 where movie.name = '$movie->name' and shows.hall_id = $hall->id and 
															 DATE_FORMAT(shows.start_time, '%d-%M-%Y') = '$dates[$l]' order by showTime"
   														 ) 
														);
				
				}
			}	
		}

		return view('schedule', [ 'dates' => $dates, 'data' => $data, 'halls' => $halls, 'movies' => $movies ] );
	}
}
