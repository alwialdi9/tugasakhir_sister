<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<body>
  <div id="app">
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?= base_url('assets/'); ?>img/uhamka.svg" alt="logo" width="200" class="shadow-light rounded-circle">
            </div>
            <?= $this->session->flashdata('message'); ?>
            
            <div class="card card-primary">
              <div class="card-header text-center">
                <h4>Login</h4>
              </div>

              <div class="card-body">
                <form method="POST" action="<?= base_url('auth') ?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="nis">NIS</label>
                    <input id="nis" type="text" class="form-control" name="nis" tabindex="1" required autofocus placeholder="Masukkan NIS">
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="<?php echo base_url(); ?>dist/auth_forgot_password" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required placeholder="Masukkan Password">
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>

                <!-- <div class="mt-5 text-muted text-center">
                  Don't have an account? <a href="<?php echo base_url(); ?>dist/auth_register">Create One</a>
                </div> -->
                
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('dist/_partials/js'); ?>