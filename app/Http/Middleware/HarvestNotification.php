<?php

namespace App\Http\Middleware;

use App\Models\Plant;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HarvestNotification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $readyToHarvestCount = Plant::where('harvest_status', 'siap panen')->count();

        // Share the variable with all views
        view()->share('readyToHarvestCount', $readyToHarvestCount);

        return $next($request);
    }
}
