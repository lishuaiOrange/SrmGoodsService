<?php

namespace App\Rpc\Lib;

/**
 * Interface DemoInterface
 */
interface DemoInterface{
    /**
     * @return array
     * @param int $id
     */
    public function getLists(int $id): array ;

    /**
     * @return string
     */
    public function getBig():string ;
}
