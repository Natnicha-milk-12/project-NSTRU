<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\teat;


class teatsController extends Controller
{
    public function create()
    {
       
        return view('form-user');
    }

    public function storeaccidents(Request $request)
    {
        
            $acci = new teat;
            $acci->acc_name = $request->input('acc_name');
            $acci->acc_categors_name = $request->input('acc_categors_name');
            $acci->save();
            //    return dd($acc);
            return redirect()->back()->with('status','accident Added Successfully');
 
    }      
}
