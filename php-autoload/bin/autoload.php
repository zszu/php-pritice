<?php

spl_autoload_extensions('.php');
spl_autoload_register('autoload_class');

function autoload_class($class){

	 set_include_path("./");
	 echo '当前自动加载的类名为'.$class."<br><br>";
	 spl_autoload(strtolower($class));

}

?>