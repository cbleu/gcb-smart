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