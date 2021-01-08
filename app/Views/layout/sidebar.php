<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/sistem">
        <div class="sidebar-brand-icon ">
            <img src="favicon.ico" alt="" class="w-75">
        </div>
        <div class="sidebar-brand-text mx-3">UMKM <span class="text-warning">Tanjung</span></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ('Dashboard' == $judul) ? 'active' : ''; ?>">
        <a class="nav-link" href="/sistem">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= ('Tabel User' == $judul || 'Tabel Kas' == $judul) ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Tabel</span>
        </a>
        <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tabel Dimiliki:</h6>
                <?php if ($user['role'] == 3) : ?>
                    <a class="collapse-item <?= ('Tabel User' == $judul) ? 'active' : ''; ?>" href="/user">Tabel User</a>
                <?php endif; ?>
                <a class="collapse-item <?= ('Tabel Kas' == $judul) ? 'active' : ''; ?>" href="/kas">Tabel Kas</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?= ('Data Diri' == $judul || 'Foto Profil' == $judul || 'Informasi Akun' == $judul) ? 'active' : ''; ?>">
        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Pengaturan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Pengaturan:</h6>
                <a class="collapse-item <?= ('Foto Profil' == $judul) ? 'active' : ''; ?>" href="/fotoprofil">Foto Profil</a>
                <a class="collapse-item <?= ('Data Diri' == $judul) ? 'active' : ''; ?>" href="/profil">Data Diri</a>
                <a class="collapse-item <?= ('Informasi Akun' == $judul) ? 'active' : ''; ?>" href="/akun">Akun</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item <?= ('Agenda UMKM' == $judul) ? 'active' : ''; ?>">
        <a class="nav-link" href="/agenda">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Agenda</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item <?= ('Gambar' == $judul) ? 'active' : ''; ?>">
        <a class="nav-link" href="/gambar">
            <i class="fas fa-fw fa-images"></i>
            <span>Gambar</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Halaman
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item <?= ('Home' == $judul) ? 'active' : ''; ?>">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-folder"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->