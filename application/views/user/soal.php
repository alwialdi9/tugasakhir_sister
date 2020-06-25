<div class="content-body">
  <div class="container">
    <h3 class="font-weight-bold mb-3">Jawablah pertanyaan berikut dengan tepat dan benar!</h3>
    <form action="" method="post" name="jawabansoal" id="jawabansoal">
      <input type="hidden" name="nama" id="nama" value="<?= $this->session->userdata('name') ?>">
      <input type="hidden" name="nis" id="nis" value="<?= $this->session->userdata('nis') ?>">
      <div class="isian">
        <?php
        $i = 1;
        $query = $this->db->query("SELECT * FROM tb_soal");
        foreach ($query->result_array() as $row) : ?>
          <div class="card">
            <div class="card-body" id="<?= $i ?>">
              <p class="card-text mb-auto" style="font-size: 20px;"><?= $i . ". " . $row['soal'] ?></p><br>
              <?php
              $result = $this->db->query("SELECT * FROM tb_jawaban WHERE pertanyaan_id =" . $row['id']);
              foreach ($result->result_array() as $baris) :
              ?>
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio<?= $baris['id'] ?>" name="<?= $baris['pertanyaan_id'] ?>" class="custom-control-input" data-id="<?= $baris['id'] ?>" value="<?= $baris['id'] ?>">

                  <label class="custom-control-label" for="customRadio<?= $baris['id'] ?>"><?= $baris['jawaban'] ?></label>
                </div>
                <br>
              <?php
              endforeach; ?>
            </div>
          </div>
          <br>
        <?php
          $i++;
        endforeach;
        ?>
      </div>
      <div class="card" id="soalgambar">
        <div class="card-body">
          <h3 class="font-weight-bold mb-3">Pasangkan gambar hewan sesuai dengan habitatnya</h3>

          <div id="box">
            <div class="row">
              <div class="col">
                <div id="div1">
                  <img src="<?= base_url('assets') ?>/images/buaya.jpg" id="drag1" width="400" height="300">
                </div>
              </div>
              <div class="col">
                <div id="div2" class="divgambar">
                <img src="" class="img-gambar" data-id="div2" alt="" width="400" height="300">
                <input type="hidden" id="gambardiv2" name="gambar1">

                </div>
                <a href="#" class="btn btn-primary float-right mt-3 btn-gambar" id="pilih" data-toggle="modal" data-target=".bd-example-modal-lg" data-id="div2">Pilih Habitat</a>
              </div>
            </div>
          </div>

          <div id="box" class="mt-3">
            <div class="row">
              <div class="col">
                <div id="div1">
                  <img src="<?= base_url('assets') ?>/images/rusa.jpg" id="drag1" width="400" height="300">
                </div>
              </div>
              <div class="col">
                <div id="div3" class="divgambar">
                <img src="" class="img-gambar" data-id="div3" alt="" width="400" height="300">
                <input type="hidden" id="gambardiv3" name="gambar2">

                </div>
                <a href="#" class="btn btn-primary float-right mt-3 btn-gambar" id="pilih2" data-toggle="modal" data-target=".bd-example-modal-lg" data-id="div3">Pilih Habitat</a>
              </div>
            </div>
          </div>

          <div id="box" class="mt-3">
            <div class="row">
              <div class="col">
                <div id="div1">
                  <img src="<?= base_url('assets') ?>/images/burung.jpg" id="drag1" width="400" height="300">
                </div>
              </div>
              <div class="col">
                <div id="div4" class="divgambar">
                <img src="" class="img-gambar" data-id="div4" alt="" width="400" height="300">
                <input type="hidden" id="gambardiv4" name="gambar3">

                </div>
                <a href="#" class="btn btn-primary float-right mt-3 btn-gambar" id="pilih3" data-toggle="modal" data-target=".bd-example-modal-lg" data-id="div4">Pilih Habitat</a>
              </div>
            </div>
          </div>

          <div id="box" class="mt-3">
            <div class="row">
              <div class="col">
                <div id="div1">
                  <img src="<?= base_url('assets') ?>/images/lumba.jpg" id="drag1" width="400" height="300">
                </div>
              </div>
              <div class="col">
                <div id="div5" class="divgambar">
                <img src="" class="img-gambar" data-id="div5" alt="" width="400" height="300">
                <input type="hidden" id="gambardiv5" name="gambar4">

                </div>
                <a href="#" class="btn btn-primary float-right mt-3 btn-gambar" id="pilih4" data-toggle="modal" data-target=".bd-example-modal-lg" data-id="div5">Pilih Habitat</a>
              </div>
            </div>
          </div>

          <div id="box" class="mt-3">
            <div class="row">
              <div class="col">
                <div id="div1">
                  <img src="<?= base_url('assets') ?>/images/katak.jpg" id="drag1" width="400" height="300">
                </div>
              </div>
              <div class="col">
                <div id="div6" class="divgambar">
                <img src="" class="img-gambar" data-id="div6" alt="" width="400" height="300">
                <input type="hidden" id="gambardiv6" name="gambar5">

                </div>
                <a href="#" class="btn btn-primary float-right mt-3 btn-gambar" id="pilih5" data-toggle="modal" data-target=".bd-example-modal-lg" data-id="div6">Pilih Habitat</a>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="col-auto my-1">
        <button type="submit" class="btn btn-outline-primary mt-3 float-right selesai" id="selesai">Selesai</button>
      </div>

    </form>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Pilih Habitat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row ml-2">
          <a href="#" id="langit" class="mx-auto"><img src="<?= base_url('assets') ?>/images/langit.jpg" class="rounded mb-3 img-modal" alt="..." width="300" height="150"></a>
          <a href="#" id="laut" class="mx-auto"><img src="<?= base_url('assets') ?>/images/laut.jpg" class="rounded mb-3 img-modal" alt="..." width="300" height="150"></a>
          <a href="#" id="padangrumput" class="mx-auto"><img src="<?= base_url('assets') ?>/images/padangrumput.jpg" class="rounded mb-3 img-modal" alt="..." width="300" height="150"></a>
          <a href="#" id="rawa" class="mx-auto"><img src="<?= base_url('assets') ?>/images/rawa.jpg" class="rounded mb-3 img-modal" alt="..." width="300" height="150"></a>
          <a href="#" id="sawah" class="mx-auto"><img src="<?= base_url('assets') ?>/images/sawah.jpg" class="rounded mb-3 img-modal" alt="..." width="300" height="150"></a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
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
                window.location = "<?= base_url('user') ?>";
              });
          } else {

          }
        });
    });

    // script pilih gambarl
    var id = '';
    $('.btn-gambar').on("click", function(){
     id = $(this).data('id');
    });

      $("#langit").on("click", function() {
        $('.img-gambar[data-id='+id+']').attr('src', "<?= base_url('assets') ?>/images/langit.jpg");
        $('#gambar'+id).val('langit.jpg');
      });

      $("#laut").on("click", function() {
        $('.img-gambar[data-id='+id+']').attr('src', "<?= base_url('assets') ?>/images/laut.jpg");
        $('#gambar'+id).val('laut.jpg');
      });
      $("#rawa").on("click", function() {
        $('.img-gambar[data-id='+id+']').attr('src', "<?= base_url('assets') ?>/images/rawa.jpg");
        $('#gambar'+id).val('rawa.jpg');
      });
      $("#sawah").on("click", function() {
        $('.img-gambar[data-id='+id+']').attr('src', "<?= base_url('assets') ?>/images/sawah.jpg");
        $('#gambar'+id).val('sawah.jpg');
      });
      $("#padangrumput").on("click", function() {
        $('.img-gambar[data-id='+id+']').attr('src', "<?= base_url('assets') ?>/images/padangrumput.jpg");
        $('#gambar'+id).val('padangrumput.jpg');
      });
  })
</script>