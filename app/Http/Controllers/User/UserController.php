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
        $customer = Customer::where('phone', auth()->user()->phone)->first();
        if($customer){
            $customer = $customer->balance;
        }else{
            $customer = 0;
        }
        
        // return $customer;
        $messages = RequestMessage::with('database')->orderBy('id', 'desc')->where('customer_id', auth()->user()->id)->paginate('5');
        return view('user.dashboard', compact('customer', 'messages'));
    }
    public function campaign(){
        $customer = Customer::where('phone', Auth::user()->phone)->first();
        $database = Database::select('id', 'name', 'number')->orderBy('id', 'DESC')->paginate(5);        
        return view('user.campaign', compact('database', 'customer'));
    }
    public function search(Request $req){
        $customer = Customer::where('phone', Auth::user()->phone)->first();
        $database = Database::where('name', 'LIKE', "%{$req->name}%")->select('id', 'name', 'number')->orderBy('id', 'DESC')->paginate(5);        
        return view('user.campaign', compact('database', 'customer'));
    }
    public function sms_area(Request $req){
        $customer = Customer::where('phone', Auth::user()->phone)->first();
        $database = Database::where('id', $req->id)->select('id', 'name', 'number')->first();
        return view('user.send_message', compact('database', 'customer'));
    }
    public function store(Request $req){
        
       $total_area = Database::where('id', $req->id)->select('number')->get();
       $customer_info = Customer::where('phone', auth()->user()->phone)->select('sms_rate', 'balance', 'balance_out')->get();
       $msg_length = mb_strlen($req->msg,  "UTF-8" );
       $balance = $customer_info[0]->balance;
       $balance_out = $customer_info[0]->balance_out;

      if($msg_length != 0 && $balance != 0 ){
          if($msg_length <= 160){
            $cost = 1*$customer_info[0]->sms_rate;
            $total_cost = $cost * $total_area[0]->number;
            $balance_out = $balance_out+$total_cost;
            $balance = $balance - $total_cost;
            if($balance >= 0){
                $message = new RequestMessage;
                $message->area = $req->id;
                $message->message = $req->msg;
                $message->customer_id = auth()->user()->id;
                $message->save();
                Customer::where('phone', auth()->user()->phone)->update(['balance'=>$balance]);
                Customer::where('phone', auth()->user()->phone)->update(['balance_out'=>$balance_out]);
                return redirect()->route('user.campaign')->with('success', 'Request Placed Successfully');
            }else{
                return redirect()->back()->with('error', 'Insufficient Balance, Please Contact With Zaman IT. ');
            }
           
          }elseif($msg_length >= 161 && $msg_length <= 313 ){
            $cost = 2*$customer_info[0]->sms_rate;
            $total_cost = $cost * $total_area[0]->number;
            $balance_out = $balance_out+$total_cost;
            $balance = $balance - $total_cost;
            if($balance >= 0){
                $message = new RequestMessage;
                $message->area = $req->id;
                $message->message = $req->msg;
                $message->customer_id = auth()->user()->id;
                $message->save();
                Customer::where('phone', auth()->user()->phone)->update(['balance'=>$balance]);
                Customer::where('phone', auth()->user()->phone)->update(['balance_out'=>$balance_out]);
                return redirect()->route('user.campaign')->with('success', 'Request Placed Successfully');
            }else{
                return redirect()->back()->with('error', 'Insufficient Balance, Please Contact With Zaman IT. ');
            }
          }elseif($msg_length >= 314 && $msg_length <= 466 ){
            $cost = 3*$customer_info[0]->sms_rate;
            $total_cost = $cost * $total_area[0]->number;
            $balance_out = $balance_out+$total_cost;
            $balance = $balance - $total_cost;
            if($balance >= 0){
                $message = new RequestMessage;
                $message->area = $req->id;
                $message->message = $req->msg;
                $message->customer_id = auth()->user()->id;
                $message->save();
                Customer::where('phone', auth()->user()->phone)->update(['balance'=>$balance]);
                Customer::where('phone', auth()->user()->phone)->update(['balance_out'=>$balance_out]);
                return redirect()->route('user.campaign')->with('success', 'Request Placed Successfully');
            }else{
                return redirect()->back()->with('error', 'Insufficient Balance, Please Contact With Zaman IT. ');
            }
          }elseif($msg_length >= 467 && $msg_length <= 619 ){
            $cost = 4*$customer_info[0]->sms_rate;
            $total_cost = $cost * $total_area[0]->number;
            $balance_out = $balance_out+$total_cost;
            $balance = $balance - $total_cost;
            if($balance >= 0){
                $message = new RequestMessage;
                $message->area = $req->id;
                $message->message = $req->msg;
                $message->customer_id = auth()->user()->id;
                $message->save();
                Customer::where('phone', auth()->user()->phone)->update(['balance'=>$balance]);
                Customer::where('phone', auth()->user()->phone)->update(['balance_out'=>$balance_out]);
                return redirect()->route('user.campaign')->with('success', 'Request Placed Successfully');
            }else{
                return redirect()->back()->with('error', 'Insufficient Balance, Please Contact With Zaman IT. ');
            }
          }elseif($msg_length >= 620 && $msg_length <= 772 ){
            $cost = 5*$customer_info[0]->sms_rate;
            $total_cost = $cost * $total_area[0]->number;
            $balance_out = $balance_out+$total_cost;
            $balance = $balance - $total_cost;
            if($balance >= 0){
                $message = new RequestMessage;
                $message->area = $req->id;
                $message->message = $req->msg;
                $message->customer_id = auth()->user()->id;
                $message->save();
                Customer::where('phone', auth()->user()->phone)->update(['balance'=>$balance]);
                Customer::where('phone', auth()->user()->phone)->update(['balance_out'=>$balance_out]);
                return redirect()->route('user.campaign')->with('success', 'Request Placed Successfully');
            }else{
                return redirect()->back()->with('error', 'Insufficient Balance, Please Contact With Zaman IT. ');
            }
          }else{
           return redirect()->back()->with('error', 'Max Length Exceded');
          }

      }else{
        return redirect()->back()->with('error', 'Insufficient Balance, Please Contact With Zaman IT. ');
      }


    }
}
