<?php

//CONFIGURATION for SmartAdmin Menu UI

//////////////////////////////////////////////////////////
// MANU ADMIN											//
//////////////////////////////////////////////////////////

return array(
	'title' => 'Administration',
	'icon' => 'fa-folder-open',
	'sub' => array(
		'dashboard' => array(
			'title' => 'Dashboard',
			'icon' => 'fa-tachometer',
			'url' => '/admin',
		),

		'users' => array(
			'title' => 'Gestion des usagers',
			'icon' => 'fa-users',
			'sub' => array(
				'members' => array(
					'title' => 'Listing des membres',
					// 'icon' => 'fa-users',
					'url' => '/admin/users/',
				),
				'disabled' => array(
					'title' => 'Membres désactivés',
					// 'icon' => 'fa-users',
					'url' => '/admin/users/disabled',
				),
				'roles-list' => array(
					'title' => 'Listing des roles',
					'url' => '/admin/roles',
				),
				'roles-set' => array(
					'title' => 'Affectation des roles',
					'url' => '/admin/rolesusers',
				),
			),//sub

		),//users

		'planning' => array(
			'title' => 'Gestion du planning',
			'icon' => 'fa-calendar',
			'sub' => array(
				'events' => array(
					'title' => 'Evenements',
				),
				'visiteurs' => array(
					'title' => 'Demande de visiteurs',
				),
				'today' => array(
					'title' => 'Départs du jour',
				),
			),// sub

		),// planning

		'golf' => array(
			'title' => 'Gestion du Golf',
			'icon' => 'fa-cog',
			'sub' => array(
				'settings' => array(
					'title' => 'Paramètres globaux',
				),
				'parcours' => array(
					'title' => 'Gestion du parcours',
				),
				'display' => array(
					'title' => 'Affichage',
				),
			),//sub

		),// golf

	),// admin
);

?>