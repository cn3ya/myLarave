<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/6/5
 * Time: 17:59
 */

namespace App\Http\Middleware;


use Closure;

class Test
{
    public function handle($request, Closure $next, $guard = null)
    {
        var_dump('test');
        return $next($request);
    }
}