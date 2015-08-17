<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-08-13 12:07:10 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: check_result ~ APPPATH/classes/EGP/GameReservation.php [ 701 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:701
2015-08-13 12:07:10 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(701): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 701, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(762): EGP_GameReservation->MakeReservation('1')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:701
2015-08-13 12:14:36 --- EMERGENCY: Throwable_Marshalling_Exception [ 0 ]: Message: Failed to load record from database. Reason: Unable to match primary key with a record. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 372 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php:94
2015-08-13 12:14:36 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(94): Base_DB_ORM_Model->load()
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(263): Base_DB_ORM::model('reservation', Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(493): EGP_GameReservation->InitResaByLoading(NULL)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php:94
2015-08-13 15:00:30 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : La date à laquelle vous souhaitez réserver est passée. in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:141
2015-08-13 15:03:38 --- EMERGENCY: Throwable_Marshalling_Exception [ 0 ]: Message: Failed to load record from database. Reason: Unable to match primary key with a record. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 372 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php:94
2015-08-13 15:03:38 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(94): Base_DB_ORM_Model->load()
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(263): Base_DB_ORM::model('reservation', Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(493): EGP_GameReservation->InitResaByLoading(NULL)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php:94
2015-08-13 15:32:41 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$pl' (T_VARIABLE), expecting '{' ~ APPPATH/classes/EGP/GameReservation.php [ 195 ] in file:line
2015-08-13 15:32:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-13 15:32:49 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$pl' (T_VARIABLE), expecting '{' ~ APPPATH/classes/EGP/GameReservation.php [ 195 ] in file:line
2015-08-13 15:32:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-13 15:33:08 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$pl' (T_VARIABLE), expecting '{' ~ APPPATH/classes/EGP/GameReservation.php [ 195 ] in file:line
2015-08-13 15:33:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-13 15:34:04 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH/classes/EGP/GameReservation.php [ 1891 ] in file:line
2015-08-13 15:34:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-13 15:34:14 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH/classes/EGP/GameReservation.php [ 1891 ] in file:line
2015-08-13 15:34:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-13 21:26:11 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ''event_id'' (T_CONSTANT_ENCAPSED_STRING), expecting ')' ~ APPPATH/classes/Controller/Golf/Resajax.php [ 916 ] in file:line
2015-08-13 21:26:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-13 21:26:12 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ''event_id'' (T_CONSTANT_ENCAPSED_STRING), expecting ')' ~ APPPATH/classes/Controller/Golf/Resajax.php [ 916 ] in file:line
2015-08-13 21:26:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-13 21:26:12 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ''event_id'' (T_CONSTANT_ENCAPSED_STRING), expecting ')' ~ APPPATH/classes/Controller/Golf/Resajax.php [ 916 ] in file:line
2015-08-13 21:26:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-13 21:26:16 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ''event_id'' (T_CONSTANT_ENCAPSED_STRING), expecting ')' ~ APPPATH/classes/Controller/Golf/Resajax.php [ 916 ] in file:line
2015-08-13 21:26:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-13 21:26:16 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ''event_id'' (T_CONSTANT_ENCAPSED_STRING), expecting ')' ~ APPPATH/classes/Controller/Golf/Resajax.php [ 916 ] in file:line
2015-08-13 21:26:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line