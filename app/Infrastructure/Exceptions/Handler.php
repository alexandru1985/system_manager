<?php

namespace App\Infrastructure\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e): JsonResponse 
    {
        if ($e instanceof ModelNotFoundException) {
            return response()->json(
                [
                    'message' => $this->modelName($e). ' not found. Please change the id from request.'
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        return parent::render($request, $e);
    }

    private function modelName(ModelNotFoundException $exception): string
    {
        return class_basename($exception->getModel());
    }
}
