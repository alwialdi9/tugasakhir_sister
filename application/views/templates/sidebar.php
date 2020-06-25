<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">LKPD</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php
      if($title == 'Admin'){
        echo "active";
      }
      ?>">
        <a class="nav-link" href="<?= base_url('admin')?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Data Admin</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Admin
      </div>

      <!-- Nav Item - Pages Collapse Menu Siswa-->
      <li class="nav-item <?php
      if($title == 'Soal' || $title == 'Jawaban' || $title == 'Hasil'){
        echo "active";
      }
      ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-school"></i>
          <span>Siswa</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('siswa') ?>">Data Siswa</a>
            <a class="collapse-item" href="<?= base_url('soal') ?>">Soal</a>
            <a class="collapse-item" href="<?= base_url('jawaban') ?>">Jawaban</a>
            <a class="collapse-item" href="<?= base_url('hasil') ?>">Hasil Ujian</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Waktu Ujian -->
      <li class="nav-item <?php
      if($title == 'Waktu'){
        echo "active";
      }
      ?>">
        <a class="nav-link" href="<?= base_url('admin/waktu') ?>">
          <i class="fas fa-fw fa-stopwatch"></i>
          <span>Waktu Ujian</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Logout-->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->