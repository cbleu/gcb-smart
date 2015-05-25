<?= $header_nav; ?>
<!-- CSS INCLUDES-->
<!-- bootstrap lib css -->
<link rel="stylesheet" href="/assets/libs/bootstrap/css/bootstrap.min.css" charset="utf-8">
<!-- <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-responsive.css" charset="utf-8"> -->
<!-- jquery-ui css -->
<link rel="stylesheet" href="/assets/libs/jquery-ui/css/themes/redmond/jquery-ui.min.css" type="text/css" charset="utf-8"/>
<link rel="stylesheet" href="/assets/libs/jquery-ui/css/themes/redmond/jquery.ui.theme.css" type="text/css" />
<link rel="stylesheet" href="/assets/libs/jquery-ui/css/jquery.colourPicker.css" type="text/css"/>
<!-- dhtmlx css-->
<link rel="stylesheet" href="/assets/libs/dhtmlxScheduler/codebase/dhtmlxscheduler.css" type="text/css" charset="utf-8"/>

<!-- JS INCLUDES -->
<!-- dhtmlx -->
<script src="/assets/libs/dhtmlxScheduler/codebase/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
<script src="/assets/libs/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_units.js" type="text/javascript" charset="utf-8"></script>
<script src="/assets/libs/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_limit.js" type="text/javascript" charset="utf-8"></script>
<script src="/assets/libs/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_minical.js" type="text/javascript" charset="utf-8"></script>
<script src="/assets/libs/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_tooltip.js" type="text/javascript" charset="utf-8"></script>
<script src="/assets/libs/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_multiselect.js" type="text/javascript" charset="utf-8"></script>
<script src="/assets/libs/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_recurring.js" type="text/javascript" charset="utf-8"></script>
<script src="/assets/libs/dhtmlxScheduler/codebase/locale/locale_fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/assets/libs/dhtmlxScheduler/codebase/locale/recurring/locale_recurring_fr.js" type="text/javascript" charset="utf-8"></script>
<!-- jquery -->
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="/assets/libs/jquery/jquery-migrate.min.js"></script>
<script src="/assets/libs/jquery-ui/js/jquery.colourPicker.js" type="text/javascript"></script>
<!-- cesar: autocomplete already included in jquery-ui.js lib -->
<!-- <script src="/assets/wizard/jquery.autocomplete.js" type="text/javascript"></script> -->
<script src="/assets/libs/jquery-ui/js/jquery-ui.min.js"></script>
<!-- <script src="/assets/libs/jquery.form.js" type="text/javascript" charset="utf-8"></script> -->
<script src="/assets/oscrud/themes/flexigrid/js/jquery.form.js"></script>
<script type="text/javascript" charset="utf-8">
	var main_div_height = 0;
	var occupation_array = new Array();		//added by cesar: Tableau du nombre de joueurs par slot horaire pour les trous 1 et 10
	var mysql_format = scheduler.date.date_to_str("%Y-%m-%d %H:%i");	//moved here by cesar
	var locked_date_time = new Date('<?=$block_time_after_start?>');
		
	function resize_calendar() {
		var document_height = $(window).height();
		if(main_div_height == 0) {
			main_div_height = 240;//$("#main_div_cal").parent().height();
		}
		$("#scheduler_here").height(document_height-main_div_height);
	}
		
	function blockTime() {
		<?php
			//echo "var block_time_before_start = '".$block_time_before_start."';";
			//echo "var block_time_before_end = '".$block_time_before_end."';";
			//echo "var block_time_after_start = '".$block_time_after_start."';";
			//echo "var block_time_after_end = '".$block_time_after_end."';";	
		?>
		locked_date_time = new Date('<?=$block_time_after_start?>');
		//alert('<?=$block_time_after_start?>');
		//alert(new Date(block_time_before_start));
		//scheduler.blockTime({start_date:new Date(block_time_before_start), end_date:new Date(block_time_before_end)});
		//scheduler.blockTime({start_date:new Date(block_time_after_start), end_date:new Date(block_time_after_end)});
		//scheduler.blockTime([0,1,2,3,4,5,6], [17*60,18*60]);
	}
	
	// function getOccupation() {		//deprecated by cesar on 2014-05-30
	// 	// var mysql_format = scheduler.date.date_to_str("%Y-%m-%d %H:%i");
	// 	$.ajax({
	// 		type: "POST",
	//            url: "/reservationajax/getdispo?dummy=" + new Date().getTime(),
	// 		dataType: "json",
	// 		data: {
	// 			begin_date: mysql_format(new Date()),
	// 			end_date: mysql_format(locked_date_time)
	// 		},
	// 		success: function( data ) {
	// 			occupation_array = new Array();
	// 			$.each(data, function(key, val) {
	// 				occupation_array[key] = val;
	// 			});
	// 		}
	// 	});
	// }
	
	function getPlayersBySlotAt(thatDate) {

		var justbefore = new Date(thatDate.getTime() - 1*60*60000);	// 1 hours before
		var justafter = new Date(thatDate.getTime() + 5*60*60000);	// 5 hours after

		$.ajax({
			type: "POST",
			url: "/reservationajax/getdispo",
			dataType: "json",
			data: {
				begin_date: mysql_format(justbefore),
				end_date: mysql_format(justafter)
			},
			success: function( data ) {
				while(occupation_array.length > 0) { 
				     occupation_array.pop();
				} 
				$.each(data, function(key, val) {
					occupation_array[key] = val;
				});
			}
		});
	}
	
	function init() {
				
		var sections=[
			{key:1, label:"Trou 1"},
			{key:10, label:"Trou 10"}
		];
	
		scheduler.locale.labels.unit_tab = "Trous"
		scheduler.locale.labels.section_custom="Trou";
		
		<?php			
		echo "scheduler.config.first_hour = ".$premier_depart.';';
		echo "scheduler.config.last_hour = ".$dernier_depart.';';
		?>
		
		scheduler.config.multi_day = false;
		scheduler.config.details_on_create = true;
		scheduler.config.details_on_dblclick=false;
		scheduler.config.drag_create = false;
		scheduler.config.xml_date="%Y-%m-%d %H:%i";
		scheduler.config.separate_short_events = false;
		scheduler.config.event_duration = 10;
		scheduler.config.time_step = 10;
		
		dhtmlXTooltip.config.className = 'passover'; // sets the CSS classname of the tooltip window
		dhtmlXTooltip.config.timeout_to_display = 50; // delay of the rendering
		//dhtmlXTooltip.config.delta_x = 15; // X position relative to the cursor (positive - margin to the right, negative - to the left)
		//dhtmlXTooltip.config.delta_y = -20; // Y position relative to the cursor (positive - above the cursor, negative - below)
		
		scheduler.templates.tooltip_text = function(start,end,event) {
			return event.joueurs;
		};
		
		//blockTime();
	
		scheduler.templates.event_class=function(s,e,ev){ return ev.custom?"custom":""; };
	
		var step = 10;
		var format = scheduler.date.date_to_str("%H:%i");
		var format_date_heure = scheduler.date.date_to_str("%d/%m/%Y %H:%i");
		var format_francais = scheduler.date.date_to_str("%H:%i le %d %F %Y");
		// var mysql_format = scheduler.date.date_to_str("%Y-%m-%d %H:%i");
		//var javascript_format = scheduler.date.date_to_str("%F %j, %Y %H:%i:%s");
		var f_year 		= scheduler.date.date_to_str("%Y");
		var f_month 	= scheduler.date.date_to_str("%m");
		var f_day 		= scheduler.date.date_to_str("%j");
		var f_hour 		= scheduler.date.date_to_str("%H");
		var f_minute 	= scheduler.date.date_to_str("%i");
		var f_second 	= scheduler.date.date_to_str("%s");
		
		scheduler.config.hour_size_px = (60 / step) * 20 + (60 / step) * 2; // 20 => nb px event 10minutes // 2 px pour marge
		scheduler.templates.hour_scale = function(date){
			html="";
			for (var i = 0; i < 60 / step; i++){
				html+="<div style='height:20px;line-height:20px;padding-top:2px;'><strong>"+format(date)+"</strong></div>";
				date = scheduler.date.add(date, step, "minute");
			}
			return html;
		}
		
		scheduler.attachEvent("onDblClick", function (event_id, native_event_object){
			return false;
		});
	
		<?php
		$device = new Device();
		if($device->is_mobile()){
		?>
			scheduler.attachEvent("onEmptyClick", function (date, native_event_object){
				scheduler.addEventNow({
					start_date: date
				});
			});
		<?php
		}
		?>


		// Keep a reference to the default lightbox to manage recurring events
		var recurringLightbox =  scheduler.showLightbox;

		scheduler.templates.lightbox_header = function(start, end, event){
			return "Programmer un évènement";
		}

		// Adding Color to lightbox
		scheduler.locale.labels.section_couleur = "Couleur";
		scheduler.config.lightbox.sections.push({
			name:"couleur",
			map_to:"colour",
			type:"select",
			height:30,
			default_value:"34cdf9",
			options:$.colourPickerBasicColors()
		});

		// Adding trou to lightbox
		scheduler.locale.labels.section_trous = "Trous";
		scheduler.config.lightbox.sections.push({
			name:"trous",
			map_to:"trou_depart",
			type:"multiselect",
			vertical:"false",
			height:30,
			options:sections
		});

		// make Trou Depart readonly for updates
		scheduler.form_blocks.multiselect.set_value = function(node, value, ev) {

		    for (i = 0 ; i < node.children.length; i++) {
		    	// ev.type is present only if we are in update mode
		    	// so in this case we disable the trou checkboxes
		    	node.children[i].firstChild.disabled = (ev.type == "evenement");

		    	// Here we check the right textbox
		    	node.children[i].firstChild.checked = (ev.trou_depart == node.children[i].firstChild.value);
		    }
		};

    	scheduler.attachEvent("onLightbox", function (id){

    		if ($("input.color_display").length) {
    			//$("input.color_display").val("");
    			//alert(scheduler.getEvent(id).colour);
    			//alert("a[rel='" + scheduler.getEvent(id).colour + "']");

    			$( "a[rel='" + scheduler.getEvent(id).colour + "']" ).click();
    		}
    		else {
    			// color select do not offer the way to specify an id so we find with specific jquery selector
		    	$( "option:contains('#ffffff')" ).parent().colourPicker({
				    ico:    '/assets/admin/images/jquery.colourPicker.gif',
				    title:    false
				});

				$("input.color_display").click();
    		}
    		
		});
	
		var click_disabled = false;
		scheduler.attachEvent("onClick", function (event_id, native_event_object){
		    //scheduler.showLightbox(event_id);
		    var ev = scheduler.getEvent(event_id);
			if(click_disabled) {
				return false;
			}

			if(ev.type == "evenement") {
				scheduler.showLightbox = recurringLightbox;
				scheduler.showLightbox(event_id);

				return false;
			}
			
			click_disabled = true;
			
			if(scheduler.config.readonly) {
				return false;
			}
					
			var ev = scheduler.getEvent(event_id);
			
			$("#details_form_div").load("/public/application/detailsform?id_reservation=" + ev.id + "&dummy="+new Date().getTime(), function() {
				var resa_form = document.getElementById('details_form_div');
				scheduler.startLightbox(event_id, resa_form);
				click_disabled = false;
				
				$(".dhx_cal_cover").click(function() {
					$("#fermer_button").trigger("click");
				});
			});
			
			return false;
		});
		
		scheduler.attachEvent("onBeforeDrag", function (event_id, mode, native_event_object){
		       //any custom logic here
		       return false;
		});
		
		scheduler.attachEvent("onViewChange", function (mode , date){
			$(".dhx_cal_event").height(20);
		});
		
		scheduler.attachEvent("onXLE", function (){
			$(".dhx_cal_event").height(20);
		});
		
		scheduler.renderEvent = function(container, ev) {
			
			// Si c'est un evenement de plus de 10 minutes, on l'affiche à la manière classique du calendrier
			if(ev.type == "evenement" && ((ev.start_date.getTime() + 60*10*1000) != ev.end_date.getTime())) {
				return false;
			}
			
			var background = 'background:' + ev.color + ';';
			var textColor  = 'color:' + ev.textColor + ';';
			
			var html = 		'';//'<div class="dhx_cal_event">';
			html 	+= 		'<div style="' + background + '" class="dhx_event_move dhx_header">&nbsp;</div>';
			
			html 	+= 		'<div style="border-bottom-left-radius:4px;border-bottom-right-radius:4px;height:18px;margin-top:1px;' + background + textColor;
			
			if(ev.current_user_in_resa) {
				html	+= 'border-top-right-radius: 20px;';
			}
			
			html	+= 		'" class="dhx_event_move dhx_title">';
			
			if(ev.payant > 0) {
				html	+= 	'<span style="text-align:left;float:left;font-weight:normal;">&nbsp;';
				for(var i = 0; i < ev.payant; i++) {
					html	+= '$';
				}
				html	+= 	'</span>';
			}
			
			html	+= 		'<span style="font-weight:normal;">' + ev.text + '</span>';
			html 	+= 		'</div>';
			//html 	+= 		'<div style="background: none repeat scroll 0% 0% ' + ev.color + ';' + textColor + ';width:100%;height:20px;" class="dhx_body">';
			//html	+= 		'</div>';
			// html 	+= 		'<div style="' + background + textColor + '" class="dhx_event_resize dhx_footer"></div>';
			html 	+= 		'<div style="height: 0px;' + background + textColor + '" class="dhx_event_resize dhx_footer"></div>';// heiht added by cesar
			html 	+= 		'';//'</div>';
			
			container.innerHTML = html;
			
			return true; // required, true - we've created custom form; false - display default one instead
		};
		
		function reset_form(ev) {
			
			$('#form').each(function(){
			  this.reset();
			});
			
			ev.text = "";
			scheduler.updateEvent(ev.id);
			
			// $("#joueur1").removeAttr("disabled");
			// $("#joueur2").removeAttr("disabled");
			// $("#joueur3").removeAttr("disabled");
			// $("#joueur4").removeAttr("disabled");
			$("#joueur1").prop("disabled", false);
			$("#joueur2").prop("disabled", false);
			$("#joueur3").prop("disabled", false);
			$("#joueur4").prop("disabled", false);
			
			$("#joueur1").prop("placeholder", 'Chercher un nom de membre ...');
			$("#joueur2").prop("placeholder", 'Chercher un nom de membre ...');
			$("#joueur3").prop("placeholder", 'Chercher un nom de membre ...');
			$("#joueur4").prop("placeholder", 'Chercher un nom de membre ...');
			
			$("#joueur1").css('color', 'black');
			$("#joueur2").css('color', 'black');
			$("#joueur3").css('color', 'black');
			$("#joueur4").css('color', 'black');
			
			$("#id_joueur1").val("");
			$("#id_joueur2").val("");
			$("#id_joueur3").val("");
			$("#id_joueur4").val("");

			$("#joueur1, #joueur2, #joueur3, #joueur4").autocomplete("enable");
			
			<?php
		for($k = 0; $k < count($ressources); $k++) {
			
			// echo "$('.".$ressources[$k]['ressource']."_check').removeAttr('disabled');";
			echo "$('.".$ressources[$k]['ressource']."_check').prop('disabled',false);";
		}
		
		?>
		}

		// We configure our custom lightbox for reservations
		var reservationLightbox =  function(id) {

			var ev = scheduler.getEvent(id);
			
			var other_event_exist = false;
			var evs = scheduler.getEvents();
			for (var i = 0; i < evs.length; i++) {
				if(evs[i].id != ev.id && (evs[i].start_date + "" == ev.start_date + "") && ev.trou_depart == evs[i].trou_depart) {
					other_event_exist = true;
					break;
				}
			}
			
			var resa_form = document.getElementById('resa_form_div');
			
			// si le slot horaire contient déjà une resa on ouvre pas le formulaire d'ajout
			if(other_event_exist) {
				scheduler.deleteEvent(id);
				//scheduler.endLightbox(false);
				return false;
			}
	
			reset_form(ev);
			
			//added by cesar: check la dispo pour les 18 trous
			getPlayersBySlotAt(ev.start_date);
	
			//$("#eventStartDate").html(format_date_heure(ev.start_date));
			$("#eventStartDate").html(format_francais(ev.start_date));
			$("#date_resa").val(mysql_format(ev.start_date));
			$("#trou_depart").val(ev.trou_depart);
			
			scheduler.startLightbox(id, resa_form);
			
			$(".dhx_cal_cover").click(function(){
				$("#annuler_button").trigger("click");
			});
			
			
			// Reset checkboxes (enable all and 18 checked by default)
			for(var i = 1; i <= 4; i++) {
				// $(".nbTrous18[name=nbTrousJ"+i+"]").attr("checked", "checked");
				// $(".nbTrous18[name=nbTrousJ"+i+"]").removeAttr('disabled');
				$(".nbTrous18[name=nbTrousJ"+i+"]").prop("checked", true);
				$(".nbTrous18[name=nbTrousJ"+i+"]").prop('disabled',false);
			}
			
			// Desactive les 18 trous si pas possible
			var date_key = mysql_format(ev.start_date)+":00";
			if(date_key in occupation_array[ev.trou_depart]) {	// cesar: occupation_array provient de getPlayersBySlotAt -> getdispo
				for(var i = 4; i > 4-occupation_array[ev.trou_depart][date_key]; i--) {
					// $(".nbTrous18[name=nbTrousJ"+i+"]").removeAttr("checked");
					// $(".nbTrous18[name=nbTrousJ"+i+"]").attr('disabled', 'disabled');
					$(".nbTrous18[name=nbTrousJ"+i+"]").prop("checked", false);
					$(".nbTrous18[name=nbTrousJ"+i+"]").prop('disabled', true);
					
					$(".nbTrous9[name=nbTrousJ"+i+"]").click();
				}
			}	
		}

		// By default, we use our custom lightbox to handle reservation when events occurs on the calendar
		scheduler.showLightbox = reservationLightbox;

		// When clicking button to add event, we set the lightbox to default and open it
		$("#recurring_button").click(function(){
        	scheduler.showLightbox = recurringLightbox;

        	scheduler.addEventNow();

        	//initColorPicker();
    	});

		// Fires when lightbox closes we set back lightbox to default
    	scheduler.attachEvent("onAfterLightbox", function (){
    		scheduler.showLightbox = reservationLightbox;
		});

    	scheduler.attachEvent("onEventChanged", function(id,ev) {
    		
    		// When user choose update a copy,
    		// we don't update the original event, we only create a new one
    		if(ev.id.indexOf('#') !== -1 ){
    			return;
    		}

    		$.ajax({
				type: "POST",
				url: "/events/update_ajax",
				dataType: "json",
				data: {
					event:ev
				},
				success: function( data ) {
					scheduler.clearAll();

					if(data["success"] == false) {
						alert(data["message"]);
					}

					scheduler.load("/reservationajax/eventsparcours", "json", function(){
						$(".dhx_cal_event").height(20);
						blockTime();
					});
					
				}
			});
		});

		scheduler.attachEvent("onEventDeleted", function(id){
    		$.ajax({
				type: "POST",
				url: "/events/delete/"+id,
				dataType: "json",
				success: function( data ) {
					scheduler.clearAll();

					if(data["success"] == false) {
						alert(data["success_message"]);
					}

					scheduler.load("/reservationajax/eventsparcours", "json", function(){
						$(".dhx_cal_event").height(20);
						blockTime();
					});
					
				}
			});
		});

    	scheduler.attachEvent("onEventSave",function(id, ev, is_new) {
		    // Do some validation
		    return true;
		})

    	// Fires when recurring event added 
    	scheduler.attachEvent("onEventAdded", function(id,ev){
    		// We add the event to the database

    		//ev.trou_depart = [1,10];
    		$.ajax({
				type: "POST",
				url: "/events/insert_ajax",
				dataType: "json",
				data: {
					event:ev
				},
				success: function( data ) {
					scheduler.clearAll();

					if(data["success"] == false) {
						alert(data["message"]);
					}

					scheduler.load("/reservationajax/eventsparcours", "json", function(){
						$(".dhx_cal_event").height(20);
						blockTime();
					});

					
				}
			});
    		//alert(ev.id + '\n' + ev.start_date + '\n' + ev.end_date + '\n' + ev.text + '\n' + ev.color);
		});
    	
		// var custom_form = document.getElementById("form");
	
		scheduler.createUnitsView("Trou","trou_depart", sections);
		
		$schedulerInitDate = new Date();
		scheduler.init('scheduler_here', $schedulerInitDate,"Trou");
		scheduler.config.show_loading = false;	// added by cesar: probleme avec le trigger de fin ! false TODO -> true
		// cesar: chargement par semaine pour l'admin (jour pour les membres)
		scheduler.setLoadMode("week")			// added by cesar: chargement par période meme si elle est déjà passée
		
		var calendar = scheduler.renderCalendar({
			container:"cal_here", 
			navigation:true,
			handler:function(date){
				scheduler.setCurrentView(date, scheduler._mode);
			}
		});

		scheduler.linkCalendar(calendar);	//synchro entre le scheduler et le mini calendrier
		
		//cesar
		// scheduler.load("/reservationajax/eventsparcours?dummy="+new Date().getTime(), "json", function(){
		scheduler.load("/reservationajax/eventsparcours", "json", function(){
			$(".dhx_cal_event").height(20);
			blockTime();
			scroll_to_now();
			scheduler.setCurrentView();
			// getPlayersBySlotAt($schedulerInitDate);
			// alert($schedulerInitDate);
		});
		
		// getOccupation();
		// getPlayersBySlotAt(new Date());
		
		//scheduler.load("xml/units.xml?v=35");
	}
	
	function scroll_to_now() {
		$('.dhx_now_time').html("<a name='now'></a>");
		location.href = "#now";
	}
		
	$(document).ready(function() {
		
		function validate_form() {
			if($("#id_joueur1").val() <= 0) {
				alert("La réservation doit contenir au moins le Joueur 1.")
				return false;
			}
			
			for(var i = 2; i <= 4; i++) {
				if($("#joueur" + i).val() != "" && ($("#id_joueur" + i).val() == "" || $("#id_joueur" + i).val() < 0)) {
					alert("Il semble que le joueur " + i + " ne soit pas un membre. Veuillez cocher la case invité ou visiteur le cas échéant.")
					return false;
				}
			}
		
			return true;
		}
		
		function validate_name(object) {
			object.css('color', 'green');
		}
	
		function unvalidate_name(object) {
			object.css('color', 'black');
			var idSerlector = "#id_"+object.prop('id');
			if(!$("#" + object.prop('id') + "_visiteur").is(':checked') && !$("#" + object.prop('id') + "_invite").is(':checked')) {
				$(idSerlector).removeAttr("value");
			}
		}
		
		var joueurs_presents_ = new Array();
		joueurs_presents_[0] = $("#id_joueur1").val();
		joueurs_presents_[1] = $("#id_joueur2").val();
		joueurs_presents_[2] = $("#id_joueur3").val();
		joueurs_presents_[3] = $("#id_joueur4").val();
		
		var joueurs_input = "#joueur1, #joueur2, #joueur3, #joueur4";
		
		$(joueurs_input).change(function(){
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
		
        // var cache = {};
        // var oldterm;

		$(joueurs_input).autocomplete({
			
	        source: function( request, response ) {
                // if (request.term.indexOf(oldterm) >= 0) {
                //     if (typeof (oldterm) != 'undefined') {
                //         var data = jQuery.grep(cache[oldterm],
                //     function (ele) {
                //         return (ele.indexOf(request.term) >= 0);
                //     });
                //         response($.map(data, function (item) {
                //             return { value: item }
                //         }))
                //         return;
                //     }
                // } else {
                //     cache = {};
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
                            // oldterm = request.term;
                            // cache[request.term] = data.d;
		                    response( $.map(data, function (value, key){
									var joueur = new Object();
									joueur.label = value;
									joueur.value = value;
									joueur.key = key;
									return joueur;
		                    }));
		                }
					});
				// }	
	        },
			appendTo: "#form",		// added by cesar to display menu on top of the form
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
	    });	//end of: $(joueurs_input).autocomplete
		
		// var resa_form_dlg = document.getElementById('resa_form_div');
		// var autoCompletewidget = $(joueurs_input).autocomplete("widget");
		// alert(resa_form_dlg);
		// autoCompletewidget.insertAfter(resa_form_dlg);
		
		// alert($("#main_div_cal").parent().height());
		
		setTimeout(function() { // Timeout (patch pour résoudre bug safari)
			resize_calendar();
			init();
			$("#unit_tab").remove();
		}, 100);
				
		$(window).resize(function(){
			resize_calendar();
		});
		
		$(document).bind('DOMSubtreeModified', function() {
			// Redimensionne .dhx_cal_event en 20px si il change.
		    if($(".dhx_cal_event").height() != 20) {
		        $(".dhx_cal_event").height(20);
		    }
		});
				
		$('#form').ajaxForm({
			beforeSubmit: function() {
				
				if(!validate_form()) {
					return false;
				}
				
				$("#loading_div").height($("#form").height());
				$("#form").hide();
				$("#loading_div").show();
			},
			success: function(data) {
				var resp = jQuery.parseJSON(data);
				
				if(!resp.valid) {
					alert(resp.message);
					$("#form").show();
					$("#loading_div").hide();
					return false;
				}
				
				
				var resa_form = document.getElementById('resa_form_div');
				$("#form").show();
				$("#loading_div").hide();
				scheduler.endLightbox(true, resa_form);
				
				scheduler.clearAll();
				
				// scheduler.load("/reservationajax/eventsparcours?dummy="+new Date().getTime(), "json", function(){
				scheduler.load("/reservationajax/eventsparcours?", "json", function(){
					$(".dhx_cal_event").height(20);
					blockTime();
				});
			}
		});
		
		
		<?php
		for($i = 1; $i <= 4; $i++) {
		?>
				$("#joueur<?=$i?>_invite").click(function(){
					// if($(this).is(':checked')) {
					if(this.checked) {
						// $("#joueur<?=$i?>_visiteur").removeAttr("checked");
						$("#joueur<?=$i?>_visiteur").prop("checked", false);
						// $("#joueur<?=$i?>").attr("placeholder", 'Nom de l\'invité (facultatif)');	//removed by cesar
						$("#joueur<?=$i?>").prop("placeholder", 'Nom de l\'invité (facultatif)');
						$("#joueur<?=$i?>").focus();
						$("#id_joueur<?=$i?>").val("0");
					}
					else {
						$("#joueur<?=$i?>").prop("placeholder", 'Chercher un nom de membre ...');
						$("#joueur<?=$i?>").val("");
						$("#joueur<?=$i?>").focus();
						$("#id_joueur<?=$i?>").val("");
					}
				});
		
				$("#joueur<?=$i?>_visiteur").click(function(){
					// if($(this).is(':checked')) {
					if(this.checked) {
						// $("#joueur<?=$i?>_invite").removeAttr("checked");
						$("#joueur<?=$i?>_invite").prop("checked", false);
						$("#joueur<?=$i?>").prop("placeholder", 'Nom du visiteur (facultatif)');
						$("#joueur<?=$i?>").focus();
						$("#id_joueur<?=$i?>").val("1");
					}
					else {
						$("#joueur<?=$i?>").prop("placeholder", 'Chercher un nom de membre ...');
						$("#joueur<?=$i?>").val("");
						$("#joueur<?=$i?>").focus();
						$("#id_joueur<?=$i?>").val("");
					}
				});
				
				$("#joueur<?=$i?>_visiteur, #joueur<?=$i?>_invite").click(function(){
					if($("#joueur<?=$i?>_visiteur").is(':checked') || $("#joueur<?=$i?>_invite").is(':checked')) {
						$("#joueur<?=$i?>").autocomplete("disable");
					}
					else {
						$("#joueur<?=$i?>").autocomplete("enable");
					}
				});
				
		<?php
		}
		?>
		
		$("#annuler_button").click(function(){
			var resa_form = document.getElementById('resa_form_div');
			scheduler.endLightbox(false, resa_form);
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
				// if($(this).attr('checked')) {
				if(this.checked) {
					count++;
				}
			});
			
			if(count >= max_nb) {
				$("."+class_name).each(function() {
					// if(!$(this).attr('checked')) {
					if(this.checked) {
						// $(this).attr('disabled', 'disabled');
						$(this).prop('disabled', true);
					}
				});
			}
			else {
				$("."+class_name).each(function() {
					// $(this).removeAttr('disabled');
					$(this).prop('disabled', false);
				});
			}
		});
		
	});
	
