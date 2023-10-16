<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notificationReaded($id)
    {
        auth()->user()->notifications->find($id)->markAsRead();
    }

    public function resetNotifications()
    {
        auth()->user()->notification = 0;
        auth()->user()->save();
    }
}
