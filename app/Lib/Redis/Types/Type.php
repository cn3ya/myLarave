<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/7/30
 * Time: 15:27
 */

namespace App\Lib\Redis\Types;


class Type
{
    /**
     * @var string
     */
    protected $key;

    /**
     * RedisType constructor.
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

}