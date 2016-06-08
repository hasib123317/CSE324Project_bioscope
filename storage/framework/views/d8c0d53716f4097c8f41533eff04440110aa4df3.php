	

<?php $__env->startSection('content'); ?>
<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">


            <li >
                <a href="<?php echo e(url('admin-panel')); ?>" ><i class="fa fa-desktop "></i>Dashboard</a>
            </li>

            <li>
                <a href="<?php echo e(url('admin-profile')); ?>"><i class="fa fa-edit "></i>My Profile Page </a>
            </li>

        </ul>
    </div>

</nav>

<div id="signupbox" style="margin-top:100px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
         <div class="panel-body" >
            <form id="signupform" class="form-horizontal" role="form" action="<?php echo e(url('/queryBooking')); ?>" method="POST">
               <?php echo csrf_field(); ?>

               <div class="form-group">
                  <label for="token" class="col-md-3 control-label">Search By token</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" name="token" placeholder="token">
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
                     <button id="btn-signup" type="button" class="btn btn-info" onClick="$('#signupform').submit();"><i class="icon-hand-right"></i> &nbsp Search</button>
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
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <div id="schedulebox" style="margin-top:100px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
              <div class="table-responsive">
		      <table class="table table-hover">
		             <caption><strong>Booking Entries</strong></caption>
		             <tbody>
		                 <tr>
							 <th>Booking ID</th>
		                     <th>User ID</th>
							 <th>Show ID</th>
							 <th>Show time</th>
		                     <th>Movie genre</th>
							 <th>Paid price</th>
		                     <th>Token</th>
		                 </tr>
		                 <?php foreach($bookings as $booking): ?>
		                 <tr>
		                   <td><?php echo e($booking->id); ?></td>
		                   <td><?php echo e($booking->user_id); ?></td>
		                   <td><?php echo e($booking->show_id); ?></td>
		                   <td><?php echo e($booking->show_time); ?></td>
						   <td><?php echo e($booking->movie_genre); ?></td>
		                   <td><?php echo e($booking->paid); ?></td>
						   <td><?php echo e($booking->token); ?></td>
		                  </tr>
		                 <?php endforeach; ?>
		           </tbody>
		       </table>

		   	<p>
				Total sale from this site :
				<?php if($revenue!=NULL): ?> 
					<?php echo e($revenue); ?> unit
				<?php else: ?>
					0 unit
				<?php endif; ?>					
		   	</p>
		   	<p>Ticket sale count for different movie genre:</p>
			<ul>
				<li>sci-fi : <?php echo e($movieData['sci-fi']); ?></li>
				<li>action : <?php echo e($movieData['action']); ?></li>
				<li>fantasy : <?php echo e($movieData['fantasy']); ?></li>
				<li>animation : <?php echo e($movieData['animation']); ?></li>
				<li>drama : <?php echo e($movieData['drama']); ?></li>
			</ul>

       </div>	
   </div>
</div>
</div>              
<!-- /. ROW  -->


<!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>