@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Add Subscription</h2>
    <form action="{{ route('subscriptions.store') }}" method="POST">
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
            <label for="id_paket">Paket:</label>
            <select class="form-control" id="id_paket" name="id_paket" required>
                @foreach ($pakets as $paket)
                <option value="{{ $paket->id_paket }}">{{ $paket->nama_paket }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_mulai">Tanggal Mulai:</label>
            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
        </div>
        <div class="form-group">
            <label for="tanggal_selesai">Tanggal Selesai:</label>
            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
