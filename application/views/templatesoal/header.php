<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
  <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="600">

  <!-- Meta -->
  <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
  <meta name="author" content="ThemePixels">

  <!-- Favicon -->
  <!-- <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/') ?>assets/img/favicon.png"> -->

  <title><?= $title ?></title>

  <!-- vendor css -->
  <link href="<?= base_url('assets/') ?>lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>lib/jqvmap/jqvmap.min.css" rel="stylesheet">

  <!-- DashForge CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>assets/css/dashforge.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>assets/css/dashforge.dashboard.css">

  <link href="<?= base_url('assets/') ?>css/font.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/') ?>simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <script src="<?= base_url('assets/') ?>lib/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom CSS -->
  <link href="<?= base_url('assets/') ?>assets/css/stylish-portfolio.min.css" rel="stylesheet">
  <script src="<?= base_url('assets/') ?>js/sweetalert.min.js"></script>
  <style>
    #timer_place {
      margin: 0 auto;
      text-align: center;
    }

    #timer {
      padding: 7px;
      font-size: 2em;
      font-weight: bolder;
    }

    #box {
      margin: auto;
      width: 100%;
      height: 400px;
      border: 3px solid green;
      padding: 10px;
    }

    #div1,
    #div2,
    #div3,
    #div4,
    #div5,
    #div6 {
      width: 400px;
      height: 300px;
      border: 1px solid black;
    }
  </style>

  <script type="text/javascript">
    $(document).ready(function() {
      // document.getElementById('selesai').disabled = true;
      // $('.selesai').hide();

      // $('#customControlAutosizing').change(function() {
      //   document.getElementById("selesai").disabled = false;
      //   $('.selesai').show(1100);
      // });

      <?php
      $a = 1;
      $sintax = $this->db->query("SELECT * FROM tb_jawaban");
      foreach ($sintax->result_array() as $e) : ?>

        $('#customRadio<?= $a ?>').change(function() {
          var element = document.getElementById("no<?= $e['pertanyaan_id'] ?>");
          // element.classList.remove("complete");
          element.classList.add("active");
        });

      <?php
        $a++;
      endforeach;
      ?>
    });
  </script>

</head>

<body>