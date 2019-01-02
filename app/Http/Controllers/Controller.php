<?php

namespace App\Http\Controllers;

use App\Lib\ValueObject;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var ValueObject
     */
    protected $input;

    /**
     * Controller constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        if ($request->getMethod() === 'POST') {
            $this->input = ValueObject::getInstanceByJSON($request->getContent());
        } else {
            $this->input = ValueObject::getInstanceByJSON('{}');
        }
        $this->input->addExtraArray($request->query());
        $this->middleware('validator');
        $this->middleware('debugBar');
    }
}
