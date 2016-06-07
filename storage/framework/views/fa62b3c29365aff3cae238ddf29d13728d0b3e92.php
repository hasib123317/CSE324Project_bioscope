<!DOCTYPE html>
<html>
<head>
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
</head>
<body>
	<?php echo $__env->yieldContent('content'); ?>
	<script src="<?php echo e(asset('js/jquery-1.11.1.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
</body>
</html>

