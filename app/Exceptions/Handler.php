<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
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
            //return $this->handleException($e);
        });
        $this->renderable(function (Exception $e, $request) {
            return $this->handleException($request, $e);
        });
    }
    public function handleException($request, Exception $exception)
    {
        if ($exception instanceof AccessDeniedHttpException) {
            return response($exception->getMessage(), 403);
        }
    }
    // public function handleException($exception)
    // {
    //     if ($exception instanceof AccessDeniedHttpException) {
    //         return response($exception->getMessage(), 403);
    //     }
    // }
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('auth.login'));
    }
}
