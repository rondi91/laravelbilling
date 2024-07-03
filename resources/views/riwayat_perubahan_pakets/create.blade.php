@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Tambah Riwayat Perubahan Paket</h2>
    <form action="{{ route('riwayat-perubahan-pakets.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_pelanggan">Pelanggan:</label>
            <select class="form-control" id="id_pelanggan" name="id_pelanggan" required>
                @foreach ($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id_pelanggan }}">{{ $pelanggan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_paket_sebelum">Paket Sebelum:</label>
            <select class="form-control" id="id_paket_sebelum" name="id_paket_sebelum" required>
                @foreach ($pakets as $paket)
                    <option value="{{ $paket->id_paket }}">{{ $paket->nama_paket }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_paket_sesudah">Paket Sesudah:</label>
            <select class="form-control" id="id_paket_sesudah" name="id_paket_sesudah" required>
                @foreach ($pakets as $paket)
                    <option value="{{ $paket->id_paket }}">{{ $paket->nama_paket }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_perubahan">Tanggal Perubahan:</label>
            <input type="date" class="form-control" id="tanggal_perubahan" name="tanggal_perubahan" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
