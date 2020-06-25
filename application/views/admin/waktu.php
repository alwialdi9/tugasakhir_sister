<!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- isi contentnya -->
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <form action="<?= base_url('admin/editwaktu')?>" method="post" name="waktu">
                <input type="hidden" name="id" value="<?= $idtimer ?>">
                <div class="form-group">
                  <label for="formGroupExampleInput">Waktu Ujian:</label>
                  <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Waktu Ujian Sekarang" value="<?= $timer ?>" disabled="">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Ubah Lama Waktu Ujian:</label>
                  <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Lama Waktu (second)" name="waktu">
                  <small id="waktu" class="form-text text-muted">
                    Lama waktu harus dalam hitungan detik
                  </small>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
              </form>
            </div>
          </div>
        <!-- /.container-fluid -->

      </div>
    </div>

