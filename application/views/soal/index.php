<div class="container-fluid">

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row mx-auto">
              <h2 class="font-weight-bold text-primary">Soal <?= $paketsoal ?></h2>
              <a href="javascript:void(0)" class="btn btn-success float-right ml-auto" id="addData">+ Tambah Data</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?= $this->session->flashdata('message'); ?>
                <?php
                if ($this->session->flashdata('message') !=null) {
                  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <strong>Berhasil!</strong> Anda Berhasil Mengubah Data Soal.
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
                  </div>";
                }
                ?>
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="text-center">
                    <tr>
                      <th scope="" width="6%">No</th>
                      <th scope="">Soal</th>
                      <th scope="">Mapel</th>
                      <th scope="" width="20%">Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                    $i = 1;
                    foreach ($ambil as $p) : ?>
                    <tr>
                      <td class="text-center"><?= $i ?></td>
                      <td><?= $p['soal'] ?></td>
                      <td><?= $p['mapel'] ?></td>
                      <td class="text-center">
                      <a href="<?= base_url()?>soal/edit/<?=$p['id'] ?>" class="btn btn-info">Edit</a>
                      <a href="<?= base_url()?>soal/hapus/<?=$p['id'] ?>" class="btn btn-danger" onclick="javascript:return confirm('Are you sure you want to delete this comment?')">Delete</a>
                      </td>
                    </tr>
                    <?php $i++; 
                  endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
        </div>

        <!-- /.container-fluid -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="soalform" name="soalform" class="form-horizontal" method="POST" action="<?= base_url();?>soal/create">
      <input type="hidden" name="id" id="id">
      <input type="hidden" name="mapel" value="<?= $paketsoal ?>">
      <div class="modal-body">
        <fieldset class="form-fieldset">
          <legend>Form Soal</legend>
          <div class="form-group">
            <label class="d-block">Soal</label>
            <!-- <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama" id="nama"> -->
            <textarea class="form-control" placeholder="Masukkan Soal" name="soal" id="soal"></textarea>
          </div>

          <div class="form-group">
            <label class="d-block">Pilihan 1</label>
            <textarea class="form-control" placeholder="Masukkan Pilihan" name="pilihan1" id="pilihan1"></textarea>
            <select class="custom-select mt-2" name="jawaban1">
              <option selected>Pilihan Jawaban</option>
              <option value="benar">Benar</option>
              <option value="salah">Salah</option>
            </select>
          </div>

          <div class="form-group">
            <label class="d-block">Pilihan 2</label>
            <textarea class="form-control" placeholder="Masukkan Pilihan" name="pilihan2" id="pilihan2"></textarea>
            <select class="custom-select mt-2" name="jawaban2">
              <option selected>Pilihan Jawaban</option>
              <option value="benar">Benar</option>
              <option value="salah">Salah</option>
            </select>
          </div>

          <div class="form-group">
            <label class="d-block">Pilihan 3</label>
            <textarea class="form-control" placeholder="Masukkan Pilihan" name="pilihan3" id="pilihan3"></textarea>
            <select class="custom-select mt-2" name="jawaban3">
              <option selected>Pilihan Jawaban</option>
              <option value="benar">Benar</option>
              <option value="salah">Salah</option>
            </select>
          </div>

          <div class="form-group">
            <label class="d-block">Pilihan 4</label>
            <textarea class="form-control" placeholder="Masukkan Pilihan" name="pilihan4" id="pilihan4"></textarea>
            <select class="custom-select mt-2" name="jawaban4">
              <option selected>Pilihan Jawaban</option>
              <option value="benar">Benar</option>
              <option value="salah">Salah</option>
            </select>
          </div>
          
        </fieldset>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="saveBtn">Simpan Data</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
      $(document).ready(function () {
      $('#addData').on('click', function() {
        $('#saveBtn').val("create-product");
        $('#saveBtn').html("Simpan Data");
        $('#id').val('');
        $('#soalform').trigger("reset");
        $('#exampleModalCenterTitle').html("Tambah Data");
        $('#exampleModalCenter').modal('show');
        $('#forpass').show();
      });

      $('body').on('click', '#edituser', function () {
        $('#soalform').trigger("reset");
        var id = $(this).data('id');
        console.log(id);
        $.ajax({
            type: "Post",
            url: "<?= base_url('siswa') ?>" + "/getSiswaById",
            data: {
               id: id
            },
            dataType: "json",
            success: function (res) {
               if (res.success == true) {
                  $('#exampleModalCenterTitle').html("Ubah Siswa");
                  $('#saveBtn').val("edit-user");
                  $('#saveBtn').html("Ubah Data");
                  $('#exampleModalCenter').modal('show');
                  $('#id').val(res.data.id);
                  $('#nama').val(res.data.name);
                  $('#nis').val(res.data.nis);
                  $('#forpass').hide();
               }
            },
            error: function (data) {
               console.log('Error:', data);
            }
         });
    });

      $('body').on('click', '#delete-user', function () {
 
         var id = $(this).data("id");

         swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
               type: "Post",
               url: "<?= base_url('siswa')?>" + "/delete",
               data: {
                  id: id
               },
               dataType: "json",
               success: function (data) {
                  $("#id_" + id).remove();
                  $( "#dataTable" ).load( "<?= base_url('siswa') ?> #dataTable" );
               },
               error: function (data) {
                  console.log('Error:', data);
               }
            });
              swal("Poof! Your data has been deleted!", {
                icon: "success",
              });
            } else {
              swal("Your data is safe!");
            }
          });
      });


  });
    </script>