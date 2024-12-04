<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(products::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif', // Validasi untuk gambar
            'categori_id' => 'required|exists:categoris,id',
        ]);

        if ($request->hasFile('image')) {
            $validate['image'] = $request->file('image')->store('image', 'public');
        }


        $product = Products::create($validate);

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Products::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Products::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $validate = $request->validate([
            'name' => 'string',
            'price' => 'numeric',
            'image' => 'image|mimes:jpg,jpeg,png,gif',
            'categori_id' => 'exists:categoris,id',
        ]);

        if ($request->hasFile('image')) {
            $validate['image'] = $request->file('image')->store('image', 'public');
        }

        $product->update($validate);

        return response()->json($product);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
