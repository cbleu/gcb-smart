<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-08-08 17:07:38 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '?>' ~ APPPATH/views/fragments/calendrier.php [ 205 ] in file:line
2015-08-08 17:07:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-08 17:07:59 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: user_value ~ APPPATH/views/fragments/calendrier.php [ 223 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:223
2015-08-08 17:07:59 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php(223): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 223, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_View->__toString()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:223
2015-08-08 17:31:00 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '?>' ~ APPPATH/views/fragments/calendrier.php [ 171 ] in file:line
2015-08-08 17:31:00 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-08 17:31:09 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '";"' (T_CONSTANT_ENCAPSED_STRING) ~ APPPATH/views/fragments/calendrier.php [ 171 ] in file:line
2015-08-08 17:31:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-08 17:40:44 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : La date à laquelle vous souhaitez réserver est passée. in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:114