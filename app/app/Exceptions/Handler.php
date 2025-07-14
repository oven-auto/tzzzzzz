<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        
        $this->reportable(function (Throwable $e) {
            
        });
    }



    public function render($request, Throwable $exception)
    {  
        if ($exception instanceof ValidationException) {
           return response()->json($exception->errors(), 422);
        }

        return response()->json([
            'message' => 'Ошибка: '.$exception->getMessage(),
            'success' => 0,
            'error' => implode(', ', [
                'Фаил где поймал исключение: '.$exception->getFile(),
                'Cтрока с исключением: '.$exception->getLine(),
            ])
        ], 404);
    }
}
