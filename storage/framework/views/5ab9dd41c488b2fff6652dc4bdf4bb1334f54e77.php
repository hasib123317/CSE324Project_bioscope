<?php $__env->startSection('title', 'home'); ?>
<?php $__env->startSection('content'); ?>
<script type="text/javascript">
   document.getElementById('home').className="active";
</script>
<div class="jumbotron feature">
   <div class="container">
      <h1 class="intro-text text-center">Now Showing  </h1>
      <!--<center><img src="http://localhost/ci2/images/the_jungle_book.jpg"></center>-->
      <div id="mainCarousel" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <?php foreach($movies as $index => $movie): ?>
            <div class="item <?php if($index == 0): ?> <?php echo e('active'); ?> <?php endif; ?>">
             <a href="week-schedule">
               <img style="width: 100%;" src="<?php echo e($movie->img_path); ?>" alt="<?php echo e($movie->name); ?>">
             </a>
            </div>
            <?php endforeach; ?>
         </div>
         <a class="left carousel-control" href="#mainCarousel" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left"></span>
         </a>
         <a class="right carousel-control" href="#mainCarousel" data-slide="next">
         <span class="glyphicon glyphicon-chevron-right"></span>
         </a>
      </div>
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