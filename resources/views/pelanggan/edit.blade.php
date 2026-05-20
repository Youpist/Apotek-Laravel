@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">
        <h4>Edit Pelanggan</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('pelanggan.update', $pelanggan->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama</label>

                <input type="text"
                       name="nama"
                       class="form-control"
                       value="{{ $pelanggan->nama }}">
            </div>

            <div class="mb-3">
                <label>Alamat</label>

                <textarea name="alamat"
                          class="form-control">{{ $pelanggan->alamat }}</textarea>
            </div>

            <div class="mb-3">
                <label>No HP</label>

                <input type="text"
                       name="no_hp"
                       class="form-control"
                       value="{{ $pelanggan->no_hp }}">
            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('pelanggan.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection