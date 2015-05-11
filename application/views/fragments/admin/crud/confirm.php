<script src="/assets/js/flexigrid/flexigrid-add.js"></script>
<script src="/assets/js/flexigrid/jquery.form.js"></script>


<div id="content" style="opacity:1;">

	<!-- new row -->
	<div class="row">

		<!-- START NEW WIDGET -->
		<div class="col-md-10 col-md-offset-1 col-lg-7">

			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-info"></i> </span>
					<h2>Confirmation</h2>
				</header>

				<!-- widget div-->
				<div>
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">
						<!-- new row -->
						<div class="row">

							<!-- new col -->
							<div class="col-md-12">

								<?= $texte?>

							</div>
							<!-- end col -->

						</div>
						<!-- end row -->

					</div>
					<!-- end widget content -->

				</div>
				<!-- end Widget -->

			</div>
			<!-- end jarvis widget -->

		</div>
		<!-- END NEW WIDGET -->

	</div>
	<!-- end row -->
</div>
<!-- ****************************** -->


<script>
	var validation_url = '<?php //echo $validation_url?>';
	var list_url = '<?php //echo $list_url?>';

	var message_alert_add_form = "<?php echo __('alert_add_form')?>";
	var message_insert_error = "<?php echo __('insert_error')?>";
</script>