<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <?php if (user()->role == 1) : ?>
        <div class="sidebar-brand-text mx-3">Admin</div>
        <?php endif ?>
        <?php if (user()->role == 0) : ?>
        <div class="sidebar-brand-text mx-3">Mahasiswa</div>
        <?php endif ?>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
            
                <?php if (user()->role == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#admin" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Admin</span>
                        </a>
                        <div id="admin" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Administrator</h6>
                                <a class="collapse-item" href="<?= base_url('tugasakhir') ?>">Lihat Tugas Akhir</a>
                                <a class="collapse-item" href="<?= base_url('tugasakhir/upload/')?>">Upload Ta</a>
                                <a class="collapse-item" href="<?= base_url('mahasiswa') ?>">Data Mahasiswa</a>
                                <a class="collapse-item" href="<?= base_url('validasi') ?>">Validasi Akun Mahasiswa</a>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if (user()->role == 0) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Mahasiswa</span>
                        </a>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Mahasiswa</h6>
                                <a class="collapse-item" href="<?= base_url('tugasakhir') ?>">Lihat Tugas Akhir</a>
                                <a class="collapse-item" href="<?= base_url('tugasakhir/upload/')?>">Upload Ta</a>
                            </div>
                        </div>
                    </li>
                <?php endif ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>