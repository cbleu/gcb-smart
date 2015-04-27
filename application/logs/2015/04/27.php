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