
<div id="u_loading_div" style="display:none;">
	<p>Réservation en cours...</p>
</div>
<form id="detailsform" method="post" action="/golf/reservationajax/update">
	<div id="eventToUpdate">
		<div type="text" id="u_eventStartDate">
			<?php echo $reservation->date_reservation; ?>
		</div>
		
		<input type="hidden" name="id_reservation" id="u_id_reservation" value="<?php echo $reservation->id; ?>" />
		<input type="hidden" name="new" id="new" value="0" />
		
		<?php
			for($i = 1; $i <= 4; $i++) {
				if(count($users) > $i-1) {
					$user = $users[$i-1];
					if ($user->id <= 1){
						$user_input = "value='".$users_info[$i-1]."' disabled ";
					}
					else {
						$user_input = "value='".$user->firstname." ".$user->lastname." (".$user->indgolf.")"."' disabled ";
					}
					
					// Si il s'agit pas de la reservation cliquée
					$other_reservation = "";
					if($clicked_reservation_id != $users_reservation_ids[$i-1]) {
						$other_reservation = " other_reservation ";
					}
				}
				else {
					$user = NULL;
					$user_input = "";
				}
				
				$neuftrous = "";
				$dixhuittrous = "";
				if(count($users_nb_trous) > $i-1) {
					//echo $users_nb_trous[$i-1];
					if($users_nb_trous[$i-1] == 9) {
						$neuftrous = " checked ";
					}
					elseif($users_nb_trous[$i-1] == 18) {
						$dixhuittrous = " checked ";
					}
				}
				else {
					if($users_nb_trous[0] == 9) {
						$neuftrous = " checked ";
					}
					else {
						$dixhuittrous = " checked ";
					}
				}
				
		?>
		
		<div class="<?php echo ($i % 2 == 0) ? " joueur_pair " : " joueur_impair "; echo $other_reservation; $other_reservation = "";?>">
			<label for="joueur<?php echo $i;?>">
				<?php
					if($user != null && $clicked_reservation_id == $users_reservation_ids[$i-1]) {
				?>
						<span class="action_span">
							<span class="leave_button" tag="<?php echo (count($users) > $i-1) ? $users_has_reservation_ids[$i-1] : ""; ?>"> </span>
						</span>
				<?php
					}
				?>
				<span class="big">Joueur <?php echo $i;?></span>
				<?php
				
				//if($user != null) { // temporaire
				?>
				<span class="nbTrousSpan">
					<input name="nbTrousJ<?php echo $i;?>" class="nbTrous9" type="radio" value="9" <?php echo $neuftrous; echo ($user != null)? " disabled " : "" ?> /> 9 Trous
					<input name="nbTrousJ<?php echo $i;?>" class="nbTrous18" type="radio" value="18" <?php echo $dixhuittrous; echo ($user != null)? " disabled " : "" ?> /> 18 Trous
				</span>
				<?php
				//}
				?>
			</label>
			<input name="joueur<?php echo $i;?>" id="u_joueur<?php echo $i;?>" placeholder="Chercher un membre..." type="text" class="full-width joueur_input" <?php echo $user_input;?> />
			
			<span class="guest_span">
				<?php
					if($i > 1) {
				?>
				
					<input type="checkbox" id="u_joueur<?php echo $i;?>_invite" <?php  echo  ($user) ? "disabled='disabled'" : ""; echo  ($user && $user->id == 0) ? "checked='checked'" : ""; ?> class="guest_checkbox" /> Invité
					<br />
				<?php		
					}
				?>
				<input type="checkbox" id="u_joueur<?php echo $i;?>_visiteur" <?php  echo  ($user) ? "disabled='disabled'" : ""; echo ($user && $user->id == 1) ? "checked='checked'": ""; ?> class="visiteur_checkbox"/> Visiteur
			</span>
			
			
			
			<p class="options">
				Options :
				<?php
				
					$j = $i - 1;
					
					for($k = 0; $k < count($ressources); $k++) {
						//if($ressources[$k]['qte_max_par_partie'] - $j > 0) {
							echo "<input type='checkbox' class='".$ressources[$k]['ressource']."_check' name='".$ressources[$k]['ressource']."[]' value='".$j."' ";
							echo ($user != null /*|| (!$is_user_in_other_reservation && !$is_user_in_reservation)*/)? " tag='locked' disabled " : "";
							
							if($user != null) {
								foreach($user_ressources_array[$j] as $ressources_array) {
									if($ressources_array['id_ressources'] == $ressources[$k]['id']) {
										echo " checked ";
									}
								}	
							}
							
							echo " />".$ressources[$k]['ressource'];
							
						//}
					}
				?>
				<!--<input type="checkbox" name="voiturettes[]" value="1" /> Voiturette
				<input type="checkbox" name="chariots[]" value="1" /> Chariot -->
			</p>
			<input type="hidden" name="id_joueur<?php echo $i;?>" id="id_u_joueur<?php echo $i;?>" value="<?php echo ($user != NULL) ? $user->id : '';?>"/>
		</div>
		<?php		
			}
		?>
		
		<div class="submit_div">
			<input type="submit" value="Mettre à jour" id="update_button" style="display:none;"/>
			<input type="submit" value="Nouvelle reservation" id="update_new_button" style="display:none;"/>
			<input type="button" value="Supprimer" id="delete_button"/>
			<input type="button" value="Fermer" id="fermer_button"/>
		</div>
		
	</div>
