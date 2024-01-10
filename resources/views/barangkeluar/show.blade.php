@extends('layouts.app')

@section('title', 'Detail Barang Keluar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Barang Keluar</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="barang">Barang</label>
                        <p id="barang">{{ $barangKeluar->barang->merk }}</p>
                    </div>

                    <div class="form-group">
                        <label for="qty_keluar">Jumlah Keluar</label>
                        <p id="qty_keluar">{{ $barangKeluar->qty_keluar }}</p>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_keluar">Tanggal Keluar</label>
                        <p id="tanggal_keluar">{{ $barangKeluar->tanggal_keluar }}</p>
                    </div>

                    <a href="{{ route('barangkeluar.edit', $barangKeluar->id) }}" class="btn btn-primary">Edit Barang Keluar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection