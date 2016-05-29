<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use App\Hall;

class scheduleController extends Controller
{
    //
	public function nextweek()
	{
		$halls = Hall::all();
		$data = array();		

		foreach($halls as $hall)
		{
			$data[$hall->id][0] = $hall->id;
			$data[$hall->id][1] = DB::table('shows')
								->join('movie', 'shows.movie_id', '=', 'movie.id')
								->select('movie.name', 'shows.start_time', 'shows.end_time', 'shows.available_seat')
								->where('shows.hall_id', '=', $hall->id)
								->where('shows.start_time', '<', 'DATE_ADD(UTC_DATE(), INTERVAL 7 DAY)')
								->orderBy('shows.start_time')
								->get();
		}
		return view('schedule', [ 'data' => $data ]);
	}
}
