<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Listener;

use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Console\Advanced\Interact\Checkbox;
use Swoft\Consul\Agent;
use Swoft\Event\Annotation\Mapping\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Swoft\Server\SwooleEvent;
use Swoft\Config\Annotation\Mapping\Config;
/**
 * Class RegisterServiceListener
 *
 * @since 2.0
 *
 * @Listener(event=SwooleEvent::START)
 */
class RegisterServiceListener implements EventHandlerInterface
{
    /**
     * @Inject()
     *
     * @var Agent
     */
    private $agent;

    /**
     *@Config("consul.swoft_goods_server_name")
     *
     */
    private $serverName;


    /**
     * @param EventInterface $event
     */
    public function handle(EventInterface $event): void
    {
        $rpcServer = $event->getTarget();


        echo '获取注册服务id：';
        $id = getConsulServerId($this->serverName);
        echo $id.PHP_EOL;
        $service = [
            'ID'                => $id,
            'Name'              => $this->serverName,
            'Tags'              => [
                'rpc'
            ],
            'Address'           => env('HOST'),
            'Port'              => $rpcServer->getPort(),
            'Meta'              => [
                'version' => '1.0'
            ],
            'EnableTagOverride' => false,
            'Weights'           => [
                'Passing' => 10,
                'Warning' => 1
            ],
            'Check'=>[
                'name'=>'swoft.goods.server',
                env('CONSUL_CHECK_TYPE')=> env('CONSUL_CHECK_IP').':' .env('CONSUL_CHECK_PORT'),
                'interval'=>'5s', //没隔5s检测
                'timeout'=>'2s' //发送数据包，接收回复超时的时间
            ]
        ];

        // Register
        $this->agent->registerService($service);
        echo 'Swoft rpc register service success by consul!'."\n";
        //        CLog::info('Swoft http register service success by consul!');
    }
}
