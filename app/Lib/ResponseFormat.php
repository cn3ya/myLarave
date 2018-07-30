<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/6/5
 * Time: 20:04
 */

namespace App\Lib;


class ResponseFormat
{
    public $code=0;

    public $msg='ok';

    public $data=null;

    public $meta=null;

    /**
     * ResponseFormat constructor.
     * @param null $data
     */
    public function __construct($data=null)
    {
        $this->data = $data;
    }

}