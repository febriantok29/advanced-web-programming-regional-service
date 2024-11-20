@extends('layouts.app')

@section('title', 'Create Customer')

@section('page_title', 'Buat Customer Baru')

@section('breadcrumb')
    <li class="breadcrumb-item active">Home</li>
@endsection

@section('content')
    <div class="container mt-4">
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="name">Nama Customer</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- Input code --}}
                    <div class="form-group mb-3">
                        <label for="code">Kode Customer</label>
                        <input type="text" name="code" class="form-control" value="{{ old('code') }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="phone">No. Telp</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="regional_id">Regional</label>
                <select name="regional_id" id="regional_id" class="form-control" required>
                    <option value="">Pilih Regional</option>
                    @foreach ($regionals as $regional)
                        <option value="{{ $regional->id }}" {{ old('regional_id') == $regional->id ? 'selected' : '' }}>
                            {{ $regional->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="address">Alamat</label>
                <textarea name="address" class="form-control">{{ old('address') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
