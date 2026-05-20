@extends('layouts.app')

@section('content')
    <div class="card shadow border-0">

        <div class="card-header d-flex justify-content-between">

            <h4>Data Apoteker</h4>

            @if (auth()->user()->role == 'admin')
                <a href="{{ route('users.create') }}" class="btn btn-success">

                    Tambah User

                </a>
            @endif

        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($users as $item)
                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>

                            <td>

                                @if (auth()->user()->role == 'admin')
                                    <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">
                                        Hapus
                                    </button>

                                </form>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center">
                                Data kosong
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
