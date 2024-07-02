@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Daftar Pembayaran</h2>
    <a href="{{ route('pembayarans.create') }}" class="btn btn-success">Tambah Pembayaran</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Penagihan</th>
                <th>Tanggal Pembayaran</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayarans as $pembayaran)
            <tr>
                <td>{{ $pembayaran->id }}</td>
                <td>{{ $pembayaran->penagihan->id }}</td>
                <td>{{ $pembayaran->tanggal_pembayaran }}</td>
                <td>{{ $pembayaran->jumlah }}</td>
                <td>
                    <a href="{{ route('pembayarans.show', $pembayaran->id) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('pembayarans.edit', $pembayaran->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('pembayarans.destroy', $pembayaran->id) }}" method="POST" style="display:inline;">
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
