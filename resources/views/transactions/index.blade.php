@extends('app')
@section('content')
<div class="card mb-4">
    <div class="card-header">Input Transaksi Stok</div>
    <div class="card-body">
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <select name="product_id" class="form-control" required>
                        <option value="">Pilih Produk...</option>
                        @foreach($products as $p) <option value="{{ $p->id }}">{{ $p->nama_produk }} (Stok: {{ $p->stok }})</option> @endforeach
                    </select>
                </div>
                <div class="col">
                    <select name="jenis" class="form-control" required>
                        <option value="masuk">Barang Masuk</option><option value="keluar">Barang Keluar</option>
                    </select>
                </div>
                <div class="col"><input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required min="1"></div>
                <div class="col"><input type="date" name="tanggal" class="form-control" required value="{{ date('Y-m-d') }}"></div>
                <div class="col"><input type="text" name="keterangan" class="form-control" placeholder="Keterangan"></div>
                <div class="col"><button type="submit" class="btn btn-success">Proses</button></div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">Riwayat Transaksi Terakhir</div>
    <div class="card-body">
        <table class="table">
            <thead><tr><th>Tanggal</th><th>Produk</th><th>Jenis</th><th>Jumlah</th><th>Keterangan</th></tr></thead>
            <tbody>
                @foreach($transactions as $t)
                <tr>
                    <td>{{ $t->tanggal }}</td><td>{{ $t->product->nama_produk }}</td>
                    <td><span class="badge {{ $t->jenis == 'masuk' ? 'bg-success' : 'bg-danger' }}">{{ strtoupper($t->jenis) }}</span></td>
                    <td>{{ $t->jumlah }}</td><td>{{ $t->keterangan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
