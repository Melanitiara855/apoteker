@extends('adminlte::page')
@section('title', 'Tambah Detail Penjualan')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Detail Penjualan</h1>
@stop
@section('content')
<form action="{{ route('detail_penjualan.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                    <label for="nonota_jual">No Nota Jual</label>
                        <div class="input-group">
                            <input type="hidden" name="id_penjualan" id="id_penjualan"
                            value="{{$detail_penjualan->fpenjualan->id ?? old('id_penjualan')}}">
                            <input type="text" class="form-control @error('nonota_jual') is-invalid @enderror"
                                placeholder="Masukkan Nonota jual" id="nonota_jual" name="nonota_jual"
                                value="{{$detail_penjualan->fpenjualan->nonota_jual ?? old('nonota_jual')}}" aria-label="No Nota jual" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>Cari No Nota</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_jual">Jumlah Jual</label>
                        <input type="text" class="form-control
@error('jumlah_jual') is-invalid @enderror" id="jumlah_jual" placeholder="Masukkan Jumlah Jual" name="jumlah_jual"
                            value="{{ old('jumlah_jual') }}">
                        @error('jumlah_jual')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="text" class="form-control
@error('harga_jual') is-invalid @enderror" id="harga_jual" placeholder="Masukkan Jumlah Penjualan" name="harga_jual"
                            value="{{ old('harga_jual') }}">
                        @error('harga_jual')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- <div class="form-group">
                        <label for="sub_total_jual">Sub total jual</label>
                        <input type="text" class="form-control
@error('sub_total_jual') is-invalid @enderror" id="sub_total_jual" placeholder="Masukkan Sub Total"
                            name="sub_total_jual" value="{{ old('sub_total_jual') }}">
                        @error('sub_total_jual')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> -->

                    <div class="form-group">
                        <label for="id_obat">Id Obat</label>
                        <div class="input-group">
                            <input type="hidden" name="id_obat" id="id_obat" value="{{$detail_penjualan->fobat->id ?? old('id_obat')}}">
                            <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" 
                                placeholder="nama_obat" id="nama_obat" name="nama_obat" 
                                value="{{$detail_penjualan->fobat->nama_obat ?? old('nama_obat')}}" aria-label="nama_obat" ariadescribedby="cari" 
                                readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" 
                            data-bs-target="#staticBackdrop1"></i>Cari Data Obat</button>
                        </div>
                    </div> 



                        <div class="card-footer">
                            <a href="{{ route('detail_penjualan.create') }}"><button type="submit"
                                    class="btn btn-primary">Simpan </button></a>
                            <a href="{{ route('detail_penjualan.index') }}"><button type="submit" class="btn btn-danger">Batal
                                    </button></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian No Nota Jual</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered table-stripped" id="example2">
                            <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nonota_Jual</th>
                                                <th>Tgl_Jual</th>
                                                <th>Total_Jual</th>
                                                <th>Id_User</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($penjualan as $key => $penjualan)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td id={{$key+1}}>{{$penjualan->nonota_jual}}</td>
                                                <td id={{$key+1}}>{{$penjualan->tgl_jual}}</td>
                                                <td id={{$key+1}}>{{$penjualan->total_jual}}</td>
                                                <td id={{$key+1}}>{{$penjualan->id_user}}</td>

                                                <td>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="pilih1('{{$penjualan->id}}', '{{$penjualan->nonota_jual}}', '{{$penjualan->tgl_jual}}', '{{$penjualan->total_jual}}',  '{{$penjualan->id_user}}')" data-bs-dismiss="modal">
                                                        Pilih  
                                                    </button>
                                                </td>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Id Obat</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered table-stripped" id="example3">
                            <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama_Obat</th>
                                                <th>opsi</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach($obat as $key => $obat)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$obat->nama_obat}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="pilih('{{$obat->id}}', '{{$obat->nama_obat}}')" data-bs-dismiss="modal">
                                                        Pilih
                                                    </button>
                                                </td>
                                                @endforeach
                                            </tbody>
                                        </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->

            @stop
            @push('js')
            <script>
                $('#example2').DataTable({
                    "responsive": true,
                });
                function pilih1(id, nonota_jual) {
                    document.getElementById('id_penjualan').value = id
                    document.getElementById('nonota_jual').value = nonota_jual
                }

                $('#example3').DataTable({
                    "responsive": true,
                });
                function pilih(id, nama_obat) {
                    document.getElementById('id_obat').value = id
                    document.getElementById('nama_obat').value = nama_obat
                }
            </script>
            @endpush