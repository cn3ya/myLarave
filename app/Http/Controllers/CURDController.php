<?php
/**
 * Created by PhpStorm.
 * User: liangjw01
 * Date: 2018/6/4
 * Time: 12:29
 */

namespace App\Http\Controllers;


use App\Events\TestEvent;
use App\Exceptions\RequestException;
use App\Lib\ResponseFormat;
use Illuminate\Http\JsonResponse;

class CURDController extends Controller
{
    /**
     * @param $modelName
     * @return \Illuminate\Foundation\Application|mixed
     * @throws RequestException
     */
    private function getModel($modelName)
    {
        $modelClassString = 'App\Models\\'.ucfirst($modelName);
        if(!class_exists($modelClassString)) {
            throw new RequestException('不存在模型:'.$modelClassString);
        }
        event(new TestEvent());
        return app($modelClassString);
    }

    /**
     * @param $model
     * @return JsonResponse
     * @throws RequestException
     */
    public function getList($modelName)
    {
        $model = $this->getModel($modelName);
        $rawPerPage = $this->request->input('perPage');
        $perPage= $rawPerPage ? $rawPerPage : 20;
        $page = $this->request->input('page',1);
        $paginator = $model::paginate($perPage,['*'],'page',$page);
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
        $response = new ResponseFormat();
        $response->data = $model::find($id);
        $response->meta = [
            'type' => 'object'
        ];
        return new JsonResponse($response);
    }

    public function create($modelName)
    {
        dd(__METHOD__);
    }

    public function update($modelName)
    {
        dd(__METHOD__);
    }

    public function delete($modelName)
    {
        dd(__METHOD__);
    }

}