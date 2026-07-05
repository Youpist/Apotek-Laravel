@extends('layouts.app')

@section('content')
    <h3 class="mb-4">
        Laporan Bulanan
    </h3>

    <a href="{{ route('laporan.bulanan.print', [
        'bulan' => $bulan,
        'tahun' => $tahun,
    ]) }}" class="btn btn-success"
        target="">

        <i class="fas fa-print"></i>
        Cetak Laporan

    </a>

    <div class="card shadow border-0">

        <div class="card-body">

            <h5 class="mb-3">

                Total Pendapatan:
                <strong>

                    Rp {{ number_format($total) }}

                </strong>

            </h5>
            <form method="GET" action="{{ route('laporan.bulanan') }}" class="row mb-3">

                <div class="col-md-3">

                    <select name="bulan" class="form-select">

                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ $bulan == $i ? 'selected' : '' }}>

                                {{ DateTime::createFromFormat('!m', $i)->format('F') }}

                            </option>
                        @endfor

                    </select>

                </div>

                <div class="col-md-2">

                    <select name="tahun" class="form-select">

                        @for ($i = date('Y'); $i >= 2023; $i--)
                            <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>

                                {{ $i }}

                            </option>
                        @endfor

                    </select>

                </div>

                <div class="col-md-2">

                    <button class="btn btn-primary">

                        Tampilkan

                    </button>

                </div>

            </form>

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
