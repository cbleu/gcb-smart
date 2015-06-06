<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-06-03 09:08:21 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:08:21 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'display' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:08:23 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:08:23 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'parcours' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:08:25 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:08:25 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:17:44 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:17:44 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:17:44 --- EMERGENCY: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'Controller_Golf_ResaPending' does not have a method 'delete_user' ~ MODPATH/oscrud/classes/Oscrud/Core/Layout.php [ 315 ] in file:line
2015-06-03 09:17:44 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'call_user_func(...', '/Users/cesar/Do...', 315, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(315): call_user_func(Array, '742', Object(stdClass))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(44): Oscrud_Core_Layout->change_list_add_actions(Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(206): Oscrud_Core_Layout->showList(false, Object(stdClass))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resapending.php(76): Controller_Oscrudc->action_list()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResaPending->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResaPending))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-06-03 09:28:44 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:28:44 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:34:27 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:34:27 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:43:15 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:43:15 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:43:22 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 09:43:22 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResaPending))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 09:43:27 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:43:27 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:43:31 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:43:31 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:48:27 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:48:27 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:49:46 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:49:46 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:49:50 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 09:49:50 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResaPending))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 09:49:56 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:49:56 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:50:58 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:50:58 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:51:22 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:51:22 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:51:46 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 09:51:46 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResaPending))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 09:51:56 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:51:56 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:55:27 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:55:27 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:55:29 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:55:29 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:55:33 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:55:33 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:59:02 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:59:02 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:59:05 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 09:59:05 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:00:21 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:00:21 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:00:33 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:00:33 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:01:15 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:01:15 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:01:58 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:01:58 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:02:10 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:02:10 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:02:10 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:02:10 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:02:59 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:02:59 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:04:19 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:04:19 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:04:28 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:04:28 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:11:48 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 10:11:48 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResaPending))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 10:11:51 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:11:51 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:12:34 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:12:34 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:12:39 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:12:39 --- NOTICE: SELECT * FROM `demande_reservation` ORDER BY `Date` ASC LIMIT 1000000; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:12:49 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:12:49 --- NOTICE: SELECT * FROM `demande_reservation` ORDER BY `Date` ASC LIMIT 1000000; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:28:05 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:28:05 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 10:29:28 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : Désolé vous ne pouvez pas réserver à cette date ! in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:468
2015-06-03 10:29:29 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : Désolé vous ne pouvez pas réserver à cette date ! in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:468
2015-06-03 10:29:29 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : Désolé vous ne pouvez pas réserver à cette date ! in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:468
2015-06-03 10:29:50 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : Désolé vous ne pouvez pas réserver à cette date ! in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:468
2015-06-03 10:29:50 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : Désolé vous ne pouvez pas réserver à cette date ! in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:468
2015-06-03 10:30:39 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : Désolé vous ne pouvez pas réserver à cette date ! in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:468
2015-06-03 10:31:37 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : Désolé vous ne pouvez pas réserver à cette date ! in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:468
2015-06-03 10:31:38 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : Désolé vous ne pouvez pas réserver à cette date ! in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:468
2015-06-03 10:31:50 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : Désolé vous ne pouvez pas réserver à cette date ! in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:468
2015-06-03 10:31:50 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : Désolé vous ne pouvez pas réserver à cette date ! in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:468
2015-06-03 10:31:58 --- NOTICE: GameReservation::CheckPostDateAndTime: ERREUR : Désolé vous ne pouvez pas réserver à cette date ! in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/EGP/GameReservation.php:468
2015-06-03 14:32:46 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:32:46 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'app' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:33:01 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:33:01 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:33:52 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:33:52 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:36:07 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 14:36:07 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Settings))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 14:36:07 --- EMERGENCY: Throwable_InvalidProperty_Exception [ 0 ]: Message: Unable to get the specified property. Reason: Property id is either inaccessible or undefined. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 114 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Model/Oscrud.php:912
2015-06-03 14:36:07 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Model/Oscrud.php(912): Base_DB_ORM_Model->__get('id')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php(428): Model_Oscrud->db_insert(Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(165): Oscrud_Core_Model_Driver->db_insert(Object(stdClass))
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Settings.php(226): Controller_Oscrudc->action_insert()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Settings->action_insert()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Settings))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Model/Oscrud.php:912
2015-06-03 14:36:07 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:36:07 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:36:15 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:36:15 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:36:17 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:36:17 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'app' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:36:21 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:36:21 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:36:23 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:36:23 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'display' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:36:25 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:36:25 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'parcours' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:48:48 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Oscrud::hide_fields() ~ APPPATH/classes/Controller/Golf/Settings.php [ 53 ] in file:line
2015-06-03 14:48:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-03 14:54:28 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:54:28 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:54:35 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:54:35 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:55:38 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:55:38 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:55:45 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:55:45 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:55:51 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:55:51 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:56:27 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:56:27 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:57:56 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:57:56 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:58:37 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:58:37 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:58:58 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 14:58:58 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Settings))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 14:58:58 --- EMERGENCY: Throwable_InvalidProperty_Exception [ 0 ]: Message: Unable to get the specified property. Reason: Property id is either inaccessible or undefined. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 114 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Model/Oscrud.php:912
2015-06-03 14:58:58 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Model/Oscrud.php(912): Base_DB_ORM_Model->__get('id')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php(428): Model_Oscrud->db_insert(Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(165): Oscrud_Core_Model_Driver->db_insert(Object(stdClass))
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Settings.php(230): Controller_Oscrudc->action_insert()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Settings->action_insert()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Settings))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Model/Oscrud.php:912
2015-06-03 14:58:58 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:58:58 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:59:05 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:59:05 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:59:06 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 14:59:06 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 10; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 15:00:26 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 15:00:26 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 15:00:48 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 15:00:48 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Settings))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 15:00:48 --- EMERGENCY: Throwable_InvalidProperty_Exception [ 0 ]: Message: Unable to get the specified property. Reason: Property id is either inaccessible or undefined. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 114 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Model/Oscrud.php:912
2015-06-03 15:00:48 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Model/Oscrud.php(912): Base_DB_ORM_Model->__get('id')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php(428): Model_Oscrud->db_insert(Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(165): Oscrud_Core_Model_Driver->db_insert(Object(stdClass))
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Settings.php(234): Controller_Oscrudc->action_insert()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Settings->action_insert()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Settings))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Model/Oscrud.php:912
2015-06-03 15:00:48 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 15:00:48 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 15:18:49 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 15:18:49 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Settings))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 15:18:50 --- EMERGENCY: Throwable_Marshalling_Exception [ 0 ]: Message: Failed to load record from database. Reason: Unable to match primary key with a record. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 372 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:563
2015-06-03 15:18:50 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php(563): Base_DB_ORM_Model->load()
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Model/Oscrud.php(909): Base_DB_ORM_Model->save(true)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php(428): Model_Oscrud->db_insert(Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(165): Oscrud_Core_Model_Driver->db_insert(Object(stdClass))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Settings.php(234): Controller_Oscrudc->action_insert()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Settings->action_insert()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Settings))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/leap/classes/Base/DB/ORM/Model.php:563
2015-06-03 15:18:50 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 15:18:50 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 15:23:16 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 15:23:16 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 15:24:07 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/egp_template.php [ 66 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 15:24:07 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php(66): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 66, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Settings))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/views/egp_template.php:66
2015-06-03 15:24:07 --- EMERGENCY: Throwable_InvalidProperty_Exception [ 0 ]: Message: Unable to get the specified property. Reason: Property id is either inaccessible or undefined. ~ MODPATH/leap/classes/Base/DB/ORM/Model.php [ 114 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Model/Oscrud.php:912
2015-06-03 15:24:07 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Model/Oscrud.php(912): Base_DB_ORM_Model->__get('id')
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php(428): Model_Oscrud->db_insert(Array)
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(165): Oscrud_Core_Model_Driver->db_insert(Object(stdClass))
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Settings.php(234): Controller_Oscrudc->action_insert()
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_Settings->action_insert()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Settings))
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Model/Oscrud.php:912
2015-06-03 15:24:08 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 15:24:08 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 16:24:57 --- NOTICE: get_list : select =`settings`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 16:24:57 --- NOTICE: SELECT * FROM `settings` WHERE `section` = 'club' LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 20:29:40 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 20:29:40 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-06-03 21:23:32 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '(', expecting ',' or ';' ~ APPPATH/classes/EGP/GameReservation.php [ 24 ] in file:line
2015-06-03 21:23:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-03 21:23:32 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '(', expecting ',' or ';' ~ APPPATH/classes/EGP/GameReservation.php [ 24 ] in file:line
2015-06-03 21:23:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-03 21:23:34 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '(', expecting ',' or ';' ~ APPPATH/classes/EGP/GameReservation.php [ 24 ] in file:line
2015-06-03 21:23:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-03 21:23:34 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '(', expecting ',' or ';' ~ APPPATH/classes/EGP/GameReservation.php [ 24 ] in file:line
2015-06-03 21:23:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-03 21:25:23 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '&&' (T_BOOLEAN_AND), expecting ',' or ')' ~ APPPATH/classes/EGP/GameReservation.php [ 842 ] in file:line
2015-06-03 21:25:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-03 21:25:33 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '&&' (T_BOOLEAN_AND), expecting ',' or ')' ~ APPPATH/classes/EGP/GameReservation.php [ 842 ] in file:line
2015-06-03 21:25:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-03 21:25:33 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '&&' (T_BOOLEAN_AND), expecting ',' or ')' ~ APPPATH/classes/EGP/GameReservation.php [ 842 ] in file:line
2015-06-03 21:25:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-06-03 21:27:19 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: trou_depart ~ APPPATH/classes/Controller/Golf/Resajax.php [ 756 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:756
2015-06-03 21:27:19 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(756): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 756, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:756
2015-06-03 21:54:32 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: trou_depart ~ APPPATH/classes/Controller/Golf/Resajax.php [ 756 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:756
2015-06-03 21:54:32 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(756): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 756, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:756
2015-06-03 21:57:58 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: trou_depart ~ APPPATH/classes/Controller/Golf/Resajax.php [ 756 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:756
2015-06-03 21:57:58 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(756): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 756, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:756
2015-06-03 21:59:01 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: trou_depart ~ APPPATH/classes/Controller/Golf/Resajax.php [ 756 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:756
2015-06-03 21:59:01 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(756): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 756, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:756
2015-06-03 22:00:41 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: trou_depart ~ APPPATH/classes/Controller/Golf/Resajax.php [ 756 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:756
2015-06-03 22:00:41 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(756): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 756, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:756
2015-06-03 22:00:59 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: trou_depart ~ APPPATH/classes/Controller/Golf/Resajax.php [ 756 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:756
2015-06-03 22:00:59 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(756): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 756, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:756
2015-06-03 22:07:31 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: trou_depart ~ APPPATH/classes/Controller/Golf/Resajax.php [ 756 ] in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:756
2015-06-03 22:07:31 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php(756): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/cesar/Do...', 756, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResAjax->action_add()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResAjax))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resajax.php:756