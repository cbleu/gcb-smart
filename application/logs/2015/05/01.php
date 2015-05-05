<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-05-01 14:51:23 --- EMERGENCY: View_Exception [ 0 ]: The requested view /fragments/admin/crud/add could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 14:51:23 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('/fragments/admi...')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('/fragments/admi...', Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Rolesusers.php(75): Kohana_View::factory('/fragments/admi...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Rolesusers->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Rolesusers))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 14:52:45 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 14:52:45 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 14:52:48 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 14:52:48 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `s84566833` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 14:56:32 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 14:56:32 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 14:56:34 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 14:56:34 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `s84566833` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:03:41 --- EMERGENCY: View_Exception [ 0 ]: The requested view admin could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 15:03:41 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('admin')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('admin', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('admin')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(31): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Roles.php(21): Controller_Oscrudc->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_Roles->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 15:03:43 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:03:43 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:03:45 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:03:45 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `s84566833` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:04:30 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:04:30 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:04:32 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:04:32 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `s84566833` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:12 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:12 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:14 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:14 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `s84566833` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:16 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:16 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:17 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:17 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `s84566833` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:26 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:26 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:27 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:27 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:42 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:42 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:43 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:05:43 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `s84566833` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:24:53 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: page_title ~ APPPATH/views/inc/header.php [ 9 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:9
2015-05-01 15:24:53 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 9, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(25): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Core.php(668): Kohana_View->__toString()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(255): Kohana_Core::find_file('views', Object(View))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename(Object(View))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct(Object(View), NULL)
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory(Object(View))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(31): Kohana_Controller_Template->before()
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Main.php(40): Controller_Oscrudc->before()
#12 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(22): Controller_Golf_Main->before()
#13 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_App->before()
#14 [internal function]: Kohana_Controller->execute()
#15 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#16 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#19 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:9
2015-05-01 15:24:53 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: page_html_prop ~ APPPATH/views/inc/header.php [ 4 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:4
2015-05-01 15:24:53 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 4, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(25): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 [internal function]: Kohana_View->__toString()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/I18n.php(164): strtr('The requested v...', Array)
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Kohana/Exception.php(53): __('The requested v...', Array)
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(259): Kohana_Kohana_Exception->__construct('The requested v...', Array)
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename(Object(View))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct(Object(View), NULL)
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory(Object(View))
#12 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(31): Kohana_Controller_Template->before()
#13 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Main.php(40): Controller_Oscrudc->before()
#14 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(22): Controller_Golf_Main->before()
#15 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_App->before()
#16 [internal function]: Kohana_Controller->execute()
#17 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#18 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#19 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#20 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#21 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:4
2015-05-01 15:24:53 --- EMERGENCY: View_Exception [ 0 ]: The requested view 
#kohana_error { background: #ddd; font-size: 1em; font-family:sans-serif; text-align: left; color: #111; }
#kohana_error h1,
#kohana_error h2 { margin: 0; padding: 1em; font-size: 1em; font-weight: normal; background: #911; color: #fff; }
	#kohana_error h1 a,
	#kohana_error h2 a { color: #fff; }
#kohana_error h2 { background: #222; }
#kohana_error h3 { margin: 0; padding: 0.4em 0 0; font-size: 1em; font-weight: normal; }
#kohana_error p { margin: 0; padding: 0.2em 0; }
#kohana_error a { color: #1b323b; }
#kohana_error pre { overflow: auto; white-space: pre-wrap; }
#kohana_error table { width: 100%; display: block; margin: 0 0 0.4em; padding: 0; border-collapse: collapse; background: #fff; }
	#kohana_error table td { border: solid 1px #ddd; text-align: left; vertical-align: top; padding: 0.4em; }
#kohana_error div.content { padding: 0.4em 1em 1em; overflow: hidden; }
#kohana_error pre.source { margin: 0 0 1em; padding: 0.4em; background: #fff; border: dotted 1px #b7c680; line-height: 1.2em; }
	#kohana_error pre.source span.line { display: block; }
	#kohana_error pre.source span.highlight { background: #f0eb96; }
		#kohana_error pre.source span.line span.number { color: #666; }
#kohana_error ol.trace { display: block; margin: 0 0 0 2em; padding: 0; list-style: decimal; }
	#kohana_error ol.trace li { margin: 0; padding: 0; }
.js .collapsed { display: none; }


document.documentElement.className = document.documentElement.className + ' js';
function koggle(elem)
{
	elem = document.getElementById(elem);

	if (elem.style && elem.style['display'])
		// Only works with the "style" attr
		var disp = elem.style['display'];
	else if (elem.currentStyle)
		// For MSIE, naturally
		var disp = elem.currentStyle['display'];
	else if (window.getComputedStyle)
		// For most other browsers
		var disp = document.defaultView.getComputedStyle(elem, null).getPropertyValue('display');

	// Toggle the state of the "display" style
	elem.style.display = disp == 'block' ? 'none' : 'block';
	return false;
}


	ErrorException [ Notice ]: Undefined variable: page_html_prop
	
		APPPATH/views/inc/header.php [ 4 ]
		1 &lt;!DOCTYPE html&gt;
2 &lt;html lang="en-us" &lt;?php echo implode(' ', array_map(function($prop, $value) {
3 			return $prop.'="'.$value.'"';
4 		}, array_keys($page_html_prop), $page_html_prop)) ;?&gt;&gt;
5 	&lt;head&gt;
6 		&lt;meta charset="utf-8"&gt;
7 		&lt;!--&lt;meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"&gt;--&gt;
8 
9 		&lt;title&gt; &lt;?php echo $page_title != "" ? $page_title." - " : ""; ?&gt;EasyGolfPack(c) &lt;/title&gt;
		
					
				
					
													APPPATH/views/inc/header.php [ 4 ]
											
					&raquo;
					Kohana_Core::error_handler(arguments)
				
								
					
											
							0
							integer 8
						
											
							1
							string(34) "Undefined variable: page_html_prop"
						
											
							2
							string(73) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php"
						
											
							3
							integer 4
						
											
							4
							array(3) (
    "kohana_view_filename" => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    "kohana_view_data" => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
    "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
)
						
										
				
													1 &lt;!DOCTYPE html&gt;
2 &lt;html lang="en-us" &lt;?php echo implode(' ', array_map(function($prop, $value) {
3 			return $prop.'="'.$value.'"';
4 		}, array_keys($page_html_prop), $page_html_prop)) ;?&gt;&gt;
5 	&lt;head&gt;
6 		&lt;meta charset="utf-8"&gt;
7 		&lt;!--&lt;meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"&gt;--&gt;
8 
9 		&lt;title&gt; &lt;?php echo $page_title != "" ? $page_title." - " : ""; ?&gt;EasyGolfPack(c) &lt;/title&gt;

							
								
				
					
													APPPATH/views/egp_template.php [ 25 ]
											
					&raquo;
					include(arguments)
				
								
					
											
							0
							string(73) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php"
						
										
				
													20 	//include header
21 	//you can add your custom css in $page_css array.
22 	//Note: all css files are inside css/ folder
23 	// $page_css[] = "your_style.css";
24 
25 	include(APPPATH."views/inc/header.php");
26 ?&gt;
27 
28 &lt;div id="divForJs"&gt;
29 	&lt;form id="dataForJs"&gt;
30 		&lt;?php foreach(Helpers_InputForJs::get() as $phpvar =&gt; $hiddenInput) { ?&gt;

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 61 ]
											
					&raquo;
					include(arguments)
				
								
					
											
							0
							string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
						
										
				
													56 		ob_start();
57 
58 		try
59 		{
60 			// Load the view within the current scope
61 			include $kohana_view_filename;
62 		}
63 		catch (Exception $e)
64 		{
65 			// Delete the output buffer
66 			ob_end_clean();

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 348 ]
											
					&raquo;
					Kohana_View::capture(arguments)
				
								
					
											
							0
							string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
						
											
							1
							array(1) (
    "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
)
						
										
				
													343 		{
344 			throw new View_Exception('You must set the file to use within your view before rendering');
345 		}
346 
347 		// Combine local and global data and capture the output
348 		return View::capture($this-&gt;_file, $this-&gt;_data);
349 	}
350 
351 }

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 228 ]
											
					&raquo;
					Kohana_View->render()
				
													223 	 */
224 	public function __toString()
225 	{
226 		try
227 		{
228 			return $this-&gt;render();
229 		}
230 		catch (Exception $e)
231 		{
232 			/**
233 			 * Display the exception message.

							
								
				
					
													{PHP internal call}
											
					&raquo;
					Kohana_View->__toString()
				
											
								
				
					
													SYSPATH/classes/Kohana/I18n.php [ 164 ]
											
					&raquo;
					strtr(arguments)
				
								
					
											
							str
							string(43) "The requested view :file could not be found"
						
											
							from
							array(1) (
    ":file" => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
)
						
										
				
													159 			// The message and target languages are different
160 			// Get the translation for this message
161 			$string = I18n::get($string);
162 		}
163 
164 		return empty($values) ? $string : strtr($string, $values);
165 	}
166 }

							
								
				
					
													SYSPATH/classes/Kohana/Kohana/Exception.php [ 53 ]
											
					&raquo;
					__(arguments)
				
								
					
											
							string
							string(43) "The requested view :file could not be found"
						
											
							values
							array(1) (
    ":file" => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
)
						
										
				
													48 	 * @return  void
49 	 */
50 	public function __construct($message = "", array $variables = NULL, $code = 0, Exception $previous = NULL)
51 	{
52 		// Set the message
53 		$message = __($message, $variables);
54 
55 		// Pass the message and integer code to the parent
56 		parent::__construct($message, (int) $code, $previous);
57 
58 		// Save the unmodified code

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 259 ]
											
					&raquo;
					Kohana_Kohana_Exception->__construct(arguments)
				
								
					
											
							0
							string(43) "The requested view :file could not be found"
						
											
							1
							array(1) (
    ":file" => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
)
						
										
				
													254 	{
255 		if (($path = Kohana::find_file('views', $file)) === FALSE)
256 		{
257 			throw new View_Exception('The requested view :file could not be found', array(
258 				':file' =&gt; $file,
259 			));
260 		}
261 
262 		// Store the file path locally
263 		$this-&gt;_file = $path;
264 

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 137 ]
											
					&raquo;
					Kohana_View->set_filename(arguments)
				
								
					
											
							0
							object View(2) {
    protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    protected _data => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
}
						
										
				
													132 	 */
133 	public function __construct($file = NULL, array $data = NULL)
134 	{
135 		if ($file !== NULL)
136 		{
137 			$this-&gt;set_filename($file);
138 		}
139 
140 		if ($data !== NULL)
141 		{
142 			// Add the values to the current data

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 30 ]
											
					&raquo;
					Kohana_View->__construct(arguments)
				
								
					
											
							0
							object View(2) {
    protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    protected _data => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
}
						
											
							1
							NULL
						
										
				
													25 	 * @param   array   $data   array of values
26 	 * @return  View
27 	 */
28 	public static function factory($file = NULL, array $data = NULL)
29 	{
30 		return new View($file, $data);
31 	}
32 
33 	/**
34 	 * Captures the output that is generated when a view is included.
35 	 * The view data will be extracted to make local variables. This method

							
								
				
					
													SYSPATH/classes/Kohana/Controller/Template.php [ 33 ]
											
					&raquo;
					Kohana_View::factory(arguments)
				
								
					
											
							0
							object View(2) {
    protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    protected _data => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
}
						
										
				
													28 		parent::before();
29 
30 		if ($this-&gt;auto_render === TRUE)
31 		{
32 			// Load the template
33 			$this-&gt;template = View::factory($this-&gt;template);
34 		}
35 	}
36 
37 	/**
38 	 * Assigns the template [View] as the request response.

							
								
				
					
													MODPATH/oscrud/classes/Controller/Oscrudc.php [ 31 ]
											
					&raquo;
					Kohana_Controller_Template->before()
				
													26 		// 	        $template = $this-&gt;template;
27 		// 	//echo 'site normal';
28 		// }
29         // This is important and for abstraction, since we're extending a class and its functions we need to make sure we still execute its before(); function
30         // This will load the view you need from /views/template.php or /views/template2.php depending on what your controller specifies into $this-&gt;template
31         parent::before();
32 
33         // $this-&gt;template-&gt;header = View::factory('admin/header');  // Loads default header file from our views folder /views/admin/header.php
34         // $this-&gt;template-&gt;content = View::factory('admin/content');  // Loads default index file from our views folder
35         // $this-&gt;template-&gt;footer = View::factory('admin/footer');  // Loads default footer file from our views folder
36 	

							
								
				
					
													APPPATH/classes/Controller/Golf/Main.php [ 40 ]
											
					&raquo;
					Controller_Oscrudc->before()
				
													35 		$this-&gt;ressources 		= DB_SQL::select("default")-&gt;from("ressources")
36 			-&gt;where("id_golf", "=", $this-&gt;golf-&gt;id)
37 				-&gt;query();
38 		
39 		//////////////////////////////////////////////////////////
40 		parent::before();
41 		//////////////////////////////////////////////////////////
42 
43 		Helpers_Stylesheet::add('/assets/css/easygolfpack/egp_main.css');
44 		
45 		$this-&gt;pages = array(

							
								
				
					
													APPPATH/classes/Controller/Golf/App.php [ 22 ]
											
					&raquo;
					Controller_Golf_Main->before()
				
													17 		$this-&gt;template = View::factory('egp_template');		// Set the template as /views/public.php
18 
19 		$this-&gt;template-&gt;konotif = Notify::render();
20 		 
21 
22 		parent::before();	// execute before for parent Class
23 
24 	}	// before
25 	
26 	//////////////////////////////////////////////////////////
27 	// ACTION FUNCS											//

							
								
				
					
													SYSPATH/classes/Kohana/Controller.php [ 69 ]
											
					&raquo;
					Controller_Golf_App->before()
				
													64 	 * @return  Response
65 	 */
66 	public function execute()
67 	{
68 		// Execute the "before action" method
69 		$this-&gt;before();
70 
71 		// Determine the action to use
72 		$action = 'action_'.$this-&gt;request-&gt;action();
73 
74 		// If the action doesn't exist, it's a 404

							
								
				
					
													{PHP internal call}
											
					&raquo;
					Kohana_Controller->execute()
				
											
								
				
					
													SYSPATH/classes/Kohana/Request/Client/Internal.php [ 97 ]
											
					&raquo;
					ReflectionMethod->invoke(arguments)
				
								
					
											
							0
							object Controller_Golf_App(19) {
    public isLogged => bool TRUE
    public isAdmin => bool TRUE
    public user => object Model_Leap_User(5) {
        protected adaptors => array(2) (
            "last_login_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(2) (
                    "field" => string(10) "last_login"
                    "format" => string(11) "Y-m-d H:i:s"
                )
            }
            "new_password_requested_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(2) (
                    "field" => string(22) "new_password_requested"
                    "format" => string(11) "Y-m-d H:i:s"
                )
            }
        )
        protected aliases => array(0) 
        protected fields => array(23) (
            "id" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => integer 0
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool TRUE
                    "range" => array(2) (
                        "lower_bound" => integer 0
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 145
            }
            "email" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => string(0) ""
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 254
                )
                protected value => string(24) "contact@golf-bourbon.com"
            }
            "username" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => string(0) ""
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 32
                )
                protected value => string(0) ""
            }
            "password" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => string(0) ""
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 64
                )
                protected value => string(64) "db844ad71b412b511d56b11068ec006386a9932c15064f8301d4b03e2e5a6cbd"
            }
            "firstname" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 35
                )
                protected value => string(11) "Secretariat"
            }
            "lastname" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 50
                )
                protected value => string(12) "GOLF BOURBON"
            }
            "activated" => object DB_ORM_Field_Boolean(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(8) "checkbox"
                    "default" => bool TRUE
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "boolean"
                )
                protected value => bool TRUE
            }
            "banned" => object DB_ORM_Field_Boolean(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(8) "checkbox"
                    "default" => bool FALSE
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "boolean"
                )
                protected value => bool FALSE
            }
            "ban_reason" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 255
                )
                protected value => NULL
            }
            "new_password_key" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 64
                )
                protected value => NULL
            }
            "new_password_requested" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => NULL
            }
            "new_email" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 254
                )
                protected value => NULL
            }
            "new_email_key" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 64
                )
                protected value => NULL
            }
            "logins" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => integer 0
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 10
                    "unsigned" => bool TRUE
                    "range" => array(2) (
                        "lower_bound" => integer 0
                        "upper_bound" => integer 2147483647
                    )
                )
                protected value => integer 3116
            }
            "last_login" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 10
                    "unsigned" => bool TRUE
                    "range" => array(2) (
                        "lower_bound" => integer 0
                        "upper_bound" => integer 2147483647
                    )
                )
                protected value => integer 1430212803
            }
            "last_ip" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 39
                )
                protected value => string(3) "::1"
            }
            "indgolf" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 10
                )
                protected value => string(1) "0"
            }
            "adresse" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 200
                )
                protected value => NULL
            }
            "cp" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 10
                )
                protected value => NULL
            }
            "ville" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 100
                )
                protected value => NULL
            }
            "telephone" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 25
                )
                protected value => NULL
            }
            "id_pays" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => NULL
            }
            "id_status" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 1
            }
        )
        protected metadata => array(2) (
            "loaded" => bool TRUE
            "saved" => string(40) "e15cea14d351c743e5e34612ab730035adb20cc8"
        )
        protected relations => array(3) (
            "user_roles" => object DB_ORM_Relation_HasMany(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "type" => string(8) "has_many"
                    "parent_model" => string(15) "Model_Leap_User"
                    "parent_key" => array(1) (
                        0 => string(2) "id"
                    )
                    "child_model" => string(20) "Model_Leap_User_Role"
                    "child_key" => array(1) (
                        0 => string(7) "user_id"
                    )
                    "options" => array(0) 
                )
                protected cache => object DB_ResultSet(4) {
                    protected records => array(1) (
                        0 => object Model_Leap_User_Role(5) {
                            protected adaptors => array(0) 
                            protected aliases => array(0) 
                            protected fields => array(3) (
                                "user_id" => object DB_ORM_Field_Integer(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(9) (
                                        "control" => string(4) "auto"
                                        "default" => integer 0
                                        "modified" => bool TRUE
                                        "nullable" => bool FALSE
                                        "savable" => bool TRUE
                                        "type" => string(7) "integer"
                                        "max_length" => integer 10
                                        "unsigned" => bool TRUE
                                        "range" => array(2) (
                                            ...
                                        )
                                    )
                                    protected value => integer 145
                                }
                                "role_id" => object DB_ORM_Field_Integer(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(9) (
                                        "control" => string(4) "auto"
                                        "default" => integer 0
                                        "modified" => bool TRUE
                                        "nullable" => bool FALSE
                                        "savable" => bool TRUE
                                        "type" => string(7) "integer"
                                        "max_length" => integer 10
                                        "unsigned" => bool TRUE
                                        "range" => array(2) (
                                            ...
                                        )
                                    )
                                    protected value => integer 14
                                }
                                "id" => object DB_ORM_Field_Integer(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(9) (
                                        "control" => string(4) "auto"
                                        "default" => integer 0
                                        "modified" => bool TRUE
                                        "nullable" => bool FALSE
                                        "savable" => bool TRUE
                                        "type" => string(7) "integer"
                                        "max_length" => integer 11
                                        "unsigned" => bool FALSE
                                        "range" => array(2) (
                                            ...
                                        )
                                    )
                                    protected value => integer 11
                                }
                            )
                            protected metadata => array(2) (
                                "loaded" => bool TRUE
                                "saved" => NULL
                            )
                            protected relations => array(2) (
                                "user" => object DB_ORM_Relation_BelongsTo(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(5) (
                                        "type" => string(10) "belongs_to"
                                        "parent_model" => string(15) "Model_Leap_User"
                                        "parent_key" => array(1) (
                                            ...
                                        )
                                        "child_model" => string(20) "Model_Leap_User_Role"
                                        "child_key" => array(1) (
                                            ...
                                        )
                                    )
                                    protected cache => NULL
                                }
                                "role" => object DB_ORM_Relation_BelongsTo(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(5) (
                                        "type" => string(10) "belongs_to"
                                        "parent_model" => string(15) "Model_Leap_Role"
                                        "parent_key" => array(1) (
                                            ...
                                        )
                                        "child_model" => string(20) "Model_Leap_User_Role"
                                        "child_key" => array(1) (
                                            ...
                                        )
                                    )
                                    protected cache => object Model_Leap_Role(5) {
                                        protected adaptors => array(0) 
                                        protected aliases => array(0) 
                                        protected fields => array(3) (
                                            ...
                                        )
                                        protected metadata => array(2) (
                                            ...
                                        )
                                        protected relations => array(1) (
                                            ...
                                        )
                                    }
                                }
                            )
                        }
                    )
                    protected position => integer 1
                    protected size => integer 1
                    protected type => string(20) "Model_Leap_User_Role"
                }
            }
            "user_token" => object DB_ORM_Relation_HasMany(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "type" => string(8) "has_many"
                    "parent_model" => string(15) "Model_Leap_User"
                    "parent_key" => array(1) (
                        0 => string(2) "id"
                    )
                    "child_model" => string(21) "Model_Leap_User_Token"
                    "child_key" => array(1) (
                        0 => string(7) "user_id"
                    )
                    "options" => array(0) 
                )
                protected cache => NULL
            }
            "status" => object DB_ORM_Relation_BelongsTo(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(5) (
                    "type" => string(10) "belongs_to"
                    "parent_model" => string(22) "Model_Leap_user_status"
                    "parent_key" => array(1) (
                        0 => string(2) "id"
                    )
                    "child_model" => string(15) "Model_Leap_User"
                    "child_key" => array(1) (
                        0 => string(9) "id_status"
                    )
                )
                protected cache => NULL
            }
        )
    }
    public golf => object Model_Leap_Golf(5) {
        protected adaptors => array(0) 
        protected aliases => array(0) 
        protected fields => array(13) (
            "id" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => integer 0
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 1
            }
            "nom" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(20) "Golf Club de Bourbon"
            }
            "adresse" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => NULL
            }
            "cp" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(5) "97419"
            }
            "ville" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(21) "Etang-Salé les bains"
            }
            "pays" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(8) "Réunion"
            }
            "intervalle" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 20
            }
            "heure_ouverture" => object DB_ORM_Field_DateTime(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                )
                protected value => string(19) "1970-01-01 06:00:00"
            }
            "heure_fermeture" => object DB_ORM_Field_DateTime(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                )
                protected value => string(19) "1970-01-01 18:30:00"
            }
            "smtp_host" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 255
                )
                protected value => string(14) "smtp.gmail.com"
            }
            "smtp_port" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 465
            }
            "smtp_username" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(25) "easygolfpack@cbleuapp.com"
            }
            "smtp_password" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(15) "easygolfpack974"
            }
        )
        protected metadata => array(2) (
            "loaded" => bool TRUE
            "saved" => string(40) "931a65dcd1736fea7e86a2ec092683f82f39cb01"
        )
        protected relations => array(0) 
    }
    public golf_rules => object DB_ResultSet(4) {
        protected records => array(7) (
            0 => array(3) (
                "rule" => string(31) "fenetre_reservation_heures_supp"
                "value" => string(1) "3"
                "description" => string(93) "Nombre d'heures avant minuit pour prendre les rservations pour les jours suivants (en heures)"
            )
            1 => array(3) (
                "rule" => string(25) "fenetre_reservation_jours"
                "value" => string(1) "4"
                "description" => string(64) "Nombres de jours  venir pour prendre les rservations (en jours) "
            )
            2 => array(3) (
                "rule" => string(11) "max_players"
                "value" => string(1) "4"
                "description" => string(36) "Nombre maximum de joueurs par partie"
            )
            3 => array(3) (
                "rule" => string(11) "nb_parcours"
                "value" => string(1) "2"
                "description" => string(61) "Nombre de parcours (de 9 trous) pouvant constituer une partie"
            )
            4 => array(3) (
                "rule" => string(21) "resa_provisoire_admin"
                "value" => string(4) "3600"
                "description" => string(141) "Dure de blocage de la rservation provisoire lors de l'ouvertue du formulaire de rservation (ou wizard) pour les administrateurs &nbsp;&hellip;"
            )
            5 => array(3) (
                "rule" => string(22) "resa_provisoire_membre"
                "value" => string(3) "120"
                "description" => string(133) "Dure de blocage de la rservation provisoire lors de l'ouvertue du formulaire de rservation (ou wizard) pour les membres (en seco&nbsp;&hellip;"
            )
            6 => array(3) (
                "rule" => string(24) "resa_provisoire_visiteur"
                "value" => string(3) "300"
                "description" => string(122) "Dure de blocage de la rservation provisoire lors de l'utilisation du wizard de rservation pour les visiteurs (en secondes)"
            )
        )
        protected position => integer 0
        protected size => integer 7
        protected type => string(5) "array"
    }
    public ressources => object DB_ResultSet(4) {
        protected records => array(1) (
            0 => array(5) (
                "id" => string(1) "2"
                "ressource" => string(7) "Chariot"
                "qte_max_par_partie" => string(1) "4"
                "qte_stock" => string(2) "50"
                "id_golf" => string(1) "1"
            )
        )
        protected position => integer 0
        protected size => integer 1
        protected type => string(5) "array"
    }
    public parcours => object DB_ResultSet(4) {
        protected records => array(4) (
            0 => array(6) (
                "id" => string(1) "1"
                "nom_parcours" => string(21) "9 trous depart trou 1"
                "nb_trous_total" => string(1) "9"
                "trou_depart" => string(1) "1"
                "parcour_aller" => string(1) "1"
                "parcour_retour" => NULL
            )
            1 => array(6) (
                "id" => string(1) "2"
                "nom_parcours" => string(22) "9 trous depart trou 10"
                "nb_trous_total" => string(1) "9"
                "trou_depart" => string(2) "10"
                "parcour_aller" => string(1) "2"
                "parcour_retour" => NULL
            )
            2 => array(6) (
                "id" => string(1) "3"
                "nom_parcours" => string(22) "18 trous depart trou 1"
                "nb_trous_total" => string(2) "18"
                "trou_depart" => string(1) "1"
                "parcour_aller" => string(1) "1"
                "parcour_retour" => string(1) "2"
            )
            3 => array(6) (
                "id" => string(1) "4"
                "nom_parcours" => string(23) "18 trous depart trou 10"
                "nb_trous_total" => string(2) "18"
                "trou_depart" => string(2) "10"
                "parcour_aller" => string(1) "2"
                "parcour_retour" => string(1) "1"
            )
        )
        protected position => integer 0
        protected size => integer 4
        protected type => string(5) "array"
    }
    public type_parcours => object DB_ResultSet(4) {
        protected records => array(4) (
            0 => array(5) (
                "id" => string(1) "1"
                "trou_depart" => string(1) "1"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7200"
                "description" => string(22) "[1  -&gt;  9] trac normal"
            )
            1 => array(5) (
                "id" => string(1) "2"
                "trou_depart" => string(2) "10"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7800"
                "description" => string(20) "[10-&gt;18] trac normal"
            )
            2 => array(5) (
                "id" => string(1) "3"
                "trou_depart" => string(1) "1"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7800"
                "description" => string(21) "[1  -&gt;  9] trac InOut"
            )
            3 => array(5) (
                "id" => string(1) "4"
                "trou_depart" => string(2) "10"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7200"
                "description" => string(19) "[10-&gt;18] trac InOut"
            )
        )
        protected position => integer 0
        protected size => integer 4
        protected type => string(5) "array"
    }
    public pages => NULL
    public pageTitle => NULL
    public pageCSS => NULL
    public pageJS => NULL
    public pageBreadcrumbs => NULL
    protected _table_model => string(0) ""
    public template => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
    protected _route_name => string(7) "oscrudc"
    public auto_render => bool TRUE
    public request => object Request(19) {
        protected _requested_with => NULL
        protected _method => string(3) "GET"
        protected _protocol => string(8) "HTTP/1.1"
        protected _secure => bool FALSE
        protected _referrer => string(38) "http://gcb-smart:8090/admin/rolesusers"
        protected _route => object Route(5) {
            protected _filters => array(0) 
            protected _uri => string(32) "(&lt;controller&gt;(/&lt;action&gt;(/&lt;id&gt;)))"
            protected _regex => array(0) 
            protected _defaults => array(3) (
                "directory" => string(4) "golf"
                "controller" => string(3) "app"
                "action" => string(5) "index"
            )
            protected _route_regex => string(95) "#^(?:(?P&lt;controller&gt;[^/.,;?\n]++)(?:/(?P&lt;action&gt;[^/.,;?\n]++)(?:/(?P&lt;id&gt;[^/.,;?\n]++))?)?)?$#uD"
        }
        protected _routes => array(0) 
        protected _header => object HTTP_Header(0) {
        }
        protected _body => NULL
        protected _directory => string(4) "Golf"
        protected _controller => string(3) "App"
        protected _action => string(5) "index"
        protected _uri => string(0) ""
        protected _external => bool FALSE
        protected _params => array(0) 
        protected _get => array(0) 
        protected _post => array(0) 
        protected _cookies => array(13) (
            "session" => NULL
            "crud_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "per_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "crud_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
            "per_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
            "hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
            "hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
            "crud_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
            "per_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
            "hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096" => NULL
            "hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        )
        protected _client => object Request_Client_Internal(9) {
            protected _previous_environment => NULL
            protected _cache => NULL
            protected _follow => bool FALSE
            protected _follow_headers => array(1) (
                0 => string(13) "Authorization"
            )
            protected _strict_redirect => bool TRUE
            protected _header_callbacks => array(1) (
                "Location" => string(34) "Request_Client::on_header_location"
            )
            protected _max_callback_depth => integer 5
            protected _callback_depth => integer 1
            protected _callback_params => array(0) 
        }
    }
    public response => object Response(5) {
        protected _status => integer 200
        protected _header => object HTTP_Header(0) {
        }
        protected _body => string(0) ""
        protected _cookies => array(0) 
        protected _protocol => string(8) "HTTP/1.1"
    }
}
						
										
				
													 92 
 93 			// Create a new instance of the controller
 94 			$controller = $class-&gt;newInstance($request, $response);
 95 
 96 			// Run the controller's execute() method
 97 			$response = $class-&gt;getMethod('execute')-&gt;invoke($controller);
 98 
 99 			if ( ! $response instanceof Response)
