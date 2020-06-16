<?php

// require_once __DIR__.'/Test.php';
use zsz\Test as T;

/**
 * 
 */
class Test 
{
	public  function getName()
	{
		return 'Test';
	}
	
}
spl_autoload_register('autoload_class');
function autoload_class($class){
	 echo '当前自动加载的类名为'.$class."<br><br>";
	require_once  __DIR__.'/Test.php';
}
// var_dump(__DIR__);
$T = new T();
$a = $T->getName();
var_dump($a);die;