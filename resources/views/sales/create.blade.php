@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('contents')
<div class="card shadow-sm rounded-4 p-4">
    <h5 class="mb-4">Tambah Transaksi Penjualan</h5>

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="product_id" class="form-label">Produk</label>
            <select name="product_id" id="product_id" class="form-select" required>
                <option value="">-- Pilih Produk --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }} (Stok: {{ $product->stock }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah Terjual</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('sales') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
