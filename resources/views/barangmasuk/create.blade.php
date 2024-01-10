@extends('layouts.app')

@section('title', 'Daftar Barang Masuk')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Barang Masuk</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('barangmasuk.store') }}">
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
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Barang Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection