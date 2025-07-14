<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        // Total stok, produk, kategori
        $totalStock = Product::sum('stock');
        $totalProduct = Product::count();
        $totalCategory = Category::count();

        // Produk terbaru (5 data)
        $produkTerbaru = Product::latest()->take(5)->get();

        // Kategori dengan produk terbanyak (5 data)
        $kategoriTerbanyak = Category::withCount('products')
            ->orderByDesc('products_count')
            ->take(5)
            ->get();

        // Data area chart: produk terbaru
        $produkTerbaruData = $produkTerbaru->map(function ($produk) {
            return [
                'name' => $produk->name,
                'quantity' => $produk->stock,
            ];
        });

        // Data pie chart: kategori terbanyak
        $kategoriTerbanyakData = $kategoriTerbanyak->map(function ($kategori) {
            return [
                'name' => $kategori->name,
                'product_count' => $kategori->products_count,
            ];
        });

        // 🔔 Produk dengan stok menipis (stok < 5)
        $lowStockProducts = Product::where('stock', '<', 5)->get();

        return view('dashboard', compact(
            'totalStock',
            'totalProduct',
            'totalCategory',
            'produkTerbaru',
            'kategoriTerbanyak',
            'produkTerbaruData',
            'kategoriTerbanyakData',
            'lowStockProducts' // <- kirim ke view
        ));
    }
}
