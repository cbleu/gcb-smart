<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-04-27 01:48:25 --- EMERGENCY: ErrorException [ 2 ]: Creating default object from empty value ~ APPPATH/classes/Controller/EGP/Resajax.php [ 1392 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php:1392
2015-04-27 01:48:25 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php(1392): Kohana_Core::error_handler(2, 'Creating defaul...', '/Users/cesar/Do...', 1392, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_EGP_ResAjax->action_updatepass()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php:1392
2015-04-27 17:09:20 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: msgs ~ APPPATH/views/EGP/egp_template.php [ 43 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php:43
2015-04-27 17:09:20 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php(43): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 43, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php:43
2015-04-27 17:18:28 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: msgs ~ APPPATH/views/EGP/egp_template.php [ 43 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php:43
2015-04-27 17:18:28 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php(43): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 43, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php:43
2015-04-27 17:18:31 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: msgs ~ APPPATH/views/EGP/egp_template.php [ 43 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php:43
2015-04-27 17:18:31 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php(43): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 43, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php:43
2015-04-27 17:18:33 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: msgs ~ APPPATH/views/EGP/egp_template.php [ 43 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php:43
2015-04-27 17:18:33 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php(43): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 43, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php:43
2015-04-27 17:18:53 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/EGP/egp_template.php [ 65 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php:65
2015-04-27 17:18:53 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php(65): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 65, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php:65
2015-04-27 18:11:34 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: type ~ APPPATH/views/EGP/egp_template.php [ 75 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php:75
2015-04-27 18:11:34 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php(75): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 75, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/EGP/egp_template.php:75
2015-04-27 18:30:57 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '.', expecting variable (T_VARIABLE) or '$' ~ APPPATH/views/EGP/egp_template.php [ 66 ] in file:line
2015-04-27 18:30:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-04-27 20:34:10 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '}' ~ MODPATH/notify/views/notify/bootstrap.php [ 13 ] in file:line
2015-04-27 20:34:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-04-27 20:34:28 --- EMERGENCY: ErrorException [ 1 ]: Class 'SmartUI' not found ~ MODPATH/notify/views/notify/bootstrap.php [ 8 ] in file:line
2015-04-27 20:34:28 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-04-27 21:02:45 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'endforeach' (T_ENDFOREACH) ~ MODPATH/notify/views/notify/bootstrap.php [ 25 ] in file:line
2015-04-27 21:02:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-04-27 21:19:56 --- EMERGENCY: ErrorException [ 8 ]: Use of undefined constant info - assumed 'info' ~ APPPATH/classes/Controller/EGP/App.php [ 97 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php:97
2015-04-27 21:19:56 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(97): Kohana_Core::error_handler(8, 'Use of undefine...', '/Users/cesar/Do...', 97, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_EGP_App->action_informations()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php:97