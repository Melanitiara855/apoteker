<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan Semua Data Obat
        $obat = Obat::all();
        return view('obat.index', [
            'obat' => $obat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Menampilkan Form Tambah Obat
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan Data Obat Baru
        $request->validate([
            'kode_obat'  => 'required|unique:obat,kode_obat',
            'nama_obat'  => 'required|unique:obat,nama_obat',
            'merk'  => 'required',
            'jenis'  => 'required',
            'golongan'  => 'required',
            'kemasan'  => 'required',
            'satuan' => 'required',
            'harga_jual' => 'required',
            'stok'  => 'required'
        ]);
        $array = $request->only([
            'kode_obat', 'nama_obat', 'merk', 'jenis', 'golongan', 'kemasan', 'satuan', 'harga_jual', 'stok'
        ]);
        $obat = Obat::create($array);
        return redirect()->route('obat.index')->with('success_message', 'Berhasil Menambah Obat Baru');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //Menampilkan Form Edit
        $obat = Obat::find($id);
        if (!$obat) return redirect()->route('obat.index')
        ->with('error_message', 'Obat dengan id'.$id.' tidak ditemukan');
        return view('obat.edit', [
            'obat' => $obat
        ]);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Mengedit Obat User
        $request->validate([
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'golongan'  => 'required',
            'kemasan'  => 'required',
            'satuan' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required'
        ]);
        $obat = Obat::find($id);
        $obat->kode_obat = $request->kode_obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->merk = $request->merk;
        $obat->jenis = $request->jenis;
        $obat->golongan = $request->golongan;
        $obat->kemasan = $request->kemasan;
        $obat->satuan = $request->satuan;
        $obat->harga_jual = $request->harga_jual;
        $obat->stok = $request->stok;
        $obat->save();
        return redirect()->route('obat.index')->with('success_message', 'Berhasil Mengubah Obat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Menghapus Obat
        $obat = Obat::find($id);

        if ($obat) $obat->delete();
        return redirect()->route('obat.index')->with('success_message', 'Berhasil Menghapus Obat');
    }
}