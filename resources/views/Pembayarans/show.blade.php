@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Detail Pembayaran</h2>
    <div class="form-group">
        <label for="id_penagihan">ID Penagihan:</label>
        <input type="text" class="form-control" id="id_penagihan" name="id_penagihan" value="{{ $pembayaran->penagihan->id }}" disabled>
    </div>
    <div class="form-group">
        <label for="tanggal_pembayaran">Tanggal Pembayaran:</label>
        <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" value="{{ $pembayaran->tanggal_pembayaran }}" disabled>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah:</label>
        <input type="number" step="0.01" class="form-control" id="jumlah" name="jumlah" value="{{ $pembayaran->jumlah }}" disabled>
    </div>
    <a href="{{ route('pembayarans.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
