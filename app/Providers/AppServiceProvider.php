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
        // Share notifications with the header
        View::composer('components.header', function ($view) {
            // Fetch plants ready for harvest, ordered by creation date
            $siapPanenPlants = Plant::where('harvest_status', 'siap panen')
                ->orderBy('created_at', 'desc')
                ->get();

            $notificationCount = $siapPanenPlants->count();

            $notifications = [];
            foreach ($siapPanenPlants as $plant) {
                $notifications[] = [
                    'icon' => 'bi-exclamation-circle',
                    'iconColor' => 'text-warning',
                    'title' => 'Tanaman Siap Panen',
                    'message' => 'Tanaman dengan kode ' . $plant->plantAttribute->plant_code . ' siap panen.',
                    'timeAgo' => $plant->created_at->diffForHumans(),
                    'url' => route('plants.show', $plant->plantAttribute->plant_code),
                ];
            }

            $view->with([
                'notificationCount' => $notificationCount,
                'notifications' => $notifications,
            ]);
        });

        View::composer('components.sidebar', function ($view) {
            $readyToHarvestCount = Plant::where('harvest_status', 'siap panen')->count();
            $view->with('readyToHarvestCount', $readyToHarvestCount);
        });
    }
}
