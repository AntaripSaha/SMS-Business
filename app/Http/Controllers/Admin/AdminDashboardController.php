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
        $total_customer = Customer::count();
        $total_msg_req = RequestMessage::count();
        $total_new_msg = RequestMessage::where('status', 0)->count();
        $total_msg_pending = RequestMessage::where('status', 1)->count();
        $total_msg_processing = RequestMessage::where('status', 2)->count();
        $total_msg_completed = RequestMessage::where('status', 3)->count();
        return view('admin.dashboard', compact('total_new_msg','total_customer','total_msg_req','total_msg_pending','total_msg_processing','total_msg_completed'));
    }
    public function user(){
        $customers = Customer::paginate(10);

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

    public function user_store(Request $req){
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->phone = $req->phone;
        $customer->email = $req->email;
        $customer->pass = $req->password;
        $customer->save();

        $user = new User;
        $user->name =  $req->name;
        $user->email =  $req->email;
        $user->password = Hash::make($req['password']);
        $user->is_admin = 2;
        $user->save();



        return redirect()->back()->with('success', 'Customer Added');

    }

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
}

