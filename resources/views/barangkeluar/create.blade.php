@extends('layouts.app')

@section('title', 'Tambah Barang Keluar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Barang Keluar</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('barangkeluar.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="barang_id">Barang</label>
                            <select class="form-control" id="barang_id" name="barang_id" required>
                                @foreach($barangs as $barang)
                                    <option value="{{ $barang->id }}">{{ $barang->merk }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="qty_keluar">Jumlah Keluar</label>
                            <input type="number" class="form-control" id="qty_keluar" name="qty_keluar" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_keluar">Tanggal Keluar</label>
                            <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Barang Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection