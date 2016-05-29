@extends('layouts.header')

@section('title', 'this week')

@section('content')
	<script type="text/javascript">
		document.getElementById('schedule').className="active";
	</script>
	<div id="schedulebox" style="margin-top:100px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
		<div class="table-responsive">
			@foreach($data as $show_data)
				<table class="table table-hover">
					<caption>Hall no. {{ $show_data[0] }}</caption>
					<tbody>
				@if(count($show_data[1]) > 0)
					@foreach($show_data[1] as $show)
						<tr>
							<td>{{ $show->movie_name }}</td>
							<td>{{ $show->start_time }}</td>
							<td>{{ $show->end_time }}</td>
							<td>{{ $show->available_seat }}</td>
							<td><a href="{{ url('login') }}">Book now</a></td>
						</tr>
					@endforeach
				@else
						<tr>
							<td><strong>No show on upcoming 7 days</strong></td>
						</tr>
				@endif
					</tbody>
	  			</table>
			@endforeach
		</div>	
	</div>
@stop

