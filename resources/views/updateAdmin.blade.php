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
                            <div class="panel-heading">
                                <div class="panel-title">Edit Admin Entries</div>
                                <!--<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>-->
                            </div>  
                            <div class="panel-body" >
                                <form id="signupform" class="form-horizontal" role="form" action="{{ url('/admin-profile/save/') }}" method="POST">
                                    
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
                                        <label for="name" class="col-md-3 control-label">name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-md-3 control-label">email</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-md-3 control-label">Password</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_no" class="col-md-3 control-label">Phone No</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="phone_no" placeholder="Phone No" value="{{ Auth::user()->phone_no }}">
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