@extends('adminlte::page')
@section('title', 'Edit Detail Penjualan')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Detail Penjualan</h1>
@stop
@section('content')
    <form action="{{route('detail_penjualan.update', $detail_penjualan)}}" method="post">
        @method('PUT')
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
                                placeholder="No Nota jual" id="nonota_jual" name="nonota_jual"
                                value="{{$detail_penjualan->fpenjualan->nonota_jual ?? old('nonota_jual')}}" aria-label="No Nota Jual" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop1"></i>Cari No Nota Jual</button>
                        </div>
                    </div>
                    
                        <div class="form-group">
                            <label for="exampleInputjumlah_jual">Jumlah Jual</label>
                            <input type="number " class="form-control
                            @error('jumlah_jual') is-invalid @enderror" id="exampleInputjumlah_jual"
                            placeholder="Jumlah Jual" name="jumlah_jual" value="{{$detail_penjualan->jumlah_jual ?? old('jumlah_jual')}}">
                            @error('Jumlah Jual') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputharga_jual">Harga Jual</label>
                            <input type="number " class="form-control
                            @error('harga_jual') is-invalid @enderror" id="exampleInputharga_jual"
                            placeholder="Harga Jual" name="harga_jual" value="{{$detail_penjualan->harga_jual ?? old('harga_jual')}}">
                            @error('Harga Jual') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputsub_total_jual">Sub Total Jual</label>
                            <input type="number " class="form-control
                            @error('sub_total_jual') is-invalid @enderror" id="exampleInputsub_total_jual"
                            placeholder="Sub Total Jual" name="sub_total_jual" value="{{$detail_penjualan->sub_total_jual ?? old('sub_total_jual')}}">
                            @error('Sub Total Jual') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                    <div class="form-group">
                        <label for="id_obat">Id_Obat</label>
                        <div class="input-group">
                            <input type="hidden" name="id_obat" id="id_obat" value="{{$detail_penjualan->fobat->id ?? old('id_obat')}}">
                            <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" 
                                placeholder="nama_obat" id="nama_obat" name="nama_obat" 
                                value="{{$detail_penjualan->fobat->nama_obat ?? old('nama_obat')}}" aria-label="Nama Distributor" ariadescribedby="cari" 
                                readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" 
                            data-bs-target="#staticBackdrop"></i>Cari Data Obat</button>
                        </div>
                    </div> 

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop1" data-bsbackdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data No Nota</h1>
                    <button type="button" class="btn-close" data-ds-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    <table class="table table-hover table-bordered tablestripped" id="example2">
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
                    <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Obat</h1>
                    <button type="button" class="btn-close" data-ds-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    <table class="table table-hover table-bordered tablestripped" id="example2">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama_Obat</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($obat as $key => $obat)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$obat->nama_obat}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="pilih('{{$obat->id}}','{{$obat->nama_obat}}')" data-bs-dismiss="modal">
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

                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('detail_penjualan.index')}}" class="btn btn-default">Batal</a>
                    </div>
                    </a>
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
//Fungsi pilih untuk memilih data detail penjualan dan mengirimkan data Users dari Modal ke form edit
function pilih1(id, nonota_jual){
document.getElementById('id_penjualan').value = id
document.getElementById('nonota_jual').value = nonota_jual
}

$('#example3').DataTable({
    "responsive": true,
});
//Fungsi pilih untuk memilih data detail penjualan dan mengirimkan data Distributor dari Modal ke form edit
function pilih(id, nama_obat){
document.getElementById('id_obat').value = id
document.getElementById('nama_obat').value = nama_obat
}
</script>
@endpush