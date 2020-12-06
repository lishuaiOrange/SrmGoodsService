<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require dirname(__DIR__) . '/vendor/autoload.php';
echo '执行获取host地址脚本'.PHP_EOL;

// php swoft/bin/swoft rpc:start ext_init=-ip:192.168.145.128?-t:tcp?-p:18317?

echo "获取的命令".$argv[$argc - 1]."\n";

$retCall = " ";
if ($extInitCalls = strstr($argv[$argc - 1], 'ext_init')) {
    $initCalls = (explode('=', $extInitCalls))[1];
    if ($calls = strstr($initCalls, '?')) {
        $calls = explode('?', $initCalls);
        foreach ($calls as $key => $call) {
            $retCall .= str_replace(":"," ", $call)." ";
        }
    } else {
        $retCall .= str_replace(":"," ", $initCalls)." ";
    }
}
//var_dump($argv);

echo '拼接结果'.PHP_EOL;
echo $retCall;

exec('sh /var/www/init.sh '.$retCall, $out, $status);

echo $status.PHP_EOL;

// $loader->addPsr4('Swoft\\Cache\\', 'vendor/swoft/cache/src/');
