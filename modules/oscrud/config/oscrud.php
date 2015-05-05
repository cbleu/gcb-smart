<?php defined('SYSPATH') or die('No direct script access.');

return array
(
	//For view all the languages go to the folder assets/oscrud/languages/
	'oscrud_default_language'	=> 'french',

	// There are only three choices: "uk-date" (dd/mm/yyyy), "us-date" (mm/dd/yyyy) or "sql-date" (yyyy-mm-dd) 
	'oscrud_date_format'		=> 'sql-date',

	// The default per page when a user firstly see a list page
	'oscrud_default_per_page'	=> 50, //Can only take values 10,25,50,100
	
	'oscrud_file_upload_allow_file_types'		=> 'gif|jpeg|jpg|png|tiff|doc|docx|txt|odt|xls|xlsx|pdf|ppt|pptx|pps|ppsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|flv|avi|mpg|ogv|3gp|3g2',
	'oscrud_file_upload_max_file_size' 			=> '20MB', //ex. '10MB' (Mega Bytes), '1067KB' (Kilo Bytes), '5000B' (Bytes)
	
	//You can choose 'ckeditor','tinymce' or 'markitup'
	'oscrud_default_text_editor' => 'ckeditor',
	//You can choose 'minimal' or 'full'
	'oscrud_text_editor_type' 	=> 'full', 
	
	//The character limiter at the list page, zero(0) value if you don't want character limiter at your list page
	'oscrud_character_limiter' 	=> 50,
	
	'language_alias' => array(
		'afrikaans'		=> 'af',
		'arabic'		=> 'ar', // Timepicker is not avaliable yet
		'bengali'		=> 'bn', // Timepicker is not avaliable yet
		'bulgarian'		=> 'bg',
		'chinese'		=> 'zh-cn',
		'czech'			=> 'cs',
		'danish'		=> 'da', // Timepicker is not avaliable yet
		'dutch'			=> 'nl',
		'french'		=> 'fr',
		'german'		=> 'de',
		'greek'			=> 'el',
		'hungarian'		=> 'hu',
		'indonesian'	=> 'id',
		'italian'		=> 'it',
		'japanese'		=> 'ja',
		'korean'		=> 'ko',
		'persian'		=> 'fa', // Timepicker is not avaliable yet
		'polish'		=> 'pl',
		'pt-br.portuguese'	=> 'pt-br',
		'pt-pt.portuguese'	=> 'pt',
		'romanian'		=> 'ro',
		'russian'		=> 'ru',
		'slovak'		=> 'sk',
		'spanish'		=> 'es',
		'thai'			=> 'th', // Timepicker is not avaliable yet
		'turkish'		=> 'tr',
		'ukrainian'		=> 'uk',
		'vietnamese'	=> 'vi'
	),
);

