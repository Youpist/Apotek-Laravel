@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header d-flex justify-content-between">

        <h4>Data Pelanggan</h4>

        <a href="{{ route('pelanggan.create') }}"
           class="btn btn-success">
            Tambah Pelanggan
        </a>

    </div>

    <div class="card-body">

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($pelanggan as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_hp }}</td>

                    <td>

                        <a href="{{ route('pelanggan.edit', $item->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('pelanggan.destroy', $item->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus data?')">
                                Hapus
                            </button>

                        </form>

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