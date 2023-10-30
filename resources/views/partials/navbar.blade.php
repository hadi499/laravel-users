<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid " style="margin-right: 50px">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown me-4">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if (auth()->user()->profile)
                        <img src="{{ asset('storage/' . auth()->user()->profile ) }}" class="border rounded-circle"
                            alt="..." style="width: 40px;height: 40px">
                        @else
                        <img src="{{ asset('image/default.png') }}" class="rounded-circle"
                            style="width: 25px;height: 25px;" alt="...">
                        @endif

                    </a>
                    <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>

                @else

                <li class="nav-item">
                    <a href="/login" class="nav-link }}">Login</a>
                </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>