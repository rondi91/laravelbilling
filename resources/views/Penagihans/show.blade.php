@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Detail Penagihan</h2>
    <div class="form-group">
        <label for="nama_pelanggan">Nama Pelanggan:</label>
        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="{{ $penagihan->pelanggan->nama }}" disabled>
    </div>
    <div class="form-group">
        <label for="tanggal_penagihan">Tanggal Penagihan:</label>
        <input type="date" class="form-control" id="tanggal_penagihan" name="tanggal_penagihan" value="{{ $penagihan->tanggal_penagihan }}" disabled>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah:</label>
        <input type="number" step="0.01" class="form-control" id="jumlah" name="jumlah" value="{{ $penagihan->jumlah }}" disabled>
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <input type="text" class="form-control" id="status" name="status" value="{{ $penagihan->status ? 'Lunas' : 'Belum Lunas' }}" disabled>
    </div>
    <a href="{{ route('penagihans.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
