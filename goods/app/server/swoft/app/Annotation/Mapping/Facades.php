<?php
namespace App\Annotation\Mapping;

use Doctrine\Common\Annotations\Annotation\Attribute;
use Doctrine\Common\Annotations\Annotation\Attributes;

/**
 * Class Facades
 *
 * @since 2.0
 *
 * @Annotation  //声明这是一个注解类
 * @Target("CLASS") //声明这个注解只可用在class级别的注释中
 * @Attributes({
 *     @Attribute("alias",type="string")
 * })
 */
class Facades
{
    /**
     * @var string
     */
    private $alias = '';

    /**
     * StringType constructor.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        if (isset($values['value'])) {
            $this->message = $values['value'];
        }
        if (isset($values['alias'])) {
            $this->alias = $values['alias'];
        }
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }
}
