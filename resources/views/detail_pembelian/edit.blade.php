@extends('adminlte::page')
@section('title', 'Edit Detail Pembelian')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Detail Pembelian</h1>
@stop
@section('content')
    <form action="{{route('detail_pembelian.update', $detail_pembelian)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="nonota_beli">No Nota beli</label>
                        <div class="input-group">
                            <input type="hidden" name="id_pembelian" id="id_pembelian"
                            value="{{$detail_pembelian->fpembelian->id ?? old('id_pembelian')}}">
                            <input type="text" class="form-control @error('nonota_beli') is-invalid @enderror"
                                placeholder="No Nota beli" id="nonota_beli" name="nonota_beli"
                                value="{{$detail_pembelian->fpembelian->nonota_beli ?? old('nonota_beli')}}" aria-label="No Nota" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop1"></i>Cari No Nota</button>
                        </div>
                    </div>

                        <div class="form-group">
                            <label for="exampleInputtgl_kadaluarsa">Tgl Kadaluarsa</label>
                            <input type="text" class="form-control
                            @error('tgl_kadaluarsa') is-invalid @enderror" id="exampleInputtgl_kadaluarsa"
                            placeholder="Tgl Kadaluarsa" name="tgl_kadaluarsa" value="{{$detail_pembelian->tgl_kadaluarsa ?? old('tgl_kadaluarsa')}}">
                            @error('tgl_kadaluarsa') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputtgl_beli">Tgl Beli</label>
                            <input type="datetime-local" class="form-control
                            @error('tgl_beli') is-invalid @enderror" id="exampleInputtgl_beli"
                            placeholder="Tgl Beli" name="tgl_beli" value="{{$detail_pembelian->tgl_beli ?? old('tgl_beli')}}">
                            @error('Tgl Beli') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputharga_beli">Harga Beli</label>
                            <input type="number " class="form-control
                            @error('harga_beli') is-invalid @enderror" id="exampleInputharga_beli"
                            placeholder="Harga Beli" name="harga_beli" value="{{$detail_pembelian->harga_beli ?? old('harga_beli')}}">
                            @error('Harga Beli') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjumlah_beli">Jumlah Beli</label>
                            <input type="number " class="form-control
                            @error('jumlah_beli') is-invalid @enderror" id="exampleInputjumlah_beli"
                            placeholder="Jumlah Beli" name="jumlah_beli" value="{{$detail_pembelian->jumlah_beli ?? old('jumlah_beli')}}">
                            @error('Jumlah Beli') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputsub_total_beli">Sub Total Beli</label>
                            <input type="number " class="form-control
                            @error('sub_total_beli') is-invalid @enderror" id="exampleInputsub_total_beli"
                            placeholder="Sub Total Beli" name="sub_total_beli" value="{{$detail_pembelian->sub_total_beli ?? old('sub_total_beli')}}">
                            @error('Sub Total Beli') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputpersen_margin_jual">Persen Margin Jual</label>
                            <input type="text " class="form-control
                            @error('persen_margin_jual') is-invalid @enderror" id="exampleInputpersen_margin_jual"
                            placeholder="Persen Margin Jual" name="persen_margin_jual" value="{{$detail_pembelian->persen_margin_jual ?? old('persen_margin_jual')}}">
                            @error('Persen Margin Jual') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                    <div class="form-group">
                        <label for="Id_Obat">Id_Obat</label>
                        <div class="input-group">
                            <input type="hidden" name="Id_Obat" id="Id_Obat" value="{{$detail_pembelian->fobat->id ?? old('Id_Obat')}}">
                            <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" 
                                placeholder="nama_obat" id="nama_obat" name="nama_obat" 
                                value="{{$detail_pembelian->fobat->nama_obat ?? old('nama_obat')}}" aria-label="nama_obat" ariadescribedby="cari" 
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Pembelian</h1>
                    <button type="button" class="btn-close" data-ds-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    <table class="table table-hover table-bordered tablestripped" id="example2">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nonota_Beli</th>
                                                <th>Tgl_Beli</th>
                                                <th>Total_Beli</th>
                                                <th>Id_Distributor</th>
                                                <th>Id_User</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pembelian as $key => $pembelian)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td id={{$key+1}}>{{$pembelian->nonota_beli}}</td>
                                                <td id={{$key+1}}>{{$pembelian->tgl_beli}}</td>
                                                <td id={{$key+1}}>{{$pembelian->id_distributor}}</td>
                                                <td id={{$key+1}}>{{$pembelian->id_user}}</td>

                                                <td>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="pilih1('{{$pembelian->id}}', '{{$pembelian->nonota_beli}}', '{{$pembelian->tgl_beli}}', '{{$pembelian->id_distributor}}',  '{{$pembelian->id_user}}')" data-bs-dismiss="modal">
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
                                                <th>Kode_Obat</th>
                                                <th>Nama_Obat</th>
                                                <th>Merk</th>
                                                <th>Jenis</th>
                                                <th>Satuan</th>
                                                <th>Golongan</th>
                                                <th>Kemasan</th>
                                                <th>Harga_Jual</th>
                                                <th>Stok</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($obat as $key => $obat)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td id={{$key+1}}>{{$obat->id}}</td>
                                                <td id={{$key+1}}>{{$obat->kode_obat}}</td>
                                                <td id={{$key+1}}>{{$obat->nama_obat}}</td>
                                                <td id={{$key+1}}>{{$obat->merk}}</td>
                                                <td id={{$key+1}}>{{$obat->jenis}}</td>
                                                <td id={{$key+1}}>{{$obat->satuan}}</td>
                                                <td id={{$key+1}}>{{$obat->golongan}}</td>
                                                <td id={{$key+1}}>{{$obat->kemasan}}</td>
                                                <td id={{$key+1}}>{{$obat->harga_jual}}</td>
                                                <td id={{$key+1}}>{{$obat->stok}}</td>



                                                <td>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="pilih('{{$obat->id}}', '{{$obat->kode_obat}}', '{{$obat->nama_obat}}', '{{$obat->merk}}', '{{$obat->jenis}}', '{{$obat->satuan}}', '{{$obat->golongan}}', '{{$obat->kemasan}}', '{{$obat->harga_jual}}', '{{$obat->stok}}')" data-bs-dismiss="modal">
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
                        <a href="{{route('detail_pembelian.index')}}" class="btn btn-default">Batal</a>
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
//Fungsi pilih untuk memilih data detail pembelian dan mengirimkan data Users dari Modal ke form edit
function pilih1(id, nonota_beli){
document.getElementById('id_pembelian').value = id
document.getElementById('nonota_beli').value = nonota_beli
}

$('#example3').DataTable({
    "responsive": true,
});
//Fungsi pilih untuk memilih data detail pembelian dan mengirimkan data Distributor dari Modal ke form edit
function pilih(id, nama_obat){
document.getElementById('id_obat').value = id
document.getElementById('nama_obat').value = nama_obat
}
</script>
@endpush