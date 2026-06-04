<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markRead($id){
        $notification = auth()->user()->notifications()->find($id);
        if ($notification) {

            $notification->markAsRead();
           
            return response()->json(['success' => true, 'message' => 'Notification marked as read.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Notification not found.'], 404);
        }
    }

    public function markAllRead(){
        auth()->user()->unreadNotifications->markAsRead();
        return response()->json(['success' => true, 'message' => 'All notifications marked as read.']);
    }

    public function index(){
        $notifications = auth()->user()->notifications()->latest()->paginate(10);
        return view('employer.notifications', compact('notifications'));
    }
}
