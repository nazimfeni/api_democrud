<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        return response()->json(Product::all(), 200);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',

        ]);

        $product = Product::create($validateData);
        return response()->json($product, 201);
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json($product, 200); //ok
        } else {

            return response()->json(['message' => 'Product not found'], 404);
        }
    }

    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

       // $product = Product::findOrFail($id); // Retrieve the product to update

        if ($product) {
            $product->update($validateData); // Update the product with validated data

            return response()->json($product, 200);

        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
    public function destroy(Product $product)
    {
        if ($product) {

            $product->delete();
        
            return response()->json(null, 204);
           
        } else {

            return response()->json(['message' => 'Product not found'], 404);
        }
       
       
       
       
    }

}
