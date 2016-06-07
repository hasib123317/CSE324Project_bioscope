@extends('layouts.header1') 
@section('content')
<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
   <div class="sidebar-collapse">
      <ul class="nav" id="main-menu">
         <li >
            <a href="{{ url('admin-panel') }}" ><i class="fa fa-desktop "></i>Dashboard </a>
         </li>
         <li>
            <a href="{{ url('admin-profile') }}"><i class="fa fa-edit "></i>My Profile Page </a>
         </li>
      </ul>
   </div>
</nav>
<!-- /. NAV SIDE  -->

   <div id="signupbox" style="margin-top:100px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
         <div class="panel-body" >
            <form id="signupform" class="form-horizontal" role="form" action="{{ url('/queryMovie') }}" method="POST">
               {!! csrf_field() !!}
               <div class="form-group">
                  <label for="rating" class="col-md-3 control-label">Search By Rating</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" name="rating" placeholder="rating greater than or equal">
                  </div>
               </div>
               <div class="form-group">
                  <label for="genre" class="col-md-3 control-label">Search By Genre</label>
                  <div class="col-md-9">
                     <select class="form-control" id="sel1" name="genre">
                        <option>sci-fi</option>
                        <option>action</option>
                        <option>fantasy</option>
                        <option>animation</option>
                        <option>drama</option>
                     </select>
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
                        <caption><strong>Movie Entries</strong></caption>
                        <a href="{{ url('').'/admin-panel/movies/insertMovie' }}">Add Movie Entries</a>
                        <tbody>
                           <tr>
                              <th>Movie Name</th>
                              <th>Genre</th>
                              <th>Rating</th>
                              <th>Certificate</th>
                              <th></th>
                              <th></th>
                           </tr>
                           @foreach($movies as $movie)
                           <tr>
                              <td>{{ $movie->name }}</td>
                              <td>{{ $movie->genre }}</td>
                              <td>{{ $movie->rating }}</td>
                              <td>{{ $movie->certificate }}</td>
                              <td><a href="{{ url('/admin-panel/movies/edit/'.$movie->id) }}">edit</a></td>
                              <td><a href="{{ url('').'/admin-panel/movies/delete/'.$movie->id }}">delete</a></td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /. ROW  -->
      <!-- /. ROW  -->           
   </div>
   <!-- /. PAGE INNER  -->
<!-- /. PAGE WRAPPER  -->
@stop