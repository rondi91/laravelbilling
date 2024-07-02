@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Tambah Pembayaran</h2>
    <form action="{{ route('pembayarans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_penagihan">Penagihan:</label>
            <select class="form-control" id="id_penagihan" name="id_penagihan" required>
                @foreach ($penagihans as $penagihan)
                    <option value="{{ $penagihan->id_penagihan }}">{{ $penagihan->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_pembayaran">Tanggal Pembayaran:</label>
            <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" step="0.01" class="form-control" id="jumlah" name="jumlah" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
