@extends('layouts.app')

@section('title', 'Daftar Barang Masuk')

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
                                <th scope="col">Barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Tanggal Masuk</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangMasuk as $barang)
                            <tr>
                                <th scope="row">{{ $barang->id }}</th>
                                <td>{{ $barang->barang->merk }}</td>
                                <td>{{ $barang->jumlah }}</td>
                                <td>{{ $barang->tanggal_masuk }}</td>
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