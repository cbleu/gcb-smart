<?php
$user = Auth::instance()->get_user();
?>
<!-- Header -->


<!--[if lte IE 8]><script src="js/standard.ie.js"></script><![endif]-->

<!-- Server status -->
<header>
	<div class="container_12">
		<p id="skin-name"><small>Golf Club de Bourbon<br/>Administration Dashboard</small> <strong>1.1</strong></p>
	</div>
</header>
<!-- End server status -->

<!-- Main nav -->
<nav id="main-nav">
	<ul class="container_12">
		<li class="home <?php if ($home==1){echo ' current';}?>"><a href="/admin/dashboard" title="Accueil">Accueil</a>
			<ul>
				<li class="current"><a href="#" title="Dashboard">Dashboard</a></li>
				<li class="membre"><a href="/" title="Retour Espace membre">Retour Espace membre</a></li>
			</ul>
		</li>
		<li class="users <?php if ($users==1){echo ' current';}?>"><a href="/golf/membres" title="Membres">Membres</a>
			<ul>
				<li><a href="/golf/membres/list" title="Liste des membres">Liste</a></li>
				<li><a href="/golf/membres/add" title="Ajouter un membre">Ajouter un membre</a></li>
				<li><a href="/golf/membresdesactive" title="Membres désactivés">Membres désactivés</a></li>
				<li><a href="/golf/membresvalide/valide" title="Inscriptions à valider">Inscriptions à valider</a></li>
			</ul>
		</li>
		<li class="stats <?php if ($reservation==1){echo ' current';}?>"><a href="/reservation/calendrier" title="Réservation">Réservation</a>
			<ul>
				<li><a href="/reservation/calendrier" title="Calendrier">Calendrier</a></li>
				<!--<li><a href="/reservation/diagramme" title="Add file">Diagramme</a></li>-->
				<li><a href="/reservation/wizard" title="Assistant">Assistant</a></li>
				<li><a href="/golf/departs/jour" title="Browse">Départs du jour</a></li>
				<li><a href="/golf/resavisiteurs/" title="Demande de Réservation Visiteurs">Visiteurs</a></li>
				<li><a href="/events/list" title="Liste des évènements">Evènements</a></li>
				<!--<li><a href="/reservation/add" title="Add file">Ajouter</a></li>-->
				<!--<li><a href="/reservation/settings" title="Settings">Réglages</a></li>-->
			</ul>
		</li>

		<li class="settings <?php if ($settings==1){echo ' current';}?>"><a href="/golf/golf" title="Paramétrages">Paramétrages</a>
			<ul>
				<li><a href="/golf/golf" title="Paramétrages">Paramétrages</a></li>
				<li><a href="/golf/parcours" title="Parcours">Parcours</a></li>
				<!--<li><a href="/golf/tarifs" title="Tarifs">Tarifs</a></li>-->
				<li><a href="/golf/pays" title="Pays">Pays</a></li>
				<li><a href="/golf/roles" title="Rôles">Rôles</a></li>
				<li><a href="/golf/rolesusers" title="Rôles Utilisateurs">Administrateurs</a></li>
			</ul>
		</li>

	</ul>
</nav>
<!-- End main nav -->

<!-- Sub nav -->
<div id="sub-nav">
</div>
<!-- End sub nav -->

<!-- Status bar -->
<div id="status-bar">
	<div class="container_12">
		<ul id="status-infos">
		<li class="spaced">Utilisateur : <strong><Admin><?php echo $user->firstname." ".$user->lastname;?></strong></li>

			<li><a href="/logout" class="button red" title="Se déconnecter"><span class="smaller">Se déconnecter</span></a></li>
		</ul>
	
		<ul id="breadcrumb">
			<li><a href="/admin/dashboard" title="Administration">Administration</a></li>
			<?php if ($home==1){echo '<li>Accueil &nbsp;</li>';}?>
			<?php if ($users==1){echo '<li>Membres &nbsp;</li>';}?>
			<?php if ($reservation==1){echo '<li>Réservation &nbsp;</li>';}?>
			<?php if ($settings==1){echo '<li>Paramétrages &nbsp;</li>';}?>
		</ul>
	</div>
</div>
<!-- End status bar -->

<div id="header-shadow"></div>
<!-- End header -->