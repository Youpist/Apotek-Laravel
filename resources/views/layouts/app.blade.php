<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotek</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            background-color: #f5f6fa;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #198754;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 12px;
            display: block;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .content {
            width: 100%;
            padding: 20px;
        }
    </style>
</head>

<body>
    @if (auth()->user()->role == 'admin')
        <a href="{{ route('users.index') }}" class="nav-link">

            Data User

        </a>
    @endif

    <div class="d-flex">

        {{-- Sidebar --}}
        @include('layouts.sidebar')

        <div class="content">

            {{-- Navbar --}}
            @include('layouts.navbar')

            {{-- Isi Halaman --}}
            @yield('content')

        </div>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
