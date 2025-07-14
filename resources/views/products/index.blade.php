@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('contents')
<div class="card shadow-sm rounded-4 p-4">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-3">
        <!-- Form pencarian -->
        <form action="{{ route('products') }}" method="GET" class="w-100 w-md-auto">
            <div class="input-group" style="max-width: 300px;">
                <input 
                    name="search" 
                    type="text" 
                    placeholder="Cari produk..." 
                    value="{{ request('search') }}" 
                    class="form-control border-primary small" 
                    style="border-width: 2px;">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <!-- Tombol aksi -->
        <div class="d-flex align-items-center gap-2 flex-nowrap">
            <a href="{{ route('products.export.pdf') }}" class="btn btn-outline-danger btn-sm rounded-pill px-3 d-flex align-items-center gap-1">
                <i class="fas fa-file-pdf"></i> 
                <span class="d-none d-md-inline">PDF</span>
            </a>
            <a href="{{ route('products.export.excel') }}" class="btn btn-outline-success btn-sm rounded-pill px-3 d-flex align-items-center gap-1">
                <i class="fas fa-file-excel"></i> 
                <span class="d-none d-md-inline">Excel</span>
            </a>
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-1">
                <i class="fas fa-plus"></i> 
                <span class="d-none d-md-inline">Tambah</span>
            </a>
        </div>
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
        background-color: #4F86F7;
        border-color: #4F86F7;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #3b6edc;
        border-color: #3b6edc;
        box-shadow: 0px 4px 8px rgba(79, 134, 247, 0.3);
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
        border-color: #dc3545;
        box-shadow: 0px 4px 8px rgba(220, 53, 69, 0.3);
    }

    .btn-outline-success:hover {
        background-color: #28a745;
        color: white;
        border-color: #28a745;
        box-shadow: 0px 4px 8px rgba(40, 167, 69, 0.3);
    }

    .btn-outline-secondary:hover,
    .btn-outline-warning:hover,
    .btn-outline-danger:hover {
        box-shadow: 0px 2px 6px rgba(0,0,0,0.2);
    }

    .input-group .form-control {
        border-right: none;
    }

    .input-group .btn {
        border-left: none;
    }

    .table th, .table td {
        vertical-align: middle;
        font-size: 14px;
        color: #6c757d;
    }
</style>
@endsection
