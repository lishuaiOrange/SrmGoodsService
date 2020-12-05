<?php
namespace App\Rpc\Service;

use App\Rpc\Lib\DemoInterface;
use Swoft\Rpc\Server\Annotation\Mapping\Service;

/**
 * Class DemoService
 *
 * @Service(version="1.2") //定义版本1.2
 *
 */
class DemoServiceV2 implements DemoInterface{

    /**
     * @param int $id
     * @return array
     */
    public function getLists(int $id): array
    {
        // TODO: Implement getLists() method.

        return ["id" => $id, "ver" => "1.2"];
    }

    /**
     * @return string
     */
    public function getBig(): string
    {
        // TODO: Implement getBig() method.

        return "dddd_V2";
    }
}
