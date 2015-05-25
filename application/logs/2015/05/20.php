<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-05-20 09:46:22 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-20 09:46:22 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-20 09:57:32 --- EMERGENCY: Throwable_SQL_Exception [ 0 ]: Message: Failed to query SQL statement. Reason: Unknown column 'id_children' in 'field list' ~ MODPATH/leap/classes/Base/DB/MySQL/Connection/Standard.php [ 93 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Select/Proxy.php:331
2015-05-20 09:57:32 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Select/Proxy.php(331): Base_DB_MySQL_Connection_Standard->query('SELECT `reserva...', 'array')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(64): Base_DB_SQL_Select_Proxy->query()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_eventsparcours()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Select/Proxy.php:331
2015-05-20 09:58:02 --- EMERGENCY: Throwable_SQL_Exception [ 0 ]: Message: Failed to query SQL statement. Reason: Unknown column 'id_children' in 'field list' ~ MODPATH/leap/classes/Base/DB/MySQL/Connection/Standard.php [ 93 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Select/Proxy.php:331
2015-05-20 09:58:02 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Select/Proxy.php(331): Base_DB_MySQL_Connection_Standard->query('SELECT `reserva...', 'array')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(64): Base_DB_SQL_Select_Proxy->query()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_eventsparcours()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Select/Proxy.php:331
2015-05-20 11:16:15 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1432105040505 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-05-20 11:16:15 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1432105040505')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1432105040505')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(53): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(476): EGP_GameReservation->loadEventResa('1432105040505')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-05-20 11:16:18 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1432105040505 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-05-20 11:16:18 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1432105040505')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1432105040505')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(53): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(476): EGP_GameReservation->loadEventResa('1432105040505')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-05-20 11:17:30 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1432105040505 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-05-20 11:17:30 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1432105040505')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1432105040505')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(53): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(476): EGP_GameReservation->loadEventResa('1432105040505')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-05-20 17:16:03 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 17:18:31 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 17:19:25 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 17:19:50 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 17:20:15 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 17:21:40 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 17:22:04 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 17:39:36 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1432129154499 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-05-20 17:39:36 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1432129154499')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1432129154499')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(53): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(476): EGP_GameReservation->loadEventResa('1432129154499')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-05-20 17:39:53 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 17:46:33 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1432129519977 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-05-20 17:46:33 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1432129519977#1...')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1432129519977#1...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(53): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(476): EGP_GameReservation->loadEventResa('1432129519977#1...')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-05-20 17:49:35 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1432129732144 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-05-20 17:49:35 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1432129732144')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1432129732144')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(53): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(476): EGP_GameReservation->loadEventResa('1432129732144')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-05-20 17:53:29 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 17:53:57 --- EMERGENCY: Throwable_InvalidProperty_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Property description is either inaccessible or undefined. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 139 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/Connection.php:302
2015-05-20 17:53:57 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/Connection.php(302): Base_DB_ORM_Model->__set('description', '[1  ->  9] trac...')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/MySQL/Connection/Standard.php(98): Base_DB_Connection::type_cast('Model_Leap_type...', Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Select/Proxy.php(331): Base_DB_MySQL_Connection_Standard->query('SELECT `type_pa...', 'Model_Leap_type...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Relation/BelongsTo.php(82): Base_DB_SQL_Select_Proxy->query('Model_Leap_type...')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Relation.php(81): Base_DB_ORM_Relation_BelongsTo->load()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(111): Base_DB_ORM_Relation->__get('result')
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(1052): Base_DB_ORM_Model->__get('type_parcours')
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_update()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#12 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/Connection.php:302
2015-05-20 17:55:16 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 17:55:25 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Golf/Resajax.php [ 490 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:490
2015-05-20 17:55:25 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(490): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/cesar/Do...', 490, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:490
2015-05-20 17:55:54 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 17:55:56 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 17:56:47 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 17:57:10 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 18:03:13 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 18:03:13 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 18:03:46 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 18:03:46 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495
2015-05-20 18:03:51 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1432130622148 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-05-20 18:03:51 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1432130622148')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1432130622148')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(53): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(476): EGP_GameReservation->loadEventResa('1432130622148')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-05-20 18:04:56 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:495