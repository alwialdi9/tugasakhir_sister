<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <script type="text/javascript">
    $(document).ready(function(){
      $('.form').click(function(){
      var tombol = $(this).attr('id');
      if (tombol == "admin") {
        $('.formsiswa').hide(1200);
        $('.formadmin').show(1100);
      }else{
        $('.formsiswa').show(1200);
        $('.formadmin').hide(1100);
      }
      })
      $('.formsiswa').show(1200);
      $('.formadmin').hide();
    })
  </script>

</head>

<body background="<?= base_url('assets/'); ?>img/ekosistem.jpg" style="background-size: cover;">
