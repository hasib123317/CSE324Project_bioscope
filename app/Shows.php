<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Movie;
use App\Hall;
use DB;

class Shows extends Model
{
    //
	protected $table = 'shows';
	public $timestamps = false;

	public static function bookingData($movie, $date, $hall)
	{
		return DB::select( 
					DB::raw(
						"select DATE_FORMAT(shows.start_time,'%h:%i %p') as showTime  
						from shows inner join movie on shows.movie_id = movie.id 
<<<<<<< HEAD
						where movie.name = '$movie' and shows.hall_id = $hall and 
						DATE_FORMAT(shows.start_time, '%d-%M-%Y') = '$date' and
						shows.available_seat>0 order by showTime"
=======
						where movie.name = '$movie' and shows.hall_id = $hall and shows.start_time>=now() and
						DATE_FORMAT(shows.start_time, '%d-%M-%Y') = '$date' order by showTime"
>>>>>>> f99c6c8c3e530cc3271041daf24b879f25227125
   					) 
			  );
	}

	public static function getIdByDateTimeHall($date, $hall, $time)
	{
		return DB::select( 
					DB::raw(
						"select id  from shows 
						where hall_id = $hall and 
						DATE_FORMAT(start_time, '%d-%M-%Y') = '$date' and
						DATE_FORMAT(start_time, '%h:%i %p') = '$time'"
   					) 
			  );
	}
}
