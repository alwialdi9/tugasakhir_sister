<header class="masthead d-flex">
  <div class="container text-center my-auto">
    <h1 class="mb-1">Soal LKPD <br>Berbasis WEB</h1>
    <h3 class="mb-5">
      <em>Hai, <?= $name ?></em><br>

      <?php
      if ($this->session->has_userdata('selesai') == true) {
        echo "<em>Anda sudah mengerjakan soal LKPD</em>
      </h3>
      <a class='btn btn-primary btn-lg js-scroll-trigger' href=" . base_url('auth/logout') . ">Keluar</a>";
      } else {
        echo "<em>Soal terdiri dari pilihan ganda dan mencocokkan gambar</em><br>
          <em>Tekan Tombol Mulai Jika Sudah Siap Mengerjakan</em>
      </h3>
      <a class='btn btn-primary btn-lg js-scroll-trigger' href=" . base_url('soaluser') . ">Mulai!!</a>";
      }
      ?>
  </div>
  <div class="overlay"></div>
</header>