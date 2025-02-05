@extends('layouts.main')

@section('title', 'Tambah Produk')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Produk</h1>
        <div class="card mb-4">
            <div class="card-header">
                Form Tambah Produk
            </div>
            <div class="card-body">
                <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="namaPeralatan" class="form-label">Nama Peralatan</label>
                        <input type="text" class="form-control" id="namaPeralatan" name="namaPeralatan" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi (JSON)</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                    </div> --}}
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Produk</button>
                </form>
            </div>
        </div>
    </div>
@endsection
