<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    //displaying the form to add the products.
    public function showForm(){
        return view('admin.product.productForm');
    }

    public function addProduct(Request $request){
        
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'brand' => 'required|string|max:255',
                'size' => 'nullable|string|max:255',
                'color' => 'nullable|string|max:255',
                'quantity' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            //dd($request->all('name'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors()); 
        }
        
        // dd($validatedData); // Check validated data
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }
        // Create product
        $product = Product::create($validatedData);
        return redirect()->to('dashboard');
    
        // Return response
        return response()->json([
            'message' => 'Product added successfully!',
            'product' => $product
        ], 201);
    }

    //listing the products available in the database
    public function productList(Request $request){

        $product = DB::table('products')->get();
        return redirect()->to('ProductListing', ['product'=>$product]);
    }

}
