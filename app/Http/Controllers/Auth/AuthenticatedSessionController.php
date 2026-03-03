<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): RedirectResponse|View
    {
        foreach (['admin', 'enseignant', 'etudiant'] as $guard) {
            if (Auth::guard($guard)->check()) {
                return match ($guard) {
                    'admin' => redirect()->route('admin.dashboard'),
                    'enseignant' => redirect()->route('enseignant.dashboard'),
                    'etudiant' => redirect()->route('etudiant.dashboard'),
                };
            }
        }
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $guard = $request->getGuard();

        return match ($guard) {
            'admin' => redirect()->route('admin.dashboard'),
            'enseignant' => redirect()->route('enseignant.dashboard'),
            'etudiant' => redirect()->route('etudiant.dashboard'),
            default => redirect('/'),
        };
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        foreach (['admin', 'enseignant', 'etudiant'] as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
            }
        }

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
