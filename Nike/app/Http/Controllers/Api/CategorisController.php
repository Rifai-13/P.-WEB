<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoris;
use Illuminate\Http\Request;

class CategorisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Categoris::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'jenis' => 'required',
            
        ]);

     

        $categori = Categoris::create($validate);

        return response()->json($categori, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categori = Categoris::find($id);
        return response()->json($categori);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categori = Categoris::find($id);

        $validate = $request->validate([
            'jenis' => 'sometimes',
            
        ]);

        

        $categori->update($validate);

        return response()->json($categori, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categori = Categoris::findOrFail($id);
        $categori->delete();

        return response()->json(['message' => 'categori deleted successfully'], 200);
    }
}
