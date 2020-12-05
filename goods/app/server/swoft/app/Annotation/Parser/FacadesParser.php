<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Annotation\Parser;

use ReflectionException;
use Swoft\Annotation\Annotation\Mapping\AnnotationParser;
use Swoft\Annotation\Annotation\Parser\Parser;
use App\Annotation\Mapping\Facades;
use Swoft\Validator\Exception\ValidatorException;
use Swoft\Validator\ValidatorRegister;

/**
 * Class FacadesParser
 *
 * @AnnotationParser(annotation=Facades::class) // 参数值写上注解类
 */
class FacadesParser extends Parser
{
    /**
     * @param int $type
     * @param object $annotationObject
     *
     * @return array
     * @throws ReflectionException
     * @throws ValidatorException
     */
    public function parse(int $type, $annotationObject): array
    {
        var_dump($annotationObject);
        // 可以获取到目标类Calculate，用$this->className获取
        // 可以获取到注解类对象$annotationObject
        // 这里是把目标类Calculate怎么变成门面的流程，我也没有实现，有兴趣的可以自己写一个
        return [];
    }
}
