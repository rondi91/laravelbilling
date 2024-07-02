@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Tambah Paket Internet</h2>
    <form action="{{ route('paket_internets.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_paket">Nama Paket:</label>
            <input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
        </div>
        <div class="form-group">
            <label for="kecepatan">Kecepatan (Mbps):</label>
            <input type="number" class="form-control" id="kecepatan" name="kecepatan" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga (Rp):</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
