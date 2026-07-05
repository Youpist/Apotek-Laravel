@extends('layouts.app')

@section('content')
    <h3 class="mb-4">
        Laporan Mingguan
    </h3>
    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('laporan.mingguan') }}" method="GET">
                <div class="row">

                    <div class="col-md-4">
                        <label>Tanggal Awal</label>
                        <input type="date" name="awal" class="form-control" value="{{ request('awal') }}">
                    </div>

                    <div class="col-md-4">
                        <label>Tanggal Akhir</label>
                        <input type="date" name="akhir" class="form-control" value="{{ request('akhir') }}">
                    </div>

                    <div class="col-md-4 d-flex align-items-end">

                        <button class="btn btn-success me-2">
                            Tampilkan
                        </button>

                        <a href="{{ route('laporan.mingguan.print', [
                            'awal' => request('awal'),
                            'akhir' => request('akhir'),
                        ]) }}"
                            target="" class="btn btn-primary">
                            Cetak
                        </a>

                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <h5 class="mb-3">

                Total Pendapatan:
                <strong>

                    Rp {{ number_format($total) }}

                </strong>

            </h5>

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Apoteker</th>
                        <th>Tanggal</th>
                        <th>Total</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($transaksi as $item)
                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $item->pelanggan->nama ?? '-' }}
                            </td>

                            <td>
                                {{ $item->user->name ?? '-' }}
                            </td>

                            <td>
                                {{ $item->tanggal }}
                            </td>

                            <td>
                                Rp {{ number_format($item->total) }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center">

                                Tidak ada data

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
