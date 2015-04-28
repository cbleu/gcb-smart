<?php defined('SYSPATH') or die('No direct script access.');
// Notify module view for Twitter Bootstrap 2.0 ?>

<!-- row -->
<div class="row">

	<?foreach ($msgs as $msg_type => $msgs_of_type):
		$class = '';
		if (in_array($msg_type, array('success', 'warning', 'info', 'danger', 'error'))){
			$class = ' alert-' . $msg_type;
			if ($msg_type === 'error' || $msg_type === 'danger'){
				$class = ' alert-danger';
				$msg_type = 'times-circle';
			}
		}?>
		<!-- NEW WIDGET START -->
		<article class="col-sm-12">
			<div class="alert alert-block fade in <?php echo $class ?>">
				<a class="close" href="#" data-dismiss="alert">×</a>
				<i class="fa-fw fa fa-<?php echo $msg_type ?> fa-2x"></i>
				<!-- <strong><?php echo $msg_type ?></strong>  -->
				<?php echo count($msgs_of_type) ? implode("<br />\n", $msgs_of_type) : $msgs_of_type?>
			</div>
		</article>
		<!-- WIDGET END -->
		
	<?php endforeach ?>

</div>
<!-- end row -->
