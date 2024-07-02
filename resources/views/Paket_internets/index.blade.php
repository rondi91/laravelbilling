@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Daftar Paket Internet</h2>
    <a href="{{ route('paket_internets.create') }}" class="btn btn-success">Tambah Paket Internet</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Paket</th>
                <th>Kecepatan (Mbps)</th>
                <th>Harga (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paketInternets as $paketInternet)
            <tr>
                <td>{{ $paketInternet->id }}</td>
                <td>{{ $paketInternet->nama_paket }}</td>
                <td>{{ $paketInternet->kecepatan }}</td>
                <td>{{ $paketInternet->harga }}</td>
                <td>
                    <a href="{{ route('paket_internets.show', $paketInternet->id) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('paket_internets.edit', $paketInternet->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('paket_internets.destroy', $paketInternet->id) }}" method="POST" style="display:inline;">
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
