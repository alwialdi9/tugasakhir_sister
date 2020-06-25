<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url('soaluser'); ?>">Ujian | <?= $this->session->userdata('mapel') ?></a>
            <h5>Waktu = <span id="timer">00 : 00 : 00</span></h5>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('soaluser'); ?>">LKPD</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">SOAL</li>
            <?php
            $this->db->like('mapel', $this->session->userdata('mapel'));
            $this->db->from('tb_soal');
            $jumlah =  $this->db->count_all_results();

              for ($i = 1; $i <= $jumlah; $i++) { ?>
                <li class="" id="no<?= $i ?>"><a class="nav-link" href="#<?= $i ?>"><i class="far fa-circle"></i> <span><?= $i ?></span></a></li>
              <?php
              }
              ?>
            
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <!-- <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Soal Gambar
            </a> -->
          </div>
        </aside>
      </div>
