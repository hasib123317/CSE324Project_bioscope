@extends('layouts.header')

@section('title', 'login')

@section('content')
	<script type="text/javascript">
		document.getElementById('login').className="active";
	</script>
	<div class="container">    
        <div id="loginbox" style="margin-top:100px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >    

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" action="{{ url('#') }}" method="POST">
                            {!! csrf_field() !!}
                            <div class="input-group">
                                 <label for="input-1" class="control-label">Rate This</label>
    							 <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="1">
                            </div>
							<div style="margin-top:10px" class="form-group">
                                 <!-- Button -->
									
                                 <div class="col-sm-12 controls">
                                     <a id="btn-login" onClick="$('#loginform').submit();" class="btn btn-success" value="loginbutton">Login</a>
                                     <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->
								 </div>
                            </div> 
                        </form>
					</div>                     
                 </div>  
          </div>
     </div>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link href="{{ asset('css/star-rating.css') }}" media="all" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="{{ asset('js/star-rating.js') }}" type="text/javascript"></script>
@stop

