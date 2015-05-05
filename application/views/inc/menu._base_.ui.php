<?php

//CONFIGURATION for SmartAdmin Menu UI

//////////////////////////////////////////////////////////
// MENU BASE											//
//////////////////////////////////////////////////////////

return array(
			"egp" => array(
				"title" => "Tableau de bord",
				"url" => "/",
				"icon" => "fa-home"
			),
			"resa" => array(
				"title" => "Planning",
				// "url" => "/app/calendrier",
				"icon" => "fa-calendar txt-color-greenLight",
				"sub" => array(
					"calendrier" => array(
						"title" => "Planning des départs",
						"url" => '/app/calendrier'
					),
					"wizard" => array(
						"title" => "Assistant de réservation",
						"url" => '/app/wizard'
					),
				),
			),
		);
?>