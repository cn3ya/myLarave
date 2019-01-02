<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/6/4
 * Time: 12:29
 */

namespace App\Http\Controllers;


use App\Exceptions\RequestException;
use App\Lib\ResponseFormat;
use App\Models\Model;
use Illuminate\Http\JsonResponse;

class CURDController extends Controller
{
    /**
     * @param $modelName
     * @return Model
     * @throws RequestException
     */
    private function getModel($modelName)
    {
        $modelClassString = 'App\Models\\'.ucfirst($modelName);
        if(!class_exists($modelClassString)) {
            throw new RequestException('不存在模型:'.$modelClassString);
        }
        return app($modelClassString);
    }

    /**
     * @param $modelName
     * @return JsonResponse
     * @throws RequestException
     */
    public function getList($modelName)
    {
        $model = $this->getModel($modelName);
        $rawPerPage = $this->request->input('perPage');
        $perPage= $rawPerPage ? $rawPerPage : 20;
        $page = $this->request->input('page',1);
        $paginator = $model->paginate($perPage,['*'],'page',$page);
        !$rawPerPage || $paginator->appends('perPage',$perPage);
        $response = new ResponseFormat();
        $response->data = $paginator->items();
        $response->meta = [
            'type' => 'list',
            'perPage' => $perPage,
            'page' => $page,
            'next_page' => $paginator->nextPageUrl()
        ];
        return new JsonResponse($response);
    }

    /**
     * @param $modelName
     * @param $id
     * @return JsonResponse
     * @throws RequestException
     */
    public function getById($modelName, $id)
    {
        $model = $this->getModel($modelName);
//        dd($model->getDispatchesEvents());
        $response = new ResponseFormat();
        $response->data = $model::getByIdUsingCache($id);
        $response->meta = [
            'type' => 'object'
        ];
        return new JsonResponse($response);
    }

    /**
     * @param $modelName
     * @return JsonResponse
     * @throws RequestException
     * @throws \Throwable
     */
    public function create($modelName)
    {
        $model = $this->getModel($modelName);
        $exist = $model->find($this->request->input($model->getPrimaryKey()));
        if($exist) {
            throw new RequestException('记录已存在');
        }
        $model->fill($this->input->toArray());
        $model::saveWithTransaction($model);
        $response = new ResponseFormat();
        return new JsonResponse($response);
    }

    /**
     * @param $modelName
     * @return JsonResponse
     * @throws RequestException
     * @throws \Throwable
     */
    public function update($modelName)
    {
        $model = $this->getModel($modelName);
        $primaryKey = $model->getPrimaryKey();
        $primaryKeyValue = $this->request->input($primaryKey);
        $item = $model->find($primaryKeyValue);
        if(!$item) {
            throw new RequestException("不存在记录{$primaryKey}={$primaryKeyValue}");
        }
        $item->fill($this->request->input());
        $model::saveWithTransaction($item);
        $response = new ResponseFormat();
        return new JsonResponse($response);
    }

    /**
     * @param $modelName
     * @return JsonResponse
     * @throws RequestException
     * @throws \Throwable
     */
    public function delete($modelName)
    {
        $model = $this->getModel($modelName);
        $primaryKey = $model->getPrimaryKey();
        $primaryKeyValue = $this->request->input($primaryKey);
        $item = $model->find($primaryKeyValue);
        if(!$item) {
            throw new RequestException("不存在记录{$primaryKey}={$primaryKeyValue}");
        }
        $item->delete();
        $response = new ResponseFormat();
        return new JsonResponse($response);
    }

}