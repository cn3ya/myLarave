<?php
/**
 * Created by PhpStorm.
 * Date: 2019/1/2
 * Time: 12:07
 */

namespace App\Models;


class Json extends Model
{
    protected $table = 'json';

    public $casts = [
        'data' => 'object'
    ];
}