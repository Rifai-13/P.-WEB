<?php

namespace App\Http\Controllers;

use App\Models\Categoris;
use Illuminate\Http\Request;

class Categoriscontroller extends Controller
{
    public function index()
    {
        $categori = Categoris::with('products')->get();
        return view('categori', compact('categori'));
    }

    public function store(Request $request){
        $request->validate([
            'jenis' => 'required|string',
        ]);
        return Categoris::create($request->all());
    }

    public function show($id){
        return Categoris::with('Products')->findOrFail($id);
    }

    public function update(Request $request, $id){
        $categori = Categoris::findOrFail($id);
        $categori->update($request->all());
        return response()->json(['message' => 'categori updated successfully!']);
    }

    public function destroy($id){
        $categori = Categoris::findOrFail($id);
        $categori->delete();
        return response()->json(['message' => 'categori deleted successfully!']);
    }
}