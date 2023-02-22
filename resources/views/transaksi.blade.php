@extends('tampilan-utama')
@section('konten')

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ (Request::segment(2) == 'sales') ? 'active bg-primary text-white' : null }}" 
        href="{{ route('transaksi-sales') }}">Sales</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (Request::segment(2) == 'stock') ? 'active bg-primary text-white' : null }}"
        href="{{ route('transaksi-stock') }}">Stock</a>
    </li>
</ul>

<div class="row mt-4">
    <div class="col">
        @yield('konten-transaksi')
    </div>
</div>
@endsection