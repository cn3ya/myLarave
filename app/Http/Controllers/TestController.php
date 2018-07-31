<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/6/6
 * Time: 9:26
 */

namespace App\Http\Controllers;


use App\Http\Actions\TestAction;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    public function test()
    {
        session(['test'=>'abc']);
        return new JsonResponse($this->request->session()->all());
    }

    public function test_action()
    {
        $action = new TestAction();
        $action->test();
    }
}