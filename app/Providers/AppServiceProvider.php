<?php

namespace App\Providers;

use App\Models\Plant;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // View composer untuk setiap view yang memuat komponen header
        View::composer('components.header', function ($view) {
            // Ambil data tanaman dengan status "siap panen"
            $siapPanenPlants = Plant::where('harvest_status', 'siap panen')->get();

            // Menghitung jumlah notifikasi
            $notificationCount = $siapPanenPlants->count();

            // Siapkan data detail notifikasi untuk dropdown
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

            // Kirim data ke view
            $view->with([
                'notificationCount' => $notificationCount,
                'notifications' => $notifications,
            ]);
        });
    }
}
