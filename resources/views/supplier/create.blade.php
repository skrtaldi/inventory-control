@extends('layouts.template')

@section('content')

{{-- @if($errors->any())
    <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif --}}

<!-- START FORM -->
<form action='{{ url('supplier') }}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('supplier') }}' class="btn btn-secondary btn-sm"> < Kembali</a>
        <div class="mb-3 row">
            <label for="kode" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kode' value="{{ old('kode') }}" id="kode">
                @if (count($errors) > 0)
                    <div style="width:auto; color:#dc4c64; margin-top:0.25rem;">
                    {{ $errors->first('kode') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Supplier</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{ old('nama') }}" id="nama">
                @if (count($errors) > 0)
                    <div style="width:auto; color:#dc4c64; margin-top:0.25rem;">
                    {{ $errors->first('nama') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nomor" class="col-sm-2 col-form-label">Nomor</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nomor' value="{{ old('nomor') }}" id="nomor">
                @if (count($errors) > 0)
                    <div style="width:auto; color:#dc4c64; margin-top:0.25rem;">
                    {{ $errors->first('nomor') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat' value="{{ old('alamat') }}" id="alamat">
                @if (count($errors) > 0)
                    <div style="width:auto; color:#dc4c64; margin-top:0.25rem;">
                    {{ $errors->first('alamat') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="mb-3 row">
            <label for="simpan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection
