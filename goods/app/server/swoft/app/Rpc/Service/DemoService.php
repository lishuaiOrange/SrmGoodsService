<?php
namespace App\Rpc\Service;

use App\Rpc\Lib\DemoInterface;
use Swoft\Rpc\Server\Annotation\Mapping\Service;

/**
 * Class DemoService
 *
 * @Service(version="1.0") //定义版本
 *
 */
class DemoService implements DemoInterface{
    /**
     * @param int $id
     * @return array
     */
    public function getLists(int $id): array
    {
        // TODO: Implement getLists() method.

        return ["id" => $id];
    }

    /**
     * @return string
     */
    public function getBig(): string
    {
        // TODO: Implement getBig() method.

        return "ddddddd";
    }
}
