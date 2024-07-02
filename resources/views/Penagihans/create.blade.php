@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Tambah Penagihan</h2>
    <form action="{{ route('penagihans.store') }}" method="POST">
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
            <label for="tanggal_penagihan">Tanggal Penagihan:</label>
            <input type="date" class="form-control" id="tanggal_penagihan" name="tanggal_penagihan" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" step="0.01" class="form-control" id="jumlah" name="jumlah" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="0">Belum Lunas</option>
                <option value="1">Lunas</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
