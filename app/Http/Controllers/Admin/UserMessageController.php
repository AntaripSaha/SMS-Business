<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequestMessage;
use Illuminate\Http\Request;

class UserMessageController extends Controller
{
    public function list(){
         $messages = RequestMessage::with('database', 'user')->orderBy('id', 'DESC')->paginate(4);
        return view('admin.message.message_list', compact('messages'));
    }
    public function action( $id, $status){
        $request_messages = RequestMessage::where('id', $id)->update(array( 'status' => $status));
        return redirect()->back()->with('success', 'Status Updated');

    }
}

