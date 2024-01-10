@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Barang</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('barang.update', $barang->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" class="form-control" id="merk" name="merk" value="{{ $barang->merk }}" required>
                        </div>

                        <div class="form-group">
                            <label for="seri">Seri</label>
                            <input type="text" class="form-control" id="seri" name="seri" value="{{ $barang->seri }}" required>
                        </div>

                        <div class="form-group">
                            <label for="spesifikasi">Spesifikasi</label>
                            <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" value="{{ $barang->spesifikasi }}" required>
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" value="{{ $barang->stok }}" required>
                        </div>

                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select class="form-control" id="kategori_id" name="kategori_id" required>
                                @foreach($Kategori as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Barang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection