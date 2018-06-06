<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/6/6
 * Time: 9:26
 */

namespace App\Http\Controllers;


use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    public function test()
    {
        return new JsonResponse(['test']);
    }
}