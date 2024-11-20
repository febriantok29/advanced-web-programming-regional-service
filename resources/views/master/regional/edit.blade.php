@extends('layouts.app')

@section('title', 'Edit Regional')

@section('page_title', 'Edit Regional')

@section('breadcrumb')
    <li class="breadcrumb-item active">Home</li>
@endsection

@section('content')
    <div class="container mt-4">
        <form action="{{ route('regionals.update', $regional->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="name">Nama Regional</label>
                        <input type="text" name="name" class="form-control" value="{{ $regional->name }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="code">Kode Regional</label>
                        <input type="text" name="code" class="form-control" value="{{ $regional->code }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control">{{ $regional->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('regionals.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
