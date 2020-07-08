<?php

/**
 * desc  回调函数
 */
//普通函数
function test($arg1,$arg2)
{
    echo __FUNCTION__.'exec,the args is:'.$arg1.' '.$arg2;
    echo "<br/>";
}
//通过call_user_func调用函数test
call_user_func('test','han','wen');
//通过call_user_func_array调用函数
call_user_func_array('test',array('han','wen'));

class A{

    public $name;
    function show($arg1){
        echo 'the arg is:'.$arg1."<br/>";
        // echo 'my name is:'.$this->name;
        echo "<br/>";
    }

    function show1($arg1,$arg2){
        echo __METHOD__.' exec,the args is:'.$arg1.' '.$arg2."<br/>";
    }

    public static function show2($arg1,$arg2){

        echo __METHOD__.' of class A exec, the args is:'.$arg1.' '.$arg2."<br/>";
    }
}


//调用类中非静态成员函数，该成员函数中有$this调用了对象中的成员
$a = new A;
$a->name = 'wen';
call_user_func_array(array($a,'show',),array('han!'));
//调用类中非静态成员函数，没有对象被创建，该成员函数中不能有$this  // 调用类中的动态方法，对象和方法必须通过数组形式传递
// call_user_func_array(array('A','show1',),array('han!','wen'));  //报错   Non-static method A::show1() should not be called statically 
// call_user_func([new A, 'show1'], 'han!', 'wen'); 
// call_user_func_array([new A, 'show1'], array('han!','wen')); 
//调用类中静态成员函数
call_user_func_array(array('A','show2'),array('argument1','argument2'));