@extends('layouts.app')

@section('title', 'Detail Barang Masuk')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Barang Masuk</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="barang">Barang</label>
                        <p id="barang">{{ $barangMasuk->barang->merk }}</p>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <p id="jumlah">{{ $barangMasuk->jumlah }}</p>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <p id="tanggal_masuk">{{ $barangMasuk->tanggal_masuk }}</p>
                    </div>

                    <a href="{{ route('barangmasuk.edit', $barangMasuk->id) }}" class="btn btn-primary">Edit Barang Masuk</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection