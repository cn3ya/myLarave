<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/6/4
 * Time: 12:35
 */

namespace App\Models;

use App\Events\Model\RetrievedEvent;
use \Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Facades\Cache;

class Model extends BaseModel
{
    public $timestamps = false;

    protected $dispatchesEvents = [
        'retrieved' => RetrievedEvent::class
    ];

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

    /**
     * @param $id
     * @return Model|mixed
     */
    static function getByIdUsingCache($id)
    {
        $model = new static();
        $key = "{$model->table}:{$id}";
        if(Cache::has($key)) {
            $data = Cache::pull($key);
            \Debugbar::addMessage("hint cache key={$key}");
        }else{
            $data = $model->find($id);
            \Debugbar::addMessage("miss cache key={$key}");
        }
        Cache::remember($key,1,function ()use($data){
            return $data;
        });
        return $data;
    }

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }


}