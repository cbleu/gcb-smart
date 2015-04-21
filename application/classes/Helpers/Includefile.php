<?php defined('SYSPATH') or die('No direct script access.');

class Helpers_Includefile {
	private static $files = array();

	public static function add($file)
	{
		self::$files[] = $file;
	}

	public static function get()
	{
		return self::$files;
	}
}