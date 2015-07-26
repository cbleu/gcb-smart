<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-07-16 22:19:57 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : La date à laquelle vous souhaitez réserver est passée. in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:510
2015-07-16 22:20:04 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: thisUserFullName ~ APPPATH/views/fragments/calendrier.php [ 148 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:148
2015-07-16 22:20:04 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php(148): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 148, Array)
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
#14 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:148
2015-07-16 22:21:31 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: thisUserFullName ~ APPPATH/views/fragments/calendrier.php [ 148 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:148
2015-07-16 22:21:31 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php(148): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 148, Array)
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
#14 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:148
2015-07-16 22:36:59 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Controller/Golf/Resajax.php [ 774 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:774
2015-07-16 22:36:59 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(774): Kohana_Core::error_handler(8, 'Array to string...', '/Users/cesar/Do...', 774, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:774
2015-07-16 22:41:59 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Controller/Golf/Resajax.php [ 774 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:774
2015-07-16 22:41:59 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(774): Kohana_Core::error_handler(8, 'Array to string...', '/Users/cesar/Do...', 774, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:774
2015-07-16 22:42:46 --- EMERGENCY: ErrorException [ 1 ]: Unsupported operand types ~ APPPATH/classes/Controller/Golf/Resajax.php [ 774 ] in file:line
2015-07-16 22:42:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-16 22:43:05 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Controller/Golf/Resajax.php [ 774 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:774
2015-07-16 22:43:05 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(774): Kohana_Core::error_handler(8, 'Array to string...', '/Users/cesar/Do...', 774, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:774