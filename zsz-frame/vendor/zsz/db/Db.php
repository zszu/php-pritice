<?php
/**
 * Db 类
 */

class Db 
{
	private static $instance = null; 
	private $connect = null;
	public $config  = [];

	private function __construct(){
	}

	public static function connect()
	{
		$config = require_once '/config/db.php';
		if(empty($config)){
			echo "数据库参数没有配置！";
		}

		try{
			$connect = new PDO($config['dsn'] , $config['username'] , $config['password']);
			echo "数据库连接成功。";
			$this->connect = $connect;

		}catch(PDOException $e){
			die('数据库连接失败 !'.$e->getMessage().'<br>');
		}
		
		
	}
	public static function getInstance(){
		if(!(self::$instance instanceof self)){
			self::$instance = new self();
		}
		return self::$instance;
	}
	public static function name($name){
		
	}
}
?>