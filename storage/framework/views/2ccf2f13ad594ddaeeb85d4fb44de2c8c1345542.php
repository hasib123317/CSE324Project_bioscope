<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo e(asset('css/font-awesome.css')); ?>" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
	<div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                    <span class="glyphicon glyphicon-fire"></span> 
                    Bioscope : A Cineplex Management Solution
                	</a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="<?php echo e(url('logout')); ?>" style="color:#fff;">LOGOUT</a>  
                </span>
            </div>
        </div>
     	<?php echo $__env->yieldContent('content'); ?>
	</div>
</body>
	<!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo e(asset('js/jquery-1.10.2.js')); ?>"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script> 
</html>
