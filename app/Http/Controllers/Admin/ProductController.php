<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
{
    $data = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $data['image_url'] = $request->file('image')->store('products', 'public');
    }

    Product::create($data);

    return redirect()->route('products.index')
        ->with('success', 'Produit créé avec succès');
}
    public function show(Product $product) 
        {
            return view('admin.products.show', compact('product'));
        }


    public function edit(Product $product) {
        $categories = Category::all();
        return view('admin.products.edit', compact('product','categories'));
    }


   public function update(Request $request, Product $product)
{
    $data = $request->validate([
        'name' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
    ]);

    // Si une nouvelle image est uploadée
    if ($request->hasFile('image')) {

        // Supprimer l’ancienne image
        if ($product->image_url) {
            Storage::disk('public')->delete($product->image_url);
        }
        dd($request->all(), $request->file('image'));


        // Enregistrer la nouvelle
        $data['image_url'] = $request->file('image')
            ->store('products', 'public');
    }

    $product->update($data);

    return redirect()->route('products.index')
        ->with('success', 'Produit modifié avec succès');
}


    public function destroy(Product $product) {
        $product->delete();
        return back();
    }
}
