<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * @param  \Exception  $exception
     * @return void
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
        /*
        * ModelnotFoundException    - modelo no encontrado
        * AuthorizationException    - usuario no autorizado
        * TokenMismatchException    - El toekn no llega en X formulario
        * FatalThrowableError       - No estamos mandando a traer un paquete o el constructor no funciona bien, otros.
        * getStatusCode() - 404, 401, 500, 405 -> http respones
        */

        if ($exception instanceof ModelNotFoundException) {
            $exception =  new NotFoundHttpException($exception->getMessage(), $exception);
        }elseif ($exception instanceof AuthorizationException) {
            return response()->view('errores.404', ['error' => 'Error'], 403);
        }elseif ($exception instanceof TokenMismatchException)
        {
            return response()->view('errores.404', ['error' => 'Error'], 419);
        } elseif ($exception instanceof \Symfony\Component\Debug\Exception\FatalThrowableError){
            return response()->view('errores.404', ['error' => $exception->getMessage()], 419); // en este tipo de mensaje viene el Query en SQL por lo cual se podría filtrar información, se recomienda usar: ['error' => 'Error 404, lo siento :( ']
        }

        if ($exception->getStatusCode() === 404) {  // modcapturamos el tipo de error y lo redirigimos a una de nuestras vistas
            return response()->view('errores.404', ['error' => 'Error 404, lo siento :( '], 404);
                                                // este arreglo nos permite mandar un mensaje de error, siempre que sea un arreglo asociativo
        }
        return parent::render($request, $exception);
    }
}
