<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\pembelian;
use App\Models\Detail_Pembelian;
use Illuminate\Http\Request;

class Detail_PembelianController extends Controller
{
    public function index()
    {
         //menampilkan detail_Pembelian
         $detailpembelian = Detail_Pembelian::all();
         return view('detail_pembelian.index', [
         'detail_pembelian' => $detailpembelian
         ]);
    }

    public function create()
    {
        return view(
            'detail_pembelian.create',[
            'obat' => Obat::all(),
            'pembelian' => Pembelian::all()
            ]);
    }

    public function store(Request $request)
//     {
//         $request->validate([
//         'id_pembelian'=>'required',
//         'tgl_kadaluarsa' => 'required',
//         'harga_beli' =>'required',
//         'jumlah_beli' =>'required',
//         'sub_total_beli' => 'required',
//         'persen_margin_jual' => 'required',
//         'id_obat' => 'required'

//     ]);
//     $array = $request->only([
//     'id_pembelian', 'tgl_kadaluarsa', 'harga_beli','jumlah_beli','sub_total_beli','persen_margin_jual','id_obat'
//     ]);

//     $detailpembelian = Detail_Pembelian::create($array);
// return redirect()->route('detail_pembelian.index') 
// ->with('success_message', 'Berhasil Menambah Data Detail Pembelian');
// }

{
    $request->validate([
        'id_pembelian' => 'required',
        'tgl_kadaluarsa' => 'required',
        'harga_beli' => 'required',
        'jumlah_beli' => 'required',
        'persen_margin_jual' => 'required',
        'id_obat' => 'required'
    ]);

    $data = $request->only([
        'id_pembelian', 'tgl_kadaluarsa', 'harga_beli', 'jumlah_beli', 'persen_margin_jual', 'id_obat'
    ]);

    $sub_total_beli = $request->input('harga_beli') * $request->input('jumlah_beli');
    $data['sub_total_beli'] = $sub_total_beli;

    // Lakukan perhitungan lainnya jika ada

    detail_pembelian::create($data);

    return redirect()->route('detail_pembelian.index')->with('success_message', 'Berhasil menambah Detail Pembelian Baru');
}

public function edit($id)
    {
        $detailpembelian = Detail_Pembelian::find($id);
        if (!$detailpembelian) return redirect()->route('detail_pembelian.index')->with('error_message', 'pembelian dengan id = '.$id.' tidak ditemukan');
        return view('detail_pembelian.edit', [
        'detail_pembelian' => $detailpembelian,
        'obat' => Obat::all(),
        'pembelian' => Pembelian::all()
        ]);
    
    }

public function update(Request $request, $id)
    {
        $request->validate([
            'id_pembelian' => 'required',
            'tgl_kadaluarsa' => 'required',
            'harga_beli' => 'required',
            'jumlah_beli' => 'required',
            'sub_total_beli'  => 'required',
            'persen_margin_jual'  => 'required',
            'id_obat'  => 'required',
            ]);
            $detailpembelian = Detail_Pembelian::find($id);
            $detailpembelian->id_pembelian = $request->id_pembelian;
            $detailpembelian->tgl_kadaluarsa = $request->tgl_kadaluarsa;
            $detailpembelian->harga_beli= $request->harga_beli;
            $detailpembelian->jumlah_beli = $request->jumlah_beli;
            $detailpembelian->sub_total_beli = $request->sub_total_beli;
            $detailpembelian->persen_margin_jual = $request->persen_margin_jual;
            $detailpembelian->id_obat = $request->id_obat;
          
            $detailpembelian->save();
            return redirect()->route('detail_pembelian.index')->with('success_message', 'Berhasil Mengubah Data Detail Pembelian');
    
    }

public function destroy($id)
    {
        $detailpembelian = Detail_Pembelian::find($id);

        if ($detailpembelian) $detailpembelian->delete();
        return redirect()->route('detail_pembelian.index')->with('success_message', 'Berhasil Menghapus Data Detail Pembelian');
    }
}