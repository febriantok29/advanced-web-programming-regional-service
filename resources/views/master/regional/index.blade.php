@extends('layouts.app')

@section('title', 'Regional List')

@section('page_title', 'Daftar Regional')

@section('breadcrumb')
    <li class="breadcrumb-item active">Home</li>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('regionals.create') }}" class="btn btn-primary">Tambah Regional</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Regional</th>
                            <th>Kode</th>
                            <th>Dekripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($regionals as $regional)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $regional->name }}</td>
                                <td>{{ $regional->code }}</td>
                                {{-- Split `description` string to 20 characters. If the string is longer than 20 characters, it will be truncated and followed by `...` --}}
                                <td>{{ Str::limit($regional->description, 20) }}</td>
                                <td>
                                    <a href="{{ route('regionals.show', $regional->id) }}" class="btn btn-info"><i
                                            class="fas fa-eye"></i> Lihat</a>
                                    <a href="{{ route('regionals.edit', $regional->id) }}" class="btn btn-warning"><i
                                            class="fas fa-edit"></i> Edit</a>
                                    <form action="{{ route('regionals.destroy', $regional->id) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                class="fas fa-trash"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
