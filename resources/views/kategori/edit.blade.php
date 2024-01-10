@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Kategori</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="kategori" class="col-md-4 col-form-label text-md-right">Kategori</label>

                            <div class="col-md-6">
                                <select id="kategori" class="form-control @error('kategori') is-invalid @enderror" name="kategori" required>
                                    <option value="A" {{ $kategori->kategori == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="M" {{ $kategori->kategori == 'M' ? 'selected' : '' }}>M</option>
                                    <option value="BHP" {{ $kategori->kategori == 'BHP' ? 'selected' : '' }}>BHP</option>
                                    <option value="BTHP" {{ $kategori->kategori == 'BTHP' ? 'selected' : '' }}>BTHP</option>
                                </select>

                                @error('kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-right">Deskripsi</label>

                            <div class="col-md-6">
                                <textarea id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" required>{{ $kategori->deskripsi }}</textarea>

                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
