<nav class="navbar navbar-expand-lg bg-success navbar-dark position-sticky top-0">
    <div class="container">
        <a class="navbar-brand me-auto text-white w-100 text-center" href="#">Manajemen Property</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item me-5">
                    <a class="nav-link text-white" href="{{ route('dashboard', ['username' => $username]) }}">Dashboard</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link text-white" href="{{ route('pengelolaan', ['username' => $username]) }}">Pengelolaan</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link text-white"
                        href="{{ route('profile', ['username' => $username, 'password' => request()->query('password')]) }}">Profile</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
