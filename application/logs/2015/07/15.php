<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-07-15 22:53:46 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-15 22:55:23 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-15 22:55:48 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-15 22:56:23 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-15 22:57:46 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-07-15 23:16:46 --- EMERGENCY: Throwable_SQL_Exception [ 0 ]: Message: Failed to execute SQL statement. Reason: Cannot add or update a child row: a foreign key constraint fails (`gcb_test`.`users_has_reservation`, CONSTRAINT `fk_users_has_reservation_reservation1` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION) ~ MODPATH/leap/classes/Base/DB/MySQL/Connection/Standard.php [ 121 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Insert/Proxy.php:130
2015-07-15 23:16:46 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Insert/Proxy.php(130): Base_DB_MySQL_Connection_Standard->execute('INSERT INTO `us...')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(547): Base_DB_SQL_Insert_Proxy->execute(true)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(924): Base_DB_ORM_Model->save(true)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(761): EGP_GameReservation->MakeReservation('1')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Insert/Proxy.php:130