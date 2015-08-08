<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-07-31 00:12:15 --- EMERGENCY: ErrorException [ 1 ]: Cannot use object of type EGP_GameSlot as array ~ APPPATH/classes/EGP/GameReservation.php [ 676 ] in file:line
2015-07-31 00:12:15 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 08:53:56 --- EMERGENCY: ErrorException [ 1 ]: Cannot break/continue 1 level ~ APPPATH/classes/EGP/GameReservation.php [ 1283 ] in file:line
2015-07-31 08:53:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 08:57:44 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/EGP/GameReservation.php [ 815 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:815
2015-07-31 08:57:44 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(815): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/cesar/Do...', 815, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(799): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:815
2015-07-31 09:15:03 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/EGP/GameReservation.php [ 815 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:815
2015-07-31 09:15:03 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(815): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/cesar/Do...', 815, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(799): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:815
2015-07-31 09:15:56 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/EGP/GameReservation.php [ 818 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:818
2015-07-31 09:15:56 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(818): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/cesar/Do...', 818, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(799): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:818
2015-07-31 09:18:49 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/EGP/GameReservation.php [ 818 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:818
2015-07-31 09:18:49 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(818): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/cesar/Do...', 818, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(799): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:818
2015-07-31 19:35:02 --- EMERGENCY: Throwable_SQL_Exception [ 0 ]: Message: Failed to query SQL statement. Reason: MySQL server has gone away ~ MODPATH/leap/classes/Base/DB/MySQL/Connection/Standard.php [ 93 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Select/Proxy.php:368
2015-07-31 19:35:02 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Select/Proxy.php(368): Base_DB_MySQL_Connection_Standard->query('SELECT `users_h...', 'Model_Leap_user...')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(815): Base_DB_ORM_Select_Proxy->query()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(799): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Select/Proxy.php:368
2015-07-31 19:35:20 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'else' (T_ELSE), expecting function (T_FUNCTION) ~ APPPATH/classes/EGP/GameReservation.php [ 61 ] in file:line
2015-07-31 19:35:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 19:36:41 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'else' (T_ELSE) ~ APPPATH/classes/EGP/GameReservation.php [ 941 ] in file:line
2015-07-31 19:36:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 19:37:54 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'elseif' (T_ELSEIF) ~ APPPATH/classes/EGP/GameReservation.php [ 941 ] in file:line
2015-07-31 19:37:54 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 19:37:59 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'elseif' (T_ELSEIF) ~ APPPATH/classes/EGP/GameReservation.php [ 941 ] in file:line
2015-07-31 19:37:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 19:40:20 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'public' (T_PUBLIC) ~ APPPATH/classes/EGP/GameReservation.php [ 1084 ] in file:line
2015-07-31 19:40:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 19:42:48 --- EMERGENCY: ErrorException [ 2048 ]: Only variables should be assigned by reference ~ APPPATH/classes/EGP/GameSlot.php [ 24 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:24
2015-07-31 19:42:48 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php(24): Kohana_Core::error_handler(2048, 'Only variables ...', '/Users/cesar/Do...', 24, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(75): EGP_GameSlot->EGP_GameSlot()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(428): EGP_GameReservation->EGP_GameReservation('1')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_addprovi()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:24
2015-07-31 19:42:50 --- EMERGENCY: ErrorException [ 2048 ]: Only variables should be assigned by reference ~ APPPATH/classes/EGP/GameSlot.php [ 24 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:24
2015-07-31 19:42:50 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php(24): Kohana_Core::error_handler(2048, 'Only variables ...', '/Users/cesar/Do...', 24, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(75): EGP_GameSlot->EGP_GameSlot()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(428): EGP_GameReservation->EGP_GameReservation('1')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_addprovi()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:24
2015-07-31 19:43:01 --- EMERGENCY: ErrorException [ 2048 ]: Only variables should be assigned by reference ~ APPPATH/classes/EGP/GameSlot.php [ 24 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:24
2015-07-31 19:43:01 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php(24): Kohana_Core::error_handler(2048, 'Only variables ...', '/Users/cesar/Do...', 24, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(75): EGP_GameSlot->EGP_GameSlot()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(428): EGP_GameReservation->EGP_GameReservation('1')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_addprovi()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:24
2015-07-31 19:45:06 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function format() on null ~ APPPATH/classes/EGP/GameReservation.php [ 448 ] in file:line
2015-07-31 19:45:06 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 19:46:46 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: EGP_GameSlot::$nbPlayers ~ APPPATH/classes/EGP/GameReservation.php [ 569 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:569
2015-07-31 19:46:46 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(569): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/cesar/Do...', 569, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(483): EGP_GameReservation->LoadResa('73177')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:569
2015-07-31 20:47:06 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: EGP_GameSlot::$nbPlayers ~ APPPATH/classes/EGP/GameReservation.php [ 962 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:962
2015-07-31 20:47:06 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(962): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/cesar/Do...', 962, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(799): EGP_GameReservation->UpdateReservation(Object(EGP_GameReservation))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:962
2015-07-31 20:54:04 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/EGP/GameReservation.php [ 85 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:85
2015-07-31 20:54:04 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(85): Kohana_Core::error_handler(2, 'Attempt to assi...', '/Users/cesar/Do...', 85, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(781): EGP_GameReservation->InitResa(Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:85
2015-07-31 20:58:08 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: dtmp ~ APPPATH/classes/EGP/GameReservation.php [ 97 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:97
2015-07-31 20:58:08 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(97): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 97, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(781): EGP_GameReservation->InitResa(Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:97
2015-07-31 20:59:20 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined function setStartHole() ~ APPPATH/classes/EGP/GameReservation.php [ 109 ] in file:line
2015-07-31 20:59:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 21:02:29 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined function typeOf() ~ APPPATH/classes/EGP/GameSlot.php [ 42 ] in file:line
2015-07-31 21:02:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 21:07:24 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '"EGP_GamePlayer"' (T_CONSTANT_ENCAPSED_STRING) ~ APPPATH/classes/EGP/GameSlot.php [ 42 ] in file:line
2015-07-31 21:07:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 21:07:26 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '"EGP_GamePlayer"' (T_CONSTANT_ENCAPSED_STRING) ~ APPPATH/classes/EGP/GameSlot.php [ 42 ] in file:line
2015-07-31 21:07:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 21:07:26 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '"EGP_GamePlayer"' (T_CONSTANT_ENCAPSED_STRING) ~ APPPATH/classes/EGP/GameSlot.php [ 42 ] in file:line
2015-07-31 21:07:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 21:07:32 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '"EGP_GamePlayer"' (T_CONSTANT_ENCAPSED_STRING) ~ APPPATH/classes/EGP/GameSlot.php [ 42 ] in file:line
2015-07-31 21:07:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 21:07:32 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '"EGP_GamePlayer"' (T_CONSTANT_ENCAPSED_STRING) ~ APPPATH/classes/EGP/GameSlot.php [ 42 ] in file:line
2015-07-31 21:07:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 21:08:11 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:144
2015-07-31 21:10:15 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:144
2015-07-31 21:15:16 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:144
2015-07-31 21:17:03 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:144
2015-07-31 23:16:33 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'Array' (T_ARRAY) ~ APPPATH/classes/EGP/GameSlot.php [ 69 ] in file:line
2015-07-31 23:16:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 23:16:41 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'Array' (T_ARRAY) ~ APPPATH/classes/EGP/GameSlot.php [ 69 ] in file:line
2015-07-31 23:16:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 23:16:41 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'Array' (T_ARRAY) ~ APPPATH/classes/EGP/GameSlot.php [ 69 ] in file:line
2015-07-31 23:16:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 23:20:44 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method EGP_GameReservation::LoadResa() ~ APPPATH/classes/Controller/Golf/Resajax.php [ 483 ] in file:line
2015-07-31 23:20:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-31 23:22:19 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/EGP/GameSlot.php [ 32 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:32
2015-07-31 23:22:19 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php(32): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/cesar/Do...', 32, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(204): EGP_GameSlot->setSlot(Object(Model_Leap_Reservation), 0)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(483): EGP_GameReservation->InitResaByLoading('73177')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:32
2015-07-31 23:25:06 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: typeparcours ~ APPPATH/classes/EGP/GameSlot.php [ 46 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:46
2015-07-31 23:25:06 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php(46): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 46, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php(34): EGP_GameSlot->setParcours(2, '2015-08-01 15:0...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(204): EGP_GameSlot->setSlot(Object(Model_Leap_Reservation), 0)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(483): EGP_GameReservation->InitResaByLoading('73195')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameSlot.php:46
2015-07-31 23:25:42 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function format() on string ~ APPPATH/classes/EGP/GameSlot.php [ 50 ] in file:line
2015-07-31 23:25:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line