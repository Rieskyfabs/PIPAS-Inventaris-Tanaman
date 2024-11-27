<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        // Ambil notifikasi untuk pengguna yang sedang aktif
        $notifications = Notification::with('plant')
        ->where('user_id', Auth::id()) // Ambil berdasarkan user_id
            ->latest()
            ->get();

        return view('admin.pages.notifications.index', compact('notifications'));
    }

    public function userIndex()
    {
        $notifications = Notification::with('plant')
        ->where('user_id', Auth::id()) // Ambil berdasarkan user_id
            ->latest()
            ->get();

        return view('pages.notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        // Temukan notifikasi berdasarkan ID dan user_id
        $notification = Notification::where('id', $id)
            ->where('user_id', Auth::id()) // Cek berdasarkan user_id
            ->firstOrFail();

        // Update notifikasi yang ditandai sebagai dibaca
        $notification->update(['is_read' => true]);

        // Redirect ke halaman tanaman menggunakan plant_code
        return redirect()->route('plants.show', $notification->plant->plantAttribute->plant_code);
    }
    
    public function usersMarkAsRead($id)
    {
        // Temukan notifikasi berdasarkan ID dan user_id
        $notification = Notification::where('id', $id)
            ->where('user_id', Auth::id()) // Cek berdasarkan user_id
            ->firstOrFail();

        // Update notifikasi yang ditandai sebagai dibaca
        $notification->update(['is_read' => true]);

        // Redirect to the plant show page using plant_code
        return redirect()->route('users.plants.show', $notification->plant->plantAttribute->plant_code);
    }


}
