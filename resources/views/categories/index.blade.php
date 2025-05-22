@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('contents')
<div class="card shadow-sm rounded-4 p-4">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-3">
        <!-- Form pencarian -->
        <form action="{{ route('categories') }}" method="GET" class="w-100 w-md-auto">
            <div class="input-group" style="max-width: 300px;">
                <input 
                    name="search" 
                    type="text" 
                    placeholder="Cari kategori..." 
                    value="{{ request('search') }}" 
                    class="form-control border-primary small" 
                    style="border-width: 2px;">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <!-- Tombol tambah kategori -->
        <a href="{{ route('categories.create') }}" class="btn btn-primary shadow-sm rounded-3">+ Tambah Kategori</a>
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <!-- Tabel kategori -->
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="4">Kategori tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('styles')
<style>
    .btn-primary {
        background-color: #4F86F7; /* warna biru cerah */
        border-color: #4F86F7;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #3b6edc;
        border-color: #3b6edc;
        box-shadow: 0px 4px 8px rgba(79, 134, 247, 0.3);
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
