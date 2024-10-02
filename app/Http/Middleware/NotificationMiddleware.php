<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Plant; // Import model Plant

class NotificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Ambil data tanaman siap panen dan urutkan berdasarkan created_at terbaru
        $siapPanenPlants = Plant::where('harvest_status', 'siap panen')
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan created_at
        ->get();

        $notificationCount = $siapPanenPlants->count();

        $notifications = [];
        foreach ($siapPanenPlants as $plant) {
            $notifications[] = [
                'icon' => 'bi-exclamation-circle',
                'iconColor' => 'text-warning',
                'title' => 'Tanaman Siap Panen',
                'message' => 'Tanaman ' . $plant->name . ' di lokasi ' . $plant->location->name . ' siap dipanen.',
                'timeAgo' => $plant->created_at->diffForHumans(),
            ];
        }

        view()->share('notificationCount', $notificationCount);
        view()->share('notifications', $notifications);

        return $next($request);
    }
}
