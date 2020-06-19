<?php
class Loader
{
	public static function autoload($class_name)
	{
		$map = [
			'test'=>'./Test.php',
		];
		if($map[$class_name] && isset($map[$class_name])){
			// var_dump($map[$class_name]);die;
			require_once $map[$class_name];
		}
	}
	
}
?>