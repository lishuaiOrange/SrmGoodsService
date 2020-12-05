<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

function user_func(): string
{
    return 'hello';
}
if (!function_exists('getConsulServerId')) {
    /**
     * @param string $key
     *
     * @return string
     */
    function getConsulServerId($serveName): string
    {
        $host = explode('.', env('host'));
        return $serveName."_".$host[0].'_'.$host[3];
    }
}
