<!DOCTYPE html>
<html lang="fr-fr" <?php echo implode(' ', array_map(function($prop, $value) {
			return $prop.'="'.$value.'"';
		}, array_keys($page_html_prop), $page_html_prop)) ;?>>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- <meta charset="utf-8"> -->
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> <?php echo $page_title != "" ? $page_title." - " : ""; ?>EasyGolfPack(c) </title>
		<meta name="description" content="">
		<meta name="author" content="cesar jacquet - cbleu.re">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/smartadmin-skins.min.css">


		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/responsive-bootstrap-toolkit.css">
		<!-- <link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/bootstrap-toggle.min.css"> -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/bootstrap-switch.min.css">

		<!-- SmartAdmin RTL Support is under construction-->
		<!-- <link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/smartadmin-rtl.min.css"> -->

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/your_style.css"> -->

		<!-- <?php
			// if ($page_css) {
			// 	foreach ($page_css as $css) {
			// 		echo '<link rel="stylesheet" type="text/css" media="screen" href="'.ASSETS_URL.'/css/'.$css.'">';
			// 	}
			// }
		?> -->

		<!-- EGP CSS INCLUDES-->
		<?php foreach(Helpers_Stylesheet::get() as $cssFile) { ?>
			<link rel="stylesheet" href="<?= $cssFile ?>" type="text/css" media="screen" charset="utf-8">
		<?php } ?>	

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<!-- <link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/demo.min.css"> -->

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="<?php echo ASSETS_URL; ?>/img/favicon/favicon_48x48.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo ASSETS_URL; ?>/img/favicon/favicon_48x48.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700"> -->

		<!-- Specifying a Webpage Icon for Web Clip
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="<?php echo ASSETS_URL; ?>/img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo ASSETS_URL; ?>/img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo ASSETS_URL; ?>/img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo ASSETS_URL; ?>/img/splash/touch-icon-ipad-retina.png">

		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="<?php echo ASSETS_URL; ?>/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="<?php echo ASSETS_URL; ?>/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="<?php echo ASSETS_URL; ?>/img/splash/iphone.png" media="screen and (max-device-width: 320px)">

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<!-- // <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
		<script>
			if (!window.jQuery) {
				document.write('<script src="<?php echo ASSETS_URL; ?>/js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<!-- // <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> -->
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="<?php echo ASSETS_URL; ?>/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>
	</head>
	
	
	<body  <?php echo implode(' ', array_map(function($prop, $value) {
			return $prop.'="'.$value.'"';
		}, array_keys($page_body_prop), $page_body_prop)) ;?>>

		<!-- POSSIBLE CLASSES: minified, fixed-ribbon, fixed-header, fixed-width
			 You can also add different skin classes such as "smart-skin-1", "smart-skin-2" etc...-->
		<?php
			if (!$no_main_header) {

		?>
				<!-- HEADER -->
				<header id="header">
					<div id="logo-group">

						<!-- PLACE YOUR LOGO HERE -->
						<span id="logo"> <img src="<?php echo ASSETS_URL; ?>/img/EGP/logo.png" alt="EasyGolfPack"> </span>
						<!-- END LOGO PLACEHOLDER -->

						<!-- Note: The activity badge color changes when clicked and resets the number to 0
						Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
						<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>

						<!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
						<div class="ajax-dropdown">

							<!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
							<div class="btn-group btn-group-justified" data-toggle="buttons">
								<label class="btn btn-default">
									<input type="radio" name="activity" id="<?php echo APP_URL; ?>/ajax/notify/mail.php">
									Msgs (14) </label>
								<label class="btn btn-default">
									<input type="radio" name="activity" id="<?php echo APP_URL; ?>/ajax/notify/notifications.php">
									notify (3) </label>
								<label class="btn btn-default">
									<input type="radio" name="activity" id="<?php echo APP_URL; ?>/ajax/notify/tasks.php">
									Tasks (4) </label>
							</div>

							<!-- notification content -->
							<div class="ajax-notifications custom-scroll">

								<div class="alert alert-transparent">
									<h4>Click a button to show messages here</h4>
									This blank page message helps protect your privacy, or you can show the first message here automatically.
								</div>

								<i class="fa fa-lock fa-4x fa-border"></i>

							</div>
							<!-- end notification content -->

							<!-- footer: refresh area -->
							<span> Last updated on: 12/12/2013 9:43AM
								<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
									<i class="fa fa-refresh"></i>
								</button> </span>
							<!-- end footer -->

						</div>
						<!-- END AJAX-DROPDOWN -->
					</div>

					<?php if($isAdmin){?>
						<!-- projects dropdown -->
						<div class="project-context hidden-xs">

							<span class="label">Réservations en attente:</span>
							<span id="project-selector" class="popover-trigger-element dropdown-toggle" data-toggle="dropdown">Demandes visiteurs<i class="fa fa-angle-down"></i></span>

							<!-- Suggestion: populate this list with fetch and push technique -->
							<ul class="dropdown-menu">
								<li>
									<a href="javascript:void(0);">04/05/2015 à 8h30 pour 4 joueurs 9 trous</a>
								</li>
								<li>
									<a href="javascript:void(0);">14/05/2015 à 10h30 pour 2 joueurs 18 trous</a>
								</li>
								<li>
									<a href="javascript:void(0);">16/05/2015 à 9h30 pour 3 joueurs 18 trous</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="javascript:void(0);"><i class="fa fa-power-off"></i> Clear</a>
								</li>
							</ul>
							<!-- end dropdown-menu-->

						</div>
						<!-- end projects dropdown -->
					<?}?>
					<!-- pulled right: nav area -->
					<div class="pull-right">

						<!-- collapse menu button -->
						<div id="hide-menu" class="btn-header pull-right">
							<span rel="tooltip" data-placement="bottom" data-original-title="<i class='text-info fa fa-info fa-2x'></i>&nbsp; Cacher le menu" data-html="true">
								<a href="javascript:void(0);" data-action="toggleMenu" >
									<i class="fa fa-reorder"></i>
								</a>
							</span> 
							<!-- <span> <a href="javascript:void(0);" title="Collapse Menu" data-action="toggleMenu"><i class="fa fa-reorder"></i></a> </span> -->
						</div>
						<!-- end collapse menu -->

						<!-- #MOBILE -->
						<!-- Top menu profile link : this shows only when top menu is active -->
						<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
							<li class="">
								<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
									<img src="<?php echo ASSETS_URL; ?>/img/avatars/sunny.png" alt="John Doe" class="online" />
								</a>
								<ul class="dropdown-menu pull-right">
									<li>
										<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="profile.php" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="login.php" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
									</li>
								</ul>
							</li>
						</ul>

						<!-- logout button -->
						<div id="logout" class="btn-header transparent pull-right">
							<span data-title="Deconnexion" rel="tooltip" data-placement="bottom" data-original-title="<i class='text-danger fa fa-warning fa-2x'></i>&nbsp; Déconnexion" data-html="true">
								<a href="/app/logout" title="Deconnexion" data-action="userLogout" data-logout-msg="Vous pouvez renforcer votre sécurité en fermant la fenetre de ce navigateur si vous n'êtes pas sur votre propre ordinateur.">
									<i class="fa fa-sign-out"></i>
								</a>
							</span> 
							<!-- <span> <a href="/app/logout" title="Deconnexion" data-action="userLogout" data-logout-msg="Vous pouvez renforcer votre sécurité en fermant la fenetre de ce navigateur si vous n'êtes pas sur votre propre ordinateur."><i class="fa fa-sign-out"></i></a> </span> -->
						</div>
						<!-- end logout button -->

						<?php if(!$isLogged){?>
							<form class="navbar-form navbar-right" name="login-form" id="login-form" method="post" action="/app/login">
								<div class="form-group">
									<input class="input-medium thin" type="email" placeholder="Email" name="username">
									<input class="input-small thin" type="password" placeholder="Password" name="password">
									<input type="hidden" name="redirect" id="redirect" value="">
								</div>
								<!-- <button type="submit" class="btn btn-mini" style="margin-top:9px;">Se Connecter</button> -->
								<button type="submit" class="btn btn-xs">Se Connecter</button>
							</form>	
						<?php }?>

						<!-- fullscreen button -->
						<div id="fullscreen" class="btn-header transparent pull-right">
							<span data-title="Deconnexion" rel="tooltip" data-placement="bottom" data-original-title="<i class='text-info fa fa-info fa-2x'></i>&nbsp; Plein Ecran" data-html="true">
								<a href="javascript:void(0);" data-action="launchFullscreen" >
									<i class="fa fa-arrows-alt"></i>
								</a>
							</span> 
							<!-- <span> <a href="javascript:void(0);" title="Full Screen" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i></a> </span> -->
						</div>
						<!-- end fullscreen button -->

					</div>
					<!-- end pulled right: nav area -->

				</header>
				<!-- END HEADER -->

				<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
				Note: These tiles are completely responsive,
				you can add as many as you like
				-->
				<div id="shortcut">
					<ul>
						<!-- <li>
							<a href="<?php echo APP_URL; ?>/inbox.php" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
						</li> -->
						<li>
							<a href="<?php echo APP_URL; ?>app/calendrier" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendrier</span> </span> </a>
						</li>
						<li>
							<a href="<?php echo APP_URL; ?>app/wizard" class="jarvismetro-tile big-cubes bg-color-green"> <span class="iconbox"> <i class="fa fa-magic fa-4x"></i> <span>Assistant</span> </span> </a>
						</li>
						<!-- <li>
							<a href="<?php echo APP_URL; ?>/gmap-xml.php" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
						</li>
						<li>
							<a href="<?php echo APP_URL; ?>/invoice.php" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
						</li>
						<li>
							<a href="<?php echo APP_URL; ?>/gallery.php" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
						</li> -->
						<li>
							<a href="<?php echo APP_URL; ?>app/informations" class="jarvismetro-tile big-cubes selected bg-color-blueLight"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>Mes informations</span> </span> </a>
						</li>
					</ul>
				</div>
				<!-- END SHORTCUT AREA -->

		<?php
			}
		?>