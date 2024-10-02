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
        // Ambil data tanaman dengan status "siap panen"
        $siapPanenPlants = Plant::where('harvest_status', 'siap panen')->get();

        // Menghitung jumlah notifikasi
        $notificationCount = $siapPanenPlants->count();

        // Siapkan data notifikasi untuk dropdown
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

        // Share data ke seluruh view
        view()->share('notificationCount', $notificationCount);
        view()->share('notifications', $notifications);

        return $next($request);
    }
}
