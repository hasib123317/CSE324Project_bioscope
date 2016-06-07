	

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
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <div id="schedulebox" style="margin-top:100px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
              <div class="table-responsive">
                <table class="table table-hover">
                 <caption><strong>Hall Entries</strong></caption>
                 <a href="<?php echo e(url('').'/admin-panel/halls/insertHall'); ?>">Add Hall Entries</a>
                 <tbody>
                     <tr>
                         <th>Hall No</th>
                         <th>Seat Number</th>
                         <th>Premium Ticket Price</th>
                         <th>Regular Ticket Price</th>
                         <th></th>
                         <th></th>
                     </tr>
                     <?php foreach($halls as $hall): ?>
                     <tr>
                       <td><?php echo e($hall->id); ?></td>
                       <td><?php echo e($hall->seat); ?></td>
                       <td><?php echo e($hall->premium_ticket_price); ?></td>
                       <td><?php echo e($hall->regular_ticket_price); ?></td>
                       <td><a href="<?php echo e(url('/admin-panel/halls/edit/'.$hall->id)); ?>">edit</a></td>
                       <td><a href="<?php echo e(url('').'/admin-panel/halls/delete/'.$hall->id); ?>">delete</a></td>
                   </tr>
                   <?php endforeach; ?>
                   
               </tbody>
           </table>
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