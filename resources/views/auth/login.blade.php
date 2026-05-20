@extends('layouts.guest')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="card shadow border-0 mt-5">

                    <div class="card-body p-5">

                        <div class="text-center mb-4">

                            <h2>
                                APOTEK SEHAT
                            </h2>

                            <p class="text-muted">
                                Silahkan login terlebih dahulu
                            </p>

                        </div>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">

                            @csrf

                            <div class="mb-3">

                                <label>Email</label>

                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" required autofocus>

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div class="mb-3">

                                <label>Password</label>

                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required>

                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div class="mb-3 form-check">

                                <input type="checkbox" class="form-check-input" name="remember">

                                <label class="form-check-label">
                                    Remember Me
                                </label>

                            </div>

                            <div class="d-grid">

                                <button type="submit" class="btn btn-success">

                                    Login

                                </button>

                            </div>
                            
                        </form>
                        <div class="text-center mt-3">

                            <a href="{{ route('register') }}" class="btn btn-success w-100">

                                Register

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
