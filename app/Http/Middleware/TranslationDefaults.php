<?php

namespace App\Http\Middleware;

use Closure;

class TranslationDefaults
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->merge(['group' => 'site']);
        return $next($request);
    }
}
