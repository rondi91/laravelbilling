@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Daftar Riwayat Perubahan Paket</h2>
    <a href="{{ route('riwayat-perubahan-pakets.create') }}" class="btn btn-success">Tambah Riwayat</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pelanggan</th>
                <th>Paket Sebelum</th>
                <th>Paket Sesudah</th>
                <th>Tanggal Perubahan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayats as $riwayat)
            <tr>
                <td>{{ $riwayat->id_riwayat_perubahan }}</td>
                <td>{{ $riwayat->pelanggan->nama }}</td>
                <td>{{ $riwayat->paket_baru_id }}</td>
                <td>{{ $riwayat->paket_lama_id }}</td>
                <td>{{ $riwayat->tanggal_perubahan }}</td>
                <td>
                    <a href="{{ route('riwayat-perubahan-pakets.show', $riwayat->id) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('riwayat-perubahan-pakets.edit', $riwayat->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('riwayat-perubahan-pakets.destroy', $riwayat->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
