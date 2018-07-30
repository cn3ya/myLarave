<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/7/30
 * Time: 15:30
 */

namespace App\Lib\Redis\Types;


use Illuminate\Support\Facades\Redis;

class RedisString extends Type
{
    public function get()
    {
        return Redis::get($this->key);
    }
}