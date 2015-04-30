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
	formid: 'feedbackform',
	persistsection: false,
	revealfx: ['slide', 500],
	onpagechangestart:function($, i, $fieldset){
	   	setTimeout(function() {
			if($("#confirmation_fieldset").attr("style").indexOf("visible") !== -1) {
				// REQUETE AJAX
				
				
				$.post("/public/application/confirmation?dummy=" + new Date().getTime(), $("#feedbackform").serialize(), function(data) {
					$("#confirmation_status").html(data);
				});
				
				/*$("#confirmation_status").load("/public/application/confirmation", $("#wizard_form"), function() {
					
				});*/
				
				//$("#confirmation_status").html("PAGE ! !");
			}
			else {
				$("#confirmation_status").html("Chargement du récapitulatif de votre réservation...");
			}
			
			//locked = false;
			
		}, 600);
	}
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
			<form method="POST" action="add" id="feedbackform" style="height:430px" class="block-content form inline-medium-label">
			
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
							
							
							<select id="heure" name="heure" size="17" >
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
						<legend>Joueurs</legend>
						
						<input type="hidden" id="places_dispo" value="4">
						
						
						<?php
							for($i = 1; $i <= 4; $i++) {
						?>
							<p>
								<label for="joueur<?php echo $i;?>">
									<span class="big">Joueur #<?php echo $i;?></span>
								</label>
								
								<input type="text" id="joueur<?php echo $i;?>" name="joueur<?php echo $i;?>" class="joueur_input" value=""  placeholder="Chercher un membre..."   style="height: 30px"/>
								<!-- begin: Bloc invité -->
								<!-- <?php
									if($i > 1) {
								?>
									<input type="checkbox" id="joueur<?php echo $i;?>_invite" class="guest_checkbox"/> Invité
								<?php
									}
								?>
								<br /> -->
								<!-- end: Bloc invité -->
								<?php
									$j = $i - 1;

									for($k = 0; $k < count($ressources); $k++) {
										//if($ressources[$k]['qte_max_par_partie'] - $j > 0) {
											echo "<input type='checkbox' name='".$ressources[$k]['ressource']."[]' class='".$ressources[$k]['ressource']."_check cb_ressource_".$i."' value='".$j."' /> ".$ressources[$k]['ressource'];
										//}
									}
								?>
								
								<input type="hidden" name="id_joueur<?php echo $i;?>" id="id_joueur<?php echo $i;?>">
							</p>
						<?php
							}
						?>
									
						<div id="selection"></div>
					</fieldset>
					
					<fieldset class="sectionwrap" id="confirmation_fieldset" style="width:680px;">
						<legend>Récapitulatif</legend>
						
						<div class="control-group">
							
							<div id="confirmation_status">Chargement du récapitulatif de votre réservation...</div>
						</div>				
					</fieldset>

					<button type="submit" class="blue" id="submitResa">Réserver</button>
			</form>
		</div>
	</section>
</div>

