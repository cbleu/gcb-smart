<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-04-28 10:34:41 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '=>' (T_DOUBLE_ARROW) ~ APPPATH/classes/Controller/EGP/Main.php [ 80 ] in file:line
2015-04-28 10:34:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-04-28 10:37:26 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '=>' (T_DOUBLE_ARROW) ~ APPPATH/classes/Controller/EGP/Main.php [ 85 ] in file:line
2015-04-28 10:37:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-04-28 10:40:29 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-04-28 10:43:37 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '"icon"' (T_CONSTANT_ENCAPSED_STRING), expecting ')' ~ APPPATH/classes/Controller/EGP/Main.php [ 66 ] in file:line
2015-04-28 10:43:37 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-04-28 10:59:24 --- EMERGENCY: Kohana_Exception [ 0 ]: A valid hash key must be set in your auth config. ~ MODPATH/auth/classes/Kohana/Auth.php [ 155 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/auth/classes/Kohana/Auth/File.php:40
2015-04-28 10:59:24 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/auth/classes/Kohana/Auth/File.php(40): Kohana_Auth->hash('admin')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/auth/classes/Kohana/Auth.php(92): Kohana_Auth_File->_login('contact@golf-bo...', 'admin', false)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(50): Kohana_Auth->login('contact@golf-bo...', 'admin')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_EGP_App->action_login()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/auth/classes/Kohana/Auth/File.php:40
2015-04-28 11:25:26 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: pageTitle ~ APPPATH/views/EGP/egp_template.php [ 56 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php:56
2015-04-28 11:25:26 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php(56): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 56, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php:56