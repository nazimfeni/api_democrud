<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(){
        return Product::all();
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|max:255',
            'description' =>'required',
            'price' =>'required|numeric',

        ]);

        $product = Product::create($validated);
        return response()->json($product, 201);
    }

    public function show(Product $product){
        return response()->json($product, 200);
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);
    
        $product = Product::findOrFail($id); // Retrieve the product to update
        $product->update($validated); // Update the product with validated data
    
        return response()->json($product, 200);
    }
    public function destroy(Product $product){
        $product->delete();
        return response()->json('Deleted', 200);
    }

}
