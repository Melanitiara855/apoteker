@extends('adminlte::page')
@section('title', 'Tambah Penjualan')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Penjualan</h1>
@stop
@section('content')
<form action="{{route('penjualan.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputNonota_Jual">Nonota_Jual</label>
                        <input type="text" class="form-control
@error('nonota_jual') is-invalid @enderror" 
                            id="exampleInputNonota_Jual" placeholder="nonota_Jual" name="nonota_jual"
                            value="{{ old('nonota_jual') }}"> 
                            @error('nonota_jual')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTgl_Jual">Tgl_Jual</label>
                        <input type="datetime-local" class="form-control
@error('tgl_jual') is-invalid @enderror" 
                            id="exampleInputtgl_jual" placeholder="tgl_jual" name="tgl_jual"
                            value="{{ old('tgl_jual') }}">
                        @error('tgl_jual')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTotal_Jual">Total_Jual</label>
                        <input type="number" class="form-control
@error('total_jual') is-invalid @enderror" 
                            id="exampleInputTotal_Jual" placeholder="total_Jual" name="total_jual"
                            value="{{ old('total_jual') }}">
                        @error('total_jual')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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

                        <div class="card-footer">
                        <a href="{{route('detail_penjualan.create') }}"> <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('penjualan.index') }}"
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
 //Fungsi pilih untuk memilih data penjualan dan mengirimkan data Users dari Modal ke form tambah
 function pilih1(id, usr){
 document.getElementById('id_user').value = id
 document.getElementById('users').value = usr
 } 
 </script> 
@endpush