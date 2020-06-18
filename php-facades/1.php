<?php

// require_once './bin/facades/BaseFacade.php';
// require_once './bin/facades/Test.php';
use  \zsz\facades\BaseFacade;
use  \zsz\facades\Test;


spl_autoload_extensions('.php');
// set_include_path(get_include_path().PATH_SEPARATOR."bin/");
spl_autoload_register('autoload_class');

function autoload_class($class){
	set_include_path("bin/");
	 echo '当前自动加载的类名为'.$class."<br><br>";

	 str_replace('\\', '/', $class);
	 str_replace('zsz', 'bin', $class);
	 var_dump($class);die;

	 spl_autoload($class);
	// require_once 'bin/facades/BaseFacade.php';
	// require_once  'bin/facades/Test.php';
}

$t = new Test();

echo Test::aa('b');