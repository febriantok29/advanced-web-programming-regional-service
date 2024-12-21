@extends('layouts.app')

@section('title', 'Customer')

@section('page_title', 'Daftar Customer')

@section('breadcrumb')
    <li class="breadcrumb-item active">Home</li>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('customers.create') }}" class="btn btn-primary">Tambah Customer</a>
                <a href="{{ route('customers.excel') }}" class="btn btn-success">Export Excel</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Customer</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info"><i
                                            class="fas fa-eye"></i> Lihat</a>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning"><i
                                            class="fas fa-edit"></i> Edit</a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
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
