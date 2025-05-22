@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('contents')
<div class="card shadow-sm rounded-4 p-4">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-3">
        <!-- Form pencarian -->
        <form action="{{ route('products') }}" method="GET" class="w-100 w-md-auto">
            <div class="input-group" style="max-width: 250px;">
                <input 
                    name="search" 
                    type="text" 
                    placeholder="Cari produk..." 
                    value="{{ request('search') }}" 
                    class="form-control bg-light border-primary text-primary small" 
                    style="border-width: 2px;">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Tombol tambah produk -->
        <a href="{{ route('products.create') }}" class="btn btn-primary shadow-sm">+ Tambah Produk</a>
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <!-- Tabel produk -->
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($products->count() > 0)
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->category->name }}</td>  
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="6">Produk tidak ditemukan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('styles')
<style>
    .btn-primary {
        background-color: #007BFF;
        border-color: #007BFF;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        box-shadow: 0px 4px 8px rgba(0, 123, 255, 0.3);
    }

    .btn-outline-secondary:hover, .btn-outline-warning:hover, .btn-outline-danger:hover {
        box-shadow: 0px 2px 6px rgba(0,0,0,0.2);
    }

    .form-control {
        border-color: #007BFF;
    }

    .form-control:focus {
        border-color: #0056b3;
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
    }
</style>
@endsection
