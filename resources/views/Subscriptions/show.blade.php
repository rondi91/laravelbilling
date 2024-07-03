@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Detail Subscription</h2>
    <div class="form-group">
        <label for="id_pelanggan">Pelanggan:</label>
        <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="{{ $subscription->pelanggan->nama }}" disabled>
    </div>
    <div class="form-group">
        <label for="id_paket">Paket:</label>
        <input type="text" class="form-control" id="id_paket" name="id_paket" value="{{ $subscription->paket->id }}" disabled>
    </div>
    <div class="form-group">
        <label for="tanggal_mulai">Tanggal Mulai:</label>
        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $subscription->tanggal_mulai }}" disabled>
    </div>
    <div class="form-group">
        <label for="tanggal_selesai">Tanggal Selesai:</label>
        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ $subscription->tanggal_selesai }}" disabled>
    </div>
    <a href="{{ route('subscriptions.index') }}" class="btn btn-primary">Back</a>
</div>
@endsection
