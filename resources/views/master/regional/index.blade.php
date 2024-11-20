@extends('layouts.app')

@section('title', 'Regional List')

@section('page_title', 'Daftar Regional')

@section('breadcrumb')
    <li class="breadcrumb-item active">Home</li>
@endsection

@section('content')
    <div class="container mt-4">
        <a href="{{ route('regionals.create') }}" class="btn btn-primary mb-3">Tambah Regional Baru</a>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Regional</th>
                        <th>Kode Regional</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($regionals as $index => $regional)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $regional->name }}</td>
                            <td>{{ $regional->code }}</td>
                            <td>{{ $regional->description }}</td>
                            <td>
                                <a href="{{ route('regionals.show', $regional->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                                <a href="{{ route('regionals.edit', $regional->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('regionals.destroy', $regional->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Yakin ingin menghapus regional ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada regional yang ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
