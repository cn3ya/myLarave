<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/6/4
 * Time: 12:34
 */

namespace App\Models;


class Employee extends Model
{
    protected $table = 'employees';

    protected $primaryKey = 'emp_no';

    function salary()
    {
        return $this->hasMany(Salary::class,'emp_no','emp_no');
    }

    function title()
    {
        return $this->hasMany(Title::class,'emp_no','emp_no');
    }

    function department()
    {
        return $this->belongsToMany(Department::class,'dept_emp','emp_no','dept_no');
    }
}