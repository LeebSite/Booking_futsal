<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LogActivity
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Log only important activities
        if ($this->shouldLog($request)) {
            $this->logActivity($request, $response);
        }

        return $response;
    }

    /**
     * Determine if the request should be logged
     */
    private function shouldLog(Request $request): bool
    {
        $method = $request->method();
        $path = $request->path();

        // Log POST, PUT, PATCH, DELETE requests
        if (!in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'])) {
            return false;
        }

        // Skip logging for certain paths
        $skipPaths = [
            'logout',
            '_ignition',
            'telescope',
        ];

        foreach ($skipPaths as $skipPath) {
            if (str_contains($path, $skipPath)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Log the activity
     */
    private function logActivity(Request $request, $response): void
    {
        $user = Auth::user();
        $statusCode = $response->getStatusCode();

        $logData = [
            'user_id' => $user ? $user->id : null,
            'username' => $user ? $user->username : 'guest',
            'role' => $user ? $user->role : 'guest',
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'path' => $request->path(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status_code' => $statusCode,
            'timestamp' => now()->toISOString(),
        ];

        // Add request data for certain endpoints
        if ($this->shouldLogRequestData($request)) {
            $logData['request_data'] = $this->sanitizeRequestData($request->all());
        }

        // Determine log level based on status code
        if ($statusCode >= 500) {
            Log::error('User Activity - Server Error', $logData);
        } elseif ($statusCode >= 400) {
            Log::warning('User Activity - Client Error', $logData);
        } else {
            Log::info('User Activity', $logData);
        }
    }

    /**
     * Determine if request data should be logged
     */
    private function shouldLogRequestData(Request $request): bool
    {
        $path = $request->path();
        
        $logDataPaths = [
            'booking',
            'lapangan',
            'users',
        ];

        foreach ($logDataPaths as $logPath) {
            if (str_contains($path, $logPath)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Sanitize request data (remove sensitive information)
     */
    private function sanitizeRequestData(array $data): array
    {
        $sensitiveFields = [
            'password',
            'password_confirmation',
            'current_password',
            'new_password',
            '_token',
            '_method',
        ];

        foreach ($sensitiveFields as $field) {
            if (isset($data[$field])) {
                $data[$field] = '[REDACTED]';
            }
        }

        return $data;
    }
}
