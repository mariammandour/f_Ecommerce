<?php

namespace App\Http\Controllers\Admin;

use App\Models\message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class messagecontroller extends Controller
{
    public function index(){

        $messages=message::get();
        return view('Admin/messages/index',compact('messages'));
    }
    public function delete(request $request)
    {
        message::where('id',$request->message_id)->delete();
        Alert::alert('Success', 'Message delete Successfully');
        return redirect()->back();
    }
}
