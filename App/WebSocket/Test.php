<?php
/**
 * Created by PhpStorm.
 * User: nihao
 * Date: 2018/3/23
 * Time: 9:44
 */

namespace App\WebSocket;


use EasySwoole\Core\Socket\Response;
use EasySwoole\Core\Socket\WebSocketController;
use EasySwoole\Core\Swoole\Task\TaskManager;
use function foo\func;

class Test extends WebSocketController
{
    public function test()
    {
        $client = $this->client();
        $fd = $this->client()->getFd();
        $this->response()->write('asf');
        TaskManager::async(function()use($client){
            Response::response($client,"as");
        });
    }
}