<link rel="stylesheet" href="{{ asset('landing-custom.css') }}">

<!-- Section Hero -->
<section class="hero-section position-relative bg-landing">
    <div class="container-fluid px-5 pt-0 pb-0">
        <div class="d-flex justify-content-between align-items-center mt-0 pt-3">
            <a href="/" class="d-flex align-items-center text-decoration-none">
                <img src="{{ asset('landing_page/logo/logo_jti.png') }}" alt="JTI Logo" class="logo-jti">
            </a>
            <div class="d-flex align-items-center">
                <a href="/home" class="nav-link-custom">Beranda</a>
                <a href="https://jti.polinema.ac.id" class="nav-link-custom">Website Polinema</a>

                <!-- Dropdown Denah Gedung -->
                <div class="dropdown">
                    <a class="nav-link-custom dropdown-toggle" href="#" role="button" id="denahGedungDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Denah Gedung
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="denahGedungDropdown">
                        <li><a class="dropdown-item" href="https://my.matterport.com/show/?m=xufa7UrDLJe">Lantai 5</a>
                        </li>
                        <li><a class="dropdown-item" href="https://my.matterport.com/show/?m=Fj8fbnjLjQq">Lantai 6</a>
                        </li>
                        <li><a class="dropdown-item" href="https://my.matterport.com/show/?m=fAgiViGeZaB">Lantai 7</a>
                        </li>
                    </ul>
                </div>

                <!-- Dropdown Kriteria -->
                <div class="dropdown">
                    <a class="nav-link-custom dropdown-toggle" href="#" role="button" id="kriteriaDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Kriteria
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="kriteriaDropdown">
                        @for($i = 1; $i <= 9; $i++)
                            <li><a class="dropdown-item" href="{{ route('home.kriteria', $i) }}">Kriteria {{ $i }}</a></li>
                        @endfor
                    </ul>
                </div>

                <a href="/login"
                    class="btn btn-light text-success font-weight-bold px-4 py-2 rounded-pill login-btn">Login</a>
            </div>
        </div>
    </div>

    <div class="hero-text text-center text-white">
        <h1 class="font-weight-bold mb-3 hero-title">
            Layanan Manajemen Data Akreditasi Program Studi<br>
            Sistem Informasi Bisnis Politeknik Negeri Malang
        </h1>
        <p class="mb-4 hero-subtitle">
            Platform terpadu manajemen data, kelengkapan dokumen, dan<br> pemantauan progres akreditasi.
        </p>
    </div>

    <div class="hero-card-wrapper">
        <div class="card hero-card">
            <div class="d-flex justify-content-around text-center">
                <a href="#profile" class="text-decoration-none">
                    <img src="{{ asset('landing_page/icons/icon_profile_polinema.png') }}" class="hero-icon mt-1"
                        alt="Profile">
                    <p class="text-success font-weight-medium mb-0 icon-caption">Profile Polinema</p>
                </a>
                <a href="#visi-misi" class="text-decoration-none">
                    <img src="{{ asset('landing_page/icons/icon_visi_misi.png') }}" class="hero-icon mt-1"
                        alt="Visi Misi">
                    <p class="text-success mt-1 font-weight-medium mb-0 icon-caption">Visi & Misi</p>
                </a>
                <a href="#tujuan" class="text-decoration-none d-flex flex-column align-items-center">
                    <img src="{{ asset('landing_page/icons/icon_tujuan.png') }}" class="hero-icon mt-1"
                        style="width: 42px; height: 35px; margin-top: 1px;" alt="Tujuan">
                    <p class="text-success font-weight-medium mt-1 mb-0 icon-caption">Tujuan</p>
                </a>
                <a href="#sasaran" class="text-decoration-none d-flex flex-column align-items-center">
                    <img src="{{ asset('landing_page/icons/icon_sasaran.png') }}" class="hero-icon mt-1.5"
                        style="width: 44px; height: 44px;" alt="Sasaran">
                    <p class="text-success font-weight-medium mb-0 icon-caption">Sasaran</p>
                </a>
            </div>
        </div>
    </div>
</section>