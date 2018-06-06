<?php

namespace App\Exceptions;

use App\Lib\ResponseFormat;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof RequestException) {
            $responseFormat = new ResponseFormat();
            $responseFormat->code = $exception->getCode();
            $responseFormat->msg = $exception->getMessage();
            $response = new JsonResponse($responseFormat);
            if ((env('APP_DEBUG') || $request->input('debug'))
            ) {
                $debugData = app('debugbar')->getData();
                $debugData['request_parameter'] = $request->input();
                $debugData['cookie'] = $request->cookie();
                $response->setData($response->getData(true) + ['_debugbar' => $debugData]);
            }
            return $response;
        }

        return parent::render($request, $exception);
    }
}
