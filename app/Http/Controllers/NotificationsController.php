<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    //
    public function index()
    {

        return view('notifications', [
            'notifications' => Auth::user()->notifications()->simplePaginate(1),

        ]);
    }


    public function show($id)
    {
        $user = Auth::user();
        $notification =  $user->notifications()->findOrFail($id);
        $notification->markAsRead();
        

        if ($notification->data['action']){
            return redirect()->to($notification->data['action']);
        }

        return redirect()->route('notifications');

    }



    public function update($id = null)
    {
        $user = Auth::user();
        $user->unreadNotifications()->when($id, function ($query, $id) {
            $query->where('id', '=', $id);
        })->markAsRead();

        return redirect()->route('notifications');
    }



    public function destroy($id = null)
    {
        $user = Auth::user();
        $user->notifications()->when($id, function ($query, $id) {
            $query->where('id', '=', $id);
        })->delete();

        return redirect()->route('notifications');


        // if($id){ /في حالة بدي احدف واحد
        //     $user->notifications()->findOrFail($id)->delete();

        // }else{//في حال بدي احدفهم كلهم
        //     $user->notifications()->delete();

        // }


    }
}
