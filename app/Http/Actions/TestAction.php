<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/7/31
 * Time: 15:23
 */

namespace App\Http\Actions;


use App\Models\Employee;
use App\Models\EmployeeObserver;

class TestAction extends Action
{
    public function test()
    {
        Employee::observe(EmployeeObserver::class);
        $employee = Employee::find(10005);
        dd('test');
    }
}