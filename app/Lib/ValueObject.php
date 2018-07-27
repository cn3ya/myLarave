<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/7/27
 * Time: 12:29
 */

namespace App\Lib;


use App\Exceptions\RequestException;

class ValueObject
{
    private $data = [];

    /**
     * ValueObject constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function get($key,$default=null)
    {
        if(array_key_exists($key,$this->data)) {
            return $this->data[$key];
        }else{
            return $default;
        }
    }

    /**
     * @param $key
     * @return mixed
     * @throws RequestException
     */
    public function mustGet($key)
    {
        if(array_key_exists($key,$this->data)) {
            return $this->data[$key];
        }else{
            throw new RequestException("{$key}不能为空");
        }
    }

    public function all()
    {
        return $this->data;
    }

}