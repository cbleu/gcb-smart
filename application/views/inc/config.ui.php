<?php

//CONFIGURATION for SmartAdmin UI

//ribbon breadcrumbs config
//array("Display Name" => "URL");
// $breadcrumbs = array(
// 	"Home" => "/"
// );

/*navigation array config

ex:
"dashboard" => array(
	"title" => "Display Title",
	"url" => "http://yoururl.com",
	"url_target" => "_self",
	"icon" => "fa-home",
	"label_htm" => "<span>Add your custom label/badge html here</span>",
	"sub" => array() //contains array of sub items with the same format as the parent
)

*/

//configuration variables
// $page_title = "";
// $page_css = array();
$no_main_header = false; //set true for lock.php and login.php
$page_body_prop = array(
	// "class"=>"fixed-header fixed-navigation fixed-ribbon fixed-page-footer"

	// "class"=>"fixed-page-footer"

); //optional properties for <body>
$page_html_prop = array(); //optional properties for <html>
?>