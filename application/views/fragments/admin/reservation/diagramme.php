<?= $header_nav; ?>
<!-- <link rel="stylesheet" type="text/css" href="/assets/fullcalendar/jquery-ui.css" /> -->
<link href="/assets/libs/jquery-ui/css/themes/redmond/jquery-ui.min.css" rel="stylesheet" type="text/css" />

<!-- <script src="/assets/fullcalendar/jquery-1.8.3.js" type="text/javascript"></script> -->
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="/assets/libs/jquery/jquery-migrate.min.js"></script>
<script src="/assets/wizard/formwizard.js" type="text/javascript"></script>
<!-- <script src="/assets/wizard/jquery.autocomplete.js" type="text/javascript"></script> -->
<!-- <script src="/assets/fullcalendar/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script> -->
<script src="/assets/libs/jquery-ui/js/jquery-ui.min.js"></script>

<script src="/assets/fullcalendar/json2.js" type="text/javascript"></script>


<style type='text/css'>

</style>

<br/>
<div class="container_12 wizard-bg">
	<section class="grid_8">
			<div class="block-border"><div class="block-content">
				<h1>Réservations</h1>
				<div class="block-controls">
					<ul class="controls-buttons">
						<li><a href="#nav-prev" title="Previous Month"><img src="/assets/img/fugue/navigation-180.png" width="16" height="16"></a></li>
						<li class="sep"></li>
						<li class="controls-block"><strong><span id="datejour"><?=$datefr;?></span></strong></li>
						<li class="sep"></li>
						<li><a href="#nav-next" title="Next Month"><img src="/assets/img/fugue/navigation.png" width="16" height="16"></a></li>
					</ul>
				</div>

				<ul class="planning no-margin">
					<li class="planning-header">
						<span><b>Horaires</b></span>
						<ul>
							<li class="at-day-1">1</li>
							<li class="at-day-2">2</li>
							<li class="at-day-3">3</li>
							<li class="at-day-4">4</li>
							<li class="at-day-5">5</li>
							<li class="at-day-6">6</li>
							<li class="at-day-7">7</li>
							<li class="at-day-8">8</li>
							<li class="at-day-9">9</li>
							<li class="at-day-10">10</li>
							<li class="at-day-11">11</li>
							<li class="at-day-12">12</li>
							<li class="at-day-13">13</li>
							<li class="at-day-14">14</li>
							<li class="at-day-15">15</li>
							<li class="at-day-16">16</li>
							<li class="at-day-17">17</li>
							<li class="at-day-18">18</li>
						</ul>
					</li>
					<?php
					for ($i=0; $i < count($selectime); $i++) { 
						?>
						<li>
							<a href="#"><?=$selectime[$i]['time'];?></a>
							<ul>
								<li class="current-time at-day-1"></li>
								<li class="current-time at-day-10"></li>

									<li class="milestone<?=$selectime[$i]['reservations1']['couleur'];?> at-day-1"><a href="#resa-click-01-<?=$selectime[$i]['time'];?>" id="resaclick-01-<?=$i;?>"  title="Réservation Trou 1 pour <?=$selectime[$i]['time'];?>" class="with-tip"></a></li>
									<li class="milestone<?=$selectime[$i]['reservations10']['couleur'];?> at-day-10"><a href="#resa-click-10-<?=$selectime[$i]['time'];?>" id="resaclick-10-<?=$i;?>"  title="Réservation Trou 10 pour <?=$selectime[$i]['time'];?>" class="with-tip"></a></li>	
							
							</ul>
						</li>
						<?php
					}
					?>
				</ul>

				<ul class="message no-margin">
					<li><?=$nb_resa;?> réservations en cours</li>
				</ul>

			</div></div>
		</section>
		<section class="grid_4">
			<div id="datepicker">
			</div>
		</section>
	</div>
	<div id='eventdata'></div>

	<form id="form" action="#" method="post">
	<div id="eventToAdd" style="display: none; font-size: 12px;">
	    Nous allons enregistrer une réservation pour le
		<input type="text" id="eventStartDate" value="<?=$datefr;?>" />.<br />
		<input type="hidden" id="eventStartHeure" value="06:00" />.<br />
		<input type="hidden" id="eventStartDatehide" value="<?=$datefrhide;?>" />
		<label for="parcours">
			<span class="big">Votre parcours</span>
		</label>

		<select name="parcours" id="parcours" class="full-width">
			<?php
				foreach($parcours as $p) {
					echo '<option value="'.$p->id.'">'.$p->nom_parcours.'</option>';
				}
			?>
		</select>
		<br/>
			<p>
				<label for="joueur1">
					<span class="big">Joueur 1</span>
				</label>
				<input name="joueur1" id="joueur1" type="text" class="full-width joueur_input"/>
				<input type="hidden" name="id_joueur1" id="id_joueur1">
			</p>

			<p>
				<label for="joueur2">
					<span class="big">Joueur 2</span>
				</label>
				<input name="joueur2" id="joueur2" type="text" class="full-width joueur_input"/>
				<input type="hidden" name="id_joueur2" id="id_joueur2">
			</p>

			<p>
				<label for="joueur3">
					<span class="big">Joueur 3</span>
				</label>
				<input name="joueur3" id="joueur3" type="text" class="full-width joueur_input"/>
				<input type="hidden" name="id_joueur3" id="id_joueur3">
			</p>

			<p>
				<label for="joueur4">
					<span class="big">Joueur 4</span>
				</label>
				<input name="joueur4" id="joueur4" type="text" class="full-width joueur_input"/>
				<input type="hidden" name="id_joueur4" id="id_joueur4">
			</p>
		<label for="nbVoiturettes">
			<span class="big">Voiturettes</span>
		</label>

			<select name="nbVoiturettes" class="full-width">
				<option value="0">Aucune</option>
				<option value="1">1 Voiturette</option>
				<option value="2">2 Voiturettes</option>
			</select>

			<label for="nbChariots">
				<span class="big">Chariots</span>
			</label>

			<select name="nbChariots" class="full-width">
				<option value="0">Aucun</option>
				<option value="1">1 Chariot</option>
				<option value="2">2 Chariots</option>
				<option value="3">3 Chariots</option>
				<option value="4">4 Chariots</option>
			</select>
	</div>
	<script type="text/javascript">
	     //<![CDATA[
		/* http://keith-wood.name/datepick.html
		   French localisation for jQuery Datepicker.
		   Stéphane Nahmani (sholby@sholby.net). */
		(function($) {
			$.datepicker.regional['fr'] = {
				monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin',
				'Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
				monthNamesShort: ['Jan','Fév','Mar','Avr','Mai','Jun',
				'Jul','Aoû','Sep','Oct','Nov','Déc'],
				dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
				dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
				dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
				dateFormat: 'dd/mm/yyyy', firstDay: 1,
				renderer: $.datepicker.defaultRenderer,
				prevText: '&#x3c;Préc', prevStatus: 'Voir le mois précédent',
				prevJumpText: '&#x3c;&#x3c;', prevJumpStatus: 'Voir l\'année précédent',
				nextText: 'Suiv&#x3e;', nextStatus: 'Voir le mois suivant',
				nextJumpText: '&#x3e;&#x3e;', nextJumpStatus: 'Voir l\'année suivant',
				currentText: 'Courant', currentStatus: 'Voir le mois courant',
				todayText: 'Aujourd\'hui', todayStatus: 'Voir aujourd\'hui',
				clearText: 'Effacer', clearStatus: 'Effacer la date sélectionnée',
				closeText: 'Fermer', closeStatus: 'Fermer sans modifier',
				yearStatus: 'Voir une autre année', monthStatus: 'Voir un autre mois',
				weekText: 'Sm', weekStatus: 'Semaine de l\'année',
				dayStatus: '\'Choisir\' le DD d MM', defaultStatus: 'Choisir la date',
				isRTL: false
			};
			$.datepicker.setDefaults($.datepicker.regional['fr']);
		})(jQuery);
		
	    $(document).ready(function(){
			$( "#datepicker" ).datepicker({
				onSelect: function(dateText, inst) {
					//alert('date' + dateText)
					$("#datejour").html(dateText);
					$("#eventStartDate").val(dateText);
					//$("#eventStartDatehide").val(dateText);
				},
				dateFormat: "DD d MM yy", //"dd/mm/yy" ,
				minDate: 0, 
				maxDate: 3,
				altField  : '#eventStartDatehide',
			    altFormat : 'yy-mm-dd'
				});// TODO : se baser sur l'heure serveur pour restreindre
			
			$("#datepicker").change(function() {

				var currentDate = new Date();
				var maxDate = new Date();
				maxDate.setDate(currentDate.getDate() + $("#datepicker").datepicker( "option", "maxDate" ));

				if($("#datepicker").datepicker("getDate") < currentDate) {
					$( "#datepicker" ).datepicker( "setDate", currentDate );
				} 
				else if ($("#datepicker").datepicker("getDate") > maxDate){
					$( "#datepicker" ).datepicker( "setDate", maxDate );
				}

				//if($("#datepicker").datepicker("getDate"))
				//alert(currentDate + $("#datepicker").datepicker( "option", "maxDate" ));

				$.ajax({
					type: "POST",
		               url: "/reservationajax/retrievedate",
					dataType: "json",
					data: {
						date: $(this).val(),
						id_parcours: $("#parcours").val()
					},
					success: function( data ) {
						$.map(data, function (horaires_reserves){
								for(var horaire in horaires_reserves) {
									$("#heure option").each(function(){
										if($(this).val() == horaires_reserves[horaire]) {
											//$(this).attr('disabled', ''); // Disable this choice
											$(this).remove();
										}
									});
								}
						});
					}
				});
			});
		
			function validate_name(object) {
				object.css('color', 'green');
			}

			function unvalidate_name(object) {
				object.css('color', 'black');
				var idSerlector = "#id_"+object.prop('id');
				$(idSerlector).removeAttr("value");

			}

			$("#joueur1, #joueur2, #joueur3, #joueur4").change(function(){
				//$(this).val("");
				if(lastNameValue != "" && $(this).val() != lastNameValue) {
					unvalidate_name($(this));
				}
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
		                url: "/reservationajax/autocomplete",
		                dataType: "json",
		                data: {
		                    featureClass: "P",
		                    style: "full",
		                    maxRows: 12,
		                    name_startsWith: request.term
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
		        minLength: 2,
		        select: function( event, ui ) {
					var idSerlector = "#id_"+$(this).prop('id');
					$(idSerlector).val(ui.item.key);
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

	        var methods = {
		
				prev : function(){
					alert('prev' + $("#eventStartDatehide").val() + ' date');
				},
				
				next : function(){
					alert('next' + $("#eventStartDatehide").val()  + ' date');
					var d =  new Date($("#eventStartDatehide").val());
					d.setDate(d.getDate()+1);
				    alert((d.getMonth()+1)+"/"+d.getDate()+"/"+d.getYear());
					$("#eventStartDatehide").val(d.getYear()+"-"+(d.getMonth()+1)+"-"+d.getDate());
				},
				
	            click : function(heure,trou){
					//alert('heure:'+ heure);
					
					// recup info sur resa
					$.ajax({
                        type: "POST",
                        //contentType: "application/json",
                        data: {date: JSON.stringify($("#eventStartDatehide").val()),  heure:  JSON.stringify(heure), trou : trou},
                        url: "/reservationajax/getresa/",
                        //dataType: "json",
                        success: function (data) {
							alert('mise a jour a faire message=' + data.valid);
                            // a faire mise a jour
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
							alert('Erreur de récupération de la fiche' + errorThrown);
                           //debugger;
                        }
                    });
					
					$("#eventStartHeure").val(heure);
					
	                $("#eventToAdd").dialog(
	                 {
	                     title: '<?= __("Réserver");?>',
	                     modal: true,
	                     buttons: {
	                         "Valider": function () {
	                             var event = new Object(), eventToSave = new Object(); ;
	                             eventToSave.EventID = event.id = Math.floor(200 * Math.random());
	                             event.start = new Date($("#eventToAdd #eventStartDate").val());
	                             eventToSave.StartDate = $("#eventToAdd #eventStartDate").val();
	                             if ($("#eventToAdd #eventEndDate").val() == "") {
	                                 event.end = event.start;
	                                 eventToSave.EndDate = eventToSave.StartDate;
	                             }
	                             else {
	                                 event.end = new Date($("#eventToAdd #eventEndDate").val());
	                                 eventToSave.EndDate = $("#eventToAdd #eventEndDate").val();
	                             }
	                             eventToSave.EventName = event.title = $("#eventToAdd #eventName").val();

								eventToSave.Heure = $("#eventStartHeure").val();
								
								eventToSave.Joueur1 = $("#eventToAdd #id_joueur1").val();
								eventToSave.Joueur2 = $("#eventToAdd #id_joueur2").val();
								eventToSave.Joueur3 = $("#eventToAdd #id_joueur3").val();
								eventToSave.Joueur4 = $("#eventToAdd #id_joueur4").val();

								eventToSave.nbChariots = $('select[name="nbChariots"]').val()
								eventToSave.nbVoiturettes = $('select[name="nbVoiturettes"]').val();

	                             $("#eventToAdd input").val("");
								 alert('event' +JSON.stringify(eventToSave) );
	                             $.ajax({
	                                 type: "POST",
	                                 contentType: "application/json",
	                                 data: "{eventdata:" + JSON.stringify(eventToSave) + "}",
	                                 url: "/reservationajax/add",
	                                 dataType: "json",
	                                 success: function (data) {
										alert('mise a jour a faire message=' + data.message);
	                                     // a faire mise a jour
	                                     $("#eventToAdd").dialog("close");
	                                 },
	                                 error: function (XMLHttpRequest, textStatus, errorThrown) {
										alert('Erreur de mise à jour' + errorThrown);
	                                    //debugger;
	                                 }
	                             });
	                         }
	                     }
	                 });
	            }
	        };

	        //button trigger
	        $('a[href^="#resa-"]').click(function(){

	            var id = $(this).attr('href').substring(6,11);
				var heureresa = $(this).attr('href').substring(15,20);
				var trou = $(this).attr('href').substring(12,14);
				//alert('methode=' + id);
				//alert('heure=' + heureresa);
				//alert('trou='+trou);
	            methods[id].apply(this,[heureresa,trou]);
	            return false;
	        });
			
			$('a[href^="#nav-"]').click(function(){

	            var id = $(this).attr('href').substring(5,9);
				//alert('methode=' + id);
				//alert('heure=' + heureresa);
	            methods[id].apply(this);
	            return false;
	        });

	    });

	    //]]>
	</script>

	