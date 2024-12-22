<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Product; 

class productController extends Controller
{
    // ===================================
    // This method will show products page
    // ===================================
    public function index() {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('products.list', ['products' => $products]);
    }

    // =========================================
    // This method will show create product page
    // =========================================
    public function create() {
        return view('products.create');
    }

    // ============================================
    // This method will store a product in Database
    // ============================================
    public function store(Request $request) {
        $rules = [
            'name' => 'required|min:3',
            'sku' => 'required|min:3',
            'price' => 'required|numeric'
        ];

        if ($request->image != '') {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('products.create')->withErrors($validator)->withInput();
        }

        // Here we will insert product in Database
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        // Here we will Store image
        if ($request->image != '') {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;// Unique Name for Image

            // Save image to products Folder
            $image->move(public_path('uploads/products'), $imageName);

            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('products.index')->with('success','Product added Successfully!');
    }

    // ===============================
    // This method will edit a product
    // ===============================
    public function edit($id) {        
        $product = Product::findOrFail($id);
        return view('products.edit', ['product'=>$product]);
    }

    // =================================
    // This method will update a product
    // =================================
    public function update($id, Request $request) {
        $product = Product::findOrFail($id);
    
        $rules = [
            'name' => 'required|min:3',
            'sku' => 'required|min:3',
            'price' => 'required|numeric'
        ];
    
        // If an image is uploaded, add validation for it
        if ($request->hasFile('image') && $request->image != '') {
            $rules['image'] = 'image';
        }
    
        // Validate the request input
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('products.edit', $product->id)->withErrors($validator)->withInput();
        }
    
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
    
        if ($request->hasFile('image') && $request->image != '') {
            if ($product->image) {
                File::delete(public_path('uploads/products/' . $product->image));
            }
    
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // Unique image name
    
            $image->move(public_path('uploads/products'), $imageName);
    
            $product->image = $imageName;
        }
    
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }    

    // =================================
    // This method will delete a product
    // =================================
    public function destory($id) {
        $product = Product::findOrFail($id);
        // Delete Image
        File::delete(public_path('uploads/products/' . $product->image));
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted successfully!');
    }
}
