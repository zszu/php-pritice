<?php
/**
 * Db 类
 */

class Db 
{
	
	public $config  = [];

	public static function connect()
	{
		$config = require_once '/config/db.php';
		
	}
}
?>