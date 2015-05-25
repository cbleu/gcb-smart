<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-05-24 19:20:52 --- NOTICE: get_list : select =`demande_reservation`.* in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-24 19:20:52 --- NOTICE: SELECT * FROM `demande_reservation` WHERE `traite` = '0' ORDER BY `Date` ASC LIMIT 50; in /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Model/Driver.php:797
2015-05-24 19:20:52 --- EMERGENCY: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'Controller_Golf_ResaPending' does not have a method 'delete_user' ~ MODPATH/oscrud/classes/Oscrud/Core/Layout.php [ 319 ] in file:line
2015-05-24 19:20:52 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'call_user_func(...', '/Users/cesar/Do...', 319, Array)
#1 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(319): call_user_func(Array, '742', Object(stdClass))
#2 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Oscrud/Core/Layout.php(44): Oscrud_Core_Layout->change_list_add_actions(Array)
#3 /Users/cesar/Documents/DEV/GIT/gcb-smart/modules/oscrud/classes/Controller/Oscrudc.php(200): Oscrud_Core_Layout->showList(false, Object(stdClass))
#4 /Users/cesar/Documents/DEV/GIT/gcb-smart/application/classes/Controller/Golf/Resapending.php(76): Controller_Oscrudc->action_list()
#5 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Controller.php(84): Controller_Golf_ResaPending->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_ResaPending))
#8 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/cesar/Documents/DEV/GIT/gcb-smart/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/cesar/Documents/DEV/GIT/gcb-smart/index.php(118): Kohana_Request->execute()
#11 {main} in file:line