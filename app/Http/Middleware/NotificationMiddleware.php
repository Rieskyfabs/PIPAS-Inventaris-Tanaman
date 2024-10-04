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
                'title' => 'Ada tanaman siap panen nih!',
                'message' => 'Tanaman ' . $plant->plantAttribute->name . ' siap untuk dipanen!',
                'subMessage' => 'Nama tanaman : ' . $plant->plantAttribute->name,
                'location' => 'Lokasi tanaman : ' . $plant->location->name,
                'timeAgo' => $plant->created_at->diffForHumans(),
                'url' => route('plants.show', $plant->plantAttribute->plant_code)
            ];
        }

        view()->share('notificationCount', $notificationCount);
        view()->share('notifications', $notifications);

        return $next($request);
    }
}
