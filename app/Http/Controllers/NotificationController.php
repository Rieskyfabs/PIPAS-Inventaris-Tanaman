<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::with('plant')->latest()->get();
        return view('admin.pages.notifications.index', compact('notifications'));
    }

    public function userIndex()
    {
        $notifications = Notification::with('plant')->latest()->get();
        return view('pages.notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        // Find the notification by ID
        $notification = Notification::with('plant')->findOrFail($id);

        // Update the specific notification to mark it as read
        $notification->update(['is_read' => true]);

        // Redirect to the plant show page using plant_code
        return redirect()->route('plants.show', $notification->plant->plantAttribute->plant_code);
    }
    
    public function usersMarkAsRead($id)
    {
        // Find the notification by ID
        $notification = Notification::with('plant')->findOrFail($id);

        // Update the specific notification to mark it as read
        $notification->update(['is_read' => true]);

        // Redirect to the plant show page using plant_code
        return redirect()->route('users.plants.show', $notification->plant->plantAttribute->plant_code);
    }


}
