@extends('layouts.main')

@section('title', 'Edit Produk')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Produk</h1>
    <div class="card mb-4">
        <div class="card-header">
            Form Edit Produk
        </div>
        <div class="card-body">
            <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="namaPeralatan" class="form-label">Nama Peralatan</label>
                    <input type="text" class="form-control" id="namaPeralatan" name="namaPeralatan" value="{{ $produk->namaPeralatan }}" required>
                </div>
                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $produk->jenis }}" required>
                </div>
                {{-- <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi (JSON)</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $produk->deskripsi }}</textarea>
                    <small class="text-muted">Contoh: {"kapasitas": "4 orang", "bahan": "Polyester"}</small>
                </div> --}}
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="{{ $produk->stok }}" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    @if ($produk->foto)
    @if (filter_var($produk->foto, FILTER_VALIDATE_URL))
        {{-- Jika gambar berupa URL --}}
        <img src="{{ $produk->foto }}" alt="Foto Produk" style="width: 100px;"><br>
    @else
        {{-- Jika gambar tersimpan di local storage --}}
        <img src="{{ asset('storage/' . $produk->foto) }}" alt="Foto Produk" style="width: 100px;"><br>
    @endif
@endif
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <button type="submit" class="btn btn-primary">Update Produk</button>
            </form>
        </div>
    </div>
</div>
@endsection
