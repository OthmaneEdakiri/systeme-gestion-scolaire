<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->expectsJson()) {
                return response()->json(['message' => $e->getMessage()], 401);
            }

            // Check if user is authenticated with ANY guard
            $guards = ['admin', 'etudiant', 'enseignant'];
            $authenticatedGuard = null;

            foreach ($guards as $guard) {
                if (Auth::guard($guard)->check()) {
                    $authenticatedGuard = $guard;
                    break;
                }
            }

            // If user is authenticated with any guard, redirect to their dashboard
            if ($authenticatedGuard !== null) {
                return match ($authenticatedGuard) {
                    'admin' => redirect()->route('admin.dashboard'),
                    'enseignant' => redirect()->route('enseignant.dashboard'),
                    'etudiant' => redirect()->route('etudiant.dashboard'),
                    default => redirect('/'),
                };
            }

            // Store the intended URL in the session for unauthenticated users
            if (!$request->is('login')) {
                session()->put('url.intended', $request->fullUrl());
            }

            return redirect()->guest(route('login'));
        });
    })->create();
