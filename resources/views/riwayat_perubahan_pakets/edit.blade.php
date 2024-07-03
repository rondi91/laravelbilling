@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Edit Riwayat Perubahan Paket</h2>
    <form action="{{ route('riwayat-perubahan-pakets.update', $riwayatPerubahanPaket->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_pelanggan">Pelanggan:</label>
            <select class="form-control" id="id_pelanggan" name="id_pelanggan" required>
                @foreach ($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id_pelanggan }}" {{ $riwayatPerubahanPaket->id_pelanggan == $pelanggan->id_pelanggan ? 'selected' : '' }}>{{ $pelanggan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_paket_sebelum">Paket Sebelum:</label>
            <select class="form-control" id="id_paket_sebelum" name="id_paket_sebelum" required>
                @foreach ($pakets as $paket)
                    <option value="{{ $paket->id_paket }}" {{ $riwayatPerubahanPaket->id_paket_sebelum == $paket->id_paket ? 'selected' : '' }}>{{ $paket->nama_paket }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_paket_sesudah">Paket Sesudah:</label>
            <select class="form-control" id="id_paket_sesudah" name="id_paket_sesudah" required>
                @foreach ($pakets as $paket)
                    <option value="{{ $paket->id_paket }}" {{ $riwayatPerubahanPaket->id_paket_sesudah == $paket->id_paket ? 'selected' : '' }}>{{ $paket->nama_paket }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_perubahan">Tanggal Perubahan:</label>
            <input type="date" class="form-control" id="tanggal_perubahan" name="tanggal_perubahan" value="{{ $riwayatPerubahanPaket->tanggal_perubahan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
