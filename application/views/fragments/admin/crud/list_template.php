

<!-- <link href="/assets/css/flexigrid/flexigrid.css" rel="stylesheet" type="text/css"> -->
<!-- <link href="/assets/css/flexigrid/jquery.fancybox.css"> -->

<!-- <script src="/assets/js/flexigrid/cookies.js"></script>
<script src="/assets/js/flexigrid/flexigrid.js"></script>
<script src="/assets/js/flexigrid/jquery.form.js"></script>
<script src="/assets/js/flexigrid/jquery.printElement.js"></script>

<script src="/assets/js/flexigrid/jquery.fancybox.pack.js"></script> -->
<!-- <script src="/assets/oscrud/js/jquery_plugins/jquery.easing-1.3.pack.js"></script> -->

<!-- <script src="/assets/js/flexigrid/jquery.numeric.min.js"></script> -->

	
<?php if(isset($before_list_div)) {
	echo $before_list_div;
}?>

<!-- ****************************** -->
<!-- TABLE: DHTML PART         -->
<!-- ****************************** -->


<div id="content" style="opacity:1;">

	<!-- new row -->
	<div class="row">

		<!-- START NEW WIDGET -->
		<div class="col-sm-12">

			<!-- start jarvis widget -->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-list-alt"></i> </span>
					<h2>Listing</h2>
				</header>

				<!-- widget div-->
				<div>
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
					</div>
					<!-- end widget edit box -->

					<!-- start widget content -->
					<div class="widget-body">
						<!-- new row -->
						<div class="row">

							<!-- new col -->
							<div class="col-sm-12">

								<div id="hidden-operations"></div>
								<div id='report-error' class='report-div error'></div>
								<div id='report-success' class='report-div success report-list' <?php if($success_message !== null){?>style="display:block"<?php }?>>
									<?php if($success_message !== null){?>
										<p><?php echo $success_message; ?></p>
									<?php }?>
								</div>

								<!-- start Flexigrid -->
								<div class="flexigrid" style='width: 100%;'>

									<div class="mDiv">
										<div title="<?= __('minimize_maximize')?>" class="ptogtitle"><span class="fa"></span></div>
										<div class="ftitle">
											<form action="<?= $ajax_list_url;?>" method="post" id="filtering_form" autocomplete = "off">
												<!-- <?php //echo form_open( $ajax_list_url, 'method="post" id="filtering_form" autocomplete = "off"'); ?> -->

												<div class="sDiv" id='quickSearchBox'>
													<div class="sDiv2">
														
														<!-- new row -->
														<div class="row">

															<!-- new col -->
															<div class="col-sm-12">

																<div class="input-group input-group-md">
																	<span class="input-group-addon" id="filter_button"><i class="glyphicon glyphicon-filter"></i></span>

																	<span class="input-group-addon">
																		<select name="search_field" class="" id="search_field" data-container="body">
																			<option value=""><?php echo __('list_search_all');?></option>
																			<?php foreach($columns as $column){?>
																				<option value="<?php echo $column->field_name?>"><?php echo $column->display_as?>&nbsp;&nbsp;</option>
																			<?php }?>
																		</select>
																	</span>

																	<!-- <div class="input-group-btn">
																		<button type="button" class="btn btn-default" tabindex="-1">Action</button>
																		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-container="body" tabindex="-1" aria-expanded="false">
																			<span class="caret"></span>
																		</button>
																		<ul class="dropdown-menu pull-right" role="menu">
																			<?php foreach($columns as $column){?>
																				<li><a href="javascript:void(0);"><?php echo $column->field_name?> <?php echo $column->display_as?></a></li>
																			<?php }?>
																		</ul>
																	</div> -->

																	<span class="icon-addon addon-md">
																		<input type="text" placeholder="<?php echo __('list_search');?>" class="form-control" id='search_text' name="search_text">
																		<label for="email" class="glyphicon glyphicon-search" rel="tooltip" title="" data-placement="bottom" data-container="body" data-original-title="<?php echo __('list_search');?>"></label>
																	</span>

																	<div class="input-group-btn">
																		<button class="btn btn-default txt-color-red" type="button" id='search_clear'>
																			<i class="fa fa-times"></i>
																	
																		</button>
																		<button class="btn btn-success txt-color-white" type="button"  id='crud_search'>
																			<i class="fa fa-check"></i>
																			Filtrer !
																		</button>
																	</div>

																</div>

															</div>
															<!-- end col -->

														</div>
														<!-- end row -->

														<!-- <?php //echo __('list_search');?>: <input type="text" class="qsbsearch_fieldox input-sm" name="search_text" size="30" id='search_text'>
														<select name="search_field" class="input-sm" id="search_field">
															<option value=""><?php //echo __('list_search_all');?></option>
															<?php //foreach($columns as $column){?>
																<option value="<?php //echo $column->field_name?>"><?php //echo $column->display_as?>&nbsp;&nbsp;</option>
															<?php //}?>
														</select>
														<input type="button" class="btn btn-default btn-sm" value="<?php //echo __('list_search');?>" id='crud_search'>  -->
													</div>
													<!-- <div class='search-div-clear-button'>
														<input type="button" class="btn btn-default btn-sm" value="<?php //echo __('list_clear_filtering');?>" id='search_clear'>
													</div> -->
												</div>

												<div class="pDiv">
													<!-- <div class="pDiv2"> -->

														<div class="pGroup">
															<div class="pSearch pButton" id='quickSearchButton' title="<?= __('list_search');?>">
																<span> <i class="fa fa-search"></i> </span>
															</div>
														</div>

														<div class="pGroup">
															<select name="per_page" id='per_page'>
																<?php foreach($paging_options as $option){?>
																	<option value="<?php echo $option; ?>" <?php if($option == $default_per_page){?>selected="selected"<?php }?>><?php echo $option; ?>&nbsp;&nbsp;</option>
																<?php }?>
															</select>
															<input type='hidden' name='order_by[0]' id='hidden-sorting' value='<?php if(!empty($order_by[0])){?><?php echo $order_by[0]?><?php }?>' />
															<input type='hidden' name='order_by[1]' id='hidden-ordering'  value='<?php if(!empty($order_by[1])){?><?php echo $order_by[1]?><?php }?>'/>
														</div>

														<div class="pGroup">
															<div class="pFirst pButton first-button">
																<span></span>
															</div>
															<div class="pPrev pButton prev-button">
																<span></span>
															</div>
														</div>

														<div class="pGroup">
															<span class="pcontrol"><?= __('list_page'); ?> <input name='page' type="text" value="1" id='crud_page'> 
																<?= __('list_paging_of'); ?> 
																<!-- <span id='last-page-number'><?php //echo ceil($total_results / $default_per_page)?></span> -->
																<span id='last-page-number'></span>
															</span>
														</div>

														<div class="pGroup">
															<div class="pNext pButton next-button" >
																<span></span>
															</div>
															<div class="pLast pButton last-button">
																<span></span>
															</div>
														</div>

														<div class="pGroup">
															<div class="pReload pButton" id='ajax_refresh_and_loading'>
																<span></span>
															</div>
														</div>

														<div class="pGroup">
															<span class="pPageStat">
																<? $paging_starts_from = "<span id='page-starts-from'>1</span>"; ?>
																<? $paging_ends_to = "<span id='page-ends-to'>". ($total_results < $default_per_page ? $total_results : $default_per_page) ."</span>"; //echo $default_per_page;?>
																<? $paging_total_results = "<span id='total_items'>$total_results</span>"?>
																<?= str_replace( array('{start}','{end}','{results}'), array($paging_starts_from, $paging_ends_to, $paging_total_results), __('list_displaying'));?>
															</span>
														</div>

													<!-- </div> -->

													<!-- <div style="clear: both;"></div> -->

												</div>

											</form>
										</div>
									</div>

									<div id='main-table-box'>

										<!-- debut barre boutons actions -->
										<div class="mDiv">

											<?php if(!$unset_add || !$unset_export || !$unset_print){?>
												<div class="tDiv">
													<?php if(!$unset_add){?>
														<div class="tDiv2">
															<a href='<?php echo $add_url?>' title='<?php echo __('list_add'); ?> <?php echo $subject?>' class='add-anchor'>
																<div class="fbutton">
																	<div>
																		<span class="add"><?php echo __('list_add'); ?> <?php echo $subject?></span>
																	</div>
																</div>
															</a>
															<!-- <div class="btnseparator"></div> -->
														</div>
													<?php }?>
													<div class="tDiv3">
													<?php if(!$unset_export) { ?>
																<a class="export-anchor" data-url="<?php echo $export_url; ?>" target="_blank">
																	<div class="fbutton">
																		<div>
																			<span class="export"><?php echo __('list_export');?></span>
																		</div>
																	</div>
																</a>
																<!-- <div class="btnseparator"></div> -->
													<?php } ?>
													<?php if(!$unset_print) { ?>
																	<a class="print-anchor" data-url="<?php echo $print_url; ?>">
																		<div class="fbutton">
																			<div>
																				<span class="print"><?php echo __('list_print');?></span>
																			</div>
																		</div>
																	</a>
																	<!-- <div class="btnseparator"></div> -->
													<?php }?>
												</div>
												<!-- <div class='clear'></div> -->
											<?php }?>

										</div>
										<!-- fin barre boutons actions -->

										<!-- debut Corps de la table -->
										<div id='ajax_list'>
											<?php echo $list_view?>
										</div>
										<!-- fin corps de la table -->

									</div>

								</div>
								<!-- end Flexigrid -->

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

<script type='text/javascript'>
	var base_url = '<?php echo URL::base('http', TRUE);?>';

	var subject = '<?php echo $subject?>';
	var ajax_list_url = '<?php echo $ajax_list_url?>';
	var ajax_list_info_url = '<?php echo $ajax_list_info_url?>';
	var unique_hash = '<?php echo $unique_hash; ?>';

	var statusFilter = '<?php echo $statusFilter ?>';
	
	var message_alert_delete = "<?= __('alert_delete'); ?>";
</script>
