
<div id="main-content">
	<!-- Carousel================================================== -->
	<!-- carousel css -->
	<!-- <link rel="stylesheet" href='/assets/css/carousel.css' charset="utf-8"> -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<?php if($isLogged) { ?>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			<?php } ?>
		</ol>
		<div class="carousel-inner">
			<div class="item active">
				<img src="/assets/img/gcb/golf8.jpg" alt="First slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>Golf Club de Bourbon</h1>
						<p>Bienvenue sur votre site de gestion des départs.</p>
						<p align="right">La direction</p>
					</div>
				</div>
			</div>
			<div class="item">
				<img src="/assets/img/gcb/tee10.jpg">
				<div class="container">
					<div class="carousel-caption">
						<h1>Résa en ligne.</h1>
						<p>Actualisées en temps réel.</p>
						<p><a href="/app/calendrier" title="planning" class="btn btn-primary btn-lg" role="button" target="_self">Voir le Planning &raquo;</a></p>
					</div>
				</div>
			</div>
			<?php if($isLogged) { ?>
			<div class="item">
				<img src="/assets/img/gcb/GOLF1.jpg" >
				<div class="container">
					<div class="carousel-caption">
						<h1>Votre index ?</h1>
						<p>Pensez à mettre à jour votre index sur votre fiche de renseignements</p>
						<p><a href="/app/informations" title="planning" class="btn btn-info btn-lg" role="button" target="_self">Voir vos informations &raquo;</a></p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>
	<!-- /.carousel -->
	<div class="container">
		<div class="row">
			<?php if($isLogged) { ?>
				<div class="col-md-4">
					<h2>Le planning</h2>
					<p>Consultez le calendrier des réservations et réservez votre partie en quelques clics. Vous pouvez ajouter ou modifier un départ mais aussi ajouter d'autres membres à votre partie. Les départs peuvent être pris du trou 1 ou du trou 10</p>
					<p><a href="/app/calendrier" title="planning" class="btn btn-primary" role="button" target="_self">Voir le Planning &raquo;</a></p>
				</div>
				<div class="col-md-4">
					<h2>L'assistant ...</h2>
					<p>Laissez vous guider par l'assistant de réservation pour réserver votre partie de manière simple et rapide. Seul les créneaux horaires disponibles vous seront proposés aux dates que vous choisirez en fonction du nombre de trous que vous voulez faire. </p>
					<p><a href="/app/wizard" title="wizard" class="btn btn-success" role="button" target="_self">Lancer l'assistant &raquo;</a></p>
				</div>
				<div class="col-md-4">
					<h2>Vos informations</h2>
					<p>Prenez le temps de mettre à jour vos coordonnées mais surtout votre index en fonction de vos dernières compétitions, il est indiqué sur les réservation afin que vous puissiez au mieux choisir vos partenaires de jeu !</br>&nbsp;</p>
					<p><a href="/app/informations" title="user" class="btn btn-info" role="button" target="_self">Voir vos information &raquo;</a></p>
				</div>
			<?php } else { ?>
				<div class="col-md-5 headings-container">
					<h2>Le planning</h2>
					<p>Consultez le calendrier des réservations pour les jours à venir. En tant que visiteur, seuls le nombre de joueurs par partie sera indiqué. L'assistant permet de réserver une partie.</p>
					<p><a href="/app/calendrier" title="planning" class="btn btn-primary bottom-btn" role="button" target="_self">Voir le Planning &raquo;</a></p>
				</div>
				<div class="col-md-5 headings-container">
					<h2>L'assistant ...</h2>
					<p>Laissez vous guider par l'assistant de réservation pour réserver votre partie de manière simple et rapide en tant que visiteur. Vous devrez confirmer au près de l'accueil votre départ. </p>
					<p><a href="/app/wizard" title="wizard" class="btn btn-success bottom-btn" role="button" target="_self">Lancer l'assistant &raquo;</a></p>
				</div>
			<?php } ?>
		</div>
	</div> <!-- /container -->
</div>