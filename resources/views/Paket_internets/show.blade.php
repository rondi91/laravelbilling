@extends('layouts.main')




@section('content')
<div class="container">
    <h2>Detail Paket Internet</h2>
    <div class="form-group">
        <label for="nama_paket">Nama Paket:</label>
        <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="{{ $paketInternet->nama_paket }}" disabled>
    </div>
    <div class="form-group">
        <label for="kecepatan">Kecepatan (Mbps):</label>
        <input type="number" class="form-control" id="kecepatan" name="kecepatan" value="{{ $paketInternet->kecepatan }}" disabled>
    </div>
    <div class="form-group">
        <label for="harga">Harga (Rp):</label>
        <input type="number" class="form-control" id="harga" name="harga" value="{{ $paketInternet->harga }}" disabled>
    </div>

    <h3>Daftar Pelanggan</h3>
    @if($pelanggans->isEmpty())
        <p>Tidak ada pelanggan yang mengambil paket ini.</p>
    @else
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID Pelanggan</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $pelanggan->id}}</td>
                    <td>{{ $pelanggan->nama }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>{{ $pelanggan->telepon }}</td>
                    <td>{{ $pelanggan->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('paket_internets.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection

