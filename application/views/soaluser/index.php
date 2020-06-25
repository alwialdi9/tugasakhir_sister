<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <!-- <h1>Waktu = <span id="timer">00 : 00 : 00</span></h1> -->
            <div class="section-header-breadcrumb">
              <h1 class="breadcrumb-item active">Jawab Pertanyaan Berikut Dengan Tepat dan Benar</h1>
            </div>
          </div>
          <form action="" method="post" name="jawabansoal" id="jawabansoal">
          <input type="hidden" name="nama" id="nama" value="<?= $this->session->userdata('nama') ?>">
          <input type="hidden" name="nis" id="nis" value="<?= $this->session->userdata('nis') ?>">
          <input type="hidden" name="mapel" id="mapel" value="<?= $this->session->userdata('mapel') ?>">
          
          <!-- kartu soal -->
          <?php
          $i = 1;
          $query = $this->db->get_where('tb_soal',['mapel'=>$this->session->userdata('mapel')]);
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
                      $result = $this->db->query("SELECT * FROM tb_jawaban WHERE pertanyaan_id =" . $row['pertanyaan_id']);
                      foreach ($result->result_array() as $baris) :?>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio<?= $baris['id'] ?>" name="<?= $baris['id'] ?>" class="custom-control-input" data-id="<?= $baris['id'] ?>" value="<?= $baris['jawaban'] ?>">

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
<div class="text-right col-12">
      <button type="submit" id="selesai" class="btn btn-icon icon-left btn-success selesai" style="font-size: 16px;"><i class="fas fa-check"></i> Selesai</button>
    </div>

</form>
        </section>
        
      </div>

      <script type="text/javascript">
  $(document).ready(function() {
    $('#selesai').on('click', function(e) {
      e.preventDefault();
      swal({
          title: "Apakah Anda Yakin?",
          text: "Jawaban anda akan dimasukkan ke database!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((value) => {
          if (value) {
            $.ajax({
              type: "POST",
              url: "<?= base_url('cekjawaban') ?>",
              data: new FormData($("#jawabansoal")[0]),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {

              },
              error: function(data) {
                console.log('Error:', data);
              }
            });
            swal("Success!", "Berhasil Input Jawaban!", "success")
              .then((value) => {
                window.location = "<?= base_url('auth/logout') ?>";
              });
          } else {

          }
        });
    });

    // script pilih gambarl
    var id = '';
    $('.btn-gambar').on("click", function(){
     id = $(this).data('id');
     console.log(id);
    });

    <?php
    $queryjs = $this->db->query("SELECT * FROM tb_gambar WHERE jawaban_gambar = 1");
    foreach ($queryjs->result_array() as $qj) : ?>

      $("#gmbr<?= $qj['id'] ?>").on("click", function() {
        $('.img-gambar[data-id='+id+']').attr('src', "<?= base_url('assets') ?>/image_soal/<?= $qj['nama_gambar'] ?>");

        console.log("<?= $qj['nama_gambar'] ?>");

        $('#gambar'+id).val('<?= $qj['nama_gambar'] ?>');

      });

      <?php
    endforeach;
      ?>
  })
</script>
<?php $this->load->view('dist/_partials/footer'); ?>