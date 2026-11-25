<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'UTS Pem Web')</title>

    <!-- Bootstrap 5 CSS via CDN (Tanpa CSS eksternal tambahan sesuai ketentuan) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Header / Navbar (Sesuai gambar referensi) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-normal fs-4 text-dark me-4" href="{{ route('biodata.index') }}">UTS Pem Web</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" href="{{ route('biodata.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link text-secondary">(Masukkan Nama)</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link text-secondary">(Masukkan NIM)</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="container py-4 flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer (Sesuai gambar referensi) -->
    <footer class="mt-auto py-4 bg-white border-top text-center">
        <div class="container">
            <ul class="nav justify-content-center mb-3">
                <li class="nav-item"><a href="{{ route('biodata.index') }}" class="nav-link px-3 text-secondary">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-3 text-secondary">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-3 text-secondary">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-3 text-secondary">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-3 text-secondary">About</a></li>
            </ul>
            <hr class="w-100 text-muted opacity-25 mb-3">
            <p class="text-secondary small mb-0">&copy; 2025 Dibuat Sejujurnya Oleh Team (Masukkan Nama ketua) dan (Masukkan Nama Anggota) Tanpa Mencotek dari Tim Lain</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
