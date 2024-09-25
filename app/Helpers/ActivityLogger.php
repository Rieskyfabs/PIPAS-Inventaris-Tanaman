<?php

namespace App\Helpers;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ActivityLogger
{
  public static function log($action, $description = null)
  {
    ActivityLog::create([
      'user_id' => Auth::id(),
      'action' => $action,
      'description' => $description,
      'performed_at' => Carbon::now(),
    ]);
  }
}
