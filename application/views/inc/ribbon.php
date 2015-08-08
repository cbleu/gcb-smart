	<!-- RIBBON -->
	<div id="ribbon">

		<span class="ribbon-button-alignment"> 
			<span id="refresh" class="btn btn-ribbon" data-title="refresh" rel="tooltip" data-placement="bottom" data-original-title="<i class='text-info fa fa-info-circle fa-2x'></i>&nbsp; Recharge la page courante." data-html="true"><i class="fa fa-refresh"></i></span> 
		</span>

		<!-- breadcrumb -->
		<ol class="breadcrumb">
			<?php
				foreach ($breadcrumbs as $display => $url) {
					$breadcrumb = $url != "" ? '<a href="'.$url.'">'.$display.'</a>' : $display;
					echo '<li>'.$breadcrumb.'</li>';
				}
				echo '<li>'.$page_title.'</li>';
			?>
		</ol>
		<!-- end breadcrumb -->

		<!-- You can also add more buttons to the
		ribbon for further usability

		Example below:

		<span class="ribbon-button-alignment pull-right">
		<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
		<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
		<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
		</span>
		 -->

	</div>
	<!-- END RIBBON -->
	

<script>
	$('#refresh').click(function () {
	  // document.location.reload();
	})
</script>