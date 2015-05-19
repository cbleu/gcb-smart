<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-05-19 00:39:03 --- EMERGENCY: ErrorException [ 1 ]: Class 'Database_SQL' not found ~ MODPATH/database/classes/Kohana/Database.php [ 78 ] in file:line
2015-05-19 00:39:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-05-19 00:40:04 --- EMERGENCY: Database_Exception [ 1146 ]: Table 'gcb_test.categories' doesn't exist [ SHOW FULL COLUMNS FROM `categories` ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/database/classes/Kohana/Database/Query.php:251
2015-05-19 00:40:04 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/crud/classes/Crud.php(89): Kohana_Database_Query->execute()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/crud/classes/Crud.php(81): Crud->getFields()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Example.php(10): Crud->table('categories')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Example->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Example))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/database/classes/Kohana/Database/Query.php:251
2015-05-19 00:40:19 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 00:40:19 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `country` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `lastname` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 00:40:22 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 00:40:22 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `country` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `status` = 'pending' ORDER BY `lastname` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 00:40:26 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 00:40:26 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `country` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `status` = 'disable' ORDER BY `lastname` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 00:40:31 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 00:40:31 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'app' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 00:41:03 --- EMERGENCY: Database_Exception [ 1146 ]: Table 'gcb_test.categories' doesn't exist [ SHOW FULL COLUMNS FROM `categories` ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/database/classes/Kohana/Database/Query.php:251
2015-05-19 00:41:03 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/crud/classes/Crud.php(89): Kohana_Database_Query->execute()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/crud/classes/Crud.php(81): Crud->getFields()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Example.php(10): Crud->table('categories')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Example->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Example))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/database/classes/Kohana/Database/Query.php:251
2015-05-19 00:41:14 --- EMERGENCY: Database_Exception [ 1146 ]: Table 'gcb_test.categories' doesn't exist [ SHOW FULL COLUMNS FROM `categories` ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/database/classes/Kohana/Database/Query.php:251
2015-05-19 00:41:14 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/crud/classes/Crud.php(89): Kohana_Database_Query->execute()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/crud/classes/Crud.php(81): Crud->getFields()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Example.php(10): Crud->table('categories')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Example->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Example))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/database/classes/Kohana/Database/Query.php:251
2015-05-19 00:41:24 --- EMERGENCY: Database_Exception [ 1146 ]: Table 'gcb_test.categories' doesn't exist [ SHOW FULL COLUMNS FROM `categories` ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/database/classes/Kohana/Database/Query.php:251
2015-05-19 00:41:24 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/crud/classes/Crud.php(89): Kohana_Database_Query->execute()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/crud/classes/Crud.php(81): Crud->getFields()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Example.php(10): Crud->table('categories')
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Example->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Example))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/database/classes/Kohana/Database/Query.php:251
2015-05-19 00:56:00 --- EMERGENCY: ErrorException [ 1 ]: Class 'Database_SQL' not found ~ MODPATH/database/classes/Kohana/Database.php [ 78 ] in file:line
2015-05-19 00:56:00 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-05-19 01:00:44 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: users.id ~ MODPATH/crud/classes/Crud.php [ 2121 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/crud/classes/Crud.php:2121
2015-05-19 01:00:44 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/crud/classes/Crud.php(2121): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 2121, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/crud/classes/Crud.php(1577): Crud->getByPrimaryKeys()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/crud/classes/Crud.php(1773): Crud->form()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Example.php(52): Crud->fetch()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Example->action_index2()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Example))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/crud/classes/Crud.php:2121
2015-05-19 09:09:02 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 09:09:02 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `country` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `lastname` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 09:52:37 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 09:52:37 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `lastname` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 09:52:37 --- EMERGENCY: Throwable_SQL_Exception [ 0 ]: Message: Failed to query SQL statement. Reason: Unknown column 'lastname' in 'order clause' ~ MODPATH/leap/classes/Base/DB/MySQL/Connection/Standard.php [ 93 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Select/Proxy.php:331
2015-05-19 09:52:37 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Select/Proxy.php(331): Base_DB_MySQL_Connection_Standard->query('SELECT * FROM `...', 'array')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Model/Oscrud.php(126): Base_DB_SQL_Select_Proxy->query()
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php(797): Model_Oscrud->get_list()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(42): Oscrud_Core_Model_Driver->get_list()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(200): Oscrud_Core_Layout->showList(false, Object(stdClass))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resapublic.php(83): Controller_Oscrudc->action_list()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Resapublic->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Resapublic))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/SQL/Select/Proxy.php:331
2015-05-19 09:53:25 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 09:53:25 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 09:53:25 --- EMERGENCY: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'Controller_Golf_Resapublic' does not have a method 'confirm_path' ~ MODPATH/oscrud/classes/Oscrud/Core/Layout.php [ 319 ] in file:line
2015-05-19 09:53:25 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'call_user_func(...', '/Users/cesar/Do...', 319, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(319): call_user_func(Array, '742', Object(stdClass))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(44): Oscrud_Core_Layout->change_list_add_actions(Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(200): Oscrud_Core_Layout->showList(false, Object(stdClass))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resapublic.php(83): Controller_Oscrudc->action_list()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Resapublic->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Resapublic))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-05-19 09:54:45 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 09:54:45 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 10:28:40 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 10:28:40 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 10:28:45 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 10:28:45 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 12:17:16 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 12:17:16 --- NOTICE: SELECT * FROM `demande_reservation` ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 12:17:18 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 12:17:18 --- NOTICE: SELECT * FROM `demande_reservation` ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 12:17:20 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 12:17:20 --- NOTICE: SELECT * FROM `demande_reservation` ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 12:17:25 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 12:17:25 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 22:56:44 --- NOTICE: get_list : select =`golf`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 22:56:44 --- NOTICE: SELECT * FROM `golf` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 22:57:01 --- NOTICE: get_list : select =`golf`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-19 22:57:01 --- NOTICE: SELECT * FROM `golf` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797