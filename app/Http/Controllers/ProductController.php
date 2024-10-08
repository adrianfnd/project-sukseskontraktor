<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = $this->uploadImage($request->file('image'));

        $product = new Product($request->except('image'));
        $product->image_url = $imageName;
        $product->save();

        return redirect()->route('admin')->with('success', 'Product created successfully!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.detail', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $this->deleteImage($product->image_url);

            $imageName = $this->uploadImage($request->file('image'));
            $product->image_url = $imageName;
        }

        $product->update($request->except('image'));

        return redirect()->route('admin')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $this->deleteImage($product->image_url);

        $product->delete();

        return redirect()->route('admin')->with('success', 'Product deleted successfully!');
    }

    private function uploadImage($file)
    {
        $randomNumber = Str::random(10);
        $imageName = $randomNumber . '_' . time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('assets/products'), $imageName);
        
        return $imageName;
    }
    
    private function deleteImage($imageName)
    {
        $imagePath = public_path('assets/products/' . $imageName);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}
