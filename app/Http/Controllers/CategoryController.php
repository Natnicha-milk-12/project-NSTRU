<?php

namespace App\Http\Controllers;

use App\Models\Categor;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('Categor.create');
    }

    public function store(Request $request)
    {
        $ca = new Categor;
        $ca->categors_name = $request->input('categors_name');
        $ca->status = $request->input('status');
        $ca->save();
        return redirect()->back()->with('status', 'Categor Added Successfully');
    }

    public function index()
    {
        $ct = Categor::all();
        return view('Categor.category_index', compact('ct'));
    }

    public function edit($id)
    {
        $cg = Categor::find($id);
        return view('Categor.edit', compact('cg'));
    }

    public function update(Request $request, $id)
    {
        $cg = Categor::find($id);
        $cg->categors_name = $request->input('categors_name');
        $cg->status = $request->input('status');
        $cg->update();
        return redirect()->back()->with('status', 'Categor Updated Successfully');
    }

    // public function destroy($id)
    // {

    //     Categor::find($id)->delete();
    //     return back();

    public function destroy($id)
    {
        // $categordelete->delete();

        // return redirect()->route('Categor.category_index')
        //     ->with('success', 'Product deleted successfully');
        // $categordelete = Categor::findOrFail($id);

        // if ($categordelete->delete() === false) {
        //     return response(
        //         "Couldn't delete the user with id {$request->id}",

        //     );
            $Categordelete = Categor::findOrFail($id);
            $Categordelete->delete();
            return back();

    }
    // public function delete(Request $request)
    // {
    //     $user = Categor::findOrFail($request->id);

    //     if ($user->delete() === false) {
    //         return response(
    //             "Couldn't delete the user with id {$request->id}",

    //         );
    //     }

    //     return response(["id" => $request->id, "deleted" => true]);
    // }

}
