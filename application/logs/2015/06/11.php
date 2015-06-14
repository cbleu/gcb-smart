<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-06-11 00:14:12 --- EMERGENCY: Throwable_InvalidProperty_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Property description is either inaccessible or undefined. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 139 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/Connection.php:302
2015-06-11 00:14:12 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/Connection.php(302): Base_DB_ORM_Model->__set('description', 'Trac\xE9 normal [1...')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/MySQL/Connection/Standard.php(98): Base_DB_Connection::type_cast('Model_Leap_type...', Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Select/Proxy.php(331): Base_DB_MySQL_Connection_Standard->query('SELECT `type_pa...', 'Model_Leap_type...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Relation/BelongsTo.php(82): Base_DB_SQL_Select_Proxy->query('Model_Leap_type...')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Relation.php(81): Base_DB_ORM_Relation_BelongsTo->load()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(111): Base_DB_ORM_Relation->__get('result')
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(1067): Base_DB_ORM_Model->__get('type_parcours')
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#12 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/Connection.php:302
2015-06-11 16:00:36 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$valid' (T_VARIABLE), expecting ';' or '{' ~ APPPATH/classes/Controller/Golf/Resajax.php [ 771 ] in file:line
2015-06-11 16:00:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-11 16:00:36 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$valid' (T_VARIABLE), expecting ';' or '{' ~ APPPATH/classes/Controller/Golf/Resajax.php [ 771 ] in file:line
2015-06-11 16:00:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-11 16:00:40 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$valid' (T_VARIABLE), expecting ';' or '{' ~ APPPATH/classes/Controller/Golf/Resajax.php [ 771 ] in file:line
2015-06-11 16:00:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-11 16:00:40 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$valid' (T_VARIABLE), expecting ';' or '{' ~ APPPATH/classes/Controller/Golf/Resajax.php [ 771 ] in file:line
2015-06-11 16:00:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-11 16:00:48 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$valid' (T_VARIABLE), expecting ';' or '{' ~ APPPATH/classes/Controller/Golf/Resajax.php [ 771 ] in file:line
2015-06-11 16:00:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-11 16:00:48 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$valid' (T_VARIABLE), expecting ';' or '{' ~ APPPATH/classes/Controller/Golf/Resajax.php [ 771 ] in file:line
2015-06-11 16:00:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-11 16:01:00 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$valid' (T_VARIABLE), expecting ';' or '{' ~ APPPATH/classes/Controller/Golf/Resajax.php [ 771 ] in file:line
2015-06-11 16:01:00 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-11 16:01:00 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$valid' (T_VARIABLE), expecting ';' or '{' ~ APPPATH/classes/Controller/Golf/Resajax.php [ 771 ] in file:line
2015-06-11 16:01:00 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-11 18:13:22 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: childresa ~ APPPATH/classes/EGP/GameReservation.php [ 76 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:76
2015-06-11 18:13:22 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(76): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 76, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(477): EGP_GameReservation->loadEventResa('71459')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:76
2015-06-11 18:15:45 --- EMERGENCY: ErrorException [ 4096 ]: Argument 1 passed to Base_DB_ORM_Model::load() must be of the type array, integer given, called in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php on line 77 and defined ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 360 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:360
2015-06-11 18:15:45 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(360): Kohana_Core::error_handler(4096, 'Argument 1 pass...', '/Users/cesar/Do...', 360, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(77): Base_DB_ORM_Model->load(71460)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(477): EGP_GameReservation->loadEventResa('71459')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:360
2015-06-11 18:19:19 --- EMERGENCY: ErrorException [ 4096 ]: Argument 1 passed to Base_DB_ORM_Model::load() must be of the type array, integer given, called in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php on line 77 and defined ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 360 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:360
2015-06-11 18:19:19 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(360): Kohana_Core::error_handler(4096, 'Argument 1 pass...', '/Users/cesar/Do...', 360, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(77): Base_DB_ORM_Model->load(71460)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(477): EGP_GameReservation->loadEventResa('71459')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:360
2015-06-11 20:51:55 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined function getNbPlayerForSlot() ~ APPPATH/classes/EGP/GameReservation.php [ 959 ] in file:line
2015-06-11 20:51:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-11 20:54:42 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for EGP_GameReservation::getNbPlayerForSlot(), called in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php on line 959 and defined ~ APPPATH/classes/EGP/GameReservation.php [ 1074 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1074
2015-06-11 20:54:42 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1074): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/cesar/Do...', 1074, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(959): EGP_GameReservation->getNbPlayerForSlot('2015-06-12 07:0...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(796): EGP_GameReservation->UpdateReservation()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1074
2015-06-11 21:09:02 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:536
2015-06-11 21:09:24 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: colour ~ APPPATH/classes/Controller/Golf/Events.php [ 105 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:105
2015-06-11 21:09:24 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php(105): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 105, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Events->action_insert_ajax()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Events))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:105
2015-06-11 21:09:29 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:536
2015-06-11 21:09:42 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: colour ~ APPPATH/classes/Controller/Golf/Events.php [ 105 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:105
2015-06-11 21:09:42 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php(105): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 105, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Events->action_insert_ajax()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Events))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:105
2015-06-11 21:09:47 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:536
2015-06-11 21:09:57 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: colour ~ APPPATH/classes/Controller/Golf/Events.php [ 105 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:105
2015-06-11 21:09:57 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php(105): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 105, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Events->action_insert_ajax()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Events))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:105
2015-06-11 21:15:00 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:536
2015-06-11 21:15:09 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: colour ~ APPPATH/classes/Controller/Golf/Events.php [ 105 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:105
2015-06-11 21:15:09 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php(105): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 105, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Events->action_insert_ajax()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Events))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:105
2015-06-11 21:15:14 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:536
2015-06-11 21:15:32 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: colour ~ APPPATH/classes/Controller/Golf/Events.php [ 105 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:105
2015-06-11 21:15:32 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php(105): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 105, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Events->action_insert_ajax()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Events))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:105
2015-06-11 21:15:36 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:536
2015-06-11 21:15:52 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: colour ~ APPPATH/classes/Controller/Golf/Events.php [ 105 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:105
2015-06-11 21:15:52 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php(105): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 105, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Events->action_insert_ajax()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Events))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:105