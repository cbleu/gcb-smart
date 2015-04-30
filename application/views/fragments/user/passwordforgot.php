<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>

<style type="text/css">
* { font-family: Verdana; font-size: 96%; }
label { width: 10em; float: left; }
label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
p { clear: both; }
.submit { margin-left: 12em; }
em { font-weight: bold; padding-right: 1em; vertical-align: top; }
</style>

<form class="form-horizontal" name="createform" id="createform"  method="post" action="/public/application/passwordclear">
	<fieldset>
	<div class="control-group">
		<label class="control-label" for="inputEmail">Email</label>
		<div class="controls">
			<em>*</em><input type="text" name="email" id="inputEmail" placeholder="Email" class="required email"/>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">Réinitialiser le mot de passe</button>
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
      //alert("Test="+form.lastname);
      form.submit();
   	}
	});
});
</script>