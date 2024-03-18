@extends('adminlte::page')
@section('title', 'Tambah Obat')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Obat</h1>
@stop
@section('content')
<form action="{{route('obat.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputkode_obat">Kode Obat</label>
                        <input type="text" class="form-control
@error('kode_obat') is-invalid @enderror" id="exampleInputkode_obat" placeholder="Kode Obat" name="kode_obat"
                            value="{{old('kode_obat')}}">
                        @error('Kode Obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputnama_obat">Nama Obat</label>
                        <input type="text" class="form-control
@error('nama_obat') is-invalid @enderror" id="exampleInputkode_obat" placeholder="Nama Obat" name="nama_obat"
                            value="{{old('nama_obat')}}">
                        @error('Nama Obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputmerk">Merk Obat</label>
                        <input type="text" class="form-control
@error('merk') is-invalid @enderror" id="exampleInputmerk" placeholder="Merk" name="merk" value="{{old('merk')}}">
                        @error('Merk') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputjenis">Jenis Obat</label>
                        <input type="text" class="form-control
@error('jenis') is-invalid @enderror" id="exampleInputjenis" placeholder="Jenis" name="jenis" value="{{old('jenis')}}">
                        @error('Jenis') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputSatuan">Satuan Obat</label>
                        <input type="text" class="form-control
@error('satuan') is-invalid @enderror" id="exampleInputSatuan" placeholder="Satuan" name="satuan"
                            value="{{old('satuan')}}">
                        @error('Satuan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputgolongan">Golongan Obat</label>
                        <input type="golongan" class="form-control
@error('golongan') is-invalid @enderror" id="exampleInputgolongan" placeholder="Golongan" name="golongan"
                            value="{{old('golongan')}}">
                        @error('golongan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputkemasan">Kemasan Obat</label>
                        <input type="text" class="form-control
@error('kemasan') is-invalid @enderror" id="exampleInputkemasan" placeholder="Kemasan" name="kemasan"
                            value="{{old('kemasan')}}">
                        @error('Kemasan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputharga_jual">Harga_Jual</label>
                        <input type="text" class="form-control
@error('harga_jual') is-invalid @enderror" id="exampleInputharga_jual" placeholder="Harga Jual" name="harga_jual"
                            value="{{old('harga_jual')}}">
                        @error('Harga Jual') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputstok">Stok Obat</label>
                        <input type="text" class="form-control
@error('stok') is-invalid @enderror" id="exampleInputstok" placeholder="Stok" name="stok" value="{{old('stok')}}">
                        @error('Stok') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('obat.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @stop
