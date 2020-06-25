<div class="content-body">
    <div class="row ml-3">
      <div class="col-8">
      	<form action="<?= base_url() ?>soal/update/<?= $idsoal['id'] ?>" method="post">
      		<input type="hidden" name="id" value="<?= $idsoal['id'] ?>">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Edit Soal</label>
              <textarea class="form-control" id="edit" rows="3" name="soal"><?= $detailsoal ?></textarea>
            </div>
          <button type="submit" class="btn btn-success my-3">Simpan Data</button>
          </form>
    </div>
  </div>
</div>
</div>