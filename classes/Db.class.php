<?php

	class Db
	{
		private static $db; // static = wijzigt niet per object
		public static function getInstance()
		{
			//static wilt zeggen: geen object nodig om aan te roepen
			if( self::$db === null)
			{
				self::$db = new PDO('mysql:host=localhost; dbname=phpproject','root', 'root');
				return self::$db;
			}
			else
			{
				return self::$db;
			}
		}
	}