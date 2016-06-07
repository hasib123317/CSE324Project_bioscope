<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">	
	<title><?php echo $__env->yieldContent('title'); ?></title>
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
                    Bioscope : A Cineplex Management Solution
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li id="home">
                        <a href="<?php echo e(url('/')); ?>">Home</a>
                    </li>
                    <li id="about">
                        <a href="<?php echo e(url('about')); ?>">About</a>
                    </li>
                    <li id="schedule">
                        <a href="<?php echo e(url('/week-schedule')); ?>">Show Schedule</a>
                    </li>
					<?php if(Auth::check() == false): ?>
						<li id="rating">
                        	<a href="<?php echo e(url('login')); ?>">Rating</a>
                    	</li>
					<?php else: ?>
						<li id="rating">
                        	<a href="<?php echo e(url('rate')); ?>">Rating</a>
                    	</li>
					<?php endif; ?>					
				
					<?php if(Auth::check() == false): ?>
						<li id="login">
                        	<a href="<?php echo e(url('login')); ?>">Login</a>
                    	</li>
					<?php endif; ?>

					<?php if(Auth::check()): ?>                    
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello <?php echo e(Auth::user()->name); ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="about-us">
                            <li><a href="<?php echo e(url('/seeProfile')); ?>">See profile</a></li>
                            <li><a href="<?php echo e(url('/logout')); ?>">logout</a></li>
                        </ul>
                    </li>
					<?php endif; ?>					
									
                </ul>


            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	<?php echo $__env->yieldContent('content'); ?>
	
	
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Sk. Adnan Hassan and Jaiaid Mobin 2016</p>
                </div>
            </div>
        </div>
    </footer>
	
	<script src="<?php echo e(asset('js/jquery-1.11.1.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
</body>
</html>