100 			{
101 				// Controller failed to return a Response.
102 				throw new Kohana_Exception('Controller failed to return a Response');

							
								
				
					
													SYSPATH/classes/Kohana/Request/Client.php [ 114 ]
											
					&raquo;
					Kohana_Request_Client_Internal->execute_request(arguments)
				
								
					
											
							0
							object Request(19) {
    protected _requested_with => NULL
    protected _method => string(3) "GET"
    protected _protocol => string(8) "HTTP/1.1"
    protected _secure => bool FALSE
    protected _referrer => string(38) "http://gcb-smart:8090/admin/rolesusers"
    protected _route => object Route(5) {
        protected _filters => array(0) 
        protected _uri => string(32) "(&lt;controller&gt;(/&lt;action&gt;(/&lt;id&gt;)))"
        protected _regex => array(0) 
        protected _defaults => array(3) (
            "directory" => string(4) "golf"
            "controller" => string(3) "app"
            "action" => string(5) "index"
        )
        protected _route_regex => string(95) "#^(?:(?P&lt;controller&gt;[^/.,;?\n]++)(?:/(?P&lt;action&gt;[^/.,;?\n]++)(?:/(?P&lt;id&gt;[^/.,;?\n]++))?)?)?$#uD"
    }
    protected _routes => array(0) 
    protected _header => object HTTP_Header(0) {
    }
    protected _body => NULL
    protected _directory => string(4) "Golf"
    protected _controller => string(3) "App"
    protected _action => string(5) "index"
    protected _uri => string(0) ""
    protected _external => bool FALSE
    protected _params => array(0) 
    protected _get => array(0) 
    protected _post => array(0) 
    protected _cookies => array(13) (
        "session" => NULL
        "crud_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "per_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "crud_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "per_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "crud_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "per_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096" => NULL
    )
    protected _client => object Request_Client_Internal(9) {
        protected _previous_environment => NULL
        protected _cache => NULL
        protected _follow => bool FALSE
        protected _follow_headers => array(1) (
            0 => string(13) "Authorization"
        )
        protected _strict_redirect => bool TRUE
        protected _header_callbacks => array(1) (
            "Location" => string(34) "Request_Client::on_header_location"
        )
        protected _max_callback_depth => integer 5
        protected _callback_depth => integer 1
        protected _callback_params => array(0) 
    }
}
						
											
							1
							object Response(5) {
    protected _status => integer 200
    protected _header => object HTTP_Header(0) {
    }
    protected _body => string(0) ""
    protected _cookies => array(0) 
    protected _protocol => string(8) "HTTP/1.1"
}
						
										
				
													109 		$orig_response = $response = Response::factory(array('_protocol' =&gt; $request-&gt;protocol()));
110 
111 		if (($cache = $this-&gt;cache()) instanceof HTTP_Cache)
112 			return $cache-&gt;execute($this, $request, $response);
113 
114 		$response = $this-&gt;execute_request($request, $response);
115 
116 		// Execute response callbacks
117 		foreach ($this-&gt;header_callbacks() as $header =&gt; $callback)
118 		{
119 			if ($response-&gt;headers($header))

							
								
				
					
													SYSPATH/classes/Kohana/Request.php [ 986 ]
											
					&raquo;
					Kohana_Request_Client->execute(arguments)
				
								
					
											
							0
							object Request(19) {
    protected _requested_with => NULL
    protected _method => string(3) "GET"
    protected _protocol => string(8) "HTTP/1.1"
    protected _secure => bool FALSE
    protected _referrer => string(38) "http://gcb-smart:8090/admin/rolesusers"
    protected _route => object Route(5) {
        protected _filters => array(0) 
        protected _uri => string(32) "(&lt;controller&gt;(/&lt;action&gt;(/&lt;id&gt;)))"
        protected _regex => array(0) 
        protected _defaults => array(3) (
            "directory" => string(4) "golf"
            "controller" => string(3) "app"
            "action" => string(5) "index"
        )
        protected _route_regex => string(95) "#^(?:(?P&lt;controller&gt;[^/.,;?\n]++)(?:/(?P&lt;action&gt;[^/.,;?\n]++)(?:/(?P&lt;id&gt;[^/.,;?\n]++))?)?)?$#uD"
    }
    protected _routes => array(0) 
    protected _header => object HTTP_Header(0) {
    }
    protected _body => NULL
    protected _directory => string(4) "Golf"
    protected _controller => string(3) "App"
    protected _action => string(5) "index"
    protected _uri => string(0) ""
    protected _external => bool FALSE
    protected _params => array(0) 
    protected _get => array(0) 
    protected _post => array(0) 
    protected _cookies => array(13) (
        "session" => NULL
        "crud_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "per_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "crud_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "per_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "crud_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "per_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096" => NULL
    )
    protected _client => object Request_Client_Internal(9) {
        protected _previous_environment => NULL
        protected _cache => NULL
        protected _follow => bool FALSE
        protected _follow_headers => array(1) (
            0 => string(13) "Authorization"
        )
        protected _strict_redirect => bool TRUE
        protected _header_callbacks => array(1) (
            "Location" => string(34) "Request_Client::on_header_location"
        )
        protected _max_callback_depth => integer 5
        protected _callback_depth => integer 1
        protected _callback_params => array(0) 
    }
}
						
										
				
													981 			throw new Request_Exception('Unable to execute :uri without a Kohana_Request_Client', array(
982 				':uri' =&gt; $this-&gt;_uri,
983 			));
984 		}
985 
986 		return $this-&gt;_client-&gt;execute($this);
987 	}
988 
989 	/**
990 	 * Returns whether this request is the initial request Kohana received.
991 	 * Can be used to test for sub requests.

							
								
				
					
													DOCROOT/index.php [ 118 ]
											
					&raquo;
					Kohana_Request->execute()
				
													113 	/**
114 	 * Execute the main request. A source of the URI can be passed, eg: $_SERVER['PATH_INFO'].
115 	 * If no source is specified, the URI will be automatically detected.
116 	 */
117 	echo Request::factory(TRUE, array(), FALSE)
118 		-&gt;execute()
119 		-&gt;send_headers(TRUE)
120 		-&gt;body();
121 }

							
							
	
	Environment
	
				Included files (177)
		
			
								
					DOCROOT/index.php
				
								
					APPPATH/bootstrap.php
				
								
					SYSPATH/classes/Kohana/Core.php
				
								
					SYSPATH/classes/Kohana.php
				
								
					SYSPATH/classes/I18n.php
				
								
					SYSPATH/classes/Kohana/I18n.php
				
								
					SYSPATH/classes/HTTP.php
				
								
					SYSPATH/classes/Kohana/HTTP.php
				
								
					SYSPATH/classes/Kohana/Exception.php
				
								
					SYSPATH/classes/Kohana/Kohana/Exception.php
				
								
					SYSPATH/classes/Log.php
				
								
					SYSPATH/classes/Kohana/Log.php
				
								
					SYSPATH/classes/Config.php
				
								
					SYSPATH/classes/Kohana/Config.php
				
								
					SYSPATH/classes/Log/File.php
				
								
					SYSPATH/classes/Kohana/Log/File.php
				
								
					SYSPATH/classes/Log/Writer.php
				
								
					SYSPATH/classes/Kohana/Log/Writer.php
				
								
					SYSPATH/classes/Config/File.php
				
								
					SYSPATH/classes/Kohana/Config/File.php
				
								
					SYSPATH/classes/Kohana/Config/File/Reader.php
				
								
					SYSPATH/classes/Kohana/Config/Reader.php
				
								
					SYSPATH/classes/Kohana/Config/Source.php
				
								
					SYSPATH/classes/Cookie.php
				
								
					SYSPATH/classes/Kohana/Cookie.php
				
								
					SYSPATH/classes/Route.php
				
								
					SYSPATH/classes/Kohana/Route.php
				
								
					SYSPATH/classes/Request.php
				
								
					SYSPATH/classes/Kohana/Request.php
				
								
					SYSPATH/classes/HTTP/Request.php
				
								
					SYSPATH/classes/Kohana/HTTP/Request.php
				
								
					SYSPATH/classes/HTTP/Message.php
				
								
					SYSPATH/classes/Kohana/HTTP/Message.php
				
								
					SYSPATH/classes/HTTP/Header.php
				
								
					SYSPATH/classes/Kohana/HTTP/Header.php
				
								
					SYSPATH/classes/Request/Client/Internal.php
				
								
					SYSPATH/classes/Kohana/Request/Client/Internal.php
				
								
					SYSPATH/classes/Request/Client.php
				
								
					SYSPATH/classes/Kohana/Request/Client.php
				
								
					SYSPATH/classes/Arr.php
				
								
					SYSPATH/classes/Kohana/Arr.php
				
								
					SYSPATH/classes/Response.php
				
								
					SYSPATH/classes/Kohana/Response.php
				
								
					SYSPATH/classes/HTTP/Response.php
				
								
					SYSPATH/classes/Kohana/HTTP/Response.php
				
								
					SYSPATH/classes/Profiler.php
				
								
					SYSPATH/classes/Kohana/Profiler.php
				
								
					APPPATH/classes/Controller/Golf/App.php
				
								
					APPPATH/classes/Controller/Golf/Main.php
				
								
					MODPATH/oscrud/classes/Controller/Oscrudc.php
				
								
					SYSPATH/classes/Controller/Template.php
				
								
					SYSPATH/classes/Kohana/Controller/Template.php
				
								
					SYSPATH/classes/Controller.php
				
								
					SYSPATH/classes/Kohana/Controller.php
				
								
					SYSPATH/classes/View.php
				
								
					SYSPATH/classes/Kohana/View.php
				
								
					MODPATH/notify/classes/Notify.php
				
								
					MODPATH/notify/classes/Notify/Core.php
				
								
					MODPATH/notify/config/notify.php
				
								
					SYSPATH/classes/Config/Group.php
				
								
					SYSPATH/classes/Kohana/Config/Group.php
				
								
					SYSPATH/classes/Session.php
				
								
					SYSPATH/classes/Kohana/Session.php
				
								
					SYSPATH/config/session.php
				
								
					MODPATH/leap/config/session.php
				
								
					MODPATH/database/config/session.php
				
								
					SYSPATH/classes/Session/Native.php
				
								
					SYSPATH/classes/Kohana/Session/Native.php
				
								
					MODPATH/leap/classes/Model/Leap/User.php
				
								
					MODPATH/leap/classes/Base/Model/Leap/User.php
				
								
					MODPATH/leap/classes/DB/ORM/Model.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Model.php
				
								
					MODPATH/leap/classes/Core/Object.php
				
								
					MODPATH/leap/classes/Base/Core/Object.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Adaptor/DateTime.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Adaptor/DateTime.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Adaptor.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Adaptor.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Integer.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php
				
								
					MODPATH/leap/classes/DB/ORM/Field.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/String.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/String.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Boolean.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Boolean.php
				
								
					MODPATH/leap/classes/DB/ORM/Relation/HasMany.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Relation/HasMany.php
				
								
					MODPATH/leap/classes/DB/ORM/Relation.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Relation.php
				
								
					MODPATH/leap/classes/DB/ResultSet.php
				
								
					MODPATH/leap/classes/Base/DB/ResultSet.php
				
								
					MODPATH/leap/classes/Model/Leap/User/Role.php
				
								
					MODPATH/leap/classes/Base/Model/Leap/User/Role.php
				
								
					MODPATH/leap/classes/DB/ORM/Relation/BelongsTo.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Relation/BelongsTo.php
				
								
					MODPATH/leap/classes/Model/Leap/Role.php
				
								
					MODPATH/leap/classes/Base/Model/Leap/Role.php
				
								
					MODPATH/notify/views/notify/bootstrap.php
				
								
					MODPATH/auth/classes/Auth.php
				
								
					MODPATH/auth/classes/Kohana/Auth.php
				
								
					MODPATH/leap/config/auth.php
				
								
					MODPATH/auth/config/auth.php
				
								
					APPPATH/config/auth.php
				
								
					MODPATH/leap/classes/Auth/Leap.php
				
								
					MODPATH/leap/classes/Base/Auth/Leap.php
				
								
					MODPATH/leap/classes/DB/ORM.php
				
								
					MODPATH/leap/classes/Base/DB/ORM.php
				
								
					MODPATH/leap/classes/DB/ORM/Select/Proxy.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Select/Proxy.php
				
								
					MODPATH/leap/classes/DB/SQL/Statement.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Statement.php
				
								
					MODPATH/leap/classes/DB/DataSource.php
				
								
					MODPATH/leap/classes/Base/DB/DataSource.php
				
								
					MODPATH/leap/config/database.php
				
								
					MODPATH/database/config/database.php
				
								
					APPPATH/config/database.php
				
								
					MODPATH/leap/classes/DB/MySQL/Select/Builder.php
				
								
					MODPATH/leap/classes/Base/DB/MySQL/Select/Builder.php
				
								
					MODPATH/leap/classes/DB/SQL/Select/Builder.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Select/Builder.php
				
								
					MODPATH/leap/classes/DB/SQL/Builder.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Builder.php
				
								
					MODPATH/leap/classes/DB/MySQL/Expression.php
				
								
					MODPATH/leap/classes/Base/DB/MySQL/Expression.php
				
								
					MODPATH/leap/classes/DB/SQL/Expression/Interface.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Expression/Interface.php
				
								
					MODPATH/database/classes/Database/Expression.php
				
								
					MODPATH/database/classes/Kohana/Database/Expression.php
				
								
					MODPATH/leap/classes/DB/SQL/Operator.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Operator.php
				
								
					MODPATH/leap/classes/DB/Connection/Pool.php
				
								
					MODPATH/leap/classes/Base/DB/Connection/Pool.php
				
								
					MODPATH/leap/classes/DB/Connection.php
				
								
					MODPATH/leap/classes/Base/DB/Connection.php
				
								
					MODPATH/leap/classes/DB/MySQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/Base/DB/MySQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/DB/SQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/DB/SQL/Connector.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Connector.php
				
								
					APPPATH/classes/Model/Leap/Golf.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/DateTime.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/DateTime.php
				
								
					MODPATH/leap/classes/DB/SQL.php
				
								
					MODPATH/leap/classes/Base/DB/SQL.php
				
								
					MODPATH/leap/classes/DB/SQL/Select/Proxy.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Select/Proxy.php
				
								
					APPPATH/views/egp_template.php
				
								
					APPPATH/views/inc/init.php
				
								
					APPPATH/views/lib/config.php
				
								
					APPPATH/views/lib/func.global.php
				
								
					APPPATH/views/lib/smartui/class.smartutil.php
				
								
					APPPATH/views/lib/smartui/class.smartui.php
				
								
					APPPATH/views/lib/smartui/class.smartui-widget.php
				
								
					APPPATH/views/lib/smartui/class.smartui-datatable.php
				
								
					APPPATH/views/lib/smartui/class.smartui-button.php
				
								
					APPPATH/views/lib/smartui/class.smartui-tab.php
				
								
					APPPATH/views/lib/smartui/class.smartui-accordion.php
				
								
					APPPATH/views/lib/smartui/class.smartui-carousel.php
				
								
					APPPATH/views/lib/smartui/class.smartui-smartform.php
				
								
					APPPATH/views/lib/smartui/class.smartui-nav.php
				
								
					APPPATH/views/lib/class.html-indent.php
				
								
					APPPATH/views/lib/class.parsedown.php
				
								
					APPPATH/views/inc/config.ui.php
				
								
					APPPATH/views/inc/header.php
				
								
					SYSPATH/classes/Debug.php
				
								
					SYSPATH/classes/Kohana/Debug.php
				
								
					SYSPATH/classes/Date.php
				
								
					SYSPATH/classes/Kohana/Date.php
				
								
					SYSPATH/views/kohana/error.php
				
								
					SYSPATH/i18n/fr.php
				
								
					APPPATH/i18n/fr.php
				
								
					SYSPATH/classes/UTF8.php
				
								
					SYSPATH/classes/Kohana/UTF8.php
				
								
					SYSPATH/classes/View/Exception.php
				
								
					SYSPATH/classes/Kohana/View/Exception.php
				
							
		
				Loaded extensions (54)
		
			
								
					Core
				
								
					date
				
								
					ereg
				
								
					libxml
				
								
					openssl
				
								
					pcre
				
								
					sqlite3
				
								
					zlib
				
								
					bcmath
				
								
					bz2
				
								
					calendar
				
								
					ctype
				
								
					curl
				
								
					dom
				
								
					hash
				
								
					fileinfo
				
								
					filter
				
								
					ftp
				
								
					gd
				
								
					SPL
				
								
					iconv
				
								
					intl
				
								
					json
				
								
					ldap
				
								
					mbstring
				
								
					mysql
				
								
					mysqli
				
								
					session
				
								
					PDO
				
								
					pdo_sqlite
				
								
					standard
				
								
					posix
				
								
					Reflection
				
								
					Phar
				
								
					SimpleXML
				
								
					soap
				
								
					sockets
				
								
					exif
				
								
					tokenizer
				
								
					wddx
				
								
					xml
				
								
					xmlreader
				
								
					xmlwriter
				
								
					xsl
				
								
					zip
				
								
					apache2handler
				
								
					imap
				
								
					gettext
				
								
					mcrypt
				
								
					yaz
				
								
					pgsql
				
								
					pdo_pgsql
				
								
					pdo_mysql
				
								
					xdebug
				
							
		
						$_SESSION
		
			
								
					last_active
					integer 1430478343
				
								
					user
					object Model_Leap_User(5) {
    protected adaptors => array(2) (
        "last_login_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(2) (
                "field" => string(10) "last_login"
                "format" => string(11) "Y-m-d H:i:s"
            )
        }
        "new_password_requested_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(2) (
                "field" => string(22) "new_password_requested"
                "format" => string(11) "Y-m-d H:i:s"
            )
        }
    )
    protected aliases => array(0) 
    protected fields => array(23) (
        "id" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => integer 0
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool TRUE
                "range" => array(2) (
                    "lower_bound" => integer 0
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => integer 145
        }
        "email" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => string(0) ""
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 254
            )
            protected value => string(24) "contact@golf-bourbon.com"
        }
        "username" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => string(0) ""
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 32
            )
            protected value => string(0) ""
        }
        "password" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => string(0) ""
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 64
            )
            protected value => string(64) "db844ad71b412b511d56b11068ec006386a9932c15064f8301d4b03e2e5a6cbd"
        }
        "firstname" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 35
            )
            protected value => string(11) "Secretariat"
        }
        "lastname" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 50
            )
            protected value => string(12) "GOLF BOURBON"
        }
        "activated" => object DB_ORM_Field_Boolean(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "control" => string(8) "checkbox"
                "default" => bool TRUE
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "boolean"
            )
            protected value => bool TRUE
        }
        "banned" => object DB_ORM_Field_Boolean(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "control" => string(8) "checkbox"
                "default" => bool FALSE
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "boolean"
            )
            protected value => bool FALSE
        }
        "ban_reason" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 255
            )
            protected value => NULL
        }
        "new_password_key" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 64
            )
            protected value => NULL
        }
        "new_password_requested" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool FALSE
                "range" => array(2) (
                    "lower_bound" => float -9,22337203685E+18
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => NULL
        }
        "new_email" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 254
            )
            protected value => NULL
        }
        "new_email_key" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 64
            )
            protected value => NULL
        }
        "logins" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => integer 0
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 10
                "unsigned" => bool TRUE
                "range" => array(2) (
                    "lower_bound" => integer 0
                    "upper_bound" => integer 2147483647
                )
            )
            protected value => integer 3116
        }
        "last_login" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 10
                "unsigned" => bool TRUE
                "range" => array(2) (
                    "lower_bound" => integer 0
                    "upper_bound" => integer 2147483647
                )
            )
            protected value => integer 1430212803
        }
        "last_ip" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 39
            )
            protected value => string(3) "::1"
        }
        "indgolf" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 10
            )
            protected value => string(1) "0"
        }
        "adresse" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 200
            )
            protected value => NULL
        }
        "cp" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 10
            )
            protected value => NULL
        }
        "ville" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 100
            )
            protected value => NULL
        }
        "telephone" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 25
            )
            protected value => NULL
        }
        "id_pays" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool FALSE
                "range" => array(2) (
                    "lower_bound" => float -9,22337203685E+18
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => NULL
        }
        "id_status" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool FALSE
                "range" => array(2) (
                    "lower_bound" => float -9,22337203685E+18
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => integer 1
        }
    )
    protected metadata => array(2) (
        "loaded" => bool TRUE
        "saved" => string(40) "e15cea14d351c743e5e34612ab730035adb20cc8"
    )
    protected relations => array(3) (
        "user_roles" => object DB_ORM_Relation_HasMany(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "type" => string(8) "has_many"
                "parent_model" => string(15) "Model_Leap_User"
                "parent_key" => array(1) (
                    0 => string(2) "id"
                )
                "child_model" => string(20) "Model_Leap_User_Role"
                "child_key" => array(1) (
                    0 => string(7) "user_id"
                )
                "options" => array(0) 
            )
            protected cache => object DB_ResultSet(4) {
                protected records => array(1) (
                    0 => object Model_Leap_User_Role(5) {
                        protected adaptors => array(0) 
                        protected aliases => array(0) 
                        protected fields => array(3) (
                            "user_id" => object DB_ORM_Field_Integer(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(9) (
                                    "control" => string(4) "auto"
                                    "default" => integer 0
                                    "modified" => bool TRUE
                                    "nullable" => bool FALSE
                                    "savable" => bool TRUE
                                    "type" => string(7) "integer"
                                    "max_length" => integer 10
                                    "unsigned" => bool TRUE
                                    "range" => array(2) (
                                        "lower_bound" => integer 0
                                        "upper_bound" => integer 2147483647
                                    )
                                )
                                protected value => integer 145
                            }
                            "role_id" => object DB_ORM_Field_Integer(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(9) (
                                    "control" => string(4) "auto"
                                    "default" => integer 0
                                    "modified" => bool TRUE
                                    "nullable" => bool FALSE
                                    "savable" => bool TRUE
                                    "type" => string(7) "integer"
                                    "max_length" => integer 10
                                    "unsigned" => bool TRUE
                                    "range" => array(2) (
                                        "lower_bound" => integer 0
                                        "upper_bound" => integer 2147483647
                                    )
                                )
                                protected value => integer 14
                            }
                            "id" => object DB_ORM_Field_Integer(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(9) (
                                    "control" => string(4) "auto"
                                    "default" => integer 0
                                    "modified" => bool TRUE
                                    "nullable" => bool FALSE
                                    "savable" => bool TRUE
                                    "type" => string(7) "integer"
                                    "max_length" => integer 11
                                    "unsigned" => bool FALSE
                                    "range" => array(2) (
                                        "lower_bound" => float -9,22337203685E+18
                                        "upper_bound" => integer 9223372036854775807
                                    )
                                )
                                protected value => integer 11
                            }
                        )
                        protected metadata => array(2) (
                            "loaded" => bool TRUE
                            "saved" => NULL
                        )
                        protected relations => array(2) (
                            "user" => object DB_ORM_Relation_BelongsTo(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(5) (
                                    "type" => string(10) "belongs_to"
                                    "parent_model" => string(15) "Model_Leap_User"
                                    "parent_key" => array(1) (
                                        0 => string(2) "id"
                                    )
                                    "child_model" => string(20) "Model_Leap_User_Role"
                                    "child_key" => array(1) (
                                        0 => string(7) "user_id"
                                    )
                                )
                                protected cache => NULL
                            }
                            "role" => object DB_ORM_Relation_BelongsTo(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(5) (
                                    "type" => string(10) "belongs_to"
                                    "parent_model" => string(15) "Model_Leap_Role"
                                    "parent_key" => array(1) (
                                        0 => string(2) "id"
                                    )
                                    "child_model" => string(20) "Model_Leap_User_Role"
                                    "child_key" => array(1) (
                                        0 => string(7) "role_id"
                                    )
                                )
                                protected cache => object Model_Leap_Role(5) {
                                    protected adaptors => array(0) 
                                    protected aliases => array(0) 
                                    protected fields => array(3) (
                                        "id" => object DB_ORM_Field_Integer(3) {
                                            ...
                                        }
                                        "name" => object DB_ORM_Field_String(3) {
                                            ...
                                        }
                                        "description" => object DB_ORM_Field_String(3) {
                                            ...
                                        }
                                    )
                                    protected metadata => array(2) (
                                        "loaded" => bool TRUE
                                        "saved" => NULL
                                    )
                                    protected relations => array(1) (
                                        "user_roles" => object DB_ORM_Relation_HasMany(3) {
                                            ...
                                        }
                                    )
                                }
                            }
                        )
                    }
                )
                protected position => integer 1
                protected size => integer 1
                protected type => string(20) "Model_Leap_User_Role"
            }
        }
        "user_token" => object DB_ORM_Relation_HasMany(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "type" => string(8) "has_many"
                "parent_model" => string(15) "Model_Leap_User"
                "parent_key" => array(1) (
                    0 => string(2) "id"
                )
                "child_model" => string(21) "Model_Leap_User_Token"
                "child_key" => array(1) (
                    0 => string(7) "user_id"
                )
                "options" => array(0) 
            )
            protected cache => NULL
        }
        "status" => object DB_ORM_Relation_BelongsTo(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(5) (
                "type" => string(10) "belongs_to"
                "parent_model" => string(22) "Model_Leap_user_status"
                "parent_key" => array(1) (
                    0 => string(2) "id"
                )
                "child_model" => string(15) "Model_Leap_User"
                "child_key" => array(1) (
                    0 => string(9) "id_status"
                )
            )
            protected cache => NULL
        }
    )
}
				
							
		
												$_COOKIE
		
			
								
					session
					string(32) "a724dbfc3620945f2ab34bb366437e94"
				
								
					crud_page_e3aa0e15dc69c64ff5bd114fa152475a
					string(1) "1"
				
								
					per_page_e3aa0e15dc69c64ff5bd114fa152475a
					string(3) "100"
				
								
					hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a
					string(0) ""
				
								
					hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a
					string(0) ""
				
								
					crud_page_ab2af15b364b3c86d83b7aaf75ca61bc
					string(1) "1"
				
								
					per_page_ab2af15b364b3c86d83b7aaf75ca61bc
					string(2) "10"
				
								
					hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc
					string(3) "asc"
				
								
					hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc
					string(9) "sb61fae3a"
				
								
					crud_page_18d9f6472ca1951f3a179d6cfc35f096
					string(1) "1"
				
								
					per_page_18d9f6472ca1951f3a179d6cfc35f096
					string(2) "50"
				
								
					hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096
					string(3) "asc"
				
								
					hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096
					string(9) "s84566833"
				
							
		
						$_SERVER
		
			
								
					KOHANA_ENV
					string(11) "DEVELOPMENT"
				
								
					HTTP_HOST
					string(14) "gcb-smart:8090"
				
								
					HTTP_CONNECTION
					string(10) "keep-alive"
				
								
					HTTP_PRAGMA
					string(8) "no-cache"
				
								
					HTTP_CACHE_CONTROL
					string(8) "no-cache"
				
								
					HTTP_ACCEPT
					string(74) "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8"
				
								
					HTTP_USER_AGENT
					string(120) "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36"
				
								
					HTTP_REFERER
					string(38) "http://gcb-smart:8090/admin/rolesusers"
				
								
					HTTP_ACCEPT_ENCODING
					string(19) "gzip, deflate, sdch"
				
								
					HTTP_ACCEPT_LANGUAGE
					string(35) "fr-FR,fr;q=0.8,en-US;q=0.6,en;q=0.4"
				
								
					HTTP_COOKIE
					string(644) "session=a724dbfc3620945f2ab34bb366437e94; crud_page_e3aa0e15dc69c64ff5bd114fa152475a=1; per_page_e3aa0e15dc69c64ff5bd114fa152475&nbsp;&hellip;"
				
								
					PATH
					string(29) "/usr/bin:/bin:/usr/sbin:/sbin"
				
								
					SERVER_SIGNATURE
					string(0) ""
				
								
					SERVER_SOFTWARE
					string(6) "Apache"
				
								
					SERVER_NAME
					string(9) "gcb-smart"
				
								
					SERVER_ADDR
					string(3) "::1"
				
								
					SERVER_PORT
					string(4) "8090"
				
								
					REMOTE_ADDR
					string(3) "::1"
				
								
					DOCUMENT_ROOT
					string(40) "/Users/cesar/Documents/DEV/GIT/gcb-smart"
				
								
					SERVER_ADMIN
					string(15) "you@example.com"
				
								
					SCRIPT_FILENAME
					string(50) "/Users/cesar/Documents/DEV/GIT/gcb-smart/index.php"
				
								
					REMOTE_PORT
					string(5) "54356"
				
								
					GATEWAY_INTERFACE
					string(7) "CGI/1.1"
				
								
					SERVER_PROTOCOL
					string(8) "HTTP/1.1"
				
								
					REQUEST_METHOD
					string(3) "GET"
				
								
					QUERY_STRING
					string(0) ""
				
								
					REQUEST_URI
					string(1) "/"
				
								
					SCRIPT_NAME
					string(10) "/index.php"
				
								
					PHP_SELF
					string(10) "/index.php"
				
								
					REQUEST_TIME_FLOAT
					float 1430479493,61
				
								
					REQUEST_TIME
					integer 1430479493
				
								
					argv
					array(0) 
				
								
					argc
					integer 0
				
							
		
			

 could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 15:24:53 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename(Object(View))
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct(Object(View), NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory(Object(View))
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(31): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Main.php(40): Controller_Oscrudc->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(22): Controller_Golf_Main->before()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_App->before()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 15:24:56 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:24:56 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:24:58 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:24:58 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `s84566833` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:25:01 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:25:01 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:25:03 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:25:03 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `s84566833` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:25:06 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:25:06 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:25:07 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:25:07 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:25:11 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:25:11 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10 OFFSET 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:25:41 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: page_title ~ APPPATH/views/inc/header.php [ 9 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:9
2015-05-01 15:25:41 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 9, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(25): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Core.php(668): Kohana_View->__toString()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(255): Kohana_Core::find_file('views', Object(View))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename(Object(View))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct(Object(View), NULL)
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory(Object(View))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(31): Kohana_Controller_Template->before()
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Main.php(40): Controller_Oscrudc->before()
#12 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(22): Controller_Golf_Main->before()
#13 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_App->before()
#14 [internal function]: Kohana_Controller->execute()
#15 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#16 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#19 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:9
2015-05-01 15:25:41 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: page_html_prop ~ APPPATH/views/inc/header.php [ 4 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:4
2015-05-01 15:25:41 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 4, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(25): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 [internal function]: Kohana_View->__toString()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/I18n.php(164): strtr('The requested v...', Array)
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Kohana/Exception.php(53): __('The requested v...', Array)
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(259): Kohana_Kohana_Exception->__construct('The requested v...', Array)
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename(Object(View))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct(Object(View), NULL)
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory(Object(View))
#12 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(31): Kohana_Controller_Template->before()
#13 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Main.php(40): Controller_Oscrudc->before()
#14 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(22): Controller_Golf_Main->before()
#15 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_App->before()
#16 [internal function]: Kohana_Controller->execute()
#17 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#18 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#19 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#20 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#21 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:4
2015-05-01 15:25:41 --- EMERGENCY: View_Exception [ 0 ]: The requested view 
#kohana_error { background: #ddd; font-size: 1em; font-family:sans-serif; text-align: left; color: #111; }
#kohana_error h1,
#kohana_error h2 { margin: 0; padding: 1em; font-size: 1em; font-weight: normal; background: #911; color: #fff; }
	#kohana_error h1 a,
	#kohana_error h2 a { color: #fff; }
#kohana_error h2 { background: #222; }
#kohana_error h3 { margin: 0; padding: 0.4em 0 0; font-size: 1em; font-weight: normal; }
#kohana_error p { margin: 0; padding: 0.2em 0; }
#kohana_error a { color: #1b323b; }
#kohana_error pre { overflow: auto; white-space: pre-wrap; }
#kohana_error table { width: 100%; display: block; margin: 0 0 0.4em; padding: 0; border-collapse: collapse; background: #fff; }
	#kohana_error table td { border: solid 1px #ddd; text-align: left; vertical-align: top; padding: 0.4em; }
#kohana_error div.content { padding: 0.4em 1em 1em; overflow: hidden; }
#kohana_error pre.source { margin: 0 0 1em; padding: 0.4em; background: #fff; border: dotted 1px #b7c680; line-height: 1.2em; }
	#kohana_error pre.source span.line { display: block; }
	#kohana_error pre.source span.highlight { background: #f0eb96; }
		#kohana_error pre.source span.line span.number { color: #666; }
#kohana_error ol.trace { display: block; margin: 0 0 0 2em; padding: 0; list-style: decimal; }
	#kohana_error ol.trace li { margin: 0; padding: 0; }
.js .collapsed { display: none; }


document.documentElement.className = document.documentElement.className + ' js';
function koggle(elem)
{
	elem = document.getElementById(elem);

	if (elem.style && elem.style['display'])
		// Only works with the "style" attr
		var disp = elem.style['display'];
	else if (elem.currentStyle)
		// For MSIE, naturally
		var disp = elem.currentStyle['display'];
	else if (window.getComputedStyle)
		// For most other browsers
		var disp = document.defaultView.getComputedStyle(elem, null).getPropertyValue('display');

	// Toggle the state of the "display" style
	elem.style.display = disp == 'block' ? 'none' : 'block';
	return false;
}


	ErrorException [ Notice ]: Undefined variable: page_html_prop
	
		APPPATH/views/inc/header.php [ 4 ]
		1 &lt;!DOCTYPE html&gt;
2 &lt;html lang="en-us" &lt;?php echo implode(' ', array_map(function($prop, $value) {
3 			return $prop.'="'.$value.'"';
4 		}, array_keys($page_html_prop), $page_html_prop)) ;?&gt;&gt;
5 	&lt;head&gt;
6 		&lt;meta charset="utf-8"&gt;
7 		&lt;!--&lt;meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"&gt;--&gt;
8 
9 		&lt;title&gt; &lt;?php echo $page_title != "" ? $page_title." - " : ""; ?&gt;EasyGolfPack(c) &lt;/title&gt;
		
					
				
					
													APPPATH/views/inc/header.php [ 4 ]
											
					&raquo;
					Kohana_Core::error_handler(arguments)
				
								
					
											
							0
							integer 8
						
											
							1
							string(34) "Undefined variable: page_html_prop"
						
											
							2
							string(73) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php"
						
											
							3
							integer 4
						
											
							4
							array(3) (
    "kohana_view_filename" => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    "kohana_view_data" => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
    "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
)
						
										
				
													1 &lt;!DOCTYPE html&gt;
2 &lt;html lang="en-us" &lt;?php echo implode(' ', array_map(function($prop, $value) {
3 			return $prop.'="'.$value.'"';
4 		}, array_keys($page_html_prop), $page_html_prop)) ;?&gt;&gt;
5 	&lt;head&gt;
6 		&lt;meta charset="utf-8"&gt;
7 		&lt;!--&lt;meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"&gt;--&gt;
8 
9 		&lt;title&gt; &lt;?php echo $page_title != "" ? $page_title." - " : ""; ?&gt;EasyGolfPack(c) &lt;/title&gt;

							
								
				
					
													APPPATH/views/egp_template.php [ 25 ]
											
					&raquo;
					include(arguments)
				
								
					
											
							0
							string(73) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php"
						
										
				
													20 	//include header
21 	//you can add your custom css in $page_css array.
22 	//Note: all css files are inside css/ folder
23 	// $page_css[] = "your_style.css";
24 
25 	include(APPPATH."views/inc/header.php");
26 ?&gt;
27 
28 &lt;div id="divForJs"&gt;
29 	&lt;form id="dataForJs"&gt;
30 		&lt;?php foreach(Helpers_InputForJs::get() as $phpvar =&gt; $hiddenInput) { ?&gt;

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 61 ]
											
					&raquo;
					include(arguments)
				
								
					
											
							0
							string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
						
										
				
													56 		ob_start();
57 
58 		try
59 		{
60 			// Load the view within the current scope
61 			include $kohana_view_filename;
62 		}
63 		catch (Exception $e)
64 		{
65 			// Delete the output buffer
66 			ob_end_clean();

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 348 ]
											
					&raquo;
					Kohana_View::capture(arguments)
				
								
					
											
							0
							string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
						
											
							1
							array(1) (
    "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
)
						
										
				
													343 		{
344 			throw new View_Exception('You must set the file to use within your view before rendering');
345 		}
346 
347 		// Combine local and global data and capture the output
348 		return View::capture($this-&gt;_file, $this-&gt;_data);
349 	}
350 
351 }

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 228 ]
											
					&raquo;
					Kohana_View->render()
				
													223 	 */
