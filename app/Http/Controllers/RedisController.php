<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/7/30
 * Time: 15:25
 */

namespace App\Http\Controllers;


use App\Lib\Redis\Types\Hash;
use App\Lib\Redis\Types\RedisString;
use App\Lib\ResponseFormat;
use Illuminate\Http\JsonResponse;

class RedisController extends Controller
{
    public function getString($key)
    {
        $string = new RedisString($key);
        $response = new ResponseFormat($string->get());
        return new JsonResponse($response);
    }

    public function getHashAll($key)
    {
        $hash = new Hash($key);
        $response = new ResponseFormat($hash->getAll());
        return new JsonResponse($response);
    }

    public function getHashById($key,$id)
    {
        $hash = new Hash($key);
        $response = new ResponseFormat($hash->getById($id));
        return new JsonResponse($response);
    }
}