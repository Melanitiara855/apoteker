<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #e9e9e9;
    }

    tr:hover {
        background-color: #ddd;
    }
</style>
<table class="table table-hover table-bordered 
table-stripped" id="example3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No Nota Beli</th>
                            <th>Tanggal Beli</th>
                            <th>Total Beli</th>
                            <th>Id Users</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembelian as $key => $pembelian)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}} >{{$pembelian->nonota_beli}}</td>
                            <td>{{$pembelian->tgl_beli}}</td>
                            <td>{{$pembelian->total_beli}}</td>
                            <td>{{$pembelian->fuser->name}}</td>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>