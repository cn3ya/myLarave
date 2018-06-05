<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/6/5
 * Time: 17:37
 */

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DebugBar
{
    public function handle($request, Closure $next, $guard = null)
    {
        $response = $next($request);

        if (
            $response instanceof JsonResponse &&
            app()->bound('debugbar') &&
            app('debugbar')->isEnabled() &&
            is_object($response->getData())
        ) {
            $debugData = app('debugbar')->getData();
            $debugData['request_parameter'] = app(Request::class)->input();
            $debugData['cookie'] = app(Request::class)->cookie();
            $response->setData($response->getData(true) + ['_debugbar' => $debugData]);
        }

        return $response;
    }
}