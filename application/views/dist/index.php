<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Waktu = <span id="timer">00 : 00 : 00</span></h1>
            <div class="section-header-breadcrumb">
              <h1 class="breadcrumb-item active">Jawab Pertanyaan Berikut Dengan Tepat dan Benar</h1>
            </div>
          </div>
          <form action="" method="post" name="jawabansoal" id="jawabansoal">
          <input type="hidden" name="nama" id="nama" value="<?= $this->session->userdata('name') ?>">
          <input type="hidden" name="nis" id="nis" value="<?= $this->session->userdata('nis') ?>">
          
          <!-- kartu soal -->
          <?php
          $i = 1;
          $query = $this->db->query("SELECT * FROM tb_soal");
          foreach ($query->result_array() as $row) : ?>
            <div class="col-12">
              <div class="card card-statistic-<?= $i ?>"  id="<?= $i ?>">
                <div class="row">
                  <div class="col-1">
                <figure class="avatar avatar-l my-3 ml-3">
                  <h4 class="<?php
                  if($i < 10){
                    echo('ml-3');
                  }else{
                    echo('ml-2');
                  }
                   ?> my-2" style="color: white;"><?= $i ?></h4>    
                </figure>
              </div>

                <div class="col-11 my-3">
                  <div class="ml-3">
                  <span style="font-size: 18px"><?= $row['soal'] ?></span>
                  <div class="form-group">
                      <?php
                      $result = $this->db->query("SELECT * FROM tb_jawaban WHERE pertanyaan_id =" . $row['id']);
                      foreach ($result->result_array() as $baris) :?>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio<?= $baris['id'] ?>" name="<?= $baris['pertanyaan_id'] ?>" class="custom-control-input" data-id="<?= $baris['id'] ?>" value="<?= $baris['id'] ?>">

                        <label class="custom-control-label" for="customRadio<?= $baris['id'] ?>"><span style="font-size: 16px"><?= $baris['jawaban'] ?></span></label>
                      </div>
                      <?php
                    endforeach; ?>
                  </div>
                  </div>
                </div>
                </div>
                
              </div>
            </div>  
            <?php
          $i++;
        endforeach;
        ?>

</form>
<div class="text-right col-12">
      <a href="#" class="btn btn-icon icon-left btn-success" style="font-size: 16px;"><i class="fas fa-check"></i> Selesai</a>
    </div>

        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>