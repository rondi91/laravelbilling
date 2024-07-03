@extends('layouts.main')

@section('content')
<div class="container">
    <h2>List of Subscriptions</h2>
    <a href="{{ route('subscriptions.create') }}" class="btn btn-primary">Add Subscription</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pelanggan</th>
                <th>Paket</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subscriptions as $subscription)
            <tr>
                <td>{{ $subscription->id }}</td>
                <td>{{ $subscription->pelanggan->nama }}</td>
                <td>{{ $subscription->paket->nama_paket }}</td>
                <td>{{ $subscription->tanggal_mulai }}</td>
                <td>{{ $subscription->tanggal_berakhir }}</td>
                <td>
                    <a href="{{ route('subscriptions.show', $subscription->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('subscriptions.edit', $subscription->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