224 	public function __toString()
225 	{
226 		try
227 		{
228 			return $this-&gt;render();
229 		}
230 		catch (Exception $e)
231 		{
232 			/**
233 			 * Display the exception message.

							
								
				
					
													{PHP internal call}
											
					&raquo;
					Kohana_View->__toString()
				
											
								
				
					
													SYSPATH/classes/Kohana/I18n.php [ 164 ]
											
					&raquo;
					strtr(arguments)
				
								
					
											
							str
							string(43) "The requested view :file could not be found"
						
											
							from
							array(1) (
    ":file" => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
)
						
										
				
													159 			// The message and target languages are different
160 			// Get the translation for this message
161 			$string = I18n::get($string);
162 		}
163 
164 		return empty($values) ? $string : strtr($string, $values);
165 	}
166 }

							
								
				
					
													SYSPATH/classes/Kohana/Kohana/Exception.php [ 53 ]
											
					&raquo;
					__(arguments)
				
								
					
											
							string
							string(43) "The requested view :file could not be found"
						
											
							values
							array(1) (
    ":file" => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
)
						
										
				
													48 	 * @return  void
49 	 */
50 	public function __construct($message = "", array $variables = NULL, $code = 0, Exception $previous = NULL)
51 	{
52 		// Set the message
53 		$message = __($message, $variables);
54 
55 		// Pass the message and integer code to the parent
56 		parent::__construct($message, (int) $code, $previous);
57 
58 		// Save the unmodified code

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 259 ]
											
					&raquo;
					Kohana_Kohana_Exception->__construct(arguments)
				
								
					
											
							0
							string(43) "The requested view :file could not be found"
						
											
							1
							array(1) (
    ":file" => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
)
						
										
				
													254 	{
255 		if (($path = Kohana::find_file('views', $file)) === FALSE)
256 		{
257 			throw new View_Exception('The requested view :file could not be found', array(
258 				':file' =&gt; $file,
259 			));
260 		}
261 
262 		// Store the file path locally
263 		$this-&gt;_file = $path;
264 

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 137 ]
											
					&raquo;
					Kohana_View->set_filename(arguments)
				
								
					
											
							0
							object View(2) {
    protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    protected _data => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
}
						
										
				
													132 	 */
133 	public function __construct($file = NULL, array $data = NULL)
134 	{
135 		if ($file !== NULL)
136 		{
137 			$this-&gt;set_filename($file);
138 		}
139 
140 		if ($data !== NULL)
141 		{
142 			// Add the values to the current data

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 30 ]
											
					&raquo;
					Kohana_View->__construct(arguments)
				
								
					
											
							0
							object View(2) {
    protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    protected _data => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
}
						
											
							1
							NULL
						
										
				
													25 	 * @param   array   $data   array of values
26 	 * @return  View
27 	 */
28 	public static function factory($file = NULL, array $data = NULL)
29 	{
30 		return new View($file, $data);
31 	}
32 
33 	/**
34 	 * Captures the output that is generated when a view is included.
35 	 * The view data will be extracted to make local variables. This method

							
								
				
					
													SYSPATH/classes/Kohana/Controller/Template.php [ 33 ]
											
					&raquo;
					Kohana_View::factory(arguments)
				
								
					
											
							0
							object View(2) {
    protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    protected _data => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
}
						
										
				
													28 		parent::before();
29 
30 		if ($this-&gt;auto_render === TRUE)
31 		{
32 			// Load the template
33 			$this-&gt;template = View::factory($this-&gt;template);
34 		}
35 	}
36 
37 	/**
38 	 * Assigns the template [View] as the request response.

							
								
				
					
													MODPATH/oscrud/classes/Controller/Oscrudc.php [ 31 ]
											
					&raquo;
					Kohana_Controller_Template->before()
				
													26 		// 	        $template = $this-&gt;template;
27 		// 	//echo 'site normal';
28 		// }
29         // This is important and for abstraction, since we're extending a class and its functions we need to make sure we still execute its before(); function
30         // This will load the view you need from /views/template.php or /views/template2.php depending on what your controller specifies into $this-&gt;template
31         parent::before();
32 
33         // $this-&gt;template-&gt;header = View::factory('admin/header');  // Loads default header file from our views folder /views/admin/header.php
34         // $this-&gt;template-&gt;content = View::factory('admin/content');  // Loads default index file from our views folder
35         // $this-&gt;template-&gt;footer = View::factory('admin/footer');  // Loads default footer file from our views folder
36 	

							
								
				
					
													APPPATH/classes/Controller/Golf/Main.php [ 40 ]
											
					&raquo;
					Controller_Oscrudc->before()
				
													35 		$this-&gt;ressources 		= DB_SQL::select("default")-&gt;from("ressources")
36 			-&gt;where("id_golf", "=", $this-&gt;golf-&gt;id)
37 				-&gt;query();
38 		
39 		//////////////////////////////////////////////////////////
40 		parent::before();
41 		//////////////////////////////////////////////////////////
42 
43 		Helpers_Stylesheet::add('/assets/css/easygolfpack/egp_main.css');
44 		
45 		$this-&gt;pages = array(

							
								
				
					
													APPPATH/classes/Controller/Golf/App.php [ 22 ]
											
					&raquo;
					Controller_Golf_Main->before()
				
													17 		$this-&gt;template = View::factory('egp_template');		// Set the template as /views/public.php
18 
19 		$this-&gt;template-&gt;konotif = Notify::render();
20 		 
21 
22 		parent::before();	// execute before for parent Class
23 
24 	}	// before
25 	
26 	//////////////////////////////////////////////////////////
27 	// ACTION FUNCS											//

							
								
				
					
													SYSPATH/classes/Kohana/Controller.php [ 69 ]
											
					&raquo;
					Controller_Golf_App->before()
				
													64 	 * @return  Response
65 	 */
66 	public function execute()
67 	{
68 		// Execute the "before action" method
69 		$this-&gt;before();
70 
71 		// Determine the action to use
72 		$action = 'action_'.$this-&gt;request-&gt;action();
73 
74 		// If the action doesn't exist, it's a 404

							
								
				
					
													{PHP internal call}
											
					&raquo;
					Kohana_Controller->execute()
				
											
								
				
					
													SYSPATH/classes/Kohana/Request/Client/Internal.php [ 97 ]
											
					&raquo;
					ReflectionMethod->invoke(arguments)
				
								
					
											
							0
							object Controller_Golf_App(19) {
    public isLogged => bool TRUE
    public isAdmin => bool TRUE
    public user => object Model_Leap_User(5) {
        protected adaptors => array(2) (
            "last_login_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(2) (
                    "field" => string(10) "last_login"
                    "format" => string(11) "Y-m-d H:i:s"
                )
            }
            "new_password_requested_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(2) (
                    "field" => string(22) "new_password_requested"
                    "format" => string(11) "Y-m-d H:i:s"
                )
            }
        )
        protected aliases => array(0) 
        protected fields => array(23) (
            "id" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => integer 0
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool TRUE
                    "range" => array(2) (
                        "lower_bound" => integer 0
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 145
            }
            "email" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => string(0) ""
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 254
                )
                protected value => string(24) "contact@golf-bourbon.com"
            }
            "username" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => string(0) ""
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 32
                )
                protected value => string(0) ""
            }
            "password" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => string(0) ""
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 64
                )
                protected value => string(64) "db844ad71b412b511d56b11068ec006386a9932c15064f8301d4b03e2e5a6cbd"
            }
            "firstname" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 35
                )
                protected value => string(11) "Secretariat"
            }
            "lastname" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 50
                )
                protected value => string(12) "GOLF BOURBON"
            }
            "activated" => object DB_ORM_Field_Boolean(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(8) "checkbox"
                    "default" => bool TRUE
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "boolean"
                )
                protected value => bool TRUE
            }
            "banned" => object DB_ORM_Field_Boolean(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(8) "checkbox"
                    "default" => bool FALSE
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "boolean"
                )
                protected value => bool FALSE
            }
            "ban_reason" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 255
                )
                protected value => NULL
            }
            "new_password_key" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 64
                )
                protected value => NULL
            }
            "new_password_requested" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => NULL
            }
            "new_email" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 254
                )
                protected value => NULL
            }
            "new_email_key" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 64
                )
                protected value => NULL
            }
            "logins" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => integer 0
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 10
                    "unsigned" => bool TRUE
                    "range" => array(2) (
                        "lower_bound" => integer 0
                        "upper_bound" => integer 2147483647
                    )
                )
                protected value => integer 3116
            }
            "last_login" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 10
                    "unsigned" => bool TRUE
                    "range" => array(2) (
                        "lower_bound" => integer 0
                        "upper_bound" => integer 2147483647
                    )
                )
                protected value => integer 1430212803
            }
            "last_ip" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 39
                )
                protected value => string(3) "::1"
            }
            "indgolf" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 10
                )
                protected value => string(1) "0"
            }
            "adresse" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 200
                )
                protected value => NULL
            }
            "cp" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 10
                )
                protected value => NULL
            }
            "ville" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 100
                )
                protected value => NULL
            }
            "telephone" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 25
                )
                protected value => NULL
            }
            "id_pays" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => NULL
            }
            "id_status" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 1
            }
        )
        protected metadata => array(2) (
            "loaded" => bool TRUE
            "saved" => string(40) "e15cea14d351c743e5e34612ab730035adb20cc8"
        )
        protected relations => array(3) (
            "user_roles" => object DB_ORM_Relation_HasMany(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "type" => string(8) "has_many"
                    "parent_model" => string(15) "Model_Leap_User"
                    "parent_key" => array(1) (
                        0 => string(2) "id"
                    )
                    "child_model" => string(20) "Model_Leap_User_Role"
                    "child_key" => array(1) (
                        0 => string(7) "user_id"
                    )
                    "options" => array(0) 
                )
                protected cache => object DB_ResultSet(4) {
                    protected records => array(1) (
                        0 => object Model_Leap_User_Role(5) {
                            protected adaptors => array(0) 
                            protected aliases => array(0) 
                            protected fields => array(3) (
                                "user_id" => object DB_ORM_Field_Integer(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(9) (
                                        "control" => string(4) "auto"
                                        "default" => integer 0
                                        "modified" => bool TRUE
                                        "nullable" => bool FALSE
                                        "savable" => bool TRUE
                                        "type" => string(7) "integer"
                                        "max_length" => integer 10
                                        "unsigned" => bool TRUE
                                        "range" => array(2) (
                                            ...
                                        )
                                    )
                                    protected value => integer 145
                                }
                                "role_id" => object DB_ORM_Field_Integer(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(9) (
                                        "control" => string(4) "auto"
                                        "default" => integer 0
                                        "modified" => bool TRUE
                                        "nullable" => bool FALSE
                                        "savable" => bool TRUE
                                        "type" => string(7) "integer"
                                        "max_length" => integer 10
                                        "unsigned" => bool TRUE
                                        "range" => array(2) (
                                            ...
                                        )
                                    )
                                    protected value => integer 14
                                }
                                "id" => object DB_ORM_Field_Integer(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(9) (
                                        "control" => string(4) "auto"
                                        "default" => integer 0
                                        "modified" => bool TRUE
                                        "nullable" => bool FALSE
                                        "savable" => bool TRUE
                                        "type" => string(7) "integer"
                                        "max_length" => integer 11
                                        "unsigned" => bool FALSE
                                        "range" => array(2) (
                                            ...
                                        )
                                    )
                                    protected value => integer 11
                                }
                            )
                            protected metadata => array(2) (
                                "loaded" => bool TRUE
                                "saved" => NULL
                            )
                            protected relations => array(2) (
                                "user" => object DB_ORM_Relation_BelongsTo(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(5) (
                                        "type" => string(10) "belongs_to"
                                        "parent_model" => string(15) "Model_Leap_User"
                                        "parent_key" => array(1) (
                                            ...
                                        )
                                        "child_model" => string(20) "Model_Leap_User_Role"
                                        "child_key" => array(1) (
                                            ...
                                        )
                                    )
                                    protected cache => NULL
                                }
                                "role" => object DB_ORM_Relation_BelongsTo(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(5) (
                                        "type" => string(10) "belongs_to"
                                        "parent_model" => string(15) "Model_Leap_Role"
                                        "parent_key" => array(1) (
                                            ...
                                        )
                                        "child_model" => string(20) "Model_Leap_User_Role"
                                        "child_key" => array(1) (
                                            ...
                                        )
                                    )
                                    protected cache => object Model_Leap_Role(5) {
                                        protected adaptors => array(0) 
                                        protected aliases => array(0) 
                                        protected fields => array(3) (
                                            ...
                                        )
                                        protected metadata => array(2) (
                                            ...
                                        )
                                        protected relations => array(1) (
                                            ...
                                        )
                                    }
                                }
                            )
                        }
                    )
                    protected position => integer 1
                    protected size => integer 1
                    protected type => string(20) "Model_Leap_User_Role"
                }
            }
            "user_token" => object DB_ORM_Relation_HasMany(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "type" => string(8) "has_many"
                    "parent_model" => string(15) "Model_Leap_User"
                    "parent_key" => array(1) (
                        0 => string(2) "id"
                    )
                    "child_model" => string(21) "Model_Leap_User_Token"
                    "child_key" => array(1) (
                        0 => string(7) "user_id"
                    )
                    "options" => array(0) 
                )
                protected cache => NULL
            }
            "status" => object DB_ORM_Relation_BelongsTo(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(5) (
                    "type" => string(10) "belongs_to"
                    "parent_model" => string(22) "Model_Leap_user_status"
                    "parent_key" => array(1) (
                        0 => string(2) "id"
                    )
                    "child_model" => string(15) "Model_Leap_User"
                    "child_key" => array(1) (
                        0 => string(9) "id_status"
                    )
                )
                protected cache => NULL
            }
        )
    }
    public golf => object Model_Leap_Golf(5) {
        protected adaptors => array(0) 
        protected aliases => array(0) 
        protected fields => array(13) (
            "id" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => integer 0
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 1
            }
            "nom" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(20) "Golf Club de Bourbon"
            }
            "adresse" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => NULL
            }
            "cp" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(5) "97419"
            }
            "ville" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(21) "Etang-Salé les bains"
            }
            "pays" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(8) "Réunion"
            }
            "intervalle" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 20
            }
            "heure_ouverture" => object DB_ORM_Field_DateTime(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                )
                protected value => string(19) "1970-01-01 06:00:00"
            }
            "heure_fermeture" => object DB_ORM_Field_DateTime(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                )
                protected value => string(19) "1970-01-01 18:30:00"
            }
            "smtp_host" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 255
                )
                protected value => string(14) "smtp.gmail.com"
            }
            "smtp_port" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 465
            }
            "smtp_username" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(25) "easygolfpack@cbleuapp.com"
            }
            "smtp_password" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(15) "easygolfpack974"
            }
        )
        protected metadata => array(2) (
            "loaded" => bool TRUE
            "saved" => string(40) "931a65dcd1736fea7e86a2ec092683f82f39cb01"
        )
        protected relations => array(0) 
    }
    public golf_rules => object DB_ResultSet(4) {
        protected records => array(7) (
            0 => array(3) (
                "rule" => string(31) "fenetre_reservation_heures_supp"
                "value" => string(1) "3"
                "description" => string(93) "Nombre d'heures avant minuit pour prendre les rservations pour les jours suivants (en heures)"
            )
            1 => array(3) (
                "rule" => string(25) "fenetre_reservation_jours"
                "value" => string(1) "4"
                "description" => string(64) "Nombres de jours  venir pour prendre les rservations (en jours) "
            )
            2 => array(3) (
                "rule" => string(11) "max_players"
                "value" => string(1) "4"
                "description" => string(36) "Nombre maximum de joueurs par partie"
            )
            3 => array(3) (
                "rule" => string(11) "nb_parcours"
                "value" => string(1) "2"
                "description" => string(61) "Nombre de parcours (de 9 trous) pouvant constituer une partie"
            )
            4 => array(3) (
                "rule" => string(21) "resa_provisoire_admin"
                "value" => string(4) "3600"
                "description" => string(141) "Dure de blocage de la rservation provisoire lors de l'ouvertue du formulaire de rservation (ou wizard) pour les administrateurs &nbsp;&hellip;"
            )
            5 => array(3) (
                "rule" => string(22) "resa_provisoire_membre"
                "value" => string(3) "120"
                "description" => string(133) "Dure de blocage de la rservation provisoire lors de l'ouvertue du formulaire de rservation (ou wizard) pour les membres (en seco&nbsp;&hellip;"
            )
            6 => array(3) (
                "rule" => string(24) "resa_provisoire_visiteur"
                "value" => string(3) "300"
                "description" => string(122) "Dure de blocage de la rservation provisoire lors de l'utilisation du wizard de rservation pour les visiteurs (en secondes)"
            )
        )
        protected position => integer 0
        protected size => integer 7
        protected type => string(5) "array"
    }
    public ressources => object DB_ResultSet(4) {
        protected records => array(1) (
            0 => array(5) (
                "id" => string(1) "2"
                "ressource" => string(7) "Chariot"
                "qte_max_par_partie" => string(1) "4"
                "qte_stock" => string(2) "50"
                "id_golf" => string(1) "1"
            )
        )
        protected position => integer 0
        protected size => integer 1
        protected type => string(5) "array"
    }
    public parcours => object DB_ResultSet(4) {
        protected records => array(4) (
            0 => array(6) (
                "id" => string(1) "1"
                "nom_parcours" => string(21) "9 trous depart trou 1"
                "nb_trous_total" => string(1) "9"
                "trou_depart" => string(1) "1"
                "parcour_aller" => string(1) "1"
                "parcour_retour" => NULL
            )
            1 => array(6) (
                "id" => string(1) "2"
                "nom_parcours" => string(22) "9 trous depart trou 10"
                "nb_trous_total" => string(1) "9"
                "trou_depart" => string(2) "10"
                "parcour_aller" => string(1) "2"
                "parcour_retour" => NULL
            )
            2 => array(6) (
                "id" => string(1) "3"
                "nom_parcours" => string(22) "18 trous depart trou 1"
                "nb_trous_total" => string(2) "18"
                "trou_depart" => string(1) "1"
                "parcour_aller" => string(1) "1"
                "parcour_retour" => string(1) "2"
            )
            3 => array(6) (
                "id" => string(1) "4"
                "nom_parcours" => string(23) "18 trous depart trou 10"
                "nb_trous_total" => string(2) "18"
                "trou_depart" => string(2) "10"
                "parcour_aller" => string(1) "2"
                "parcour_retour" => string(1) "1"
            )
        )
        protected position => integer 0
        protected size => integer 4
        protected type => string(5) "array"
    }
    public type_parcours => object DB_ResultSet(4) {
        protected records => array(4) (
            0 => array(5) (
                "id" => string(1) "1"
                "trou_depart" => string(1) "1"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7200"
                "description" => string(22) "[1  -&gt;  9] trac normal"
            )
            1 => array(5) (
                "id" => string(1) "2"
                "trou_depart" => string(2) "10"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7800"
                "description" => string(20) "[10-&gt;18] trac normal"
            )
            2 => array(5) (
                "id" => string(1) "3"
                "trou_depart" => string(1) "1"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7800"
                "description" => string(21) "[1  -&gt;  9] trac InOut"
            )
            3 => array(5) (
                "id" => string(1) "4"
                "trou_depart" => string(2) "10"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7200"
                "description" => string(19) "[10-&gt;18] trac InOut"
            )
        )
        protected position => integer 0
        protected size => integer 4
        protected type => string(5) "array"
    }
    public pages => NULL
    public pageTitle => NULL
    public pageCSS => NULL
    public pageJS => NULL
    public pageBreadcrumbs => NULL
    protected _table_model => string(0) ""
    public template => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
    protected _route_name => string(7) "oscrudc"
    public auto_render => bool TRUE
    public request => object Request(19) {
        protected _requested_with => NULL
        protected _method => string(3) "GET"
        protected _protocol => string(8) "HTTP/1.1"
        protected _secure => bool FALSE
        protected _referrer => string(27) "http://gcb-smart:8090/admin"
        protected _route => object Route(5) {
            protected _filters => array(0) 
            protected _uri => string(32) "(&lt;controller&gt;(/&lt;action&gt;(/&lt;id&gt;)))"
            protected _regex => array(0) 
            protected _defaults => array(3) (
                "directory" => string(4) "golf"
                "controller" => string(3) "app"
                "action" => string(5) "index"
            )
            protected _route_regex => string(95) "#^(?:(?P&lt;controller&gt;[^/.,;?\n]++)(?:/(?P&lt;action&gt;[^/.,;?\n]++)(?:/(?P&lt;id&gt;[^/.,;?\n]++))?)?)?$#uD"
        }
        protected _routes => array(0) 
        protected _header => object HTTP_Header(0) {
        }
        protected _body => NULL
        protected _directory => string(4) "Golf"
        protected _controller => string(3) "App"
        protected _action => string(10) "calendrier"
        protected _uri => string(14) "app/calendrier"
        protected _external => bool FALSE
        protected _params => array(0) 
        protected _get => array(0) 
        protected _post => array(0) 
        protected _cookies => array(13) (
            "session" => NULL
            "crud_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "per_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "crud_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
            "per_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
            "hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096" => NULL
            "hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096" => NULL
            "crud_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
            "per_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
            "hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
            "hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        )
        protected _client => object Request_Client_Internal(9) {
            protected _previous_environment => NULL
            protected _cache => NULL
            protected _follow => bool FALSE
            protected _follow_headers => array(1) (
                0 => string(13) "Authorization"
            )
            protected _strict_redirect => bool TRUE
            protected _header_callbacks => array(1) (
                "Location" => string(34) "Request_Client::on_header_location"
            )
            protected _max_callback_depth => integer 5
            protected _callback_depth => integer 1
            protected _callback_params => array(0) 
        }
    }
    public response => object Response(5) {
        protected _status => integer 200
        protected _header => object HTTP_Header(0) {
        }
        protected _body => string(0) ""
        protected _cookies => array(0) 
        protected _protocol => string(8) "HTTP/1.1"
    }
}
						
										
				
													 92 
 93 			// Create a new instance of the controller
 94 			$controller = $class-&gt;newInstance($request, $response);
 95 
 96 			// Run the controller's execute() method
 97 			$response = $class-&gt;getMethod('execute')-&gt;invoke($controller);
 98 
 99 			if ( ! $response instanceof Response)
