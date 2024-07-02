@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Edit Penagihan</h2>
    <form action="{{ route('penagihans.update', $penagihan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="pelanggan_id">Pelanggan:</label>
            <select class="form-control" id="pelanggan_id" name="pelanggan_id" required>
                @foreach ($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}" {{ $penagihan->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>{{ $pelanggan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_penagihan">Tanggal Penagihan:</label>
            <input type="date" class="form-control" id="tanggal_penagihan" name="tanggal_penagihan" value="{{ $penagihan->tanggal_penagihan }}" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" step="0.01" class="form-control" id="jumlah" name="jumlah" value="{{ $penagihan->jumlah }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="0" {{ $penagihan->status == 0 ? 'selected' : '' }}>Belum Lunas</option>
                <option value="1" {{ $penagihan->status == 1 ? 'selected' : '' }}>Lunas</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
