@extends('transaksi')
@section('konten-transaksi')
<div class="row">
    <div class="col-12 text-end mb-3">
        <a href="{{ route('transaksi-stock-tambah') }}" class="btn btn-outline-success">
            <i class="fa-solid fa-plus"></i> Datang barang
        </a>
    </div>
    <div class="col-12">
        <table class="table table-hover">
            <thead class="bg-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cabang</th>
                    <th scope="col">Kode Menu</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            @php
                    $i = 1;
                @endphp
                @foreach ($stok as $s)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $s->kode_cabang }}</td>
                        <td>{{ $s->kode_menu }}</td>
                        <td>{{ $s->nama_menu }} {{ $s->varian }}</td>
                        <td>{{ $s->harga_jual }}</td>
                        <td>{{ $s->qty }}</td>
                        <td>{{ $s->kode_status }} ({{ $s->nama_status }})</td>
                    </tr>
                @endforeach
           
            </tbody>
        </table>
    </div>
</div>

@endsection