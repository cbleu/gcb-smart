<?php 

	$column_width = (int)(80/count($columns));
	
	if(!empty($list)){
?><div class="bDiv" >
		<table class="table sortable no-margin" cellspacing="0" width="100%">
			<thead>

				<tr>
					<th class="black-cell"><span class="loading"></span></th>
					<?php foreach($columns as $column){?>
						<th scope="col" width='<?php echo $column_width?>%'>
							<span class="column-sort">
								<a href="#" title="Sort up" class="sort-up"></a>
								<a href="#" title="Sort down" class="sort-down"></a>
							</span>
							<div class="text-left field-sorting <?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?><?php echo $order_by[1]?><?php }?>" 
								rel='<?php echo $column->field_name?>'>
								<?php echo $column->display_as?>
							</div>
						</th>
						<?
					}
					?>

					<?php if(!$unset_delete || !$unset_edit || !empty($actions)){?>
					<th align="left" abbr="tools" axis="col1" class="table-actions" width='20%'>
						<div class="text-right">
							<?php echo __('list_actions'); ?>
						</div>
					</th>
					<?php }?>
				</tr>

			</thead>		
		<tbody>
			
<?php foreach($list as $num_row => $row){ ?>        
		<tr  <?php if($num_row % 2 == 1){?>class="erow"<?php }?>>
			<td class="th table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-1" value="1"></td>
			<?php foreach($columns as $column){?>
			<td width='<?php echo $column_width?>%' class='<?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?>sorted<?php }?>'>
				<div class='text-left'><?php echo $row->{$column->field_name} != '' ? $row->{$column->field_name} : '&nbsp;' ; ?></div>
			</td>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !empty($actions)){?>
			<td class="table-actions">

				<div class='tools'>	
					<?php if(!$unset_edit){?>
					<a href="<?php echo $row->edit_url?>" title="Editer" class="with-tip"><img src="/assets/img/fugue/pencil.png" width="16" height="16"></a>
					<?php }?>
					&nbsp;&nbsp;&nbsp;
					<?php if(!$unset_delete){?>
					<a href="<?php echo $row->delete_url?>" title="Effacer" class="with-tip delete_object"><img src="/assets/img/fugue/cross-circle.png" width="16" height="16"></a>
					<?php }?>	
					&nbsp;&nbsp;&nbsp;		
					<?php 
					if(!empty($row->action_urls)){
						foreach($row->action_urls as $action_unique_id => $action_url){ 
							$action = $actions[$action_unique_id];
					?>
							<a href="<?php echo $action_url; ?>" class="<?php echo $action->css_class; ?>" title="<?php echo $action->label?>"><?php 
								if(!empty($action->image_url))
								{
									?><img src="<?php echo $action->image_url; ?>" alt="<?php echo $action->label?>" /><?php 	
								}
							?></a>		
					<?php }
					}
					?>					
                    <div class='clear'></div>
				</div>
			</td>
			<?php }?>
		</tr>
<?php } ?>        
		</tbody>
		</table>
	</div>
<?php }else{?>
	<br/>
	&nbsp;&nbsp;&nbsp;&nbsp; <?php echo __('list_no_items'); ?>
	<br/>
	<br/>
<?php }?>

<script type="text/javascript" charset="utf-8">
	$("a.delete_object").click(function() {
		return confirm("Vous êtes sur le point de supprimer cette ligne. Cette action est irréversible. Voulez vous continuer ?");
	});
</script>