@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">
        <h4>Edit User</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('users.update', $users->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama</label>

                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $users->name }}">
            </div>

            <div class="mb-3">
                <label>Email</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ $users->email }}">
            </div>

            <div class="mb-3">
                <label>Role</label>

                <select name="role"
                        class="form-control">

                    <option value="admin"
                    {{ $users->role == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>

                    <option value="apoteker"
                    {{ $users->role == 'apoteker' ? 'selected' : '' }}>
                        Apoteker
                    </option>

                </select>
            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('users.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection