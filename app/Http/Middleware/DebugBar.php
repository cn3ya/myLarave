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

class DebugBar
{
    public function handle($request, Closure $next, $guard = null)
    {
        $response = $next($request);
        if ($response instanceof JsonResponse && (env('APP_DEBUG') || $request->input('debug'))
        ) {
            $debugData = app('debugbar')->getData();
            $debugData['request_parameter'] = $request->input();
            $debugData['cookie'] = $request->cookie();
            $response->setData($response->getData(true) + ['_debugbar' => $debugData]);
        }

        return $response;
    }
}