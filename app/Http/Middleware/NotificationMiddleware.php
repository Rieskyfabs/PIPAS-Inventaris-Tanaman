<?php

namespace App\Http\Middleware;

use App\Models\Notification;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Plant;
use Illuminate\Support\Facades\Auth;

class NotificationMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            // Skip notification creation if the user is not authenticated
            return $next($request);
        }

        // Ambil data tanaman siap panen dan urutkan berdasarkan created_at terbaru
        $siapPanenPlants = Plant::where('harvest_status', 'siap panen')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        foreach ($siapPanenPlants as $plant) {
            // Cek apakah notifikasi sudah ada di database untuk pengguna yang sama
            $exists = Notification::where('plant_id', $plant->id)
                ->where('user_id', Auth::id()) // Cek berdasarkan user_id
                ->exists();

            if (!$exists) {
                // Simpan notifikasi baru ke database dengan user_id
                Notification::create([
                    'plant_id' => $plant->id,
                    'user_id' => Auth::id(), // Simpan user_id
                    'title' => 'Ada tanaman siap panen nih!',
                    'message' => 'Tanaman ' . $plant->plantAttribute->name . ' siap untuk dipanen.',
                ]);
            }
        }

        // Hitung jumlah notifikasi untuk pengguna saat ini
        $notificationCount = Notification::where('user_id', Auth::id())->where('is_read', false)->count();

        // Ambil notifikasi dari database
        $notifications = Notification::with('plant')
            ->orderBy('created_at', 'desc')
            ->take(5) // Batasi jumlah notifikasi yang ditampilkan di header
            ->get()
            ->map(function ($notification) {
                // Periksa apakah pengguna adalah 'user'
                if (Auth::check() && Auth::user()->role->name == 'user') {
                    $notificationUrl = route('users.plants.show', $notification->plant->plantAttribute->plant_code);
                } else {
                    $notificationUrl = route('plants.show', $notification->plant->plantAttribute->plant_code);
                }

                return [
                    'icon' => 'bi-exclamation-circle',
                    'iconColor' => $notification->is_read ? 'text-secondary' : 'text-warning', // Set color based on read status
                    'title' => $notification->title,
                    'message' => $notification->message,
                    'subMessage' => 'Nama tanaman: ' . $notification->plant->plantAttribute->name,
                    'location' => 'Lokasi tanaman: ' . $notification->plant->location->name,
                    'timeAgo' => $notification->created_at->diffForHumans(),
                    'url' => $notificationUrl,
                ];
            });

        // Bagikan notifikasi dan jumlah ke semua views
        view()->share('notificationCount', $notificationCount);
        view()->share('notifications', $notifications);

        return $next($request);
    }
}
