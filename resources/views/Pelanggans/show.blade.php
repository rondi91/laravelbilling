@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Detail Pelanggan</h2>
    <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ $pelanggan->nama }}" disabled>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat:</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pelanggan->alamat }}" disabled>
    </div>
    <div class="form-group">
        <label for="telepon">Telepon:</label>
        <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $pelanggan->telepon }}" disabled>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $pelanggan->email }}" disabled>
    </div>
    <a href="{{ route('pelanggans.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
