@extends('layouts.app')

@section('title', 'Dashboard - SITOKO')

<?php
$items = [
    ['title' => 'Stok Produk', 'value' => $totalStock, 'icon' => 'fa-box'],
    ['title' => 'Item Produk', 'value' => $totalProduct, 'icon' => 'fa-box-open'],
    ['title' => 'Kategori Produk', 'value' => $totalCategory, 'icon' => 'fa-layer-group'],
];
?>

@section('contents')
<div class="container-fluid py-4">
    <div class="row">
        @foreach($items as $item)
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow-sm rounded-3 h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                                    {{ $item['title'] }}
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-dark">
                                    {{ $item['value'] }}
                                </div>
                            </div>
                            <div class="col-3 text-end">
                                <i class="fas {{ $item['icon'] }} fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card shadow-sm rounded-3">
                <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold">Produk Terbaru</h6>
                </div>
                <div class="card-body">
                    <canvas id="areaChart" height="200"></canvas>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card shadow-sm rounded-3">
                <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold">Kategori Produk Terbanyak</h6>
                </div>
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="position-relative w-100" style="max-width: 300px;">
                        <canvas id="pieChart" style="aspect-ratio: 1/1; width: 100% !important; height: auto !important;"></canvas>
                    </div>
                    <div class="mt-3 text-center small" id="pieChartItems"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="/admin_assets/vendor/chart.js/Chart.min.js"></script>

<script>
    // Area Chart
    var produkTerbaruData = @json($produkTerbaruData);
    var produkLabels = produkTerbaruData.map(item => item.name);
    var produkQuantities = produkTerbaruData.map(item => item.quantity);

    var ctxArea = document.getElementById('areaChart').getContext('2d');
    new Chart(ctxArea, {
        type: 'line',
        data: {
            labels: produkLabels,
            datasets: [{
                label: 'Jumlah Stok',
                data: produkQuantities,
                fill: true,
                backgroundColor: 'rgba(78, 115, 223, 0.1)',
                borderColor: 'rgba(78, 115, 223, 1)',
                borderWidth: 2,
                tension: 0.3,
                pointBackgroundColor: 'rgba(78, 115, 223, 1)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    ticks: { color: '#858796' },
                    grid: { display: false }
                },
                y: {
                    beginAtZero: true,
                    ticks: { color: '#858796' }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });

    // Pie Chart
    var kategoriTerbanyakData = @json($kategoriTerbanyakData);
    var kategoriLabels = kategoriTerbanyakData.map(item => item.name);
    var kategoriValues = kategoriTerbanyakData.map(item => item.product_count);

    var ctxPie = document.getElementById('pieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: kategoriLabels,
            datasets: [{
                data: kategoriValues,
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#858796',
                        padding: 20
                    }
                }
            }
        }
    });
</script>
@endsection
