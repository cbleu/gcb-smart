<?php defined('SYSPATH') or die('No direct script access.');

class Settings {

	protected static $settings = array();
	protected static $defaults = array();

	public static function get($key = NULL)
	{
		// Lazy loading settings from database
		if (empty(self::$settings))
		{
			$connection = DB_Connection_Pool::instance()->get_connection('default');
			$settings = $connection->query('SELECT * FROM `settings`');
			
			//print_r($settings);
			foreach ($settings as $setting)
			{
				self::$settings[$setting['key']] = $setting['value'];
				self::$defaults[$setting['key']] = $setting['default'];
			}

			unset($settings);
		}

		if (isset($key))
		{
			return Arr::get(self::$settings, $key)
				? Arr::get(self::$settings, $key)
				: Arr::get(self::$defaults, $key);
		}
		else
		{
			foreach (self::$settings as $key => $value)
			{
				$settings[$key] = Settings::get($key);
			}

			return $settings;
		}
	}

}