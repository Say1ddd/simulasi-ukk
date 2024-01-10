@extends('layouts.app')

@section('title', 'Daftar Barang Keluar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Barang Keluar</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Barang</th>
                                <th scope="col">Jumlah Keluar</th>
                                <th scope="col">Tanggal Keluar</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangKeluar as $barang)
                            <tr>
                                <th scope="row">{{ $barang->id }}</th>
                                <td>{{ $barang->barang->merk }}</td>
                                <td>{{ $barang->qty_keluar }}</td>
                                <td>{{ $barang->tanggal_keluar }}</td>
                                <td>
                                    <a href="{{ route('barangkeluar.show', $barang->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('barangkeluar.edit', $barang->id) }}" class="btn btn-primary">Edit</a>
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