100 			{
101 				// Controller failed to return a Response.
102 				throw new Kohana_Exception('Controller failed to return a Response');

							
								
				
					
													SYSPATH/classes/Kohana/Request/Client.php [ 114 ]
											
					&raquo;
					Kohana_Request_Client_Internal->execute_request(arguments)
				
								
					
											
							0
							object Request(19) {
    protected _requested_with => NULL
    protected _method => string(3) "GET"
    protected _protocol => string(8) "HTTP/1.1"
    protected _secure => bool FALSE
    protected _referrer => string(27) "http://gcb-smart:8090/admin"
    protected _route => object Route(5) {
        protected _filters => array(0) 
        protected _uri => string(32) "(&lt;controller&gt;(/&lt;action&gt;(/&lt;id&gt;)))"
        protected _regex => array(0) 
        protected _defaults => array(3) (
            "directory" => string(4) "golf"
            "controller" => string(3) "app"
            "action" => string(5) "index"
        )
        protected _route_regex => string(95) "#^(?:(?P&lt;controller&gt;[^/.,;?\n]++)(?:/(?P&lt;action&gt;[^/.,;?\n]++)(?:/(?P&lt;id&gt;[^/.,;?\n]++))?)?)?$#uD"
    }
    protected _routes => array(0) 
    protected _header => object HTTP_Header(0) {
    }
    protected _body => NULL
    protected _directory => string(4) "Golf"
    protected _controller => string(3) "App"
    protected _action => string(10) "calendrier"
    protected _uri => string(14) "app/calendrier"
    protected _external => bool FALSE
    protected _params => array(0) 
    protected _get => array(0) 
    protected _post => array(0) 
    protected _cookies => array(13) (
        "session" => NULL
        "crud_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "per_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "crud_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "per_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "crud_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "per_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
    )
    protected _client => object Request_Client_Internal(9) {
        protected _previous_environment => NULL
        protected _cache => NULL
        protected _follow => bool FALSE
        protected _follow_headers => array(1) (
            0 => string(13) "Authorization"
        )
        protected _strict_redirect => bool TRUE
        protected _header_callbacks => array(1) (
            "Location" => string(34) "Request_Client::on_header_location"
        )
        protected _max_callback_depth => integer 5
        protected _callback_depth => integer 1
        protected _callback_params => array(0) 
    }
}
						
											
							1
							object Response(5) {
    protected _status => integer 200
    protected _header => object HTTP_Header(0) {
    }
    protected _body => string(0) ""
    protected _cookies => array(0) 
    protected _protocol => string(8) "HTTP/1.1"
}
						
										
				
													109 		$orig_response = $response = Response::factory(array('_protocol' =&gt; $request-&gt;protocol()));
110 
111 		if (($cache = $this-&gt;cache()) instanceof HTTP_Cache)
112 			return $cache-&gt;execute($this, $request, $response);
113 
114 		$response = $this-&gt;execute_request($request, $response);
115 
116 		// Execute response callbacks
117 		foreach ($this-&gt;header_callbacks() as $header =&gt; $callback)
118 		{
119 			if ($response-&gt;headers($header))

							
								
				
					
													SYSPATH/classes/Kohana/Request.php [ 986 ]
											
					&raquo;
					Kohana_Request_Client->execute(arguments)
				
								
					
											
							0
							object Request(19) {
    protected _requested_with => NULL
    protected _method => string(3) "GET"
    protected _protocol => string(8) "HTTP/1.1"
    protected _secure => bool FALSE
    protected _referrer => string(27) "http://gcb-smart:8090/admin"
    protected _route => object Route(5) {
        protected _filters => array(0) 
        protected _uri => string(32) "(&lt;controller&gt;(/&lt;action&gt;(/&lt;id&gt;)))"
        protected _regex => array(0) 
        protected _defaults => array(3) (
            "directory" => string(4) "golf"
            "controller" => string(3) "app"
            "action" => string(5) "index"
        )
        protected _route_regex => string(95) "#^(?:(?P&lt;controller&gt;[^/.,;?\n]++)(?:/(?P&lt;action&gt;[^/.,;?\n]++)(?:/(?P&lt;id&gt;[^/.,;?\n]++))?)?)?$#uD"
    }
    protected _routes => array(0) 
    protected _header => object HTTP_Header(0) {
    }
    protected _body => NULL
    protected _directory => string(4) "Golf"
    protected _controller => string(3) "App"
    protected _action => string(10) "calendrier"
    protected _uri => string(14) "app/calendrier"
    protected _external => bool FALSE
    protected _params => array(0) 
    protected _get => array(0) 
    protected _post => array(0) 
    protected _cookies => array(13) (
        "session" => NULL
        "crud_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "per_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "crud_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "per_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "crud_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "per_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
    )
    protected _client => object Request_Client_Internal(9) {
        protected _previous_environment => NULL
        protected _cache => NULL
        protected _follow => bool FALSE
        protected _follow_headers => array(1) (
            0 => string(13) "Authorization"
        )
        protected _strict_redirect => bool TRUE
        protected _header_callbacks => array(1) (
            "Location" => string(34) "Request_Client::on_header_location"
        )
        protected _max_callback_depth => integer 5
        protected _callback_depth => integer 1
        protected _callback_params => array(0) 
    }
}
						
										
				
													981 			throw new Request_Exception('Unable to execute :uri without a Kohana_Request_Client', array(
982 				':uri' =&gt; $this-&gt;_uri,
983 			));
984 		}
985 
986 		return $this-&gt;_client-&gt;execute($this);
987 	}
988 
989 	/**
990 	 * Returns whether this request is the initial request Kohana received.
991 	 * Can be used to test for sub requests.

							
								
				
					
													DOCROOT/index.php [ 118 ]
											
					&raquo;
					Kohana_Request->execute()
				
													113 	/**
114 	 * Execute the main request. A source of the URI can be passed, eg: $_SERVER['PATH_INFO'].
115 	 * If no source is specified, the URI will be automatically detected.
116 	 */
117 	echo Request::factory(TRUE, array(), FALSE)
118 		-&gt;execute()
119 		-&gt;send_headers(TRUE)
120 		-&gt;body();
121 }

							
							
	
	Environment
	
				Included files (177)
		
			
								
					DOCROOT/index.php
				
								
					APPPATH/bootstrap.php
				
								
					SYSPATH/classes/Kohana/Core.php
				
								
					SYSPATH/classes/Kohana.php
				
								
					SYSPATH/classes/I18n.php
				
								
					SYSPATH/classes/Kohana/I18n.php
				
								
					SYSPATH/classes/HTTP.php
				
								
					SYSPATH/classes/Kohana/HTTP.php
				
								
					SYSPATH/classes/Kohana/Exception.php
				
								
					SYSPATH/classes/Kohana/Kohana/Exception.php
				
								
					SYSPATH/classes/Log.php
				
								
					SYSPATH/classes/Kohana/Log.php
				
								
					SYSPATH/classes/Config.php
				
								
					SYSPATH/classes/Kohana/Config.php
				
								
					SYSPATH/classes/Log/File.php
				
								
					SYSPATH/classes/Kohana/Log/File.php
				
								
					SYSPATH/classes/Log/Writer.php
				
								
					SYSPATH/classes/Kohana/Log/Writer.php
				
								
					SYSPATH/classes/Config/File.php
				
								
					SYSPATH/classes/Kohana/Config/File.php
				
								
					SYSPATH/classes/Kohana/Config/File/Reader.php
				
								
					SYSPATH/classes/Kohana/Config/Reader.php
				
								
					SYSPATH/classes/Kohana/Config/Source.php
				
								
					SYSPATH/classes/Cookie.php
				
								
					SYSPATH/classes/Kohana/Cookie.php
				
								
					SYSPATH/classes/Route.php
				
								
					SYSPATH/classes/Kohana/Route.php
				
								
					SYSPATH/classes/Request.php
				
								
					SYSPATH/classes/Kohana/Request.php
				
								
					SYSPATH/classes/HTTP/Request.php
				
								
					SYSPATH/classes/Kohana/HTTP/Request.php
				
								
					SYSPATH/classes/HTTP/Message.php
				
								
					SYSPATH/classes/Kohana/HTTP/Message.php
				
								
					SYSPATH/classes/HTTP/Header.php
				
								
					SYSPATH/classes/Kohana/HTTP/Header.php
				
								
					SYSPATH/classes/Request/Client/Internal.php
				
								
					SYSPATH/classes/Kohana/Request/Client/Internal.php
				
								
					SYSPATH/classes/Request/Client.php
				
								
					SYSPATH/classes/Kohana/Request/Client.php
				
								
					SYSPATH/classes/Arr.php
				
								
					SYSPATH/classes/Kohana/Arr.php
				
								
					SYSPATH/classes/Response.php
				
								
					SYSPATH/classes/Kohana/Response.php
				
								
					SYSPATH/classes/HTTP/Response.php
				
								
					SYSPATH/classes/Kohana/HTTP/Response.php
				
								
					SYSPATH/classes/Profiler.php
				
								
					SYSPATH/classes/Kohana/Profiler.php
				
								
					APPPATH/classes/Controller/Golf/App.php
				
								
					APPPATH/classes/Controller/Golf/Main.php
				
								
					MODPATH/oscrud/classes/Controller/Oscrudc.php
				
								
					SYSPATH/classes/Controller/Template.php
				
								
					SYSPATH/classes/Kohana/Controller/Template.php
				
								
					SYSPATH/classes/Controller.php
				
								
					SYSPATH/classes/Kohana/Controller.php
				
								
					SYSPATH/classes/View.php
				
								
					SYSPATH/classes/Kohana/View.php
				
								
					MODPATH/notify/classes/Notify.php
				
								
					MODPATH/notify/classes/Notify/Core.php
				
								
					MODPATH/notify/config/notify.php
				
								
					SYSPATH/classes/Config/Group.php
				
								
					SYSPATH/classes/Kohana/Config/Group.php
				
								
					SYSPATH/classes/Session.php
				
								
					SYSPATH/classes/Kohana/Session.php
				
								
					SYSPATH/config/session.php
				
								
					MODPATH/leap/config/session.php
				
								
					MODPATH/database/config/session.php
				
								
					SYSPATH/classes/Session/Native.php
				
								
					SYSPATH/classes/Kohana/Session/Native.php
				
								
					MODPATH/leap/classes/Model/Leap/User.php
				
								
					MODPATH/leap/classes/Base/Model/Leap/User.php
				
								
					MODPATH/leap/classes/DB/ORM/Model.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Model.php
				
								
					MODPATH/leap/classes/Core/Object.php
				
								
					MODPATH/leap/classes/Base/Core/Object.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Adaptor/DateTime.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Adaptor/DateTime.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Adaptor.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Adaptor.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Integer.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php
				
								
					MODPATH/leap/classes/DB/ORM/Field.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/String.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/String.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Boolean.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Boolean.php
				
								
					MODPATH/leap/classes/DB/ORM/Relation/HasMany.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Relation/HasMany.php
				
								
					MODPATH/leap/classes/DB/ORM/Relation.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Relation.php
				
								
					MODPATH/leap/classes/DB/ResultSet.php
				
								
					MODPATH/leap/classes/Base/DB/ResultSet.php
				
								
					MODPATH/leap/classes/Model/Leap/User/Role.php
				
								
					MODPATH/leap/classes/Base/Model/Leap/User/Role.php
				
								
					MODPATH/leap/classes/DB/ORM/Relation/BelongsTo.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Relation/BelongsTo.php
				
								
					MODPATH/leap/classes/Model/Leap/Role.php
				
								
					MODPATH/leap/classes/Base/Model/Leap/Role.php
				
								
					MODPATH/notify/views/notify/bootstrap.php
				
								
					MODPATH/auth/classes/Auth.php
				
								
					MODPATH/auth/classes/Kohana/Auth.php
				
								
					MODPATH/leap/config/auth.php
				
								
					MODPATH/auth/config/auth.php
				
								
					APPPATH/config/auth.php
				
								
					MODPATH/leap/classes/Auth/Leap.php
				
								
					MODPATH/leap/classes/Base/Auth/Leap.php
				
								
					MODPATH/leap/classes/DB/ORM.php
				
								
					MODPATH/leap/classes/Base/DB/ORM.php
				
								
					MODPATH/leap/classes/DB/ORM/Select/Proxy.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Select/Proxy.php
				
								
					MODPATH/leap/classes/DB/SQL/Statement.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Statement.php
				
								
					MODPATH/leap/classes/DB/DataSource.php
				
								
					MODPATH/leap/classes/Base/DB/DataSource.php
				
								
					MODPATH/leap/config/database.php
				
								
					MODPATH/database/config/database.php
				
								
					APPPATH/config/database.php
				
								
					MODPATH/leap/classes/DB/MySQL/Select/Builder.php
				
								
					MODPATH/leap/classes/Base/DB/MySQL/Select/Builder.php
				
								
					MODPATH/leap/classes/DB/SQL/Select/Builder.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Select/Builder.php
				
								
					MODPATH/leap/classes/DB/SQL/Builder.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Builder.php
				
								
					MODPATH/leap/classes/DB/MySQL/Expression.php
				
								
					MODPATH/leap/classes/Base/DB/MySQL/Expression.php
				
								
					MODPATH/leap/classes/DB/SQL/Expression/Interface.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Expression/Interface.php
				
								
					MODPATH/database/classes/Database/Expression.php
				
								
					MODPATH/database/classes/Kohana/Database/Expression.php
				
								
					MODPATH/leap/classes/DB/SQL/Operator.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Operator.php
				
								
					MODPATH/leap/classes/DB/Connection/Pool.php
				
								
					MODPATH/leap/classes/Base/DB/Connection/Pool.php
				
								
					MODPATH/leap/classes/DB/Connection.php
				
								
					MODPATH/leap/classes/Base/DB/Connection.php
				
								
					MODPATH/leap/classes/DB/MySQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/Base/DB/MySQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/DB/SQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/DB/SQL/Connector.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Connector.php
				
								
					APPPATH/classes/Model/Leap/Golf.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/DateTime.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/DateTime.php
				
								
					MODPATH/leap/classes/DB/SQL.php
				
								
					MODPATH/leap/classes/Base/DB/SQL.php
				
								
					MODPATH/leap/classes/DB/SQL/Select/Proxy.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Select/Proxy.php
				
								
					APPPATH/views/egp_template.php
				
								
					APPPATH/views/inc/init.php
				
								
					APPPATH/views/lib/config.php
				
								
					APPPATH/views/lib/func.global.php
				
								
					APPPATH/views/lib/smartui/class.smartutil.php
				
								
					APPPATH/views/lib/smartui/class.smartui.php
				
								
					APPPATH/views/lib/smartui/class.smartui-widget.php
				
								
					APPPATH/views/lib/smartui/class.smartui-datatable.php
				
								
					APPPATH/views/lib/smartui/class.smartui-button.php
				
								
					APPPATH/views/lib/smartui/class.smartui-tab.php
				
								
					APPPATH/views/lib/smartui/class.smartui-accordion.php
				
								
					APPPATH/views/lib/smartui/class.smartui-carousel.php
				
								
					APPPATH/views/lib/smartui/class.smartui-smartform.php
				
								
					APPPATH/views/lib/smartui/class.smartui-nav.php
				
								
					APPPATH/views/lib/class.html-indent.php
				
								
					APPPATH/views/lib/class.parsedown.php
				
								
					APPPATH/views/inc/config.ui.php
				
								
					APPPATH/views/inc/header.php
				
								
					SYSPATH/classes/Debug.php
				
								
					SYSPATH/classes/Kohana/Debug.php
				
								
					SYSPATH/classes/Date.php
				
								
					SYSPATH/classes/Kohana/Date.php
				
								
					SYSPATH/views/kohana/error.php
				
								
					SYSPATH/i18n/fr.php
				
								
					APPPATH/i18n/fr.php
				
								
					SYSPATH/classes/UTF8.php
				
								
					SYSPATH/classes/Kohana/UTF8.php
				
								
					SYSPATH/classes/View/Exception.php
				
								
					SYSPATH/classes/Kohana/View/Exception.php
				
							
		
				Loaded extensions (54)
		
			
								
					Core
				
								
					date
				
								
					ereg
				
								
					libxml
				
								
					openssl
				
								
					pcre
				
								
					sqlite3
				
								
					zlib
				
								
					bcmath
				
								
					bz2
				
								
					calendar
				
								
					ctype
				
								
					curl
				
								
					dom
				
								
					hash
				
								
					fileinfo
				
								
					filter
				
								
					ftp
				
								
					gd
				
								
					SPL
				
								
					iconv
				
								
					intl
				
								
					json
				
								
					ldap
				
								
					mbstring
				
								
					mysql
				
								
					mysqli
				
								
					session
				
								
					PDO
				
								
					pdo_sqlite
				
								
					standard
				
								
					posix
				
								
					Reflection
				
								
					Phar
				
								
					SimpleXML
				
								
					soap
				
								
					sockets
				
								
					exif
				
								
					tokenizer
				
								
					wddx
				
								
					xml
				
								
					xmlreader
				
								
					xmlwriter
				
								
					xsl
				
								
					zip
				
								
					apache2handler
				
								
					imap
				
								
					gettext
				
								
					mcrypt
				
								
					yaz
				
								
					pgsql
				
								
					pdo_pgsql
				
								
					pdo_mysql
				
								
					xdebug
				
							
		
						$_SESSION
		
			
								
					last_active
					integer 1430479531
				
								
					user
					object Model_Leap_User(5) {
    protected adaptors => array(2) (
        "last_login_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(2) (
                "field" => string(10) "last_login"
                "format" => string(11) "Y-m-d H:i:s"
            )
        }
        "new_password_requested_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(2) (
                "field" => string(22) "new_password_requested"
                "format" => string(11) "Y-m-d H:i:s"
            )
        }
    )
    protected aliases => array(0) 
    protected fields => array(23) (
        "id" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => integer 0
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool TRUE
                "range" => array(2) (
                    "lower_bound" => integer 0
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => integer 145
        }
        "email" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => string(0) ""
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 254
            )
            protected value => string(24) "contact@golf-bourbon.com"
        }
        "username" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => string(0) ""
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 32
            )
            protected value => string(0) ""
        }
        "password" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => string(0) ""
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 64
            )
            protected value => string(64) "db844ad71b412b511d56b11068ec006386a9932c15064f8301d4b03e2e5a6cbd"
        }
        "firstname" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 35
            )
            protected value => string(11) "Secretariat"
        }
        "lastname" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 50
            )
            protected value => string(12) "GOLF BOURBON"
        }
        "activated" => object DB_ORM_Field_Boolean(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "control" => string(8) "checkbox"
                "default" => bool TRUE
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "boolean"
            )
            protected value => bool TRUE
        }
        "banned" => object DB_ORM_Field_Boolean(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "control" => string(8) "checkbox"
                "default" => bool FALSE
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "boolean"
            )
            protected value => bool FALSE
        }
        "ban_reason" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 255
            )
            protected value => NULL
        }
        "new_password_key" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 64
            )
            protected value => NULL
        }
        "new_password_requested" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool FALSE
                "range" => array(2) (
                    "lower_bound" => float -9,22337203685E+18
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => NULL
        }
        "new_email" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 254
            )
            protected value => NULL
        }
        "new_email_key" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 64
            )
            protected value => NULL
        }
        "logins" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => integer 0
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 10
                "unsigned" => bool TRUE
                "range" => array(2) (
                    "lower_bound" => integer 0
                    "upper_bound" => integer 2147483647
                )
            )
            protected value => integer 3116
        }
        "last_login" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 10
                "unsigned" => bool TRUE
                "range" => array(2) (
                    "lower_bound" => integer 0
                    "upper_bound" => integer 2147483647
                )
            )
            protected value => integer 1430212803
        }
        "last_ip" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 39
            )
            protected value => string(3) "::1"
        }
        "indgolf" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 10
            )
            protected value => string(1) "0"
        }
        "adresse" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 200
            )
            protected value => NULL
        }
        "cp" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 10
            )
            protected value => NULL
        }
        "ville" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 100
            )
            protected value => NULL
        }
        "telephone" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 25
            )
            protected value => NULL
        }
        "id_pays" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool FALSE
                "range" => array(2) (
                    "lower_bound" => float -9,22337203685E+18
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => NULL
        }
        "id_status" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool FALSE
                "range" => array(2) (
                    "lower_bound" => float -9,22337203685E+18
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => integer 1
        }
    )
    protected metadata => array(2) (
        "loaded" => bool TRUE
        "saved" => string(40) "e15cea14d351c743e5e34612ab730035adb20cc8"
    )
    protected relations => array(3) (
        "user_roles" => object DB_ORM_Relation_HasMany(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "type" => string(8) "has_many"
                "parent_model" => string(15) "Model_Leap_User"
                "parent_key" => array(1) (
                    0 => string(2) "id"
                )
                "child_model" => string(20) "Model_Leap_User_Role"
                "child_key" => array(1) (
                    0 => string(7) "user_id"
                )
                "options" => array(0) 
            )
            protected cache => object DB_ResultSet(4) {
                protected records => array(1) (
                    0 => object Model_Leap_User_Role(5) {
                        protected adaptors => array(0) 
                        protected aliases => array(0) 
                        protected fields => array(3) (
                            "user_id" => object DB_ORM_Field_Integer(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(9) (
                                    "control" => string(4) "auto"
                                    "default" => integer 0
                                    "modified" => bool TRUE
                                    "nullable" => bool FALSE
                                    "savable" => bool TRUE
                                    "type" => string(7) "integer"
                                    "max_length" => integer 10
                                    "unsigned" => bool TRUE
                                    "range" => array(2) (
                                        "lower_bound" => integer 0
                                        "upper_bound" => integer 2147483647
                                    )
                                )
                                protected value => integer 145
                            }
                            "role_id" => object DB_ORM_Field_Integer(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(9) (
                                    "control" => string(4) "auto"
                                    "default" => integer 0
                                    "modified" => bool TRUE
                                    "nullable" => bool FALSE
                                    "savable" => bool TRUE
                                    "type" => string(7) "integer"
                                    "max_length" => integer 10
                                    "unsigned" => bool TRUE
                                    "range" => array(2) (
                                        "lower_bound" => integer 0
                                        "upper_bound" => integer 2147483647
                                    )
                                )
                                protected value => integer 14
                            }
                            "id" => object DB_ORM_Field_Integer(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(9) (
                                    "control" => string(4) "auto"
                                    "default" => integer 0
                                    "modified" => bool TRUE
                                    "nullable" => bool FALSE
                                    "savable" => bool TRUE
                                    "type" => string(7) "integer"
                                    "max_length" => integer 11
                                    "unsigned" => bool FALSE
                                    "range" => array(2) (
                                        "lower_bound" => float -9,22337203685E+18
                                        "upper_bound" => integer 9223372036854775807
                                    )
                                )
                                protected value => integer 11
                            }
                        )
                        protected metadata => array(2) (
                            "loaded" => bool TRUE
                            "saved" => NULL
                        )
                        protected relations => array(2) (
                            "user" => object DB_ORM_Relation_BelongsTo(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(5) (
                                    "type" => string(10) "belongs_to"
                                    "parent_model" => string(15) "Model_Leap_User"
                                    "parent_key" => array(1) (
                                        0 => string(2) "id"
                                    )
                                    "child_model" => string(20) "Model_Leap_User_Role"
                                    "child_key" => array(1) (
                                        0 => string(7) "user_id"
                                    )
                                )
                                protected cache => NULL
                            }
                            "role" => object DB_ORM_Relation_BelongsTo(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(5) (
                                    "type" => string(10) "belongs_to"
                                    "parent_model" => string(15) "Model_Leap_Role"
                                    "parent_key" => array(1) (
                                        0 => string(2) "id"
                                    )
                                    "child_model" => string(20) "Model_Leap_User_Role"
                                    "child_key" => array(1) (
                                        0 => string(7) "role_id"
                                    )
                                )
                                protected cache => object Model_Leap_Role(5) {
                                    protected adaptors => array(0) 
                                    protected aliases => array(0) 
                                    protected fields => array(3) (
                                        "id" => object DB_ORM_Field_Integer(3) {
                                            ...
                                        }
                                        "name" => object DB_ORM_Field_String(3) {
                                            ...
                                        }
                                        "description" => object DB_ORM_Field_String(3) {
                                            ...
                                        }
                                    )
                                    protected metadata => array(2) (
                                        "loaded" => bool TRUE
                                        "saved" => NULL
                                    )
                                    protected relations => array(1) (
                                        "user_roles" => object DB_ORM_Relation_HasMany(3) {
                                            ...
                                        }
                                    )
                                }
                            }
                        )
                    }
                )
                protected position => integer 1
                protected size => integer 1
                protected type => string(20) "Model_Leap_User_Role"
            }
        }
        "user_token" => object DB_ORM_Relation_HasMany(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "type" => string(8) "has_many"
                "parent_model" => string(15) "Model_Leap_User"
                "parent_key" => array(1) (
                    0 => string(2) "id"
                )
                "child_model" => string(21) "Model_Leap_User_Token"
                "child_key" => array(1) (
                    0 => string(7) "user_id"
                )
                "options" => array(0) 
            )
            protected cache => NULL
        }
        "status" => object DB_ORM_Relation_BelongsTo(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(5) (
                "type" => string(10) "belongs_to"
                "parent_model" => string(22) "Model_Leap_user_status"
                "parent_key" => array(1) (
                    0 => string(2) "id"
                )
                "child_model" => string(15) "Model_Leap_User"
                "child_key" => array(1) (
                    0 => string(9) "id_status"
                )
            )
            protected cache => NULL
        }
    )
}
				
							
		
												$_COOKIE
		
			
								
					session
					string(32) "a724dbfc3620945f2ab34bb366437e94"
				
								
					crud_page_e3aa0e15dc69c64ff5bd114fa152475a
					string(1) "1"
				
								
					per_page_e3aa0e15dc69c64ff5bd114fa152475a
					string(3) "100"
				
								
					hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a
					string(0) ""
				
								
					hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a
					string(0) ""
				
								
					crud_page_18d9f6472ca1951f3a179d6cfc35f096
					string(1) "1"
				
								
					per_page_18d9f6472ca1951f3a179d6cfc35f096
					string(2) "50"
				
								
					hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096
					string(3) "asc"
				
								
					hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096
					string(9) "s84566833"
				
								
					crud_page_ab2af15b364b3c86d83b7aaf75ca61bc
					string(1) "2"
				
								
					per_page_ab2af15b364b3c86d83b7aaf75ca61bc
					string(2) "10"
				
								
					hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc
					string(3) "asc"
				
								
					hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc
					string(9) "sb61fae3a"
				
							
		
						$_SERVER
		
			
								
					REDIRECT_KOHANA_ENV
					string(11) "DEVELOPMENT"
				
								
					REDIRECT_STATUS
					string(3) "200"
				
								
					KOHANA_ENV
					string(11) "DEVELOPMENT"
				
								
					HTTP_HOST
					string(14) "gcb-smart:8090"
				
								
					HTTP_CONNECTION
					string(10) "keep-alive"
				
								
					HTTP_PRAGMA
					string(8) "no-cache"
				
								
					HTTP_CACHE_CONTROL
					string(8) "no-cache"
				
								
					HTTP_ACCEPT
					string(74) "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8"
				
								
					HTTP_USER_AGENT
					string(120) "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36"
				
								
					HTTP_REFERER
					string(27) "http://gcb-smart:8090/admin"
				
								
					HTTP_ACCEPT_ENCODING
					string(19) "gzip, deflate, sdch"
				
								
					HTTP_ACCEPT_LANGUAGE
					string(35) "fr-FR,fr;q=0.8,en-US;q=0.6,en;q=0.4"
				
								
					HTTP_COOKIE
					string(644) "session=a724dbfc3620945f2ab34bb366437e94; crud_page_e3aa0e15dc69c64ff5bd114fa152475a=1; per_page_e3aa0e15dc69c64ff5bd114fa152475&nbsp;&hellip;"
				
								
					PATH
					string(29) "/usr/bin:/bin:/usr/sbin:/sbin"
				
								
					SERVER_SIGNATURE
					string(0) ""
				
								
					SERVER_SOFTWARE
					string(6) "Apache"
				
								
					SERVER_NAME
					string(9) "gcb-smart"
				
								
					SERVER_ADDR
					string(3) "::1"
				
								
					SERVER_PORT
					string(4) "8090"
				
								
					REMOTE_ADDR
					string(3) "::1"
				
								
					DOCUMENT_ROOT
					string(40) "/Users/cesar/Documents/DEV/GIT/gcb-smart"
				
								
					SERVER_ADMIN
					string(15) "you@example.com"
				
								
					SCRIPT_FILENAME
					string(50) "/Users/cesar/Documents/DEV/GIT/gcb-smart/index.php"
				
								
					REMOTE_PORT
					string(5) "54441"
				
								
					REDIRECT_URL
					string(15) "/app/calendrier"
				
								
					GATEWAY_INTERFACE
					string(7) "CGI/1.1"
				
								
					SERVER_PROTOCOL
					string(8) "HTTP/1.1"
				
								
					REQUEST_METHOD
					string(3) "GET"
				
								
					QUERY_STRING
					string(0) ""
				
								
					REQUEST_URI
					string(15) "/app/calendrier"
				
								
					SCRIPT_NAME
					string(10) "/index.php"
				
								
					PATH_INFO
					string(15) "/app/calendrier"
				
								
					PATH_TRANSLATED
					string(45) "redirect:/index.php/app/calendrier/calendrier"
				
								
					PHP_SELF
					string(25) "/index.php/app/calendrier"
				
								
					REQUEST_TIME_FLOAT
					float 1430479541,09
				
								
					REQUEST_TIME
					integer 1430479541
				
								
					argv
					array(0) 
				
								
					argc
					integer 0
				
							
		
			

 could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 15:25:41 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename(Object(View))
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct(Object(View), NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory(Object(View))
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(31): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Main.php(40): Controller_Oscrudc->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(22): Controller_Golf_Main->before()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_App->before()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 15:29:31 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: page_title ~ APPPATH/views/inc/header.php [ 9 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:9
2015-05-01 15:29:31 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 9, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(25): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Core.php(668): Kohana_View->__toString()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(255): Kohana_Core::find_file('views', Object(View))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename(Object(View))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct(Object(View), NULL)
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory(Object(View))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(31): Kohana_Controller_Template->before()
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Main.php(40): Controller_Oscrudc->before()
#12 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(29): Controller_Golf_Main->before()
#13 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_App->before()
#14 [internal function]: Kohana_Controller->execute()
#15 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#16 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#19 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:9
2015-05-01 15:29:31 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: page_html_prop ~ APPPATH/views/inc/header.php [ 4 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:4
2015-05-01 15:29:31 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 4, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(25): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 [internal function]: Kohana_View->__toString()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/I18n.php(164): strtr('The requested v...', Array)
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Kohana/Exception.php(53): __('The requested v...', Array)
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(259): Kohana_Kohana_Exception->__construct('The requested v...', Array)
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename(Object(View))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct(Object(View), NULL)
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory(Object(View))
#12 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(31): Kohana_Controller_Template->before()
#13 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Main.php(40): Controller_Oscrudc->before()
#14 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(29): Controller_Golf_Main->before()
#15 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_App->before()
#16 [internal function]: Kohana_Controller->execute()
#17 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#18 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#19 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#20 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#21 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:4
2015-05-01 15:29:31 --- EMERGENCY: View_Exception [ 0 ]: The requested view 
#kohana_error { background: #ddd; font-size: 1em; font-family:sans-serif; text-align: left; color: #111; }
#kohana_error h1,
#kohana_error h2 { margin: 0; padding: 1em; font-size: 1em; font-weight: normal; background: #911; color: #fff; }
	#kohana_error h1 a,
	#kohana_error h2 a { color: #fff; }
#kohana_error h2 { background: #222; }
#kohana_error h3 { margin: 0; padding: 0.4em 0 0; font-size: 1em; font-weight: normal; }
#kohana_error p { margin: 0; padding: 0.2em 0; }
#kohana_error a { color: #1b323b; }
#kohana_error pre { overflow: auto; white-space: pre-wrap; }
#kohana_error table { width: 100%; display: block; margin: 0 0 0.4em; padding: 0; border-collapse: collapse; background: #fff; }
	#kohana_error table td { border: solid 1px #ddd; text-align: left; vertical-align: top; padding: 0.4em; }
#kohana_error div.content { padding: 0.4em 1em 1em; overflow: hidden; }
#kohana_error pre.source { margin: 0 0 1em; padding: 0.4em; background: #fff; border: dotted 1px #b7c680; line-height: 1.2em; }
	#kohana_error pre.source span.line { display: block; }
	#kohana_error pre.source span.highlight { background: #f0eb96; }
		#kohana_error pre.source span.line span.number { color: #666; }
#kohana_error ol.trace { display: block; margin: 0 0 0 2em; padding: 0; list-style: decimal; }
	#kohana_error ol.trace li { margin: 0; padding: 0; }
.js .collapsed { display: none; }


document.documentElement.className = document.documentElement.className + ' js';
function koggle(elem)
{
	elem = document.getElementById(elem);

	if (elem.style && elem.style['display'])
		// Only works with the "style" attr
		var disp = elem.style['display'];
	else if (elem.currentStyle)
		// For MSIE, naturally
		var disp = elem.currentStyle['display'];
	else if (window.getComputedStyle)
		// For most other browsers
		var disp = document.defaultView.getComputedStyle(elem, null).getPropertyValue('display');

	// Toggle the state of the "display" style
	elem.style.display = disp == 'block' ? 'none' : 'block';
	return false;
}


	ErrorException [ Notice ]: Undefined variable: page_html_prop
	
		APPPATH/views/inc/header.php [ 4 ]
		1 &lt;!DOCTYPE html&gt;
2 &lt;html lang="en-us" &lt;?php echo implode(' ', array_map(function($prop, $value) {
3 			return $prop.'="'.$value.'"';
4 		}, array_keys($page_html_prop), $page_html_prop)) ;?&gt;&gt;
5 	&lt;head&gt;
6 		&lt;meta charset="utf-8"&gt;
7 		&lt;!--&lt;meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"&gt;--&gt;
8 
9 		&lt;title&gt; &lt;?php echo $page_title != "" ? $page_title." - " : ""; ?&gt;EasyGolfPack(c) &lt;/title&gt;
		
					
				
					
													APPPATH/views/inc/header.php [ 4 ]
											
					&raquo;
					Kohana_Core::error_handler(arguments)
				
								
					
											
							0
							integer 8
						
											
							1
							string(34) "Undefined variable: page_html_prop"
						
											
							2
							string(73) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php"
						
											
							3
							integer 4
						
											
							4
							array(3) (
    "kohana_view_filename" => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    "kohana_view_data" => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
    "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
)
						
										
				
													1 &lt;!DOCTYPE html&gt;
2 &lt;html lang="en-us" &lt;?php echo implode(' ', array_map(function($prop, $value) {
3 			return $prop.'="'.$value.'"';
4 		}, array_keys($page_html_prop), $page_html_prop)) ;?&gt;&gt;
5 	&lt;head&gt;
6 		&lt;meta charset="utf-8"&gt;
7 		&lt;!--&lt;meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"&gt;--&gt;
8 
9 		&lt;title&gt; &lt;?php echo $page_title != "" ? $page_title." - " : ""; ?&gt;EasyGolfPack(c) &lt;/title&gt;

							
								
				
					
													APPPATH/views/egp_template.php [ 25 ]
											
					&raquo;
					include(arguments)
				
								
					
											
							0
							string(73) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php"
						
										
				
													20 	//include header
21 	//you can add your custom css in $page_css array.
22 	//Note: all css files are inside css/ folder
23 	// $page_css[] = "your_style.css";
24 
25 	include(APPPATH."views/inc/header.php");
26 ?&gt;
27 
28 &lt;div id="divForJs"&gt;
29 	&lt;form id="dataForJs"&gt;
30 		&lt;?php foreach(Helpers_InputForJs::get() as $phpvar =&gt; $hiddenInput) { ?&gt;

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 61 ]
											
					&raquo;
					include(arguments)
				
								
					
											
							0
							string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
						
										
				
													56 		ob_start();
57 
58 		try
59 		{
60 			// Load the view within the current scope
61 			include $kohana_view_filename;
62 		}
63 		catch (Exception $e)
64 		{
65 			// Delete the output buffer
66 			ob_end_clean();

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 348 ]
											
					&raquo;
					Kohana_View::capture(arguments)
				
								
					
											
							0
							string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
						
											
							1
							array(1) (
    "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
)
						
										
				
													343 		{
344 			throw new View_Exception('You must set the file to use within your view before rendering');
345 		}
346 
347 		// Combine local and global data and capture the output
348 		return View::capture($this-&gt;_file, $this-&gt;_data);
349 	}
350 
351 }

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 228 ]
											
					&raquo;
					Kohana_View->render()
				
													223 	 */