<?php
	// Remplisage du tableau hoursIntervals en fonction des horaires d'ouverture et de fermeture du golf et de l'interval
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

	$( "#datepicker" ).datepicker({ dateFormat: "dd/mm/yy" ,
									minDate: 0,
									onSelect: function(dateText, inst) {
										$("#date").val(dateText).trigger('change');

									}
									});// TODO : se baser sur l'heure serveur pour restreindre
	
	// Rempli le select des heures avec les horaires
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
	}

	function validate_name(object) {
		object.css('color', 'green');
	}
	
	function unvalidate_name(object) {
		object.css('color', 'black');
		var idSerlector = "#id_"+object.prop('id');
		$(idSerlector).removeAttr("value");
		
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
		for(var i = 4; i > 0; i--) {
			if($("#joueur"+i).attr('tag') != "locked") {
				$("#joueur"+i).removeAttr("disabled");
			}
			
			$(".cb_ressource_"+i).removeAttr("disabled");
			$("#joueur"+i+"_invite").removeAttr("disabled");
		}
		
		if(place_dispo != null) {
			// On desactive les champs utilisateurs en trop si il n'y a pas sufisement de places disponible
			for(var i = 4; i > place_dispo; i--) {
				$("#joueur"+i).val("");
				$("#id_joueur"+i).val("");
				$("#joueur"+i).attr("disabled", "disabled");
				$(".cb_ressource_"+i).attr("disabled", "disabled");
				$(".cb_ressource_"+i).removeAttr("checked");
				$(".cb_ressource_"+i).attr("tag", "locked");
				$("#joueur"+i+"_invite").attr("disabled", "disabled");
				$("#joueur"+i+"_invite").removeAttr("checked");
			}
		}
	}
	
	$(document).ready(function(){
		$("#date").val($.datepicker.formatDate('dd/mm/yy', new Date()));
		$("#datepicker").datepicker("setDate", new Date());
		
		
		fill_hours();
		
		var ressources_selectors = "";
		<?php
		
		for($k = 0; $k < count($ressources); $k++) {
			echo "var ".$ressources[$k]['ressource']." = ".$ressources[$k]['qte_max_par_partie'].";";
			//echo "<input type='checkbox' name='".$ressources[$k]['ressource']."[]' value='".$j."' class='".$ressources[$k]['ressource']."[]' value='".$j."' /> ".$ressources[$k]['ressource'];	
			$virgule = ($k != count($ressources) - 1) ? ", " : "";
			echo "ressources_selectors += '.".$ressources[$k]['ressource']."_check".$virgule."';";
		}
		//$ressources[$k]['qte_max_par_partie']
		?>
		
		$(ressources_selectors).click(function() {
			var count = 0;
			var class_name = $(this).attr('class').split(" ");
			class_name = class_name[0];
			//alert(class_name);
			var max_nb = eval(class_name.substring(0, class_name.length - 6));
			//alert(max_nb);
			$("."+class_name).each(function() {
				if($(this).attr('checked')) {
					count++;
				}
			});
			
			if(count >= max_nb) {
				$("."+class_name).each(function() {
					if(!$(this).attr('checked')) {
						$(this).attr('disabled', 'disabled');
					}
				});
			}
			else {
				$("."+class_name).each(function() {
					if($(this).attr("tag") != "locked") {
						$(this).removeAttr('disabled');	
					}
				});
			}
		});
		
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
		
	});
	
	$("#nb_trous_sw").click(function() {
	    if(this.checked) {
			$("#nb_trous").val(18);
		}
		else {
			$("#nb_trous").val(9);
		}
		$("#nb_trous_optgroup").attr("label", $("#nb_trous").val() + " Trous")
		reset_hours();
		fill_hours();
		reload_hours();
	});

	$("#heure").change(function(){
		restrict_user_nb();
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
		//var maxDate = new Date();
		//maxDate.setDate(currentDate.getDate() + $("#datepicker").datepicker( "option", "maxDate" ));
		
		if($("#datepicker").datepicker("getDate") < currentDate) {
			$( "#datepicker" ).datepicker( "setDate", currentDate );
		} 
		
		
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
	
	$("#joueur2_invite").click(function(){
		if($(this).is(':checked')) {
			$("#joueur2").attr("disabled", 'disabled');
			$("#joueur2").val("Invité");
			$("#id_joueur2").val("0");
		}
		else {
			$("#joueur2").removeAttr("disabled");
			$("#joueur2").val("");
			$("#id_joueur2").val("");
		}
	});
	
	$("#joueur3_invite").click(function(){
		if($(this).is(':checked')) {
			$("#joueur3").attr("disabled", 'disabled');
			$("#joueur3").val("Invité");
			$("#id_joueur3").val("0");
		}
		else {
			$("#joueur3").removeAttr("disabled");
			$("#joueur3").val("");
			$("#id_joueur3").val("");
		}
	});
	
	$("#joueur4_invite").click(function(){
		if($(this).is(':checked')) {
			$("#joueur4").attr("disabled", 'disabled');
			$("#joueur4").val("Invité");
			$("#id_joueur4").val("0");
		}
		else {
			$("#joueur4").removeAttr("disabled");
			$("#joueur4").val("");
			$("#id_joueur4").val("");
		}
	});
	
	var joueurs_presents_ = new Array();
	joueurs_presents_[0] = $("#id_joueur1").val();
	joueurs_presents_[1] = $("#id_joueur2").val();
	joueurs_presents_[2] = $("#id_joueur3").val();
	joueurs_presents_[3] = $("#id_joueur4").val();
	
	$("#joueur1, #joueur2, #joueur3, #joueur4").change(function(){
		//$(this).val("");
		if(lastNameValue != "" && $(this).val() != lastNameValue) {
			unvalidate_name($(this));
		}
		
		var id_name = $(this).attr('id');
		joueurs_presents_[parseInt(id_name.substring(id_name.length-1)) - 1] = $("#id_"+id_name).val();
	});
	
	$("#joueur1, #joueur2, #joueur3, #joueur4").focus(function(){
		lastNameValue = $(this).val();
		$(this).css('color', 'black');
		$(this).select();
	});
	
	$("#joueur1, #joueur2, #joueur3, #joueur4").focusout(function(){
		if(lastNameValue != "" && $(this).val() == lastNameValue) {
			validate_name($(this));
		}
	});
	
	$("#joueur1, #joueur2, #joueur3, #joueur4").autocomplete({
        source: function( request, response ) {
            $.ajax({
				type: "POST",
                url: "/reservationajax/autocomplete?dummy=" + new Date().getTime(),
                dataType: "json",
                data: {
                    featureClass: "P",
                    style: "full",
                    maxRows: 12,
                    name_startsWith: request.term,
					joueurs_presents: joueurs_presents_
                },
                success: function( data ) {
                    response( $.map(data, function (value, key){
							var joueur = new Object();
							joueur.label = value;
							joueur.value = value;
							joueur.key = key;
							return joueur;
                    }));
                }
            });
        },
        minLength: 2,
        select: function( event, ui ) {
			var idSerlector = "#id_"+$(this).prop('id');
			$(idSerlector).val(ui.item.key);
			lastNameValue = ui.item.value;
			validate_name($(this));

        },
        open: function() {
            $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
        },
        close: function() {
            $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
        }
    });

});
</script>