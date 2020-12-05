<?php
namespace App\Http\Controller;

use App\Rpc\Lib\DemoInterface;
use Exception;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Rpc\Client\Annotation\Mapping\Reference;

/**
 * Class RpcClientController
 *
 * @Controller(prefix="/rpcApi") //定义路由
 *
 */
class RpcClientController{
    /**
     * @Reference(pool="user.pool")   //pool 指定使用那个服务的连接池(使用那个服务),version 指定服务的版本
     *
     * @var DemoInterface
     */
    private $userSer;

    /**
     * @Reference(pool="user.pool", version="1.2") //pool 指定使用那个服务的连接池(使用那个服务),version 指定服务的版本
     *
     * @var DemoInterface
     */
    private $userSerV2;

    /**
     * @RequestMapping("rpcV1")   //访问路由 /rpcApi/recV1/
     */
    public function getRpcApiV1(): array {
        $result = $this->userSer->getLists(21);   //调用1.0版本接口
        $resultV2 = $this->userSerV2->getLists(33);  //调用1.2版本接口

        return [$result,$resultV2];
    }

    /**
     * @return array
     * @RequestMapping("rpcV2")
     */
    public function getBigString(): array {
        $bigV1 = $this->userSer->getBig();
        $bigV2 = $this->userSerV2->getBig();

        return [strlen($bigV1),strlen($bigV2)];
    }
}
