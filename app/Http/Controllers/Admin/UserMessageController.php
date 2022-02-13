<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequestMessage;
use Illuminate\Http\Request;

class UserMessageController extends Controller
{
    public function list(){
       return $messages = RequestMessage::with('database', 'user')->paginate(2);
        return view('admin.message.message_list', compact('messages'));
    }
}

