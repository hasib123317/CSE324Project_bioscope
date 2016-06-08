<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Movie;
use DB;

class Booking extends Model
{
    //
	protected $table = 'booking';
	public $timestamps = false;

	public static function getBookingMovieDescription()
	{
		return DB::select(
				DB::raw(
					"select b.id as id, b.user_id as user_id, b.show_id as show_id, s.start_time as show_time,  
					 m.genre as movie_genre, b.price as paid, b.token as token 
					 from booking b, shows s, movie m
					 where b.show_id = s.id and s.movie_id = m.id"
				)
			);
	}

	public static function getTotalRevenue()
	{
		return DB::select(
				DB::raw(
					"select SUM(price) as revenue from booking"
				)
			)[0]->revenue;
	}

	public static function getGenreBasedBookCount($genre)
	{
		return DB::select(
				DB::raw(
					"select COUNT(*) as count
					 from booking b, shows s, movie m
					 where b.show_id = s.id and s.movie_id = m.id and m.genre='$genre'"
				)
			)[0]->count;
	}

	public static function getBookingMovieDescriptionByToken($token)
	{
		return DB::select(
				DB::raw(
					"select b.id as id, b.user_id as user_id, b.show_id as show_id, s.start_time as show_time,  
					 m.genre as movie_genre, b.price as paid, b.token as token 
					 from booking b, shows s, movie m
					 where b.show_id = s.id and s.movie_id = m.id and b.token='$token'"
				)
			);
	}
}
