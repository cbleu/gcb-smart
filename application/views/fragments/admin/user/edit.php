<?= $header_nav; ?>
<br/>
<div class="container_12">
<section class="grid_12">
	<div class="block-border">
<form class="form" id="new-login" method="post" action="/user/update/<?=$id;?>">
	<fieldset class="grey-bg no-margin">
		<p class="input-with-button">
			<label for="nom">Prénom</label>
			<input type="text" name="nom" id="nom" value="<?=$prenom;?>">
			<label for="prenom">Nom</label>
			<input type="text" name="prenom" id="prenom" value="<?=$nom;?>">
			<label for="indexgolf">Votre index</label>
			<input type="text" name="indexgolf" id="indexgolf" value="<?=$indgolf;?>">
			<label for="email">Email</label>
			<input type="text" name="email" id="email" value="<?=$email;?>">
			<label for="telephone">Téléphone / GSM</label>
			<input type="text" name="telephone" id="telephone" value="<?=$telephone;?>">
			<label for="telephone">Adresse</label>
			<input type="text" name="adresse" id="adresse" value="<?=$adresse;?>">
			<label for="telephone">Code postal</label>
			<input type="text" name="cp" id="cp" value="<?=$cp;?>">
			<label for="telephone">Ville</label>
			<input type="text" name="ville" id="ville" value="<?=$ville;?>">
			<label for="telephone">Pays</label>
			<input type="text" name="pays" id="pays" value="<?=$pays;?>">
			<br/><br/>
			<button type="submit">Valider</button>
		</p>
	</fieldset>
</form>
	</div>
	</section>
</div>