224 	public function __toString()
225 	{
226 		try
227 		{
228 			return $this-&gt;render();
229 		}
230 		catch (Exception $e)
231 		{
232 			/**
233 			 * Display the exception message.

							
								
				
					
													{PHP internal call}
											
					&raquo;
					Kohana_View->__toString()
				
											
								
				
					
													SYSPATH/classes/Kohana/I18n.php [ 164 ]
											
					&raquo;
					strtr(arguments)
				
								
					
											
							str
							string(43) "The requested view :file could not be found"
						
											
							from
							array(1) (
    ":file" => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
)
						
										
				
													159 			// The message and target languages are different
160 			// Get the translation for this message
161 			$string = I18n::get($string);
162 		}
163 
164 		return empty($values) ? $string : strtr($string, $values);
165 	}
166 }

							
								
				
					
													SYSPATH/classes/Kohana/Kohana/Exception.php [ 53 ]
											
					&raquo;
					__(arguments)
				
								
					
											
							string
							string(43) "The requested view :file could not be found"
						
											
							values
							array(1) (
    ":file" => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
)
						
										
				
													48 	 * @return  void
49 	 */
50 	public function __construct($message = "", array $variables = NULL, $code = 0, Exception $previous = NULL)
51 	{
52 		// Set the message
53 		$message = __($message, $variables);
54 
55 		// Pass the message and integer code to the parent
56 		parent::__construct($message, (int) $code, $previous);
57 
58 		// Save the unmodified code

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 259 ]
											
					&raquo;
					Kohana_Kohana_Exception->__construct(arguments)
				
								
					
											
							0
							string(43) "The requested view :file could not be found"
						
											
							1
							array(1) (
    ":file" => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
)
						
										
				
													254 	{
255 		if (($path = Kohana::find_file('views', $file)) === FALSE)
256 		{
257 			throw new View_Exception('The requested view :file could not be found', array(
258 				':file' =&gt; $file,
259 			));
260 		}
261 
262 		// Store the file path locally
263 		$this-&gt;_file = $path;
264 

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 137 ]
											
					&raquo;
					Kohana_View->set_filename(arguments)
				
								
					
											
							0
							object View(2) {
    protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    protected _data => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
}
						
										
				
													132 	 */
133 	public function __construct($file = NULL, array $data = NULL)
134 	{
135 		if ($file !== NULL)
136 		{
137 			$this-&gt;set_filename($file);
138 		}
139 
140 		if ($data !== NULL)
141 		{
142 			// Add the values to the current data

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 30 ]
											
					&raquo;
					Kohana_View->__construct(arguments)
				
								
					
											
							0
							object View(2) {
    protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    protected _data => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
}
						
											
							1
							NULL
						
										
				
													25 	 * @param   array   $data   array of values
26 	 * @return  View
27 	 */
28 	public static function factory($file = NULL, array $data = NULL)
29 	{
30 		return new View($file, $data);
31 	}
32 
33 	/**
34 	 * Captures the output that is generated when a view is included.
35 	 * The view data will be extracted to make local variables. This method

							
								
				
					
													SYSPATH/classes/Kohana/Controller/Template.php [ 33 ]
											
					&raquo;
					Kohana_View::factory(arguments)
				
								
					
											
							0
							object View(2) {
    protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    protected _data => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
}
						
										
				
													28 		parent::before();
29 
30 		if ($this-&gt;auto_render === TRUE)
31 		{
32 			// Load the template
33 			$this-&gt;template = View::factory($this-&gt;template);
34 		}
35 	}
36 
37 	/**
38 	 * Assigns the template [View] as the request response.

							
								
				
					
													MODPATH/oscrud/classes/Controller/Oscrudc.php [ 31 ]
											
					&raquo;
					Kohana_Controller_Template->before()
				
													26 		// 	        $template = $this-&gt;template;
27 		// 	//echo 'site normal';
28 		// }
29         // This is important and for abstraction, since we're extending a class and its functions we need to make sure we still execute its before(); function
30         // This will load the view you need from /views/template.php or /views/template2.php depending on what your controller specifies into $this-&gt;template
31         parent::before();
32 
33         // $this-&gt;template-&gt;header = View::factory('admin/header');  // Loads default header file from our views folder /views/admin/header.php
34         // $this-&gt;template-&gt;content = View::factory('admin/content');  // Loads default index file from our views folder
35         // $this-&gt;template-&gt;footer = View::factory('admin/footer');  // Loads default footer file from our views folder
36 	

							
								
				
					
													APPPATH/classes/Controller/Golf/Main.php [ 40 ]
											
					&raquo;
					Controller_Oscrudc->before()
				
													35 		$this-&gt;ressources 		= DB_SQL::select("default")-&gt;from("ressources")
36 			-&gt;where("id_golf", "=", $this-&gt;golf-&gt;id)
37 				-&gt;query();
38 		
39 		//////////////////////////////////////////////////////////
40 		parent::before();
41 		//////////////////////////////////////////////////////////
42 
43 		Helpers_Stylesheet::add('/assets/css/easygolfpack/egp_main.css');
44 		
45 		$this-&gt;pages = array(

							
								
				
					
													APPPATH/classes/Controller/Golf/App.php [ 29 ]
											
					&raquo;
					Controller_Golf_Main->before()
				
													24 
25 
26 		//////////////////////////////////////////////////////////
27 		// Parent Creator call									//
28 		
29 		parent::before();	// execute before for parent Class
30 		
31 		//////////////////////////////////////////////////////////
32 
33 	}	// before
34 	

							
								
				
					
													SYSPATH/classes/Kohana/Controller.php [ 69 ]
											
					&raquo;
					Controller_Golf_App->before()
				
													64 	 * @return  Response
65 	 */
66 	public function execute()
67 	{
68 		// Execute the "before action" method
69 		$this-&gt;before();
70 
71 		// Determine the action to use
72 		$action = 'action_'.$this-&gt;request-&gt;action();
73 
74 		// If the action doesn't exist, it's a 404

							
								
				
					
													{PHP internal call}
											
					&raquo;
					Kohana_Controller->execute()
				
											
								
				
					
													SYSPATH/classes/Kohana/Request/Client/Internal.php [ 97 ]
											
					&raquo;
					ReflectionMethod->invoke(arguments)
				
								
					
											
							0
							object Controller_Golf_App(19) {
    public isLogged => bool TRUE
    public isAdmin => bool TRUE
    public user => object Model_Leap_User(5) {
        protected adaptors => array(2) (
            "last_login_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(2) (
                    "field" => string(10) "last_login"
                    "format" => string(11) "Y-m-d H:i:s"
                )
            }
            "new_password_requested_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(2) (
                    "field" => string(22) "new_password_requested"
                    "format" => string(11) "Y-m-d H:i:s"
                )
            }
        )
        protected aliases => array(0) 
        protected fields => array(23) (
            "id" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => integer 0
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool TRUE
                    "range" => array(2) (
                        "lower_bound" => integer 0
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 145
            }
            "email" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => string(0) ""
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 254
                )
                protected value => string(24) "contact@golf-bourbon.com"
            }
            "username" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => string(0) ""
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 32
                )
                protected value => string(0) ""
            }
            "password" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => string(0) ""
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 64
                )
                protected value => string(64) "db844ad71b412b511d56b11068ec006386a9932c15064f8301d4b03e2e5a6cbd"
            }
            "firstname" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 35
                )
                protected value => string(11) "Secretariat"
            }
            "lastname" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 50
                )
                protected value => string(12) "GOLF BOURBON"
            }
            "activated" => object DB_ORM_Field_Boolean(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(8) "checkbox"
                    "default" => bool TRUE
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "boolean"
                )
                protected value => bool TRUE
            }
            "banned" => object DB_ORM_Field_Boolean(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(8) "checkbox"
                    "default" => bool FALSE
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "boolean"
                )
                protected value => bool FALSE
            }
            "ban_reason" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 255
                )
                protected value => NULL
            }
            "new_password_key" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 64
                )
                protected value => NULL
            }
            "new_password_requested" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => NULL
            }
            "new_email" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 254
                )
                protected value => NULL
            }
            "new_email_key" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 64
                )
                protected value => NULL
            }
            "logins" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => integer 0
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 10
                    "unsigned" => bool TRUE
                    "range" => array(2) (
                        "lower_bound" => integer 0
                        "upper_bound" => integer 2147483647
                    )
                )
                protected value => integer 3116
            }
            "last_login" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 10
                    "unsigned" => bool TRUE
                    "range" => array(2) (
                        "lower_bound" => integer 0
                        "upper_bound" => integer 2147483647
                    )
                )
                protected value => integer 1430212803
            }
            "last_ip" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 39
                )
                protected value => string(3) "::1"
            }
            "indgolf" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 10
                )
                protected value => string(1) "0"
            }
            "adresse" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 200
                )
                protected value => NULL
            }
            "cp" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 10
                )
                protected value => NULL
            }
            "ville" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 100
                )
                protected value => NULL
            }
            "telephone" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 25
                )
                protected value => NULL
            }
            "id_pays" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => NULL
            }
            "id_status" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 1
            }
        )
        protected metadata => array(2) (
            "loaded" => bool TRUE
            "saved" => string(40) "e15cea14d351c743e5e34612ab730035adb20cc8"
        )
        protected relations => array(3) (
            "user_roles" => object DB_ORM_Relation_HasMany(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "type" => string(8) "has_many"
                    "parent_model" => string(15) "Model_Leap_User"
                    "parent_key" => array(1) (
                        0 => string(2) "id"
                    )
                    "child_model" => string(20) "Model_Leap_User_Role"
                    "child_key" => array(1) (
                        0 => string(7) "user_id"
                    )
                    "options" => array(0) 
                )
                protected cache => object DB_ResultSet(4) {
                    protected records => array(1) (
                        0 => object Model_Leap_User_Role(5) {
                            protected adaptors => array(0) 
                            protected aliases => array(0) 
                            protected fields => array(3) (
                                "user_id" => object DB_ORM_Field_Integer(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(9) (
                                        "control" => string(4) "auto"
                                        "default" => integer 0
                                        "modified" => bool TRUE
                                        "nullable" => bool FALSE
                                        "savable" => bool TRUE
                                        "type" => string(7) "integer"
                                        "max_length" => integer 10
                                        "unsigned" => bool TRUE
                                        "range" => array(2) (
                                            ...
                                        )
                                    )
                                    protected value => integer 145
                                }
                                "role_id" => object DB_ORM_Field_Integer(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(9) (
                                        "control" => string(4) "auto"
                                        "default" => integer 0
                                        "modified" => bool TRUE
                                        "nullable" => bool FALSE
                                        "savable" => bool TRUE
                                        "type" => string(7) "integer"
                                        "max_length" => integer 10
                                        "unsigned" => bool TRUE
                                        "range" => array(2) (
                                            ...
                                        )
                                    )
                                    protected value => integer 14
                                }
                                "id" => object DB_ORM_Field_Integer(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(9) (
                                        "control" => string(4) "auto"
                                        "default" => integer 0
                                        "modified" => bool TRUE
                                        "nullable" => bool FALSE
                                        "savable" => bool TRUE
                                        "type" => string(7) "integer"
                                        "max_length" => integer 11
                                        "unsigned" => bool FALSE
                                        "range" => array(2) (
                                            ...
                                        )
                                    )
                                    protected value => integer 11
                                }
                            )
                            protected metadata => array(2) (
                                "loaded" => bool TRUE
                                "saved" => NULL
                            )
                            protected relations => array(2) (
                                "user" => object DB_ORM_Relation_BelongsTo(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(5) (
                                        "type" => string(10) "belongs_to"
                                        "parent_model" => string(15) "Model_Leap_User"
                                        "parent_key" => array(1) (
                                            ...
                                        )
                                        "child_model" => string(20) "Model_Leap_User_Role"
                                        "child_key" => array(1) (
                                            ...
                                        )
                                    )
                                    protected cache => NULL
                                }
                                "role" => object DB_ORM_Relation_BelongsTo(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(5) (
                                        "type" => string(10) "belongs_to"
                                        "parent_model" => string(15) "Model_Leap_Role"
                                        "parent_key" => array(1) (
                                            ...
                                        )
                                        "child_model" => string(20) "Model_Leap_User_Role"
                                        "child_key" => array(1) (
                                            ...
                                        )
                                    )
                                    protected cache => object Model_Leap_Role(5) {
                                        protected adaptors => array(0) 
                                        protected aliases => array(0) 
                                        protected fields => array(3) (
                                            ...
                                        )
                                        protected metadata => array(2) (
                                            ...
                                        )
                                        protected relations => array(1) (
                                            ...
                                        )
                                    }
                                }
                            )
                        }
                    )
                    protected position => integer 1
                    protected size => integer 1
                    protected type => string(20) "Model_Leap_User_Role"
                }
            }
            "user_token" => object DB_ORM_Relation_HasMany(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "type" => string(8) "has_many"
                    "parent_model" => string(15) "Model_Leap_User"
                    "parent_key" => array(1) (
                        0 => string(2) "id"
                    )
                    "child_model" => string(21) "Model_Leap_User_Token"
                    "child_key" => array(1) (
                        0 => string(7) "user_id"
                    )
                    "options" => array(0) 
                )
                protected cache => NULL
            }
            "status" => object DB_ORM_Relation_BelongsTo(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(5) (
                    "type" => string(10) "belongs_to"
                    "parent_model" => string(22) "Model_Leap_user_status"
                    "parent_key" => array(1) (
                        0 => string(2) "id"
                    )
                    "child_model" => string(15) "Model_Leap_User"
                    "child_key" => array(1) (
                        0 => string(9) "id_status"
                    )
                )
                protected cache => NULL
            }
        )
    }
    public golf => object Model_Leap_Golf(5) {
        protected adaptors => array(0) 
        protected aliases => array(0) 
        protected fields => array(13) (
            "id" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => integer 0
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 1
            }
            "nom" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(20) "Golf Club de Bourbon"
            }
            "adresse" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => NULL
            }
            "cp" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(5) "97419"
            }
            "ville" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(21) "Etang-Salé les bains"
            }
            "pays" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(8) "Réunion"
            }
            "intervalle" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 20
            }
            "heure_ouverture" => object DB_ORM_Field_DateTime(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                )
                protected value => string(19) "1970-01-01 06:00:00"
            }
            "heure_fermeture" => object DB_ORM_Field_DateTime(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                )
                protected value => string(19) "1970-01-01 18:30:00"
            }
            "smtp_host" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 255
                )
                protected value => string(14) "smtp.gmail.com"
            }
            "smtp_port" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 465
            }
            "smtp_username" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(25) "easygolfpack@cbleuapp.com"
            }
            "smtp_password" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(15) "easygolfpack974"
            }
        )
        protected metadata => array(2) (
            "loaded" => bool TRUE
            "saved" => string(40) "931a65dcd1736fea7e86a2ec092683f82f39cb01"
        )
        protected relations => array(0) 
    }
    public golf_rules => object DB_ResultSet(4) {
        protected records => array(7) (
            0 => array(3) (
                "rule" => string(31) "fenetre_reservation_heures_supp"
                "value" => string(1) "3"
                "description" => string(93) "Nombre d'heures avant minuit pour prendre les rservations pour les jours suivants (en heures)"
            )
            1 => array(3) (
                "rule" => string(25) "fenetre_reservation_jours"
                "value" => string(1) "4"
                "description" => string(64) "Nombres de jours  venir pour prendre les rservations (en jours) "
            )
            2 => array(3) (
                "rule" => string(11) "max_players"
                "value" => string(1) "4"
                "description" => string(36) "Nombre maximum de joueurs par partie"
            )
            3 => array(3) (
                "rule" => string(11) "nb_parcours"
                "value" => string(1) "2"
                "description" => string(61) "Nombre de parcours (de 9 trous) pouvant constituer une partie"
            )
            4 => array(3) (
                "rule" => string(21) "resa_provisoire_admin"
                "value" => string(4) "3600"
                "description" => string(141) "Dure de blocage de la rservation provisoire lors de l'ouvertue du formulaire de rservation (ou wizard) pour les administrateurs &nbsp;&hellip;"
            )
            5 => array(3) (
                "rule" => string(22) "resa_provisoire_membre"
                "value" => string(3) "120"
                "description" => string(133) "Dure de blocage de la rservation provisoire lors de l'ouvertue du formulaire de rservation (ou wizard) pour les membres (en seco&nbsp;&hellip;"
            )
            6 => array(3) (
                "rule" => string(24) "resa_provisoire_visiteur"
                "value" => string(3) "300"
                "description" => string(122) "Dure de blocage de la rservation provisoire lors de l'utilisation du wizard de rservation pour les visiteurs (en secondes)"
            )
        )
        protected position => integer 0
        protected size => integer 7
        protected type => string(5) "array"
    }
    public ressources => object DB_ResultSet(4) {
        protected records => array(1) (
            0 => array(5) (
                "id" => string(1) "2"
                "ressource" => string(7) "Chariot"
                "qte_max_par_partie" => string(1) "4"
                "qte_stock" => string(2) "50"
                "id_golf" => string(1) "1"
            )
        )
        protected position => integer 0
        protected size => integer 1
        protected type => string(5) "array"
    }
    public parcours => object DB_ResultSet(4) {
        protected records => array(4) (
            0 => array(6) (
                "id" => string(1) "1"
                "nom_parcours" => string(21) "9 trous depart trou 1"
                "nb_trous_total" => string(1) "9"
                "trou_depart" => string(1) "1"
                "parcour_aller" => string(1) "1"
                "parcour_retour" => NULL
            )
            1 => array(6) (
                "id" => string(1) "2"
                "nom_parcours" => string(22) "9 trous depart trou 10"
                "nb_trous_total" => string(1) "9"
                "trou_depart" => string(2) "10"
                "parcour_aller" => string(1) "2"
                "parcour_retour" => NULL
            )
            2 => array(6) (
                "id" => string(1) "3"
                "nom_parcours" => string(22) "18 trous depart trou 1"
                "nb_trous_total" => string(2) "18"
                "trou_depart" => string(1) "1"
                "parcour_aller" => string(1) "1"
                "parcour_retour" => string(1) "2"
            )
            3 => array(6) (
                "id" => string(1) "4"
                "nom_parcours" => string(23) "18 trous depart trou 10"
                "nb_trous_total" => string(2) "18"
                "trou_depart" => string(2) "10"
                "parcour_aller" => string(1) "2"
                "parcour_retour" => string(1) "1"
            )
        )
        protected position => integer 0
        protected size => integer 4
        protected type => string(5) "array"
    }
    public type_parcours => object DB_ResultSet(4) {
        protected records => array(4) (
            0 => array(5) (
                "id" => string(1) "1"
                "trou_depart" => string(1) "1"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7200"
                "description" => string(22) "[1  -&gt;  9] trac normal"
            )
            1 => array(5) (
                "id" => string(1) "2"
                "trou_depart" => string(2) "10"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7800"
                "description" => string(20) "[10-&gt;18] trac normal"
            )
            2 => array(5) (
                "id" => string(1) "3"
                "trou_depart" => string(1) "1"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7800"
                "description" => string(21) "[1  -&gt;  9] trac InOut"
            )
            3 => array(5) (
                "id" => string(1) "4"
                "trou_depart" => string(2) "10"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7200"
                "description" => string(19) "[10-&gt;18] trac InOut"
            )
        )
        protected position => integer 0
        protected size => integer 4
        protected type => string(5) "array"
    }
    public pages => NULL
    public pageTitle => NULL
    public pageCSS => NULL
    public pageJS => NULL
    public pageBreadcrumbs => NULL
    protected _table_model => string(0) ""
    public template => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
    protected _route_name => string(7) "oscrudc"
    public auto_render => bool TRUE
    public request => object Request(19) {
        protected _requested_with => NULL
        protected _method => string(3) "GET"
        protected _protocol => string(8) "HTTP/1.1"
        protected _secure => bool FALSE
        protected _referrer => string(27) "http://gcb-smart:8090/admin"
        protected _route => object Route(5) {
            protected _filters => array(0) 
            protected _uri => string(32) "(&lt;controller&gt;(/&lt;action&gt;(/&lt;id&gt;)))"
            protected _regex => array(0) 
            protected _defaults => array(3) (
                "directory" => string(4) "golf"
                "controller" => string(3) "app"
                "action" => string(5) "index"
            )
            protected _route_regex => string(95) "#^(?:(?P&lt;controller&gt;[^/.,;?\n]++)(?:/(?P&lt;action&gt;[^/.,;?\n]++)(?:/(?P&lt;id&gt;[^/.,;?\n]++))?)?)?$#uD"
        }
        protected _routes => array(0) 
        protected _header => object HTTP_Header(0) {
        }
        protected _body => NULL
        protected _directory => string(4) "Golf"
        protected _controller => string(3) "App"
        protected _action => string(10) "calendrier"
        protected _uri => string(14) "app/calendrier"
        protected _external => bool FALSE
        protected _params => array(0) 
        protected _get => array(0) 
        protected _post => array(0) 
        protected _cookies => array(13) (
            "session" => NULL
            "crud_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "per_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "crud_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
            "per_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
            "hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096" => NULL
            "hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096" => NULL
            "crud_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
            "per_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
            "hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
            "hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        )
        protected _client => object Request_Client_Internal(9) {
            protected _previous_environment => NULL
            protected _cache => NULL
            protected _follow => bool FALSE
            protected _follow_headers => array(1) (
                0 => string(13) "Authorization"
            )
            protected _strict_redirect => bool TRUE
            protected _header_callbacks => array(1) (
                "Location" => string(34) "Request_Client::on_header_location"
            )
            protected _max_callback_depth => integer 5
            protected _callback_depth => integer 1
            protected _callback_params => array(0) 
        }
    }
    public response => object Response(5) {
        protected _status => integer 200
        protected _header => object HTTP_Header(0) {
        }
        protected _body => string(0) ""
        protected _cookies => array(0) 
        protected _protocol => string(8) "HTTP/1.1"
    }
}
						
										
				
													 92 
 93 			// Create a new instance of the controller
 94 			$controller = $class-&gt;newInstance($request, $response);
 95 
 96 			// Run the controller's execute() method
 97 			$response = $class-&gt;getMethod('execute')-&gt;invoke($controller);
 98 
 99 			if ( ! $response instanceof Response)
