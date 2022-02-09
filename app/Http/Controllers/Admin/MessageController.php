<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index(){
        return view('admin.message.send');
    }
    public function store(Request $req){


        $msg = New Message;
        $msg->operator = $req->operator;
        $msg->number = $req->number;
        $msg->message = $req->msg;

        $msg->save();

        return redirect()->back()->with('success', 'Message Stored, Wait for the Confirmation. ');


    }
}
