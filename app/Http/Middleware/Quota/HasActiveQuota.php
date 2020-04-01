<?php

namespace App\Http\Middleware\Quota;

use Closure;
use Illuminate\Http\Request;

class HasActiveQuota
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $hasQuota = $request->user()->hasQuotaLeft();
        if ($hasQuota) return $next($request);

        if ($request->isJson()) {
            return response()->paymentRequired('Not enough quota to perform this request.');
        }

        return redirect('/dashboard/billing?expired=true');
    }
}