100 			{
101 				// Controller failed to return a Response.
102 				throw new Kohana_Exception('Controller failed to return a Response');

							
								
				
					
													SYSPATH/classes/Kohana/Request/Client.php [ 114 ]
											
					&raquo;
					Kohana_Request_Client_Internal->execute_request(arguments)
				
								
					
											
							0
							object Request(19) {
    protected _requested_with => NULL
    protected _method => string(3) "GET"
    protected _protocol => string(8) "HTTP/1.1"
    protected _secure => bool FALSE
    protected _referrer => string(27) "http://gcb-smart:8090/admin"
    protected _route => object Route(5) {
        protected _filters => array(0) 
        protected _uri => string(32) "(&lt;controller&gt;(/&lt;action&gt;(/&lt;id&gt;)))"
        protected _regex => array(0) 
        protected _defaults => array(3) (
            "directory" => string(4) "golf"
            "controller" => string(3) "app"
            "action" => string(5) "index"
        )
        protected _route_regex => string(95) "#^(?:(?P&lt;controller&gt;[^/.,;?\n]++)(?:/(?P&lt;action&gt;[^/.,;?\n]++)(?:/(?P&lt;id&gt;[^/.,;?\n]++))?)?)?$#uD"
    }
    protected _routes => array(0) 
    protected _header => object HTTP_Header(0) {
    }
    protected _body => NULL
    protected _directory => string(4) "Golf"
    protected _controller => string(3) "App"
    protected _action => string(10) "calendrier"
    protected _uri => string(14) "app/calendrier"
    protected _external => bool FALSE
    protected _params => array(0) 
    protected _get => array(0) 
    protected _post => array(0) 
    protected _cookies => array(13) (
        "session" => NULL
        "crud_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "per_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "crud_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "per_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "crud_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "per_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
    )
    protected _client => object Request_Client_Internal(9) {
        protected _previous_environment => NULL
        protected _cache => NULL
        protected _follow => bool FALSE
        protected _follow_headers => array(1) (
            0 => string(13) "Authorization"
        )
        protected _strict_redirect => bool TRUE
        protected _header_callbacks => array(1) (
            "Location" => string(34) "Request_Client::on_header_location"
        )
        protected _max_callback_depth => integer 5
        protected _callback_depth => integer 1
        protected _callback_params => array(0) 
    }
}
						
											
							1
							object Response(5) {
    protected _status => integer 200
    protected _header => object HTTP_Header(0) {
    }
    protected _body => string(0) ""
    protected _cookies => array(0) 
    protected _protocol => string(8) "HTTP/1.1"
}
						
										
				
													109 		$orig_response = $response = Response::factory(array('_protocol' =&gt; $request-&gt;protocol()));
110 
111 		if (($cache = $this-&gt;cache()) instanceof HTTP_Cache)
112 			return $cache-&gt;execute($this, $request, $response);
113 
114 		$response = $this-&gt;execute_request($request, $response);
115 
116 		// Execute response callbacks
117 		foreach ($this-&gt;header_callbacks() as $header =&gt; $callback)
118 		{
119 			if ($response-&gt;headers($header))

							
								
				
					
													SYSPATH/classes/Kohana/Request.php [ 986 ]
											
					&raquo;
					Kohana_Request_Client->execute(arguments)
				
								
					
											
							0
							object Request(19) {
    protected _requested_with => NULL
    protected _method => string(3) "GET"
    protected _protocol => string(8) "HTTP/1.1"
    protected _secure => bool FALSE
    protected _referrer => string(27) "http://gcb-smart:8090/admin"
    protected _route => object Route(5) {
        protected _filters => array(0) 
        protected _uri => string(32) "(&lt;controller&gt;(/&lt;action&gt;(/&lt;id&gt;)))"
        protected _regex => array(0) 
        protected _defaults => array(3) (
            "directory" => string(4) "golf"
            "controller" => string(3) "app"
            "action" => string(5) "index"
        )
        protected _route_regex => string(95) "#^(?:(?P&lt;controller&gt;[^/.,;?\n]++)(?:/(?P&lt;action&gt;[^/.,;?\n]++)(?:/(?P&lt;id&gt;[^/.,;?\n]++))?)?)?$#uD"
    }
    protected _routes => array(0) 
    protected _header => object HTTP_Header(0) {
    }
    protected _body => NULL
    protected _directory => string(4) "Golf"
    protected _controller => string(3) "App"
    protected _action => string(10) "calendrier"
    protected _uri => string(14) "app/calendrier"
    protected _external => bool FALSE
    protected _params => array(0) 
    protected _get => array(0) 
    protected _post => array(0) 
    protected _cookies => array(13) (
        "session" => NULL
        "crud_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "per_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "crud_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "per_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "crud_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "per_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
    )
    protected _client => object Request_Client_Internal(9) {
        protected _previous_environment => NULL
        protected _cache => NULL
        protected _follow => bool FALSE
        protected _follow_headers => array(1) (
            0 => string(13) "Authorization"
        )
        protected _strict_redirect => bool TRUE
        protected _header_callbacks => array(1) (
            "Location" => string(34) "Request_Client::on_header_location"
        )
        protected _max_callback_depth => integer 5
        protected _callback_depth => integer 1
        protected _callback_params => array(0) 
    }
}
						
										
				
													981 			throw new Request_Exception('Unable to execute :uri without a Kohana_Request_Client', array(
982 				':uri' =&gt; $this-&gt;_uri,
983 			));
984 		}
985 
986 		return $this-&gt;_client-&gt;execute($this);
987 	}
988 
989 	/**
990 	 * Returns whether this request is the initial request Kohana received.
991 	 * Can be used to test for sub requests.

							
								
				
					
													DOCROOT/index.php [ 118 ]
											
					&raquo;
					Kohana_Request->execute()
				
													113 	/**
114 	 * Execute the main request. A source of the URI can be passed, eg: $_SERVER['PATH_INFO'].
115 	 * If no source is specified, the URI will be automatically detected.
116 	 */
117 	echo Request::factory(TRUE, array(), FALSE)
118 		-&gt;execute()
119 		-&gt;send_headers(TRUE)
120 		-&gt;body();
121 }

							
							
	
	Environment
	
				Included files (177)
		
			
								
					DOCROOT/index.php
				
								
					APPPATH/bootstrap.php
				
								
					SYSPATH/classes/Kohana/Core.php
				
								
					SYSPATH/classes/Kohana.php
				
								
					SYSPATH/classes/I18n.php
				
								
					SYSPATH/classes/Kohana/I18n.php
				
								
					SYSPATH/classes/HTTP.php
				
								
					SYSPATH/classes/Kohana/HTTP.php
				
								
					SYSPATH/classes/Kohana/Exception.php
				
								
					SYSPATH/classes/Kohana/Kohana/Exception.php
				
								
					SYSPATH/classes/Log.php
				
								
					SYSPATH/classes/Kohana/Log.php
				
								
					SYSPATH/classes/Config.php
				
								
					SYSPATH/classes/Kohana/Config.php
				
								
					SYSPATH/classes/Log/File.php
				
								
					SYSPATH/classes/Kohana/Log/File.php
				
								
					SYSPATH/classes/Log/Writer.php
				
								
					SYSPATH/classes/Kohana/Log/Writer.php
				
								
					SYSPATH/classes/Config/File.php
				
								
					SYSPATH/classes/Kohana/Config/File.php
				
								
					SYSPATH/classes/Kohana/Config/File/Reader.php
				
								
					SYSPATH/classes/Kohana/Config/Reader.php
				
								
					SYSPATH/classes/Kohana/Config/Source.php
				
								
					SYSPATH/classes/Cookie.php
				
								
					SYSPATH/classes/Kohana/Cookie.php
				
								
					SYSPATH/classes/Route.php
				
								
					SYSPATH/classes/Kohana/Route.php
				
								
					SYSPATH/classes/Request.php
				
								
					SYSPATH/classes/Kohana/Request.php
				
								
					SYSPATH/classes/HTTP/Request.php
				
								
					SYSPATH/classes/Kohana/HTTP/Request.php
				
								
					SYSPATH/classes/HTTP/Message.php
				
								
					SYSPATH/classes/Kohana/HTTP/Message.php
				
								
					SYSPATH/classes/HTTP/Header.php
				
								
					SYSPATH/classes/Kohana/HTTP/Header.php
				
								
					SYSPATH/classes/Request/Client/Internal.php
				
								
					SYSPATH/classes/Kohana/Request/Client/Internal.php
				
								
					SYSPATH/classes/Request/Client.php
				
								
					SYSPATH/classes/Kohana/Request/Client.php
				
								
					SYSPATH/classes/Arr.php
				
								
					SYSPATH/classes/Kohana/Arr.php
				
								
					SYSPATH/classes/Response.php
				
								
					SYSPATH/classes/Kohana/Response.php
				
								
					SYSPATH/classes/HTTP/Response.php
				
								
					SYSPATH/classes/Kohana/HTTP/Response.php
				
								
					SYSPATH/classes/Profiler.php
				
								
					SYSPATH/classes/Kohana/Profiler.php
				
								
					APPPATH/classes/Controller/Golf/App.php
				
								
					APPPATH/classes/Controller/Golf/Main.php
				
								
					MODPATH/oscrud/classes/Controller/Oscrudc.php
				
								
					SYSPATH/classes/Controller/Template.php
				
								
					SYSPATH/classes/Kohana/Controller/Template.php
				
								
					SYSPATH/classes/Controller.php
				
								
					SYSPATH/classes/Kohana/Controller.php
				
								
					SYSPATH/classes/View.php
				
								
					SYSPATH/classes/Kohana/View.php
				
								
					MODPATH/notify/classes/Notify.php
				
								
					MODPATH/notify/classes/Notify/Core.php
				
								
					MODPATH/notify/config/notify.php
				
								
					SYSPATH/classes/Config/Group.php
				
								
					SYSPATH/classes/Kohana/Config/Group.php
				
								
					SYSPATH/classes/Session.php
				
								
					SYSPATH/classes/Kohana/Session.php
				
								
					SYSPATH/config/session.php
				
								
					MODPATH/leap/config/session.php
				
								
					MODPATH/database/config/session.php
				
								
					SYSPATH/classes/Session/Native.php
				
								
					SYSPATH/classes/Kohana/Session/Native.php
				
								
					MODPATH/leap/classes/Model/Leap/User.php
				
								
					MODPATH/leap/classes/Base/Model/Leap/User.php
				
								
					MODPATH/leap/classes/DB/ORM/Model.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Model.php
				
								
					MODPATH/leap/classes/Core/Object.php
				
								
					MODPATH/leap/classes/Base/Core/Object.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Adaptor/DateTime.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Adaptor/DateTime.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Adaptor.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Adaptor.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Integer.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php
				
								
					MODPATH/leap/classes/DB/ORM/Field.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/String.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/String.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Boolean.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Boolean.php
				
								
					MODPATH/leap/classes/DB/ORM/Relation/HasMany.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Relation/HasMany.php
				
								
					MODPATH/leap/classes/DB/ORM/Relation.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Relation.php
				
								
					MODPATH/leap/classes/DB/ResultSet.php
				
								
					MODPATH/leap/classes/Base/DB/ResultSet.php
				
								
					MODPATH/leap/classes/Model/Leap/User/Role.php
				
								
					MODPATH/leap/classes/Base/Model/Leap/User/Role.php
				
								
					MODPATH/leap/classes/DB/ORM/Relation/BelongsTo.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Relation/BelongsTo.php
				
								
					MODPATH/leap/classes/Model/Leap/Role.php
				
								
					MODPATH/leap/classes/Base/Model/Leap/Role.php
				
								
					MODPATH/notify/views/notify/bootstrap.php
				
								
					MODPATH/auth/classes/Auth.php
				
								
					MODPATH/auth/classes/Kohana/Auth.php
				
								
					MODPATH/leap/config/auth.php
				
								
					MODPATH/auth/config/auth.php
				
								
					APPPATH/config/auth.php
				
								
					MODPATH/leap/classes/Auth/Leap.php
				
								
					MODPATH/leap/classes/Base/Auth/Leap.php
				
								
					MODPATH/leap/classes/DB/ORM.php
				
								
					MODPATH/leap/classes/Base/DB/ORM.php
				
								
					MODPATH/leap/classes/DB/ORM/Select/Proxy.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Select/Proxy.php
				
								
					MODPATH/leap/classes/DB/SQL/Statement.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Statement.php
				
								
					MODPATH/leap/classes/DB/DataSource.php
				
								
					MODPATH/leap/classes/Base/DB/DataSource.php
				
								
					MODPATH/leap/config/database.php
				
								
					MODPATH/database/config/database.php
				
								
					APPPATH/config/database.php
				
								
					MODPATH/leap/classes/DB/MySQL/Select/Builder.php
				
								
					MODPATH/leap/classes/Base/DB/MySQL/Select/Builder.php
				
								
					MODPATH/leap/classes/DB/SQL/Select/Builder.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Select/Builder.php
				
								
					MODPATH/leap/classes/DB/SQL/Builder.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Builder.php
				
								
					MODPATH/leap/classes/DB/MySQL/Expression.php
				
								
					MODPATH/leap/classes/Base/DB/MySQL/Expression.php
				
								
					MODPATH/leap/classes/DB/SQL/Expression/Interface.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Expression/Interface.php
				
								
					MODPATH/database/classes/Database/Expression.php
				
								
					MODPATH/database/classes/Kohana/Database/Expression.php
				
								
					MODPATH/leap/classes/DB/SQL/Operator.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Operator.php
				
								
					MODPATH/leap/classes/DB/Connection/Pool.php
				
								
					MODPATH/leap/classes/Base/DB/Connection/Pool.php
				
								
					MODPATH/leap/classes/DB/Connection.php
				
								
					MODPATH/leap/classes/Base/DB/Connection.php
				
								
					MODPATH/leap/classes/DB/MySQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/Base/DB/MySQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/DB/SQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/DB/SQL/Connector.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Connector.php
				
								
					APPPATH/classes/Model/Leap/Golf.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/DateTime.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/DateTime.php
				
								
					MODPATH/leap/classes/DB/SQL.php
				
								
					MODPATH/leap/classes/Base/DB/SQL.php
				
								
					MODPATH/leap/classes/DB/SQL/Select/Proxy.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Select/Proxy.php
				
								
					APPPATH/views/egp_template.php
				
								
					APPPATH/views/inc/init.php
				
								
					APPPATH/views/lib/config.php
				
								
					APPPATH/views/lib/func.global.php
				
								
					APPPATH/views/lib/smartui/class.smartutil.php
				
								
					APPPATH/views/lib/smartui/class.smartui.php
				
								
					APPPATH/views/lib/smartui/class.smartui-widget.php
				
								
					APPPATH/views/lib/smartui/class.smartui-datatable.php
				
								
					APPPATH/views/lib/smartui/class.smartui-button.php
				
								
					APPPATH/views/lib/smartui/class.smartui-tab.php
				
								
					APPPATH/views/lib/smartui/class.smartui-accordion.php
				
								
					APPPATH/views/lib/smartui/class.smartui-carousel.php
				
								
					APPPATH/views/lib/smartui/class.smartui-smartform.php
				
								
					APPPATH/views/lib/smartui/class.smartui-nav.php
				
								
					APPPATH/views/lib/class.html-indent.php
				
								
					APPPATH/views/lib/class.parsedown.php
				
								
					APPPATH/views/inc/config.ui.php
				
								
					APPPATH/views/inc/header.php
				
								
					SYSPATH/classes/Debug.php
				
								
					SYSPATH/classes/Kohana/Debug.php
				
								
					SYSPATH/classes/Date.php
				
								
					SYSPATH/classes/Kohana/Date.php
				
								
					SYSPATH/views/kohana/error.php
				
								
					SYSPATH/i18n/fr.php
				
								
					APPPATH/i18n/fr.php
				
								
					SYSPATH/classes/UTF8.php
				
								
					SYSPATH/classes/Kohana/UTF8.php
				
								
					SYSPATH/classes/View/Exception.php
				
								
					SYSPATH/classes/Kohana/View/Exception.php
				
							
		
				Loaded extensions (54)
		
			
								
					Core
				
								
					date
				
								
					ereg
				
								
					libxml
				
								
					openssl
				
								
					pcre
				
								
					sqlite3
				
								
					zlib
				
								
					bcmath
				
								
					bz2
				
								
					calendar
				
								
					ctype
				
								
					curl
				
								
					dom
				
								
					hash
				
								
					fileinfo
				
								
					filter
				
								
					ftp
				
								
					gd
				
								
					SPL
				
								
					iconv
				
								
					intl
				
								
					json
				
								
					ldap
				
								
					mbstring
				
								
					mysql
				
								
					mysqli
				
								
					session
				
								
					PDO
				
								
					pdo_sqlite
				
								
					standard
				
								
					posix
				
								
					Reflection
				
								
					Phar
				
								
					SimpleXML
				
								
					soap
				
								
					sockets
				
								
					exif
				
								
					tokenizer
				
								
					wddx
				
								
					xml
				
								
					xmlreader
				
								
					xmlwriter
				
								
					xsl
				
								
					zip
				
								
					apache2handler
				
								
					imap
				
								
					gettext
				
								
					mcrypt
				
								
					yaz
				
								
					pgsql
				
								
					pdo_pgsql
				
								
					pdo_mysql
				
								
					xdebug
				
							
		
						$_SESSION
		
			
								
					last_active
					integer 1430479541
				
								
					user
					object Model_Leap_User(5) {
    protected adaptors => array(2) (
        "last_login_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(2) (
                "field" => string(10) "last_login"
                "format" => string(11) "Y-m-d H:i:s"
            )
        }
        "new_password_requested_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(2) (
                "field" => string(22) "new_password_requested"
                "format" => string(11) "Y-m-d H:i:s"
            )
        }
    )
    protected aliases => array(0) 
    protected fields => array(23) (
        "id" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => integer 0
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool TRUE
                "range" => array(2) (
                    "lower_bound" => integer 0
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => integer 145
        }
        "email" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => string(0) ""
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 254
            )
            protected value => string(24) "contact@golf-bourbon.com"
        }
        "username" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => string(0) ""
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 32
            )
            protected value => string(0) ""
        }
        "password" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => string(0) ""
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 64
            )
            protected value => string(64) "db844ad71b412b511d56b11068ec006386a9932c15064f8301d4b03e2e5a6cbd"
        }
        "firstname" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 35
            )
            protected value => string(11) "Secretariat"
        }
        "lastname" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 50
            )
            protected value => string(12) "GOLF BOURBON"
        }
        "activated" => object DB_ORM_Field_Boolean(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "control" => string(8) "checkbox"
                "default" => bool TRUE
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "boolean"
            )
            protected value => bool TRUE
        }
        "banned" => object DB_ORM_Field_Boolean(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "control" => string(8) "checkbox"
                "default" => bool FALSE
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "boolean"
            )
            protected value => bool FALSE
        }
        "ban_reason" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 255
            )
            protected value => NULL
        }
        "new_password_key" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 64
            )
            protected value => NULL
        }
        "new_password_requested" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool FALSE
                "range" => array(2) (
                    "lower_bound" => float -9,22337203685E+18
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => NULL
        }
        "new_email" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 254
            )
            protected value => NULL
        }
        "new_email_key" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 64
            )
            protected value => NULL
        }
        "logins" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => integer 0
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 10
                "unsigned" => bool TRUE
                "range" => array(2) (
                    "lower_bound" => integer 0
                    "upper_bound" => integer 2147483647
                )
            )
            protected value => integer 3116
        }
        "last_login" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 10
                "unsigned" => bool TRUE
                "range" => array(2) (
                    "lower_bound" => integer 0
                    "upper_bound" => integer 2147483647
                )
            )
            protected value => integer 1430212803
        }
        "last_ip" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 39
            )
            protected value => string(3) "::1"
        }
        "indgolf" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 10
            )
            protected value => string(1) "0"
        }
        "adresse" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 200
            )
            protected value => NULL
        }
        "cp" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 10
            )
            protected value => NULL
        }
        "ville" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 100
            )
            protected value => NULL
        }
        "telephone" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 25
            )
            protected value => NULL
        }
        "id_pays" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool FALSE
                "range" => array(2) (
                    "lower_bound" => float -9,22337203685E+18
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => NULL
        }
        "id_status" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool FALSE
                "range" => array(2) (
                    "lower_bound" => float -9,22337203685E+18
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => integer 1
        }
    )
    protected metadata => array(2) (
        "loaded" => bool TRUE
        "saved" => string(40) "e15cea14d351c743e5e34612ab730035adb20cc8"
    )
    protected relations => array(3) (
        "user_roles" => object DB_ORM_Relation_HasMany(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "type" => string(8) "has_many"
                "parent_model" => string(15) "Model_Leap_User"
                "parent_key" => array(1) (
                    0 => string(2) "id"
                )
                "child_model" => string(20) "Model_Leap_User_Role"
                "child_key" => array(1) (
                    0 => string(7) "user_id"
                )
                "options" => array(0) 
            )
            protected cache => object DB_ResultSet(4) {
                protected records => array(1) (
                    0 => object Model_Leap_User_Role(5) {
                        protected adaptors => array(0) 
                        protected aliases => array(0) 
                        protected fields => array(3) (
                            "user_id" => object DB_ORM_Field_Integer(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(9) (
                                    "control" => string(4) "auto"
                                    "default" => integer 0
                                    "modified" => bool TRUE
                                    "nullable" => bool FALSE
                                    "savable" => bool TRUE
                                    "type" => string(7) "integer"
                                    "max_length" => integer 10
                                    "unsigned" => bool TRUE
                                    "range" => array(2) (
                                        "lower_bound" => integer 0
                                        "upper_bound" => integer 2147483647
                                    )
                                )
                                protected value => integer 145
                            }
                            "role_id" => object DB_ORM_Field_Integer(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(9) (
                                    "control" => string(4) "auto"
                                    "default" => integer 0
                                    "modified" => bool TRUE
                                    "nullable" => bool FALSE
                                    "savable" => bool TRUE
                                    "type" => string(7) "integer"
                                    "max_length" => integer 10
                                    "unsigned" => bool TRUE
                                    "range" => array(2) (
                                        "lower_bound" => integer 0
                                        "upper_bound" => integer 2147483647
                                    )
                                )
                                protected value => integer 14
                            }
                            "id" => object DB_ORM_Field_Integer(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(9) (
                                    "control" => string(4) "auto"
                                    "default" => integer 0
                                    "modified" => bool TRUE
                                    "nullable" => bool FALSE
                                    "savable" => bool TRUE
                                    "type" => string(7) "integer"
                                    "max_length" => integer 11
                                    "unsigned" => bool FALSE
                                    "range" => array(2) (
                                        "lower_bound" => float -9,22337203685E+18
                                        "upper_bound" => integer 9223372036854775807
                                    )
                                )
                                protected value => integer 11
                            }
                        )
                        protected metadata => array(2) (
                            "loaded" => bool TRUE
                            "saved" => NULL
                        )
                        protected relations => array(2) (
                            "user" => object DB_ORM_Relation_BelongsTo(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(5) (
                                    "type" => string(10) "belongs_to"
                                    "parent_model" => string(15) "Model_Leap_User"
                                    "parent_key" => array(1) (
                                        0 => string(2) "id"
                                    )
                                    "child_model" => string(20) "Model_Leap_User_Role"
                                    "child_key" => array(1) (
                                        0 => string(7) "user_id"
                                    )
                                )
                                protected cache => NULL
                            }
                            "role" => object DB_ORM_Relation_BelongsTo(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(5) (
                                    "type" => string(10) "belongs_to"
                                    "parent_model" => string(15) "Model_Leap_Role"
                                    "parent_key" => array(1) (
                                        0 => string(2) "id"
                                    )
                                    "child_model" => string(20) "Model_Leap_User_Role"
                                    "child_key" => array(1) (
                                        0 => string(7) "role_id"
                                    )
                                )
                                protected cache => object Model_Leap_Role(5) {
                                    protected adaptors => array(0) 
                                    protected aliases => array(0) 
                                    protected fields => array(3) (
                                        "id" => object DB_ORM_Field_Integer(3) {
                                            ...
                                        }
                                        "name" => object DB_ORM_Field_String(3) {
                                            ...
                                        }
                                        "description" => object DB_ORM_Field_String(3) {
                                            ...
                                        }
                                    )
                                    protected metadata => array(2) (
                                        "loaded" => bool TRUE
                                        "saved" => NULL
                                    )
                                    protected relations => array(1) (
                                        "user_roles" => object DB_ORM_Relation_HasMany(3) {
                                            ...
                                        }
                                    )
                                }
                            }
                        )
                    }
                )
                protected position => integer 1
                protected size => integer 1
                protected type => string(20) "Model_Leap_User_Role"
            }
        }
        "user_token" => object DB_ORM_Relation_HasMany(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "type" => string(8) "has_many"
                "parent_model" => string(15) "Model_Leap_User"
                "parent_key" => array(1) (
                    0 => string(2) "id"
                )
                "child_model" => string(21) "Model_Leap_User_Token"
                "child_key" => array(1) (
                    0 => string(7) "user_id"
                )
                "options" => array(0) 
            )
            protected cache => NULL
        }
        "status" => object DB_ORM_Relation_BelongsTo(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(5) (
                "type" => string(10) "belongs_to"
                "parent_model" => string(22) "Model_Leap_user_status"
                "parent_key" => array(1) (
                    0 => string(2) "id"
                )
                "child_model" => string(15) "Model_Leap_User"
                "child_key" => array(1) (
                    0 => string(9) "id_status"
                )
            )
            protected cache => NULL
        }
    )
}
				
							
		
												$_COOKIE
		
			
								
					session
					string(32) "a724dbfc3620945f2ab34bb366437e94"
				
								
					crud_page_e3aa0e15dc69c64ff5bd114fa152475a
					string(1) "1"
				
								
					per_page_e3aa0e15dc69c64ff5bd114fa152475a
					string(3) "100"
				
								
					hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a
					string(0) ""
				
								
					hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a
					string(0) ""
				
								
					crud_page_18d9f6472ca1951f3a179d6cfc35f096
					string(1) "1"
				
								
					per_page_18d9f6472ca1951f3a179d6cfc35f096
					string(2) "50"
				
								
					hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096
					string(3) "asc"
				
								
					hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096
					string(9) "s84566833"
				
								
					crud_page_ab2af15b364b3c86d83b7aaf75ca61bc
					string(1) "2"
				
								
					per_page_ab2af15b364b3c86d83b7aaf75ca61bc
					string(2) "10"
				
								
					hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc
					string(3) "asc"
				
								
					hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc
					string(9) "sb61fae3a"
				
							
		
						$_SERVER
		
			
								
					REDIRECT_KOHANA_ENV
					string(11) "DEVELOPMENT"
				
								
					REDIRECT_STATUS
					string(3) "200"
				
								
					KOHANA_ENV
					string(11) "DEVELOPMENT"
				
								
					HTTP_HOST
					string(14) "gcb-smart:8090"
				
								
					HTTP_CONNECTION
					string(10) "keep-alive"
				
								
					HTTP_PRAGMA
					string(8) "no-cache"
				
								
					HTTP_CACHE_CONTROL
					string(8) "no-cache"
				
								
					HTTP_ACCEPT
					string(74) "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8"
				
								
					HTTP_USER_AGENT
					string(120) "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36"
				
								
					HTTP_REFERER
					string(27) "http://gcb-smart:8090/admin"
				
								
					HTTP_ACCEPT_ENCODING
					string(19) "gzip, deflate, sdch"
				
								
					HTTP_ACCEPT_LANGUAGE
					string(35) "fr-FR,fr;q=0.8,en-US;q=0.6,en;q=0.4"
				
								
					HTTP_COOKIE
					string(644) "session=a724dbfc3620945f2ab34bb366437e94; crud_page_e3aa0e15dc69c64ff5bd114fa152475a=1; per_page_e3aa0e15dc69c64ff5bd114fa152475&nbsp;&hellip;"
				
								
					PATH
					string(29) "/usr/bin:/bin:/usr/sbin:/sbin"
				
								
					SERVER_SIGNATURE
					string(0) ""
				
								
					SERVER_SOFTWARE
					string(6) "Apache"
				
								
					SERVER_NAME
					string(9) "gcb-smart"
				
								
					SERVER_ADDR
					string(3) "::1"
				
								
					SERVER_PORT
					string(4) "8090"
				
								
					REMOTE_ADDR
					string(3) "::1"
				
								
					DOCUMENT_ROOT
					string(40) "/Users/cesar/Documents/DEV/GIT/gcb-smart"
				
								
					SERVER_ADMIN
					string(15) "you@example.com"
				
								
					SCRIPT_FILENAME
					string(50) "/Users/cesar/Documents/DEV/GIT/gcb-smart/index.php"
				
								
					REMOTE_PORT
					string(5) "54515"
				
								
					REDIRECT_URL
					string(15) "/app/calendrier"
				
								
					GATEWAY_INTERFACE
					string(7) "CGI/1.1"
				
								
					SERVER_PROTOCOL
					string(8) "HTTP/1.1"
				
								
					REQUEST_METHOD
					string(3) "GET"
				
								
					QUERY_STRING
					string(0) ""
				
								
					REQUEST_URI
					string(15) "/app/calendrier"
				
								
					SCRIPT_NAME
					string(10) "/index.php"
				
								
					PATH_INFO
					string(15) "/app/calendrier"
				
								
					PATH_TRANSLATED
					string(45) "redirect:/index.php/app/calendrier/calendrier"
				
								
					PHP_SELF
					string(25) "/index.php/app/calendrier"
				
								
					REQUEST_TIME_FLOAT
					float 1430479771,15
				
								
					REQUEST_TIME
					integer 1430479771
				
								
					argv
					array(0) 
				
								
					argc
					integer 0
				
							
		
			

 could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 15:29:31 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename(Object(View))
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct(Object(View), NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory(Object(View))
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(31): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Main.php(40): Controller_Oscrudc->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(29): Controller_Golf_Main->before()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_App->before()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 15:33:02 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: page_title ~ APPPATH/views/inc/header.php [ 9 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:9
2015-05-01 15:33:02 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 9, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(25): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Core.php(668): Kohana_View->__toString()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(255): Kohana_Core::find_file('views', Object(View))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename(Object(View))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct(Object(View), NULL)
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory(Object(View))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(31): Kohana_Controller_Template->before()
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Main.php(40): Controller_Oscrudc->before()
#12 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(29): Controller_Golf_Main->before()
#13 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_App->before()
#14 [internal function]: Kohana_Controller->execute()
#15 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#16 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#19 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:9
2015-05-01 15:33:02 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: page_html_prop ~ APPPATH/views/inc/header.php [ 4 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:4
2015-05-01 15:33:02 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 4, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(25): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 [internal function]: Kohana_View->__toString()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/I18n.php(164): strtr('The requested v...', Array)
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Kohana/Exception.php(53): __('The requested v...', Array)
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(259): Kohana_Kohana_Exception->__construct('The requested v...', Array)
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename(Object(View))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct(Object(View), NULL)
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory(Object(View))
#12 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(31): Kohana_Controller_Template->before()
#13 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Main.php(40): Controller_Oscrudc->before()
#14 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(29): Controller_Golf_Main->before()
#15 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_App->before()
#16 [internal function]: Kohana_Controller->execute()
#17 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#18 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#19 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#20 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#21 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php:4
2015-05-01 15:33:02 --- EMERGENCY: View_Exception [ 0 ]: The requested view 
#kohana_error { background: #ddd; font-size: 1em; font-family:sans-serif; text-align: left; color: #111; }
#kohana_error h1,
#kohana_error h2 { margin: 0; padding: 1em; font-size: 1em; font-weight: normal; background: #911; color: #fff; }
	#kohana_error h1 a,
	#kohana_error h2 a { color: #fff; }
#kohana_error h2 { background: #222; }
#kohana_error h3 { margin: 0; padding: 0.4em 0 0; font-size: 1em; font-weight: normal; }
#kohana_error p { margin: 0; padding: 0.2em 0; }
#kohana_error a { color: #1b323b; }
#kohana_error pre { overflow: auto; white-space: pre-wrap; }
#kohana_error table { width: 100%; display: block; margin: 0 0 0.4em; padding: 0; border-collapse: collapse; background: #fff; }
	#kohana_error table td { border: solid 1px #ddd; text-align: left; vertical-align: top; padding: 0.4em; }
#kohana_error div.content { padding: 0.4em 1em 1em; overflow: hidden; }
#kohana_error pre.source { margin: 0 0 1em; padding: 0.4em; background: #fff; border: dotted 1px #b7c680; line-height: 1.2em; }
	#kohana_error pre.source span.line { display: block; }
	#kohana_error pre.source span.highlight { background: #f0eb96; }
		#kohana_error pre.source span.line span.number { color: #666; }
#kohana_error ol.trace { display: block; margin: 0 0 0 2em; padding: 0; list-style: decimal; }
	#kohana_error ol.trace li { margin: 0; padding: 0; }
.js .collapsed { display: none; }


document.documentElement.className = document.documentElement.className + ' js';
function koggle(elem)
{
	elem = document.getElementById(elem);

	if (elem.style && elem.style['display'])
		// Only works with the "style" attr
		var disp = elem.style['display'];
	else if (elem.currentStyle)
		// For MSIE, naturally
		var disp = elem.currentStyle['display'];
	else if (window.getComputedStyle)
		// For most other browsers
		var disp = document.defaultView.getComputedStyle(elem, null).getPropertyValue('display');

	// Toggle the state of the "display" style
	elem.style.display = disp == 'block' ? 'none' : 'block';
	return false;
}


	ErrorException [ Notice ]: Undefined variable: page_html_prop
	
		APPPATH/views/inc/header.php [ 4 ]
		1 &lt;!DOCTYPE html&gt;
2 &lt;html lang="en-us" &lt;?php echo implode(' ', array_map(function($prop, $value) {
3 			return $prop.'="'.$value.'"';
4 		}, array_keys($page_html_prop), $page_html_prop)) ;?&gt;&gt;
5 	&lt;head&gt;
6 		&lt;meta charset="utf-8"&gt;
7 		&lt;!--&lt;meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"&gt;--&gt;
8 
9 		&lt;title&gt; &lt;?php echo $page_title != "" ? $page_title." - " : ""; ?&gt;EasyGolfPack(c) &lt;/title&gt;
		
					
				
					
													APPPATH/views/inc/header.php [ 4 ]
											
					&raquo;
					Kohana_Core::error_handler(arguments)
				
								
					
											
							0
							integer 8
						
											
							1
							string(34) "Undefined variable: page_html_prop"
						
											
							2
							string(73) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php"
						
											
							3
							integer 4
						
											
							4
							array(3) (
    "kohana_view_filename" => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    "kohana_view_data" => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
    "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
)
						
										
				
													1 &lt;!DOCTYPE html&gt;
2 &lt;html lang="en-us" &lt;?php echo implode(' ', array_map(function($prop, $value) {
3 			return $prop.'="'.$value.'"';
4 		}, array_keys($page_html_prop), $page_html_prop)) ;?&gt;&gt;
5 	&lt;head&gt;
6 		&lt;meta charset="utf-8"&gt;
7 		&lt;!--&lt;meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"&gt;--&gt;
8 
9 		&lt;title&gt; &lt;?php echo $page_title != "" ? $page_title." - " : ""; ?&gt;EasyGolfPack(c) &lt;/title&gt;

							
								
				
					
													APPPATH/views/egp_template.php [ 25 ]
											
					&raquo;
					include(arguments)
				
								
					
											
							0
							string(73) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/inc/header.php"
						
										
				
													20 	//include header
21 	//you can add your custom css in $page_css array.
22 	//Note: all css files are inside css/ folder
23 	// $page_css[] = "your_style.css";
24 
25 	include(APPPATH."views/inc/header.php");
26 ?&gt;
27 
28 &lt;div id="divForJs"&gt;
29 	&lt;form id="dataForJs"&gt;
30 		&lt;?php foreach(Helpers_InputForJs::get() as $phpvar =&gt; $hiddenInput) { ?&gt;

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 61 ]
											
					&raquo;
					include(arguments)
				
								
					
											
							0
							string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
						
										
				
													56 		ob_start();
57 
58 		try
59 		{
60 			// Load the view within the current scope
61 			include $kohana_view_filename;
62 		}
63 		catch (Exception $e)
64 		{
65 			// Delete the output buffer
66 			ob_end_clean();

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 348 ]
											
					&raquo;
					Kohana_View::capture(arguments)
				
								
					
											
							0
							string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
						
											
							1
							array(1) (
    "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
)
						
										
				
													343 		{
344 			throw new View_Exception('You must set the file to use within your view before rendering');
345 		}
346 
347 		// Combine local and global data and capture the output
348 		return View::capture($this-&gt;_file, $this-&gt;_data);
349 	}
350 
351 }

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 228 ]
											
					&raquo;
					Kohana_View->render()
				
													223 	 */
