<?= $header_nav; ?>
<!-- Plugins -->
<script src="js/libs/jquery.dataTables.min.js"></script>

<div class="container_12">
<section class="grid_12">
			<div class="block-border">
				<form class="block-content form" id="table_form" method="post" action="">
				<h1><?=$nomtable;?></h1>
				
				<table class="table sortable no-margin" cellspacing="0" width="100%">

							<thead>

								<tr>
									<th class="black-cell"><span class="loading"></span></th>
									<? for ($i=0; $i < count($colonne); $i++) { ?>
										<th scope="col">
											<span class="column-sort">
												<a href="#" title="Sort up" class="sort-up"></a>
												<a href="#" title="Sort down" class="sort-down"></a>
											</span>
											<?=$colonne[$i];?>
										</th>
									<? }?>

									<th scope="col" class="table-actions">Actions</th>
								</tr>

							</thead>


					
					<tbody>
						<? for($i=0;$i<count($elements);$i++){?>
									<tr>
										<td class="th table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-1" value="1"></td>

										<?php
											for ($j=0; $j < count($colonne); $j++) {
												echo '<td>' .$elements[$i][$colonne[$j]] .'</td>';
											}
											$j--; // pour récupérer id
										?>

										<td class="table-actions">
											<a href="<?=$lien;?>edit/<?=$elements[$i][$colonne[$j]];?>" title="Editer" class="with-tip"><i class="fa fa-pencil"></i></a>
											&nbsp;&nbsp;&nbsp;
											<a href="<?=$lien;?>delete/<?=$elements[$i][$colonne[$j]];?>" title="Effacer" class="with-tip"><i class="fa fa-times"></i></a>
										</td>
									</tr>
							<?
						}
						?>

					</tbody>
				
				</table>
				
			
					
			</form></div>
		</section>
	</div>
	<script>

				/*
				 * Table sorting
				 */
				/*
				 * Table sorting
				 */

				// A small classes setup...
				$.fn.dataTableExt.oStdClasses.sWrapper = 'no-margin last-child';
				$.fn.dataTableExt.oStdClasses.sInfo = 'message no-margin';
				$.fn.dataTableExt.oStdClasses.sLength = 'float-left';
				$.fn.dataTableExt.oStdClasses.sFilter = 'float-right';
				$.fn.dataTableExt.oStdClasses.sPaging = 'sub-hover paging_';
				$.fn.dataTableExt.oStdClasses.sPagePrevEnabled = 'control-prev';
				$.fn.dataTableExt.oStdClasses.sPagePrevDisabled = 'control-prev disabled';
				$.fn.dataTableExt.oStdClasses.sPageNextEnabled = 'control-next';
				$.fn.dataTableExt.oStdClasses.sPageNextDisabled = 'control-next disabled';
				$.fn.dataTableExt.oStdClasses.sPageFirst = 'control-first';
				$.fn.dataTableExt.oStdClasses.sPagePrevious = 'control-prev';
				$.fn.dataTableExt.oStdClasses.sPageNext = 'control-next';
				$.fn.dataTableExt.oStdClasses.sPageLast = 'control-last';

				// Apply to table
				$('.sortable').each(function(i)
				{
					// DataTable config
					var table = $(this),
						oTable = table.dataTable({
							/*
							 * We set specific options for each columns here. Some columns contain raw data to enable correct sorting, so we convert it for display
							 * @url http://www.datatables.net/usage/columns
							 */
							aoColumns: [
								{ bSortable: false },	// No sorting for this columns, as it only contains checkboxes
								{ sType: 'string' },
								{ bSortable: false },
								{ sType: 'numeric', bUseRendered: false, fnRender: function(obj) // Append unit and add icon
									{
										return '<small><img src="/assets/images/icons/fugue/image.png" width="16" height="16" class="picto"> '+obj.aData[obj.iDataColumn]+' Ko</small>';
									}
								},
								{ sType: 'date' },
								{ sType: 'numeric', bUseRendered: false, fnRender: function(obj) // Size is given as float for sorting, convert to format 000 x 000
									{
										return obj.aData[obj.iDataColumn].split('.').join(' x ');
									}
								},
								{ bSortable: false }	// No sorting for actions column
							],

							/*
							 * Set DOM structure for table controls
							 * @url http://www.datatables.net/examples/basic_init/dom.html
							 */
							sDom: '<"block-controls"<"controls-buttons"p>>rti<"block-footer clearfix"lf>',

							/*
							 * Callback to apply template setup
							 */
							fnDrawCallback: function()
							{
								this.parent().applyTemplateSetup();
							},
							fnInitComplete: function()
							{
								this.parent().applyTemplateSetup();
							}
						});

					// Sorting arrows behaviour
					table.find('thead .sort-up').click(function(event)
					{
						// Stop link behaviour
						event.preventDefault();

						// Find column index
						var column = $(this).closest('th'),
							columnIndex = column.parent().children().index(column.get(0));

						// Send command
						oTable.fnSort([[columnIndex, 'asc']]);

						// Prevent bubbling
						return false;
					});
					table.find('thead .sort-down').click(function(event)
					{
						// Stop link behaviour
						event.preventDefault();

						// Find column index
						var column = $(this).closest('th'),
							columnIndex = column.parent().children().index(column.get(0));

						// Send command
						oTable.fnSort([[columnIndex, 'desc']]);

						// Prevent bubbling
						return false;
					});
				});





		</script>
	