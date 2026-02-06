<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Liste des produits (public)
    public function index()
    {
        return response()->json(
            Product::with('category')->get()
        );
    }

    // Détail produit
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return response()->json($product);
    }

    // Créer produit (admin)
    public function store(Request $request)
    {
        $imagePath = null;

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('products', 'public');
        }


        $product = Product::create(
            [
                'category_id' => $request->category_id,
                'name' => $request->name,
                'description' => $request->description ?? null,
                'price' => $request->price,
                'stock' => $request->stock ?? 0,
                'image_url' => $imagePath,
            ]
        );

        return response()->json($product, 201);
    }

    // Modifier produit
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product);
    }

    // Supprimer produit
    public function destroy($id)
    {
        Product::destroy($id);

        return response()->json(['message' => 'Produit supprimé']);
    }
}
