@extends('master')
@section('konten-master')
<form method="post" action="{{ route('master-cabang-simpan') }}" class="mb-5">
@csrf    
<div class="row">
        <div class="col-3">
            <div class="mb-5">
                <label class="form-label">Kode Cabang</label>
                <input type="text" name="form_kode_cabang" value="{{ old('form_kode_cabang') }}" class="form-control" minlength="3" maxlength="3" required>
                @if ($errors->has('form_kode_cabang'))
                    <div class="badge text-bg-danger">{{ $errors->first('form_kode_cabang') }}</div>
                @endif
            </div>
        </div>
        <div class="col-9">
            <div class="mb-5">
                <label class="form-label">Nama Cabang</label>
                <input type="text" name="form_nama_cabang" value="{{ old('form_nama_cabang') }}" class="form-control" minlength="5" required>
            </div>
        </div>
    </div>
    <div class="mb-5">
        <label class="form-label">Nomor Telepon</label>
        <input type="text" name="form_notelp_cabang" value="{{ old('form_notelp_cabang') }}" class="form-control">
        @if ($errors->has('form_notelp_cabang'))
            <div class="badge text-bg-danger">{{ $errors->first('form_notelp_cabang') }}</div>
        @endif
    </div>
    <div class="mb-5">
        <textarea name="form_alamat_cabang" rows="5" class="form-control">{{ old('form_alamat_cabang') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection