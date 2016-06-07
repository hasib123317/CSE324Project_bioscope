<?php $__env->startSection('title', 'about us'); ?>

<?php $__env->startSection('content'); ?>
    <div class="jumbotron feature">
    <div class="container">
		<script type="text/javascript">
			document.getElementById('about').className="active";
		</script>
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
                    <p>We have made this website as a part of our Software Development  project.</p>
                    <p>Any feedback will be welcome.</p>
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
                    <img class="img-responsive" src="http://localhost/ci2/images/mobin.jpg" alt="">
                    <h3>Jaiaid Mobin
                        <small>1205019</small>
                    </h3>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="http://localhost/ci2/images/rakin_sir.jpg" alt="">
                    <h3>‎Chowdhury Md Rakin Haider
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>