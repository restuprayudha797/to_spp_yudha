<?php

// ambil data petugas berdasarkan session 
$petugas = $this->db->get_where('petugas', ['id_petugas' => $this->session->userdata('id_petugas')])->row_array();

?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-lock"></i>
        </div>
        <?php if ($petugas['level'] == 'admin') : ?>
            <div class="sidebar-brand-text mx-3">Admin</div>
        <?php else : ?>
            <div class="sidebar-brand-text mx-3">Petugas</div>

        <?php endif ?>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php if ($petugas['level'] == 'admin') : ?>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?= $active1 ?>">
            <a class="nav-link active" href="<?= base_url('admin') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span class="text-light">Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Admin
        </div>



        </li>



        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?= $active2 ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Data Master</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">page</h6>
                    <a class="collapse-item" href="<?= base_url('admin/siswa') ?>">Siswa</a>
                    <a class="collapse-item" href="<?= base_url('admin/kelas') ?>">Kelas</a>
                    <a class="collapse-item" href="<?= base_url('admin/spp') ?>">Spp</a>
                </div>
            </div>
        </li>


        <!-- Nav Item - Charts -->
        <li class="nav-item <?= $active3 ?>">
            <a class="nav-link" href="<?= base_url('petugas') ?>">
                <i class="fa fa-user me-2"></i>
                <span>Data Petugas</span></a>
        </li>
    <?php endif ?>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Petugas
    </div>
    <li class="nav-item <?= $active4 ?>">
        <a class="nav-link" href="<?= base_url('petugas/pembayaran') ?>">
            <i class="far fa-credit-card"></i>
            <span>Pembayaran</span></a>
    </li>
    <li class="nav-item <?= $active5 ?>">
        <a class="nav-link" href="<?= base_url('petugas/Laporan') ?>">
            <i class="fas fa-file-alt"></i>
            <span>Laporan</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    <hr class="sidebar-divider">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <h1>
            <a href="<?= base_url('logout') ?>" class="text-danger">
                <i class="fa fa-sign-out-alt me-2"></i>
            </a>

        </h1>
    </div>
    <hr class="sidebar-divider">

</ul>
<!-- End of Sidebar -->
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">