@extends('app')
@section('content')
<div class="card mb-4">
    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
        <span>Histori Transaksi: <strong>{{ $product->nama_produk }}</strong> ({{ $product->kode_produk }})</span>
        <a href="{{ route('products.index') }}" class="btn btn-sm btn-light">Kembali</a>
    </div>
    <div class="card-body">
        <h6 class="mb-3">Sisa Stok Saat Ini: <span class="badge bg-primary">{{ $product->stok }} {{ $product->satuan }}</span></h6>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jenis Transaksi</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $t)
                <tr>
                    <td>{{ $t->tanggal }}</td>
                    <td>
                        <span class="badge {{ $t->jenis == 'masuk' ? 'bg-success' : 'bg-danger' }}">{{ strtoupper($t->jenis) }}</span>
                    </td>
                    <td>{{ $t->jumlah }} {{ $product->satuan }}</td>
                    <td>{{ $t->keterangan ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada transaksi untuk produk ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
