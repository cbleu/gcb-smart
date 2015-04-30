<link rel="stylesheet" type="text/css" href="/assets/wizard/formwizard.css" />
<link rel="stylesheet" type="text/css" href="/assets/admin/css/special-pages.css" />
<!-- <link rel="stylesheet" type="text/css" href="/assets/fullcalendar/jquery-ui.css" /> -->
<link href="/assets/libs/jquery-ui/css/themes/redmond/jquery-ui.min.css" rel="stylesheet" type="text/css" />

<!-- <script src="/assets/fullcalendar/jquery-1.8.3.js" type="text/javascript"></script> -->
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="/assets/libs/jquery/jquery-migrate.min.js"></script>
<script src="/assets/wizard/formwizard.js" type="text/javascript"></script>
<!-- <script src="/assets/wizard/jquery.autocomplete.js" type="text/javascript"></script> -->
<!-- <script src="/assets/fullcalendar/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script> -->
<script src="/assets/libs/jquery-ui/js/jquery-ui.min.js"></script>
<script src="/assets/wizard/jquery.ui.datepicker-fr.js" type="text/javascript"></script>

<script type="text/javascript">
var myform=new formtowizard({
	formid: 'wizard_form',
	persistsection: false,
	revealfx: ['slide', 500]
});
</script>

<style type="text/css">
	.joueur_input {
		width:300px;
	}
	/****************** Switches ********************/
	.switch-replace {
		display: inline-block;
		width: 70px;
		height: 30px;
		background: url(/assets/images/switch-bg.png) no-repeat 0 -34px;
		vertical-align: middle;
		cursor: pointer;
	}
	.switch:checked + .switch-replace {
		background-position: 0 0;
	}
	.switch:disabled + .switch-replace {
		background-position: 0 -68px;
	}
	/** IE class **/
	.switch-replace-checked {
		background-position: 0 0;
	}
	.switch-replace-disabled {
		background-position: 0 -68px;
	}
	
	#confirmation_status {
		margin-left: 60px;
		height:250px;
	}
	
	#confirmation_div {
		font-size:18px;
	}
	
	.info_supl_span {
		float:none;
		color:grey;
		margin:auto;
		font-size:14px;
		font-style:italic;
	}
	
	.ul_confirmation {
		margin-left:60px;
	}
	
	.ul_confirmation li {
		margin-top:5px;
	}
	
	#datepicker {
		margin-top:20px;
		margin-left:180px;
		width:100px;
		height:250px;
	}
	
	#heure {
		float:left;
		width:280px;
	}
	
	#nb_trous_selector {
		float:left;
		margin-left:10px;
	}
</style>

<?= $header_nav; ?>

<div class="container_12 wizard-bg">
	<section>
		<div class="block-border">
			<form method="POST" action="/golf/reservation/update_resa_visiteur" id="wizard_form" style="height:430px" class="block-content form inline-medium-label">
				<input type="hidden" name="id_demande_reservation" value="<?=$demande_reservation->id?>">
				<h1>Réservation</h1>
				
					<fieldset class="sectionwrap" style="width:680px;">
						<legend>Date</legend>
						
						<p>
							<label for="date">
								<span class="big">Date</span>
							</label>

							<input type="text" id="date" name="date" placeholder="Choisir une date" class="span5"/>
						</p>
						<p>	
							<div id="datepicker"></div>
						</p>
									
					</fieldset>
					
					<fieldset class="sectionwrap" style="width:680px;">
						<legend>Parcours</legend>
						
						<p>
							<label for="parcours">
								<span class="big">Heure</span>
							</label>
							
							
							<select id="heure" name="heure" multiple="multiple" size="17" >
								<optgroup id="nb_trous_optgroup" label="18 Trous">
									
								</optgroup>
							</select>
							
							<div id="nb_trous_selector">
								18 Trous
								<input autocomplete='off' type="checkbox" name="nb_trous_sw" id="nb_trous_sw" value="1" class="switch" checked="checked" style="display: none;">
								9 Trous
							</div>
							
							
							<input type="hidden" name="nb_trous" id="nb_trous" value="18" />
							
						</p>				
					</fieldset>

					<fieldset class="sectionwrap"  style="width:680px;">
						<legend>Partie</legend>
						
							<p>
								<label for="nb_joueurs">
									<span class="big">Nombre de joueurs</span>
								</label>
								
								<?php
								
								for($i = 1; $i <= 4; $i++) {
									$checked = "";
									if($i == $demande_reservation->nb_joueurs) {
										$checked = "checked";
									}
								?>
									<input type="radio" name="nb_joueurs" class="nb_joueurs" id="nb_joueurs_<?=$i?>" value="<?=$i?>" <?=$checked?>/> <?=$i?>
								<?php	
								}
								?>
							</p>
							<br />
							<br />
							<?php
							for($k = 0; $k < count($ressources); $k++) {
								$resname = strtolower($ressources[$k]['ressource']);
							?>

								<p>
									<label for="nb_<?php echo $ressources[$k]['ressource'];?>">
										<span class="big">
											Nombre de <?php echo $ressources[$k]['ressource'];?>s
										</span>
									</label>
									
										<?php
											for($i = 0; $i <= $ressources[$k]['qte_max_par_partie']; $i++) {
										?>
										<input type="radio" name="nb_<?php echo $ressources[$k]['ressource'];?>s" class="nb_<?php echo $ressources[$k]['ressource'];?>s" name="nb_<?php echo $ressources[$k]['ressource'];?>s"  value="<?php echo $i;?>" <?php echo ($i == $ressources_resa[$resname]) ? "checked" : "";?>/> <?php echo $i;?>
										<?php
										}
										?>
									
								</p>
								<br />
								<br />
							<?php
							}
							?>
							
					</fieldset>
					
					<fieldset class="sectionwrap" id="confirmation_fieldset" style="width:680px;">
						
						<legend>Coordonnées</legend>
						<p>
							<label for="client_name">
								<span class="big">Nom * </span>
							</label>

							<input type="text" id="client_name" name="client_name" class="span5 joueur_input" value="<?=$demande_reservation->nom?>"/>
						</p>
						
						<p>
							<label for="client_firstname">
								<span class="big">Prénom * </span>
							</label>

							<input type="text" id="client_firstname" name="client_firstname" class="span5 joueur_input" value="<?=$demande_reservation->prenom?>"/>
						</p>
						
						<p>
							<label for="client_email">
								<span class="big">E-mail * </span>
							</label>

							<input type="text" id="client_email" name="client_email" class="span5 joueur_input" value="<?=$demande_reservation->email?>"/>
						</p>
						
						<p>
							<label for="client_phone">
								<span class="big">Téléphone</span>
							</label>

							<input type="text" id="client_phone" name="client_phone" class="span5 joueur_input" value="<?=$demande_reservation->phone?>"/>
						</p>	
					</fieldset>

					<button type="submit" class="blue" id="submitResa">Confirmer</button>
			</form>
		</div>
	</section>
