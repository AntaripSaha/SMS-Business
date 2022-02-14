<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequestMessage;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class UserMessageController extends Controller
{
    public function list(){
        $messages = RequestMessage::with('database', 'user')->orderBy('id', 'DESC')->paginate(5);
        return view('admin.message.message_list', compact('messages'));
    }
    public function action( $id, $status){
        RequestMessage::where('id', $id)->update(array( 'status' => $status));
        return redirect()->back()->with('success', 'Status Updated');
    }
    public function msg_view($id){
        $message = RequestMessage::where('id', $id)->select('message')->get();
        return view('admin.message.user_message', compact('message'));
    }
}

