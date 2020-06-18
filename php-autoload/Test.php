<?php


spl_autoload_extensions('.php');
// set_include_path(get_include_path().PATH_SEPARATOR."bin/");
spl_autoload_register('autoload_class');

function autoload_class($class){
	 set_include_path("bin/");
	 echo '当前自动加载的类名为'.$class."<br><br>";
	 spl_autoload($class);

}
var_dump(new Test());

?>