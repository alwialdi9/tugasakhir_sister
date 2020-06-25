<div class="content-body">
    <div class="row ml-3">

      <!-- paket soal -->
      <?php
      foreach ($paket as $p) :?>
        <a class="col-xl-3 col-md-6 mb-4" href="<?= base_url()?>/soal/paket_soal/<?= $p['mapel'] ?>">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $p['mapel'] ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $p['pengajar'] ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
        <?php
      endforeach;
      ?>

  </div>
</div>
</div>