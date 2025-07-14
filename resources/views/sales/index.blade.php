@extends('layouts.app')

@section('title', 'Data Transaksi Penjualan')

@section('contents')
<div class="card shadow-sm rounded-4 p-4">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-3">
        <h5 class="mb-0">Daftar Transaksi Penjualan</h5>

        <!-- Tombol Aksi -->
        <div class="d-flex align-items-center gap-2 flex-nowrap">
            <a href="{{ route('sales.export.pdf') }}" class="btn btn-outline-danger btn-sm rounded-pill px-3 d-flex align-items-center gap-1">
                <i class="fas fa-file-pdf"></i>
                <span class="d-none d-md-inline">PDF</span>
            </a>
            <a href="{{ route('sales.export.excel') }}" class="btn btn-outline-success btn-sm rounded-pill px-3 d-flex align-items-center gap-1">
                <i class="fas fa-file-excel"></i>
                <span class="d-none d-md-inline">Excel</span>
            </a>
            <a href="{{ route('sales.create') }}" class="btn btn-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-1">
                <i class="fas fa-plus"></i>
                <span class="d-none d-md-inline">Tambah</span>
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sales as $sale)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sale->created_at->format('d-m-Y H:i') }}</td>
                        <td>{{ $sale->product->name }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td>Rp {{ number_format($sale->total_price, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada transaksi.</td>
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

    .table th, .table td {
        vertical-align: middle;
        font-size: 14px;
        color: #6c757d;
    }
</style>
@endsection
