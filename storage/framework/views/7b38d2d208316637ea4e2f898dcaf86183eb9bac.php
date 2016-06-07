<?php $__env->startSection('title', 'Profile'); ?>
<?php $__env->startSection('content'); ?>
<div class="jumbotron feature">       
<div class="container">
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">  
                    </div>
                </div>
        <h2>My Profile Page </h2> 
        <a href="<?php echo e(url('/member-profile/edit')); ?>">Edit</a>
         <div class="row">

          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">First Name:</label>
              <div class="col-xs-7 controls">Member</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Last Name:</label>
              <div class="col-xs-7 controls">The user</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">User Name:</label>
              <div class="col-xs-7 controls"><?php echo e(Auth::user()->name); ?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Email:</label>
              <div class="col-xs-7 controls"><?php echo e(Auth::user()->email); ?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">City:</label>
              <div class="col-xs-7 controls">Dhaka</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Country:</label>
              <div class="col-xs-7 controls">Bangladesh</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Birthday:</label>
              <div class="col-xs-7 controls">Jan 22, 1994</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Interests:</label>
              <div class="col-xs-7 controls">Basketball, Web, Design, Gaming etc.</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Phone:</label>
              <div class="col-xs-7 controls"><?php echo e(Auth::user()->phone_no); ?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
        </div>              
                 <!-- /. ROW  -->
              
                 <!-- /. ROW  -->           
            </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>