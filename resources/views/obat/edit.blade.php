@extends('adminlte::page')
@section('title', 'Edit Obat')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Obat</h1>
@stop
@section('content')
    <form action="{{route('obat.update', $obat)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="exampleInputkode_obat">Kode Obat</label>
                            <input type="text" class="form-control
                            @error('kode_obat') is-invalid @enderror" id="exampleInputkode_obat"
                            placeholder="Kode Obat" name="kode obat" value="{{$obat->kode_obat ?? old('kode_obat')}}">
                            @error('kode_obat') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputnama_obat">Nama Obat</label>
                            <input type="text" class="form-control
                            @error('nama_obat') is-invalid @enderror" id="exampleInputnama_obat"
                            placeholder="Nama Obat" name="nama obat" value="{{$obat->nama_obat ?? old('nama_obat')}}">
                            @error('nama_obat') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputmerk">Merk Obat</label>
                            <input type="text" class="form-control
                            @error('merk') is-invalid @enderror" id="exampleInputmerk"
                            placeholder="Merk" name="merk" value="{{$obat->merk ?? old('merk')}}">
                            @error('merk') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjenis">Jenis Obat</label>
                            <input type="text" class="form-control
                            @error('jenis') is-invalid @enderror" id="exampleInputjenis"
                            placeholder="Jenis" name="jenis" value="{{$obat->jenis ?? old('jenis')}}">
                            @error('jenis') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputsatuan">Satuan Obat</label>
                            <input type="text" class="form-control
                            @error('satuan') is-invalid @enderror" id="exampleInputsatuan"
                            placeholder="Satuan" name="satuan" value="{{$obat->satuan ?? old('satuan')}}">
                            @error('satuan') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputgolongan">Golongan Obat</label>
                            <input type="text" class="form-control
                            @error('golongan') is-invalid @enderror" id="exampleInputgolongan"
                            placeholder="Golongan" name="golongan" value="{{$obat->golongan ?? old('golongan')}}">
                            @error('golongan') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputkode_obat">Kemasan Obat</label>
                            <input type="text" class="form-control
                            @error('kemasan') is-invalid @enderror" id="exampleInputkemasan"
                            placeholder="Kemasan" name="kemasan" value="{{$obat->kemasan ?? old('kemasan')}}">
                            @error('kemasan') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputharga_jual">Harga Jual</label>
                            <input type="text" class="form-control
                            @error('harga_jual') is-invalid @enderror" id="exampleInputharga_jual"
                            placeholder="Harga Jual" name="harga jual" value="{{$obat->harga_jual ?? old('harga_jual')}}">
                            @error('harga_Jual') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputstok">Stok Obat</label>
                            <input type="text" class="form-control
                            @error('stok') is-invalid @enderror" id="exampleInputstok"
                            placeholder="Stok" name="stok" value="{{$obat->stok ?? old('stok')}}">
                            @error('stok') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('obat.index')}}" class="btn btn-default">Batal</a>
                    </div>
                </div>
            </div>
        </div>
@stop