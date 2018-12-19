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
    protected function __construct() {}

    static function getInstanceByArray(array $data)
    {
        $json = json_encode($data);
        return static::getInstanceByJSON($json);
    }

    static function getInstanceByJSON($json)
    {
        $object = json_decode($json);
        $originSerial = serialize($object);
        $className = static::class;
        $classNameLength = strlen($className);
        $finalSerial = str_replace('O:8:"stdClass":',"O:{$classNameLength}:\"{$className}\":",$originSerial);
        return unserialize($finalSerial);
    }

    public function get($key,$default=null)
    {
        $data = $this;
        foreach (explode('.', $key) as $segment) {
            if (property_exists($data, $segment)) {
                $data = $data->{$segment};
            } else {
                return value($default);
            }
        }

        return $data;
    }

    /**
     * @param $key
     * @return mixed
     * @throws RequestException
     */
    public function mustGet($key)
    {
        $data = $this;
        $usedKey = [];
        foreach (explode('.', $key) as $segment) {
            $usedKey[] = $segment;
            if (property_exists($data, $segment)) {
                $data = $data->{$segment};
            } else {
                $currentKey = implode('.',$usedKey);
                throw new RequestException("{$currentKey}不能为空");
            }
        }
        return $data;
    }

}