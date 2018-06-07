<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/6/5
 * Time: 20:42
 */

namespace App\Http\ControllerValidators;


use App\Exceptions\RequestException;

class CURDControllerValidator extends RequestValidator
{
    /**
     * @throws RequestException
     */
    public function getListValidator()
    {
//        throw new RequestException('托尔斯泰');
    }
}