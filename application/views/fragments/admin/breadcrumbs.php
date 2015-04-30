<!-- v1.5: you can now add class red to the breadcrumb -->
<ul id="breadcrumb">
	<li><a href="/admin/dashboard" title="Accueil">Administration</a></li>
	<?php foreach($pages as $c => $page){?>
	<li>
		<?php echo $page['title']?>
		<?php if ($c < count($pages)-1){?>&raquo;
		<?php }?>
	</li>
	<?php }?>
</ul>