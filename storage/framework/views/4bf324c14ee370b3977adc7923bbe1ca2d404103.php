<style type="text/css">
    table {
    width:100%;
    padding: 0;
    margin: 0;
    border: 0;
    border-collapse: collapse;
    }

    td {
    width:176px;
    padding: 0 10px 0 0;
    margin: 0;
    border: 0;
    }
    td.last {
    padding: 0;
    margin: 0;
    border: 0;
    }

</style>
<?php $__env->startSection('title', 'this week'); ?>

<?php $__env->startSection('content'); ?>
	<script type="text/javascript">
		document.getElementById('schedule').className="active";
	</script>
	<div id="schedulebox" style="margin-top:100px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
		<div class="table-responsive">
			<?php foreach($dates as $date): ?>
				<table class="table table-hover table-striped">
					<caption><?php echo e($date); ?></caption> 
					<tbody>
						<?php foreach($halls as $hall): ?>
							<tr class="success">
								<td align="center" width="100%"><strong>Hall <?php echo e($data[$date][$hall->id]['hallName']); ?></strong></td>
							</tr>
							<?php if($data[$date][$hall->id]['showCount']>0): ?>
								<?php foreach($movies as $movie): ?>
									<tr>
										<?php if(count($data[$date][$hall->id][$movie->name])>0): ?>
											<td style="width:30%"><?php echo e($movie->name); ?></td>				
											<?php foreach($data[$date][$hall->id][$movie->name] as $scheduleList): ?>
												<td><?php echo e($scheduleList->showTime); ?></td>
											<?php endforeach; ?>
											<?php for($l=4-count($data[$date][$hall->id][$movie->name]);$l>0;$l--): ?>
												<td></td>
											<?php endfor; ?>
											<td class="active"><a href="<?php echo e(url('/booking/'.$movie->name).'/'.$date.'/'.$data[$date][$hall->id]['hallName']); ?>">Book Now!</a></td>
										<?php endif; ?>
									</tr>
								<?php endforeach; ?>
							<?php else: ?>
								<tr class="active">
									<td align="center"><strong>No show on this day</strong></td>
								</tr>
							<?php endif; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php endforeach; ?>
		</div>	
	</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>