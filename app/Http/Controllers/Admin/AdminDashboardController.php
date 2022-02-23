<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\History;
use App\Models\RequestMessage;
use DB;

class AdminDashboardController extends Controller
{
    public function index(){
        $total_customer = Customer::where('status','!=', 1)->count();
        $total_msg_req = RequestMessage::count();
        $total_new_msg = RequestMessage::where('status', 0)->count();
        $total_msg_pending = RequestMessage::where('status', 1)->count();
        $total_msg_processing = RequestMessage::where('status', 2)->count();
        $total_msg_completed = RequestMessage::where('status', 3)->count();
        return view('admin.dashboard', compact('total_new_msg','total_customer','total_msg_req','total_msg_pending','total_msg_processing','total_msg_completed'));
    }
    public function user(){
        $customers = Customer::where('status', '!=', '1' )->orderBy('id', 'desc')->paginate(10);
        $history = History::groupBy('user_id')
                            ->select(DB::raw("user_id, (sum(balance_in) - sum(balance_out)) as history"))
                            ->where('balance_in' ,'<>', 'balance_out')                                                 
                            ->get();
                            // return $history[0]->history;
        return view('admin.user.user', compact('customers','history'));
    }
    public function add_user(){
        return view('admin.user.add_user');
    }
    //create user from admin panel start
    public function user_store(Request $req){
        $duplicate = User::where('phone', '=', $req->phone)->first();
        if($duplicate != null){
            return redirect()->back()->with('error', 'Customer Already Exists');
        }
        else{
            $customer = new Customer;
            $customer->name = $req->phone;
            $customer->phone = $req->phone;
            $customer->email = $req->phone;
            $customer->pass = $req->password;
            $customer->sms_rate = $req->sms_rate;
            $customer->save();

            $user = new User;
            $user->name =  $req->phone;
            $user->email =  $req->phone;
            $user->phone = $req->phone;
            $user->password = Hash::make($req['password']);
            $user->is_admin = 2;
            $user->save();
            return redirect()->route('admin.user')->with('success', 'Customer Added');
        }
    }
    //create user from admin panel end
    //create user from  Register Panel start
    public function customer_store(Request $req){
        $duplicate = User::where('phone', '=', $req->phone)->first();
        if($duplicate != null){
            return redirect()->back()->with('error', 'Customer Already Exists');
        }
        else{
            $customer = new Customer;
            $customer->name = $req->phone;
            $customer->phone = $req->phone;
            $customer->email = $req->phone;
            $customer->pass = $req->password;
            $customer->sms_rate = 1;
            $customer->save();

            $user = new User;
            $user->name =  $req->phone;
            $user->email =  $req->phone;
            $user->phone = $req->phone;
            $user->password = Hash::make($req['password']);
            $user->is_admin = 2;
            $user->save();
            return redirect()->route('login')->with('success', 'Customer Added');
        }
    }
    //create user from Register Panel end
    //User's Balance Update Start
    public function user_update(Request $req){
        $history = new History();
        $customer = Customer::find($req->id);
        if( $req->transactionType == "CREDIT"){
            $customer->balance_in =$customer->balance_in + $req->balance_in;
        }
        else{
            $customer->balance_out = $customer->balance_out + $req->balance_in;
        }
        $customer->balance = $customer->balance_in - $customer->balance_out;
        // $history->user_id = $req->id;
        // $history->balance_in = $req->balance_in;
        // $history->balance_out = $req->balance_out;
        // $history->save();
        $customer->save();
        return redirect()->back()->with('success', 'Balance Updated');
    }
    //User's Balance Update End
    public function edit_user($id){
        $customers = Customer::where('id', $id)->get();
        $users = User::where('phone', $customers[0]->phone)->get();
        return view('admin.user.update_user_info', compact('customers','users'));
    }
    //User's Information Update Start
    public function update_user_info(Request $req){
        $customer = Customer::where('id', $req->customer_id)->update([
            'name'=>$req->phone,
            'email'=>$req->phone,
            'phone'=>$req->phone,
            'sms_rate'=>$req->sms_rate,
            'pass'=>$req->password
        ]);
        $user = User::where('id', $req->user_id)->update([
            'name'=>$req->phone,
            'email'=>$req->phone,
            'phone'=>$req->phone,
            'password'=>Hash::make($req->password)
        ]);
        return redirect()->route('admin.user')->with('success', 'User Updated');
    }
    //User's Information Update End
}

