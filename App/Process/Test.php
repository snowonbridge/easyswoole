<?php
/**
 * Created by PhpStorm.
 * User: nihao
 * Date: 2018/3/23
 * Time: 10:15
 */

namespace App\Process;


use EasySwoole\Core\Component\Logger;
use EasySwoole\Core\Swoole\Process\AbstractProcess;
use EasySwoole\Core\Swoole\Process\ProcessManager;
use EasySwoole\Core\Swoole\Time\Timer;
use Swoole\Process;

class Test extends AbstractProcess
{
    public  function run(Process $process)
    {
       Timer::loop(2000,function (){
           Logger::getInstance()->console("loggedr");
//           ProcessManager::getInstance()->writeByProcessName($this->getProcessName(),time());
       });
    }
    public  function onShutDown()
    {
        Logger::getInstance()->console("end ");
    }
    public  function onReceive(string $str,...$args)
    {
        Logger::getInstance()->console("receive $str");
    }

}