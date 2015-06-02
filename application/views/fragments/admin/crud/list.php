<? $column_width = (int)(80/count($columns));?>
	
<? if(!empty($list)){?>

	<div class="bDiv" >
		<table class="table sortable no-margin" cellspacing="0" width="100%">
			<!--start table head -->
			<thead>

				<tr>
					<th class="black-cell" width="2%">
						<span class="loading"></span>
					</th>
					<? foreach($columns as $column){?>
						<th scope="col" width='<?php echo $column_width?>%'>
							<span class="column-sort">
								<a href="#" title="Sort up" class="sort-up"></a>
								<a href="#" title="Sort down" class="sort-down"></a>
							</span>
							<div class="text-left field-sorting <?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){ echo $order_by[1];}?>" rel='<?= $column->field_name?>'>
								<?= $column->display_as?>
							</div>
						</th>
					<? }?>

					<? if(!$unset_delete || !$unset_edit || !empty($actions)){?>
						<th align="center" abbr="tools" axis="col1" class="table-actions" width='<?= count($actions) * 4?>%'>
							<div class="text-center">
								<?= __('list_actions'); ?>
							</div>
						</th>
					<? }?>
				</tr>

			</thead>
			<!-- end table head -->

			<!-- start table body -->
			<tbody>

				<? foreach($list as $num_row => $row){ ?>
					<tr  <?php if($num_row % 2 == 1){?>class="erow"<?php }?>>
						<td class="th table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-1" value="1"></td>
						<? foreach($columns as $column){?>
							<td width='<?= $column_width?>%' class='<? if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?>sorted<? }?>'>
								<div class='text-left'><?= $row->{$column->field_name} != '' ? $row->{$column->field_name} : '&nbsp;' ; ?></div>
							</td>
						<? }?>
						<? if(!$unset_delete || !$unset_edit || !empty($actions)){?>
							<td class="table-actions">

								<div class='text-center'>

									<?php
										if(!empty($row->action_urls)){
											foreach($row->action_urls as $action_unique_id => $action_url){
												$action = $actions[$action_unique_id];
												if(!empty($action->image_url)){
													$imgaction = '<i class="' .$action->image_url .'"></i>';
												}
												
												echo '
													<div class="td-icon action-activate">
														<a href="' .$action_url .'" class="td-icon ' .$action->css_class .'" rel="tooltip" data-placement="bottom" data-container="body" data-original-title="' .$action->label .'">' .$imgaction .'</a>
													</div>
													';
											}
										}
									?>
									<!-- <div class='clear'></div> -->
								</div>

							</td>
						<? }?>
					</tr>
				<? } ?>

			</tbody>
			<!-- end table body -->
		</table>
	</div>

<? }else{ ?>

	<br/>
	&nbsp;&nbsp;&nbsp;&nbsp; <?= __('list_no_items'); ?>
	<br/>
	<br/>

<? }?>

<script type="text/javascript" charset="utf-8">
	$("a.delete_object").click(function() {
		return confirm("Vous êtes sur le point de supprimer cette ligne. Cette action est irréversible. Voulez vous continuer ?");
	});
</script>