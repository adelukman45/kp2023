<nav class="navbar bg-body-tertiary">
    <div class="container">
        <button class="border-0 bg-white">

            <a class="navbar-brand text-primary " href="/">
                <h1 class="display-5">Metronim Studio</h1>
            </a>
        </button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-3 mb-lg-0">
                {{-- <li class="nav-item ">
                    <a class="navbar-brand text-secondary" href="/">
                        Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand text-secondary" href="/products">
                        Produk</a>
                </li> --}}
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-brand dropdown-toggle text-primary" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/dashboard"><i
                                        class="bi bi-layout-text-sidebar-reverse mx-3"></i>My
                                    Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i
                                            class="bi bi-box-arrow-right mx-3"></i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                @endauth
            </ul>
        </div>
    </div>
</nav>
