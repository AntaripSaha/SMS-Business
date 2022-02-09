<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Database;
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

        return $req;

    }
}
