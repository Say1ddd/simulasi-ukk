@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Barang Masuk</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Merk</th>
                                <th scope="col">Seri</th>
                                <th scope="col">Spesifikasi</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangMasuk as $barang)
                            <tr>
                                <th scope="row">{{ $barang->id }}</th>
                                <td>{{ $barang->merk }}</td>
                                <td>{{ $barang->seri }}</td>
                                <td>{{ $barang->spesifikasi }}</td>
                                <td>{{ $barang->stok }}</td>
                                <td>{{ $barang->kategori->name }}</td>
                                <td>
                                    <a href="{{ route('barangmasuk.show', $barang->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('barangmasuk.edit', $barang->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection