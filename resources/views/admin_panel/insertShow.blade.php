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
                                <div class="panel-title">Add Show</div>
                                <!--<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>-->
                            </div>  
                            <div class="panel-body" >
                                <form id="signupform" class="form-horizontal" role="form" action="{{ url('/admin-panel/stub') }}" method="POST">
                                    
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
                                        <label for="seat" class="col-md-3 control-label">Movie</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="sel1" name="movie">
                                                @foreach($movies as $movie)
                                                    <option>{{ $movie->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="seat" class="col-md-3 control-label">Hall</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="sel1" name="hall">
                                                @foreach($halls as $hall)
                                                    <option>{{ $hall->id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="regular_ticket_price" class="col-md-3 control-label">Start time</label>
                                        <div class="col-md-9">
                                            <p id="datepair">
                                                <input type="text" class="date start">
                                                <input type="text" class="time start">
                                            </p>
                                        </div>
                                    </div>
                                    <script src={{ asset('js/datepair.js') }}></script>
                                    <script src={{ asset('js/jquery.datepair.js') }}></script>
                                    <script>
                                        // initialize input widgets first
                                        $('#datepair.time').timepicker({
                                            'showDuration': true,
                                            'timeFormat': 'g:ia'
                                        });

                                        $('#datepair .date').datepicker({
                                            'format': 'yyyy-m-d',
                                            'autoclose': true
                                        });

                                        // initialize datepair
                                        $('#datepair').datepair();
                                    </script>
                                    <div class="form-group">
                                        <label for="regular_ticket_price" class="col-md-3 control-label">Language</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="regular_ticket_price" placeholder="Regular Ticket Price">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="regular_ticket_price" class="col-md-3 control-label">Available seat</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="regular_ticket_price" placeholder="Regular Ticket Price">
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
                                            <button id="btn-signup" type="button" class="btn btn-info" onClick="$('#signupform').submit();"><i class="icon-hand-right"></i> &nbsp Insert</button>
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