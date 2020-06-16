<?php

/**
 * 
 */
class App 
{
	
	public static function main($class)
	{
		self::register($class);
	}
	public static function register(){
		spl_autoload_register("App::loadClass");
	}
	public static function loadClass($class){
		$class = str_replace('\\', '/', $class);
		require_once __DIR__.'/'.$class.'.php';

	}
}

App::main();