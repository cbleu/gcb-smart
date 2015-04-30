<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-04-30 17:29:29 --- EMERGENCY: View_Exception [ 0 ]: The requested view Golf/egp_template could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-30 17:29:29 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('Golf/egp_templa...')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('Golf/egp_templa...', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('Golf/egp_templa...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(31): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Main.php(38): Controller_Oscrudc->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(16): Controller_Golf_Main->before()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_App->before()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-30 17:47:36 --- EMERGENCY: View_Exception [ 0 ]: The requested view /templates/GCP/home could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-30 17:47:36 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('/templates/GCP/...')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('/templates/GCP/...', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(38): Kohana_View::factory('/templates/GCP/...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_App->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-30 17:48:10 --- EMERGENCY: View_Exception [ 0 ]: The requested view /fragments/calendrier could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-30 17:48:10 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('/fragments/cale...')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('/fragments/cale...', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(386): Kohana_View::factory('/fragments/cale...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_App->action_calendrier()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137