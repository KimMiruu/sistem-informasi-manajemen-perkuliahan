<div class="app-wrapper">
    <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item"> 
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> 
                        <i class="bi bi-list"></i> 
                    </a> 
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"> 
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button"> 
                        <i class="bi bi-search"></i> 
                    </a> 
                </li>
            </ul>
        </div>
    </nav>

    <!--begin::Sidebar-->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
            <a href="#" class="brand-link">
            <img src="/web_enterprise/assets/Gambar/mercu.png" alt="LOGO" class="brand-image opacity-75 shadow">
                <span class="brand-text fw-light">NAVIGATION</span>
            </a>
        </div>

        <div class="sidebar-wrapper">
    <nav class="mt-2">
        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
            <!-- Halaman Utama Menu Item -->
            <li class="nav-item">
                <a href="<?= site_url('dashboard/dboard'); ?>" class="nav-link">
                    <i class="nav-icon bi bi-house"></i>
                    <p>Halaman Utama</p>
                </a>
            </li>
            <!-- Mahasiswa Menu Item -->
            <li class="nav-item">
                <a href="<?= site_url('dashboard/index'); ?>" class="nav-link">
                    <i class="nav-icon bi bi-person"></i>
                    <p>Mahasiswa</p>
                </a>
            </li>
            <!-- Dosen Menu Item -->
            <li class="nav-item">
                <a href="<?= site_url('dashboard/dosen'); ?>" class="nav-link">
                    <i class="nav-icon bi bi-person-badge"></i>
                    <p>Dosen</p>
                </a>
            </li>
           <!-- Jadwal Perkuliahan Menu Item -->
           <li class="nav-item">
                <a href="<?= site_url('dashboard/jadwal'); ?>" class="nav-link">
                    <i class="nav-icon bi bi-calendar-event"></i>
                    <p>Jadwal Perkuliahan</p>
                </a>
            </li>
             <!-- profil Menu Item -->
            <li class="nav-item mb-3">
    <a href="<?= site_url('dashboard/profil_view'); ?>" class="nav-link">
        <i class="nav-icon bi bi-person-circle"></i>
        <p>Profil Pengguna</p>
    </a>
</li>
            <!-- Logout Menu Item -->
            <li class="nav-item">
                <a href="<?= site_url('auth/logout'); ?>" class="nav-link">
                    <i class="nav-icon bi bi-box-arrow-in-right"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </nav>
</div>

    </aside>