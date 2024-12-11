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
    public function show($id)
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
    public function update(Request $request,  $id)
    {

        $product = Products::find($id);       

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $validate = $request->validate([
            'name' => 'sometimes|string',    // Validasi name jika ada
            'price' => 'sometimes|numeric',  // Validasi price jika ada
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,gif',  // Validasi image jika ada
            'categori_id' => 'sometimes|exists:categoris,id',  // Validasi kategori jika ada
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
    public function destroy($id)
    {
        $product = Products::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
