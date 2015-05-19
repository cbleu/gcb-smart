<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Kohana CRUD - Data Management System</title>

 <?php echo HTML::style("media/bootstrap/css/bootstrap.css"); ?>
 <?php echo HTML::style("media/bootstrap/css/bootstrap-responsive.css"); ?>
 <?php echo HTML::style("media/datetimepicker/css/bootstrap-datetimepicker.min.css"); ?>
 <?php echo HTML::style("media/css/style.css"); ?>
 <?php echo HTML::style("media/tagmanager/bootstrap-tagmanager.css"); ?>
 <?php echo HTML::style("media/select2/select2.css"); ?>
 <?php echo HTML::style("media/fancybox/jquery.fancybox-1.3.4.css"); ?>
 
 <?php echo HTML::script("media/js/jquery-1.8.2.min.js"); ?>
 <?php echo HTML::script("media/bootstrap/js/bootstrap.js"); ?>
 <?php echo HTML::script("media/ckeditor/ckeditor.js"); ?>
 <?php echo HTML::script("media/datetimepicker/js/bootstrap-datetimepicker.min.js"); ?>
 <?php echo HTML::script("media/tagmanager/bootstrap-tagmanager.js"); ?>
 <?php echo HTML::script("media/select2/select2.js"); ?>
 <?php echo HTML::script("media/fancybox/jquery.mousewheel-3.0.4.pack.js"); ?>
 <?php echo HTML::script("media/fancybox/jquery.fancybox-1.3.4.pack.js"); ?>

<style>
body {
	padding-top: 60px;
	padding-bottom: 60px;
}
</style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse"
				data-target=".nav-collapse">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="brand" href="#">Kohana CRUD</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li class="active">
						<?php echo HTML::anchor("example/index", "Example 1"); ?>
					</li>
					<li>
						<?php echo HTML::anchor("example/example2", "Example 2"); ?>
					</li>
					<li>
						<?php echo HTML::anchor("example/example3", "Example 3"); ?>
					</li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
</div>
	<?php echo  $html;?>
</body>
</html>