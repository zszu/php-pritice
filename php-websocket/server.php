<?php


//传相应的IP与端口进行创建socket操作
function WebSocket($address , $port){
    $server = socket_create(AF_INET , SOCK_STREAM , SOL_TCP);
    socket_set_option($server , SOL_SOCKET ,SO_REUSEADDR ,1); //1 表示接受所有数据包
    socket_bind($server , $address , $port);
    socket_listen($server);
    return $server;
}
function run(){
    while (true){
        $changes = $this->sockets;
        $write = null;
        $except = null;

    }
}
