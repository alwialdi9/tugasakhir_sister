<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $name ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title namauser" id="namauser"><?= $name ?></div>
              <div class="dropdown-title"><?= $nis ?></div>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-power-off"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
