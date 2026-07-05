 @extends('layouts.app')

 @section('content')
 <div class="row mb-4">
    <div class="col-12">
        <div class="card shadow border-0 bg-success text-white">
            <div class="card-body text-center py-5">

                <h4 class="mb-3">
                    Penjualan Hari Ini
                </h4>

                <h1 class="fw-bold display-4">
                    Rp {{ number_format($penjualanHariIni,0,',','.') }}
                </h1>

                <small class="fs-6">
                    Total penjualan pada
                    {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                </small>

            </div>
        </div>
    </div>
</div>

<div class="row g-4">

    <!-- Total Obat -->
    <div class="col-xl-3 col-md-6">
        <div class="card shadow border-0 h-100">
            <div class="card-body">
                <h5>Total Obat</h5>
                <h2>{{ $jumlahObat }}</h2>
            </div>
        </div>
    </div>

    <!-- Total Pelanggan -->
    <div class="col-xl-3 col-md-6">
        <div class="card shadow border-0 h-100">
            <div class="card-body">
                <h5>Total Pelanggan</h5>
                <h2>{{ $jumlahPelanggan }}</h2>
            </div>
        </div>
    </div>

    <!-- Total Transaksi -->
    <div class="col-xl-3 col-md-6">
        <div class="card shadow border-0 h-100">
            <div class="card-body">
                <h5>Total Transaksi</h5>
                <h2>{{ $jumlahTransaksi }}</h2>
            </div>
        </div>
    </div>

    <!-- Total Stok -->
    <div class="col-xl-3 col-md-6">
        <div class="card shadow border-0 h-100">
            <div class="card-body">
                <h5>Total Stok</h5>
                <h2>{{ $totalStok }}</h2>
            </div>
        </div>
    </div>

    <!-- Transaksi Hari Ini -->
    <div class="col-xl-4 col-md-6">
        <div class="card shadow border-0 h-100">
            <div class="card-body">
                <h5>🛒 Transaksi Hari Ini</h5>
                <h2 class="text-primary">{{ $transaksiHariIni->count() }}</h2>
            </div>
        </div>
    </div>

    <!-- Akan Expired -->
    <div class="col-xl-4 col-md-6">
        <div class="card shadow border-0 h-100">
            <div class="card-body">
                <h5>⚠️ Akan Expired</h5>
                <h2 class="text-danger">{{ $obatExpired->count() }}</h2>
            </div>
        </div>
    </div>

    <!-- Stok Menipis -->
    <div class="col-xl-4 col-md-6">
        <div class="card shadow border-0 h-100">
            <div class="card-body">
                <h5>📦 Stok Menipis</h5>
                <h2 class="text-warning">{{ $stokMenipis->count() }}</h2>
            </div>
        </div>
    </div>

</div>
     {{-- <div class="row g-4">

         <!-- Total Obat -->
         <div class="col-lg-3 col-md-6">
             <div class="card shadow border-0 h-100">
                 <div class="card-body">
                     <h6 class="text-muted">Total Obat</h6>
                     <h2>{{ $jumlahObat }}</h2>
                 </div>
             </div>
         </div>

         <!-- Total Pelanggan -->
         <div class="col-lg-3 col-md-6">
             <div class="card shadow border-0 h-100">
                 <div class="card-body">
                     <h6 class="text-muted">Total Pelanggan</h6>
                     <h2>{{ $jumlahPelanggan }}</h2>
                 </div>
             </div>
         </div>

         <!-- Total Transaksi -->
         <div class="col-lg-3 col-md-6">
             <div class="card shadow border-0 h-100">
                 <div class="card-body">
                     <h6 class="text-muted">Total Transaksi</h6>
                     <h2>{{ $jumlahTransaksi }}</h2>
                 </div>
             </div>
         </div>

         <!-- Total Stok -->
         <div class="col-lg-3 col-md-6">
             <div class="card shadow border-0 h-100">
                 <div class="card-body">
                     <h6 class="text-muted">Total Stok</h6>
                     <h2>{{ $totalStok }}</h2>
                 </div>
             </div>
         </div>

         <!-- Penjualan Hari Ini -->
         <div class="col-lg-3 col-md-6">
             <div class="card shadow border-0 h-100">
                 <div class="card-body">
                     <h6 class="text-muted">Penjualan Hari Ini</h6>
                     <h2 class="text-success">
                         Rp {{ number_format($penjualanHariIni, 0, ',', '.') }}
                     </h2>
                 </div>
             </div>
         </div>

         <!-- Transaksi Hari Ini -->
         <div class="col-lg-3 col-md-6">
             <div class="card shadow border-0 h-100">
                 <div class="card-body">
                     <h6 class="text-muted">Transaksi Hari Ini</h6>
                     <h2 class="text-primary">{{ $transaksiHariIni->count() }}</h2>
                 </div>
             </div>
         </div>

         <!-- Obat Expired -->
         <div class="col-lg-3 col-md-6">
             <div class="card shadow border-0 h-100">
                 <div class="card-body">
                     <h6 class="text-muted">Akan Expired</h6>
                     <h2 class="text-danger">{{ $obatExpired->count() }}</h2>
                 </div>
             </div>
         </div>

         <!-- Stok Menipis -->
         <div class="col-lg-3 col-md-6">
             <div class="card shadow border-0 h-100">
                 <div class="card-body">
                     <h6 class="text-muted">Stok Menipis</h6>
                     <h2 class="text-warning">{{ $stokMenipis->count() }}</h2>
                 </div>
             </div>
         </div>

     </div> --}}
 @endsection