224 	public function __toString()
225 	{
226 		try
227 		{
228 			return $this-&gt;render();
229 		}
230 		catch (Exception $e)
231 		{
232 			/**
233 			 * Display the exception message.

							
								
				
					
													{PHP internal call}
											
					&raquo;
					Kohana_View->__toString()
				
											
								
				
					
													SYSPATH/classes/Kohana/I18n.php [ 164 ]
											
					&raquo;
					strtr(arguments)
				
								
					
											
							str
							string(43) "The requested view :file could not be found"
						
											
							from
							array(1) (
    ":file" => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
)
						
										
				
													159 			// The message and target languages are different
160 			// Get the translation for this message
161 			$string = I18n::get($string);
162 		}
163 
164 		return empty($values) ? $string : strtr($string, $values);
165 	}
166 }

							
								
				
					
													SYSPATH/classes/Kohana/Kohana/Exception.php [ 53 ]
											
					&raquo;
					__(arguments)
				
								
					
											
							string
							string(43) "The requested view :file could not be found"
						
											
							values
							array(1) (
    ":file" => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
)
						
										
				
													48 	 * @return  void
49 	 */
50 	public function __construct($message = "", array $variables = NULL, $code = 0, Exception $previous = NULL)
51 	{
52 		// Set the message
53 		$message = __($message, $variables);
54 
55 		// Pass the message and integer code to the parent
56 		parent::__construct($message, (int) $code, $previous);
57 
58 		// Save the unmodified code

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 259 ]
											
					&raquo;
					Kohana_Kohana_Exception->__construct(arguments)
				
								
					
											
							0
							string(43) "The requested view :file could not be found"
						
											
							1
							array(1) (
    ":file" => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
)
						
										
				
													254 	{
255 		if (($path = Kohana::find_file('views', $file)) === FALSE)
256 		{
257 			throw new View_Exception('The requested view :file could not be found', array(
258 				':file' =&gt; $file,
259 			));
260 		}
261 
262 		// Store the file path locally
263 		$this-&gt;_file = $path;
264 

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 137 ]
											
					&raquo;
					Kohana_View->set_filename(arguments)
				
								
					
											
							0
							object View(2) {
    protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    protected _data => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
}
						
										
				
													132 	 */
133 	public function __construct($file = NULL, array $data = NULL)
134 	{
135 		if ($file !== NULL)
136 		{
137 			$this-&gt;set_filename($file);
138 		}
139 
140 		if ($data !== NULL)
141 		{
142 			// Add the values to the current data

							
								
				
					
													SYSPATH/classes/Kohana/View.php [ 30 ]
											
					&raquo;
					Kohana_View->__construct(arguments)
				
								
					
											
							0
							object View(2) {
    protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    protected _data => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
}
						
											
							1
							NULL
						
										
				
													25 	 * @param   array   $data   array of values
26 	 * @return  View
27 	 */
28 	public static function factory($file = NULL, array $data = NULL)
29 	{
30 		return new View($file, $data);
31 	}
32 
33 	/**
34 	 * Captures the output that is generated when a view is included.
35 	 * The view data will be extracted to make local variables. This method

							
								
				
					
													SYSPATH/classes/Kohana/Controller/Template.php [ 33 ]
											
					&raquo;
					Kohana_View::factory(arguments)
				
								
					
											
							0
							object View(2) {
    protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
    protected _data => array(1) (
        "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
    )
}
						
										
				
													28 		parent::before();
29 
30 		if ($this-&gt;auto_render === TRUE)
31 		{
32 			// Load the template
33 			$this-&gt;template = View::factory($this-&gt;template);
34 		}
35 	}
36 
37 	/**
38 	 * Assigns the template [View] as the request response.

							
								
				
					
													MODPATH/oscrud/classes/Controller/Oscrudc.php [ 31 ]
											
					&raquo;
					Kohana_Controller_Template->before()
				
													26 		// 	        $template = $this-&gt;template;
27 		// 	//echo 'site normal';
28 		// }
29         // This is important and for abstraction, since we're extending a class and its functions we need to make sure we still execute its before(); function
30         // This will load the view you need from /views/template.php or /views/template2.php depending on what your controller specifies into $this-&gt;template
31         parent::before();
32 
33         // $this-&gt;template-&gt;header = View::factory('admin/header');  // Loads default header file from our views folder /views/admin/header.php
34         // $this-&gt;template-&gt;content = View::factory('admin/content');  // Loads default index file from our views folder
35         // $this-&gt;template-&gt;footer = View::factory('admin/footer');  // Loads default footer file from our views folder
36 	

							
								
				
					
													APPPATH/classes/Controller/Golf/Main.php [ 40 ]
											
					&raquo;
					Controller_Oscrudc->before()
				
													35 		$this-&gt;ressources 		= DB_SQL::select("default")-&gt;from("ressources")
36 			-&gt;where("id_golf", "=", $this-&gt;golf-&gt;id)
37 				-&gt;query();
38 		
39 		//////////////////////////////////////////////////////////
40 		parent::before();
41 		//////////////////////////////////////////////////////////
42 
43 		Helpers_Stylesheet::add('/assets/css/easygolfpack/egp_main.css');
44 		
45 		$this-&gt;pages = array(

							
								
				
					
													APPPATH/classes/Controller/Golf/App.php [ 29 ]
											
					&raquo;
					Controller_Golf_Main->before()
				
													24 
25 
26 		//////////////////////////////////////////////////////////
27 		// Parent Creator call									//
28 		
29 		parent::before();	// execute before for parent Class
30 		
31 		//////////////////////////////////////////////////////////
32 
33 	}	// before
34 	

							
								
				
					
													SYSPATH/classes/Kohana/Controller.php [ 69 ]
											
					&raquo;
					Controller_Golf_App->before()
				
													64 	 * @return  Response
65 	 */
66 	public function execute()
67 	{
68 		// Execute the "before action" method
69 		$this-&gt;before();
70 
71 		// Determine the action to use
72 		$action = 'action_'.$this-&gt;request-&gt;action();
73 
74 		// If the action doesn't exist, it's a 404

							
								
				
					
													{PHP internal call}
											
					&raquo;
					Kohana_Controller->execute()
				
											
								
				
					
													SYSPATH/classes/Kohana/Request/Client/Internal.php [ 97 ]
											
					&raquo;
					ReflectionMethod->invoke(arguments)
				
								
					
											
							0
							object Controller_Golf_App(19) {
    public isLogged => bool TRUE
    public isAdmin => bool TRUE
    public user => object Model_Leap_User(5) {
        protected adaptors => array(2) (
            "last_login_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(2) (
                    "field" => string(10) "last_login"
                    "format" => string(11) "Y-m-d H:i:s"
                )
            }
            "new_password_requested_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(2) (
                    "field" => string(22) "new_password_requested"
                    "format" => string(11) "Y-m-d H:i:s"
                )
            }
        )
        protected aliases => array(0) 
        protected fields => array(23) (
            "id" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => integer 0
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool TRUE
                    "range" => array(2) (
                        "lower_bound" => integer 0
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 145
            }
            "email" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => string(0) ""
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 254
                )
                protected value => string(24) "contact@golf-bourbon.com"
            }
            "username" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => string(0) ""
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 32
                )
                protected value => string(0) ""
            }
            "password" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => string(0) ""
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 64
                )
                protected value => string(64) "db844ad71b412b511d56b11068ec006386a9932c15064f8301d4b03e2e5a6cbd"
            }
            "firstname" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 35
                )
                protected value => string(11) "Secretariat"
            }
            "lastname" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 50
                )
                protected value => string(12) "GOLF BOURBON"
            }
            "activated" => object DB_ORM_Field_Boolean(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(8) "checkbox"
                    "default" => bool TRUE
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "boolean"
                )
                protected value => bool TRUE
            }
            "banned" => object DB_ORM_Field_Boolean(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(8) "checkbox"
                    "default" => bool FALSE
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "boolean"
                )
                protected value => bool FALSE
            }
            "ban_reason" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 255
                )
                protected value => NULL
            }
            "new_password_key" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 64
                )
                protected value => NULL
            }
            "new_password_requested" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => NULL
            }
            "new_email" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 254
                )
                protected value => NULL
            }
            "new_email_key" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 64
                )
                protected value => NULL
            }
            "logins" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => integer 0
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 10
                    "unsigned" => bool TRUE
                    "range" => array(2) (
                        "lower_bound" => integer 0
                        "upper_bound" => integer 2147483647
                    )
                )
                protected value => integer 3116
            }
            "last_login" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 10
                    "unsigned" => bool TRUE
                    "range" => array(2) (
                        "lower_bound" => integer 0
                        "upper_bound" => integer 2147483647
                    )
                )
                protected value => integer 1430212803
            }
            "last_ip" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 39
                )
                protected value => string(3) "::1"
            }
            "indgolf" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 10
                )
                protected value => string(1) "0"
            }
            "adresse" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 200
                )
                protected value => NULL
            }
            "cp" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 10
                )
                protected value => NULL
            }
            "ville" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 100
                )
                protected value => NULL
            }
            "telephone" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 25
                )
                protected value => NULL
            }
            "id_pays" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => NULL
            }
            "id_status" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 1
            }
        )
        protected metadata => array(2) (
            "loaded" => bool TRUE
            "saved" => string(40) "e15cea14d351c743e5e34612ab730035adb20cc8"
        )
        protected relations => array(3) (
            "user_roles" => object DB_ORM_Relation_HasMany(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "type" => string(8) "has_many"
                    "parent_model" => string(15) "Model_Leap_User"
                    "parent_key" => array(1) (
                        0 => string(2) "id"
                    )
                    "child_model" => string(20) "Model_Leap_User_Role"
                    "child_key" => array(1) (
                        0 => string(7) "user_id"
                    )
                    "options" => array(0) 
                )
                protected cache => object DB_ResultSet(4) {
                    protected records => array(1) (
                        0 => object Model_Leap_User_Role(5) {
                            protected adaptors => array(0) 
                            protected aliases => array(0) 
                            protected fields => array(3) (
                                "user_id" => object DB_ORM_Field_Integer(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(9) (
                                        "control" => string(4) "auto"
                                        "default" => integer 0
                                        "modified" => bool TRUE
                                        "nullable" => bool FALSE
                                        "savable" => bool TRUE
                                        "type" => string(7) "integer"
                                        "max_length" => integer 10
                                        "unsigned" => bool TRUE
                                        "range" => array(2) (
                                            ...
                                        )
                                    )
                                    protected value => integer 145
                                }
                                "role_id" => object DB_ORM_Field_Integer(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(9) (
                                        "control" => string(4) "auto"
                                        "default" => integer 0
                                        "modified" => bool TRUE
                                        "nullable" => bool FALSE
                                        "savable" => bool TRUE
                                        "type" => string(7) "integer"
                                        "max_length" => integer 10
                                        "unsigned" => bool TRUE
                                        "range" => array(2) (
                                            ...
                                        )
                                    )
                                    protected value => integer 14
                                }
                                "id" => object DB_ORM_Field_Integer(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(9) (
                                        "control" => string(4) "auto"
                                        "default" => integer 0
                                        "modified" => bool TRUE
                                        "nullable" => bool FALSE
                                        "savable" => bool TRUE
                                        "type" => string(7) "integer"
                                        "max_length" => integer 11
                                        "unsigned" => bool FALSE
                                        "range" => array(2) (
                                            ...
                                        )
                                    )
                                    protected value => integer 11
                                }
                            )
                            protected metadata => array(2) (
                                "loaded" => bool TRUE
                                "saved" => NULL
                            )
                            protected relations => array(2) (
                                "user" => object DB_ORM_Relation_BelongsTo(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(5) (
                                        "type" => string(10) "belongs_to"
                                        "parent_model" => string(15) "Model_Leap_User"
                                        "parent_key" => array(1) (
                                            ...
                                        )
                                        "child_model" => string(20) "Model_Leap_User_Role"
                                        "child_key" => array(1) (
                                            ...
                                        )
                                    )
                                    protected cache => NULL
                                }
                                "role" => object DB_ORM_Relation_BelongsTo(3) {
                                    protected model => object Model_Leap_User_Role(5) {
                                        *RECURSION*
                                    }
                                    protected metadata => array(5) (
                                        "type" => string(10) "belongs_to"
                                        "parent_model" => string(15) "Model_Leap_Role"
                                        "parent_key" => array(1) (
                                            ...
                                        )
                                        "child_model" => string(20) "Model_Leap_User_Role"
                                        "child_key" => array(1) (
                                            ...
                                        )
                                    )
                                    protected cache => object Model_Leap_Role(5) {
                                        protected adaptors => array(0) 
                                        protected aliases => array(0) 
                                        protected fields => array(3) (
                                            ...
                                        )
                                        protected metadata => array(2) (
                                            ...
                                        )
                                        protected relations => array(1) (
                                            ...
                                        )
                                    }
                                }
                            )
                        }
                    )
                    protected position => integer 1
                    protected size => integer 1
                    protected type => string(20) "Model_Leap_User_Role"
                }
            }
            "user_token" => object DB_ORM_Relation_HasMany(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "type" => string(8) "has_many"
                    "parent_model" => string(15) "Model_Leap_User"
                    "parent_key" => array(1) (
                        0 => string(2) "id"
                    )
                    "child_model" => string(21) "Model_Leap_User_Token"
                    "child_key" => array(1) (
                        0 => string(7) "user_id"
                    )
                    "options" => array(0) 
                )
                protected cache => NULL
            }
            "status" => object DB_ORM_Relation_BelongsTo(3) {
                protected model => object Model_Leap_User(5) {
                    *RECURSION*
                }
                protected metadata => array(5) (
                    "type" => string(10) "belongs_to"
                    "parent_model" => string(22) "Model_Leap_user_status"
                    "parent_key" => array(1) (
                        0 => string(2) "id"
                    )
                    "child_model" => string(15) "Model_Leap_User"
                    "child_key" => array(1) (
                        0 => string(9) "id_status"
                    )
                )
                protected cache => NULL
            }
        )
    }
    public golf => object Model_Leap_Golf(5) {
        protected adaptors => array(0) 
        protected aliases => array(0) 
        protected fields => array(13) (
            "id" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => integer 0
                    "modified" => bool TRUE
                    "nullable" => bool FALSE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 1
            }
            "nom" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(20) "Golf Club de Bourbon"
            }
            "adresse" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => NULL
            }
            "cp" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(5) "97419"
            }
            "ville" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(21) "Etang-Salé les bains"
            }
            "pays" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(8) "Réunion"
            }
            "intervalle" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 20
            }
            "heure_ouverture" => object DB_ORM_Field_DateTime(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                )
                protected value => string(19) "1970-01-01 06:00:00"
            }
            "heure_fermeture" => object DB_ORM_Field_DateTime(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(6) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                )
                protected value => string(19) "1970-01-01 18:30:00"
            }
            "smtp_host" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 255
                )
                protected value => string(14) "smtp.gmail.com"
            }
            "smtp_port" => object DB_ORM_Field_Integer(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(9) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(7) "integer"
                    "max_length" => integer 11
                    "unsigned" => bool FALSE
                    "range" => array(2) (
                        "lower_bound" => float -9,22337203685E+18
                        "upper_bound" => integer 9223372036854775807
                    )
                )
                protected value => integer 465
            }
            "smtp_username" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(25) "easygolfpack@cbleuapp.com"
            }
            "smtp_password" => object DB_ORM_Field_String(3) {
                protected model => object Model_Leap_Golf(5) {
                    *RECURSION*
                }
                protected metadata => array(7) (
                    "control" => string(4) "auto"
                    "default" => NULL
                    "modified" => bool TRUE
                    "nullable" => bool TRUE
                    "savable" => bool TRUE
                    "type" => string(6) "string"
                    "max_length" => integer 45
                )
                protected value => string(15) "easygolfpack974"
            }
        )
        protected metadata => array(2) (
            "loaded" => bool TRUE
            "saved" => string(40) "931a65dcd1736fea7e86a2ec092683f82f39cb01"
        )
        protected relations => array(0) 
    }
    public golf_rules => object DB_ResultSet(4) {
        protected records => array(7) (
            0 => array(3) (
                "rule" => string(31) "fenetre_reservation_heures_supp"
                "value" => string(1) "3"
                "description" => string(93) "Nombre d'heures avant minuit pour prendre les rservations pour les jours suivants (en heures)"
            )
            1 => array(3) (
                "rule" => string(25) "fenetre_reservation_jours"
                "value" => string(1) "4"
                "description" => string(64) "Nombres de jours  venir pour prendre les rservations (en jours) "
            )
            2 => array(3) (
                "rule" => string(11) "max_players"
                "value" => string(1) "4"
                "description" => string(36) "Nombre maximum de joueurs par partie"
            )
            3 => array(3) (
                "rule" => string(11) "nb_parcours"
                "value" => string(1) "2"
                "description" => string(61) "Nombre de parcours (de 9 trous) pouvant constituer une partie"
            )
            4 => array(3) (
                "rule" => string(21) "resa_provisoire_admin"
                "value" => string(4) "3600"
                "description" => string(141) "Dure de blocage de la rservation provisoire lors de l'ouvertue du formulaire de rservation (ou wizard) pour les administrateurs &nbsp;&hellip;"
            )
            5 => array(3) (
                "rule" => string(22) "resa_provisoire_membre"
                "value" => string(3) "120"
                "description" => string(133) "Dure de blocage de la rservation provisoire lors de l'ouvertue du formulaire de rservation (ou wizard) pour les membres (en seco&nbsp;&hellip;"
            )
            6 => array(3) (
                "rule" => string(24) "resa_provisoire_visiteur"
                "value" => string(3) "300"
                "description" => string(122) "Dure de blocage de la rservation provisoire lors de l'utilisation du wizard de rservation pour les visiteurs (en secondes)"
            )
        )
        protected position => integer 0
        protected size => integer 7
        protected type => string(5) "array"
    }
    public ressources => object DB_ResultSet(4) {
        protected records => array(1) (
            0 => array(5) (
                "id" => string(1) "2"
                "ressource" => string(7) "Chariot"
                "qte_max_par_partie" => string(1) "4"
                "qte_stock" => string(2) "50"
                "id_golf" => string(1) "1"
            )
        )
        protected position => integer 0
        protected size => integer 1
        protected type => string(5) "array"
    }
    public parcours => object DB_ResultSet(4) {
        protected records => array(4) (
            0 => array(6) (
                "id" => string(1) "1"
                "nom_parcours" => string(21) "9 trous depart trou 1"
                "nb_trous_total" => string(1) "9"
                "trou_depart" => string(1) "1"
                "parcour_aller" => string(1) "1"
                "parcour_retour" => NULL
            )
            1 => array(6) (
                "id" => string(1) "2"
                "nom_parcours" => string(22) "9 trous depart trou 10"
                "nb_trous_total" => string(1) "9"
                "trou_depart" => string(2) "10"
                "parcour_aller" => string(1) "2"
                "parcour_retour" => NULL
            )
            2 => array(6) (
                "id" => string(1) "3"
                "nom_parcours" => string(22) "18 trous depart trou 1"
                "nb_trous_total" => string(2) "18"
                "trou_depart" => string(1) "1"
                "parcour_aller" => string(1) "1"
                "parcour_retour" => string(1) "2"
            )
            3 => array(6) (
                "id" => string(1) "4"
                "nom_parcours" => string(23) "18 trous depart trou 10"
                "nb_trous_total" => string(2) "18"
                "trou_depart" => string(2) "10"
                "parcour_aller" => string(1) "2"
                "parcour_retour" => string(1) "1"
            )
        )
        protected position => integer 0
        protected size => integer 4
        protected type => string(5) "array"
    }
    public type_parcours => object DB_ResultSet(4) {
        protected records => array(4) (
            0 => array(5) (
                "id" => string(1) "1"
                "trou_depart" => string(1) "1"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7200"
                "description" => string(22) "[1  -&gt;  9] trac normal"
            )
            1 => array(5) (
                "id" => string(1) "2"
                "trou_depart" => string(2) "10"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7800"
                "description" => string(20) "[10-&gt;18] trac normal"
            )
            2 => array(5) (
                "id" => string(1) "3"
                "trou_depart" => string(1) "1"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7800"
                "description" => string(21) "[1  -&gt;  9] trac InOut"
            )
            3 => array(5) (
                "id" => string(1) "4"
                "trou_depart" => string(2) "10"
                "nb_trous" => string(1) "9"
                "duree" => string(4) "7200"
                "description" => string(19) "[10-&gt;18] trac InOut"
            )
        )
        protected position => integer 0
        protected size => integer 4
        protected type => string(5) "array"
    }
    public pages => NULL
    public pageTitle => NULL
    public pageCSS => NULL
    public pageJS => NULL
    public pageBreadcrumbs => NULL
    protected _table_model => string(0) ""
    public template => object View(2) {
        protected _file => string(75) "/Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php"
        protected _data => array(1) (
            "konotif" => string(59) "
&lt;!-- row --&gt;
&lt;div class="row"&gt;

	
&lt;/div&gt;
&lt;!-- end row --&gt;
"
        )
    }
    protected _route_name => string(7) "oscrudc"
    public auto_render => bool TRUE
    public request => object Request(19) {
        protected _requested_with => NULL
        protected _method => string(3) "GET"
        protected _protocol => string(8) "HTTP/1.1"
        protected _secure => bool FALSE
        protected _referrer => string(27) "http://gcb-smart:8090/admin"
        protected _route => object Route(5) {
            protected _filters => array(0) 
            protected _uri => string(32) "(&lt;controller&gt;(/&lt;action&gt;(/&lt;id&gt;)))"
            protected _regex => array(0) 
            protected _defaults => array(3) (
                "directory" => string(4) "golf"
                "controller" => string(3) "app"
                "action" => string(5) "index"
            )
            protected _route_regex => string(95) "#^(?:(?P&lt;controller&gt;[^/.,;?\n]++)(?:/(?P&lt;action&gt;[^/.,;?\n]++)(?:/(?P&lt;id&gt;[^/.,;?\n]++))?)?)?$#uD"
        }
        protected _routes => array(0) 
        protected _header => object HTTP_Header(0) {
        }
        protected _body => NULL
        protected _directory => string(4) "Golf"
        protected _controller => string(3) "App"
        protected _action => string(5) "index"
        protected _uri => string(0) ""
        protected _external => bool FALSE
        protected _params => array(0) 
        protected _get => array(0) 
        protected _post => array(0) 
        protected _cookies => array(13) (
            "session" => NULL
            "crud_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "per_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
            "crud_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
            "per_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
            "hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096" => NULL
            "hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096" => NULL
            "crud_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
            "per_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
            "hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
            "hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        )
        protected _client => object Request_Client_Internal(9) {
            protected _previous_environment => NULL
            protected _cache => NULL
            protected _follow => bool FALSE
            protected _follow_headers => array(1) (
                0 => string(13) "Authorization"
            )
            protected _strict_redirect => bool TRUE
            protected _header_callbacks => array(1) (
                "Location" => string(34) "Request_Client::on_header_location"
            )
            protected _max_callback_depth => integer 5
            protected _callback_depth => integer 1
            protected _callback_params => array(0) 
        }
    }
    public response => object Response(5) {
        protected _status => integer 200
        protected _header => object HTTP_Header(0) {
        }
        protected _body => string(0) ""
        protected _cookies => array(0) 
        protected _protocol => string(8) "HTTP/1.1"
    }
}
						
										
				
													 92 
 93 			// Create a new instance of the controller
 94 			$controller = $class-&gt;newInstance($request, $response);
 95 
 96 			// Run the controller's execute() method
 97 			$response = $class-&gt;getMethod('execute')-&gt;invoke($controller);
 98 
 99 			if ( ! $response instanceof Response)
