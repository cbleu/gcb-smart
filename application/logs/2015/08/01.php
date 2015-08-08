<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-08-01 00:09:28 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function format() on integer ~ APPPATH/classes/EGP/GameSlot.php [ 51 ] in file:line
2015-08-01 00:09:28 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-01 00:13:07 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method EGP_GameReservation::LoadResa() ~ APPPATH/classes/Controller/Golf/Resajax.php [ 509 ] in file:line
2015-08-01 00:13:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-01 00:14:10 --- EMERGENCY: Exception [ 0 ]: DateTime::__construct() expects parameter 1 to be string, object given ~ APPPATH/classes/EGP/GameSlot.php [ 46 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:46
2015-08-01 00:14:10 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php(46): DateTime->__construct(Object(DateTime))
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(547): EGP_GameSlot->setParcours(2, Object(DateTime))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(158): EGP_GameReservation->LoadParcoursToSlot()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(780): EGP_GameReservation->InitResa(Array)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:46
2015-08-01 00:41:15 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: EGP_GameReservation::$SlotAller ~ APPPATH/classes/EGP/GameReservation.php [ 1022 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1022
2015-08-01 00:41:15 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1022): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/cesar/Do...', 1022, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(799): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1022
2015-08-01 00:43:07 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: EGP_GameReservation::$SlotAller ~ APPPATH/classes/EGP/GameReservation.php [ 1022 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1022
2015-08-01 00:43:07 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1022): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/cesar/Do...', 1022, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(799): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1022
2015-08-01 00:43:49 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: id_reservation_aller ~ APPPATH/classes/EGP/GameReservation.php [ 1160 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1160
2015-08-01 00:43:49 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1160): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 1160, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(799): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1160
2015-08-01 00:50:02 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: id_reservation_aller ~ APPPATH/classes/EGP/GameReservation.php [ 1160 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1160
2015-08-01 00:50:02 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1160): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 1160, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(799): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1160
2015-08-01 11:45:27 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: EGP_GameSlot::$nbPlayers ~ APPPATH/classes/EGP/GameReservation.php [ 1139 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1139
2015-08-01 11:45:27 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1139): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/cesar/Do...', 1139, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(799): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1139
2015-08-01 11:56:44 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '++' (T_INC), expecting ')' ~ APPPATH/classes/EGP/GameSlot.php [ 86 ] in file:line
2015-08-01 11:56:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-01 11:56:49 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '++' (T_INC), expecting ')' ~ APPPATH/classes/EGP/GameSlot.php [ 86 ] in file:line
2015-08-01 11:56:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-01 11:56:49 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '++' (T_INC), expecting ')' ~ APPPATH/classes/EGP/GameSlot.php [ 86 ] in file:line
2015-08-01 11:56:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-01 11:57:30 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '++' (T_INC), expecting ')' ~ APPPATH/classes/EGP/GameSlot.php [ 86 ] in file:line
2015-08-01 11:57:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-01 11:57:30 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '++' (T_INC), expecting ')' ~ APPPATH/classes/EGP/GameSlot.php [ 86 ] in file:line
2015-08-01 11:57:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-01 12:00:02 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: EGP_GameSlot::$nbPlayers ~ APPPATH/classes/EGP/GameReservation.php [ 1142 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1142
2015-08-01 12:00:02 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1142): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/cesar/Do...', 1142, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(799): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1142
2015-08-01 12:25:50 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method EGP_GameSlot::removePlayers() ~ APPPATH/classes/EGP/GameReservation.php [ 1140 ] in file:line
2015-08-01 12:25:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-01 12:58:15 --- EMERGENCY: ErrorException [ 8 ]: Object of class EGP_GamePlayer could not be converted to int ~ APPPATH/classes/EGP/GameSlot.php [ 82 ] in file:line
2015-08-01 12:58:15 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'Object of class...', '/Users/cesar/Do...', 82, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php(82): array_search(504, Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1154): EGP_GameSlot->removePlayer(504)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(799): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in file:line
2015-08-01 13:13:52 --- EMERGENCY: ErrorException [ 8 ]: Use of undefined constant i - assumed 'i' ~ APPPATH/classes/EGP/GameSlot.php [ 87 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:87
2015-08-01 13:13:52 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php(87): Kohana_Core::error_handler(8, 'Use of undefine...', '/Users/cesar/Do...', 87, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1149): EGP_GameSlot->removePlayer(818)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(799): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:87
2015-08-01 13:14:27 --- EMERGENCY: Throwable_Marshalling_Exception [ 0 ]: Message: Failed to load record from database. Reason: Unable to match primary key with a record. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 372 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:213
2015-08-01 13:14:27 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(213): Base_DB_ORM_Model->load()
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(483): EGP_GameReservation->InitResaByLoading('73314')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:213
2015-08-01 13:14:54 --- EMERGENCY: Throwable_Marshalling_Exception [ 0 ]: Message: Failed to load record from database. Reason: Unable to match primary key with a record. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 372 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:213
2015-08-01 13:14:54 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(213): Base_DB_ORM_Model->load()
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(509): EGP_GameReservation->InitResaByLoading('73314')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:213
2015-08-01 14:24:25 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '{' ~ APPPATH/classes/EGP/GameReservation.php [ 1144 ] in file:line
2015-08-01 14:24:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-01 14:24:25 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '{' ~ APPPATH/classes/EGP/GameReservation.php [ 1144 ] in file:line
2015-08-01 14:24:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-01 14:28:42 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function format() on null ~ APPPATH/classes/EGP/GameReservation.php [ 1662 ] in file:line
2015-08-01 14:28:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-01 14:36:09 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: aller ~ APPPATH/classes/EGP/GameReservation.php [ 1034 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1034
2015-08-01 14:36:09 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1034): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 1034, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(799): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1034
2015-08-01 15:16:07 --- EMERGENCY: Throwable_Marshalling_Exception [ 0 ]: Message: Failed to load record from database. Reason: Unable to match primary key with a record. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 372 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:213
2015-08-01 15:16:07 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(213): Base_DB_ORM_Model->load()
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(483): EGP_GameReservation->InitResaByLoading('73339')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:213
2015-08-01 15:43:43 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ APPPATH/classes/EGP/GameReservation.php [ 964 ] in file:line
2015-08-01 15:43:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-01 15:43:43 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ APPPATH/classes/EGP/GameReservation.php [ 964 ] in file:line
2015-08-01 15:43:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-01 15:44:47 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: stdClass::$nbTrous ~ APPPATH/classes/EGP/GameReservation.php [ 335 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:335
2015-08-01 15:44:47 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(335): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/cesar/Do...', 335, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(483): EGP_GameReservation->InitResaByLoading('73176')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:335
2015-08-01 15:47:23 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: stdClass::$nbTrous ~ APPPATH/classes/EGP/GameReservation.php [ 335 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:335
2015-08-01 15:47:23 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(335): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/cesar/Do...', 335, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(483): EGP_GameReservation->InitResaByLoading('73176')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:335
2015-08-01 15:49:21 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: stdClass::$nbTrous ~ APPPATH/classes/EGP/GameReservation.php [ 335 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:335
2015-08-01 15:49:21 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(335): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/cesar/Do...', 335, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(483): EGP_GameReservation->InitResaByLoading('73196')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:335
2015-08-01 15:50:26 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: stdClass::$nbTrous ~ APPPATH/classes/EGP/GameReservation.php [ 334 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:334
2015-08-01 15:50:26 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(334): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/cesar/Do...', 334, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(483): EGP_GameReservation->InitResaByLoading('73176')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:334
2015-08-01 16:20:53 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : La date à laquelle vous souhaitez réserver est passée. in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:395
2015-08-01 16:20:56 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: tmpresa ~ APPPATH/classes/Controller/Golf/Resajax.php [ 513 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:513
2015-08-01 16:20:56 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(513): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 513, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:513
2015-08-01 16:35:42 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : La date à laquelle vous souhaitez réserver est passée. in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:395
2015-08-01 17:00:03 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : La date à laquelle vous souhaitez réserver est passée. in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:395
2015-08-01 20:49:56 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/EGP/GameReservation.php [ 1088 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1088
2015-08-01 20:49:56 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1088): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/cesar/Do...', 1088, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(808): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1088
2015-08-01 20:53:08 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/EGP/GameReservation.php [ 1088 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1088
2015-08-01 20:53:08 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1088): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/cesar/Do...', 1088, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(808): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1088
2015-08-01 20:53:29 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/EGP/GameReservation.php [ 1088 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1088
2015-08-01 20:53:29 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1088): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/cesar/Do...', 1088, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(808): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1088
2015-08-01 20:55:13 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/EGP/GameReservation.php [ 1088 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1088
2015-08-01 20:55:13 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1088): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/cesar/Do...', 1088, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(808): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1088
2015-08-01 20:56:33 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/EGP/GameReservation.php [ 1088 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1088
2015-08-01 20:56:33 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1088): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/cesar/Do...', 1088, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(808): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:1088
2015-08-01 20:57:22 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/EGP/GameSlot.php [ 87 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:87
2015-08-01 20:57:22 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php(87): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/cesar/Do...', 87, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(1213): EGP_GameSlot->removePlayer(556)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(808): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:87
2015-08-01 20:59:46 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '{' ~ APPPATH/classes/EGP/GameSlot.php [ 88 ] in file:line
2015-08-01 20:59:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-01 20:59:46 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '{' ~ APPPATH/classes/EGP/GameSlot.php [ 88 ] in file:line
2015-08-01 20:59:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-08-01 21:00:26 --- EMERGENCY: Throwable_Marshalling_Exception [ 0 ]: Message: Failed to load record from database. Reason: Unable to match primary key with a record. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 372 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php:94
2015-08-01 21:00:26 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(94): Base_DB_ORM_Model->load()
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php(44): Base_DB_ORM::model('type_parcours', Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php(34): EGP_GameSlot->setParcours(0, NULL)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(215): EGP_GameSlot->setSlot(Object(Model_Leap_Reservation), 2)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(483): EGP_GameReservation->InitResaByLoading('73474')
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php:94