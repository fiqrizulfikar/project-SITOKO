@extends('layouts.app')

@section('title', 'Laporan Penjualan')

@section('contents')
<div class="card shadow-sm p-4 rounded-4">
    <h5 class="mb-3">Filter Laporan Penjualan</h5>

    {{-- Form Filter Tanggal --}}
    <form method="POST" action="{{ route('sales.report.generate') }}" class="row g-3 mb-4">
        @csrf

        <div class="col-md-5">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" name="start_date" id="start_date" class="form-control"
                value="{{ old('start_date', $start_date ?? '') }}">
        </div>

        <div class="col-md-5">
            <label for="end_date" class="form-label">Tanggal Selesai</label>
            <input type="date" name="end_date" id="end_date" class="form-control"
                value="{{ old('end_date', $end_date ?? '') }}">
        </div>

        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-search me-1"></i> Tampilkan
            </button>
        </div>
    </form>

    {{-- Hasil Laporan --}}
    @if(isset($sales))
        <h6 class="mb-3">
            Hasil Laporan dari <strong>{{ $start_date }}</strong> hingga <strong>{{ $end_date }}</strong>
        </h6>

        {{-- Tombol Export --}}
        <div class="mb-3">
            <form action="{{ route('sales.export.pdf') }}" method="GET" class="d-inline">
                <input type="hidden" name="start_date" value="{{ $start_date }}">
                <input type="hidden" name="end_date" value="{{ $end_date }}">
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </button>
            </form>

            <form action="{{ route('sales.export.excel') }}" method="GET" class="d-inline">
                <input type="hidden" name="start_date" value="{{ $start_date }}">
                <input type="hidden" name="end_date" value="{{ $end_date }}">
                <button type="submit" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel"></i> Export Excel
                </button>
            </form>
        </div>

        {{-- Tabel Data Penjualan --}}
        @if($sales->count())
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
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
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sale->created_at->format('d-m-Y H:i') }}</td>
                                <td>{{ $sale->product->name }}</td>
                                <td>{{ $sale->quantity }}</td>
                                <td>Rp {{ number_format($sale->total_price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr class="fw-bold">
                            <td colspan="4" class="text-end">Total Penjualan:</td>
                            <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">Tidak ada transaksi pada rentang tanggal tersebut.</div>
        @endif
    @endif
</div>
@endsection
