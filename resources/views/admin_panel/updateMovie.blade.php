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
    <div id="signupbox" style="margin-top:100px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">Add Movie Entries</div>
                                <!--<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>-->
                            </div>  
                            <div class="panel-body" >
                                <form id="signupform" class="form-horizontal" role="form" enctype='multipart/form-data' action="{{ url('/admin-panel/movies/save/'.$movie->id) }}" method="POST">
                                    
    								{!! csrf_field() !!}

                                    <div id="signupalert" style="display:none" class="alert alert-danger">
                                        <p>Error:</p>
                                        <span></span>
                                    </div>
                                        
                                    
                                          @if(count($errors) > 0)
                                        <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                        @endif
                                    
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="id" placeholder="Name" value={{ $movie->id }}>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-md-3 control-label">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $movie->name }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="genre" class="col-md-3 control-label">Genre</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="genre" placeholder="Genre" value="{{ $movie->genre }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="rating" class="col-md-3 control-label">Rating</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="rating" placeholder="Rating" value={{ $movie->rating }}>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="certificate" class="col-md-3 control-label">Certificate</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="certificate" placeholder="Certificate" value="{{ $movie->certificate }}">
                                        </div>
                                    </div>
                                    
									<div class="form-group">
                                        <label for="img_path" class="col-md-3 control-label">Certificate</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" name="img_path" placeholder="Uploaded image" value="{{ $movie->img_path }}">
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
                                            <button id="btn-signup" type="button" class="btn btn-info" onClick="$('#signupform').submit();"><i class="icon-hand-right"></i> &nbsp update</button>
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
    @stop
