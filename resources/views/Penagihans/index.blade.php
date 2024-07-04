@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Daftar Penagihan</h2>
    <a href="{{ route('penagihans.create') }}" class="btn btn-success">Tambah Penagihan</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Penagihan</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penagihans as $penagihan)
            <tr>
                <td>{{ $penagihan->id }}</td>
                <td>{{ $penagihan->pelanggan->nama }}</td>
                <td>{{ $penagihan->tanggal_penagihan }}</td>
                <td>{{ $penagihan->jumlah }}</td>
                <td>{{ $penagihan->status ? ' Belum Lunas' : ' Lunas' }}</td>
                <td>
                    <a href="{{ route('penagihans.show', $penagihan->id) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('penagihans.edit', $penagihan->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('penagihans.destroy', $penagihan->id) }}" method="POST" style="display:inline;">
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
