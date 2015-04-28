<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= $title?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="public tempate page">
	<meta name="author" content="c-bleu">

	<!-- CSS INCLUDES-->
	<?php foreach(Helpers_Stylesheet::get() as $cssFile) { ?>
		<link rel="stylesheet" href="<?= $cssFile ?>" type="text/css" charset="utf-8">
	<?php } ?>	
</head>

<body>
	<div class="menu-container">
		<?= $menu; ?>
	</div>	<!-- /.menu-container -->
	<div class="container">
		<?= $content; ?>
	</div><!-- /.container -->
	<div class="footer-container">
		<hr>
		<?= $footer; ?>
	</div> <!-- /.footer-container -->

	<!-- JS INCLUDES -->
	<?php foreach(Helpers_Javascript::get() as $javascript) { ?>
		<script src="<?= $javascript ?>" type="text/javascript" charset="utf-8"></script>
	<?php } ?>


	<!-- <?= $appscript; ?> -->
	<div id="divForJs">
		<form id="dataForJs">
			<?php foreach(Helpers_InputForJs::get() as $phpvar => $hiddenInput) { ?>
				<input type="hidden" id="<?= $phpvar;?>" value="<?= $hiddenInput;?>"/>
			<?php } ?>
		</form>
	</div>
</body>
</html>
