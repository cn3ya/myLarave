<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/6/5
 * Time: 20:44
 */

namespace App\Http\Middleware;


use Closure;

class Validator
{
    public function handle($request, Closure $next, $guard = null)
    {
        $action = $request->route()->getActionName();
        $originCallable = explode('@',$action);
        $class = app(str_replace('Controllers','ControllerValidators',$originCallable[0]).'Validator');
        $method = $originCallable[1].'Validator';
        $callable = [$class,$method];
        if(is_callable($callable)){
            call_user_func($callable);
        }else{
            \Debugbar::addMessage('', 'mylabel');
        }
        return $next($request);
    }
}