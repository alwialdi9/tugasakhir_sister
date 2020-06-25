<!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- isi contentnya -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row mx-auto">
              <h2 class="font-weight-bold text-primary">Data Siswa</h2>
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
                      <th scope="">Nama</th>
                      <th scope="">NIS</th>
                      <th scope="">Mata Pelajaran</th>
                      <th scope="">Status</th>
                      <th scope="" width="20%">Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody id="tbodysiswa">
                    <?php 
                    $i = 1;
                    foreach ($datasiswa as $s) : ?>
                    <tr id="id_<?=$s['id'] ?>">
                      <td class="text-center"><?= $i ?></td>
                      <td><?= $s['nama'] ?></td>
                      <td><?= $s['nis'] ?></td>
                      <td><?= $s['mapel'] ?></td>
                      <td><?php 
                      $login = $this->db->get_where('tb_login', ['nis' => $s['nis']])->row_array();

                      if ($login['status'] == '1') {
                        echo "<span class='badge badge-success'>Online</span>";
                      } elseif ($login['status'] == '2') {
                        echo "<span class='badge badge-warning'>Sedang Mengerjakan</span>";
                      } elseif ($login['status'] == '3') {
                        echo "<span class='badge badge-primary'>Sudah Mengerjakan</span>";
                      } else{
                        echo "<span class='badge badge-danger'>Offline</span>";
                      }
                      ?></td>
                      <td class="text-center">
                      <a href="#" class="btn btn-info mb-3" id="edituser" data-id="<?= $s['id'] ?>" data-toggle="tooltip">Edit</a>
                      <a href="#" data-id="<?= $s['id'] ?>" data-toggle="tooltip" class="btn btn-danger mb-3" id="delete-user" >Delete</a>
                      </td>
                    </tr>
                    <?php $i++; 
                  endforeach; ?>
                  </tbody>
                </table>
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
      <form id="siswaForm" name="siswaForm" class="form-horizontal">
        <input type="hidden" name="id" id="id">
      <div class="modal-body">
        <fieldset class="form-fieldset">
          <legend>Data Siswa</legend>
          <div class="form-group">
            <label class="d-block">Nama Lengkap</label>
            <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama" id="nama">
          </div>
          <div class="form-group">
            <label class="d-block">NIS</label>
            <input type="text" class="form-control" placeholder="Masukkan NIS" name="nis" id="nis">
          </div>
          <div class="form-group" id="forpass">
            <label class="d-block" for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
          </div>

          <label class="d-block" for="mapel">Mata Pelajaran</label>
          <select class="custom-select" name="mapel" id="mapel">
            <option selected>Pilihan Jawaban</option>
            <?php
            $mapel = $this->db->get('tb_paket');
            foreach ($mapel->result_array() as $m):?>
              <option value="<?= $m['mapel'] ?>"><?= $m['mapel'] ?></option>
             <?php
            endforeach;
            ?>
            </select>

        </fieldset>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="saveBtn">Simpan Data</button>
      </div>
    </div>
  </div>
</div>

      </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function () {
      $('#addData').on('click', function() {
        $('#saveBtn').val("create-product");
        $('#saveBtn').html("Buat Akun");
        $('#id').val('');
        $('#siswaForm').trigger("reset");
        $('#exampleModalCenterTitle').html("Tambah Data");
        $('#exampleModalCenter').modal('show');
        $('#forpass').show();
      });

      $('body').on('click', '#edituser', function () {
        $('#siswaForm').trigger("reset");
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

      $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        console.log('success');
        $.ajax({
          data: new FormData($("#siswaForm")[0]),
          url: "<?= base_url('siswa')?>" + "/store",
          type: "POST",
          contentType: false,
          cache: false,
          processData: false,
          dataType: 'json',
          success: function (data) {

              $('#siswaForm').trigger("reset");
              $('#saveBtn').html('Simpan Data');
              $('#exampleModalCenter').modal('hide');
              // table.draw();
              $( "#dataTable" ).load( "<?= base_url('siswa') ?> #dataTable" );
              swal("Success!", "Success Insert Data!", "success");
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
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