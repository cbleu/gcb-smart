<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-07-28 00:51:28 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: stdClass::$nbTrous ~ APPPATH/classes/EGP/GameReservation.php [ 395 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:395
2015-07-28 00:51:28 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(395): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/cesar/Do...', 395, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(45): EGP_GameReservation->UpdatePlayersParcours()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(569): EGP_GameReservation->setTrouDepart('10')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(757): EGP_GameReservation->MakeReservation('10')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:395
2015-07-28 13:33:39 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : La date à laquelle vous souhaitez réserver est passée. in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:221
2015-07-28 13:34:21 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: stdClass::$nbTrous ~ APPPATH/classes/EGP/GameReservation.php [ 395 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:395
2015-07-28 13:34:21 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(395): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/cesar/Do...', 395, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(45): EGP_GameReservation->UpdatePlayersParcours()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(569): EGP_GameReservation->setTrouDepart('1')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(757): EGP_GameReservation->MakeReservation('1')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:395
2015-07-28 13:35:01 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:255
2015-07-28 13:35:18 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:255
2015-07-28 13:35:47 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:255
2015-07-28 13:36:21 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:255
2015-07-28 13:36:47 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:255
2015-07-28 13:38:46 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:255
2015-07-28 13:45:05 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:255
2015-07-28 13:45:47 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:255
2015-07-28 14:22:14 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH/views/fragments/calendrier.php [ 228 ] in file:line
2015-07-28 14:22:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-07-28 14:23:37 --- EMERGENCY: Throwable_SQL_Exception [ 0 ]: Message: Failed to execute SQL statement. Reason: Cannot add or update a child row: a foreign key constraint fails (`gcb_test`.`users_has_reservation`, CONSTRAINT `fk_users_has_reservation_reservation1` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION) ~ MODPATH/leap/classes/Base/DB/MySQL/Connection/Standard.php [ 121 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Insert/Proxy.php:130
2015-07-28 14:23:37 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Insert/Proxy.php(130): Base_DB_MySQL_Connection_Standard->execute('INSERT INTO `us...')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(547): Base_DB_SQL_Insert_Proxy->execute(true)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(627): Base_DB_ORM_Model->save(true)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(757): EGP_GameReservation->MakeReservation('10')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Insert/Proxy.php:130
2015-07-28 14:42:31 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: stdClass::$nbTrous ~ APPPATH/classes/EGP/GameReservation.php [ 395 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:395
2015-07-28 14:42:31 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(395): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/cesar/Do...', 395, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(45): EGP_GameReservation->UpdatePlayersParcours()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(569): EGP_GameReservation->setTrouDepart('10')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(757): EGP_GameReservation->MakeReservation('10')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:395
2015-07-28 14:46:11 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: client_firstname ~ APPPATH/classes/EGP/GameReservation.php [ 704 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:704
2015-07-28 14:46:11 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(704): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 704, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(653): EGP_GameReservation->AddToPendingResa()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(757): EGP_GameReservation->MakeReservation('10')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:704
2015-07-28 18:45:47 --- EMERGENCY: Throwable_SQL_Exception [ 0 ]: Message: Failed to execute SQL statement. Reason: Cannot add or update a child row: a foreign key constraint fails (`gcb_test`.`users_has_reservation`, CONSTRAINT `fk_users_has_reservation_reservation1` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION) ~ MODPATH/leap/classes/Base/DB/MySQL/Connection/Standard.php [ 121 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Insert/Proxy.php:130
2015-07-28 18:45:47 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Insert/Proxy.php(130): Base_DB_MySQL_Connection_Standard->execute('INSERT INTO `us...')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(547): Base_DB_SQL_Insert_Proxy->execute(true)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(627): Base_DB_ORM_Model->save(true)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(757): EGP_GameReservation->MakeReservation('10')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Insert/Proxy.php:130
2015-07-28 18:57:38 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:255
2015-07-28 22:17:13 --- NOTICE: GameReservation::CheckPostNbPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:255