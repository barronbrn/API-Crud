@extends('layouts.main')

@section('title', 'Daftar Peralatan')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kelola Peralatan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Peralatan</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Peralatan
                <a href="{{ route('produk.create') }}" class="btn btn-sm btn-primary float-end">Tambah Peralatan</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peralatan</th>
                            <th>Jenis</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->namaPeralatan }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>{{ $item->stok }}</td>
                                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td>
                                    @if (filter_var($item->foto, FILTER_VALIDATE_URL))
                                        {{-- Jika format foto adalah URL (gambar online) --}}
                                        <img src="{{ $item->foto }}" alt="Foto" style="width: 100px;">
                                    @elseif ($item->foto && file_exists(public_path($item->foto)))
                                        {{-- Jika foto tersimpan di folder public/image --}}
                                        <img src="{{ asset($item->foto) }}" alt="Foto" style="width: 100px;">
                                    @else
                                        {{-- Jika tidak ada gambar --}}
                                        <img src="{{ asset('img/nophoto.jpg') }}" alt="No Photo" style="width: 100px;">
                                    @endif
                                </td>
                                <td>
                                    {{-- <a href="{{ route('produk.show', $item->id) }}"
                                        class="btn btn-sm btn-secondary">Show</a> --}}
                                    <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('produk.destroy', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Peralatan</th>
                            <th>Jenis</th>
                            <th>Stok</th>
                            <th>Harga/Hari</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
