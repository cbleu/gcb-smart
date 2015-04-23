<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-04-22 14:30:44 --- EMERGENCY: View_Exception [ 0 ]: The requested view public/user/info could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-04-22 14:30:44 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('public/user/inf...')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('public/user/inf...', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/EGP/App.php(92): Kohana_View::factory('public/user/inf...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_EGP_App->action_informations()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_EGP_App))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137