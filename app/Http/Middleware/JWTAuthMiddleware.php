<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;

class JWTAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Get token from Authorization header
        $token = $request->bearerToken();

        if (!$token) {
            // Check if token is in session (for Blade forms)
            $token = session('jwt_token');
        }

        if (!$token) {
            return redirect()->route('login')->with('error', 'Token not found. Please login.');
        }

        try {
            // Parse and validate the token
            JWTAuth::setToken($token)->authenticate();

            // Set the token for this request
            JWTAuth::setToken($token);
        } catch (JWTException $e) {
            return redirect()->route('login')->with('error', 'Invalid or expired token.');
        }

        return $next($request);
    }
}
