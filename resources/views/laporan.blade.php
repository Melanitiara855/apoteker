@extends('adminlte::page')
@section('title', 'Report Generate')
@section('content_header')
<h1 class="m-0 text-dark">&nbsp; Report Generate</h1>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <link rel="stylesheet" href="/css/app.css">
                <div class="card-header">
                    <h4>Data Reservasi</h4> <a href="{{url('download-laporan-pdf')}}" target="_blank">
                    <button class="btn btn-peach"><i class="fa fa-file "></i> &nbsp; Buka PDF</button>
                </a>
                </div>
                <div class="card-body">
                    <form method="get" action="{{ route('laporan') }}" class="form-inline">
                        <div class="form-group mb-2">
                        <label for="tgl_jual">Tanggal jual</label>
                        <input type="date" class="form-control @error('tgl_jual') is-invalid @enderror" id="tgl_jual" placeholder="Tanggal jual" name="tgl_jual" value="{{old('tgl_jual')}}">
                        </div>
                        <!-- <div class="form-group mx-sm-3 mb-2">
                        <label for="exampleInputtgl_beli">Tanggal Beli</label>
                        <input type="date" class="form-control @error('tgl_beli') is-invalid @enderror" id="exampleInputtgl_beli" placeholder="Tanggal Beli" name="tgl_beli" value="{{old('tgl_beli')}}">
                        </div> -->
                        <div class="form-group mb-2">
                            <!-- <label for="status" class="card-body">Status:</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">-- Pilih Status --</option>
                                <option value="pesan">Pesan</option>
                                <option value="dibayar">Dibayar</option>
                                <option value="selesai">Selesai</option>
                            </select> -->
                        </div>
                        &nbsp;
                        &nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-filter "></i> &nbsp;Filter</button>
                    </form>

                    <div class="table-responsive">
                    <table class="table table-hover table-bordered 
table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No Nota Jual</th>
                            <th>Tanggal Jual</th>
                            <th>Total Jual</th>
                            <th>Id Users</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penjualan as $key => $penjualan)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}} >{{$penjualan->nonota_jual}}</td>
                            <td>{{$penjualan->tgl_jual}}</td>
                            <td>{{$penjualan->total_jual}}</td>
                            <td>{{$penjualan->fuser->name}}</td>
            </td>
        </tr>
        @endforeach
    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
        <script>
        $(document).ready(function() {
            $('table:not(#laporan)').DataTable();

            $('#laporan').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'pdfHtml5',
                    'print'
                ],
                footer: true
            });
        });
    </script>
</div>

@endsection