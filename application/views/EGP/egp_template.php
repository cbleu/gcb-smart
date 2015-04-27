<?php
	//initilize the page
	require_once(APPPATH."views/inc/init.php");

	//require UI configuration (nav, ribbon, etc.)
	require_once(APPPATH."views/inc/config.ui.php");
?>


<?php
	/*---------------- PHP Custom Scripts ---------

	YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
	E.G. $page_title = "Custom Title" */

	// $page_title = "Blank Page";

	/* ---------------- END PHP Custom Scripts ------------- */

	//include header
	//you can add your custom css in $page_css array.
	//Note: all css files are inside css/ folder
	// $page_css[] = "your_style.css";

	include(APPPATH."views/inc/header.php");
?>

<div id="divForJs">
	<form id="dataForJs">
		<?php foreach(Helpers_InputForJs::get() as $phpvar => $hiddenInput) { ?>
			<input type="hidden" id="<?= $phpvar;?>" value="<?= $hiddenInput;?>"/>
		<?php } ?>
	</form>
</div>

<?php
	// Return the number of messages
	echo Notify::count(); // 3
	Notify::render();
?>

<?php //include left panel (navigation)
	//follow the tree in inc/config.ui.php
	// $page_nav["misc"]["sub"]["blank"]["active"] = true;
	// echo $kpage_nav;
	
	include(APPPATH."views/inc/nav.php");

?>

<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		// $breadcrumbs["Misc"] = "";
		// include("inc/ribbon.php");
		include(APPPATH."views/inc/ribbon.php");
	?>

	<!-- MAIN CONTENT -->
	<?= $content; ?>
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->
<!-- PAGE FOOTER -->

<div id="main_footer">
	<?php
		// include page footer
		include(APPPATH."views/inc/footer.php");
	?>
</div>

<!-- END PAGE FOOTER -->

<!--	include required scripts -->
<?php 
	//include required scripts
	include(APPPATH."views/inc/scripts.php"); 
?>


<!-- JS INCLUDES -->
<?php foreach(Helpers_Javascript::get() as $javascript) { ?>
	<script src="<?= $javascript ?>" type="text/javascript" charset="utf-8"></script>
<?php } ?>

<?php 
	//include footer
	include(APPPATH."views/inc/google-analytics.php"); 
?>

