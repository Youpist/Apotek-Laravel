@extends('layouts.app')

@section('content')

<h3 class="mb-4">
    Laporan Bulanan
</h3>

<a href="{{ route('laporan.bulanan.print') }}"
   class="btn btn-success mb-3">

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

                    <td colspan="5"
                        class="text-center">

                        Tidak ada data

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection