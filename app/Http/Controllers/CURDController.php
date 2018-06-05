<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/6/4
 * Time: 12:29
 */

namespace App\Http\Controllers;


use App\Models\Employee;
use Illuminate\Http\JsonResponse;

class CURDController extends Controller
{
    public function getList($model) {
        return new JsonResponse(Employee::find(110085));
    }
}