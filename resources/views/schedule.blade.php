@extends('layouts.header')

@section('title', 'this week')

@section('content')
	<script type="text/javascript">
		document.getElementById('schedule').className="active";
	</script>
	<div id="schedulebox" style="margin-top:100px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
		<div class="table-responsive">
			@foreach($dates as $date)
				<table class="table table-hover">
					<caption>{{ $date }}</caption>
					<tbody>
						@foreach($halls as $hall)
							<tr class="success">
								<td align="center"><strong>Hall {{ $data[$date][$hall->id]['hallName'] }}</strong></td>
							</tr>
							@foreach($movies as $movie)
								<tr>
									{{-- @if(count($data[$date][$hall->id][$movie->name])>0)
									<td>{{ $movie->name }}</td>
		
									@foreach($data[$date][$hall->id][$movie->name] as $scheduleList)
										<td>{{ $scheduleList->showTime }}</td>
									@endforeach
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									@endif
									--}}
								</tr>
							@endforeach
						@endforeach
					</tbody>
				</table>
			@endforeach
		</div>	
	</div>
@stop

