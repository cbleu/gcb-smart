<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-08-06 09:36:38 --- EMERGENCY: ErrorException [ 8 ]: Use of undefined constant php - assumed 'php' ~ APPPATH/views/inc/header.php [ 227 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:227
2015-08-06 09:36:38 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php(227): Kohana_Core::error_handler(8, 'Use of undefine...', '/Users/cesar/Do...', 227, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(25): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:227
2015-08-06 12:55:32 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '');' (T_CONSTANT_ENCAPSED_STRING) ~ APPPATH/classes/Controller/Golf/App.php [ 462 ] in file:line
2015-08-06 12:55:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-06 14:42:19 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'isMobile' (T_STRING), expecting variable (T_VARIABLE) ~ APPPATH/classes/Controller/Golf/App.php [ 11 ] in file:line
2015-08-06 14:42:19 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-06 14:51:33 --- EMERGENCY: ErrorException [ 2 ]: include_once(/Users/cesar/Documents/DEV/GIT/gcb-smart): failed to open stream: No such file or directory ~ MODPATH/kohana-device-master/classes/Kohana/Device.php [ 9 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/kohana-device-master/classes/Kohana/Device.php:9
2015-08-06 14:51:33 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/kohana-device-master/classes/Kohana/Device.php(9): Kohana_Core::error_handler(2, 'include_once(/U...', '/Users/cesar/Do...', 9, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/kohana-device-master/classes/Kohana/Device.php(9): Kohana_Device::__construct()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(46): Kohana_Device->__construct()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_App->before()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/kohana-device-master/classes/Kohana/Device.php:9
2015-08-06 15:28:31 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'if' (T_IF) ~ APPPATH/views/fragments/calendrier.php [ 43 ] in file:line
2015-08-06 15:28:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-06 15:28:43 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'if' (T_IF) ~ APPPATH/views/fragments/calendrier.php [ 43 ] in file:line
2015-08-06 15:28:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-06 15:28:44 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'if' (T_IF) ~ APPPATH/views/fragments/calendrier.php [ 43 ] in file:line
2015-08-06 15:28:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-06 15:29:03 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'if' (T_IF) ~ APPPATH/views/fragments/calendrier.php [ 43 ] in file:line
2015-08-06 15:29:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-06 15:29:04 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'if' (T_IF) ~ APPPATH/views/fragments/calendrier.php [ 43 ] in file:line
2015-08-06 15:29:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-06 16:08:59 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : La date à laquelle vous souhaitez réserver est passée. in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:114
2015-08-06 16:09:06 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : La date à laquelle vous souhaitez réserver est passée. in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:114
2015-08-06 16:10:25 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:476
2015-08-06 16:10:25 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:205