<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Database;
use App\Models\RequestMessage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('user.dashboard');
    }
    public function campaign(){
        
        $customer = Customer::where('email', Auth::user()->email)->first();

        $database = Database::select('id', 'name', 'number')->paginate(5);

        
        return view('user.campaign', compact('database', 'customer'));
    }
    public function sms_area(Request $req){
        

        $customer = Customer::where('email', Auth::user()->email)->first();

        $database = Database::where('id', $req->id)->select('id', 'name', 'number')->first();

        return view('user.send_message', compact('database', 'customer'));
    }
    public function store(Request $req){


        $message = new RequestMessage;
        $message->area = $req->id;
        $message->message = $req->msg;
        $message->save();
        return redirect()->route('user.campaign')->with('success', 'Request Placed Successfully');
    }
}
