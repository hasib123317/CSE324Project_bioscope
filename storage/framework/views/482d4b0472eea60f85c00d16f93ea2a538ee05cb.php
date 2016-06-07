

<?php $__env->startSection('title', 'home'); ?>

<?php $__env->startSection('content'); ?>
	<div class="jumbotron feature">
    	<div class="container">
    		<h1 class="intro-text text-center">Now Showing  </h1>
        	<!--<?//php $nivo->render_slides() ?>-->
    	</div>
	</div>
<?php $__env->stopSection(); ?>

 <!--<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Sk. Adnan Hassan and A.S.M Ahsanul Haque 2015</p>
                </div>
            </div>
        </div>
    </footer>
 -->

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>