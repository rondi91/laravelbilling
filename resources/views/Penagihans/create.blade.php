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
            <label for="pelanggan_id">Pelanggan:</label>
            <select class="form-control" id="pelanggan_id" name="pelanggan_id" required>
                <option value="">Pilih Pelanggan</option>
                @foreach ($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}">
                        {{ $pelanggan->nama }}
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
        <input type="hidden" id="id_subscription" name="id_subscription">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('pelanggan_id').addEventListener('change', function() {
        var pelangganId = this.value;

        if (pelangganId) {
            fetch(`/api/pelanggan/${pelangganId}/subscription`)
                .then(response => response.json())
                .then(data => {
                    if (data.subscription) {
                        document.getElementById('nama_paket').value = data.subscription.paket.nama_paket;
                        document.getElementById('jumlah').value = data.subscription.paket.harga;
                        document.getElementById('id_subscription').value = data.subscription.id_subscription;
                    } else {
                        document.getElementById('nama_paket').value = '';
                        document.getElementById('jumlah').value = '';
                        document.getElementById('id_subscription').value = '';
                    }
                });
        } else {
            document.getElementById('nama_paket').value = '';
            document.getElementById('jumlah').value = '';
            document.getElementById('id_subscription').value = '';
        }
    });
</script>
@endsection
