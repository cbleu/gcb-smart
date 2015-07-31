/**
* EasyGolPack
* Calendrier module
* @Date: 2014-07-23
* Copyright c-bleu 2014
*/

var vars = {};
var max_joueurs = 4;
var lastNameValue = "";
var joueurs_presents_ = new Array();
var joueurs_dans_partie = new Array();

// var nbJoueurs = 0;
// var occupation_array = new Array();	//Tableau du nombre de joueurs par slot horaire pour les trous 1 et 10
// var newUsers = new Array();
/*var table_length = function(obj){
	var len = 0;
	for(var key in obj){
		len++;
	}
	return len;
}*/


/////////////////////////////////////////////////////////////////////////////////
// JQUERY
/////////////////////////////////////////////////////////////////////////////////

;(function($, document, window, viewport)
{
	'use strict';

	// Code exécuté après chargement complet du DOM
	$(document).ready(function(){
		console.log( 'doc.ready current breakpoint:', viewport.current() );

		initVars();

		switch(vars.thisAction){
		case 'wizard':
			initWizard();
			break;
		case 'calendrier':
			initCalendrier();
			break;
		default:
			break;
		}
	});

	// Execute code each time window size changes
	$(window).bind('resize', function() {
		viewport.changed(function(){
			console.log( 'win.resize Current breakpoint:', viewport.current() );
			
			// Ajustement de l'affichage en step1 du datepicker 
			var numberOfMonths = $('#datepicker').datepicker( "option", "numberOfMonths" );
			if( viewport.is("xs") ) {
				if (numberOfMonths == 2){
					$('#datepicker').datepicker( "option", "numberOfMonths", 1 );
				}
			}else{
				if (numberOfMonths == 1){
					$('#datepicker').datepicker( "option", "numberOfMonths", 2 );
				}
			}
		});
	});

// })(jQuery);
})(jQuery, document, window, ResponsiveBootstrapToolkit);

// Récupération des Variables globales sérialisées dans la page
function initVars()
{
	$("#dataForJs input").each(function(){
		var $input = $(this);
		vars[$(this).attr("id")] = $(this).val();
	});
}

/////////////////////////////////////////////////////////////////////////////////
// WIZARD
/////////////////////////////////////////////////////////////////////////////////

var hoursIntervals = [];	// tableau des slots utilisés.
var hoursPlayers = [];		// tableau des joueurs dans les slots.
var minicalendar;

