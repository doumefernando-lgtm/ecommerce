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
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        $product = Product::create($request->all());

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
