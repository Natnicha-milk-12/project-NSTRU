<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use App\Models\Product;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
       $this->validate($request, [
          'name' => 'required|string|max:255',
          'description' => 'required|string|max:855',
    ]);
    $product = new Product;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->save();
    foreach ($request->file('images') as $imagefile) {
      $image = new Image;
      $path = $imagefile->store('/images/resource', ['disk' =>   'my_files']);
      $image->url = $path;
      $image->product_id = $product->id;
      $image->save();
    }}
}
