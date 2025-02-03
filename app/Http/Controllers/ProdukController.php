<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // GET: Ambil semua data produk dan tampilkan view
    public function index()
    {
        $produk = Produk::all();
        return view('produk.produkIndex', compact('produk'));
    }

    // POST: Simpan produk baru dan redirect ke halaman index
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

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // GET: Tampilkan detail produk (bisa diubah sesuai kebutuhan)
    public function show($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan');
        }
        return view('produk.show', compact('produk'));
    }

    // GET: Tampilkan form edit produk
    public function edit($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan');
        }
        return view('produk.edit', compact('produk'));
    }

    // PUT/PATCH: Update produk dan redirect ke halaman index
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaPeralatan' => 'required|string',
            'jenis' => 'required|string',
            'deskripsi' => 'required|json',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $produk = Produk::find($id);
        if (!$produk) {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan');
        }

        // Jika ada file foto yang diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($produk->foto) {
                Storage::disk('public')->delete($produk->foto);
            }
            $fotoPath = $request->file('foto')->store('produk', 'public');
            $produk->foto = $fotoPath;
        }

        // Update data produk
        $produk->update([
            'namaPeralatan' => $request->namaPeralatan,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate!');
    }

    // DELETE: Hapus produk dan redirect ke halaman index
    public function destroy($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan');
        }

        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function create()
    {
        return view('produk.create');
    }
}

