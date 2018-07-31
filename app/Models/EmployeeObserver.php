<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/7/31
 * Time: 15:44
 */

namespace App\Models;


class EmployeeObserver
{
    public function retrieved(Employee $employee)
    {
        dd($employee);
    }
}