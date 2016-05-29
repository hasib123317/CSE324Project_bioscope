@extends('layouts.header1')	

@section('content')
<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">


            <li >
                <a href="{{ url('admin-panel') }}" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
            </li>

            <li>
                <a href="{{ url('admin-profile') }}"><i class="fa fa-edit "></i>My Profile Page  <span class="badge">Included</span></a>
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
                 <caption><strong>Show entries</strong></caption>
                 <a href="{{ url('').'/admin-panel/shows/insertShow' }}">Add Show</a>
                  <tbody>
                    <tr>
                      <th>Movie</th>
                      <th>Hall</th>
                      <th>Start time</th>
                      <th>End time</th>
                      <th>language</th>
                      <th>available seat</th>
                    </tr>
                    @foreach($shows as $show)
                    <tr>
                      <td>{{ $show->movie_id }}</td>
                      <td>{{ $show->hall_id }}</td>
                      <td>{{ $show->start_time }}</td>
                      <td>{{ $show->end_time }}</td>
                      <td>{{ $show->language }}</td>
                      <td>{{ $show->available_seat }}</td>
                      <td><a href="{{ url('').'/admin-panel/shows/edit/'.$show->id }}">edit</a></td>
                      <td><a href="{{ url('').'/admin-panel/users/delete/'.$show->id }}">delete</a></td>
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
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