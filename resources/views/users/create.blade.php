@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">
        <h4>Tambah User</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('users.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">
                <label>Nama</label>

                <input type="text"
                       name="name"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>

                <input type="email"
                       name="email"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Password</label>

                <input type="password"
                       name="password"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Role</label>

                <select name="role"
                        class="form-control">

                    <option value="">-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="apoteker">Apoteker</option>

                </select>
            </div>

            <button class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('users.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection