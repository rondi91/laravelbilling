@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Add Penagihan</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('penagihans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_subscription">Subscription:</label>
            <select class="form-control" id="id_subscription" name="id_subscription" required>
                <option value="">Pilih Subscription</option>
                @foreach ($subscriptions as $subscription)
                    <option value="{{ $subscription->id_subscription }}" 
                        data-harga="{{ $subscription->paket->harga }}"
                        data-nama-paket="{{ $subscription->paket->nama_paket }}">
                        {{ $subscription->pelanggan->nama }} - {{ $subscription->paket->nama_paket }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama_paket">Nama Paket:</label>
            <input type="text" class="form-control" id="nama_paket" name="nama_paket" readonly>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" readonly>
        </div>
        <div class="form-group">
            <label for="tanggal_penagihan">Tanggal Penagihan:</label>
            <input type="date" class="form-control" id="tanggal_penagihan" name="tanggal_penagihan" value="{{ old('tanggal_penagihan') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('id_subscription').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var harga = selectedOption.getAttribute('data-harga');
        var namaPaket = selectedOption.getAttribute('data-nama-paket');
        
        document.getElementById('jumlah').value = harga;
        document.getElementById('nama_paket').value = namaPaket;
    });
</script>
@endsection
