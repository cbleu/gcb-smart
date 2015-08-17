<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-08-10 16:02:36 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1439208150963 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-08-10 16:02:36 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1439208150963')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1439208150963')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(263): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(493): EGP_GameReservation->InitResaByLoading('1439208150963')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-08-10 16:06:53 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH/classes/EGP/GameReservation.php [ 138 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:138
2015-08-10 16:06:53 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(138): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/cesar/Do...', 138, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(436): EGP_GameReservation->InitResa(Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_addprovi()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:138
2015-08-10 16:44:29 --- EMERGENCY: Throwable_Validation_Exception [ 0 ]: Message: Unable to set the specified property. Reason: Value 1439210613536 failed to pass validation constraints. ~ MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php [ 162 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129
2015-08-10 16:44:29 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(129): Base_DB_ORM_Field_Integer->__set('value', '1439210613536')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM.php(92): Base_DB_ORM_Model->__set('id', '1439210613536')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php(263): Base_DB_ORM::model('reservation', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(493): EGP_GameReservation->InitResaByLoading('1439210613536')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_loaddetailsform()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:129