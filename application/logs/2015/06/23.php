<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-06-23 01:31:42 --- EMERGENCY: View_Exception [ 0 ]: The requested view empty could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-06-23 01:31:42 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('empty')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('empty', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('empty')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(19): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Main.php(52): Controller_Oscrudc->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(18): Controller_Golf_Main->before()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_App->before()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-06-23 01:34:20 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-23 01:34:20 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'app' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-23 01:34:26 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-23 01:34:26 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-23 09:27:56 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-23 09:27:56 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-23 09:28:07 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 10:28:19 --- EMERGENCY: ErrorException [ 8 ]: Use of undefined constant isAdmin - assumed 'isAdmin' ~ APPPATH/views/inc/footer.php [ 8 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/footer.php:8
2015-06-23 10:28:19 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/footer.php(8): Kohana_Core::error_handler(8, 'Use of undefine...', '/Users/cesar/Do...', 8, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(77): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/footer.php:8
2015-06-23 11:17:41 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 11:28:47 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: i ~ APPPATH/views/fragments/calendrier.php [ 135 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:135
2015-06-23 11:28:47 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php(135): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 135, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_View->__toString()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:135
2015-06-23 11:30:04 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: user_id ~ APPPATH/views/fragments/calendrier.php [ 139 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:139
2015-06-23 11:30:04 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php(139): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 139, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_View->__toString()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:139
2015-06-23 11:30:06 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: user_id ~ APPPATH/views/fragments/calendrier.php [ 139 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:139
2015-06-23 11:30:06 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php(139): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 139, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_View->__toString()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/calendrier.php:139
2015-06-23 11:32:23 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 11:37:10 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 11:37:23 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:11:52 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1435054305275 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:11:52 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1435054305275')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1435054305275')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(60): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(477): EGP_GameReservation->LoadResa('1435054305275')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:11:54 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1435054305274 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:11:54 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1435054305274')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1435054305274')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(60): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(477): EGP_GameReservation->LoadResa('1435054305274')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:11:55 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1435054305274 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:11:55 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1435054305274')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1435054305274')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(60): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(477): EGP_GameReservation->LoadResa('1435054305274')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:11:56 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1435054305274 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:11:56 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1435054305274')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1435054305274')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(60): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(477): EGP_GameReservation->LoadResa('1435054305274')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:13:04 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1435054372597 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:13:04 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1435054372597')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1435054372597')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(60): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(477): EGP_GameReservation->LoadResa('1435054372597')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:13:05 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1435054372585 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:13:05 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1435054372585')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1435054372585')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(60): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(477): EGP_GameReservation->LoadResa('1435054372585')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:15:33 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1435054530900 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:15:33 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1435054530900')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1435054530900')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(60): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(477): EGP_GameReservation->LoadResa('1435054530900')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:15:34 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1435054530901 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:15:34 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1435054530901')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1435054530901')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(60): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(477): EGP_GameReservation->LoadResa('1435054530901')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:18:04 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:18:06 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:18:10 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:18:13 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:18:43 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:18:45 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:19:32 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:19:38 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:19:39 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:19:41 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:20:05 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:20:06 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:21:09 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:22:16 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1435054934472 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:22:16 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1435054934472')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1435054934472')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(60): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(477): EGP_GameReservation->LoadResa('1435054934472')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:22:20 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1435054934474 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:22:20 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1435054934474')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1435054934474')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(60): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(477): EGP_GameReservation->LoadResa('1435054934474')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-06-23 14:37:40 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:50:18 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:50:24 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: colour ~ APPPATH/classes/Controller/Golf/Events.php [ 105 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:105
2015-06-23 14:50:24 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php(105): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 105, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Events->action_insert_ajax()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Events))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:105
2015-06-23 14:50:29 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:50:32 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 14:50:39 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:11:31 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:36:54 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:36:57 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:37:03 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:37:11 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:37:22 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:38:06 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:38:07 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:38:12 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:38:35 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:40:31 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:40:55 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:42:11 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:42:32 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:43:04 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:44:52 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:47:17 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:47:21 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 15:48:31 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: colour ~ APPPATH/classes/Controller/Golf/Events.php [ 61 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:61
2015-06-23 15:48:31 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php(61): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 61, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Events->action_update_ajax()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Events))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Events.php:61
2015-06-23 16:22:11 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 16:23:57 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 16:24:12 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 16:28:40 --- EMERGENCY: Throwable_Marshalling_Exception [ 0 ]: Message: Failed to load record from database. Reason: Unable to match primary key with a record. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 372 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php:94
2015-06-23 16:28:40 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(94): Base_DB_ORM_Model->load()
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(60): Base_DB_ORM::model('reservation', Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(477): EGP_GameReservation->LoadResa(NULL)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php:94
2015-06-23 18:06:01 --- EMERGENCY: Throwable_Marshalling_Exception [ 0 ]: Message: Failed to load record from database. Reason: Unable to match primary key with a record. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 372 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:1354
2015-06-23 18:06:01 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(1354): Base_DB_ORM_Model->load()
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_leave()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:1354
2015-06-23 18:09:15 --- EMERGENCY: Throwable_Marshalling_Exception [ 0 ]: Message: Failed to load record from database. Reason: Unable to match primary key with a record. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 372 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:1354
2015-06-23 18:09:15 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(1354): Base_DB_ORM_Model->load()
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_leave()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:1354
2015-06-23 18:10:18 --- NOTICE: GameReservation::CheckPostedPlayers: ERREUR : Nombre de joueurs non valide in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:537
2015-06-23 18:11:00 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH/classes/EGP/GameReservation.php [ 501 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:501
2015-06-23 18:11:00 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(501): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/cesar/Do...', 501, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(748): EGP_GameReservation->IsRequestValid(Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:501