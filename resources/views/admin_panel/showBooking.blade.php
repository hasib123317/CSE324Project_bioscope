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

<div id="signupbox" style="margin-top:100px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
         <div class="panel-body" >
            <form id="signupform" class="form-horizontal" role="form" action="{{ url('/queryBooking') }}" method="POST">
               {!! csrf_field() !!}
               <div class="form-group">
                  <label for="token" class="col-md-3 control-label">Search By token</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" name="token" placeholder="token">
                  </div>
               </div>
               
               <!--<div class="form-group">
                  <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                  <div class="col-md-9">
                      <input type="text" class="form-control" name="icode" placeholder="">
                  </div>
                  </div>-->
               <div class="form-group">
                  <!-- Button -->                                        
                  <div class="col-md-offset-3 col-md-9">
                     <button id="btn-signup" type="button" class="btn btn-info" onClick="$('#signupform').submit();"><i class="icon-hand-right"></i> &nbsp Search</button>
                     <!--<span style="margin-left:8px;">or</span>-->  
                  </div>
               </div>
               <!--<div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                  <div class="col-md-offset-3 col-md-9">
                      <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                  </div>                                           
                      
                  </div>
                  -->
            </form>
         </div>
      </div>
   </div>
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
		                     <th>Token</th>
		                 </tr>
		                 @foreach($bookings as $booking)
		                 <tr>
		                   <td>{{ $booking->id }}</td>
		                   <td>{{ $booking->user_id }}</td>
		                   <td>{{ $booking->show_id }}</td>
		                   <td>{{ $booking->show_time }}</td>
						   <td>{{ $booking->movie_genre }}</td>
		                   <td>{{ $booking->paid }}</td>
						   <td>{{ $booking->token }}</td>
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
