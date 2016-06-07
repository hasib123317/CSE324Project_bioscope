

<?php $__env->startSection('title', 'about us'); ?>

<?php $__env->startSection('content'); ?>
    <div class="jumbotron feature">
    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h1 class="intro-text text-center">About Cineplex Management  </h1>
                    <hr>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive img-border-left" src="http://localhost/ci2/images/Movie-Theatre.jpg" alt="">
                </div>
                <div class="col-md-6">
                    <p>We have made this website as a part of our database project.</p>
                    <p>Any feedback will be welcome.</p>
                    <p>This project would not be possible without our project supervisor Tarikul Islam Papon. We want to take this opportunity to thank him.</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Our
                        <strong>Team</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="http://localhost/ci2/images/tarique.jpg" alt="">
                    <h3>A. S. M. Ahsanul Haque
                        <small>1205021</small>
                    </h3>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="http://localhost/ci2/images/papon_vai.jpg" alt="">
                    <h3>Tarikul Islam Papon
                        <small>Project Supervisor</small>
                    </h3>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="http://localhost/ci2/images/adnan.jpg" alt="">
                    <h3>SK. Adnan Hassan
                        <small>1205059</small>
                    </h3>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        </div>
    </div>
    <!-- /.container -->
	
	<!--
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Sk. Adnan Hassan and A.S.M Ahsanul Haque 2015</p>
                </div>
            </div>
        </div>
    </footer>
	-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>