</div>

<?php
	// Remplisage du tableau hoursIntervals en fonction des horraires d'ouverture et de fermeture du golf et de l'interval
	$timeStr = "";
	$t = $beginTime;

	while($t <= $endTime) {
		$timeStr .= ' "'.$t->format('H:i').'",';
		$t->add(new DateInterval('PT'.$interval.'M'));
	}
	
	$timeStr = substr($timeStr, 0, -1);

?>

<script type="text/javascript">
/*jslint  browser: true, white: true, plusplus: true */
/*global $: true */

$(function () {
    'use strict';
	var lastNameValue = "";
	var hoursIntervals = new Array(<?php echo $timeStr;?>);

	$( "#datepicker" ).datepicker({
							dateFormat: "dd/mm/yy" ,
							/*minDate: 0,*/
							/*maxDate: 3,*/
							onSelect: function(dateText, inst) {
								$("#date").val(dateText).trigger('change');								
							}
							});// TODO : se baser sur l'heure serveur pour restreindre
	
	// Rempli le select des heures avec les horraires
	function fill_hours() {
		for(var i = 0; i < hoursIntervals.length; i++) {
			$("#heure optgroup#nb_trous_optgroup").append('<option value="' + hoursIntervals[i] + '">' + hoursIntervals[i] + '</otpion>');
		}
	}
	
	// Remet le select des heures l'état initial
	function reset_hours() {
		$("#heure optgroup#nb_trous_optgroup option").each(function(){
				$(this).remove();
		});
		
		fill_hours();
	}
	
	function restrict_user_nb() {
		var place_dispo;
		if($("#heure").find(":selected") != null) {
			//alert($("#heure").find(":selected").text());
			place_dispo = $("#heure").find(":selected").attr("places_dispo");
		}
		else {
			//alert($("#heure option").first().text());
			place_dispo = $("#heure optgroup#nb_trous_optgroup option").first().attr("places_dispo");
		}
		
		// reset le grisage utilisateur
		$(".nb_joueurs").removeAttr("disabled");
		
		if(place_dispo != null) {
			// On desactive les champs utilisateurs en trop si il n'y a pas sufisement de places disponible
			for(var i = 4; i > place_dispo; i--) {
				$("#nb_joueurs_"+i).attr("disabled", "disabled");
				
				if($("#nb_joueurs_"+i).attr("disabled") && $("#nb_joueurs_"+i).attr("checked")) {
					$("#nb_joueurs_"+i).removeAttr("checked");
					$("#nb_joueurs_"+(i-1)).attr("checked", "checked");
				}
			}
		}
	}
	
	$(document).ready(function(){
		<?php
			$date_str = explode(" ", $demande_reservation->date);	
		?>
		
		//alert($.datepicker.parseDate('yy-mm-dd', "<?=$date_str[0]?>"));
		
		$("#date").val($.datepicker.formatDate('dd/mm/yy', $.datepicker.parseDate('yy-mm-dd', "<?=$date_str[0]?>")));
		$("#datepicker").datepicker("setDate", $.datepicker.parseDate('yy-mm-dd', "<?=$date_str[0]?>"));
		
		fill_hours();
		
		// Input switches
		$('input[type=radio].switch, input[type=checkbox].switch').hide().after('<span class="switch-replace"></span>').next().click(function() {
			$(this).prev().click();
		}).prev('.with-tip').next().addClass('with-tip').each(function()
		{
			$(this).attr('title', $(this).prev().attr('title'));
		});
		$('input[type=radio].mini-switch, input[type=checkbox].mini-switch').hide().after('<span class="mini-switch-replace"></span>').next().click(function() {
			$(this).prev().click();
		}).prev('.with-tip').next().addClass('with-tip').each(function()
		{
			$(this).attr('title', $(this).prev().attr('title'));
		});
		
		$("#date").trigger("change");
		
		<?php
			if($demande_reservation->nb_trous == 9) {
				echo '$("#nb_trous_sw").click();';
			}
		?>
		
	});

	$("#nb_trous_sw").click(function() {
		if($(this).attr("checked")) {
			$("#nb_trous").val(9);
			
		}
		else {
			$("#nb_trous").val(18);
		}
		
		$("#nb_trous_optgroup").attr("label", $("#nb_trous").val() + " Trous")
		
		reset_hours();
		fill_hours();
		reload_hours();
		
	});
	
	$("#heure").change(function(){
		restrict_user_nb();
	});
	
	function reload_hours() {
		var currentDate = new Date()
		$("#heure optgroup#nb_trous_optgroup option").each(function(){
			var dt = $("#datepicker").datepicker("getDate");
			
			var hm = $(this).val().split(':');
			var h = hm[0];
			var m = hm[1];
			
			dt.setHours(h,m,0);

			if(dt < currentDate){
				$(this).remove();
			}
		});
		
		$.ajax({
			type: "POST",
               url: "/reservationajax/retrievedate?dummy=" + new Date().getTime(),
			dataType: "json",
			data: {
				date: $("#date").val(),
				nb_trous: $("#nb_trous").val()
			},
			success: function( data ) {
				$.map(data, function (horraires_reservees){
						for(var horraire in horraires_reservees) {
							//alert(horraires_reservees[horraire]);
							$("#heure optgroup#nb_trous_optgroup option").each(function(){
								if($(this).val() == horraires_reservees[horraire][0]) {
									//$(this).attr('disabled', ''); // Disable this choice
									
									$(this).attr("places_dispo", horraires_reservees[horraire][1]);
									
									if(horraires_reservees[horraire][1] == 0) {
										$(this).remove();
									}
									else if(horraires_reservees[horraire][1] == 1) {
										$(this).append(" (dernière place disponible)");
									}
									else {
										$(this).append(" (" + horraires_reservees[horraire][1] + " places disponibles)")
									}
									
								}
							});
						}
				});
			}
			
		});
	}
		
	$("#date").change(function() {
		
		var currentDate = new Date();
		var maxDate = new Date();
		maxDate.setDate(currentDate.getDate() + $("#datepicker").datepicker( "option", "maxDate" ));
		
		var textfield_date = $.datepicker.parseDate("dd/mm/yy", $("#date").val());
		
		/*if(textfield_date < currentDate) {
			$( "#datepicker" ).datepicker( "setDate", currentDate );
			$("#date").val($.datepicker.formatDate('dd/mm/yy', currentDate));
			
		} 
		else if(textfield_date > maxDate){
			$( "#datepicker" ).datepicker( "setDate", maxDate );
			$("#date").val($.datepicker.formatDate('dd/mm/yy', maxDate));
		}*/
		
			
		if($(this).val() == "") { // TODO remplacer par expression reguliere de date
			$("#heure").attr('disabled', '');
			return;
		}
			
		$("#heure").removeAttr('disabled');
		
		
		reset_hours();
		fill_hours();
		reload_hours();
					
		setTimeout(restrict_user_nb, 1000);
	});
	

	$("#wizard_form").submit(function(){
		
		var message_erreur = "";
		var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
		if($("#client_name").val().length < 2) {
			message_erreur = "Erreur ! Veuillez saisir votre nom";
		}
		else if($("#client_firstname").val().length < 2) {
			message_erreur = "Erreur ! Veuillez saisir votre prénom";
		}
		else if(!reg.test($("#client_email").val())) {
			message_erreur = "Erreur ! Veuillez saisir une addresse E-mail valide";
		}
		
		if(message_erreur != "") {
			alert(message_erreur);
			return false;
		}
		
		return true;
	});

});
</script>