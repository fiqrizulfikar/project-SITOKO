<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SalesExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SalesReportExport;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('product')->latest()->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stock < $request->quantity) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi.');
        }

        $total = $product->price * $request->quantity;

        Sale::create([
            'product_id'  => $request->product_id,
            'quantity'    => $request->quantity,
            'total_price' => $total,
        ]);

        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->route('sales')->with('success', 'Transaksi berhasil dicatat.');
    }

    /**
     * Export semua data ke Excel
     */
    public function exportExcel(Request $request)
    {
        $start = $request->start_date;
        $end = $request->end_date;

        return Excel::download(new SalesExport($start, $end), 'data-transaksi.xlsx');
    }

    /**
     * Export semua data ke PDF
     */
    public function exportPdf(Request $request)
    {
        $sales = Sale::with('product')->latest();

        if ($request->filled(['start_date', 'end_date'])) {
            $start = $request->start_date . ' 00:00:00';
            $end = $request->end_date . ' 23:59:59';

            $sales = $sales->whereBetween('created_at', [$start, $end]);
        }

        $sales = $sales->get();
        $total = $sales->sum('total_price');

        $pdf = Pdf::loadView('sales.export-pdf', [
            'sales' => $sales,
            'total' => $total,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return $pdf->download('laporan-penjualan.pdf');
    }

    /**
     * Tampilkan form filter laporan
     */
    public function reportForm()
    {
        return view('sales.report');
    }

    /**
     * Proses laporan berdasarkan tanggal
     */
    public function report(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $start = $request->start_date . ' 00:00:00';
        $end = $request->end_date . ' 23:59:59';

        $sales = Sale::with('product')
            ->whereBetween('created_at', [$start, $end])
            ->get();

        $total = $sales->sum('total_price');

        return view('sales.report', [
            'sales'      => $sales,
            'total'      => $total,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
        ]);
    }

     public function exportReportExcel(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $filename = 'laporan-penjualan-' . now()->format('YmdHis') . '.xlsx';

        return Excel::download(
            new SalesReportExport($request->start_date, $request->end_date),
            $filename
        );
    }
}
