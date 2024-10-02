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
        View::composer('components.header', function ($view) {
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

            $view->with([
                'notificationCount' => $notificationCount,
                'notifications' => $notifications,
            ]);
        });
    }
}
