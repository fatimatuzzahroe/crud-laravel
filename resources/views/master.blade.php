@extends('tampilan-utama')
@section('konten')
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{(Request::segment(2) == 'cabang') ? 'active bg-primary text-white' : null }}" href="{{route('master-cabang')}}">Cabang</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{(Request::segment(2) == 'menuresto') ? 'active bg-primary text-white' : null }}" href="{{route('master-menuresto')}}">Menu Restoran</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Kategori Menu</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href ="#">Status Stok</a>
  </li>
</ul>

<div class="row mt-4">
    <div class="col">
        @yield('konten-master')
    <div>
<div>
    
@endsection