</script>

<!-- *************** -->
<!-- *************** -->
<!-- CESAR: CSS PART -->
<!-- *************** -->
<!-- *************** -->

<style type="text/css" media="screen">
	.passover {
	position:absolute;
	background-color: white;
	border-left: 1px dotted #887A2E;
	border-top: 1px dotted #887A2E;
	box-shadow: 3px 3px 3px #888888;
	color: #887A2E;
	cursor: default;
	padding: 10px;
	z-index: 500;
	/*background-color:gray;*/
	}
	.dhx_cal_event_line.custom, .dhx_cal_event.custom div {
	background-color:#fd7;
	border-color:#da6;
	color:#444;
	}
	.bandeau_gcb {
	margin:auto;
	margin-top:50px;
	text-align:center;
	}
	#scheduler_here {
	/*margin:auto;*/
	margin-top:40px;
	margin-bottom:20px;
	/*width:1000px;*/
	width:650px;
	margin-left:20px;
	background: transparent;
	}
	#cal_here {
	margin-left:40px;
	margin-right:40px;
	margin-top: 59px;
	width:200px;
	float: left;
	}
	#resa_form_div, #details_form_div {
	width:320px;
	margin:auto;
	position:absolute;
	z-index:99999;
	background-color:white;
	padding:2px;
	border-radius:5px;
	border: 1px solid #A6C9E2;
	color: #222222;
	}
	#resa_form_div form {
	/*padding:20px;*/
	}
	#eventStartDate, #u_eventStartDate {
	border: 1px solid #b5b3b4;
	border-width: 1px 0;
	border-top: 1px solid #9bd2ee;
	background: #0c5fa3 url(../images/old-browsers-bg/block-header-bg.png) repeat-x top;
	-webkit-background-size: 100% 100%;
	-moz-background-size: 100% 100%;
	-o-background-size: 100% 100%;
	background-size: 100% 100%;
	background: -moz-linear-gradient(
	top,
	#6dc3e6,
	#0c5fa3
	);
	background: -webkit-gradient(
	linear,
	left top, left bottom,
	from(#6dc3e6),
	to(#0c5fa3)
	);
	text-align: center;
	height: 45px;
	line-height: 45px;
	margin: -2px;
	font-weight:bold;
	text-shadow: 0 1px 3px rgba(0, 0, 0, 0.75);
	color:white;
	}
	.radios {
	margin-left:20px;
	margin-bottom:10px;
	}
	.radios input {
	margin-left:2px;
	margin-right:2px;
	vertical-align:baseline;
	}
	.nbTrousSpan {
	margin:auto;
	margin-left:10px;
	font-size:0.9em;
	/*color:grey;*/
	}
	.nbTrousSpan input {
	vertical-align:baseline;
	margin-right:2px;
	margin-left:2px;
	}
	.submit_div {
	margin:auto;
	margin-top:20px;
	text-align:center;
	}
	.annuler {
	float:right;
	}
	.reserver {
	float:left;
	}
	#form {
	margin-bottom:10px;
	}
	.big {
	font-weight:bold;
	font-size:1.1em;
	}
	#loading_div, #u_loading_div{
	text-align:center;
	}
	#loading_div p {
	position:absolute;
	top:50%;
	}
	.guest_checkbox, .visiteur_checkbox {
	vertical-align:baseline;
	}
	.guest_span, .visiteur_span {
	float: right;
	height: 20px;
	margin-top:-46px;
	margin-left: 20px;
	vertical-align: middle;
	}
	.action_span {
	display:block;
	margin:auto;
	margin-top:4px;
	margin-right:5px;
	}
	.leave_button {
	display:block;
	width:20px;
	height:20px;
	line-height:20px;
	background:url("/assets/images/delete.png") no-repeat;
	cursor:pointer;
	margin-top:-4px;
	}
	.options input {
	vertical-align:baseline;
	margin-left:12px;
	margin-right:1px;
	}
	.joueur_pair {
	padding:10px; 			/*cesar*/
	padding-left: 20px;		/*cesar*/
	background-color:white;
	border-top:1px solid #E6E6E6;
	border-bottom:1px solid #E6E6E6;
	margin:-1px;
	}
	.joueur_impair {
	padding: 10px;			/*cesar*/
	padding-left: 20px;		/*cesar*/
	background-color:white;
	border-top:1px solid #E6E6E6;
	border-bottom:1px solid #E6E6E6;
	margin:-1px;
	}
	.other_reservation {
	color:grey;
	background-color:#CECECE;
	}
	/* Patch pour dhtmlx */
	.dhx_time_block, .dhx_marked_timespan {
	margin:0px;
	}
	h1.reservation_title {
	float:left;
	margin-top:-14px;
	margin-left:5px;
	z-index: 100;
	-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
	-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
	-moz-border-radius: 0.278em;
	-webkit-border-radius: 0.278em;
	-webkit-background-clip: padding-box;
	border-radius: 0.278em;
	color: white;
	font-size: 1.1em;
	font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Sans", Arial, Helvetica, sans-serif;
	border: 1px solid;
	border-color: #50a3c8 #297cb4 #083f6f;
	background: #0c5fa5 url(../images/old-browsers-bg/title-bg.png) repeat-x top;
	-webkit-background-size: 100% 100%;
	-moz-background-size: 100% 100%;
	-o-background-size: 100% 100%;
	background-size: 100% 100%;
	background: -moz-linear-gradient(top, white, #72c6e4 4%, #0c5fa5);
	background: -webkit-gradient(linear, left top, left bottom, from(white), to(#0c5fa5), color-stop(0.03, #72c6e4));
	-moz-text-shadow: -1px -1px 0 rgba(0, 0, 0, 0.2);
	-webkit-text-shadow: -1px -1px 0 rgba(0, 0, 0, 0.2);
	text-shadow: -1px -1px 0 rgba(0, 0, 0, 0.2);
	padding: 6px;
	line-height:100%;
	width:96px;
	height:18px;
	position:absolute;
	text-align:center;
	}
	input.joueur_input {
	height:30px;
	/*		width:206px;*/
	width:220px;
	}
	.dhx_cal_event .dhx_title {
	height:14px;
	}
/*	cesar*/
	ul.ui-autocomplete.ui-menu {
	  z-index: 1000;
	}

	input.color_display {
		width:25px;
		height:25px;
		padding:0px;
		margin:0px;
		margin-right:10px;
		border:2px solid black;
		cursor:pointer;
		border-radius:0;
	}

	#recurring_button {
		color: #454544;
		height: 30px;
		background: none;
		border: 1px solid #CECECE;
		border-radius: 5px;
		margin-left: 50px;
		margin-top: 15px;
		color: #747473;
		font-size: 12px;
		font-weight: bold;
		font-family: arial;
	}

	.dhx_multi_select_trous label {
		margin-top:6px;
		margin-left:10px;
	}

	.dhx_multi_select_trous label input {
		margin-top:-1px;
		margin-right:5px;
	}

	* {
		/* Patch conflit bootstrap et dhtmlx */
		box-sizing: content-box;
	}

	.dhx_repeat_left {
		/* Patch french version of recurring (french words biggers) */
		width:105px;
	}

</style>
<div class="row" id="main_div_cal" >
	<div class="span12">
		<div id="cal_here"></div>
		<div id="scheduler_here" class="dhx_cal_container">
			<div class="dhx_cal_navline">
				<input type="button" value="Programmer un évènement" id="recurring_button"/>
				<div class="dhx_cal_prev_button">&nbsp;</div>
				<div class="dhx_cal_next_button">&nbsp;</div>
				<div class="dhx_cal_today_button"></div>
				<div class="dhx_cal_date"></div>
				<div class="dhx_cal_tab" name="unit_tab" id="unit_tab"></div>
			</div>
			<div class="dhx_cal_header">
			</div>
			<div class="dhx_cal_data">
			</div>
			<br />		
		</div>
	</div>
</div>
<div id="resa_form_div" style="display:none;">
	<div id="loading_div" style="display:none;">
		<p>Réservation en cours...</p>
	</div>
	<form id="form" method="post" action="/golf/reservationajax/addpublic">
		<!--<h1 class="reservation_title">Réservation</h1>-->
		<div id="eventToAdd">
			<div type="text" id="eventStartDate">
				xx/xx/XXXX xx:xx
			</div>
			<input type="hidden" id="id" />
			<input type="hidden" name="date_resa" id="date_resa" />
			<input type="hidden" name="trou_depart" id="trou_depart" />
			<?php
				for($i = 1; $i <= 4; $i++) {
				?>
			<div class="<?php echo ($i % 2 == 0) ? "joueur_pair" : "joueur_impair"; ?>">
				<label for="joueur<?php echo $i;?>">
				<span class="big">Joueur <?php echo $i;?></span>
				<span class="nbTrousSpan">
				<input name="nbTrousJ<?php echo $i;?>" class="nbTrous9" type="radio" value="9" /> 9 Trous
				<input name="nbTrousJ<?php echo $i;?>" class="nbTrous18" type="radio" value="18" checked /> 18 Trous
				</span>
				</label>
				<input name="joueur<?php echo $i;?>" id="joueur<?php echo $i;?>" type="text" class="full-width joueur_input" placeholder="Chercher un nom de membre ..."/>
				<span class="guest_span">
				<?php
					if($i > 1) {
					?>
				<input type="checkbox" id="joueur<?php echo $i;?>_invite" class="guest_checkbox"/> Invité
				<br />
				<?php
					}
					?>
				<input type="checkbox" id="joueur<?php echo $i;?>_visiteur" class="visiteur_checkbox"/> Visiteur
				</span>
				<p class="options">
					Options :
					<?php
						$j = $i - 1;
						
						for($k = 0; $k < count($ressources); $k++) {
							/*if($ressources[$k]['qte_max_par_partie'] - $j > 0) {
								echo "<input type='checkbox' name='".$ressources[$k]['ressource']."[]' value='".$j."' /> ".$ressources[$k]['ressource'];
							}*/
							echo "<input type='checkbox' name='".$ressources[$k]['ressource']."[]' value='".$j."' class='".$ressources[$k]['ressource']."_check' value='".$j."' /> ".$ressources[$k]['ressource'];
							
						}
						?>
					<!--<input type="checkbox" name="voiturettes[]" value="1" /> Voiturette
						<input type="checkbox" name="chariots[]" value="1" /> Chariot -->
				</p>
				<input type="hidden" name="id_joueur<?php echo $i;?>" id="id_joueur<?php echo $i;?>" value=""/>
			</div>
			<?php		
				}
				?>
			<input type="hidden" id="user" value="" />
			<div class="submit_div">
				<input type="submit" value="Réserver" id="reserver_button"/>
				<input type="button" value="Annuler" id="annuler_button"/>
			</div>
		</div>
	</form>
</div>
<div id="details_form_div" style="display:none;">
</div>