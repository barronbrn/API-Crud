<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // GET: Ambil semua data produk
    public function index()
    {
        $produk = Produk::all();
        return response()->json($produk);
    }

    // POST: Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'namaPeralatan' => 'required|string',
            'jenis' => 'required|string',
            'deskripsi' => 'required|json',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('produk', 'public');
        }

        $produk = Produk::create([
            'namaPeralatan' => $request->namaPeralatan,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'foto' => $fotoPath
        ]);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan!',
            'data' => $produk
        ], 201);
    }

    // GET: Ambil satu produk berdasarkan ID
    public function show($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }
        return response()->json($produk);
    }

    // PUT: Update produk
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $request->validate([
            'namaPeralatan' => 'sometimes|required|string',
            'jenis' => 'sometimes|required|string',
            'deskripsi' => 'sometimes|required|json',
            'stok' => 'sometimes|required|integer',
            'harga' => 'sometimes|required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            if ($produk->foto) {
                Storage::disk('public')->delete($produk->foto);
            }
            $produk->foto = $request->file('foto')->store('produk', 'public');
        }

        $produk->update($request->except(['foto']));

        return response()->json([
            'message' => 'Produk berhasil diperbarui!',
            'data' => $produk
        ]);
    }

    // DELETE: Hapus produk
    public function destroy($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();
        return response()->json(['message' => 'Produk berhasil dihapus']);
    }
}
