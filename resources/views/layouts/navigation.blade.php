<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="#">TokoKu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs- target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="">Produk</a></li>
                {{-- Muncul hanya kalau sudah login --}}
                @auth
                    <li class="nav-item"><a class="nav-link" href="">Pesanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Pembayaran</a></li>
                @endauth
            </ul>
            {{-- Kalau belum login tampilkan tombol Login --}}
            @guest
            @endguest
            <a href="{{ route('login') }}" class="btn btn-primary ms-lg-3">Login</a>
            {{-- Kalau sudah login tampilkan tombol Logout --}}
            @auth
                @csrf
                </form>
            @endauth
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                <button type="submit" class="btn btn-danger ms-lg-3">Logout</button>
        </div>
    </div>
</nav>
