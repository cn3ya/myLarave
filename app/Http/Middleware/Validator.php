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
        $method = $originCallable[1].'Validator';
        $validatorClassName = str_replace('Controllers','ControllerValidators',$originCallable[0]).'Validator';
        if(class_exists($validatorClassName)) {
            $class = app(str_replace('Controllers','ControllerValidators',$originCallable[0]).'Validator');
            $callable = [$class,$method];
        }else{
            $callable = [];
        }
        if(is_callable($callable)){
            call_user_func($callable);
        }else{
            \Debugbar::addMessage('No exist Validator: '.$validatorClassName.'@'.$method);
        }
        return $next($request);
    }
}