<?php

//CONFIGURATION for SmartAdmin Menu UI

//////////////////////////////////////////////////////////
// MANU ADMIN											//
//////////////////////////////////////////////////////////
// $this->pages['superadmin'] = array(

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
				'pending' => array(
					'title' => 'Comptes à valider',
					'url' => '/admin/users/pending',
				),
				'disabled' => array(
					'title' => 'Membres désactivés',
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
				'resa-pending' => array(
					'title' => 'Demande de visiteurs',
					'url' => '/admin/resapending',
				),
				'today' => array(
					'title' => 'Départs du jour',
				),
			),// sub

		),// planning

		'settings' => array(
			'title' => 'Gestion du Club',
			'icon' => 'fa-cog',
			'sub' => array(
				'club' => array(
					'title' => 'Paramètres globaux',
					'url' => '/admin/settings/club',
				),
				'parcours' => array(
					'title' => 'Gestion du parcours',
					'url' => '/admin/settings/parcours',
				),
				'display' => array(
					'title' => "Paramètres d'affichage",
					'url' => '/admin/settings/display',
				),
			),//sub

		),// golf

	),// admin
);


?>