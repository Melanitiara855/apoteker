@extends('adminlte::page')
@section('title', 'Tambah pembelian')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Pembelian</h1>
@stop
@section('content')
<form action="{{route('pembelian.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <div class="form-group">
                        <label for="exampleInputNonota_Beli">Nonota_Beli</label>
                        <input type="text" class="form-control
@error('nonota_beli') is-invalid @enderror" 
                            id="exampleInputNonota_Beli" placeholder="Nonota_Beli" name="nonota_beli"
                            value="{{ old('nonota_beli') }}"> 
                            @error('nonota_beli')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTgl_Beli">Tgl_Beli</label>
                        <input type="datetime-local" class="form-control
@error('tgl_beli') is-invalid @enderror" 
                            id="exampleInputtgl_beli" placeholder="tgl_beli" name="tgl_beli"
                            value="{{ old('tgl_beli') }}">
                        @error('tgl_beli')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTotal_Beli">Total_Beli</label>
                        <input type="number" class="form-control
@error('total_beli') is-invalid @enderror" 
                            id="exampleInputTotal_Beli" placeholder="Total_Beli" name="total_beli"
                            value="{{ old('total_beli') }}">
                        @error('total_beli')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Id_distributor">Id_Distributor</label>
                        <div class="input-group">
                            <input type="hidden" name="id_distributor" id="id_distributor" value="{{old('id_distributor')}}">
                            <input type="text" class="form-control @error('distributor')  is-invalid  @enderror"
                                placeholder="Distributor" id="distributor" name="distributor"
                                value="{{old('distributor')}}" aria- label="Distributor" aria-describedby="cari"
                                readonly>
                            <button class="btn  btn-primary" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop1"></i> Cari Data Distributor</button>
                        </div>

                    <div class="form-group">
                        <label for="Id_User">Id_User</label>
                        <div class="input-group">
                            <input type="hidden" name="id_user" id="id_user" value="{{old('id_user')}}">
                            <input type="text" class="form-control @error('users')  is-invalid  @enderror"
                                placeholder="Users" id="users" name="users"
                                value="{{old('users')}}" aria- label="Users" aria-describedby="cari"
                                readonly>
                            <button class="btn  btn-primary" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i> Cari Data Users</button>
                        </div>
                        
                        <!--  Modal  -->
                        <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1" arialabelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5"id="staticBackdropLabel">Pencarian Data Users</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                        <table class="table table-hover table-bordered table-stripped" id="example2">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Level</th>
                                                    <th>Aktif</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $key => $user)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td id={{$key+1}}>{{$user->name}}</td>
                                                    <td id={{$key+1}}>{{$user->email}}</td>
                                                    <td id={{$key+1}}>{{$user->level}}</td>
                                                    <td id={{$key+1}}>{{$user->aktif}}</td>
                                                    <td>
                                                        <button type="button" class="btn  btn-primary"
                                                            onclick="pilih1('{{$user->id}}',  '{{$user->name}}', '{{$user->email}}', '{{$user->level}}','{{$user->aktif}}')" data-bs-dismiss="modal">
                                                            Pilih
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--  Modal  -->
                        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" 
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5"
                        id="staticBackdropLabel">Pencarian Data Distributor</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                        <table class="table table-hover table-bordered table-stripped" id="example4">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama_Distributor</th>
                                                    <th>Alamat</th>
                                                    <th>Notelepon</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($distributor as $key => $distributor)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td id={{$key+1}}>{{$distributor->id}}</td>
                                                    <td id={{$key+1}}>{{$distributor->nama_distributor}}</td>
                                                    <td id={{$key+1}}>{{$distributor->alamat}}</td>
                                                    <td id={{$key+1}}>{{$distributor->notelepon}}</td>
                                                    

                                                    <td>
                                                        <button type="button" class="btn  btn-primary" onclick="pilih2('{{$distributor->id}}',  '{{$distributor->nama_distributor}}')"  data-bs-dismiss="modal">
                                                            Pilih
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-footer">
                        <a href="{{route('detail_pembelian.create') }}"> <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('pembelian.index') }}"
                            class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js') 
 <script> 
 $('#example2').DataTable({
 "responsive": true, 
 });
 //Fungsi pilih untuk memilih data pembelian dan mengirimkan data Users dari Modal ke form tambah
 function pilih1(id, usr){
 document.getElementById('id_user').value = id
 document.getElementById('users').value = usr
 } 

 $('#example4').DataTable({
 "responsive": true, 
 });
 //Fungsi pilih untuk memilih data pembelian dan mengirimkan data Distributor dari Modal ke form tambah
 function pilih2(id, dstbr){
 document.getElementById('id_distributor').value = id
 document.getElementById('distributor').value = dstbr
 } 
 </script> 
@endpush