    
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
    <!-- /. NAV SIDE  -->
    <div id="signupbox" style="margin-top:100px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">Add Movie Entries</div>
                                <!--<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>-->
                            </div>  
                            <div class="panel-body" >
                                <form id="signupform" class="form-horizontal" role="form" enctype='multipart/form-data' action="<?php echo e(url('/createMovie')); ?>" method="POST">
                                    
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
                                        <label for="name" class="col-md-3 control-label">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name" placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="genre" class="col-md-3 control-label">Genre</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="genre" placeholder="Genre">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="rating" class="col-md-3 control-label">Rating</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="rating" placeholder="Rating">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="certificate" class="col-md-3 control-label">Certificate</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="certificate" placeholder="Certificate">
                                        </div>
                                    </div>
                                    
									<div class="form-group">
                                        <label for="img_path" class="col-md-3 control-label">Image file</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" name="img_path" placeholder="Upload movie image">
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
                                            <button id="btn-signup" type="button" class="btn btn-info" onClick="$('#signupform').submit();"><i class="icon-hand-right"></i> &nbsp Insert</button>
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
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>