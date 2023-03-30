<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function add()
    {
        return view('app-user');

    }

    public function insert(Request $request)
    {

        $users = new User();
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));
        $users->phone_number = $request->input('phone_number');
        $users->save();
        return redirect('/')->with('status', "inserted Successfully");
    }

//    protected function insert(array $data)
    //    {
    //        return User::create([
    //            'name' => $data['name'],
    //            'email' => $data['email'],
    //            'password' => Hash::make($data['password']),
    //            'phone_number' => $data['phone_number'],
    //        ]);
    //    }

    public function getuser()
    {

        // $datas = DB::raw();

        $data = DB::table('categors')->where('status', 'เปิด')->get();
        $user = DB::table('users')->get();
        // return dd($user);
        return view('Accidents.form_accidents', compact('data', 'user'));

    }
}
