<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Hasil</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th class="text-center" scope="" width="6%">No</th>
              <th scope="">Nama</th>
              <th scope="">NIS</th>
              <th scope="">Nilai</th>
              <th scope="">Mata Pelajaran</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $i = 1;
            foreach ($ambil as $h) : ?>
              <tr>
                <td class="text-center"><?= $i ?></td>
                <td class="text-center"><?= $h['nama'] ?></td>
                <td class="text-center"><?= $h['nis'] ?></td>
                <td class="text-center"><?= $h['nilai'] ?></td>
                <td class="text-center">
                  <?= $h['mapel'] ?>
                </td>
              </tr>
            <?php $i++;
            endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- ajax edit -->
  <!-- Button trigger modal -->
</div>