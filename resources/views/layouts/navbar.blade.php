<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <h4 style="color:white;margin-top:20px">SK</h4>
                {{-- <img src="{{ asset('assets') }}//images/logo-sm.png" alt="" height="22"> --}}
            </span>
            <span class="logo-lg">
                <h4 style="color:white;margin-top:20px">SIAKUS</h4>
                {{-- <img src="{{ asset('assets') }}//images/logo-dark.png" alt="" height="17"> --}}
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <h4 style="color:white;margin-top:20px">SK</h4>
                {{-- <img src="{{ asset('assets') }}//images/logo-sm.png" alt="" height="22"> --}}
            </span>
            <span class="logo-lg">
                <h4 style="color:white;margin-top:20px">SIAKUS</h4>
                {{-- <img src="{{ asset('assets') }}//images/logo-light.png" alt="" height="17"> --}}
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('dashboard') }}">
                        <i class="bx bxs-dashboard"></i> <span data-key="t-widgets">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('kelas') }}">
                        <i class="bx bx-border-all"></i> <span data-key="t-widgets">Kelas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('siswa') }}">
                        <i class="bx bx-smile"></i> <span data-key="t-widgets">Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('neraca') }}">
                        <i class="bx bx-equalizer"></i> <span data-key="t-widgets">Neraca</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('laba_rugi') }}">
                        <i class="bx bx-money"></i> <span data-key="t-widgets">Laba Rugi</span>
                    </a>
                </li>
                
            
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#transaksi" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="transaksi">
                        <i class="bx bx-transfer"></i> <span data-key="t-apps">Transaksi</span>
                    </a>
                    <div class="collapse menu-dropdown" id="transaksi">
                        <ul class="nav nav-sm flex-column">                                                       
                            <li class="nav-item">
                                <a href="{{ route('pemasukan') }}" class="nav-link"> <span data-key="t-api-key">Pemasukan</span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pengeluaran') }}" class="nav-link"> <span data-key="t-api-key">Pengeluaran</span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pindah_buku') }}" class="nav-link"> <span data-key="t-api-key">Pindah Buku</span> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#rekap" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="rekap">
                        <i class="bx bx-cabinet"></i> <span data-key="t-apps">Rekap</span>
                    </a>
                    <div class="collapse menu-dropdown" id="rekap">
                        <ul class="nav nav-sm flex-column">                                                       
                            <li class="nav-item">
                                <a href="{{ route('rekap.pembayaran') }}" class="nav-link"> <span data-key="t-api-key">Pembayaran</span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('rekap.pemasukan') }}" class="nav-link"> <span data-key="t-api-key">Pemasukan</span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('rekap.pengeluaran') }}" class="nav-link"> <span data-key="t-api-key">Pengeluaran</span> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#laporan" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="laporan">
                        <i class="bx bx-file"></i> <span data-key="t-apps">Laporan</span>
                    </a>
                    <div class="collapse menu-dropdown" id="laporan">
                        <ul class="nav nav-sm flex-column">                                                       
                            <li class="nav-item">
                                <a href="{{ route('laporan.iuran') }}" class="nav-link"> <span data-key="t-api-key">Iuran</span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('laporan.laba_rugi') }}" class="nav-link"> <span data-key="t-api-key">Laba Rugi</span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('laporan.neraca') }}" class="nav-link"> <span data-key="t-api-key">Neraca</span> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('about') }}">
                        <i class="bx bx-error-alt"></i> <span data-key="t-widgets">About</span>
                    </a>
                </li>

              

                {{-- <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li> --}}


                

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>