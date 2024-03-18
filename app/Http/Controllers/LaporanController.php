<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function laporan(Request $request)
    {
        if ($request->start && $request->end && $request->status) {
            $penjualan = Penjualan::whereBetween('tgl_jual', [$request->start, $request->end])
                ->where('nonota_jual', $request->status)
                ->get();
        } elseif ($request->start && $request->end) {
            $penjualan = Penjualan::whereBetween('tgl_jual', [$request->start, $request->end])->get();
        } elseif ($request->status) {
            $penjualan = Penjualan::where('nonota_jual', $request->status)->get();
        } else {
            $penjualan = Penjualan::get();
        }
        return view('laporan', [
            'penjualan' => $penjualan,
        ]);
    }

    public function downloadpdf()
    {
        $penjualan = Penjualan::limit(20)->get();
        $pdf = PDF::loadView('laporan-pdf', compact('penjualan'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('laporan-pdf');
    }

}