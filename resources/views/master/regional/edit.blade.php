@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Edit Regional</h1>
        <form action="{{ route('regionals.update', $regional->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Nama Regional</label>
                <input type="text" name="name" class="form-control" value="{{ $regional->name }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="code">Kode Regional</label>
                <input type="text" name="code" class="form-control" value="{{ $regional->code }}" required>
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
