<script src="/assets/js/flexigrid/flexigrid-add.js"></script>
<script src="/assets/js/flexigrid/jquery.form.js"></script>


<div id="content" style="opacity:1;">

	<!-- new row -->
	<div class="row">

		<!-- START NEW WIDGET -->
		<div class="col-md-10 col-md-offset-1 col-lg-7">

			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-file-text txt-color-blue"></i> </span>
					<h2>Edition</h2>
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

								<? if(isset($update_url)){
									echo'<form action="'. $update_url .'" method="post" id="crudForm" autocomplete="off" enctype="multipart/form-data" class="smart-form">';
								}else if(isset($insert_url)){
									echo'<form action="'. $insert_url .'" method="post" id="crudForm" autocomplete="off" enctype="multipart/form-data" class="smart-form">';
								}?>
									<fieldset class=" required">
										<legend> <?= (isset($subject))? $subject : ''?></legend>
										<?php
										$counter = 0; 
										foreach($fields as $field){
											$even_odd = $counter % 2 == 0 ? 'odd' : 'even';
											$counter++;
										?>

											<section>
												<label class="label">
													<?= $input_fields[$field->field_name]->display_as; ?>
													<?= ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " :"" ?>
												</label>
												<label class="input">
													<?= $input_fields[$field->field_name]->input ?>
												</label>
											</section>

										<? }?>
									</fieldset>

									<fieldset class="grey-bg no-margin">
											<div class='form-button-box'>
												<div class='small-loading' id='FormLoading'><?= __('form_insert_loading'); ?></div>
											</div>	
									</fieldset>

									<footer>

										<div id='report-error' class='report-div error'></div>
										<div id='report-success' class='report-div success'></div>

										<button type="button" id="save-and-go-back-button" class="btn btn-success" >
											<?= __('form_save_and_go_back'); ?>
										</button>
										<button type="button" id="save-button" class="btn btn-primary" >
											<?= __('form_save'); ?>
										</button>
										<button type="button" class="btn btn-default" onclick="javascript: goToList();">
											<?= __('form_cancel'); ?>
										</button>
									</footer>


								</form>

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
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_add_form = "<?php echo __('alert_add_form')?>";
	var message_insert_error = "<?php echo __('insert_error')?>";
</script>