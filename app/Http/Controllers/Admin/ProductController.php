<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'category_id'=>'required'
        ]);

        Product::create($request->all());
        return redirect()->route('products.index');
    }

    public function edit(Product $product) {
        $categories = Category::all();
        return view('admin.products.edit', compact('product','categories'));
    }

    public function update(Request $request, Product $product) {
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy(Product $product) {
        $product->delete();
        return back();
    }
}
