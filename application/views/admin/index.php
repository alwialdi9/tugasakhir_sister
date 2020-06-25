<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- isi contentnya -->
  <div class="login-box-body">
    <h4><b>Selamat Datang, <?= $name ?></b></h4>
    <p>Anda dapat mengelola data dan mengedit soal yang diujikan, mengubah lama waktu ujian, serta melihat hasil tes ujian
    </p>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row mx-auto">
        <h2 class="font-weight-bold text-primary">Data Admin</h2>
        <a href="javascript:void(0)" class="btn btn-success float-right ml-auto" id="addData">+ Tambah Data</a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th scope="" width="6%">No</th>
              <th scope="">Nama</th>
              <th scope="">Email</th>
              <th scope="">Posisi</th>
              <th scope="" width="20%">Aksi</th>
            </tr>
          </thead>

          <tbody id="tbodysiswa">
            <?php
            $i = 1;
            foreach ($dataadmin as $a) : ?>
              <tr id="id_<?= $a['id'] ?>">
                <td class="text-center"><?= $i ?></td>
                <td><?= $a['name'] ?></td>
                <td><?= $a['email'] ?></td>
                <td><?php
                    if ($a['role_id'] == 1) {
                      echo "Admin";
                    } else {
                      echo "Siswa";
                    } ?></td>
                <td class="text-center">
                  <a href="javascript:void(0)" class="btn btn-info mb-3 mx-2" id="edituser" data-id="<?= $a['id'] ?>" data-toggle="tooltip">Edit</a>
                  <a href="javascript:void(0)" data-id="<?= $a['id'] ?>" data-toggle="tooltip" class="btn btn-danger mb-3" id="delete-user">Delete</a>
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
        <form id="adminForm" name="adminForm" class="form-horizontal">
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
                <input type="text" class="form-control" placeholder="Masukkan NIS Siswa" name="nis" id="nis">
              </div>

              <div class="form-group">
                <label class="d-block">Email</label>
                <input type="email" class="form-control" placeholder="Masukkan Email" name="email" id="email">
              </div>

              <div class="form-group">
                <label class="d-block">Posisi</label>
                <input type="text" class="form-control" placeholder="Masukkan Posisi" name="role" id="role">
              </div>

              <div class="form-group" id="forpass">
                <label class="d-block" for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
              </div>

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
  <!-- /.container-fluid -->

</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#addData').on('click', function() {
      $('#saveBtn').val("create-product");
      $('#saveBtn').html("Buat Akun");
      $('#id').val('');
      $('#adminForm').trigger("reset");
      $('#exampleModalCenterTitle').html("Tambah Data");
      $('#exampleModalCenter').modal('show');
      $('#forpass').show();
    });

    $('body').on('click', '#edituser', function() {
      $('#adminForm').trigger("reset");
      var id = $(this).data('id');
      console.log(id);
      $.ajax({
        type: "Post",
        url: "<?= base_url('admin') ?>" + "/getAdminById",
        data: {
          id: id
        },
        dataType: "json",
        success: function(res) {
          if (res.success == true) {
            $('#exampleModalCenterTitle').html("Ubah Admin");
            $('#saveBtn').val("edit-user");
            $('#saveBtn').html("Ubah Data");
            $('#exampleModalCenter').modal('show');
            $('#id').val(res.data.id);
            $('#nama').val(res.data.name);
            $('#email').val(res.data.email);
            if (res.data.role_id == 1) {
              $role = 'Admin'
            } else {
              $role = 'Siswa'
            }
            $('#role').val($role);
            $('#forpass').hide();
          }
        },
        error: function(data) {
          console.log('Error:', data);
        }
      });
    });

    $('#saveBtn').click(function(e) {
      e.preventDefault();
      $(this).html('Sending..');
      var email = $("#email").val();
      var posisi = $("#role").val();
      var lower = posisi.toLowerCase();
      console.log(email);
      console.log(lower);

      if (email == '' && lower == 'admin') {
        swal("Peringatan!", "Admin harus mempunyai email!", "error");
        // $('#adminForm').trigger("reset");
        // $('#saveBtn').html('Simpan Data');
        // $('#exampleModalCenter').modal('hide');
        return false;
      }

      $.ajax({
        data: new FormData($("#adminForm")[0]),
        url: "<?= base_url('admin') ?>" + "/store",
        type: "POST",
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        success: function(data) {

          $('#adminForm').trigger("reset");
          $('#saveBtn').html('Simpan Data');
          $('#exampleModalCenter').modal('hide');
          // table.draw();
          $("#dataTable").load("<?= base_url('admin') ?> #dataTable");
          swal("Success!", "Success Insert Data!", "success");
        },
        error: function(data) {
          console.log('Error:', data);
          $('#saveBtn').html('Save Changes');
        }
      });
    });

    $('body').on('click', '#delete-user', function() {

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
              url: "<?= base_url('admin') ?>" + "/delete",
              data: {
                id: id
              },
              dataType: "json",
              success: function(data) {
                $("#id_" + id).remove();
                $("#dataTable").load("<?= base_url('admin') ?> #dataTable");
              },
              error: function(data) {
                console.log('Error:', data);
              }
            });
            swal("Poof! Your data has been deleted!", {
              icon: "success",
            })
          } else {
            swal("Your data is safe!");
          }
        });
    });


  });
</script>