@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Detail Riwayat Perubahan Paket</h2>
    <div class="form-group">
        <label for="id_pelanggan">Pelanggan:</label>
        <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="{{ $riwayatPerubahanPaket->pelanggan->nama }}" disabled>
    </div>
    <div class="form-group">
        <label for="id_paket_sebelum">Paket Sebelum:</label>
        <input type="text" class="form-control" id="id_paket_sebelum" name="id_paket_sebelum" value="{{ $riwayatPerubahanPaket->paketSebelum }}" disabled>
    </div>
    <div class="form-group">
        <label for="id_paket_sesudah">Paket Sesudah:</label>
        <input type="text" class="form-control" id="id_paket_sesudah" name="id_paket_sesudah" value="{{ $riwayatPerubahanPaket->paketSesudah }}" disabled>
    </div>
    <div class="form-group">
        <label for="tanggal_perubahan">Tanggal Perubahan:</label>
        <input type="date" class="form-control" id="tanggal_perubahan" name="tanggal_perubahan" value="{{ $riwayatPerubahanPaket->tanggal_perubahan }}" disabled>
    </div>
    <a href="{{ route('riwayat-perubahan-pakets.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
