@extends('layouts.app')

@section('title', 'Add New Regional')

@section('page_title', 'Tambah Regional Baru')

@section('breadcrumb')
    <li class="breadcrumb-item active">Home</li>
@endsection

@section('content')
    <div class='card'>
        <div class='card-header'>
            <a href="{{ route('regionals.index') }}" class="btn btn-light"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div class='card-body'>
            <form action="{{ route('regionals.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group mb-3">
                            <label for="name">Nama Regional*</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="code">Kode Regional*</label>
                            <input type="text" name="code" class="form-control" value="{{ old('code') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="description">Deskripsi (Optional)</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
@endsection
