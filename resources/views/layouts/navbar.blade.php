<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">

    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            Apotek
        </a>

        <div class="ms-auto">

            <div class="dropdown">

                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">

                    {{ auth()->user()->name }}

                    @if (auth()->user()->role == 'admin')
                        <span class="badge bg-danger me-3">
                            Admin
                        </span>
                    @else
                        <span class="badge bg-success me-3">
                            Apoteker
                        </span>
                    @endif

                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button type="submit" class="dropdown-item">

                                Logout

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</nav>
