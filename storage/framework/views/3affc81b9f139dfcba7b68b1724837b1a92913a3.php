<?php $__env->startSection('title', 'this week'); ?>

<?php $__env->startSection('content'); ?>
	<script type="text/javascript">
		document.getElementById('schedule').className="active";
	</script>
	<div id="schedulebox" style="margin-top:100px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
		<div class="table-responsive">
			<?php foreach($data as $show_data): ?>
				<table class="table table-hover">
					<caption>Hall no. <?php echo e($show_data[0]); ?></caption>
					<tbody>
				<?php if(count($show_data[1]) > 0): ?>
					<?php foreach($show_data[1] as $show): ?>
						<tr>
							<td><?php echo e($show->movie_name); ?></td>
							<td><?php echo e($show->start_time); ?></td>
							<td><?php echo e($show->end_time); ?></td>
							<td><?php echo e($show->available_seat); ?></td>
							<td><a href="<?php echo e(url('login')); ?>">Book now</a></td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
						<tr>
							<td><strong>No show on upcoming 7 days</strong></td>
						</tr>
				<?php endif; ?>
					</tbody>
	  			</table>
			<?php endforeach; ?>
		</div>	
	</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>