<?php
namespace zsz\facades;

require_once dirname(dirname(__DIR__)).'/Test.php';
/**
 * facade 基础类
 */
abstract class BaseFacade
{
	public static $instance;

	public static function getFacadeRoot(){
		 return static::resolveFacadeInstance(static::getFacadeAccessor());
	}
	//子类返回类名
	public static function getFacadeAccessor(){
		// return get_called_class();
	}
	public static function resolveFacadeInstance($name){
		if(is_object($name)){
			return $name;
		}
		if(isset(self::$instance)){
			return self::$instance ;
		}
		var_dump($name);die;
		return self::$instance = new $name;
	}


	public static function __callStatic($method , $args){
		$instance = self::getFacadeRoot();
		if(!$instance){
			echo "A facade root has not been set.";
		}
	
		return call_user_func_array([$instance ,$method] , $args);
	}
	public function __call($method , $args){
		
		return '方法：'.$method.'不存在';
	}
}