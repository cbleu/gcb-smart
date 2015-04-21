<?php defined('SYSPATH') or die('No direct script access.');

class Helpers_InputForJs{
	private static $items = array();

	public static function add($key, $item)
	{
		self::$items[$key] = $item;
	}

	public static function get()
	{
		return self::$items;
	}
}