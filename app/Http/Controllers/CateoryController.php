<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Categor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CateoryController extends Controller
{
    //

    // public function cateory_1() 
    // {
    //     return view("cateory_1");
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'moreFields.*.categors_name' => 'required',
    //         'moreFields.*.status' => 'required'
    //     ]);
     
    //     foreach ($request->moreFields as $key => $value) {
    //         Categor::create($value);
    //     }
     
    //     return back()->with('success', 'Todos Has Been Created Successfully.');
    // }
 

	// set index page view

  
	public function index() {
		return view('category_1');
	}

	// handle fetch all eamployees ajax request
	public function fetchAll() {
		$emps = Categor::all();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>ชื่อหมวดหมู่</th>
                <th>สถานะ</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td>' . $emp->id . '</td>
                <td>' . $emp->categors_name . '</td>
                <td>' . $emp->status . '</td>
              
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

	// handle insert a new employee ajax request
	public function store(Request $request) {
		$empData = ['categors_name' => $request->categors_name,  'status' => $request->status,];
		Categor::create($empData);
		return response()->json([
			'status' => 200,
		]);
	}



  // public function edit($id)
  //   {
  //       $$emp = Categor::find($id);
  //       return view('$emp.edit', compact('categors'));
  //   }

  //   public function update(Request $request, $id)
  //   {
  //     $emp = Categor::find($id);
  //     $emp->categors_name = $request->input('categors_name');
  //     $emp->status = $request->input('status');
  //     $emp->update();
  //       return redirect()->back()->with('status','categors Updated Successfully');
  //   }

	// handle edit an employee ajax request
	public function  edit(Request $request) {
		$id = $request->id;
		$emp = Categor::find($id);
		return response()->json($emp);
	}

  
	// handle update an employee ajax request
	public function update(Request $request) {
  
		$emp = Categor::find($request->id);
	  $empData = ['categors_name' => $request->categors_name, 'status' => $request->status ];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}
  // public function update(Request $request, $id)
  //   {
  //     $emp = Categor::find($id);
  //     $emp->categors_name = $request->input('categors_name');
  //     $emp->status = $request->input('status');
  //     $emp->update();
  //       return redirect()->back()->with('status','categors Updated Successfully');
  //   }

	// handle delete an employee ajax request
    public function delete(Request $request)
    {
        $user = Categor::findOrFail($request->id);

        if ($user->delete() === false) {
            return response(
                "Couldn't delete the user with id {$request->id}",
              
            );
        }

        return response(["id" => $request->id, "deleted" => true]);
    }
    
}