100 			{
101 				// Controller failed to return a Response.
102 				throw new Kohana_Exception('Controller failed to return a Response');

							
								
				
					
													SYSPATH/classes/Kohana/Request/Client.php [ 114 ]
											
					&raquo;
					Kohana_Request_Client_Internal->execute_request(arguments)
				
								
					
											
							0
							object Request(19) {
    protected _requested_with => NULL
    protected _method => string(3) "GET"
    protected _protocol => string(8) "HTTP/1.1"
    protected _secure => bool FALSE
    protected _referrer => string(27) "http://gcb-smart:8090/admin"
    protected _route => object Route(5) {
        protected _filters => array(0) 
        protected _uri => string(32) "(&lt;controller&gt;(/&lt;action&gt;(/&lt;id&gt;)))"
        protected _regex => array(0) 
        protected _defaults => array(3) (
            "directory" => string(4) "golf"
            "controller" => string(3) "app"
            "action" => string(5) "index"
        )
        protected _route_regex => string(95) "#^(?:(?P&lt;controller&gt;[^/.,;?\n]++)(?:/(?P&lt;action&gt;[^/.,;?\n]++)(?:/(?P&lt;id&gt;[^/.,;?\n]++))?)?)?$#uD"
    }
    protected _routes => array(0) 
    protected _header => object HTTP_Header(0) {
    }
    protected _body => NULL
    protected _directory => string(4) "Golf"
    protected _controller => string(3) "App"
    protected _action => string(5) "index"
    protected _uri => string(0) ""
    protected _external => bool FALSE
    protected _params => array(0) 
    protected _get => array(0) 
    protected _post => array(0) 
    protected _cookies => array(13) (
        "session" => NULL
        "crud_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "per_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "crud_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "per_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "crud_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "per_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
    )
    protected _client => object Request_Client_Internal(9) {
        protected _previous_environment => NULL
        protected _cache => NULL
        protected _follow => bool FALSE
        protected _follow_headers => array(1) (
            0 => string(13) "Authorization"
        )
        protected _strict_redirect => bool TRUE
        protected _header_callbacks => array(1) (
            "Location" => string(34) "Request_Client::on_header_location"
        )
        protected _max_callback_depth => integer 5
        protected _callback_depth => integer 1
        protected _callback_params => array(0) 
    }
}
						
											
							1
							object Response(5) {
    protected _status => integer 200
    protected _header => object HTTP_Header(0) {
    }
    protected _body => string(0) ""
    protected _cookies => array(0) 
    protected _protocol => string(8) "HTTP/1.1"
}
						
										
				
													109 		$orig_response = $response = Response::factory(array('_protocol' =&gt; $request-&gt;protocol()));
110 
111 		if (($cache = $this-&gt;cache()) instanceof HTTP_Cache)
112 			return $cache-&gt;execute($this, $request, $response);
113 
114 		$response = $this-&gt;execute_request($request, $response);
115 
116 		// Execute response callbacks
117 		foreach ($this-&gt;header_callbacks() as $header =&gt; $callback)
118 		{
119 			if ($response-&gt;headers($header))

							
								
				
					
													SYSPATH/classes/Kohana/Request.php [ 986 ]
											
					&raquo;
					Kohana_Request_Client->execute(arguments)
				
								
					
											
							0
							object Request(19) {
    protected _requested_with => NULL
    protected _method => string(3) "GET"
    protected _protocol => string(8) "HTTP/1.1"
    protected _secure => bool FALSE
    protected _referrer => string(27) "http://gcb-smart:8090/admin"
    protected _route => object Route(5) {
        protected _filters => array(0) 
        protected _uri => string(32) "(&lt;controller&gt;(/&lt;action&gt;(/&lt;id&gt;)))"
        protected _regex => array(0) 
        protected _defaults => array(3) (
            "directory" => string(4) "golf"
            "controller" => string(3) "app"
            "action" => string(5) "index"
        )
        protected _route_regex => string(95) "#^(?:(?P&lt;controller&gt;[^/.,;?\n]++)(?:/(?P&lt;action&gt;[^/.,;?\n]++)(?:/(?P&lt;id&gt;[^/.,;?\n]++))?)?)?$#uD"
    }
    protected _routes => array(0) 
    protected _header => object HTTP_Header(0) {
    }
    protected _body => NULL
    protected _directory => string(4) "Golf"
    protected _controller => string(3) "App"
    protected _action => string(5) "index"
    protected _uri => string(0) ""
    protected _external => bool FALSE
    protected _params => array(0) 
    protected _get => array(0) 
    protected _post => array(0) 
    protected _cookies => array(13) (
        "session" => NULL
        "crud_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "per_page_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a" => NULL
        "crud_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "per_page_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096" => NULL
        "crud_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "per_page_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
        "hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc" => NULL
    )
    protected _client => object Request_Client_Internal(9) {
        protected _previous_environment => NULL
        protected _cache => NULL
        protected _follow => bool FALSE
        protected _follow_headers => array(1) (
            0 => string(13) "Authorization"
        )
        protected _strict_redirect => bool TRUE
        protected _header_callbacks => array(1) (
            "Location" => string(34) "Request_Client::on_header_location"
        )
        protected _max_callback_depth => integer 5
        protected _callback_depth => integer 1
        protected _callback_params => array(0) 
    }
}
						
										
				
													981 			throw new Request_Exception('Unable to execute :uri without a Kohana_Request_Client', array(
982 				':uri' =&gt; $this-&gt;_uri,
983 			));
984 		}
985 
986 		return $this-&gt;_client-&gt;execute($this);
987 	}
988 
989 	/**
990 	 * Returns whether this request is the initial request Kohana received.
991 	 * Can be used to test for sub requests.

							
								
				
					
													DOCROOT/index.php [ 118 ]
											
					&raquo;
					Kohana_Request->execute()
				
													113 	/**
114 	 * Execute the main request. A source of the URI can be passed, eg: $_SERVER['PATH_INFO'].
115 	 * If no source is specified, the URI will be automatically detected.
116 	 */
117 	echo Request::factory(TRUE, array(), FALSE)
118 		-&gt;execute()
119 		-&gt;send_headers(TRUE)
120 		-&gt;body();
121 }

							
							
	
	Environment
	
				Included files (177)
		
			
								
					DOCROOT/index.php
				
								
					APPPATH/bootstrap.php
				
								
					SYSPATH/classes/Kohana/Core.php
				
								
					SYSPATH/classes/Kohana.php
				
								
					SYSPATH/classes/I18n.php
				
								
					SYSPATH/classes/Kohana/I18n.php
				
								
					SYSPATH/classes/HTTP.php
				
								
					SYSPATH/classes/Kohana/HTTP.php
				
								
					SYSPATH/classes/Kohana/Exception.php
				
								
					SYSPATH/classes/Kohana/Kohana/Exception.php
				
								
					SYSPATH/classes/Log.php
				
								
					SYSPATH/classes/Kohana/Log.php
				
								
					SYSPATH/classes/Config.php
				
								
					SYSPATH/classes/Kohana/Config.php
				
								
					SYSPATH/classes/Log/File.php
				
								
					SYSPATH/classes/Kohana/Log/File.php
				
								
					SYSPATH/classes/Log/Writer.php
				
								
					SYSPATH/classes/Kohana/Log/Writer.php
				
								
					SYSPATH/classes/Config/File.php
				
								
					SYSPATH/classes/Kohana/Config/File.php
				
								
					SYSPATH/classes/Kohana/Config/File/Reader.php
				
								
					SYSPATH/classes/Kohana/Config/Reader.php
				
								
					SYSPATH/classes/Kohana/Config/Source.php
				
								
					SYSPATH/classes/Cookie.php
				
								
					SYSPATH/classes/Kohana/Cookie.php
				
								
					SYSPATH/classes/Route.php
				
								
					SYSPATH/classes/Kohana/Route.php
				
								
					SYSPATH/classes/Request.php
				
								
					SYSPATH/classes/Kohana/Request.php
				
								
					SYSPATH/classes/HTTP/Request.php
				
								
					SYSPATH/classes/Kohana/HTTP/Request.php
				
								
					SYSPATH/classes/HTTP/Message.php
				
								
					SYSPATH/classes/Kohana/HTTP/Message.php
				
								
					SYSPATH/classes/HTTP/Header.php
				
								
					SYSPATH/classes/Kohana/HTTP/Header.php
				
								
					SYSPATH/classes/Request/Client/Internal.php
				
								
					SYSPATH/classes/Kohana/Request/Client/Internal.php
				
								
					SYSPATH/classes/Request/Client.php
				
								
					SYSPATH/classes/Kohana/Request/Client.php
				
								
					SYSPATH/classes/Arr.php
				
								
					SYSPATH/classes/Kohana/Arr.php
				
								
					SYSPATH/classes/Response.php
				
								
					SYSPATH/classes/Kohana/Response.php
				
								
					SYSPATH/classes/HTTP/Response.php
				
								
					SYSPATH/classes/Kohana/HTTP/Response.php
				
								
					SYSPATH/classes/Profiler.php
				
								
					SYSPATH/classes/Kohana/Profiler.php
				
								
					APPPATH/classes/Controller/Golf/App.php
				
								
					APPPATH/classes/Controller/Golf/Main.php
				
								
					MODPATH/oscrud/classes/Controller/Oscrudc.php
				
								
					SYSPATH/classes/Controller/Template.php
				
								
					SYSPATH/classes/Kohana/Controller/Template.php
				
								
					SYSPATH/classes/Controller.php
				
								
					SYSPATH/classes/Kohana/Controller.php
				
								
					SYSPATH/classes/View.php
				
								
					SYSPATH/classes/Kohana/View.php
				
								
					MODPATH/notify/classes/Notify.php
				
								
					MODPATH/notify/classes/Notify/Core.php
				
								
					MODPATH/notify/config/notify.php
				
								
					SYSPATH/classes/Config/Group.php
				
								
					SYSPATH/classes/Kohana/Config/Group.php
				
								
					SYSPATH/classes/Session.php
				
								
					SYSPATH/classes/Kohana/Session.php
				
								
					SYSPATH/config/session.php
				
								
					MODPATH/leap/config/session.php
				
								
					MODPATH/database/config/session.php
				
								
					SYSPATH/classes/Session/Native.php
				
								
					SYSPATH/classes/Kohana/Session/Native.php
				
								
					MODPATH/leap/classes/Model/Leap/User.php
				
								
					MODPATH/leap/classes/Base/Model/Leap/User.php
				
								
					MODPATH/leap/classes/DB/ORM/Model.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Model.php
				
								
					MODPATH/leap/classes/Core/Object.php
				
								
					MODPATH/leap/classes/Base/Core/Object.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Adaptor/DateTime.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Adaptor/DateTime.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Adaptor.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Adaptor.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Integer.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Integer.php
				
								
					MODPATH/leap/classes/DB/ORM/Field.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/String.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/String.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/Boolean.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/Boolean.php
				
								
					MODPATH/leap/classes/DB/ORM/Relation/HasMany.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Relation/HasMany.php
				
								
					MODPATH/leap/classes/DB/ORM/Relation.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Relation.php
				
								
					MODPATH/leap/classes/DB/ResultSet.php
				
								
					MODPATH/leap/classes/Base/DB/ResultSet.php
				
								
					MODPATH/leap/classes/Model/Leap/User/Role.php
				
								
					MODPATH/leap/classes/Base/Model/Leap/User/Role.php
				
								
					MODPATH/leap/classes/DB/ORM/Relation/BelongsTo.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Relation/BelongsTo.php
				
								
					MODPATH/leap/classes/Model/Leap/Role.php
				
								
					MODPATH/leap/classes/Base/Model/Leap/Role.php
				
								
					MODPATH/notify/views/notify/bootstrap.php
				
								
					MODPATH/auth/classes/Auth.php
				
								
					MODPATH/auth/classes/Kohana/Auth.php
				
								
					MODPATH/leap/config/auth.php
				
								
					MODPATH/auth/config/auth.php
				
								
					APPPATH/config/auth.php
				
								
					MODPATH/leap/classes/Auth/Leap.php
				
								
					MODPATH/leap/classes/Base/Auth/Leap.php
				
								
					MODPATH/leap/classes/DB/ORM.php
				
								
					MODPATH/leap/classes/Base/DB/ORM.php
				
								
					MODPATH/leap/classes/DB/ORM/Select/Proxy.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Select/Proxy.php
				
								
					MODPATH/leap/classes/DB/SQL/Statement.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Statement.php
				
								
					MODPATH/leap/classes/DB/DataSource.php
				
								
					MODPATH/leap/classes/Base/DB/DataSource.php
				
								
					MODPATH/leap/config/database.php
				
								
					MODPATH/database/config/database.php
				
								
					APPPATH/config/database.php
				
								
					MODPATH/leap/classes/DB/MySQL/Select/Builder.php
				
								
					MODPATH/leap/classes/Base/DB/MySQL/Select/Builder.php
				
								
					MODPATH/leap/classes/DB/SQL/Select/Builder.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Select/Builder.php
				
								
					MODPATH/leap/classes/DB/SQL/Builder.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Builder.php
				
								
					MODPATH/leap/classes/DB/MySQL/Expression.php
				
								
					MODPATH/leap/classes/Base/DB/MySQL/Expression.php
				
								
					MODPATH/leap/classes/DB/SQL/Expression/Interface.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Expression/Interface.php
				
								
					MODPATH/database/classes/Database/Expression.php
				
								
					MODPATH/database/classes/Kohana/Database/Expression.php
				
								
					MODPATH/leap/classes/DB/SQL/Operator.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Operator.php
				
								
					MODPATH/leap/classes/DB/Connection/Pool.php
				
								
					MODPATH/leap/classes/Base/DB/Connection/Pool.php
				
								
					MODPATH/leap/classes/DB/Connection.php
				
								
					MODPATH/leap/classes/Base/DB/Connection.php
				
								
					MODPATH/leap/classes/DB/MySQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/Base/DB/MySQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/DB/SQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Connection/Standard.php
				
								
					MODPATH/leap/classes/DB/SQL/Connector.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Connector.php
				
								
					APPPATH/classes/Model/Leap/Golf.php
				
								
					MODPATH/leap/classes/DB/ORM/Field/DateTime.php
				
								
					MODPATH/leap/classes/Base/DB/ORM/Field/DateTime.php
				
								
					MODPATH/leap/classes/DB/SQL.php
				
								
					MODPATH/leap/classes/Base/DB/SQL.php
				
								
					MODPATH/leap/classes/DB/SQL/Select/Proxy.php
				
								
					MODPATH/leap/classes/Base/DB/SQL/Select/Proxy.php
				
								
					APPPATH/views/egp_template.php
				
								
					APPPATH/views/inc/init.php
				
								
					APPPATH/views/lib/config.php
				
								
					APPPATH/views/lib/func.global.php
				
								
					APPPATH/views/lib/smartui/class.smartutil.php
				
								
					APPPATH/views/lib/smartui/class.smartui.php
				
								
					APPPATH/views/lib/smartui/class.smartui-widget.php
				
								
					APPPATH/views/lib/smartui/class.smartui-datatable.php
				
								
					APPPATH/views/lib/smartui/class.smartui-button.php
				
								
					APPPATH/views/lib/smartui/class.smartui-tab.php
				
								
					APPPATH/views/lib/smartui/class.smartui-accordion.php
				
								
					APPPATH/views/lib/smartui/class.smartui-carousel.php
				
								
					APPPATH/views/lib/smartui/class.smartui-smartform.php
				
								
					APPPATH/views/lib/smartui/class.smartui-nav.php
				
								
					APPPATH/views/lib/class.html-indent.php
				
								
					APPPATH/views/lib/class.parsedown.php
				
								
					APPPATH/views/inc/config.ui.php
				
								
					APPPATH/views/inc/header.php
				
								
					SYSPATH/classes/Debug.php
				
								
					SYSPATH/classes/Kohana/Debug.php
				
								
					SYSPATH/classes/Date.php
				
								
					SYSPATH/classes/Kohana/Date.php
				
								
					SYSPATH/views/kohana/error.php
				
								
					SYSPATH/i18n/fr.php
				
								
					APPPATH/i18n/fr.php
				
								
					SYSPATH/classes/UTF8.php
				
								
					SYSPATH/classes/Kohana/UTF8.php
				
								
					SYSPATH/classes/View/Exception.php
				
								
					SYSPATH/classes/Kohana/View/Exception.php
				
							
		
				Loaded extensions (54)
		
			
								
					Core
				
								
					date
				
								
					ereg
				
								
					libxml
				
								
					openssl
				
								
					pcre
				
								
					sqlite3
				
								
					zlib
				
								
					bcmath
				
								
					bz2
				
								
					calendar
				
								
					ctype
				
								
					curl
				
								
					dom
				
								
					hash
				
								
					fileinfo
				
								
					filter
				
								
					ftp
				
								
					gd
				
								
					SPL
				
								
					iconv
				
								
					intl
				
								
					json
				
								
					ldap
				
								
					mbstring
				
								
					mysql
				
								
					mysqli
				
								
					session
				
								
					PDO
				
								
					pdo_sqlite
				
								
					standard
				
								
					posix
				
								
					Reflection
				
								
					Phar
				
								
					SimpleXML
				
								
					soap
				
								
					sockets
				
								
					exif
				
								
					tokenizer
				
								
					wddx
				
								
					xml
				
								
					xmlreader
				
								
					xmlwriter
				
								
					xsl
				
								
					zip
				
								
					apache2handler
				
								
					imap
				
								
					gettext
				
								
					mcrypt
				
								
					yaz
				
								
					pgsql
				
								
					pdo_pgsql
				
								
					pdo_mysql
				
								
					xdebug
				
							
		
						$_SESSION
		
			
								
					last_active
					integer 1430479976
				
								
					user
					object Model_Leap_User(5) {
    protected adaptors => array(2) (
        "last_login_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(2) (
                "field" => string(10) "last_login"
                "format" => string(11) "Y-m-d H:i:s"
            )
        }
        "new_password_requested_formatted" => object DB_ORM_Field_Adaptor_DateTime(2) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(2) (
                "field" => string(22) "new_password_requested"
                "format" => string(11) "Y-m-d H:i:s"
            )
        }
    )
    protected aliases => array(0) 
    protected fields => array(23) (
        "id" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => integer 0
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool TRUE
                "range" => array(2) (
                    "lower_bound" => integer 0
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => integer 145
        }
        "email" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => string(0) ""
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 254
            )
            protected value => string(24) "contact@golf-bourbon.com"
        }
        "username" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => string(0) ""
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 32
            )
            protected value => string(0) ""
        }
        "password" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => string(0) ""
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 64
            )
            protected value => string(64) "db844ad71b412b511d56b11068ec006386a9932c15064f8301d4b03e2e5a6cbd"
        }
        "firstname" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 35
            )
            protected value => string(11) "Secretariat"
        }
        "lastname" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 50
            )
            protected value => string(12) "GOLF BOURBON"
        }
        "activated" => object DB_ORM_Field_Boolean(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "control" => string(8) "checkbox"
                "default" => bool TRUE
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "boolean"
            )
            protected value => bool TRUE
        }
        "banned" => object DB_ORM_Field_Boolean(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "control" => string(8) "checkbox"
                "default" => bool FALSE
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "boolean"
            )
            protected value => bool FALSE
        }
        "ban_reason" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 255
            )
            protected value => NULL
        }
        "new_password_key" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 64
            )
            protected value => NULL
        }
        "new_password_requested" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool FALSE
                "range" => array(2) (
                    "lower_bound" => float -9,22337203685E+18
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => NULL
        }
        "new_email" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 254
            )
            protected value => NULL
        }
        "new_email_key" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 64
            )
            protected value => NULL
        }
        "logins" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => integer 0
                "modified" => bool TRUE
                "nullable" => bool FALSE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 10
                "unsigned" => bool TRUE
                "range" => array(2) (
                    "lower_bound" => integer 0
                    "upper_bound" => integer 2147483647
                )
            )
            protected value => integer 3116
        }
        "last_login" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 10
                "unsigned" => bool TRUE
                "range" => array(2) (
                    "lower_bound" => integer 0
                    "upper_bound" => integer 2147483647
                )
            )
            protected value => integer 1430212803
        }
        "last_ip" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 39
            )
            protected value => string(3) "::1"
        }
        "indgolf" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 10
            )
            protected value => string(1) "0"
        }
        "adresse" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 200
            )
            protected value => NULL
        }
        "cp" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 10
            )
            protected value => NULL
        }
        "ville" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 100
            )
            protected value => NULL
        }
        "telephone" => object DB_ORM_Field_String(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(7) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(6) "string"
                "max_length" => integer 25
            )
            protected value => NULL
        }
        "id_pays" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool FALSE
                "range" => array(2) (
                    "lower_bound" => float -9,22337203685E+18
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => NULL
        }
        "id_status" => object DB_ORM_Field_Integer(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(9) (
                "control" => string(4) "auto"
                "default" => NULL
                "modified" => bool TRUE
                "nullable" => bool TRUE
                "savable" => bool TRUE
                "type" => string(7) "integer"
                "max_length" => integer 11
                "unsigned" => bool FALSE
                "range" => array(2) (
                    "lower_bound" => float -9,22337203685E+18
                    "upper_bound" => integer 9223372036854775807
                )
            )
            protected value => integer 1
        }
    )
    protected metadata => array(2) (
        "loaded" => bool TRUE
        "saved" => string(40) "e15cea14d351c743e5e34612ab730035adb20cc8"
    )
    protected relations => array(3) (
        "user_roles" => object DB_ORM_Relation_HasMany(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "type" => string(8) "has_many"
                "parent_model" => string(15) "Model_Leap_User"
                "parent_key" => array(1) (
                    0 => string(2) "id"
                )
                "child_model" => string(20) "Model_Leap_User_Role"
                "child_key" => array(1) (
                    0 => string(7) "user_id"
                )
                "options" => array(0) 
            )
            protected cache => object DB_ResultSet(4) {
                protected records => array(1) (
                    0 => object Model_Leap_User_Role(5) {
                        protected adaptors => array(0) 
                        protected aliases => array(0) 
                        protected fields => array(3) (
                            "user_id" => object DB_ORM_Field_Integer(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(9) (
                                    "control" => string(4) "auto"
                                    "default" => integer 0
                                    "modified" => bool TRUE
                                    "nullable" => bool FALSE
                                    "savable" => bool TRUE
                                    "type" => string(7) "integer"
                                    "max_length" => integer 10
                                    "unsigned" => bool TRUE
                                    "range" => array(2) (
                                        "lower_bound" => integer 0
                                        "upper_bound" => integer 2147483647
                                    )
                                )
                                protected value => integer 145
                            }
                            "role_id" => object DB_ORM_Field_Integer(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(9) (
                                    "control" => string(4) "auto"
                                    "default" => integer 0
                                    "modified" => bool TRUE
                                    "nullable" => bool FALSE
                                    "savable" => bool TRUE
                                    "type" => string(7) "integer"
                                    "max_length" => integer 10
                                    "unsigned" => bool TRUE
                                    "range" => array(2) (
                                        "lower_bound" => integer 0
                                        "upper_bound" => integer 2147483647
                                    )
                                )
                                protected value => integer 14
                            }
                            "id" => object DB_ORM_Field_Integer(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(9) (
                                    "control" => string(4) "auto"
                                    "default" => integer 0
                                    "modified" => bool TRUE
                                    "nullable" => bool FALSE
                                    "savable" => bool TRUE
                                    "type" => string(7) "integer"
                                    "max_length" => integer 11
                                    "unsigned" => bool FALSE
                                    "range" => array(2) (
                                        "lower_bound" => float -9,22337203685E+18
                                        "upper_bound" => integer 9223372036854775807
                                    )
                                )
                                protected value => integer 11
                            }
                        )
                        protected metadata => array(2) (
                            "loaded" => bool TRUE
                            "saved" => NULL
                        )
                        protected relations => array(2) (
                            "user" => object DB_ORM_Relation_BelongsTo(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(5) (
                                    "type" => string(10) "belongs_to"
                                    "parent_model" => string(15) "Model_Leap_User"
                                    "parent_key" => array(1) (
                                        0 => string(2) "id"
                                    )
                                    "child_model" => string(20) "Model_Leap_User_Role"
                                    "child_key" => array(1) (
                                        0 => string(7) "user_id"
                                    )
                                )
                                protected cache => NULL
                            }
                            "role" => object DB_ORM_Relation_BelongsTo(3) {
                                protected model => object Model_Leap_User_Role(5) {
                                    *RECURSION*
                                }
                                protected metadata => array(5) (
                                    "type" => string(10) "belongs_to"
                                    "parent_model" => string(15) "Model_Leap_Role"
                                    "parent_key" => array(1) (
                                        0 => string(2) "id"
                                    )
                                    "child_model" => string(20) "Model_Leap_User_Role"
                                    "child_key" => array(1) (
                                        0 => string(7) "role_id"
                                    )
                                )
                                protected cache => object Model_Leap_Role(5) {
                                    protected adaptors => array(0) 
                                    protected aliases => array(0) 
                                    protected fields => array(3) (
                                        "id" => object DB_ORM_Field_Integer(3) {
                                            ...
                                        }
                                        "name" => object DB_ORM_Field_String(3) {
                                            ...
                                        }
                                        "description" => object DB_ORM_Field_String(3) {
                                            ...
                                        }
                                    )
                                    protected metadata => array(2) (
                                        "loaded" => bool TRUE
                                        "saved" => NULL
                                    )
                                    protected relations => array(1) (
                                        "user_roles" => object DB_ORM_Relation_HasMany(3) {
                                            ...
                                        }
                                    )
                                }
                            }
                        )
                    }
                )
                protected position => integer 1
                protected size => integer 1
                protected type => string(20) "Model_Leap_User_Role"
            }
        }
        "user_token" => object DB_ORM_Relation_HasMany(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(6) (
                "type" => string(8) "has_many"
                "parent_model" => string(15) "Model_Leap_User"
                "parent_key" => array(1) (
                    0 => string(2) "id"
                )
                "child_model" => string(21) "Model_Leap_User_Token"
                "child_key" => array(1) (
                    0 => string(7) "user_id"
                )
                "options" => array(0) 
            )
            protected cache => NULL
        }
        "status" => object DB_ORM_Relation_BelongsTo(3) {
            protected model => object Model_Leap_User(5) {
                *RECURSION*
            }
            protected metadata => array(5) (
                "type" => string(10) "belongs_to"
                "parent_model" => string(22) "Model_Leap_user_status"
                "parent_key" => array(1) (
                    0 => string(2) "id"
                )
                "child_model" => string(15) "Model_Leap_User"
                "child_key" => array(1) (
                    0 => string(9) "id_status"
                )
            )
            protected cache => NULL
        }
    )
}
				
							
		
												$_COOKIE
		
			
								
					session
					string(32) "a724dbfc3620945f2ab34bb366437e94"
				
								
					crud_page_e3aa0e15dc69c64ff5bd114fa152475a
					string(1) "1"
				
								
					per_page_e3aa0e15dc69c64ff5bd114fa152475a
					string(3) "100"
				
								
					hidden_ordering_e3aa0e15dc69c64ff5bd114fa152475a
					string(0) ""
				
								
					hidden_sorting_e3aa0e15dc69c64ff5bd114fa152475a
					string(0) ""
				
								
					crud_page_18d9f6472ca1951f3a179d6cfc35f096
					string(1) "1"
				
								
					per_page_18d9f6472ca1951f3a179d6cfc35f096
					string(2) "50"
				
								
					hidden_ordering_18d9f6472ca1951f3a179d6cfc35f096
					string(3) "asc"
				
								
					hidden_sorting_18d9f6472ca1951f3a179d6cfc35f096
					string(9) "s84566833"
				
								
					crud_page_ab2af15b364b3c86d83b7aaf75ca61bc
					string(1) "2"
				
								
					per_page_ab2af15b364b3c86d83b7aaf75ca61bc
					string(2) "10"
				
								
					hidden_ordering_ab2af15b364b3c86d83b7aaf75ca61bc
					string(3) "asc"
				
								
					hidden_sorting_ab2af15b364b3c86d83b7aaf75ca61bc
					string(9) "sb61fae3a"
				
							
		
						$_SERVER
		
			
								
					KOHANA_ENV
					string(11) "DEVELOPMENT"
				
								
					HTTP_HOST
					string(14) "gcb-smart:8090"
				
								
					HTTP_CONNECTION
					string(10) "keep-alive"
				
								
					HTTP_PRAGMA
					string(8) "no-cache"
				
								
					HTTP_CACHE_CONTROL
					string(8) "no-cache"
				
								
					HTTP_ACCEPT
					string(74) "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8"
				
								
					HTTP_USER_AGENT
					string(120) "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36"
				
								
					HTTP_REFERER
					string(27) "http://gcb-smart:8090/admin"
				
								
					HTTP_ACCEPT_ENCODING
					string(19) "gzip, deflate, sdch"
				
								
					HTTP_ACCEPT_LANGUAGE
					string(35) "fr-FR,fr;q=0.8,en-US;q=0.6,en;q=0.4"
				
								
					HTTP_COOKIE
					string(644) "session=a724dbfc3620945f2ab34bb366437e94; crud_page_e3aa0e15dc69c64ff5bd114fa152475a=1; per_page_e3aa0e15dc69c64ff5bd114fa152475&nbsp;&hellip;"
				
								
					PATH
					string(29) "/usr/bin:/bin:/usr/sbin:/sbin"
				
								
					SERVER_SIGNATURE
					string(0) ""
				
								
					SERVER_SOFTWARE
					string(6) "Apache"
				
								
					SERVER_NAME
					string(9) "gcb-smart"
				
								
					SERVER_ADDR
					string(3) "::1"
				
								
					SERVER_PORT
					string(4) "8090"
				
								
					REMOTE_ADDR
					string(3) "::1"
				
								
					DOCUMENT_ROOT
					string(40) "/Users/cesar/Documents/DEV/GIT/gcb-smart"
				
								
					SERVER_ADMIN
					string(15) "you@example.com"
				
								
					SCRIPT_FILENAME
					string(50) "/Users/cesar/Documents/DEV/GIT/gcb-smart/index.php"
				
								
					REMOTE_PORT
					string(5) "54539"
				
								
					GATEWAY_INTERFACE
					string(7) "CGI/1.1"
				
								
					SERVER_PROTOCOL
					string(8) "HTTP/1.1"
				
								
					REQUEST_METHOD
					string(3) "GET"
				
								
					QUERY_STRING
					string(0) ""
				
								
					REQUEST_URI
					string(1) "/"
				
								
					SCRIPT_NAME
					string(10) "/index.php"
				
								
					PHP_SELF
					string(10) "/index.php"
				
								
					REQUEST_TIME_FLOAT
					float 1430479981,94
				
								
					REQUEST_TIME
					integer 1430479981
				
								
					argv
					array(0) 
				
								
					argc
					integer 0
				
							
		
			

 could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 15:33:02 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename(Object(View))
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct(Object(View), NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory(Object(View))
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(31): Kohana_Controller_Template->before()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Main.php(40): Controller_Oscrudc->before()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/App.php(29): Controller_Golf_Main->before()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(69): Controller_Golf_App->before()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_App))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 15:56:01 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:56:01 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:56:02 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:56:02 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10 OFFSET 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:56:04 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:56:04 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:56:04 --- EMERGENCY: View_Exception [ 0 ]: The requested view /admin/header_nav could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 15:56:04 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('/admin/header_n...')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('/admin/header_n...', NULL)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Roles.php(48): Kohana_View::factory('/admin/header_n...')
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Roles->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 15:56:09 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:56:09 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:56:12 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:56:12 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10 OFFSET 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:56:14 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:56:14 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:56:15 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:56:15 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `s84566833` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:58:58 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:58:58 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:59:10 --- EMERGENCY: View_Exception [ 0 ]: The requested view /fragments/admin/crud/add could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 15:59:10 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(137): Kohana_View->set_filename('/fragments/admi...')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(30): Kohana_View->__construct('/fragments/admi...', Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Roles.php(60): Kohana_View::factory('/fragments/admi...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Roles->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php:137
2015-05-01 15:59:14 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 15:59:14 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:02:20 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:02:20 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:03:56 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-05-01 16:03:56 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
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
2015-05-01 16:05:10 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:05:10 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:10 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:10 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:10 --- EMERGENCY: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'Controller_Golf_Roles' does not have a method 'edit_user' ~ MODPATH/oscrud/classes/Oscrud/Core/Layout.php [ 319 ] in file:line
2015-05-01 16:06:10 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'call_user_func(...', '/Users/cesar/Do...', 319, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(319): call_user_func(Array, '14', Object(stdClass))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(44): Oscrud_Core_Layout->change_list_add_actions(Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(78): Oscrud_Core_Layout->showList(true)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Roles.php(65): Controller_Oscrudc->action_ajax_list()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Roles->action_ajax_list()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-05-01 16:06:12 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:12 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:12 --- EMERGENCY: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'Controller_Golf_Roles' does not have a method 'edit_user' ~ MODPATH/oscrud/classes/Oscrud/Core/Layout.php [ 319 ] in file:line
2015-05-01 16:06:12 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'call_user_func(...', '/Users/cesar/Do...', 319, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(319): call_user_func(Array, '14', Object(stdClass))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(44): Oscrud_Core_Layout->change_list_add_actions(Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(78): Oscrud_Core_Layout->showList(true)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Roles.php(65): Controller_Oscrudc->action_ajax_list()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Roles->action_ajax_list()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-05-01 16:06:12 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:12 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:12 --- EMERGENCY: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'Controller_Golf_Roles' does not have a method 'edit_user' ~ MODPATH/oscrud/classes/Oscrud/Core/Layout.php [ 319 ] in file:line
2015-05-01 16:06:12 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'call_user_func(...', '/Users/cesar/Do...', 319, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(319): call_user_func(Array, '14', Object(stdClass))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(44): Oscrud_Core_Layout->change_list_add_actions(Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(78): Oscrud_Core_Layout->showList(true)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Roles.php(65): Controller_Oscrudc->action_ajax_list()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Roles->action_ajax_list()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-05-01 16:06:13 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:13 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:13 --- EMERGENCY: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'Controller_Golf_Roles' does not have a method 'edit_user' ~ MODPATH/oscrud/classes/Oscrud/Core/Layout.php [ 319 ] in file:line
2015-05-01 16:06:13 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'call_user_func(...', '/Users/cesar/Do...', 319, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(319): call_user_func(Array, '14', Object(stdClass))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(44): Oscrud_Core_Layout->change_list_add_actions(Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(78): Oscrud_Core_Layout->showList(true)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Roles.php(65): Controller_Oscrudc->action_ajax_list()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Roles->action_ajax_list()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-05-01 16:06:14 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:14 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:14 --- EMERGENCY: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'Controller_Golf_Roles' does not have a method 'edit_user' ~ MODPATH/oscrud/classes/Oscrud/Core/Layout.php [ 319 ] in file:line
2015-05-01 16:06:14 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'call_user_func(...', '/Users/cesar/Do...', 319, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(319): call_user_func(Array, '14', Object(stdClass))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(44): Oscrud_Core_Layout->change_list_add_actions(Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(78): Oscrud_Core_Layout->showList(true)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Roles.php(65): Controller_Oscrudc->action_ajax_list()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Roles->action_ajax_list()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-05-01 16:06:16 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:16 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:16 --- EMERGENCY: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'Controller_Golf_Roles' does not have a method 'edit_user' ~ MODPATH/oscrud/classes/Oscrud/Core/Layout.php [ 319 ] in file:line
2015-05-01 16:06:16 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'call_user_func(...', '/Users/cesar/Do...', 319, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(319): call_user_func(Array, '14', Object(stdClass))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(44): Oscrud_Core_Layout->change_list_add_actions(Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(78): Oscrud_Core_Layout->showList(true)
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Roles.php(65): Controller_Oscrudc->action_ajax_list()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Roles->action_ajax_list()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-05-01 16:06:23 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:23 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:23 --- EMERGENCY: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'Controller_Golf_Roles' does not have a method 'edit_user' ~ MODPATH/oscrud/classes/Oscrud/Core/Layout.php [ 319 ] in file:line
2015-05-01 16:06:23 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'call_user_func(...', '/Users/cesar/Do...', 319, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(319): call_user_func(Array, '14', Object(stdClass))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(44): Oscrud_Core_Layout->change_list_add_actions(Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(203): Oscrud_Core_Layout->showList(false, Object(stdClass))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Roles.php(52): Controller_Oscrudc->action_list()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Roles->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-05-01 16:06:44 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:44 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:44 --- EMERGENCY: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'Controller_Golf_Roles' does not have a method 'edit_user' ~ MODPATH/oscrud/classes/Oscrud/Core/Layout.php [ 319 ] in file:line
2015-05-01 16:06:44 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'call_user_func(...', '/Users/cesar/Do...', 319, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(319): call_user_func(Array, '14', Object(stdClass))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(44): Oscrud_Core_Layout->change_list_add_actions(Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(203): Oscrud_Core_Layout->showList(false, Object(stdClass))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Roles.php(52): Controller_Oscrudc->action_list()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Roles->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-05-01 16:06:49 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:49 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:06:49 --- EMERGENCY: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'Controller_Golf_Roles' does not have a method 'edit_user' ~ MODPATH/oscrud/classes/Oscrud/Core/Layout.php [ 319 ] in file:line
2015-05-01 16:06:49 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'call_user_func(...', '/Users/cesar/Do...', 319, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(319): call_user_func(Array, '14', Object(stdClass))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(44): Oscrud_Core_Layout->change_list_add_actions(Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(203): Oscrud_Core_Layout->showList(false, Object(stdClass))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Roles.php(52): Controller_Oscrudc->action_list()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Roles->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Roles))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-05-01 16:10:35 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:10:35 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:10:37 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:10:37 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:10:49 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-05-01 16:10:49 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
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
2015-05-01 16:15:44 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:15:44 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:15:46 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:15:46 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:15:49 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:15:49 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:15:50 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:15:50 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `s84566833` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:15:52 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:15:52 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:15:53 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:15:53 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10 OFFSET 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:16:07 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:16:07 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:16:17 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:16:17 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE (`firstname` LIKE '%arthur%' ESCAPE '\\' OR `lastname` LIKE '%arthur%' ESCAPE '\\' OR `email` LIKE '%arthur%' ESCAPE '\\' OR `jb61fae3a`.`nom` LIKE '%arthur%' ESCAPE '\\' OR `j96a39558`.`status` LIKE '%arthur%' ESCAPE '\\') AND `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:16:25 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:16:25 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE (`firstname` LIKE '%cesar%' ESCAPE '\\' OR `lastname` LIKE '%cesar%' ESCAPE '\\' OR `email` LIKE '%cesar%' ESCAPE '\\' OR `jb61fae3a`.`nom` LIKE '%cesar%' ESCAPE '\\' OR `j96a39558`.`status` LIKE '%cesar%' ESCAPE '\\') AND `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:16:47 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:16:47 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:16:48 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:16:48 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:21:37 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:21:37 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:21:38 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:21:38 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:23:02 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:23:02 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:23:03 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:23:03 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:32:16 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:32:16 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:33:13 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:33:13 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:42:43 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:42:43 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:42:45 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:42:45 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:43:05 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:43:05 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:43:06 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:43:06 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `s84566833` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:43:17 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:43:17 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `se8701ad4` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:43:31 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:43:31 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) WHERE (`j84566833`.`description` LIKE '%cesar%' ESCAPE '\\' OR `je8701ad4`.`email` LIKE '%cesar%' ESCAPE '\\') ORDER BY `se8701ad4` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:43:42 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:43:42 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:43:44 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:43:44 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:11 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:11 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE (`firstname` LIKE '%jacquet%' ESCAPE '\\' OR `lastname` LIKE '%jacquet%' ESCAPE '\\' OR `email` LIKE '%jacquet%' ESCAPE '\\' OR `jb61fae3a`.`nom` LIKE '%jacquet%' ESCAPE '\\' OR `j96a39558`.`status` LIKE '%jacquet%' ESCAPE '\\') AND `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:26 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:26 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:27 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:27 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:41 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:41 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:42 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:42 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `se8701ad4` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:52 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:52 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `se8701ad4` ASC LIMIT 50 OFFSET 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:54 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:54 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `se8701ad4` ASC LIMIT 50 OFFSET 100; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:55 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:44:55 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `se8701ad4` ASC LIMIT 50 OFFSET 150; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:45:00 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:45:00 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `se8701ad4` ASC LIMIT 50 OFFSET 200; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:45:01 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:45:01 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `se8701ad4` ASC LIMIT 50 OFFSET 250; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:45:09 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:45:09 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `se8701ad4` ASC LIMIT 50 OFFSET 200; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:45:39 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:45:39 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:45:41 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:45:41 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:46:25 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:46:25 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE (`firstname` LIKE '%jacquet%' ESCAPE '\\' OR `lastname` LIKE '%jacquet%' ESCAPE '\\' OR `email` LIKE '%jacquet%' ESCAPE '\\' OR `jb61fae3a`.`nom` LIKE '%jacquet%' ESCAPE '\\' OR `j96a39558`.`status` LIKE '%jacquet%' ESCAPE '\\') AND `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:46:31 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:46:31 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:46:33 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:46:33 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `se8701ad4` ASC LIMIT 50 OFFSET 200; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:46:55 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:46:55 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:46:56 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:46:56 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:48:25 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:48:25 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:48:25 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-05-01 16:48:25 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
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
2015-05-01 16:51:08 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:51:08 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:52:22 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:52:22 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:55:57 --- NOTICE: get_list : select =`roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 16:55:57 --- NOTICE: SELECT * FROM `roles` LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:07:23 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:07:23 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:07:51 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:07:51 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:07:52 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:07:52 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `se8701ad4` ASC LIMIT 50 OFFSET 200; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:08:00 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:08:00 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `se8701ad4` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:09:40 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:09:40 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `se8701ad4` ASC LIMIT 50 OFFSET 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:09:52 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:09:52 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `se8701ad4` ASC LIMIT 50 OFFSET 100; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:09:55 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:09:55 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `se8701ad4` ASC LIMIT 50 OFFSET 150; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:13:01 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:13:01 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:14:27 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:14:27 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:14:29 --- NOTICE: get_list : select =`user_roles`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:14:29 --- NOTICE: SELECT `user_roles`.*, `je8701ad4`.`email` AS `se8701ad4`, `user_roles`.*, `j84566833`.`description` AS `s84566833` FROM `user_roles` LEFT JOIN `users` as `je8701ad4` ON (`je8701ad4`.`id` = `user_roles`.`user_id`) LEFT JOIN `roles` as `j84566833` ON (`j84566833`.`id` = `user_roles`.`role_id`) ORDER BY `se8701ad4` ASC LIMIT 50 OFFSET 150; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:18:02 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:18:02 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:18:04 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:18:04 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:22:30 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:22:30 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:22:31 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:22:31 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:22:40 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:22:40 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` DESC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:22:41 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:22:41 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:22:52 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:22:52 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:22:55 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:22:55 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:22:56 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 17:22:56 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:13:42 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:13:42 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:13:44 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:13:44 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:17:47 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:17:47 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:17:47 --- EMERGENCY: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'Controller_Golf_Users' does not have a method 'active_user' ~ MODPATH/oscrud/classes/Oscrud/Core/Layout.php [ 319 ] in file:line
2015-05-01 20:17:47 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'call_user_func(...', '/Users/cesar/Do...', 319, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(319): call_user_func(Array, '133', Object(stdClass))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(44): Oscrud_Core_Layout->change_list_add_actions(Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(187): Oscrud_Core_Layout->showList(false, Object(stdClass))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Users.php(120): Controller_Oscrudc->action_list()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Users->action_list()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Users))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-05-01 20:18:19 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:18:19 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:18:21 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:18:21 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:18:40 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:18:40 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:18:41 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:18:41 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:19:14 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:19:14 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:19:15 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:19:15 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:22:45 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:22:45 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:22:47 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:22:47 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:25:05 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:25:05 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:25:07 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:25:07 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:35:29 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:35:29 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:35:30 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:35:30 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:35:30 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:35:30 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:35:31 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:35:31 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:35:31 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:35:31 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:42:20 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:42:20 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:42:22 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:42:22 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:44:41 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:44:41 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:45:55 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:45:55 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:47:12 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:47:12 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:55:13 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:55:13 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:55:31 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:55:31 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:55:33 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:55:33 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:57:42 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:57:42 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:57:43 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:57:43 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:58:44 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:58:44 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:58:46 --- NOTICE: get_list : select =`users`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795
2015-05-01 20:58:46 --- NOTICE: SELECT `users`.*, `jb61fae3a`.`nom` AS `sb61fae3a`, `users`.*, `j96a39558`.`status` AS `s96a39558` FROM `users` LEFT JOIN `pays` as `jb61fae3a` ON (`jb61fae3a`.`id` = `users`.`id_pays`) LEFT JOIN `user_status` as `j96a39558` ON (`j96a39558`.`id` = `users`.`id_status`) WHERE `users`.`id` > '9' AND `status` = 'enable' ORDER BY `sb61fae3a` ASC LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:795