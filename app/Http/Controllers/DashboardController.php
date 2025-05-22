<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total stok, total produk, dan total kategori
        $totalStock = Product::sum('stock');
        $totalProduct = Product::count();
        $totalCategory = Category::count();

        // Mengambil 5 produk terbaru
        $produkTerbaru = Product::latest()->take(5)->get();

        // Mengambil 5 kategori dengan jumlah produk terbanyak
        $kategoriTerbanyak = Category::withCount('products')
            ->orderByDesc('products_count')
            ->take(5)
            ->get();

        // Menyiapkan data untuk chart Produk Terbaru (Area Chart)
        $produkTerbaruData = $produkTerbaru->map(function ($produk) {
            return [
                'name' => $produk->name,
                'quantity' => $produk->stock,
            ];
        });

        // Menyiapkan data untuk chart Kategori Terbanyak (Pie Chart)
        $kategoriTerbanyakData = $kategoriTerbanyak->map(function ($kategori) {
            return [
                'name' => $kategori->name,
                'product_count' => $kategori->products_count,
            ];
        });

        // Mengirimkan data ke view dashboard
        return view('dashboard', compact(
            'totalStock',
            'totalProduct',
            'totalCategory',
            'produkTerbaru',
            'kategoriTerbanyak',
            'produkTerbaruData',
            'kategoriTerbanyakData'
        ));
    }
}
