<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-07-14 08:25:35 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-14 09:23:43 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-14 09:23:44 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-14 09:23:46 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-14 09:24:19 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-14 09:25:39 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-14 09:38:04 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-14 09:41:10 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: thisUserFullName ~ APPPATH/views/fragments/calendrier.php [ 125 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:125
2015-07-14 09:41:10 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php(125): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 125, Array)
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
#14 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:125
2015-07-14 09:41:16 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: thisUserFullName ~ APPPATH/views/fragments/calendrier.php [ 125 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:125
2015-07-14 09:41:16 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php(125): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 125, Array)
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
#14 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:125
2015-07-14 09:42:12 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: thisUserFullName ~ APPPATH/views/fragments/calendrier.php [ 147 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:147
2015-07-14 09:42:12 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php(147): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 147, Array)
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
#14 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:147
2015-07-14 09:42:17 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: thisUserFullName ~ APPPATH/views/fragments/calendrier.php [ 147 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:147
2015-07-14 09:42:17 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php(147): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 147, Array)
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
#14 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:147
2015-07-14 10:04:38 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-14 10:13:10 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-14 22:58:57 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-14 23:07:01 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-14 23:08:27 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537