<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/1/9
 * Time: 下午1:04
 */

namespace EasySwoole;

use App\HttpController\Router;
use App\HttpController\Test2;
use App\Process\Inotify;
use App\Process\Test;
use App\Sock\Parser\WebSock;
use \EasySwoole\Core\AbstractInterface\EventInterface;
use EasySwoole\Core\Component\Di;
use EasySwoole\Core\Component\Logger;
use EasySwoole\Core\Component\Rpc\Common\Parser;
use EasySwoole\Core\Component\SysConst;
use EasySwoole\Core\Swoole\EventHelper;
use EasySwoole\Core\Swoole\Process\ProcessManager;
use \EasySwoole\Core\Swoole\ServerManager;
use \EasySwoole\Core\Swoole\EventRegister;
use \EasySwoole\Core\Http\Request;
use \EasySwoole\Core\Http\Response;
use EasySwoole\Core\Utility\File;
use EasySwoole\Whoops\Runner;
use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Protocol\TJSONProtocol;
use Thrift\Server\TSimpleServer;
use Thrift\TMultiplexedProcessor;
use Whoops\Handler\PrettyPageHandler;

Class EasySwooleEvent implements EventInterface {

    public function frameInitialize(): void
    {
        // TODO: Implement frameInitialize() method.
        date_default_timezone_set('Asia/Shanghai');

//        $this->loadConf(EASYSWOOLE_ROOT . '/Conf');
//        $dbConf = Config::getInstance()->getConf('database');
//         全局初始化
//        Db::setConfig($dbConf);
//        Di::getInstance()->set( SysConst::HTTP_EXCEPTION_HANDLER,Test2::class );
        // 可以进行更多设置，默认为以下设置,以页面展示错误异常
        $options = [
            'auto_conversion' => true,                    // 开启AJAX模式下自动转换为JSON输出
            'detailed'        => true,                    // 开启详细错误日志输出
            'information'     => '发生内部错误,请稍后再试'   // 不开启详细输出的情况下 输出的提示文本
        ];
        $whoops  = new Runner($options);
        // 注册异常事件处理
        $whoops->pushHandler(new PrettyPageHandler());
        $whoops->register();
    }

    public function mainServerCreate(ServerManager $server,EventRegister $register): void
    {
        // TODO: Implement mainServerCreate() method.
//        EventHelper::registerDefaultOnMessage($register,new WebSock());
//        $register->add(EventRegister::onWorkerStart,function (\swoole_server $server,int $workerId){
//            var_dump($workerId.'start');
//        });
//        ProcessManager::getInstance()->addProcess('easy_test',Test::class);
         $tcp = $server->addServer('easy_test',9502);
         $tcp->set($tcp::onReceive,function (\swoole_server $server,int $fd,int $reactor_id,string $data){
                $handler = new
                $tm = new TMultiplexedProcessor();
                $protocol = new TJSONProtocol();
                $s = new TSimpleServer();
                $s->serve();
         });
//        ProcessManager::getInstance()->addProcess('autoReload',Test::class);


    }

    public function onRequest(Request $request,Response $response): void
    {
        // TODO: Implement onRequest() method.

        $response->write("terminate");
//        $response->end();
    }

    public function afterAction(Request $request,Response $response): void
    {
        // TODO: Implement afterAction() method.
        $response->write($request->getRequestTarget());
    }
    public function loadConf($dir):void
    {
        $files = File::scanDir(EASYSWOOLE_ROOT.'/Conf');
    }
}