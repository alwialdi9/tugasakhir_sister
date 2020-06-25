<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Hasil</h6>
    </div>
    <div class="card-body">
      NIS : <?= $detail_nis ?><br>
      Nama: <?= $detail_nama ?><br>
      Nilai: <?= $detail_nilai ?><br>
      Waktu Pengerjaan: <?= $detail_waktu ?><br>
      Keterangan: <?= $keterangan ?><br>
      <hr>
      <?php
      $a = 1;
      foreach ($detail_soal as $soal) : ?>
      <div class="card">
        <div class="card-body">
        Soal <?= $a ?>. <?= $soal['soal'] ?><br>
        Jawaban : 
        <?php
        $hasil = $detail_jawab;
        if (is_null($hasil['jawaban_'.$a])) {
            $where = "61";
            } else {
                $where = $hasil['jawaban_'.$a];
                }
                $this->db->where('id', $where);
                $jawaban = $this->db->get("tb_jawaban")->row_array();
        ?>

        <?php
        if($where == '4' || $where == '5' || $where == '9' || $where == '16' || $where == '18' || $where == '22' || $where == '27' || $where == '29' || $where == '35' || $where == '40' || $where == '41' || $where == '45' || $where == '51' || $where == '56' || $where == '57' ){
            echo "<span style='color:green;'>".$jawaban['jawaban']." </span>" .  "<i class='far fa-fw fa-check-circle'></i>";
        }else{
            echo "<span style='color:red;'>".$jawaban['jawaban']." </span>" . "<i class='far fa-fw fa-times-circle'></i>" ;
        }
        ?>
        </div>
    </div>
          <br>
    <?php
                  $a++;
                endforeach;
    ?>
    </div>
  </div>
</div>
</div>