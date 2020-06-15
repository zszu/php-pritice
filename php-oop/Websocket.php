<?php
class Websocket
{
    public function __construct($address ,$port)
    {
        $server = socket_create(AF_INET , SOCK_STREAM , SOL_TCP);
        socket_set_option($server , SOL_SOCKET , SO_REUSEADDR ,1);
        socket_bind($server, $address, $port);
        socket_listen($server);
        return $server;
    }
    function run(){
        while (true){
            $changes=$this->sockets;
            $write=NULL;
            $except=NULL;
            socket_select($change , $write,$except,NULL);
            foreach($changes as $sock){

                //如果有新的client连接进来，则
                if($sock==$this->master){

                    //接受一个socket连接
                    $client=socket_accept($this->master);

                    //给新连接进来的socket一个唯一的ID
                    $key=uniqid();
                    $this->sockets[]=$client;  //将新连接进来的socket存进连接池
                    $this->users[$key]=array(
                        'socket'=>$client,  //记录新连接进来client的socket信息
                        'shou'=>false       //标志该socket资源没有完成握手
                    );
                    //否则1.为client断开socket连接，2.client发送信息
                }else{
                    $len=0;
                    $buffer='';
                    //读取该socket的信息，注意：第二个参数是引用传参即接收数据，第三个参数是接收数据的长度
                    do{
                        $l=socket_recv($sock,$buf,1000,0);
                        $len+=$l;
                        $buffer.=$buf;
                    }while($l==1000);

                    //根据socket在user池里面查找相应的$k,即健ID
                    $k=$this->search($sock);

                    //如果接收的信息长度小于7，则该client的socket为断开连接
                    if($len<7){
                        //给该client的socket进行断开操作，并在$this->sockets和$this->users里面进行删除
                        $this->send2($k);
                        continue;
                    }
                    //判断该socket是否已经握手
                    if(!$this->users[$k]['shou']){
                        //如果没有握手，则进行握手处理
                        $this->woshou($k,$buffer);
                    }else{
                        //走到这里就是该client发送信息了，对接受到的信息进行uncode处理
                        $buffer = $this->uncode($buffer,$k);
                        if($buffer==false){
                            continue;
                        }
                        //如果不为空，则进行消息推送操作
                        $this->send($k,$buffer);
                    }
                }
            }
        }
    }


}