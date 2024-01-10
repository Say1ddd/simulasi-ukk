@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Barang</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="merk">Merk</label>
                        <p id="merk">{{ $barang->merk }}</p>
                    </div>

                    <div class="form-group">
                        <label for="seri">Seri</label>
                        <p id="seri">{{ $barang->seri }}</p>
                    </div>

                    <div class="form-group">
                        <label for="spesifikasi">Spesifikasi</label>
                        <p id="spesifikasi">{{ $barang->spesifikasi }}</p>
                    </div>

                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <p id="stok">{{ $barang->stok }}</p>
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <p id="kategori">{{ $barang->kategori->name }}</p>
                    </div>

                    <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-primary">Edit Barang</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection