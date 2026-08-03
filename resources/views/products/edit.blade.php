@extends('app')
@section('content')
<div class="card mb-4">
    <div class="card-header">Edit Produk</div>
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col"><label>Kode Produk</label><input type="text" name="kode_produk" class="form-control" value="{{ $product->kode_produk }}" required></div>
                <div class="col"><label>Nama Produk</label><input type="text" name="nama_produk" class="form-control" value="{{ $product->nama_produk }}" required></div>
                <div class="col"><label>Satuan</label><input type="text" name="satuan" class="form-control" value="{{ $product->satuan }}" required></div>
            </div>
            <div class="row mb-3">
                <div class="col"><label>Stok</label><input type="number" name="stok" class="form-control" value="{{ $product->stok }}" required></div>
                <div class="col"><label>Harga</label><input type="number" name="harga" class="form-control" value="{{ $product->harga }}" required></div>
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Update Simpan</button>
        </form>
    </div>
</div>
@endsection
