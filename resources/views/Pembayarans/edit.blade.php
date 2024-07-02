@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Edit Pembayaran</h2>
    <form action="{{ route('pembayarans.update', $pembayaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="penagihan_id">Penagihan:</label>
            <select class="form-control" id="penagihan_id" name="penagihan_id" required>
                @foreach ($penagihans as $penagihan)
                    <option value="{{ $penagihan->id }}" {{ $pembayaran->penagihan_id == $penagihan->id ? 'selected' : '' }}>{{ $penagihan->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_pembayaran">Tanggal Pembayaran:</label>
            <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" value="{{ $pembayaran->tanggal_pembayaran }}" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" step="0.01" class="form-control" id="jumlah" name="jumlah" value="{{ $pembayaran->jumlah }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
