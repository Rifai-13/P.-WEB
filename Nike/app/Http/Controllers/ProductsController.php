<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        // Mengambil produk dengan kategori terkait
        $products = Products::with('categori')->get();
        return view('products', compact('products'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        // Validasi data produk yang akan ditambahkan
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // Validasi untuk gambar
            'categori_id' => 'required|exists:categori,id',
        ]);

        // Menyimpan gambar
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imageName); // Menyimpan gambar ke folder public/image
        }

        // Menyimpan data produk baru ke database
        $product = Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'categori_id' => $request->categori_id,
            'image' => $imageName, // Menyimpan nama gambar dalam database
        ]);

        return response()->json(['message' => 'Product created successfully!', 'product' => $product], 201);
    }

    // Menampilkan detail produk berdasarkan ID
    public function show($id)
{
    $product = products::find($id);

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    return response()->json([
        'name' => $product->name,
        'price' => $product->price,
        'image' => asset('storage/' . $product->image), // Gambar dapat diakses melalui URL
    ]);
}


    // Memperbarui produk
    public function update(Request $request, $id)
    {
        // Mencari produk yang akan diupdate
        $products = Products::findOrFail($id);

        // Jika ada gambar baru yang diupload, proses upload gambar
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Menghapus gambar lama (jika ada)
            if ($products->image && file_exists(public_path('image/' . $products->image))) {
                unlink(public_path('image/' . $products->image));
            }

            // Menyimpan gambar baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $products->image = $imageName; // Memperbarui nama gambar pada produk
        }

        // Memperbarui data produk lainnya
        $products->update($request->except('image')); // Jangan update field image jika tidak ada perubahan gambar

        return response()->json(['message' => 'Product updated successfully!']);
    }

    // Menghapus produk
    public function destroy($id)
    {
        // Mencari produk yang akan dihapus
        $products = Products::findOrFail($id);

        // Menghapus gambar dari folder public/image sebelum menghapus produk
        if ($products->image && file_exists(public_path('image/' . $products->image))) {
            unlink(public_path('image/' . $products->image));
        }

        // Menghapus produk dari database
        $products->delete();

        return response()->json(['message' => 'Product deleted successfully!']);
    }
}