<div class="container-fluid">
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Jawaban</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?= $this->session->flashdata('message'); ?>
                <?php
                if ($this->session->flashdata('message') !=null) {
                  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <strong>Berhasil!</strong> Anda Berhasil Mengubah Data Jawaban.
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
                  </div>";
                }
                ?>
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center" scope="" width="6%">No</th>
                      <th scope="">Jawaban</th>
                      <th scope="">No Jawaban</th>
                      <th scope="" width="20%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i = 1;
                    foreach ($ambil as $s) : ?>
                    <tr>
                      <td class="text-center"><?= $i ?></td>
                      <td><?= $s['jawaban'] ?></td>
                      <td class="text-center"><?= 'soal '.$s['pertanyaan_id'] ?></td>
                      <td class="text-center">
                      <a href="<?= base_url()?>jawaban/edit/<?=$s['id'] ?>" class="btn btn-info">Edit</a>
                      <a href="<?= base_url()?>jawaban/hapus/<?=$s['id'] ?>" class="btn btn-danger" onclick="javascript:return confirm('Are you sure you want to delete this comment?')">Delete</a>
                      </td>
                    </tr>
                    <?php 
                    $i++; 
                  endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    <!-- ajax edit -->
      <!-- Button trigger modal -->
          </div>
        </div>

        