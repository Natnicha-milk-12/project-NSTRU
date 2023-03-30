<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Adduser extends Controller
{
    //
    // function adduser(){
    //     return view('app-user');
    // }


    // function add(Request $request){



//ดูค่าที่กรอกว่ามาหรือไหม
    //     return $request->adduser(); 
    // }
        // $request->validate([
        //     'name' => 'required', 
        //     'email' => 'required', 
        //     'password' => 'required',
        //     'phone_number' => 'required', 
        // ]);

// $query = DB::table('user')->insert([

//     'name' ->$request->input('name'),

//     'email'->$request->input('email'),

//     'password' -> $request->input('password'),

//     'phone_number' ->$request->input('phone_number'),

// ]);


public function add(){
    return view('app-user');

}

public function insert(Request $request){
   
    $users = new User();
    $users->name = $request->input('name');
    $users->email = $request->input('email');
    $users->password =  $request->input('password');
    $users->phone_number= $request->input('phone_number');
    $users->save();
    return redirect('/')->with('status',"inserted Successfully");
}

public function getuser(){

    $data = DB::table('categors')->where('status','เปิด')->get();

    $user = DB::table('users')->get();
    // return dd($user);
    return view('form-user', compact('data', 'user'));

}


}
