<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{

    public function show(){
        // $produk = Produk::findOrFail($id);
    }
    // GET: Tampilkan semua produk di halaman web
    public function index()
    {
        $produk = Produk::all();
        return view('produk.produkIndex', compact('produk'));
    }

    // GET: Form tambah produk
    public function create()
    {
        return view('produk.create');
    }

    // POST: Simpan produk baru melalui form web
    public function store(Request $request)
    {
        $request->validate([
            'namaPeralatan' => 'required|string',
            'jenis' => 'required|string',
            // 'deskripsi' => 'required|json',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $fotoPath = null;
        if
        ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $namaFile);
            $fotoPath = 'image/' . $namaFile;
        }

        Produk::create([
            'namaPeralatan' => $request->namaPeralatan,
            'jenis' => $request->jenis,
            // 'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'foto' => $fotoPath
        ]);

        return redirect()->route('produk.index')->with('success', 'Peralatan berhasil ditambahkan!');
    }

    // GET: Form edit produk
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    // PUT: Update produk dari form web
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'namaPeralatan' => 'required|string',
            'jenis' => 'required|string',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($produk->foto && file_exists(public_path($produk->foto))) {
                unlink(public_path($produk->foto));
            }

            // Simpan foto baru
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $namaFile);
            $produk->foto = 'image/' . $namaFile;
        }

        $produk->update($request->except(['foto']));

        return redirect()->route('produk.index')->with('success', 'Peralatan berhasil diperbarui!');
    }

    // DELETE: Hapus produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Peralatan berhasil dihapus!');
    }
}
