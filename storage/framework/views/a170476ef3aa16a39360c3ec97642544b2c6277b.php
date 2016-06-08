<?php $__env->startSection('title', 'rate a movie'); ?>

<?php $__env->startSection('content'); ?>
<div class="jumbotron feature">       
<div class="container">
	<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
					<li class="active-link">
                    	<a><i class="fa fa-desktop ">Select the movie you want to rate</i></a>
                    </li>
                 	<?php foreach($movies as $movie): ?>

                    	<li class="active-link">
                    	    <button class="btn btn-success" onClick="document.getElementById('name').value='<?php echo e($movie->name); ?>';"><i class="fa fa-desktop "><?php echo e($movie->name); ?></i></button><p>The Current Rating is:<?php echo e($movie->rating); ?></p>
                    	</li>
                   	<?php endforeach; ?>
                </ul>
           </div>
    </nav>

	<script type="text/javascript">
		document.getElementById('rating').className="active";
	</script>
	<div class="container">    
        <div id="loginbox" style="margin-top:100px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >    

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" action="<?php echo e(url('/rating-done')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

														
                            <div class="input-group">
                                 <label for="rating" class="control-label">Rate This</label>
    							 <input id="rating" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="1">
                            </div>
							<input id="name" name="name" type="hidden">

							<div style="margin-top:10px" class="form-group">
                                 <!-- Button -->
									
                                 <div class="col-sm-12 controls">
                                     <a id="btn-login" onClick="$('#loginform').submit();" class="btn btn-success">Rate!</a>
                                     <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->
								 </div>
                            </div> 
                        </form>
					</div>                     
             </div>  
        </div>
    </div>
</div>
</div>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link href="<?php echo e(asset('css/star-rating.css')); ?>" media="all" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="<?php echo e(asset('js/star-rating.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset('js/jquery-1.11.1.min.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>