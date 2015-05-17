<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-05-12 13:29:55 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:29:55 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `country` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `lastname` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:30:10 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:30:10 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `country` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `status` = 'pending' ORDER BY `lastname` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:30:14 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:30:14 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `country` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `lastname` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:30:18 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:30:18 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `country` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `status` = 'disable' ORDER BY `lastname` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:30:21 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:30:21 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:30:23 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:30:23 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) WHERE `user_id` > '9' AND `id_status` = '1' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:30:59 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:30:59 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) WHERE `user_id` > '9' AND `id_status` = '1' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:32:26 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:32:26 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) WHERE `user_id` > '9' AND `id_status` = '1' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:42:39 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:42:39 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`id` AS `se8701ad4`, `user_roles`.`id` AS `user_roles.id`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) WHERE `user_id` > '9' AND `id_status` = '1' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:42:57 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:42:57 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`lastname` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) WHERE `user_id` > '9' AND `id_status` = '1' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:44:18 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:44:18 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`lastname` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) WHERE `user_id` > '9' AND `id_status` = '1' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:44:57 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:44:57 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`lastname` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) WHERE `user_id` > '9' AND `id_status` = '1' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:45:20 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:45:20 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) WHERE `user_id` > '9' AND `id_status` = '1' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:46:25 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:46:25 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) WHERE `user_id` > '9' AND `id_status` = '1' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:48:26 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:48:26 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`lastname` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) WHERE `user_id` > '9' AND `id_status` = '1' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:48:32 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:48:32 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:48:37 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:48:37 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`lastname` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) WHERE `user_id` > '9' AND `id_status` = '1' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:55:12 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:55:12 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) WHERE `user_id` > '9' AND `id_status` = '1' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:59:30 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 13:59:30 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) WHERE `user_id` > '9' AND `id_status` = '1' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:11:15 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:11:15 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) WHERE `user_id` > '9' AND `id_status` = '1' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:13:24 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:13:24 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:13:36 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-05-12 14:13:36 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-05-12 14:13:36 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:13:36 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:13:37 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:13:37 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:13:37 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-05-12 14:13:37 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-05-12 14:20:04 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:20:04 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:22:36 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-05-12 14:22:36 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-05-12 14:22:37 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:22:37 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:22:37 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-05-12 14:22:37 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-05-12 14:24:51 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:24:51 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `country` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `lastname` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:25:07 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:25:07 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `country` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `lastname` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:25:20 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-05-12 14:25:20 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-05-12 14:25:21 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:25:21 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-12 14:25:21 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-05-12 14:25:21 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66