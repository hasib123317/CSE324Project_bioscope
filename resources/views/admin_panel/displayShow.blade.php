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
                <a href="{{ url('admin-profile') }}"><i class="fa fa-edit "></i>My Profile Page</a>
            </li>

        </ul>
    </div>

</nav>
<!-- /. NAV SIDE  -->
<div id="signupbox" style="margin-top:100px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
         <div class="panel-body" >
            <form id="signupform" class="form-horizontal" role="form" action="{{ url('/queryShow') }}" method="POST">
               {!! csrf_field() !!}
               <div class="form-group">
                  <label for="hall" class="col-md-3 control-label">Search By Hall</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" name="hall" placeholder="hall">
                  </div>
               </div>

               <div class="form-group">
                  <label for="date" class="col-md-3 control-label">Search By Date</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" name="date" placeholder="date">
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
                      <th>language</th>
                      <th>available seat</th>
                    </tr>
                    @foreach($shows as $show)
                    <tr>
                      <td>{{ $show->movie_id }}</td>
                      <td>{{ $show->hall_id }}</td>
                      <td>{{ $show->start_time }}</td>
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