@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Kategori</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('kategori.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="kategori" class="col-md-4 col-form-label text-md-right">Kategori</label>

                                    <select id="kategori" class="form-control @error('kategori') is-invalid @enderror" name="kategori" required autocomplete="kategori" autofocus>
                                        <option value="M">M</option>
                                        <option value="A">A</option>
                                        <option value="BHP">BHP</option>
                                        <option value="BTHP">BTHP</option>
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
                                    <input id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi') }}" required autocomplete="deskripsi" autofocus>

                                    @error('deskripsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection