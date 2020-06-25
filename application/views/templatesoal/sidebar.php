<aside class="aside aside-fixed">
  <div class="aside-header">
    <a href="#" class="aside-logo">LKPD - <span>FKIP</span></a>
    <!-- <a href="" class="aside-menu-link">
          <i data-feather="menu"></i>
          <i data-feather="x"></i>
        </a> -->
  </div>
  <div class="aside-body">
    <div class="text-center tx-32">Daftar Soal</div>
    <hr>
    <!-- isi nomer yang belum -->
    <div class="row row-cols-3">

    </div>

  </div>
</aside>

<div class="content ht-100v pd-0">
  <div class="content-header">
    <div class="content">
      <div id="timer_place">
        <span style="font-size: 25px; font-weight: bold;">Waktu Anda Tersisa: </span>
        <span id="timer">00 : 00 : 00</span>
      </div>
    </div>
    <div class="justify-content-end mr-3">
      <div class="dropdown dropdown-profile">
        <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static">
          <div class="avatar avatar-sm"><img src="<?= base_url('assets/images/default.jpg') ?> " class="rounded-circle" alt=""></div>
        </a><!-- dropdown-link -->
        <div class="dropdown-menu dropdown-menu-right tx-13">
          <div class="avatar avatar-lg mg-b-15"><img src="<?= base_url('assets/images/default.jpg') ?>" class="rounded-circle" alt=""></div>
          <h6 class="tx-semibold mg-b-5"><?= $name ?></h6>
          <p class="mg-b-15 tx-12 tx-color-03">Peserta/Nama Sekolah yang bersangkutan</p>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('auth/logout') ?>" class="dropdown-item"><i data-feather="log-out"></i>Keluar</a>
        </div><!-- dropdown-menu -->
      </div><!-- dropdown -->
    </div>
  </div><!-- content-header -->