</form>

<script type="text/javascript" charset="utf-8">

	function validate_details_form() {
			
		for(var i = 2; i <= 4; i++) {
			if($("#u_joueur" + i).val() != "" && ($("#id_u_joueur" + i).val() == "" || $("#id_u_joueur" + i).val() < 0)) {
				alert("Il semble que le joueur " + i + " ne soit pas un membre. Veuillez cocher la case invité le cas échéant.")
				return false;
			}
		}

		return true;
	}
	
	// added by cesar: recuperation de la date de l'event
	var dateToStrFunc = scheduler.date.str_to_date("%Y-%m-%d %H:%i:%s");
	var eventDate = dateToStrFunc($("#u_eventStartDate").html());
	// alert("eventDate:" +eventDate);
	
	$(document).ready(function() {
		var format_francais = scheduler.date.date_to_str("%Hh%i le %d %F %Y");
		var convert = scheduler.date.str_to_date("%Y-%m-%d %H:%i:%s");
		date_object = convert($("#u_eventStartDate").html());
		$("#u_eventStartDate").html(format_francais(date_object));
		
		$("#fermer_button").click(function(){
			
			var resa_form = document.getElementById('details_form_div');
			scheduler.endLightbox(false, resa_form);
			$("#details_form_div").html("");
		});
		
		function validate_name(object) {
			object.css('color', 'green');
		}

		function unvalidate_name(object) {
			object.css('color', 'black');
			var idSerlector = "#id_"+object.prop('id');
			//alert(idSerlector);
			//$(idSerlector).removeAttr("value").trigger('change');
			
			if(!$("#" + object.prop('id') + "_visiteur").is(':checked') && !$("#" + object.prop('id') + "_invite").is(':checked')) {
				$(idSerlector).removeAttr("value").trigger('change');
			}

		}
		
		var newUsers = new Array(); 
		
		var table_length = function(obj){
		   var len = 0;
		   for(var key in obj){
		      len++;
		   }
		   return len;
		}
		
		$("#id_u_joueur1, #id_u_joueur2, #id_u_joueur3, #id_u_joueur4").change(function(){
			
			if($(this).val() == "") {
				delete newUsers[$(this).prop('id')];
			}
			else {
				
				newUsers[$(this).prop('id')] = $(this).val();
				//alert(newUsers[$(this).prop('id')]);
			}
			//alert(Object.keys(newUsers).length);
			
			if(table_length(newUsers) > 0) {
				$("#update_button").show();
				
				if(newUsers[$(this).prop('id')] != 0) {
					$("#update_new_button").show();
				}
			}
			else {
				$("#update_button").hide();
				$("#update_new_button").hide();
			}
			
			var realuser = 0;
			var unb = table_length(newUsers);
			
			
			for(var key in newUsers) {
				if(newUsers[key] > 0) {
					realuser++;
				}
			}
			
			if(realuser == 0) {
				$("#update_new_button").hide();
			}
			
		});
		
		<?php
			for($i = 1; $i <= 4; $i++) {
		?>
				$("#u_joueur<?=$i?>_invite").click(function(){
					if($(this).is(':checked')) {
						$("#u_joueur<?=$i?>_visiteur").removeAttr("checked");
						$("#u_joueur<?=$i?>").attr("placeholder", 'Nom de l\'invité (facultatif)');
						$("#u_joueur<?=$i?>").focus();
						$("#id_u_joueur<?=$i?>").val("0").trigger("change");
					}
					else {
						$("#u_joueur<?=$i?>").attr("placeholder", 'Chercher un membre...');
						$("#u_joueur<?=$i?>").val("");
						$("#u_joueur<?=$i?>").focus();
						$("#id_u_joueur<?=$i?>").val("").trigger("change");
					}
				});
		
				$("#u_joueur<?=$i?>_visiteur").click(function(){
					if($(this).is(':checked')) {
						$("#u_joueur<?=$i?>_invite").removeAttr("checked");
						$("#u_joueur<?=$i?>").attr("placeholder", 'Nom du visiteur (facultatif)');
						$("#u_joueur<?=$i?>").focus();
						$("#id_u_joueur<?=$i?>").val("1").trigger("change");
					}
					else {
						$("#u_joueur<?=$i?>").attr("placeholder", 'Chercher un membre...');
						$("#u_joueur<?=$i?>").val("");
						$("#u_joueur<?=$i?>").focus();
						$("#id_u_joueur<?=$i?>").val("").trigger("change");
					}
				});
				
				$("#u_joueur<?=$i?>_visiteur, #u_joueur<?=$i?>_invite").click(function(){
					if($("#u_joueur<?=$i?>_visiteur").is(':checked') || $("#u_joueur<?=$i?>_invite").is(':checked')) {
						$("#u_joueur<?=$i?>").autocomplete("disable");
					}
					else {
						$("#u_joueur<?=$i?>").autocomplete("enable");
					}
				});
				
		<?php
			}
		?>
		
		$("#update_new_button").click(function(){
			$("#new").val("1");
		});
		
		$("#update_button").click(function(){
			$("#new").val("0");
		});
		
		
		$("#delete_button").click(function() {
			$.ajax({
				url: '/reservationajax/delete',
				type: "POST",
				data: {id_reservation : $("#u_id_reservation").val()},
				dataType: 'json',
				cache: false,
				success: function (data) {
					if(!data.valid) {
						alert(data.message);
					}
					else {
						
						var resa_form = document.getElementById('details_form_div');
						
						scheduler.endLightbox(false, resa_form);

						scheduler.clearAll();

						scheduler.load("/reservationajax/eventsparcours?dummy="+new Date().getTime(), "json", function(){
							$(".dhx_cal_event").height(20);
							scheduler.deleteMarkedTimespan();
							blockTime();
							$.getJSON('/reservationajax/userblockedtimes?dummy='+new Date().getTime(), function(data) {
								 $.each(data, function(key, val) {
									scheduler.blockTime({start_date:new Date(val[0]), end_date:new Date(val[1])});
									scheduler.setCurrentView(); // update view
								 });
							});
							// getOccupation();	// deprecated by cesar
							getPlayersBySlotAt(eventDate);
							scheduler.setCurrentView();
						});
						
						
					}				
				}
			});
		});
		
		$(".leave_button").click(function() {
			var id_users_has_reservation_to_remove = $(this).attr("tag");
			$.ajax({
				url: '/reservationajax/leave',
				type: "POST",
				data: {id_users_has_reservation: id_users_has_reservation_to_remove},
				dataType: 'json',
				cache: false,
				success: function (data) {
					if(!data.valid) {
						alert(data.message);
					}
					else {
						
						var resa_form = document.getElementById('details_form_div');
						
						scheduler.endLightbox(false, resa_form);

						scheduler.clearAll();

						scheduler.load("/reservationajax/eventsparcours?dummy="+new Date().getTime(), "json", function(){
							$(".dhx_cal_event").height(20);
							scheduler.deleteMarkedTimespan();
							blockTime();
							$.getJSON('/reservationajax/userblockedtimes?dummy='+new Date().getTime(), function(data) {
								 $.each(data, function(key, val) {
									scheduler.blockTime({start_date:new Date(val[0]), end_date:new Date(val[1])});
									scheduler.setCurrentView(); // update view
								 });
							});
							// getOccupation();	// deprecated by cesar
							getPlayersBySlotAt(eventDate);
							scheduler.setCurrentView();
						});
						
					}				
				}
			});
		});
		
		var joueurs_presents_ = new Array();
		joueurs_presents_[0] = $("#id_u_joueur1").val();
		joueurs_presents_[1] = $("#id_u_joueur2").val();
		joueurs_presents_[2] = $("#id_u_joueur3").val();
		joueurs_presents_[3] = $("#id_u_joueur4").val();
		
		var joueurs_input = "#u_joueur1, #u_joueur2, #u_joueur3, #u_joueur4";

		$(joueurs_input).change(function() {
			//$(this).val("");
			if(lastNameValue != "" && $(this).val() != lastNameValue) {
				unvalidate_name($(this));
			}
			var id_name = $(this).attr('id');
			joueurs_presents_[parseInt(id_name.substring(id_name.length-1)) - 1] = $("#id_"+id_name).val();
		});

		$(joueurs_input).focus(function(){
			lastNameValue = $(this).val();
			$(this).css('color', 'black');
			$(this).select();
		});

		$(joueurs_input).focusout(function(){
			if(lastNameValue != "" && $(this).val() == lastNameValue) {
				validate_name($(this));
			}
		});

		$(joueurs_input).autocomplete({
	        source: function( request, response ) {
	            $.ajax({
					type: "POST",
	                url: "/reservationajax/autocomplete",
	                dataType: "json",
					cache:false,
	                data: {
	                    featureClass: "P",
	                    style: "full",
	                    maxRows: 12,
	                    name_startsWith: request.term,
						joueurs_presents: joueurs_presents_
	                },
	                success: function( data ) {
						//alert('success');
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
			appendTo: "#details_form_div",		// added by cesar to display menu on top of the form
	        minLength: 2,
	        select: function( event, ui ) {
				var idSerlector = "#id_"+$(this).prop('id');
				//alert(idSerlector);
				$(idSerlector).val(ui.item.key).trigger('change');
				lastNameValue = ui.item.value;
				validate_name($(this));

				//alert(idSerlector);

	            /*log( ui.item ?
	                "Selected: " + ui.item.key :
	                "Nothing selected, input was " + this.value);*/
	        },
	        open: function() {
	            $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
	        },
	        close: function() {
	            $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
	        }
	    });
		
		$('#detailsform').ajaxForm({
			beforeSubmit: function() {
				
				if(!validate_details_form()) {
					return false;
				}
				
				//$("#new").val(new_val);
				
				$("#u_loading_div").height($("#detailsform").height());
				$("#detailsform").hide();
				$("#u_loading_div").show();
			},
			success: function(data) {
				var resp = jQuery.parseJSON(data);
				
				if(!resp.valid) {
					alert(resp.message);
					$("#detailsform").show();
					$("#u_loading_div").hide();
					return false;
				}
				
				var details_form = document.getElementById('details_form_div');
				$("#detailsform").show();
				$("#u_loading_div").hide();
				scheduler.endLightbox(false, details_form);
				
				scheduler.clearAll();
				
				scheduler.load("/reservationajax/eventsparcours?dummy="+new Date().getTime(), "json", function(){
					$(".dhx_cal_event").height(20);
					blockTime();
					// getOccupation();	// deprecated by cesar
					getPlayersBySlotAt(eventDate);
				});
			}
		});
		
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
			var class_name = $(this).attr('class');
			
			var max_nb = eval(class_name.substring(0, class_name.length - 6));
			//alert(max_nb);
			$("."+class_name).each(function() {
				if($(this).attr('checked')) {
					count++;
				}
			});
			
			if(count > max_nb) {
				$(this).removeAttr('checked')
				count--;
			}
			
			if(count >= max_nb) {
				$("."+class_name).each(function() {
					if(!$(this).attr('checked')) {
						$(this).attr('disabled', 'disabled');
					}
				});
			}
			else {
				$("."+class_name).each(function() {
					if($(this).attr('tag') != 'locked') {
						$(this).removeAttr('disabled');
					}
				});
			}
		});
		
	});
	
</script>
