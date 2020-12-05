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
exec('sh /var/www/init.sh',$out,$status);
echo $status.PHP_EOL;

// $loader->addPsr4('Swoft\\Cache\\', 'vendor/swoft/cache/src/');
