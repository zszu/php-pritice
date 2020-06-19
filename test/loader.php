<?php

class Loader {

    /**

    * 

自动加载类

    * @param $class 类名

    */

    public static function mods($class) {

        if($class){
		   set_include_path( "./mods/" );

		   spl_autoload_extensions( ".php" );

		   spl_autoload( strtolower($class) );

        }

    }

    public static function libs($class) {

  if($class){
	   set_include_path( "./libs/" );

	   spl_autoload_extensions( ".php" );

	   spl_autoload( strtolower($class) );

        }

    }

}

spl_autoload_register(array('Loader', 'mods'));

spl_autoload_register(array('Loader', 'libs'));

new inmod();

new inlib();