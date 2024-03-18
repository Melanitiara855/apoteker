<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use PDF;

class Generate_LaporanController extends Controller
{
    public function generate_laporan(Request $request)
    {
        if ($request->start && $request->end && $request->status) {
            $pembelian = Pembelian::whereBetween('tgl_beli', [$request->start, $request->end])
                ->where('nonota_beli', $request->status)
                ->get();
        } elseif ($request->start && $request->end) {
            $pembelian = Pembelian::whereBetween('tgl_beli', [$request->start, $request->end])->get();
        } elseif ($request->status) {
            $pembelian = Pembelian::where('nonota_beli', $request->status)->get();
        } else {
            $pembelian = Pembelian::get();
        }
        return view('generate_laporan', [
            'pembelian' => $pembelian,
        ]);
    }

    public function downloadpdf()
    {
        $pembelian = Pembelian::limit(20)->get();
        $pdf = PDF::loadView('generate_laporan-pdf', compact('pembelian'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('generate_laporan-pdf');
    }

}