<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-04-26 16:51:34 --- EMERGENCY: View_Exception [ 0 ]: The requested view public/user/valide could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 16:51:34 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('public/user/val...')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('public/user/val...', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(151): Kohana_View::factory('public/user/val...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_EGP_App->action_updateuser()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 19:38:09 --- EMERGENCY: ErrorException [ 2 ]: Creating default object from empty value ~ APPPATH/classes/Controller/EGP/Resajax.php [ 1407 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php:1407
2015-04-26 19:38:09 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php(1407): Kohana_Core::error_handler(2, 'Creating defaul...', '/Users/cesar/Do...', 1407, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_EGP_ResAjax->action_updateuser()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php:1407
2015-04-26 20:22:44 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: email ~ APPPATH/classes/Controller/EGP/Resajax.php [ 1402 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php:1402
2015-04-26 20:22:44 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php(1402): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 1402, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_EGP_ResAjax->action_updateuser()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php:1402
2015-04-26 20:26:53 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: email ~ APPPATH/classes/Controller/EGP/Resajax.php [ 1402 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php:1402
2015-04-26 20:26:53 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php(1402): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 1402, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_EGP_ResAjax->action_updateuser()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php:1402
2015-04-26 20:30:30 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: email ~ APPPATH/classes/Controller/EGP/Resajax.php [ 1402 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php:1402
2015-04-26 20:30:30 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php(1402): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 1402, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_EGP_ResAjax->action_updateuser()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php:1402
2015-04-26 20:31:09 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: email ~ APPPATH/classes/Controller/EGP/Resajax.php [ 1402 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php:1402
2015-04-26 20:31:09 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php(1402): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 1402, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_EGP_ResAjax->action_updateuser()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php:1402
2015-04-26 20:34:47 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: email ~ APPPATH/classes/Controller/EGP/Resajax.php [ 1402 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php:1402
2015-04-26 20:34:47 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php(1402): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 1402, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_EGP_ResAjax->action_updateuser()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Resajax.php:1402
2015-04-26 22:59:11 --- EMERGENCY: View_Exception [ 0 ]: The requested view  could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:11 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Main.php(37): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(16): Controller_EGP_Main->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_EGP_App->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:27 --- EMERGENCY: View_Exception [ 0 ]: The requested view  could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:27 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Main.php(37): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(16): Controller_EGP_Main->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_EGP_App->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:28 --- EMERGENCY: View_Exception [ 0 ]: The requested view  could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:28 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Main.php(37): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(16): Controller_EGP_Main->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_EGP_App->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:29 --- EMERGENCY: View_Exception [ 0 ]: The requested view  could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:29 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Main.php(37): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(16): Controller_EGP_Main->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_EGP_App->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:30 --- EMERGENCY: View_Exception [ 0 ]: The requested view  could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:30 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Main.php(37): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(16): Controller_EGP_Main->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_EGP_App->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:31 --- EMERGENCY: View_Exception [ 0 ]: The requested view  could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:31 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Main.php(37): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(16): Controller_EGP_Main->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_EGP_App->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:32 --- EMERGENCY: View_Exception [ 0 ]: The requested view  could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:32 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Main.php(37): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(16): Controller_EGP_Main->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_EGP_App->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:33 --- EMERGENCY: View_Exception [ 0 ]: The requested view  could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:33 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Main.php(37): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(16): Controller_EGP_Main->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_EGP_App->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:33 --- EMERGENCY: View_Exception [ 0 ]: The requested view  could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:33 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Main.php(37): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(16): Controller_EGP_Main->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_EGP_App->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:38 --- EMERGENCY: View_Exception [ 0 ]: The requested view  could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:38 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Main.php(37): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(16): Controller_EGP_Main->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_EGP_App->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:44 --- EMERGENCY: View_Exception [ 0 ]: The requested view  could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 22:59:44 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Main.php(37): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(16): Controller_EGP_Main->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_EGP_App->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 23:00:50 --- EMERGENCY: View_Exception [ 0 ]: The requested view  could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 23:00:50 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/Main.php(37): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(16): Controller_EGP_Main->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_EGP_App->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-26 23:04:48 --- EMERGENCY: ErrorException [ 1 ]: Class 'Notify' not found ~ APPPATH/classes/Controller/Account/Auth.php [ 44 ] in file:line
2015-04-26 23:04:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-04-26 23:05:11 --- EMERGENCY: ErrorException [ 1 ]: Class 'Notify' not found ~ APPPATH/classes/Controller/Account/Auth.php [ 44 ] in file:line
2015-04-26 23:05:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-04-26 23:05:19 --- EMERGENCY: ErrorException [ 1 ]: Class 'Notify' not found ~ APPPATH/classes/Controller/Account/Auth.php [ 44 ] in file:line
2015-04-26 23:05:19 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-04-26 23:05:46 --- EMERGENCY: ErrorException [ 1 ]: Class 'Notify' not found ~ APPPATH/classes/Controller/Account/Auth.php [ 44 ] in file:line
2015-04-26 23:05:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line