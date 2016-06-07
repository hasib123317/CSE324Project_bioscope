@extends('layouts.header1')	

@section('content')
<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">


            <li >
                <a href="{{ url('admin-panel') }}" ><i class="fa fa-desktop "></i>Dashboard</a>
            </li>

            <li>
                <a href="{{ url('admin-profile') }}"><i class="fa fa-edit "></i>My Profile Page </a>
            </li>

        </ul>
    </div>

</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <div id="schedulebox" style="margin-top:100px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
              <div class="table-responsive">
		      <table class="table table-hover">
		             <caption><strong>Booking Entries</strong></caption>
		             <tbody>
		                 <tr>
							 <th>Booking ID</th>
		                     <th>User ID</th>
							 <th>Show ID</th>
							 <th>Show time</th>
		                     <th>Movie genre</th>
							 <th>Paid price</th>
		                     <th>Payment ID</th>
		                 </tr>
		                 @foreach($bookings as $booking)
		                 <tr>
		                   <td>{{ $booking->id }}</td>
		                   <td>{{ $booking->user_id }}</td>
		                   <td>{{ $booking->show_id }}</td>
		                   <td>{{ $booking->show_time }}</td>
						   <td>{{ $booking->movie_genre }}</td>
		                   <td>{{ $booking->paid }}</td>
						   <td>{{ $booking->payment_id }}</td>
		                  </tr>
		                 @endforeach
		           </tbody>
		       </table>

		   	<p>
				Total sale from this site :
				@if($revenue!=NULL) 
					{{ $revenue }} unit
				@else
					0 unit
				@endif					
		   	</p>
		   	<p>Ticket sale count for different movie genre:</p>
			<ul>
				<li>sci-fi : {{ $movieData['sci-fi'] }}</li>
				<li>action : {{ $movieData['action'] }}</li>
				<li>fantasy : {{ $movieData['fantasy'] }}</li>
				<li>animation : {{ $movieData['animation'] }}</li>
				<li>drama : {{ $movieData['drama'] }}</li>
			</ul>

       </div>	
   </div>
</div>
</div>              
<!-- /. ROW  -->


<!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
@stop
