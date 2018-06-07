<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/6/4
 * Time: 12:35
 */

namespace App\Models;

use \Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    public $timestamps = false;
    /**
     * @param \Closure $closure
     * @throws \Throwable
     */
    static function transaction(\Closure $closure) {
        $db = app('db');
        try {
            $db->beginTransaction();
            $closure->call(app());
            $db->commit();
        }catch (\Throwable $throwable){
            $db->rollBack();
            throw $throwable;
        }
    }

    /**
     * @param Model $model
     * @throws \Throwable
     */
    static function saveWithTransaction(Model $model) {
        static::transaction(function()use($model){
            $model->save();
        });
    }

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }
}