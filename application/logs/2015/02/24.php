<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-24 10:45:46 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: header ~ APPPATH/views/admin.php [ 1 ] in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/admin.php:1
2015-02-24 10:45:46 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/admin.php(1): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 1, Array)
#1 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Main.php(56): Kohana_View->__toString()
#5 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Golf/Reservation.php(13): Controller_Main->before()
#6 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Controller.php(69): Controller_Golf_Reservation->before()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Reservation))
#9 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/cesar/Documents/DEV/GIT/easygolf_dev/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/admin.php:1
2015-02-24 10:45:46 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: header ~ APPPATH/views/admin.php [ 1 ] in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/admin.php:1
2015-02-24 10:45:46 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/admin.php(1): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 1, Array)
#1 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Main.php(59): Kohana_View->__toString()
#5 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Golf/Reservation.php(13): Controller_Main->before()
#6 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Controller.php(69): Controller_Golf_Reservation->before()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Reservation))
#9 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/cesar/Documents/DEV/GIT/easygolf_dev/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/admin.php:1
2015-02-24 10:45:47 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: header ~ APPPATH/views/admin.php [ 1 ] in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/admin.php:1
2015-02-24 10:45:47 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/admin.php(1): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 1, Array)
#1 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Main.php(62): Kohana_View->__toString()
#5 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Golf/Reservation.php(13): Controller_Main->before()
#6 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Controller.php(69): Controller_Golf_Reservation->before()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Reservation))
#9 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/cesar/Documents/DEV/GIT/easygolf_dev/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/admin.php:1
2015-02-24 10:45:47 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: header ~ APPPATH/views/admin.php [ 1 ] in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/admin.php:1
2015-02-24 10:45:47 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/admin.php(1): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 1, Array)
#1 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Main.php(68): Kohana_View->__toString()
#5 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Golf/Reservation.php(13): Controller_Main->before()
#6 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Controller.php(69): Controller_Golf_Reservation->before()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Golf_Reservation))
#9 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/cesar/Documents/DEV/GIT/easygolf_dev/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/admin.php:1
2015-02-24 10:45:47 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH/views/public.php [ 5 ] in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/public.php:5
2015-02-24 10:45:47 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/public.php(5): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 5, Array)
#1 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Main.php(56): Kohana_View->__toString()
#5 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Public/Application.php(18): Controller_Main->before()
#6 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Controller.php(69): Controller_Public_Application->before()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Public_Application))
#9 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/cesar/Documents/DEV/GIT/easygolf_dev/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/public.php:5
2015-02-24 10:45:47 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH/views/public.php [ 5 ] in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/public.php:5
2015-02-24 10:45:47 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/public.php(5): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 5, Array)
#1 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Main.php(59): Kohana_View->__toString()
#5 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Public/Application.php(18): Controller_Main->before()
#6 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Controller.php(69): Controller_Public_Application->before()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Public_Application))
#9 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/cesar/Documents/DEV/GIT/easygolf_dev/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/public.php:5
2015-02-24 10:45:48 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH/views/public.php [ 5 ] in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/public.php:5
2015-02-24 10:45:48 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/public.php(5): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 5, Array)
#1 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Main.php(62): Kohana_View->__toString()
#5 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Public/Application.php(18): Controller_Main->before()
#6 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Controller.php(69): Controller_Public_Application->before()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Public_Application))
#9 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/cesar/Documents/DEV/GIT/easygolf_dev/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/public.php:5
2015-02-24 10:45:48 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH/views/public.php [ 5 ] in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/public.php:5
2015-02-24 10:45:48 --- DEBUG: #0 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/public.php(5): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/cesar/Do...', 5, Array)
#1 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(61): include('/Users/cesar/Do...')
#2 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/cesar/Do...', Array)
#3 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Main.php(68): Kohana_View->__toString()
#5 /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/classes/Controller/Public/Application.php(18): Controller_Main->before()
#6 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Controller.php(69): Controller_Public_Application->before()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Public_Application))
#9 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/cesar/Documents/DEV/GIT/easygolf_dev/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/cesar/Documents/DEV/GIT/easygolf_dev/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/cesar/Documents/DEV/GIT/easygolf_dev/application/views/public.php:5