function initWizard()
{
	console.log('initWizard');

	////////////////////////////////
	// INIT PROCESS ////////////////
	////////////////////////////////

	init_Intervals();
	
	////////////////////////////////
	// DOM FUNCS ///////////////////
	////////////////////////////////
	
	// Init Knob plugin
	$(".dial").knob({
		// 'fgColor': '#b9e672',
		'bgColor': '#888888',
		'displayPrevious' : true,
		// 'dynamicDraw': true,
		// 'thickness': 0.6,
		// 'lineCap' : 'round',
		// 'tickColorizeValues': true,
	});

	$('#wizard_form_DOM .finish').click(function() {
		// alert('Finished!, Starting over!');
		// $('#wizard_form_DOM').find("a[href*='tab1']").trigger('click');

		var parentdiv = document.getElementById('isFormValid');
		var nbj = parseInt($("#nb_joueurs").val());
		console.log("nb_joueurs: ", nbj);
		if(!validate_form()) {
			message_erreur = "Un probleme dans le formulaire ne permet pas de faire la réservation ! Veuillez vérifier.";
			// return false;
		}else{
			if(vars.isLogged){
				if(!nbj || !parentdiv) {
					message_erreur = "ERREUR dans la structure du formulaire !";
				}else{
					// for (var i=1; i<=nbj; i++){
					// 	$("#nbTrousJ" + i).val($("#nb_trous").val());
					// }
				}
			}else{
				if(!nbj || !parentdiv) {
					message_erreur = "ERREUR dans la structure du formulaire !";
				}else{
					for (var i=2; i<=nbj; i++){
						var input = document.createElement("input");
						input.type = "hidden";
						input.className = "serialize";
						input.name = "id_J" + i;
						input.id = "id_J" + i;
						input.value = "1";
						parentdiv.appendChild(input);
					}
					for (var i=1; i<=nbj; i++){
						var input = document.createElement("input");
						input.type = "hidden";
						input.className ="serialize";
						input.name = "nbTrousJ" + i;
						input.id = "nbTrousJ" + i;
						input.value = $("#nb_trous").val();
						parentdiv.appendChild(input);
					}
				}
			}
		}

		$.ajax({
			async: true,
			type: "POST",
			url: "/resajax/add",
			dataType: "json",
			data: $("#wizard_form .serialize").serialize(),
			prevText: "",
			nextText: "",
			success: function(data) {
				// $("#confirmation_div").hide();
				// $("#reservation_done").show();
				// On clos le wizard
				$('#reservation_ready').hide();
				$('#reservation_done').show();
				$('#wizard_form_DOM').find('.pager .finish').addClass('disabled');
				$('#wizard_form_DOM').find('.pager .finish').hide();
				$('#wizard_form_DOM').find('.pager .previous').addClass('disabled');
				$('#wizard_form_DOM').find('.pager .previous').hide();
				$('#wizard_form_DOM').find('.pager .first').removeClass('disabled');
				$('#wizard_form_DOM').find('.pager .first').show();
				console.log(data);
				// var resp = jQuery.parseJSON(data);
				if(!data.valid) {
					alert(data.message);
					return false;
				}
			},
		});
		
	});

	$('#wizard_form').bootstrapWizard({
		'tabClass': 'form-wizard',
		onNext: function (tab, navigation, index) {
			if(!validate_form_wizard(index-1)){
				return false;
			}
			// step_form_action(tab,navigation,index);
		},
		onTabClick: function(tab, navigation, index){
			if(!validate_form_wizard(index)){
				return false;
			}
		},
		onTabShow: function(tab, navigation, index) {
			console.log("onTabShow Index:", index);
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$('#progress-wizard').find('.bar').css({width:$percent+'%'});
			
			// If it's the last tab then hide the last button and show the finish instead
			if($current >= $total) {
				$('#wizard_form_DOM').find('.pager .next').hide();
				$('#wizard_form_DOM').find('.pager .finish').show();
				$('#wizard_form_DOM').find('.pager .finish').removeClass('disabled');
			} else {
				$('#wizard_form_DOM').find('.pager .first').hide();
				$('#wizard_form_DOM').find('.pager .next').show();
				$('#wizard_form_DOM').find('.pager .finish').hide();
			}
			
			step_form_action(tab,navigation,index);
			
		},
		// onFinish:function(){
		// 	alert('Finished!, Starting over!');
		// }
	});


	$("#datepicker").datepicker({
		dateFormat: "dd/mm/yy" ,
		// regional: "fr",
		minDate: 0,
		maxDate: vars['maxDate'],
		firstDay: 1,
		numberOfMonths: 2,
		altField: "#date_resa",
		altFormat: "dd/mm/yy",
		// altFormat: "DD d MM yy",
		// onSelect: function(dateText, inst) {
		// 	$("#date_resa").val($('#datepicker').datepicker().val());
		// }
	},
	$.datepicker.regional['fr']
	);	// TODO : se baser sur l'heure serveur pour restreindre


	$("#date_resa").change(function(){
		var currentDate = new Date();
		
		ReleaseResaProvi($("#wizard_form .serialize"));
		// init_Intervals();
		load_user_available_Intervals();
		setTimeout(restrict_user_nb, 1000);	// TODO a integrer dans la req ajax precedente

	});

	$("#heure_resa").change(function(){
		ReleaseResaProvi($("#wizard_form .serialize"));
		restrict_user_nb();
	});

	$('#nb_trous_sw').bootstrapSwitch();

	$('input[name="nb_trous_sw"]').on('switchChange.bootstrapSwitch', function(event, state) {
		if(state) {
			$("#nb_trous").val(18);
			fill_DOM_with_Intervals(lastStartFor18hole);
		}else {
			$("#nb_trous").val(9);
			fill_DOM_with_Intervals();
		}
		$("#nb_trous_optgroup").attr("label", $("#nb_trous").val() + " Trous");
	});

	$("#joueur1, #joueur2, #joueur3, #joueur4").focus(function(){
		lastNameValue = $(this).val();
		$(this).css('color', 'black');
		$(this).select();
	});

	$("#joueur1, #joueur2, #joueur3, #joueur4").change(function(){
		var idxj = this.name.slice( -1); 
		if(lastNameValue != "" && $(this).val() != lastNameValue) {
			// unvalidate_name($(this));
			unvalidateSlotJ(idxj);
		}
		// update_joueurs();
		update_joueurs_presents();
		// var id_name = $(this).attr('id');
		// joueurs_presents_[parseInt(id_name.substring(id_name.length-1)) - 1] = $("#id_"+id_name).val();
	});

	$("#joueur1, #joueur2, #joueur3, #joueur4").focusout(function(){
		var idxj = this.name.slice( -1); 
		if(lastNameValue != "" && $(this).val() == lastNameValue) {
			// validate_name($(this));
			validateSlotJ(idxj);
		}
		// update_joueurs();
		update_joueurs_presents();
	});

	$("#joueur1, #joueur2, #joueur3, #joueur4").autocomplete({
		source: function( request, response ) {
			$.ajax({
				async: true,
				type: "POST",
				url: "/resajax/autocomplete",
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
		appendTo: "#wizard_form, #form, #details_form_div",
		// appendTo: "#wizard_form",		// added by cesar to display menu on top of the form
		minLength: 2,
		select: function( event, ui ) {
			var idSelector = "#id_"+$(this).prop('id');
			$(idSelector).val(ui.item.key);
			lastNameValue = ui.item.value;
			// validate_name($(this));
			validateSlotJ($(this).prop('id'));
		},
		open: function() {
			$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		},
		close: function() {
			$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		}
	});	// ajax
		
	$('#wizard_form').ajaxForm({
		beforeSubmit: function(data, form, options) {
			var message_erreur = "";

			options['url'] = "/resajax/add";
			options['dataType'] = "json";
			options['data'] = $("#wizard_form .serialize").serialize();

			var parentdiv = document.getElementById('isFormValid');
			var nbj = parseInt($("#nb_joueurs").val());
			console.log("nb_joueurs: ", nbj);
			if(!validate_form()) {
				message_erreur = "Un probleme dans le formulaire ne permet pas de faire la réservation ! Veuillez vérifier.";
				// return false;
			}else{
				if(vars.isLogged){
					if(!nbj || !parentdiv) {
						message_erreur = "ERREUR dans la structure du formulaire !";
					}else{
						// for (var i=1; i<=nbj; i++){
						// 	$("#nbTrousJ" + i).val($("#nb_trous").val());
						// }
					}
				}else{
					nbj = $("input[name=nb_joueurs]:checked").val();
					var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
					if($("#client_name").val().length < 2) {
						message_erreur = "Erreur ! Veuillez saisir votre nom";
					}else if($("#client_firstname").val().length < 2) {
						message_erreur = "Erreur ! Veuillez saisir votre prénom";
					}else if(!reg.test($("#client_email").val())) {
						message_erreur = "Erreur ! Veuillez saisir une addresse E-mail valide";
					}
					if(!nbj || !parentdiv) {
						message_erreur = "ERREUR dans la structure du formulaire !";
					}else{
						for (var i=2; i<=nbj; i++){
							var input = document.createElement("input");
							input.type = "hidden";
							input.className = "serialize";
							input.name = "id_J" + i;
							input.id = "id_J" + i;
							input.value = "1";
							parentdiv.appendChild(input);
						}
						for (var i=1; i<=nbj; i++){
							var input = document.createElement("input");
							input.type = "hidden";
							input.className ="serialize";
							input.name = "nbTrousJ" + i;
							input.id = "nbTrousJ" + i;
							input.value = $("#nb_trous").val();
							parentdiv.appendChild(input);
						}
					}
				}
			}
			return true;
		},
		success: function(data) {
			$("#confirmation_div").hide();
			$("#reservation_done").show();
			var resp = jQuery.parseJSON(data);
			if(!resp.valid) {
				alert(resp.message);
				return false;
			}
		},
	});
}	// initWizard

/////////////////////////////////////////////////////////////////////////////////
// WIZARD FUNCTIONS

function validate_form_wizard(index)
{
	var $validator = $("#wizard_form").validate({
	
		rules: {
			date_resa: {
				required: true,
			},
			heure_resa: {
				required: true,
			},
			client_name:{
				required:true,
			},
			client_firstname:{
				required:true,
			},
			client_email:{
				required:true,
				email: "l'Email doit être au format name@domain.com"
			},
		},
	
		messages: {
			heure_resa: "Please specify your First name",
			client_email: {
				required: "We need your email address to contact you",
				email: "l'Email doit être au format name@domain.com"
			}
		},
	
		highlight: function (element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function (element) {
			$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
		},
		errorElement: 'span',
		errorClass: 'help-block',
		errorPlacement: function (error, element) {
			if (element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		}
	});

	var $valid = $("#wizard_form").valid();
	if (!$valid) {
		$validator.focusInvalid();
		return false;
	} else {
		$('#wizard_form_DOM').find('.form-wizard').children('li').eq(index).addClass('complete');
		$('#wizard_form_DOM').find('.form-wizard').children('li').eq(index).find('.step')
			.html('<i class="fa fa-check"></i>');
	}
	return true;
}

function step_form_action(tab, navigation,index)
{
	//////////////////////////////////////////////////////
	// ECRAN PARCOURS ////////////////////////////////////
	if(index == 1) {	// affichage de l'écran de parcours et horaire
		load_user_available_Intervals();
		if($("#nb_trous").val() == 18){
			fill_DOM_with_Intervals(lastStartFor18hole);
		}
		// restrict_end_of_day_Intervals();
		// setTimeout(restrict_user_nb, 1000);	// TODO a integrer dans la req ajax precedente
	}// ECRAN PARCOURS

	//////////////////////////////////////////////////////
	// ECRAN JOUEURS /////////////////////////////////////
	if(index == 2) {	// affichage de l'écran des joueurs
		update_joueurs_presents();
		CreateResaProvi($("#wizard_form .serialize"));
	}// ECRAN JOUEURS

	//////////////////////////////////////////////////////
	// ECRAN RESUME //////////////////////////////////////
	if(index == 3) {	// affichage de l'écran de resumé
		DisplayDigest();
	}// ECRAN RESUME
}

function init_Intervals()	// initialise les intervalles depuis ceux du serveur
{
	hoursIntervals.length = 0;
	hoursPlayers.length = 0;
	for(var i = 0; i < serverIntervals.length; i++) {
		hoursIntervals.push(serverIntervals[i]);
		// hoursPlayers.push(max_joueurs + " places");
		hoursPlayers.push("");
	}
	console.log("init_Intervals: ", hoursIntervals.length);
}	// init_Intervals

function clear_DOM_Intervals()	// vide les slots horaires du DOM
{
	// console.log("clear_DOM_Intervals", hoursIntervals.length);
	$("#heure_resa optgroup#nb_trous_optgroup option").each(function(){
		$(this).remove();
	});
}	// clear_DOM_Intervals

function fill_DOM_with_Intervals(lastslot)	// rempli les slots horaires du DOM avec le tableau des intervalles
{
	var n = 0;
	var selectelem = document.getElementById('heure_resa');
	var idx= selectelem.selectedIndex;
	if ($("#nb_trous").val() == 18){
		lastslot = lastStartFor18hole;
	}else{
		lastslot = "24:00";
	}
	// if(lastslot == null){
	// 	lastslot = "24:00";
	// }else{
	// 	lastslot = lastStartFor18hole;
	// }
	var thattime = new Date();
	var thattimelast = new Date();
	var hmlast = lastslot.split(':');
	thattimelast.setHours(hmlast[0],hmlast[1]);
	// if (hoursIntervals.length == 0){
	// 	init_Intervals();
	// }
	clear_DOM_Intervals();
	// if (hoursIntervals.length == 0){
	// 	init_Intervals();
	// }
	for(var i = 0; i < hoursIntervals.length; i++) {
		var hm = hoursIntervals[i].split(':');
		thattime.setHours(hm[0],hm[1],0);
		if (thattime < thattimelast){
			// switch(hoursPlayers[i]){
			// case 0:
			// 	$("#heure_resa optgroup#nb_trous_optgroup").append('<option class="columns" value="' + hoursIntervals[i] + '">' + hoursIntervals[i] + " Plus de place disponible !" + '</option>');
			// 	break;
			// case 1:
			// 	$("#heure_resa optgroup#nb_trous_optgroup").append('<option class="columns" value="' + hoursIntervals[i] + '">' + hoursIntervals[i] + " " + hoursPlayers[i] + ' place disponible</option>');
			// 	break;
			// default:
			// 	$("#heure_resa optgroup#nb_trous_optgroup").append('<option class="columns" value="' + hoursIntervals[i] + '">' + hoursIntervals[i] + " " + hoursPlayers[i] + ' places disponibles</option>');
			//
			// }
			$("#heure_resa optgroup#nb_trous_optgroup").append('<option class="columns" value="' + hoursIntervals[i] + '">' + hoursIntervals[i] + " " + hoursPlayers[i] + '</option>');
		}
	}
	// On préselectionne le premier créneau horaire
	if (idx == -1){
		$("#heure_resa optgroup#nb_trous_optgroup option:first").prop('selected',true);	// selection du premier (prochain) slot horaire dispo
	}else{
		n = $("#heure_resa optgroup#nb_trous_optgroup").children().length -1;
		if(idx > n){
			selectelem.selectedIndex = n;
		}else{
			selectelem.selectedIndex = idx;
		}
	}
	console.log("fill_DOM_with_Intervals:", hoursIntervals.length+" lastslot:"+lastslot);
}	// fill_DOM_with_Intervals

function restrict_end_of_day_Intervals()	// restreindre aux slots restants pour la journée
{
	// console.log("restrict_end_of_day_Intervals", hoursIntervals.length);
	// if (hoursIntervals.length == 0){
	// 	init_Intervals();
	// }
	var dt = $("#datepicker").datepicker("getDate");
	var len = hoursIntervals.length
	while (len--) {
		var hm = hoursIntervals[len].split(':');
		dt.setHours(hm[0],hm[1],0);
		if (dt < new Date()){
			console.log("remove slot:", hoursIntervals[len]);
			hoursIntervals.splice(len,1);
			hoursPlayers.splice(len,1);
		}
	}
	console.log("restrict_end_of_day_Intervals", hoursIntervals.length);
}	// restrict_end_of_day_Intervals

function load_user_available_Intervals()	// ajax: slots dispo pour ce joueur à partir de maintenant
{
	restrict_end_of_day_Intervals();	// on restreint au reste de la journée
	$.ajax(		// requete ajax pour construire la liste de slots dispo avec le nb de places
	{
		type: "POST",
		url: "/resajax/retrievedate",
		dataType: "json",
		data: {
			date: $("#date_resa").val(),
			nb_trous: $("#nb_trous").val()
		},
		success: function( data ) {
			$.map(data, function (horaires_reserves){
				for(var i = 0; i < horaires_reserves.length; i++) {
					var len = hoursIntervals.length
					while (len--) {
						if(hoursIntervals[len] == horaires_reserves[i][0]) {
							hoursPlayers[len] = horaires_reserves[i][1];
							if(horaires_reserves[i][1] == 0) {		// plus de place
								hoursIntervals.splice(len,1);
								hoursPlayers.splice(len,1);
							}else if(horaires_reserves[i][1] == 1) {// 1 place
								hoursPlayers[len] = "1 -> (dernière place disponible)";
								console.log("dernière place:", hoursIntervals[len]);
							}else {									// x places
								hoursPlayers[len] = " (" + horaires_reserves[i][1] + " places disponibles)";
								console.log("places disponibles:", hoursIntervals[len]);
							}
						}// else{
// 							hoursPlayers[len] = " (4 places disponibles)";
// 						}
					}	// while hoursIntervals
				}	// for horaires_reserves
				console.log("load_user_available_Intervals:retrievedate", hoursIntervals.length);
				fill_DOM_with_Intervals();
			});	// $.map data
		}	// success
	});	// ajax retrievedate
	// cesar: TODO ne faire qu'une seule requete ajax !
	$.ajax(		// requete ajax pour finir par exclure les slots déjà pris par une partie avec le joueur
	{
		dataType: "json",
		url: '/resajax/userblockedtimes?day_date='+ $("#date_resa").val(),
		success: function( data ) {
			$.each(data, function(key, val) {
				var begin_date = new Date(val[0]);
				var end_date = new Date(val[1]);
				while(begin_date <= end_date) {
					var hours = begin_date.getHours();
					var minutes = begin_date.getMinutes()
					var heure = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes);
					var len = hoursIntervals.length
					while (len--) {
						if(heure == hoursIntervals[len]){
							hoursIntervals.splice(len,1);
							hoursPlayers.splice(len,1);
						}
					}	// while
					begin_date = new Date(begin_date.getTime() + 10*60000);
				}	// while begin_date
			});	// $.each
			console.log("load_user_available_Intervals:userblockedtimes", hoursIntervals.length);
			fill_DOM_with_Intervals();
		}	//success
	});	// ajax userblockedtimes
}	// load_user_available_Intervals

function restrict_user_nb()
{
	var place_dispo;
	if($("#heure_resa").find(":selected") != null) {
		// alert($("#heure").find(":selected").text());
		place_dispo = $("#heure_resa").find(":selected").attr("places_dispo");
	}
	else {
		//alert($("#heure_resa option").first().text());
		place_dispo = $("#heure_resa optgroup#nb_trous_optgroup option").first().attr("places_dispo");
	}
	// reset le grisage utilisateur
	if(vars.isLogged){
		for(var i = max_joueurs; i > 0; i--) {
			if($("#joueur"+i).attr('tag') != "locked") {
				$("#joueur"+i).prop("disabled",false);
			}
			$(".cb_ressource_"+i).prop("disabled", false);
			$("#joueur"+i+"_invite").prop("disabled", false);
		}
	}else{
		// $(".nb_joueurs").removeAttr("disabled");
		$(".nb_joueurs").prop("disabled", false);
	}
	var check = 0;
	if(place_dispo != null) {
		// On desactive les champs utilisateurs en trop si il n'y a pas sufisement de places disponible
		for(var i = max_joueurs; i > place_dispo; i--) {
			if(vars.isLogged){
				$("#joueur"+i).val("");
				$("#id_J"+i).val("");
				$("#joueur"+i).prop("disabled", true);
				$(".cb_ressource_"+i).prop("disabled", true);
				$(".cb_ressource_"+i).prop("checked", false);
				$(".cb_ressource_"+i).attr("tag", "locked");
			}else{
				$("#nb_joueurs_"+i).prop('disabled', true);
				if($("#nb_joueurs_"+i).prop("checked")) {	//cesar: on coche la case précédente
					$("#nb_joueurs_"+i).prop('checked', false);
					$("#nb_joueurs_"+(i-1)).prop('checked', true);
				}
			}
		}
	}
}	// restrict_user_nb

function update_joueurs()
{
	// joueurs_presents_ = Array();
	$("#nb_joueurs").val(update_joueurs_presents());
	for (var i = 1; i <= max_joueurs; i++){
		if($("#id_J"+i).val() !== ""){
			// joueurs_presents_.push($("#id_J"+i).val());
			// $("#nb_joueurs").val(joueurs_presents_.length);
			$("#nbTrousJ" + i).val($("#nb_trous").val());
		}
	}
	console.log("update_joueurs: ", $("#nb_joueurs").val());
}	// update_joueurs

function DisplayDigest()
{
	$.ajax(		// requete ajax pour afficher le résumé
	{
		type: "POST",
		url: "/resajax/wizarddigest",
		dataType: "json",
		data:  $("#wizard_form .serialize").serialize(),
		success: function( data ) {
			console.log("wizard data:", data);
			if(data.valid == false){
				$("#isFormValid" ).val("false");
			}else{
				$("#isFormValid" ).val("true");
			}
			if($("#isFormValid" ).val() == "true"){
				$("#submitResa" ).prop("disabled",false);
			}else{
				$("#submitResa" ).prop("disabled",true);
			}
			$("#confirmation_status").hide();
			$("#confirmation_div").show();
			$("#recap_title").html(data.date);
			var ulparc = $("#recap_nb_trous_div ul").empty();
			var liparc = $('<li/>')
				.text("Parcours de "+data.nb_trous+" trous")
				.append("<span class='info_supl_span'> (Départ au trou N°"+data.sh+" )</span>")
				.appendTo(ulparc);
			var liparc = $('<li/>')
				.text("Durée de parcours " + data.duree)
				.append("<span class='info_supl_span'> (Fin de parcours éstimé à "+data.heure_fin+" )</span>")
				.appendTo(ulparc);

			var pl = $("#recap_joueurs_div ul");
			pl.empty();
			$.each(data.players, function(i){
				var li = $('<li/>');
				if(data.players[i].id == 0)
					li.text("Invité");
				else if(data.players[i].id == 1)
					li.text("Visiteur");
				else
					li.text(data.players[i].firstname+" "+data.players[i].lastname);
				if(data.players[i].ressources.length > 0)
					li.append("<span class='info_supl_span'> ("+ data.players[i].ressources[0]+")</span>");
				li.appendTo(pl);
			});
		}	// success
	});	// ajax wizarddigest
}	// DisplayDigest





/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////






/////////////////////////////////////////////////////////////////////////////////
// CALENDRIER
/////////////////////////////////////////////////////////////////////////////////

var event_height = 30;
var isOn_user_play = false;
// To keep a reference to the default lightbox to manage recurring events
var recurring_lightbox;
var reservation_lightbox;

var isAnEmptyClick;
var action_data;

function initCalendrier()
{
	resize_calendar();
	initScheduler();
	// update_joueurs_presents();
	
	$(window).resize(function(){
		resize_calendar();
	});
	
	// When clicking button to add recurring event, we set the lightbox back to default and open it
	$("#egp_event_icon").click(function(){
		$("#event_type" ).val(3);	// event_type == 3 => resa event

		scheduler.showLightbox = recurring_lightbox;

		scheduler.addEventNow();

	});

	$("#dhx_minical_icon").click(function show_minical(){
		if (scheduler.isCalendarVisible()){
			scheduler.destroyCalendar();
		} else {
			scheduler.renderCalendar({
				position:"dhx_minical_icon",
				date:scheduler._date,
				navigation:true,
				handler:function(date,calendar){
					scheduler.setCurrentView(date);
					scheduler.destroyCalendar()
				}
			});
		}
	});

	// Checkbob de la ressource Chariot: uniquement visuel => la donnée est dans #nb_trous_J
	$("#Chariot_1, #Chariot_2, #Chariot_3, #Chariot_4").change(function(){
		var idxj = this.id.slice( -1); 
		if (this.checked) {	// this is true if the switch is on
			// $("#res_J" + idxj).val($("#id_J" + idxj).val());
			setRes(idxj, $("#id_J" + idxj).val())
		}
		else {
			$("#res_J" + idxj).val("");
			setRes(idxj);
		}
		if($("#crud_J" + idxj).val() == "Edit"){
			editSlotJ(idxj, true);
		}
	});
	

	// Switch du nombre de trous: uniquement visuel => la donnée est dans #nb_trous_J
	$(".nbTrousJ").change(function(){
		var idxj = this.name.slice( -1); 
		// console.log("idxJ:", idxJ);
		if (this.checked) {	// this is true if the switch is on
			$("#nb_trous_J" + idxj).val(18);
		}
		else {
			$("#nb_trous_J" + idxj).val(9);
		}
		
		if($("#crud_J" + idxj).val() == "Edit"){
			editSlotJ(idxj, true);
		}
	});

	$("#joueur1, #joueur2, #joueur3, #joueur4").addClear({
		onClear: function(){
			// alert("call back!");
			inputfield = document.activeElement.id;
			$("#" + inputfield).trigger("change");
		},
		closeSymbol: "&#10006;",
		// closeSymbol: "\f057",
		right: 4,
		top: 10,
		color: "#CCC",
	});


	$("#joueur1, #joueur2, #joueur3, #joueur4").focus(function(){
		// lastNameValue = $(this).val();
		// unvalidate_name($(this));
		// $(this).select();
	});

	$("#joueur1, #joueur2, #joueur3, #joueur4").change(function(){
		var idxj = this.name.slice( -1); 
		if(lastNameValue != "" && $(this).val() != lastNameValue) {
			// unvalidate_name($(this));
			unvalidateSlotJ(idxj);
		}else{
			// validate_name($(this));
			validateSlotJ(idxj);
		}
	});
	
	$("#joueur1, #joueur2, #joueur3, #joueur4").focusout(function(){
		// validate_name($(this));
		update_joueurs_presents();
	});

	$("#joueur1, #joueur2, #joueur3, #joueur4").autocomplete({
		source: function( request, response ) {
			$.ajax({
				async: true,
				type: "POST",
				url: "/resajax/autocomplete",
				dataType: "json",
				cache:true,
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
		},
		appendTo: "#wizard_form, #form, #details_form_div",
		minLength: 2,
		select: function( event, ui ) {
			// var idxj = parseInt(this.name.substr(this.name.length-1));
			var idxj = this.name.slice( -1); 

			// var idSelector = "#id_"+$(this).prop('id');
			var idSelector = "#id_J" + idxj;
			$(idSelector).val(ui.item.key);
			lastNameValue = ui.item.value;
			// $("#crud_J"+idxj).val("Create");
			// validate_name($(this));
			validateSlotJ(idxj);

		},
		open: function() {
			// $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		},
		close: function() {
			// $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		},
	});	// $(joueurs_input).autocomplete
		
	$("#joueur1_invite, #joueur2_invite, #joueur3_invite, #joueur4_invite").click(function(){
		if(vars.isAdmin){
			// var idxj = parseInt($(this).context.id.slice(6,7));	// on recupere le numero de place du joueur
			var idxj = this.id.slice(6, 7); 
			if(this.checked) {
				$("#joueur" + idxj + "_visiteur").prop("checked", false);
				SetUserInputOpt(idxj, false, 'Nom de l\'invité (facultatif)', true);
				Change_PlayerDiv(idxj, true, true, "", 0);	// id invite = 0
				// validate_name($("#joueur" + localid));
				validateSlotJ(idxj);
			}
			else {
				SetUserInputOpt(idxj, true, 'Chercher un nom de membre ...', true);
				Change_PlayerDiv(idxj, true, true, "", "");
				// unvalidate_name($("#joueur" + localid));
				unvalidateSlotJ(idxj);
			}
		}// bloc admin
	});

	$("#joueur1_visiteur, #joueur2_visiteur, #joueur3_visiteur, #joueur4_visiteur").click(function(){
		if(vars.isAdmin){
			// var localid = parseInt($(this).context.id.slice(6,7));	// on recupere le numero de place du joueur
			var idxj = this.id.slice(6, 7); 
			if(this.checked) {
				$("#joueur" + idxj + "_invite").prop("checked", false);
				SetUserInputOpt(idxj, false, 'Nom du visiteur (facultatif)', true);
				Change_PlayerDiv(idxj, true, true, "", 1);	// id visiteur = 1
				// validate_name($("#joueur" + localid));
				validateSlotJ(idxj);
			}
			else {
				SetUserInputOpt(idxj, true, 'Chercher un nom de membre ...', true);
				Change_PlayerDiv(idxj, true, true, "", "");
				// unvalidate_name($("#joueur" + localid));
				unvalidateSlotJ(idxj);
			}
		}// bloc admin
	});
		
	$(".btn_clear_user").click(function(ev){
		$.ajax({
			async: true,
			url: '/resajax/leave',
			type: "POST",
			data: {id_users_has_reservation: $(this).attr("tag")},
			dataType: 'json',
			cache: false,
			success: function (data) {
				if(data.valid) {
					scheduler.endLightbox(false, document.getElementById('resa_form_div'));
					ReleaseResaProvi($("#form .serialize"));
					schedulerLoad();
				}
				alert(data.message);
			}
		});
	}); 

	$("#add_new_button").click(function(){
		var isCurrentUserAdded = false;

		for(var i = 1; i <= max_joueurs; i++) {
			if($("#id_J"+i).val() == "") {
				// Si le slot est vide
				if(!isCurrentUserAdded && !vars.isAdmin) {
					// Si le joueur courant n'a pas encore été ajouté, on l'ajoute
					$("#crud_J"+i).val("Create");
					Change_PlayerDiv(i,	// Numero du slot
						true,			// Div joueur entiere
						false, vars.thisUserFullName,	// joueur name, et name
						$("#current_user_id").val(),	// id_user
						true, true,		// nbTrousJ
						true, false		// Chariot
					)
					isCurrentUserAdded = true;
					validateSlotJ(i);
					continue;
				}
				// On clean le slot pour un potentiel joueur
				$("#crud_J"+i).val("none");
				if(vars.isAdmin){
					Change_PlayerDiv(i,	// Numero du slot
						true,			// Div joueur entiere
						true, "",		// joueur name, et name
						"",				// id_user
						true, true,		// nbTrousJ
						true, false,	// Chariot
						true, false,	// Visitor
						true, false		// Invited
					)
				}else{
					Change_PlayerDiv(i,	// Numero du slot
						true,			// Div joueur entiere
						true, "",		// joueur name, et name
						"",				// id_user
						true, true,		// nbTrousJ
						true, false,	// Chariot
						false, false,	// Visitor
						false, false	// Invited
					)
				}
				SetOtherReservation(i, false);
			}else{
				// slot avec déjà un autre joueur d'une ancienne partie
				$("#crud_J"+i).val("Read");
				Change_PlayerDiv(i,			// Numero du slot
					false					// Div joueur entiere désactivée
				)
				SetOtherReservation(i, true);
			}
		}
		setFormMode("Create", isCurrentUserAdded);
	});


	$("#edit_button").click(function(){
		$("#crud_mode").val("Update");
		for(var i = 1; i <= max_joueurs; i++) {
			if($("#crud_J"+i).val() == "Read") {
				// On passe le slot joueur en editable
				$("#crud_J"+i).val("Edit");
				Change_PlayerDiv(i,	// Numero du slot
					true,			// Div joueur entiere
					true, null,		// joueur et name
					null,			// id_user
					true, null,		// nbTrousJ
					true, null		// Chariot
				)
				editSlotJ(i, false);
				if(vars.isAdmin){
					Change_PlayerDiv(i,	// Numero du slot
						true,			// Div joueur entiere
						true, null,		// joueur et name
						null,			// id_user
						true, null,		// nbTrousJ
						true, null,		// Chariot
						true, false,	// Visitor
						true, false		// Invited
					)
				}
				SetBtnClear(i, true);
			}else if($("#crud_J"+i).val() == "none") {
				// On passe le slot vide en actif
				Change_PlayerDiv(i,	// Numero du slot
					true,			// Div joueur entiere
					true, null,		// joueur et name
					null,			// id_user
					true, true,		// nbTrousJ
					true, false		// Chariot
				)
				SetOtherReservation(i, false);
			}
		}
		setFormMode("Update");
	});


	$("#update_button").click(function(){	// ajax 
		var resa_form = document.getElementById('resa_form_div');
		if(!validate_form()) {
			return false;
		}
		$("#loading_div").height($("#form").height());
		$("#form").hide();
		$("#loading_div").show();
		$.ajax({
			async: true,
			url: '/resajax/update',
			type: "POST",
			data: $("#form").serialize(),
			dataType: 'json',
			cache: false,
			success: function (data) {
				$("#form").show();
				$("#loading_div").hide();
				if(!data.valid) {
					alert(data.message);
				}
				else {
					scheduler.endLightbox(false, resa_form);
					schedulerLoad();
				}
			}
		});
	});
		
	$("#delete_button").click(function(){	// ajax 
		$.ajax({
			async: true,
			url: '/resajax/delete',
			type: "POST",
			data: {id_reservation : $("#id_reservation").val()},
			dataType: 'json',
			cache: false,
			success: function (data) {
				if(!data.valid) {
					alert(data.message);
				}
				else {
					var resa_form = document.getElementById('resa_form_div');
					scheduler.endLightbox(false, resa_form);
					schedulerLoad();
				}
			}
		});
	});
		
	$("#annuler_button").click(function(){
		var resa_form = document.getElementById('resa_form_div');
		scheduler.endLightbox(false, resa_form);
		ReleaseResaProvi($("#form .serialize"));
	});
		
	$("#unit_tab").click(function(){
		scheduler.setCurrentView(scheduler._date, "starter_units");
	});
		
	$("#myplay_tab").click(function(){
		scheduler.setCurrentView(scheduler._date, "myplay");
	});
		
	$("#agenda_tab").click(function(){
		scheduler.setCurrentView(scheduler._date, "agenda");
	});
		
	$('#form').ajaxForm({
		// beforeSerialize: function($form, options) {
		// 	$("#nbTrousJ1").val("9");
		// },
		beforeSubmit: function(data, form, options) {
			// console.log("nbTrousj1:" , $("#nbTrousJ1").val());
			if(!validate_form()) {
				return false;
			}
			if(vars.isLogged){
				options['url'] = "/resajax/add";
			}else{
				options['url'] = "/resajax/addpublic";
			}
			// $("#loading_div").height($("#form").height());
			// $("#form").hide();
			// $("#loading_div").show();
		},
		success: function(data) {
			var resp = jQuery.parseJSON(data);
			if(!resp.valid) {
				alert(resp.message);
				// $("#form").show();
				// $("#loading_div").hide();
				return false;
			}
			// var resa_form = document.getElementById('resa_form_div');
			// $("#form").show();
			// $("#loading_div").hide();
			scheduler.endLightbox(true, document.getElementById('resa_form_div'));
			schedulerLoad();
		},
	});

}	// initCalendrier

function initScheduler()
{
	var sections=[{key:1, label:"Trou 1"},{key:10, label:"Trou 10"}];
	var time_step = 10;		// 10 minutes par slot pour le découpage du scheduler
	// var click_disabled = false;
	// var isOn_user_play = false;
	// var shortTime_format = scheduler.date.date_to_str("%H:%i");

	shortTime_format 		= scheduler.date.date_to_str("%H:%i");
	shortDate_format 		= scheduler.date.date_to_str("%d/%m/%Y");
	shortDate_mysql_format 	= scheduler.date.date_to_str("%Y-%m-%d");
	mysql_format 			= scheduler.date.date_to_str("%Y-%m-%d %H:%i");
	french_format 			= scheduler.date.date_to_str("%H:%i le %d %F %Y");


	scheduler.locale.labels.agenda_tab=null;	// on utilise une icone a la place du texte

	scheduler.locale.labels.section_couleur = "Couleur";
	scheduler.locale.labels.section_startholes = "Départ sur";

	scheduler.config.readonly = vars.isLogged ? false : true;
	scheduler.config.show_loading = true;
	scheduler.config.fix_tab_position = false;
	scheduler.config.default_date = "%l %d %F %Y";
	scheduler.config.xml_date = "%Y-%m-%d %H:%i";
	scheduler.config.first_hour = vars.premier_depart;
	scheduler.config.last_hour = vars.dernier_depart;
	scheduler.config.multi_day = true;	// TODO pas utile
	scheduler.config.full_day  = true;	// TODO pas utile
	scheduler.config.details_on_create = true;
	// scheduler.config.details_on_dblclick = false;
	// scheduler.config.drag_create = true;
	// scheduler.config.separate_short_events = false;
	scheduler.config.time_step = time_step;		// x minutes par slot pour le découpage du scheduler
	scheduler.config.event_duration = scheduler.config.time_step;
	scheduler.config.hour_size_px = (60 / scheduler.config.time_step) * event_height;
	scheduler.config.scroll_hour= (new Date()).getHours(); //scroll to actual hour

	scheduler.config.lightbox.sections = [
		{
			name:"couleur",
			map_to:"colour",
			type:"select",
			height:40,
			default_value:"34cdf9",
			options:$.colourPickerBasicColors()
		},
		{
			name:"startholes",
			map_to:"trou_depart",
			type:"multiselect",
			vertical:"false",
			height:40,
			options:sections,
		},
		{ name: 'Infos', height: 40, type: 'textarea', map_to: 'text' },
		{ name: "recurring", height: 150, type: "recurring", map_to: "rec_type", button: "recurring" },
		{ name: 'time', height: 72, type: 'time', map_to: 'auto' },
	];
	
	dhtmlXTooltip.config.className = 'passover'; // sets the CSS classname of the tooltip window
	dhtmlXTooltip.config.timeout_to_display = 50; // delay of the rendering

	scheduler.templates.tooltip_text = function(start,end,ev){
		var infoplayers = "";
		if(vars.isLogged){
			infoplayers = ":<BR>"+ ev.j;
		}else
			return	// aucune info-bulle si visiteur
		if(ev.g == 0){			//  9T
			return '<b><span class="glyphicon glyphicon-passover-large glyphicon-circle-arrow-down"></span> Parcours 9 trous </b>' + infoplayers;
		}else if(ev.g == 1){	// 18T Aller
			return '<b><span class="glyphicon glyphicon-passover-large glyphicon-circle-arrow-right"></span> Parcours Aller </b>' + infoplayers;
		}else if(ev.g == 2){	// 18T Retour
			return '<b><span class="glyphicon glyphicon-passover-large glyphicon-circle-arrow-left"></span> Parcours Retour </b>' + infoplayers;
		}else
			return	// aucune info-bulle si autre type de partie (erreur)
	};
	scheduler.templates.hour_scale = function(date){
		var html="";
		for (var i = 0; i < 60 / scheduler.config.time_step; i++){
			if(i == 0){
				html+='<div class="hour_tag">';
			}else{
				html+='<div class="minute_tag">';
			}
			html+=shortTime_format(date)+"</div>";
			date = scheduler.date.add(date, scheduler.config.time_step, "minute");
		}
		return html;
	}
	
	scheduler.templates.agenda_text = function(start,end,ev){return ev.j;};
	scheduler.templates.agenda_date = function(start, end, mode) {
		return shortDate_mysql_format(start) + " — " + shortDate_mysql_format(end);
	};

	scheduler.templates.lightbox_header = function(start, end, event){
		return "<h4>Programmer un évènement</h4>";
	}

	scheduler.form_blocks.multiselect.set_value = function(node, value, ev){
		for (i = 0 ; i < node.children.length; i++) {
			// ev.type is present only if we are in update mode
			// so in this case we disable the trou checkboxes
			node.children[i].firstChild.disabled = (ev.type == "evenement");

			// Here we check the right textbox
			node.children[i].firstChild.checked = (ev.trou_depart == node.children[i].firstChild.value);
		}
	};

	// defining add function for prev/next arrows
	scheduler.date.add_agenda = function(date, inc) {
		return scheduler.date.add(date, inc, "month");
	};

	scheduler.createUnitsView({
		name:"starter_units",
		// property:"trou_depart",
		property:"sh",
		list:sections,
		days:1
	});

	scheduler.createGridView({
		name:"myplay",
		fields:[
			{id:"start_date", label:'Date', width:100, align:'left', sort:'date'},
			{id:"j", label:'Joueurs', width:'*', align:'left', sort:'str'},
			// {id:"trou_depart", label:'Départ', width:60, align:'left', sort:'int'}
			{id:"sh", label:'Départ', width:60, align:'left', sort:'int'}
		],
		from: new Date(scheduler.date.month_start(scheduler.getState().date)),
		to: new Date(scheduler.date.add(scheduler.date.month_start(scheduler.getState().date), 1, "month"))
	});

	scheduler.filter_agenda = function(id, ev){
		if(ev.evt == 1 && ev.g < 2 && ev.u == 1 )	// une partie joueur ET pas un retour ET avec l'utilisateur
			return true; // event will be rendered
	}	// filtre de l'affichage de la vue "Mes reservations"

	scheduler.deleteEvent = function(id) {
		var ev = scheduler.getEvent(id);
		console.log("deleteEvent", ev.id, ev.evt);
		if(ev.evt == 1)	// une resa joueur
			return false;
		else{
			delete this._events[id];
			this.unselect(id);
			this.event_updated(ev);
			return true;
		}
	};
	
	// Fonction de gestion de l'affichage des reservations sur le planning
	scheduler.renderEvent = function(container, ev) {
		// Si c'est un evenement de plus de 10 minutes, on l'affiche à la manière classique du calendrier
		if(ev.evt == 3 && ((ev.start_date.getTime() + 60*10*1000) != ev.end_date.getTime())) {
			return false;
		}
		
		var div_class = "";
		var text = "";
		// var that_event_type = " reservation";
		
		if(ev.g == 0){			//  9T
			text = '<span class="glyphicon glyphicon-circle-arrow-down"></span> ';
		}else if(ev.g == 1){	// 18T Aller
			text = '<span class="glyphicon glyphicon-circle-arrow-right"></span> ';
		}else if(ev.g == 2){	// 18T Retour
			text = '<span class="glyphicon glyphicon-circle-arrow-left"></span> ';
		}

		if (ev.u == 1){	// l'utilisateur est dans la partie
			div_class = "event_user";
			if(ev.n == 1){
				text += "Vous";
			}else{
				text += "Vous + " + (ev.n-1) + " joueur";
				if (ev.n > 2) text += "s";
				if(ev.n == max_joueurs) div_class = "event_userfull";
			}
		}else{			// l'utilisateur n'est pas dans la partie
			switch(ev.n){
			case 1:
				div_class = "event_1p";
				break;
			case 2:
				div_class = "event_2p";
				break;
			case 3:
				div_class = "event_3p";
				break;
			case max_joueurs:
				div_class = "event_full";
			}
			text += "" + ev.n + " joueur";
			if (ev.n > 1) text += "s";
			// if (ev.p == 1){
			if (ev.evt == 2){
				div_class = "event_provi";
				text = "provisoire";
				// that_event_type = " provisoire";
			}
		}
		// ici le slot est plein (pas les parties)
		var eventdiv = $(container);
		// if (ev.n == max_joueurs && !ev.p){
		if ((ev.n == max_joueurs || ev.f == 1) && ev.evt == 1){
			eventdiv.addClass("eventslot_full");
		}else{
			eventdiv.addClass("eventslot");
		}
			
		var html = '';
		
		html += '<div';
		html += 	' class="dhx_event_move dhx_title reservation ' + div_class + '"';
		html += ' >';
			
		if(vars.isAdmin){
			if(ev.s) {
				html += '<span class="user_payant"&nbsp;';
				if(ev.s[0] > 0){
					html += "" + ev.s[0] +'<span class="glyphicon glyphicon-certificate"></span>';
				}
				if(ev.s[1] > 0){
					html += "" + ev.s[1] +'<span class="glyphicon glyphicon-euro"></span>';
				}
				html += '</span>';
			}
		}
		
		html += '<span style="font-weight:normal;">' + text + '</span>';
		html += '</div>';
		container.innerHTML = html;
		return true;
	}; // => render only player resa not big recurring event
	
	/////////////////////////////////////////////////////////////////////
	// LIGHTBOX

	// keep a reference to the default lightbox for recurring events
	recurring_lightbox = scheduler.showLightbox;
	
	// Configure our custom lightbox for reservations
	reservation_lightbox = function(id) {reservationLightbox(id);};

	// By default, we use our custom lightbox to handle reservation when events occurs on the calendar
	scheduler.showLightbox = reservation_lightbox;

	// When normal lightbox closes we set back lightbox to reservation_lightbox
	scheduler.attachEvent("onAfterLightbox", function (){
		scheduler.showLightbox = reservation_lightbox;
	});

	/////////////////////////////////////////////////////////////////////
	// Manage recurring events 

	scheduler.attachEvent("onLightbox", function (id){
		console.log("onLightbox");
		if ($("input.color_display").length) {
			$( "a[rel='" + scheduler.getEvent(id).colour + "']" ).click();
		} else {
			// color select do not offer the way to specify an id so we find with specific jquery selector
			$( "option:contains('#ffffff')" ).parent().colourPicker({
				ico: '/assets/admin/images/jquery.colourPicker.gif',
				title: false
			});
		}
	});

	scheduler.attachEvent("onEventChanged", function(id,ev) {
		console.log("For recurring event ONLY: onEventChanged");
		console.log("onEventChanged: ",id, ev);
		
		if (ev.evt !== "3"){
			console.log("Warning not an event ! return... ");
			return;
		}
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

				scheduler.load("/resajax/eventsparcours", "json", function(){
					// $(".dhx_cal_event").height(20);
					scheduler.blockTime();
				});
				
			}
		});
	});		// => /events/udpate_ajax

	scheduler.attachEvent("onEventDeleted", function(id, ev){
		console.log("For recurring event ONLY: onEventDeleted");
		console.log("onEventDeleted: ",id, ev);

		$.ajax({
			type: "POST",
			url: "/events/delete/"+id,
			dataType: "json",
			success: function( data ) {
				scheduler.clearAll();

				if(data["success"] == false) {
					alert(data["success_message"]);
				}

				scheduler.load("/resajax/eventsparcours", "json", function(){
					// $(".dhx_cal_event").height(20);
					scheduler.blockTime();
				});
				
			}
		});
	});		// => /events/delete

	scheduler.attachEvent("onEventAdded", function(id,ev){

		if( ev.evt != 3 ) {	// evt == 3 uniquement pour les evenements !
			return true;
		}
		console.log("For recurring event ONLY: onEventAdded");
		console.log("onEventAdded: ",id, ev.rec_type);

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

				scheduler.load("/resajax/eventsparcours", "json", function(){
					// $(".dhx_cal_event").height(20);
					scheduler.blockTime();
				});

			}
		});
		//alert(ev.id + '\n' + ev.start_date + '\n' + ev.end_date + '\n' + ev.text + '\n' + ev.color);
	});			// => /events/insert_ajax

	/////////////////////////////////////////////////////////////////////

	// updating dates to display on before view change
	scheduler.attachEvent("onBeforeViewChange", function(old_mode, old_date, new_mode, new_date) {
		if(new_mode == "agenda"){
			scheduler.config.agenda_start = scheduler.date.month_start(new Date((new_date || old_date).valueOf()));
			scheduler.config.agenda_end = scheduler.date.add(scheduler.config.agenda_start, 1, "month");
		}else if(new_mode == "unit"){
			scheduler.config.day_start = scheduler.date.day_start(new Date((new_date || old_date).valueOf()));
			scheduler.config.day_end = scheduler.date.add(scheduler.config.day_start, 1, "day");
		}
		return true;
	});	// set correct start/end date
		
	scheduler.attachEvent("onViewChange", function (new_mode , new_date){
		console.log("onViewChange: ", new_mode, new_date);
		// show_minical();
		if(minicalendar){
			scheduler.linkCalendar(minicalendar);
		}
		// $(".dhx_cal_event").height(event_height);
	});	// restore mini calendar


	/////////////////////////////////////////////////////////////////////
	// Click Events that open the popup (reservation_lightbox)

	scheduler.attachEvent("onEmptyClick", function (date, native_event_object){
		log("\n------------------------ onEmptyClick ---------------------------\n\n", "start");
		
		isAnEmptyClick = true;
		
		action_data = scheduler.getActionData(native_event_object);
		
		// if(detectUserPlayTimespan(event)){
		// 	isOn_user_play = true;
		// 	// return false;
		// }else{
		// 	isOn_user_play = false;
		// 	// return true;
		// }

		if(vars.isMobile){
			scheduler.addEventNow({ start_date: date });
		}

		// var fixed_date = fix_date(date);
		// scheduler.addEventNow(date, scheduler.date.add(date, scheduler.config.time_step, "minute"));
	});	// => openlightbox to create new event on empty slot
	
	scheduler.attachEvent("onClick", function (event_id, native_event_object){
		log("\n------------------------ onClick      ---------------------------\n\n", "start");
		
		isAnEmptyClick = false;

		action_data = scheduler.getActionData(native_event_object);
		
		// openReservationLightbox( scheduler.getEvent(event_id) );
		
		reservationLightbox(event_id);
		
		return false;	// default action canceled
		
		// var ev = scheduler.getEvent(event_id);
		//
		// if(click_disabled || scheduler.config.readonly ) {
		// 	return false;
		// }
		// if( ev.evt == 3 ) {
		// 	return true;	// default action triggered: open lightbox
		// }
		// startEditEventForm(ev);
		// return false;	// default action canceled
	});	// => openlightbox to edit form
		
	scheduler.attachEvent("onDblClick", function (event_id, native_event_object){
		console.log("onDblClick");
		return false;
	});	// no double click
	

	/////////////////////////////////////////////////////////////////////
	// Drag and Drop management
	
	var dragged_event;
	scheduler.attachEvent("onBeforeDrag", function (id, mode, e){
		if(vars.isAdmin){
			dragged_event=scheduler.getEvent(id); //use it to get the object of the dragged event
			return true;
		}
		else
			return false;
	});
 
	scheduler.attachEvent("onDragEnd", function(){
		var event_obj = dragged_event;
		if(event_obj)
			console.log("onDragEnd ", event_obj);
		//your custom logic
	});

	//
	/////////////////////////////////////////////////////////////////////

	
	scheduler.attachEvent("onBeforeEventDeleted", function (mode , date){
		console.log("onBeforeEventDeleted", date.type);
		if(date.type == "reservation")
			return false;
		else
			return true;
	});	// patch to prevent delete real resa event
	
	scheduler.attachEvent("onXLE", loadUserBlockTime); // blocages du joueur apres le chargement des parties


	/////////////////////////////////////////////////////////////////////////////////////////////
	// INIT SCHEDULER
	/////////////////////////////////////////////////////////////////////////////////////////////
	scheduler.init('scheduler_here', new Date(), "starter_units");

	if(vars.isAdmin){
		scheduler.setLoadMode("week")	// chargement par semaine meme si elle est déjà passée
	}else{
		scheduler.setLoadMode("day")	// chargement par jour meme s'il est déjà passé
	}

	scheduler.load("/resajax/eventsparcours", "json", function(){
		// $(".dhx_cal_event").height(event_height);
		loadBlockTime();
		scroll_to_now();
		scheduler.updateView();
	});

}	// initScheduler





/////////////////////////////////////////////////////////////////////////////////
// CALENDIRER FUNCTIONS

function schedulerLoad(){
	scheduler.clearAll();
	scheduler.deleteMarkedTimespan();
	scheduler.load("/resajax/eventsparcours", "json", function(){
		// $(".dhx_cal_event").height(event_height);
		loadBlockTime();
		scheduler.setCurrentView();
	});
}	// schedulerLoad

function resize_calendar(){

	var window_h = $(window).outerHeight(true);
	
	var header_h = $("#header").outerHeight(true);
	var ribbon_h = $("#ribbon").outerHeight(true);
	
	var div1_h = parseInt(jQuery('#content').css('margin'), 10) + parseInt(jQuery('#content').css('padding-top'), 10) + parseInt(jQuery('#content').css('padding-bottom'), 10);
	var div2_h = parseInt(jQuery('.jarviswidget').css('margin'), 10) + parseInt(jQuery('.jarviswidget').css('padding'), 10);
	var div3_h = parseInt(jQuery('.jarviswidget>div').css('margin'), 10) + parseInt(jQuery('.jarviswidget>div').css('padding-top'), 10);
	var div4_h = parseInt(jQuery('.widget-body').css('margin'), 10) + parseInt(jQuery('.widget-body').css('padding-bottom'), 10);
	var sche_h = parseInt(jQuery('#scheduler_here').css('margin-bottom'), 10);
	
	var footer_h = $(".page-footer").outerHeight(true);

	$("#scheduler_here").height(window_h - header_h - ribbon_h - div1_h - div2_h - div3_h - div4_h - sche_h - footer_h);
	
	console.log("calendar height: "+$("#scheduler_here").height());
}	// resize_calendar

function loadBlockTime(){
	// Bloque les zones de temps avant et apres la periode ouverte
	scheduler.blockTime({ start_date: new Date(vars.block_time_before_start), end_date: new Date(vars.block_time_before_end)});
	scheduler.blockTime({ start_date: new Date(vars.block_time_after_start),end_date: new Date(vars.block_time_after_end)});
	console.log("blocktime done");
	scheduler.update_view();	// refresh view to scroll to hour
}	// loadBlockTime

function loadUserBlockTime(thatDate){
	// Affiche les zones de blocage du joueur connecte
	// var shortDate_format = scheduler.date.date_to_str("%d/%m/%Y");
	var shortStrDate;
	if(thatDate == null || thatDate == ""){
		if(scheduler != null){
			shortStrDate = shortDate_format(scheduler.getState().date); // -> "29/06/2013"
		}
	}else{
		shortStrDate = shortDate_format(new Date(thatDate)); // -> "29/06/2013"
	}
	
	$.getJSON('/resajax/userblockedtimes?day_date='+shortStrDate, function(data){
		$.each(data, function(key, val) {
			scheduler.addMarkedTimespan({ // Marque la partie et le temps avant
				start_date:new Date(val[0]),
				end_date:new Date(val[1]),
				type: "user_play",
				css:   "user_play_section"
			});
		});
		scheduler.setCurrentView();
	});
}	// loadUserBlockTime

function detectUserPlayTimespan(target){
	///////////////////
	// Detecte un clic sur une periode de jeu de l'utilisateur
	// var target = scheduler.getActionData(event);
	if(scheduler.checkInMarkedTimespan({
		start_date: target.date,
		end_date: scheduler.date.add(target.date, scheduler.config.time_step, 'minute'),
		section_id: target.section,	//'section_id' - name of the property mapped to Timeline of Units view
	}, "user_play")){
		// dhtmlx.message("Click on marked timespan");
		return true;
	}else{
		// dhtmlx.message("Click on empty space");
		return false;
	}
}	// detectUserPlayTimespan

/*function startEditEventForm(ev){
	console.log("startEditEventForm, ev.id: ", ev.id)

	openReservationLightbox(ev);

	////////////////////////////////////////////////////////
	// On lance la récupération du detail de la partie
	loadEventsDetails(ev);
}	// startEditEventForm
*/

function reservationLightbox(id) {
	console.log("Openning Custom Lightbox: reservationLightbox id: ", id)

	////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////
	// Step 1: On ouvre la popup de resa ou d'evenement recurrent
	log("\nStep1: Open popup", "bold");

	////////////////////////////////////////////////////////
	// On recupere l'evenement lié à cet id
	var ev = scheduler.getEvent(id);
	
	////////////////////////////////////////////////////////
	// Test si ouverture autorisée
	if( scheduler.config.readonly ) {
		log("Stop: readOnly", "warning")
		return false;
	}

	////////////////////////////////////////////////////////
	// Test de zone bloquée par une autre partie joueur
	// if(isAnEmptyClick){
	if(ev.u != 1){	// Si le user n'est pas dans la partie
		if(detectUserPlayTimespan(action_data)){	// action_data is defined on event onEmptyClick
			scheduler.deleteEvent(ev.id);
			log("Stop: Clic sur une zone bloquée par une autre résa", "warning")
			return false;
		}
	}
	

	////////////////////////////////////////////////////////
	// Si c'est un evenement on rebascule sur la lightbox d'origine
	if (ev.evt == 3){
		if (vars.isAdmin){
			scheduler.showLightbox = recurring_lightbox;
			scheduler.showLightbox(ev.id);
			// on retourne true pour ouvrir la popup par defaut
			log("Stop: Affichage recurring_lightbox", "warning")
			return true;
		}
		log("Stop: Evenement non joueur", "warning")
		return false;
	}else{
		// Sinon on reset,initialise et ouvre la popup
		openReservationLightbox(ev);
	}


	////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////
	// Step 2: On charge si besoin les parties du serveur
	log ("\nStep2: Load events","bold");

	if(isAnEmptyClick){
		// On lance la résa provisoire des slots aller et retour au max de joueurs
		CreateResaProvi($("#form .serialize"));

		// Desactive les 18 trous si pas possible
		getPlayersBySlotFor(ev);	// check la dispo pour les 18 trous
		
		// Si non admin, on prepare le 1er slot
		if(!vars.isAdmin){
			Change_PlayerDiv(1,	// Numero du slot
				true,			// Div joueur entiere
				false,vars.thisUserFullName,// joueur et name
				$("#current_user_id").val()	// id_user
			)
			validateSlotJ(1, true);
		}
	}else{
		// On charge les parties sur ce slot horaire
		loadEventsDetails(ev);

		// TODO créer une resa provi pour les places encore dispo
		CreateResaProvi($("#form .serialize"));

		// TODO passer en mode CRUD=Read
	}


	////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////
	// Step 3: Definir le mode CRUD
	log("\nStep3: Set CRUD Mode", "bold")

	if(isAnEmptyClick){
		setFormMode("Create", ev.u ? true:false);
	}else{
		setFormMode("Read", ev.u ? true:false);
	}
}	// reservationLightbox

function openReservationLightbox(ev) {
	console.log("openReservationLightbox ev.id: ", ev.id)

	////////////////////////////////////////////////////////
	// On recupère le formulaire dans le DOM
	var resa_form = document.getElementById('resa_form_div');
	
	////////////////////////////////////////////////////////
	// On réinitialise tous les champs du formulaire
	reset_form(ev);

	////////////////////////////////////////////////////////
	// initialise la popup avec les valeurs de la partie
	// init des champs hidden
	$("#id_reservation").val(ev.id);
	$("#date_resa").val(shortDate_format(ev.start_date));
	$("#heure_resa").val(shortTime_format(ev.start_date));
	$("#trou_depart").val(ev.sh);
	$("#event_type" ).val(2);	// event_type 1 => joueur 2 => resa provi 3 => event
	// $("#crud_mode").val("add");

	// init de l'affichage
	$("#eventStartDate").html(french_format(ev.start_date));
	$("#game_type_div").hide();

	// setDetailFormMode("add");

	console.log("\t\tstartLightbox ... ");
	scheduler.startLightbox(ev.id, resa_form);	// ouverture de la lightbox basee sur resa_form

	close_onClick_outside();

}	// openReservationLightbox

function loadEventsDetails(ev){
	console.log("loadEvents, ev.id: ", ev.id)

	////////////////////////////////////////////////////////
	// On lance la récupération du detail de la partie
	$.ajax({
		async: true,
		type: "POST",
		url: "/resajax/loaddetailsform",
		dataType: "json",
		data: {
			id_reservation: ev.id,
			start_date: ev.start_date,
			trou_depart: ev.sh,
			usr_in: ev.u,
		},
		success: function(data){
			var joueurIdx = 1;
			
			// Boucle sur chaque résa presente sur ce slot horaire
			$.each(data, function(index, value) {
				if(value.isSelected){
					$("#game_type_div").show();
					switch(value.type){
						case 0:
							$("#game_type_div").html("Parcours 9 trous");
						break;
						case 1:
							$("#game_type_div").html("Parcours Aller");
						break;
						case 2:
							$("#game_type_div").html("Parcours Retour");
						break;
						default:
							$("#game_type_div").hide();
					}
				}

				//////////////////////////////////////////////////////////
				// On crée les 4 slots des joueurs pour toutes les parties
				joueurIdx = createPlayersDiv(value, joueurIdx);

				if(!ev.u && joueurIdx > max_joueurs && !vars.isAdmin){
					console.log("Joueur absent et slot full => mode none");
					// setDetailFormMode("none");
					setFormMode("Read", false);
				}
				// if(detectUserPlayTimespan(ev)){
				// 	console.log("Erreur 2 dans requete ajax /resajax/loaddetailsform");
				// 	setDetailFormMode("none");
				// }
			});
			for(var i = joueurIdx; i <= max_joueurs; i++){
				// On effectue la mise à jour du slot joueur
				Change_PlayerDiv(i,			// Numero du slot
					false					// Div joueur entiere
				)
				SetOtherReservation(i, true);
			}
			update_joueurs_presents();
			// Si le slot horaire est plein on desactive la fonction de d'ajout de partie
			if(joueurs_presents_.length >= max_joueurs){
				$("#add_new_button").hide();
			}
		}
	});
}	// startEditEventForm

function getPlayersBySlotFor(ev){

	var thatMorning = new Date(ev.start_date);
	thatMorning.setHours(0);

	var thatEvening = new Date(ev.start_date);
	thatEvening.setHours(23);

	$.ajax({
		async: true,
		type: "POST",
		url: "/resajax/getdispo",
		dataType: "json",
		data: {
			begin_date: mysql_format(thatMorning),
			end_date: mysql_format(thatEvening)
		},
		success: function( data ) {
			var occupation_array = new Array();	//Tableau du nombre de joueurs par slot horaire pour les trous 1 et 10
			// while(occupation_array.length > 0) {
			// 	occupation_array.pop();
			// }
			$.each(data, function(key, val) {
				occupation_array[key] = val;
			});
			// Activation du switch 9 ou 18 trous en fonction des places restantes
			// TODO Verif si encore utilisé avec le nouveau switch nbTrousJ
			var date_key = mysql_format(ev.start_date)+":00";
			// if(date_key in occupation_array[ev.sh]) {
			if(date_key in data[ev.sh]) {
				// for(var i = 4; i > 4-occupation_array[ev.sh][date_key]; i--) {
				for(var i = max_joueurs; i > max_joueurs - data[ev.sh][date_key]; i--) {

					Change_PlayerDiv(i,	// Numero du slot
						null,			// Div joueur entiere
						null, null,		// joueur name, et name
						null,				// id_user
						false, false		// nbTrousJ et check 18
					)

					// $("#nbTrousJ" + i).prop("disabled", true);
					// $("#nbTrousJ" + i).prop("checked", false);
				}
			}	
		}
	});
}	// getPlayersBySlotFor

function scroll_to_now(){
	$('.dhx_now_time').html("<a name='now'></a>");
	location.href = "#now";
}	// scroll_to_now

function createPlayersDiv(value, joueurIdx){
	console.log("createPlayersDiv: 1er joueur en slot :", joueurIdx, " (joueurIdx)");
	var nj = joueurIdx;
	
	// boucle sur les emplacements joueurs de cette partie à partir de l'idx de début
	for(var i=nj; i < nj+value.players.length; i++){

		var strname = "";
		var btncleartag = null;
		var swnbt;
		var cbres;

		// récup du nom du joueur
		if(value.players[i-nj].id == 0){
			strname = value.players[i-nj].info +" (Invité)";
		}else if(value.players[i-nj].id == 1){
			strname = value.players[i-nj].info +" (Visiteur)";
		}else{
			strname = value.players[i-nj].firstname +" " +value.players[i-nj].lastname;
		}

		if(value.isSelected){
			// Partie selectionnée: afficher ou pas le bouton suppr du joueur
			if(value.usr_in == "1" || vars.isAdmin){
				if(value.players.length > 1)	// affiche le btn uniquement si + que 1 joueur
					btncleartag = value.players[i-nj].userHasResa;
			}
			SetCrudJ(i, "Read");
		}else{
			// Partie non selectionnée
			SetCrudJ(i, "none");
			SetOtherReservation(i, true);
		}

		// On met à jour le switch du nombre de trous
		if(value.players[i-nj].nbTrous == 18){
			swnbt = true;
		}else{
			swnbt = false;
		}
		// On met à jour la checkbox des ressources
		if(value.players[i-nj].ressources[0] == "Chariot"){
			cbres = true;
		}else{
			cbres = false;
		}

		// On effectue la mise à jour du slot joueur
		Change_PlayerDiv(i,			// Numero du slot
			false,					// Div joueur entiere
			false, strname,			// joueur name, et name
			value.players[i-nj].id,	// id_user
			false, swnbt,			// nbTrousJ et check 18
			false, cbres,			// Chariot et check
			false, false,			// Visitor et check
			false, false			// Invited et check
		)
		SetBtnClear(i, false, btncleartag);
		
		// Incremente le slot courant du joueur
		joueurIdx++;
	}
	
	return joueurIdx;
}	// createPlayerDiv

function setFormMode(mode,isUserIn){
	isUserIn = defaultFor(isUserIn, false);	// Le joueur est il dans la partie active

	$("#reserver_button").hide();
	$("#edit_button").hide();
	$("#add_new_button").hide();
	$("#update_button").hide();
	$("#delete_button").hide();

	switch(mode){
	case "Create":
		console.log("\t\tSet CRUD Mode: ", "Create")
		// permet de creer une nouvelle partie sur un slot vide ou sur ajout de partie
		$("#crud_mode").val("Create");
		$("#reserver_button").show();
		break;
	case "Read":
		console.log("\t\tSet CRUD Mode: ", "Read")
		// Affiche les parties d'un slot horaire
		// 3 config: user / admin / defaut
		$("#crud_mode").val("Read");
		if(isUserIn){
			$("#edit_button").show();
			$("#delete_button").show();
		}else{
			$("#add_new_button").show();
		}
		if(vars.isAdmin){
			$("#edit_button").show();
			$("#add_new_button").show();
			$("#delete_button").show();
		}
		break;
	case "Update":
		console.log("\t\tSet CRUD Mode: ", "Update")
		// permet de mettre à jour une partie déjà presente
		$("#crud_mode").val("udpate");
		$("#update_button").show();
		$("#delete_button").show();
		break;
	default:
		// n'est jamais utilisé
		break;
	}
}	// setFormMode

function setDetailFormMode(mode){
	switch(mode){
	case "add":
		// permet de creer une nouvelle partie sur un slot vide
		$("#crud_mode").val("add");
		$("#reserver_button").show();
		$("#add_new_button").hide();
		$("#update_button").hide();
		$("#delete_button").hide();
		break;
	case "add_me":
		// permet (de creer) d'ajouter une nouvelle partie sur le meme slot horaire
		$("#crud_mode").val("add");
		$("#reserver_button").hide();
		$("#add_new_button").show();
		$("#update_button").hide();
		if(vars.isAdmin)
			$("#delete_button").show();
		else
			$("#delete_button").hide();			
		$("#joueur1, #joueur2, #joueur3, #joueur4").prop("disabled", true);
		// $("#joueur1, #joueur2, #joueur3, #joueur4").addClass("disabled");
		break;
	case "update":
		// permet de mettre à jour une partie déjà presente
		$("#crud_mode").val("udpate");
		$("#reserver_button").hide();
		if(vars.isAdmin){
			$("#reserver_button").show();
			$("#add_new_button").show();
		}else
			$("#add_new_button").hide();
		$("#update_button").show();
		$("#delete_button").hide();
		break;
	case "delete":
		// permet de supprimer une partie presente
		$("#crud_mode").val("delete");
		$("#reserver_button").hide();
		if(vars.isAdmin)
			$("#add_new_button").show();
		else
			$("#add_new_button").hide();
		$("#update_button").hide();
		$("#delete_button").show();
		break;
	default:
		// n'est jamais utilisé
		$("#reserver_button").hide();
		$("#add_new_button").hide();
		$("#update_button").hide();
		$("#delete_button").hide();
		break;
	}
}	// setDetailFormMode

function reset_form(ev){
	console.log("reset_form ... ");
	$("#form")[0].reset();
	$("#id_resa_provi_aller").val("");
	$("#id_resa_provi_retour").val("");
	$("#id_reservation").val("");
	scheduler.updateEvent(ev.id);
	
	for (var i=1; i <= max_joueurs; i++){

		unvalidateSlotJ(i, true);

		SetUserInputOpt(i, true, 'Chercher un nom de membre ...', true);

		SetOtherReservation(i, false);

		SetBtnClear(i, false);

		if(vars.isAdmin){
			Change_PlayerDiv(i,	// Numero du slot
				true,			// Div joueur entiere
				true, "",		// joueur name, et name
				"",				// id_user
				true, true,		// nbTrousJ et check 18
				true, false,	// Chariot et check
				true, false,	// Visitor et check
				true, false		// Invited et check
			)
		}else{
			Change_PlayerDiv(i,	// Numero du slot
				true,			// Div joueur entiere
				true, "",		// joueur name, et name
				"",				// id_user
				true, true,		// nbTrousJ
				true, false,	// Chariot
				false, false,	// Visitor
				false, false	// Invited
			)
		}
	}
	setFormMode("Read")
}	// reset_form

function setRes(slot, value){
	value = defaultFor(value, null);

	$("#res_J" + slot).val(value);
}

function SetCrudJ(slot, mode){
	$("#crud_J" + slot).val(mode);
}

function SetOtherReservation(slot, enableOther){
	enableOther = defaultFor(enableOther, null);

	if(enableOther){
		console.log("SetOtherReservation slot ", slot, ": ", enableOther);
		$("#joueur" + slot).parent().parent().parent().addClass("other_reservation");
		$("#joueur" + slot).addClass("other_reservation");
	}else{
		$("#joueur" + slot).parent().parent().parent().removeClass("other_reservation");
		$("#joueur" + slot).removeClass("other_reservation");
	}
}

function SetBtnClear(slot, enableBtn, clearTag){
	enableBtn = defaultFor(enableBtn, null);
	clearTag = defaultFor(clearTag, null);

	if(enableBtn !== null){
		if(enableBtn)
			$("#btn_clear_user_" + slot).show();
		else
			$("#btn_clear_user_" + slot).hide();
	}
	if(clearTag !== null){
		if(clearTag)
			$("#btn_clear_user_" + slot).attr("tag",clearTag);
		else
			$("#btn_clear_user_" + slot).attr("tag","");
	}

}

function SetUserInputOpt(slot,isAutocomplete,placeHolder,getFocus){
	// Set default value if parameters is not defined: null => don't change
	isAutocomplete = defaultFor(isAutocomplete, null);
	placeHolder = defaultFor(placeHolder, null);

	if(isAutocomplete !== null)
		if(isAutocomplete)
			$("#joueur" + slot).autocomplete("enable");
		else
			$("#joueur" + slot).autocomplete("disable");
	if(placeHolder !== null)
		$("#joueur" + slot).prop("placeholder", placeHolder);
	if(getFocus)
		$("#joueur" + slot).focus();
}

function Change_PlayerDiv(slot,
	enabledDiv,
	enabledUser, nameUser,
	idUser,
	enabledNbHoleSwitch,valueNbHoleSwitch,
	enabledRes1,valueRes1,
	enabledVisitor,valueVisitor,
	enabledInvited,valueInvited)
{
	// Set default value if parameters is not defined: null => don't change
	enabledDiv = defaultFor(enabledDiv, null);
	enabledUser = defaultFor(enabledUser, null);
	nameUser = defaultFor(nameUser, null);
	idUser = defaultFor(idUser, null);
	enabledNbHoleSwitch = defaultFor(enabledNbHoleSwitch, null);
	valueNbHoleSwitch = defaultFor(valueNbHoleSwitch, null);
	enabledRes1 = defaultFor(enabledRes1, null);
	valueRes1 = defaultFor(valueRes1, null);
	enabledVisitor = defaultFor(enabledVisitor, null);
	valueVisitor = defaultFor(valueVisitor, null);
	enabledInvited = defaultFor(enabledInvited, null);
	valueInvited = defaultFor(valueInvited, null);

	if(!enabledDiv){
		enabledUser 		= false;
		enabledNbHoleSwitch	= false;
		enabledRes1			= false;
		enabledVisitor		= false;
		enabledInvited		= false;
	}

	if(idUser !== null)
		$("#id_J" + slot).val(idUser);

	if(enabledUser !== null)
		$("#joueur" + slot).prop("disabled", !enabledUser);

	if(nameUser !== null)
		$("#joueur" + slot).val(nameUser);

	if(enabledNbHoleSwitch !== null)
		$("#nbTrousJ" + slot).prop("disabled", !enabledNbHoleSwitch);
	if(valueNbHoleSwitch !== null){
		if(valueNbHoleSwitch){
			$("#nbTrousJ" + slot).prop("checked", valueNbHoleSwitch);
			$("#nb_trous_J" + slot).val(18);
		}else{
			$("#nbTrousJ" + slot).prop("checked", valueNbHoleSwitch);
			$("#nb_trous_J" + slot).val(9);
		}
	}

	if(enabledRes1 !== null)
		$("#Chariot_" + slot).prop("disabled", !enabledRes1);
	if(valueRes1 !== null)
		$("#Chariot_" + slot).prop("checked", valueRes1);

	if(enabledVisitor !== null)
		$("#joueur" + slot + "_visiteur").prop("disabled", !enabledVisitor);
	if(valueVisitor !== null)
		$("#joueur" + slot + "_visiteur").prop("checked", valueVisitor);
	if(enabledInvited !== null)
		$("#joueur" + slot + "_invite").prop("disabled", !enabledInvited);
	if(valueInvited !== null)
		$("#joueur" + slot + "_invite").prop("checked", valueVisitor);
}




/////////////////////////////////////////////////////////////////////////////////
// COMMON FUNCTIONS
/////////////////////////////////////////////////////////////////////////////////

function defaultFor(arg, val) {
	return typeof arg !== 'undefined' ? arg : val;
}	// Assign default value "val" to parameter "arg"

function CreateResaProvi(formdata){
	if($("#id_resa_provi_aller" ).val() != ""){	// il y a deja une resa provisoire on ne fait rien
		console.log("id_resa_provi_aller already exist:", $("#id_resa_provi_aller" ).val());
		return;
	}
	$("#event_type" ).val(2);	// event_type == 2 => resa provisoire
	$.ajax({	// requete ajax pour reserver provisoirement les slots horaires

		async: true,
		type: "POST",
		url: "/resajax/addprovi",
		dataType: "json",
		data:  formdata.serialize(),
		success: function( data ) {
			console.log("data:", data);
			if(data.valid == false){
				$("#isFormValid" ).val("false");
			}else{
				$("#isFormValid" ).val("true");
			}
			if(data.id_reservation_aller != null){
				$("#id_resa_provi_aller" ).val(data.id_reservation_aller);
			}
			if(data.id_reservation_retour != null){
				$("#id_resa_provi_retour" ).val(data.id_reservation_retour);
			}
		}	// success
	});	// ajax addprovi
}	// CreateResaProvi

function ReleaseResaProvi(formdata){
	if($("#id_resa_provi_aller" ).val() == ""){	// s'il n'y a pas de resa provisoire on ne fait rien
		return;
	}
	$.ajax({	// requete ajax pour supprimer les reservation provisoires
		async: true,
		type: "POST",
		url: "/resajax/cancelresaprovi",
		dataType: "json",
		data:  formdata.serialize(),
		// data:  $("#form .serialize").serialize(),
		success: function( data ) {
			console.log("cancelresaprovi:", data);
			$("#id_resa_provi_aller" ).val("");
			$("#id_resa_provi_retour" ).val("");
		}	// success
	});	// ajax cancelresaprovi
}	// ReleaseResaProvi
	
function validate_form(){
	if($("#id_J1").val() <= 0) {
		alert("La réservation doit contenir au moins le Joueur 1.");
		return false;
	}
	for(var i = 2; i <= max_joueurs; i++) {
		if($("#joueur" + i).val() != "" && ($("#id_J" + i).val() == "" || $("#id_J" + i).val() < 0)) {
			if(vars.isAdmin){
				alert("Il semble que le joueur " + i + " ne soit pas un membre. Veuillez cocher la case invité le cas échéant.");
				return false;
			}else{
				alert("Il semble que le joueur " + i + " ne soit pas un membre. Seul des membres peuvent être ajoutés");
				return false;
			}
		}
	}
	return true;
}	// validate_form

function update_joueurs_presents(){
	joueurs_presents_ = Array();
	joueurs_dans_partie = Array();
	for (var i = 1; i <= max_joueurs; i++){
		if($("#id_J"+i).val() !== ""){
			if(($("#crud_J"+i).val() == "Create")
			|| ($("#crud_J"+i).val() == "Update") ){
				joueurs_dans_partie.push($("#id_J"+i).val());	// nb de joueurs dans cette partie
			}
			joueurs_presents_.push($("#id_J"+i).val());			// nb total des joueurs sur ce slot horaire
		}
	}
	$("#nb_joueurs").val(joueurs_dans_partie.length);
	console.log("joueurs_presents: ", joueurs_presents_.length, " joueurs_dans_partie: ", joueurs_dans_partie.length);
}	// update_joueurs_presents
	
// function validate_name(object){
// 	// var idxj = parseInt($(object).context.id.substr($(object).context.id.length -1));
// 	var idxj = parseInt($(object)[0].id.substr($(object)[0].id.length -1));
// 	object.parent().parent().addClass("has-success");
// 	if (vars.thisAction == "calendrier"){
// 		console.log("\tvalidate_name #crud_J", idxj);
// 		$("#crud_J"+idxj).val("Create");
// 		update_joueurs_presents();
// 		// if($("#id_reservation").val() != ""){
// 		// 	setDetailFormMode("update");
// 		// }
// 	}
// }	// validate_name

function validateSlotJ(slot){
	changeSlotJ(slot,false);
}
function editSlotJ(slot, isModified){
	changeSlotJ(slot, true, isModified);
}
function changeSlotJ(slot, editmode, isModified){
	editmode = defaultFor(editmode, null);
	
	if (vars.thisAction == "calendrier"){
		console.log("\tvalidate_name #crud_J", slot, ": Create");
		$("#joueur" + slot).parent().parent().addClass("has-success");
		if(editmode)
			if(isModified)
				$("#crud_J" + slot).val("Modified");
			else
				$("#crud_J" + slot).val("Edit");
		else
			$("#crud_J" + slot).val("Create");
		
		// On update la demande de la ressource
		setRes(slot, $("#id_J" + slot).val() );
		
		update_joueurs_presents();
	}
}	// validate_name 

// function unvalidate_name(object){
// 	// var idxj = parseInt($(object).context.id.substr($(object).context.id.length -1));
// 	var idxj = parseInt($(object)[0].id.substr($(object)[0].id.length -1));
// 	// var idxj = parseInt(this.name.substr(this.name.length-1));
// 	if(parseInt($("#id_J" + idxj).val()) < 2)
// 		return;
// 	object.parent().parent().removeClass("has-success");
// 	if (vars.thisAction == "calendrier"){
// 		$("#crud_J"+idxj).val("none");
// 		update_joueurs_presents();
// 	}
// }	// unvalidate_name

function unvalidateSlotJ(index, force){
	if(parseInt($("#id_J" + index).val()) < 2 && !force)	// que pour les joueurs
		return;
	if (vars.thisAction == "calendrier"){
		console.log("\tunvalidate_name #crud_J", index, ": none");
		$("#joueur" + index).parent().parent().removeClass("has-success");
		$("#crud_J" + index).val("none");
		update_joueurs_presents();
	}
}	// unvalidate_name

function close_onClick_outside(){
	$(".dhx_cal_cover").click(function(){
		$("#annuler_button").trigger("click");
	});
}

/////////////////////////////////////////////////////////////////////////////////

function log(msg, color){
	var normal = false;
	if (color === undefined){
		normal = true;
		color = "black";
	}else{
		color = color;
	}
	// color = color || "black";
	bgc = "White";
	switch (color) {
		case "bold":	 color = color;			bgc = bgc;				break;
		case "success":  color = "Green";      bgc = "LimeGreen";       break;
		case "info":     color = "DodgerBlue"; bgc = "Turquoise";       break;
		case "error":    color = "Red";        bgc = "Black";           break;
		case "start":    color = "OliveDrab";  bgc = "PaleGreen";       break;
		case "warning":  color = "Tomato";     bgc = "Black";           break;
		case "end":      color = "Orchid";     bgc = "MediumVioletRed"; break;
		default: color = color;
	}


	if (normal || typeof msg == "object"){
		console.log(msg);
	} else if (typeof color == "object"){
		console.log("%c" + msg, "color: PowderBlue;font-weight:bold; background-color: RoyalBlue;");
		console.log(color);
	} else {
		console.log("%c" + msg, "color:" + color + ";font-weight:bold; background-color: " + bgc + ";");
	}
}
