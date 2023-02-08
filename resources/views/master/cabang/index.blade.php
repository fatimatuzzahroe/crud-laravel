@extends('master')
@section('konten-master')


<div class="row">
    <div class="col-12 text-end mb-3">
        <a href="{{ route('master-cabang-tambah')}}" class="btn btn-outline-success">
            <i class="fa-solid fa-plus"></i> Tambah Cabang Baru
        </a>
    </div>
    <div class="col-md-4">
            <div class="card">
            <img src="{{ asset('images/emporium.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">EMP - Emporium Pluit Mall</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>
    </div>
</div>

@endsection