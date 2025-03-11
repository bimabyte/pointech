<header id="header" class="header fixed-top d-flex align-items-center">
    <img src="/img/icon_pointech.png" class="icon-pointech" />
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : 'collapsed' }}" href="/dashboard">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Request::is('pemasukan', 'pengeluaran', 'transaksi', 'compare', 'pinjaman') ? 'active' : 'collapsed' }}" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <span>Transaksi</span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item {{ Request::is('pemasukan') ? 'active' : '' }}" href="/pemasukan">
                        <span>Jenis Pemasukan</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item {{ Request::is('pengeluaran') ? 'active' : '' }}" href="/pengeluaran">
                        <span>Jenis Pengeluaran</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item {{ Request::is('transaksi', 'compare') ? 'active' : '' }}" href="/transaksi">
                        <span>Data Transaksi</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item {{ Request::is('pinjaman') ? 'active' : '' }}" href="/pinjaman">
                        <span>Data Pinjaman</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Request::is('anggaran', 'kalkulator') ? 'active' : 'collapsed' }}" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <span>Anggaran</span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item {{ Request::is('anggaran') ? 'active' : '' }}" href="/anggaran">
                        <span>Anggaran</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item {{ Request::is('kalkulator') ? 'active' : '' }}" href="/kalkulator">
                        <span>Kalkulator Anggaran</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Request::is('barang') ? 'active' : 'collapsed' }}" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <span>Aset</span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item {{ Request::is('barang') ? 'active' : '' }}" href="/barang">
                        <span>Barang</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="">
                        <span>Dana Darurat</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Request::is('ubah-password') ? 'active' : 'collapsed' }}" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <span>Pengaturan</span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item {{ Request::is('ubah-password') ? 'active' : '' }}" href="/ubah-password">
                        <span>Ubah Password</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <!-- Log out  -->
    <nav class="header-nav ms-auto extra-space">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle" href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>

            <div class="search-bar center-search-bar">
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/logout">
                    <i class="bi bi-power" style="color: red; font-size: 1.5em; transform: scale(1.0);"></i>
                </a>
            </li>
        </ul>
    </nav>
</header>