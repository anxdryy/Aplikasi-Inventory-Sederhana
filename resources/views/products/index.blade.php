@extends('app')
@section('content')
<div class="card mb-4">
    <div class="card-header">Tambah Produk</div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col"><input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" required></div>
                <div class="col"><input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" required></div>
                <div class="col"><input type="text" name="satuan" class="form-control" placeholder="Satuan (Pcs/Box)" required></div>
                <div class="col"><input type="number" name="stok" class="form-control" placeholder="Stok Awal" required></div>
                <div class="col"><input type="number" name="harga" class="form-control" placeholder="Harga" required></div>
                <div class="col"><button type="submit" class="btn btn-primary">Simpan</button></div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <span>List Produk</span>
        <form method="GET" action="{{ route('products.index') }}" class="d-flex">
            <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari kode/nama" value="{{ request('search') }}">
            <button class="btn btn-sm btn-secondary">Cari</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table">
            <thead><tr><th>Kode</th><th>Nama</th><th>Satuan</th><th>Stok</th><th>Harga</th></tr></thead>
            <tbody>
                @foreach($products as $p)
                <tr><td>{{ $p->kode_produk }}</td><td>{{ $p->nama_produk }}</td><td>{{ $p->satuan }}</td>
                    <td><span class="badge {{ $p->stok < 10 ? 'bg-danger' : 'bg-success' }}">{{ $p->stok }}</span></td>
                    <td>Rp{{ number_format($p->harga) }}</td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
