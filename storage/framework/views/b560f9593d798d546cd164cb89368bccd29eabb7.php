	

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
<div class="container">
<div id="signupbox" style="margin-top:100px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
         <div class="panel-body" >
            <form id="signupform" class="form-horizontal" role="form" action="<?php echo e(url('/queryUser')); ?>" method="POST">
               <?php echo csrf_field(); ?>

               <div class="form-group">
                  <label for="book_count" class="col-md-3 control-label">Search By Bookcount</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" name="book_count" placeholder="bookcount greater than or equal">
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
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <div id="schedulebox" style="margin-top:100px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
              <div class="table-responsive">
                <table class="table table-hover">
                 <caption><strong>User Entries</strong></caption>
                 
                 <tbody>
                     <tr>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Book Count</th>
                         <th>Phone no</th>
                         <th></th>
                    
                     </tr>
                     <?php foreach($users as $user): ?>
                     <tr>
                      <?php if($user->isadmin==false): ?>
                    
                       <td><?php echo e($user->name); ?></td>
                       <td><?php echo e($user->email); ?></td>
                       <td><?php echo e($user->book_count); ?></td>
                       <td><?php echo e($user->phone_no); ?></td>
                       <td><a href="<?php echo e(url('').'/admin-panel/users/delete/'.$user->id); ?>">delete</a></td>
                      <?php endif; ?>
                   </tr>
                   <?php endforeach; ?>
                   
               </tbody>
           </table>
       </div>	
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