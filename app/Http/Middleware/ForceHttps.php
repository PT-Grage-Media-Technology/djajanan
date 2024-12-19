<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    public function handle(Request $request, Closure $next)
    {
        // Cek jika domain adalah localhost
        if (in_array($request->getHost(), ['localhost', '127.0.0.1'])) {
            return redirect()->to('https://djajanan.com' . $request->getRequestUri(), 301);
        }

        return $next($request);
    }
}
