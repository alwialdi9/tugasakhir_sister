

  <div class="container p-5">

    <!-- Outer Row -->
    <div class="row justify-content-center formsiswa">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Masuk Siswa</h1>
                  </div>
                  <?= $this->session->flashdata('message'); ?>
                  <?= $this->session->flashdata('messagelogin'); ?>
                  <form class="user" method="post" action="<?= base_url('auth'); ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nis" name="nis" placeholder="Masukkan NIS" value="<?= set_value('nis'); ?>" autocomplete="off">
                      <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Kata Sandi">
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <div class="text-center mt-3">
                    <a class="large" href="<?= base_url('auth/registration'); ?>">Buat Akun</a>
                  </div>
                  <div class="text-center my-2">
                    <a class="large form" href="#" id="admin">Admin</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

<!-- formadmin -->
    <div class="row justify-content-center formadmin">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Masuk Admin</h1>
                  </div>
                  <?= $this->session->flashdata('message'); ?>
                  <form class="user" method="post" action="<?= base_url('auth'); ?>">
                    <input type="hidden" name="admin" value="admin">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email" value="<?= set_value('email'); ?>" autocomplete="off">
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Kata Sandi">
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <div class="text-center mt-3">
                    <a class="large" href="<?= base_url('auth/registration'); ?>">Buat Akun</a>
                  </div>
                  <div class="text-center my-3">
                    <a class="large form" href="#" id="siswa">Siswa</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  
