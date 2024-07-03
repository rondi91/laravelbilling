@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Edit Subscription</h2>
    <form action="{{ route('subscriptions.update', $subscription->id_subscription) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_pelanggan">Pelanggan:</label>
            <select class="form-control" id="id_pelanggan" name="id_pelanggan" required>
                @foreach ($pelanggans as $pelanggan)
                <option value="{{ $pelanggan->id_pelanggan }}" {{ $subscription->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>{{ $pelanggan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="paket_id">Paket:</label>
            <select class="form-control" id="paket_id" name="paket_id" required>
                @foreach ($pakets as $paket)
                <option value="{{ $paket->paket_id }}" {{ $subscription->paket_id == $paket->id ? 'selected' : '' }}>{{ $paket->nama_paket }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_mulai">Tanggal Mulai:</label>
            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $subscription->tanggal_mulai }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_selesai">Tanggal Selesai:</label>
            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ $subscription->tanggal_selesai }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
