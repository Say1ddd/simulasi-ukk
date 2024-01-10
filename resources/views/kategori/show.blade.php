@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Kategori
                </div>
                <div class="card-body">
                    <h5 class="card-title">Kategori: {{ $kategori }}</h5>
                    <p class="card-text">Deskripsi: {{ $deskripsi }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
