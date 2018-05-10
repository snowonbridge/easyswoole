<?php
/**
 * Created by PhpStorm.
 * User: nihao
 * Date: 2018/3/21
 * Time: 14:57
 */

namespace App\HttpController;
use EasySwoole\Core\AbstractInterface\LoggerWriterInterface;
use EasySwoole\Core\Component\Logger;
use EasySwoole\Core\Http\AbstractInterface\Controller;
use EasySwoole\Core\Http\AbstractInterface\ExceptionHandlerInterface;
use EasySwoole\Core\Http\Request;
use EasySwoole\Core\Http\Response;
use EasySwoole\Core\Swoole\ServerManager;
use EasySwoole\Core\Swoole\Task\TaskManager;
use EasySwoole\Core\Utility\Curl\Field;
use EasySwoole\Core\Utility\Random;
use think\Exception;

class Test2 extends Controller  {

    public function index()
    {
        // TODO: Implement index() method.
    }

    function test()
    {

//        Random::randStr(23);
//        $request = new \EasySwoole\Core\Utility\Curl\Request();
//        $request->addGet(new Field('a',1));
//        $request->exec();

//        TaskManager::async(function (){
//            sleep(4);
//            var_dump('this is async task');
//        });
       $this->response()->write("112121test21");
    }





}
