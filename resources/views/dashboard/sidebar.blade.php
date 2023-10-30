<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column mt-auto">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">
                    <span data-feather="home"></span>
                    Blog
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                    <span data-feather="file"></span>
                    My Posts
                </a>
            </li>

        </ul>

        <div class="d-flex gap-2 mt-5 ms-2 align-items-center">
            <div>

                @if (auth()->user()->profile)
                <div style="max-height: 400px; overflow:hidden;">
                    <img src="{{ asset('storage/' . auth()->user()->profile ) }}" class="border rounded-circle"
                        alt="..." style="width: 40px;height: 40px">

                </div>

                @else
                <img src="/image/default.png" alt="..." class="border rounded-circle p-2"
                    style="width: 40px;height: 40px">
                @endif
            </div>

            <ul class="navbar-nav ">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active text-dark" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard/profile">Profile</a></li>
                        <li><a class="dropdown-item" href="/dashboard/changepassword">Change Password</a></li>
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



            </ul>
        </div>



    </div>
</nav>