<?php
/**
 * Created by PhpStorm.
 * User: nihao
 * Date: 2018/3/21
 * Time: 14:57
 */

namespace App\HttpController;
use EasySwoole\Core\Component\Di;
use EasySwoole\Core\Http\AbstractInterface\Controller;
use EasySwoole\Core\Swoole\Coroutine\PoolManager;
use think\Db;

class Test3 extends Controller{

    function index()
    {
        $this->response()->write('Hello easyS3232333');

        $this->response()->end();
    }





}