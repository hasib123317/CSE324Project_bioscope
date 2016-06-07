    
    <?php $__env->startSection('content'); ?>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">


                <li >
                    <a href="<?php echo e(url('admin-panel')); ?>" ><i class="fa fa-desktop "></i>Dashboard</a>
                </li>

                <li>
                    <a href="<?php echo e(url('admin-profile')); ?>"><i class="fa fa-edit "></i>My Profile Page</a>
                </li>

            </ul>
        </div>

    </nav>
    <!-- /. NAV SIDE  -->
	<link href="<?php echo e(asset('css/bootstrap-datetimepicker.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <div id="signupbox" style="margin-top:100px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">Add Show</div>
                                <!--<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>-->
                            </div>  
                            <div class="panel-body" >
                                <form id="signupform" class="form-horizontal" role="form" action="<?php echo e(url('/createShow')); ?>" method="POST">
                                    
    								<?php echo csrf_field(); ?>


                                    <div id="signupalert" style="display:none" class="alert alert-danger">
                                        <p>Error:</p>
                                        <span></span>
                                    </div>
                                        
                                    
                                    <?php if(count($errors) > 0): ?>
                                        <ul>
                                        <?php foreach($errors->all() as $error): ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>  
                                    <div class="form-group">
                                        <label for="movie" class="col-md-3 control-label">Movie</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="sel1" name="movie">
                                                <?php foreach($movies as $movie): ?>
                                                    <option><?php echo e($movie->name); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="hall" class="col-md-3 control-label">Hall</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="sel1" name="hall">
                                                <?php foreach($halls as $hall): ?>
                                                    <option><?php echo e($hall->id); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                   
									<script src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
									<script src="<?php echo e(asset('js/jquery-1.11.1.min.js')); ?>"></script>			
									<script src="<?php echo e(asset('js/bootstrap-datetimepicker.min.js')); ?>"></script>
									<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>

	
									<div class="form-group">
										<label for="start time" class="col-md-3 control-label">start time</label>
										<div class="col-md-9">
											<div class="input-group date" id="example">
											  	<input type="text" class="form-control" name="start_time"></input>
											  	<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											  	</span>
											</div>
										</div>
									</div>
									<script type="text/javascript">$('#example').datetimepicker();</script>

                                    <div class="form-group">
                                        <label for="language" class="col-md-3 control-label">Language</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="language" placeholder="Language">
                                        </div>
                                    </div>
  
                                    <div class="form-group">
                                        <!-- Button -->                                        
                                        <div class="col-md-offset-3 col-md-9">
                                            <button id="btn-signup" type="button" class="btn btn-info" onClick="$('#signupform').submit();"><i class="icon-hand-right"></i> &nbsp Insert</button>
                                            <!--<span style="margin-left:8px;">or</span>-->  
                                        </div>
                                    </div>
                                    
                                </form>
                             </div>
                        </div>                
             </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>