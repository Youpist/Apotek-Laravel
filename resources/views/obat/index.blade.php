@extends('layouts.app')

@section('content')
    <div class="card shadow border-0">

        <div class="card-header d-flex justify-content-between">
            <h4>Data Obat</h4>
        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="d-flex justify-content-between mb-3">

                <form action="{{ route('obat.index') }}" method="GET" class="d-flex">

                    <input type="text" name="search" class="form-control me-2" placeholder="Cari obat..."
                        value="{{ request('search') }}">

                    <button class="btn btn-primary">
                        Cari
                    </button>

                </form>

                @if (auth()->user()->role == 'admin')
                    <a href="{{ route('obat.create') }}" class="btn btn-success">

                        Tambah Obat

                    </a>
                @endif

            </div>


            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Obat</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Expired</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($obats as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_obat }}</td>
                            <td>{{ $item->nama_obat }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>Rp {{ number_format($item->harga) }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->expired_date }}</td>

                            <td>

                                @if (auth()->user()->role == 'admin')
                                    <a href="{{ route('obat.edit', $item->id) }}" class="btn btn-warning btn-sm">

                                        Edit

                                    </a>

                                    <form action="{{ route('obat.destroy', $item->id) }}" method="POST" class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm">

                                            Hapus

                                        </button>

                                    </form>
                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="text-center">
                                Data kosong
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
