<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>

<style type="text/css">

label.error { float: none; color: red; padding-left: .5em; vertical-align: top; font-size:12px;height:0;}
p { clear: both; }
.submit { margin-left: 12em; }
em { font-weight: bold; padding-right: 1em; vertical-align: top; }
</style>

<form class="form-horizontal" name="createform" id="createform"  method="post" action="/public/application/inscriptionvalide">
	<fieldset>
	<div class="control-group">
		<label class="control-label" for="inputEmail">Email *</label>
		<div class="controls">
			<input type="text" name="email" id="inputEmail" placeholder="Email" class="required email"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputPassword">Mot de passe *</label>
		<div class="controls">
			<input type="password" name="password" id="inputPassword" placeholder="Mot de passe" class="required" minlength="4"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputPassword2">Mot de passe *</label>
		<div class="controls">
			<input type="password" name="password2" id="inputPassword2" placeholder="Mot de passe" class="required" minlength="4"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="lastname">Nom</label>
		<div class="controls">
			<input type="text" id="lastname" name="lastname" placeholder="Nom" class="required"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="firstname">Prénom</label>
		<div class="controls">
			<input type="text" id="firstname" name="firstname" placeholder="Prénom" class="required"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="adresse">Adresse</label>
		<div class="controls">
			<input type="text" id="adresse" name="adresse" placeholder="Adresse"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="cp">Code Postal</label>
		<div class="controls">
			<input type="text" id="cp" name="cp" placeholder="Code Postal"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="ville">Ville</label>
		<div class="controls">
			<input type="text" id="ville" name="ville" placeholder="Ville"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="pays">Pays</label>
		<div class="controls">
			<select name="pays" id="pays">
				<?php
					foreach($pays as $p) {
						echo '<option value="'.$p->id.'">'.$p->nom.'</option>';
					}
				?>
			</select>
			
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="telephone">Téléphone</label>
		<div class="controls">
			<input type="text" id="telephone" name="telephone" placeholder="Telephone"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="index">Index</label>
		<div class="controls">
			<input type="text" id="index" name="index" placeholder="Index"/>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">S'inscrire</button>
		</div>
	</div>
	</fieldset>
</form>

<script>

jQuery.extend(jQuery.validator.messages, {
	required: "Ce champ est requis",
	remote: "Veuillez vérifier ce champ.",
	email: "Veuillez saisir une adresse mail valide.",
	url: "Veuillez saisir une URL valide.",
	date: "Veuillez saisir une date valide.",
	number: "Veuillez saisir un nombre.(ex.: 12,-12.5,-1.3e-2)",
	integer: "Veuillez saisir un nombre sans décimales.",
	creditcard: "Veuillez saisir un numéro de carte de crédit valide.",
	equalTo: "Veuillez resaisir la même valeur.",
	maxlength: $.validator.format("Veuillez ne pas saisir plus de {0} caractères."),
	minlength: $.validator.format("Veuillez saisir au moins {0} caracères."),
	datetime : "Veuillez saisir une date/heure valide.(aaaa-mm-jjThh:mm:ssZ)",
	'datetime-local': "Veuillez saisir une date/heure locale valide.(aaaa-mm-jjThh:mm:ss)",
	time : "Veuillez saisir une heure valide (hh:mm).",
	color: "Veuillez saisir une couleur valide. (nommée, hexadecimale ou rvb)",
	week:"Veuillez saisir une année et une semaine. (ex.: 1974-W43)",
	month:"Veuillez saisir une année et un mois. (ex.: 1974-03)",
	alphabetic:"Veuillez ne saisir que des lettres.",
	alphanumeric : "Veuillez ne saisir que des lettres, souligné et chiffres.",
	max: $.validator.format("Veuillez saisir une valeur inférieure ou égale à  {0}."),
	min: $.validator.format("Veuillez saisir une valeur supérieure ou égale à  {0}.")
});


$(document).ready(function(){
  	//$("#loginform").validate();
	$("#createform").validate({
   	submitHandler: function(form) {
		if($("#inputPassword2").val() != $("#inputPassword").val()) {
			alert("Attention les deux mots de passes doivent être identiques !");
			return false;
		}
      //alert("Test="+form.lastname);
      form.submit();
   	}
	});
});
</script>