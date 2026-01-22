<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //  Liste des catégories (public)
    public function index()
    {
        return response()->json(
            Category::all()
        );
    }

    // Créer une catégorie
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $category = Category::create([
            'name' => $request->name
        ]);

        return response()->json($category, 201);
    }

    // Supprimer une catégorie
    public function destroy($id)
    {
        Category::destroy($id);

        return response()->json([
            'message' => 'Catégorie supprimée'
        ]);
    }
}
