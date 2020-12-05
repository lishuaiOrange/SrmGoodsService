<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Controller;

use App\Model\Data\GoodsData;
use Swoft;
use Swoft\Db\DB;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Redis\Redis;
use Swoft\View\Renderer;
use Throwable;
use function bean;
use function context;
use App\Model\Logic\ConsulLogic;

use ReflectionException;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Consul\Agent;
use Swoft\Consul\Catalog;
use Swoft\Consul\Exception\ClientException;
use Swoft\Consul\Exception\ServerException;
use Swoft\Consul\Health;
use Swoft\Consul\KV;
use Swoft\Consul\Session;
use App\Util\Dome;

/**
 * Class IndexController
 * @package App\Http\Controller
 * @Controller(prefix="/swoft_index")
 */
class IndexController{

    /**
     *
     * Route::get('test', 'IndexController@test')->prefix('swoft_index');
     *
     * @RequestMapping("test")
     * @throws \Swoft\Exception\SwoftException
     */
    public function test(){

        // return "shineyork 666";

        $shell = "ip addr";
        exec($shell, $result, $status);
        return $result;
    }

    /**
     * @RequestMapping("index")
     * @throws \Swoft\Exception\SwoftException
     */
    public function index(){
        $res = Context()->getResponse();

        $data = ['name'=>'Swoft2.0.2222'];
        // return $res->withData($data);
        return "ok";
    }


    /**
     * @RequestMapping("testMysql")
     * @throws \Swoft\Exception\SwoftException
     */
    public function testMysql(){

        $result = DB::table('test')->limit(2)->offset(3)->get()->all();
        return $result;
    }


    /**
     * @RequestMapping("testRedis")
     * @throws \Swoft\Exception\SwoftException
     */
    public function testRedis(){

        $result = Redis::set("test_key","test_value");

        $keyVal = Redis::get("test_key");

        return [
            $result,
            $keyVal
        ];
    }

    /**
     * @RequestMapping("testConsul")
     * @throws \Swoft\Exception\SwoftException
     */
    public function testConsul(){
        $ConsulLogic = new ConsulLogic();
        $ConsulLogic->kv();
    }

    /**
     * @RequestMapping("kv")
     * @throws \Swoft\Exception\SwoftException
     */
    public function kv(): void
    {
        $a = new KV();
        $value = 'value content';
        $a->put('/test/my/key', $value);

        $response = $a->get('/test/my/key');
        var_dump($response->getBody(), $response->getResult());
    }
}
