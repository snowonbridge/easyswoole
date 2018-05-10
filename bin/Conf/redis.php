<?php
/**
 * Created by PhpStorm.
 * User: nihao
 * Date: 2018/3/22
 * Time: 17:35
 */
return [
    'host' => '127.0.0.1', // redis主机地址
    'port' => 6379, // 端口
    'serialize' => false, // 是否序列化php变量
    'auth' => null, // 密码
    'pool' => [
        'min' => 5, // 最小连接数
        'max' => 100 // 最大连接数
    ],
    'errorHandler' => function(){
        return null;
    } // 如果Redis重连失败，会判断errorHandler是否callable，如果是，则会调用，否则会抛出异常，请自行try
];