<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-05-09 14:10:05 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-09 14:10:05 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `country` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-09 14:12:17 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-09 14:12:17 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `country` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `status` = 'pending' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-09 14:12:18 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-09 14:12:18 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `country` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-09 14:12:20 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-09 14:12:20 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `country` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `status` = 'disable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-09 14:12:24 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-09 14:12:24 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `country` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-09 14:12:33 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: validation_url ~ APPPATH/views/fragments/admin/crud/confirm.php [ 62 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/admin/crud/confirm.php:62
2015-05-09 14:12:33 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/admin/crud/confirm.php(62): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 62, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_View->__toString()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(47): Kohana_Controller_Template->after()
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Controller_Golf_App->after()
#10 [internal function]: Kohana_Controller->execute()
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Users))
#12 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#15 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/fragments/admin/crud/confirm.php:62