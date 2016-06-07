<?php $__env->startSection('title', 'booking'); ?>

<?php $__env->startSection('content'); ?>
	<script type="text/javascript">
		document.getElementById('login').className="";
	</script>
	<div class="container">    
        <div id="oginbox" style="margin-top:100px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Please give the necessary info to complete booking</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" action="<?php echo e(url('/payment')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

							
                            <input type="hidden" class="form-control" name="date" value="<?php echo e($date); ?>"/>
							<input type="hidden" class="form-control" name="hall" value="<?php echo e($hall); ?>"/>
						
							<div style="margin-bottom: 25px" class="input-group">
								 <label for="movie name" class="col-md-3 control-label">Movie</label>
								 <div class="col-md-9">
                                 	<input type="text" class="form-control" name="movie" value="<?php echo e($movie); ?>" disabled/>
								 </div>                                        
                            </div>

							<div style="margin-bottom: 25px" class="input-group">
								 <label for="ticket price" class="col-md-3 control-label">price</label>
								 <div class="col-md-9">
                                 	<input id="ticketPrice" type="text" class="form-control" name="ticketPrice" value="" readonly/>
								 </div>                                        
                            </div>
							
    						<div class="input-group">
                                 <label for="show time" class="col-md-3 control-label">show time</label>
                                 <div class="col-md-9">
                                      <select class="form-control" id="sel1" name="time">
                                          <?php foreach($showTimes as $showTime): ?>
                                               <option><?php echo e($showTime->showTime); ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                 </div>
                            </div>							
							
							<div class="input-group">
								 <label class="radio-inline"><input type="radio" onClick="document.getElementById('ticketPrice').value=<?php echo e($hallprice['regular']); ?>;" name="optradio" value="regular">Regular class</label>
								 <label class="radio-inline"><input type="radio" onClick="document.getElementById('ticketPrice').value=<?php echo e($hallprice['premium']); ?>;" name="optradio" value="premium">Premium class</label>
							</div><!-- /input-group -->
							<?php if(count($errors) > 0): ?>
								<ul>
								<?php foreach($errors->all() as $error): ?>
									<li><?php echo e($error); ?></li>
								<?php endforeach; ?>
								</ul>
                            <?php endif; ?>
                            
								
                            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
									
                                 <div class="col-sm-12 controls">
                                 <button id="btn-login" onClick="$('#loginform').submit();" class="btn btn-success" value="loginbutton">Submit</button>
                                      <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->

                                 </div>
                            </div>

                       </form>
					  </div>                     
              	</div>  
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>