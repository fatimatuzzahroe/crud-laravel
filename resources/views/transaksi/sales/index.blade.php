@extends('transaksi')
@section('konten-transaksi')
<div class="row">
<div class="col-md-6">
        <div class="card shadow">
            <div class="card-header">Transaksi Penjualan</div>
            <div class="card-body">
            <form method="post" action="{{ route('transaksi-sales-jual', Request::segment(3)) }}" class="mb-5">
                    @csrf
                    <div class="row">
                    <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Kode Cabang</label>
                               <select name="form_kode_cabang" class="form-select" onchange="location=this.value;" required>
                                    <option value="{{ route('transaksi-sales') }}">--pilih cabang--</option>
                                    @foreach ($data['kode_cabang'] as $c)
                                    <option {{ (Request::segment(3) == $c->kode_cabang) ? 'selected' : null }} value="{{ route('transaksi-sales', $c->kode_cabang) }}">{{$c->kode_cabang}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('form_kode_cabang'))
                                    <div class="badge text-bg-danger">{{ $errors->first('form_kode_cabang') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Kode Menu</label>
                                <select name="form_kode_menu" class="form-select" required>
                                    <option value="">--pilih menu--</option>
                                    @if (isset($data['kode_menu']))
                                        @foreach ($data['kode_menu'] as $m)
                                            <option value="{{$m->kode_menu}}">{{$m->kode_menu}} | {{$m->nama_menu}} {{$m->varian}} | Rp{{number_format($m->harga_jual, 0, ',', '.')}}</option>
                                        @endforeach
                                    @endif
                                </select>   
                                @if ($errors->has('form_kode_menu'))
                                    <div class="badge text-bg-danger">{{ $errors->first('form_kode_menu') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Jumlah</label>
                                <input type="number" name="form_jumlah" value="{{ old('form_jumlah') }}" class="form-control" minlength="5" required>
                                @if ($errors->has('form_jumlah'))
                                    <div class="badge text-bg-danger">{{ $errors->first('form_jumlah') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection