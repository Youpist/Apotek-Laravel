 @extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-md-3">
        <div class="card shadow border-0">
            <div class="card-body">

                <h5>Total Obat</h5>

                <h2>
                    {{ $jumlahObat}}
                </h2>

            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0">
            <div class="card-body">

                <h5>Total Pelanggan</h5>

                <h2>
                    {{ $jumlahPelanggan }}
                </h2>

            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0">
            <div class="card-body">

                <h5>Total Transaksi</h5>

                <h2>
                    {{ $jumlahTransaksi }}
                </h2>

            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0">
            <div class="card-body">

                <h5>Total Stok</h5>

                <h2>
                    {{ $totalStok }}
                </h2>

            </div>
        </div>
    </div>

</div>

@endsection 

