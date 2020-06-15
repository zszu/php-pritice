<?php
class TestClass
{
    public $pubilc_param;
    protected $protected_param;
    private $private_param;

}
class Test2 extends TestClass{
    public $_params = [];
    //访问类中 没有的属性时
    function  __get($attr){
        if(!isset( $this->_params[$attr])){
            $this->_params[$attr] = $attr;
        }
        return $this->_params[$attr] ?? null;
    }
    public static function className(){
        return __CLASS__;
    }
    public  function  test3($attr){
        return $attr;
    }
    public function test($argmnt){
        //内部调用 回调函数
        $res = call_user_func(['Test2','test3'] ,$argmnt);
        $res = call_user_func_array([self::className() , 'test3'] ,[$argmnt]);
        return $res;
    }

}

$t = new Test2();

//var_dump(call_user_func([new Test2,'test3'] ,['22']));die;
$a = '2222';
var_dump($t->test($a));die;