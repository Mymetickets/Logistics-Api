<?php

use App\Class\ApiResponse;
use App\Enums\StatusCodeEnums;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
        $exceptions->render(function(HttpException $ex){
            $body = $ex->getHeaders();
            $code = $body["code"] ?? StatusCodeEnums::FAILED;
            $data = $body["data"] ?? [];
            $errors = $body["errors"] ?? [];
            return ApiResponse::custom($code, $ex->getMessage(), $data, $errors, 422);
        });
        $exceptions->render(function(ValidationException $ex){
            ApiResponse::failed($ex->getMessage(), [], $ex->errors(), 400);
        });
    })->create();
