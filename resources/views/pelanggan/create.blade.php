@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">
        <h4>Tambah Pelanggan</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('pelanggan.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">
                <label>Nama</label>

                <input type="text"
                       name="nama"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Alamat</label>

                <textarea name="alamat"
                          class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>No HP</label>

                <input type="text"
                       name="no_hp"
                       class="form-control">
            </div>

            <button class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('pelanggan.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection