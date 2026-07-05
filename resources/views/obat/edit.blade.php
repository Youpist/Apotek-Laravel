@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">
        <h4>Edit Obat</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('obat.update', $obats->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Kode Obat</label>

                <input type="text"
                       name="kode_obat"
                       class="form-control"
                       value="{{ $obats->kode_obat }}">
            </div>

            <div class="mb-3">
                <label>Nama Obat</label>

                <input type="text"
                       name="nama_obat"
                       class="form-control"
                       value="{{ $obats->nama_obat }}">
            </div>

            <div class="mb-3">
                <label>Kategori</label>

                <input type="text"
                       name="kategori"
                       class="form-control"
                       value="{{ $obats->kategori }}">
            </div>

            <div class="mb-3">
                <label>Harga</label>

                <input type="number"
                       name="harga"
                       class="form-control"
                       value="{{ $obats->harga }}">
            </div>

            <div class="mb-3">
                <label>Stok</label>

                <input type="number"
                       name="stok"
                       class="form-control"
                       value="{{ $obats->stok }}">
            </div>

            <div class="mb-3">
                <label>Expired Date</label>

                <input type="date"
                       name="expired_date"
                       class="form-control"
                       value="{{ $obats->expired_date }}">
            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('obat.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection