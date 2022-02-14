<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Database;
use Illuminate\Http\Request;
use App\Models\Message;


class DatabaseController extends Controller
{
    public function index(){
        $numbers = Database::select('number')->get();
        $database = Database::select('id','name', 'number')->paginate(5);
        // $qnt = [];
        // $a= 0;
        // foreach($numbers as $number){
        //     $a= explode("\\n",$number);
        //     array_push($qnt, $a);
        // }
        
       return view('admin.database.database_list', compact('database'));
    }
    public function search(Request $req){
        $database = Database::where('name', 'LIKE', "%{$req->name}%")->paginate(5);
        return view('admin.database.database_list', compact('database'));
    }
    public function add_data(){
        return view('admin.database.add');
    }
    public function store(Request $req){
        $database = new Database;
        $database->name = $req->name;
        $database->number = $req->number;
        $database->save();
        return redirect()->back()->with('success', 'Database Added');
    }
    public function edit($id){
        $database = Database::find($id);
        return view('admin.database.edit', compact('database'));
    }


    public function update(Request $req , $id){

        $database = Database::find($req->id);
        $database->name = $req->name;
        $database->number = $req->number;
        $database->save();
        return redirect()->back()->with('success', 'Database Updated');
    }
    public function delete($id){
        $database = Database::find($id);
        $database->delete();
        return redirect()->back()->with('warning', 'Database Deleted!');
    }
}
