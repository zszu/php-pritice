<?php

require_once './bin/facades/BaseFacade.php';
require_once './bin/facades/Test.php';
use  \zsz\facades\BaseFacade;
use  \zsz\facades\Test;

// spl_autoload_register('autoload_class');
// function autoload_class($class){
// 	 echo '当前自动加载的类名为'.$class."<br><br>";
// 	require_once  __DIR__.'/bin/facades/Test.php';
// 	require_once  __DIR__.'/bin/facades/Test.php';
// }

$t = new Test();
// var_dump($t);die;
echo Test::aa('b');