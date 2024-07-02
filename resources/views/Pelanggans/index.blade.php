@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Daftar Pelanggan</h2>
    <a href="{{ route('pelanggans.create') }}" class="btn btn-success">Tambah Pelanggan</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggans as $pelanggan)
            <tr>
                <td>{{ $pelanggan->id }}</td>
                <td>{{ $pelanggan->nama }}</td>
                <td>{{ $pelanggan->alamat }}</td>
                <td>{{ $pelanggan->telepon }}</td>
                <td>{{ $pelanggan->email }}</td>
                <td>
                    <a href="{{ route('pelanggans.show', $pelanggan->id) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('pelanggans.edit', $pelanggan->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('pelanggans.destroy', $pelanggan->id) }}" method="POST" style="display:inline;">
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
