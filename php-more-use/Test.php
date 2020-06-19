<?php
class Test
{
	protected $c = '11';
	public function a()
	{
		// $this->a = 'a';
		return $this;
	}
	public function b(){
		// $this->b = 'b';
		return $this;
	}
	// public function __set($param , $val){
	// 	$this->$param = $val;
	// }
	// public function __get($param){
	// 	return $this->$param;
	// }
}
$t  = new Test();
// var_dump($t->c);
var_dump($t->b()->a());die;