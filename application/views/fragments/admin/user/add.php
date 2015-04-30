<?= $header_nav; ?>
<br/>
<div class="container_12">
<section class="grid_12">
	<div class="block-border">
<form class="form" id="new-login" method="post" action="/user/newadmin">
	<fieldset class="grey-bg no-margin">
		<p class="input-with-button">
			<label for="nom">Prénom</label>
			<input type="text" name="nom" id="nom" value="">
			<label for="prenom">Nom</label>
			<input type="text" name="prenom" id="prenom" value="">
			<label for="indexgolf">Votre index</label>
			<input type="text" name="indexgolf" id="indexgolf" value="">
			<label for="email">Email</label>
			<input type="text" name="email" id="email" value="">
			<label for="telephone">Téléphone / GSM</label>
			<input type="text" name="telephone" id="telephone" value="">
			<label for="telephone">Adresse</label>
			<input type="text" name="adresse" id="adresse" value="">
			<label for="telephone">Code postal</label>
			<input type="text" name="cp" id="cp" value="">
			<label for="telephone">Ville</label>
			<input type="text" name="ville" id="ville" value="">
			<label for="telephone">Pays</label>
			<input type="text" name="pays" id="pays" value="">
			<br/><br/>
			<button type="submit">Valider</button>
		</p>
	</fieldset>
</form>
	</div>
	</section>
</div>