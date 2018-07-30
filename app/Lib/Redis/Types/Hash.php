<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/7/30
 * Time: 15:27
 */

namespace App\Lib\Redis\Types;


use Illuminate\Support\Facades\Redis;

class Hash extends Type
{
    public function getAll()
    {
        return Redis::hgetall($this->key);
    }

    public function getById($id)
    {
        return Redis::hget($this->key,$id);
    }

}