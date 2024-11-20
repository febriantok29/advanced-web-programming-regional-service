@extends('layouts.app')

@section('title', 'View Regional')

@section('page_title', 'Lihat Regional')

@section('breadcrumb')
    <li class="breadcrumb-item active">Home</li>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="name">Nama Regional</label>
                            <input type="text" name="name" class="form-control" value="{{ $regional->name }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="code">Kode Regional</label>
                            <input type="text" name="code" class="form-control" value="{{ $regional->code }}"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" class="form-control" readonly>{{ $regional->description }}</textarea>
                </div>
                <a href="{{ route('regionals.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
