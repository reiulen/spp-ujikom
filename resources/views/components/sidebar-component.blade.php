        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">UJIKOM <sup>2022</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ set_active(['dashboard']) }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>

           @can('admin')
                <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ set_active(['petugas.index', 'petugas.create', 'petugas.edit']) }}">
                <a class="nav-link" href="{{ route('petugas.index') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>{{ __('Petugas') }}</span>
                </a>
            </li>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item {{ set_active(['siswa.index', 'siswa.create', 'siswa.edit']) }}">
                <a class="nav-link" href="{{ route('siswa.index') }}">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>{{ __('Siswa') }}</span>
                </a>
            </li>
            <li class="nav-item {{ set_active(['kelas.index', 'kelas.create', 'kelas.edit']) }}">
                <a class="nav-link" href="{{ route('kelas.index') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>{{ __('Kelas') }}</span>
                </a>
            </li>
            <li class="nav-item {{ set_active(['spp.index', 'spp.create', 'spp.edit']) }}">
                <a class="nav-link" href="{{ route('spp.index') }}">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>{{ __('SPP') }}</span>
                </a>
            </li>
           @endcan

            <!-- Divider -->
            <hr class="sidebar-divider">

            @canany(['petugas', 'admin'])
            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ set_active(['pembayaran.index', 'pembayaran.create', 'pembayaran.edit']) }}">
                <a class="nav-link" href="{{ route('pembayaran.index') }}">
                    <i class="fas fa-fw fa-calculator"></i>
                    <span>{{ __('Pembayaran') }}</span>
                </a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>
            @endcanany

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ set_active(['history']) }}">
                <a class="nav-link" href="{{ route('history') }}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>{{ __('History Pembayaran') }}</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->
