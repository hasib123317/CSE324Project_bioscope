@extends('layouts.header')
<style type="text/css">
    table {
    width:100%;
    padding: 0;
    margin: 0;
    border: 0;
    border-collapse: collapse;
    }

    td {
    width:176px;
    padding: 0 10px 0 0;
    margin: 0;
    border: 0;
    }
    td.last {
    padding: 0;
    margin: 0;
    border: 0;
    }

</style>
@section('title', 'this week')

@section('content')
	<script type="text/javascript">
		document.getElementById('schedule').className="active";
	</script>

	

	<div id="schedulebox" style="margin-top:100px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
		@if(Session::has('success'))
			<p>Congratulation! your booking is successful. Your transaction token no. {{ Session::get('token') }}</p>
<<<<<<< HEAD
		@elseif(Session::has('error'))
			<p>Sorry booking is not successful</p>
=======
		@else if(Session::has('error'))
			<p>Sorry! your booking is unsuccessful.</p>
>>>>>>> f99c6c8c3e530cc3271041daf24b879f25227125
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
											<td style="width:30%">{{ $movie->name }}</td>				
											@foreach($data[$date][$hall->id][$movie->name] as $scheduleList)
												<td>{{ $scheduleList->showTime }}</td>
											@endforeach
											@for($l=4-count($data[$date][$hall->id][$movie->name]);$l>0;$l--)
												<td></td>
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

