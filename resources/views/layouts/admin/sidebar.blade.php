<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ url('/') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"></i>Admin - AYUNDA</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('SqvNR7QrAdmin') }}/img/user.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">

                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ url('/admin') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-user"></i></i>Data User</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ url('/admin/admin') }}" class="dropdown-item nav-item nav-link">Admin</a>
                            <a href="{{ url('/admin/user') }}" class="dropdown-item nav-item nav-link">Pegawai Desa</a>

                        </div>
                    </div>
                    <a href="{{ route('layanan.index') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Layanan</a>
                    <a href="{{ route('rincian-formulir.index') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Formulir</a>
                    <a href="{{ route('jenis-file.index') }}" class="nav-item nav-link"><i class="fa-solid fa-file-pen"></i></i>Jenis File</a>
                    <a href="{{ route('syarat-berkas.index') }}" class="nav-item nav-link"><i class="fa-solid fa-folder-open"></i>Syarat Berkas</a>
                    <a href="{{ route('pengajuan.index') }}" class="nav-item nav-link"><i class="fa-solid fa-file-arrow-up"></i>Pengajuan</a>
                     <a href="{{ route('laporan.index') }}" class="nav-item nav-link"><i class="fa-solid fa-file"></i>Laporan</a>
                </div>
            </nav>
        </div>