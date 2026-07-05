@extends('layouts.app')

@section('content')
    <div class="card shadow border-0">

        <div class="card-header d-flex justify-content-between">

            <h4>Data Transaksi</h4>

            <a href="{{ route('transaksi.create') }}" class="btn btn-success">
                Transaksi Baru
            </a>

        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row mb-3">

                <div class="col-md-6">

                    <form action="{{ route('transaksi.index') }}" method="GET">

                        <div class="input-group">

                            <input type="text" name="keyword" class="form-control" placeholder="Cari nama pelanggan..."
                                value="{{ request('keyword') }}">

                            <button class="btn btn-primary">

                                Cari

                            </button>

                            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">

                                Reset

                            </a>

                        </div>

                    </form>

                </div>

            </div>


            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Apoteker</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($transaksi as $item)
                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->pelanggan->nama }}</td>
                            <td>{{ $item->user->name ?? 'Tidak Ada' }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>Rp {{ number_format($item->total) }}</td>
                            <td>

                                <a href="{{ route('transaksi.struk', $item->id) }}" class="btn btn-primary btn-sm">

                                    Struk

                                </a>

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
