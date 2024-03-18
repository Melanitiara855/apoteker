<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Penjualan;
use App\Models\Detail_Penjualan;
use Illuminate\Http\Request;

class Detail_PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan data penjualan
        $detailpenjualan = Detail_Penjualan::all();
         return view('detail_penjualan.index', [
         'detail_penjualan' => $detailpenjualan
         ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'detail_penjualan.create',[
            'obat' => Obat::all(),
            'penjualan' => Penjualan::all()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    // {
    //     $request->validate([
    //         'id_penjualan'=>'required',
    //         'jumlah_jual' =>'required',
    //         'harga_jual' =>'required',
    //         'sub_total_jual' => 'required',
    //         'id_obat' => 'required'
    
    //     ]);
    //     $array = $request->only([
    //     'id_penjualan', 'jumlah_jual', 'harga_jual', 'sub_total_jual', 'id_obat'
    //     ]);
    
    //     $detailpenjualan = Detail_Penjualan::create($array);
    // return redirect()->route('detail_penjualan.index') 
    // ->with('success_message', 'Berhasil Menambah Data Detail Penjualan');
    // }

    {
        $request->validate([
            'id_penjualan' => 'required',
            'jumlah_jual' => 'required',
            'harga_jual' => 'required',
            'id_obat' => 'required'
        ]);
    
        $data = $request->only([
            'id_penjualan', 'harga_jual', 'jumlah_jual', 'id_obat'
        ]);
    
        $sub_total_jual = $request->input('harga_jual') * $request->input('jumlah_jual');
        $data['sub_total_jual'] = $sub_total_jual;
    
        // Lakukan perhitungan lainnya jika ada
    
        detail_penjualan::create($data);
    
        return redirect()->route('detail_penjualan.index')->with('success_message', 'Berhasil menambah Detail Penjualan Baru');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detailpenjualan = Detail_Penjualan::find($id);
        if (!$detailpenjualan) return redirect()->route('detail_penjualan.index')->with('error_message', 'penjualan dengan id = '.$id.' tidak ditemukan');
        return view('detail_penjualan.edit', [
        'detail_penjualan' => $detailpenjualan,
        'obat' => Obat::all(),
        'penjualan' => Penjualan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_penjualan' => 'required',
            'jumlah_jual' => 'required',
            'harga_jual' => 'required',
            'sub_total_jual'  => 'required',
            'id_obat'  => 'required',
            ]);
            $detailpenjualan = Detail_Penjualan::find($id);
            $detailpenjualan->id_penjualan = $request->id_penjualan;
            $detailpenjualan->jumlah_jual = $request->jumlah_jual;
            $detailpenjualan->harga_jual= $request->harga_jual;
            $detailpenjualan->sub_total_jual = $request->sub_total_jual;
            $detailpenjualan->id_obat = $request->id_obat;
          
            $detailpenjualan->save();
            return redirect()->route('detail_penjualan.index')->with('success_message', 'Berhasil Mengubah Data Detail Penjualan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detailpenjualan = Detail_Penjualan::find($id);

        if ($detailpenjualan) $detailpenjualan->delete();
        return redirect()->route('detail_penjualan.index')->with('success_message', 'Berhasil Menghapus Data Detail Penjualan');
    }
}
