@extends('layouts.header')

@section('title', 'this week')

@section('content')
	<script type="text/javascript">
		document.getElementById('schedule').className="active";
	</script>
	<div id="schedulebox" style="margin-top:100px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
		@if(Session::has('success'))
			<p>Congratulation! your booking is successful. Your transaction token no. {{ Session::get('token') }}</p>
		@else if(Session::has('error'))
			<p>Sorry booking is not successful</p>
		@endif
		<div class="table-responsive">
			@foreach($dates as $date)
				<table class="table table-hover table-striped">
					<caption>{{ $date }}</caption>
					<tbody>
						@foreach($halls as $hall)
							<tr class="success">
								<td align="center" width="100%"><strong>Hall {{ $data[$date][$hall->id]['hallName'] }}</strong></td>
							</tr>
							@if($data[$date][$hall->id]['showCount']>0)
								@foreach($movies as $movie)
									<tr>
										@if(count($data[$date][$hall->id][$movie->name])>0)
											<td class="active">{{ $movie->name }}</td>				
											@foreach($data[$date][$hall->id][$movie->name] as $scheduleList)
												<td class="active">{{ $scheduleList->showTime }}</td>
											@endforeach
											@for($l=4-count($data[$date][$hall->id][$movie->name]);$l>0;$l--)
												<td class="active"></td>
											@endfor
											<td class="active"><a href="{{ url('/booking/'.$movie->name).'/'.$date.'/'.$data[$date][$hall->id]['hallName'] }}">Book Now!</a></td>
										@endif
									</tr>
								@endforeach
							@else
								<tr class="active">
									<td align="center"><strong>No show on this day</strong></td>
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>
			@endforeach
		</div>	
	</div>
@stop

