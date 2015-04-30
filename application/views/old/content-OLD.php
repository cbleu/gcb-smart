<div class="container">
	<?= $content; ?>
</div><!-- /.container -->


<div id="divForJs">
	<form id="dataForJs">
		<?php foreach(Helpers_InputForJs::get() as $phpvar => $hiddenInput) { ?>
			<input type="hidden" id="<?= $phpvar;?>" value="<?= $hiddenInput;?>"/>
		<?php } ?>
	</form>
</div>

<!-- JS INCLUDES -->
<?php foreach(Helpers_Javascript::get() as $javascript) { ?>
	<!-- // <script src="<?= $javascript ?>" type="text/javascript" charset="utf-8"></script> -->
	<script> loadScript("<?= $javascript ?>");</script>
<?php } ?>

