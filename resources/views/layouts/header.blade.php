<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">	
	<title>@yield('title')</title>
</head>

<body>
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <span class="glyphicon glyphicon-fire"></span> 
                    Logo
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li id="home">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li id="about">
                        <a href="{{ url('about') }}">About</a>
                    </li>
                    <li id="schedule">
                        <a href="{{ url('/week-schedule') }}">Show Schedule</a>
                    </li>
					@if(Auth::check() == false)
						<li id="rating">
                        	<a href="{{ url('login') }}">Rating</a>
                    	</li>
					@else
						<li id="rating">
                        	<a href="{{ url('rate') }}">Rating</a>
                    	</li>
					@endif					
				
					@if(Auth::check() == false)
						<li id="login">
                        	<a href="{{ url('login') }}">Login</a>
                    	</li>
					@endif

					@if(Auth::check())                    
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{ Auth::user()->name }}<span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="about-us">
                            <li><a href="">See profile</a></li>
                            <li><a href="{{ url('/logout') }}">logout</a></li>
                        </ul>
                    </li>
					@endif					
									
                </ul>

                <!-- Search -->
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	@yield('content')
	
	
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Sk. Adnan Hassan and Jaiaid Mobin 2016</p>
                </div>
            </div>
        </div>
    </footer>
	
	<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
