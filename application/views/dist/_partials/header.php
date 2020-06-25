<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/chocolat/dist/css/chocolat.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/prism/prism.css">
  
  <!-- CSS Libraries -->
<?php
if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "index") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
<?php
}elseif ($this->uri->segment(2) == "index_0") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/summernote/summernote-bs4.css">
<?php
}elseif ($this->uri->segment(2) == "bootstrap_card") { ?>
  
<?php
}elseif ($this->uri->segment(2) == "bootstrap_modal") { ?>
  
<?php
}elseif ($this->uri->segment(2) == "components_gallery") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/chocolat/dist/css/chocolat.css">
<?php
}elseif ($this->uri->segment(2) == "components_multiple_upload") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/dropzonejs/dropzone.css">
<?php
}elseif ($this->uri->segment(2) == "components_statistic") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/flag-icon-css/css/flag-icon.min.css">
<?php
}elseif ($this->uri->segment(2) == "components_user") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
<?php
}elseif ($this->uri->segment(2) == "forms_advanced_form") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<?php
}elseif ($this->uri->segment(2) == "forms_editor") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/codemirror/theme/duotone-dark.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/jquery-selectric/selectric.css">
<?php
}elseif ($this->uri->segment(2) == "modules_calendar") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/fullcalendar/fullcalendar.min.css">
<?php
}elseif ($this->uri->segment(2) == "modules_datatables") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<?php
}elseif ($this->uri->segment(2) == "modules_ion_icons") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/ionicons/css/ionicons.min.css">
<?php
}elseif ($this->uri->segment(2) == "modules_owl_carousel") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
<?php
}elseif ($this->uri->segment(2) == "modules_toastr") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/izitoast/css/iziToast.min.css">
<?php
}elseif ($this->uri->segment(2) == "modules_vector_map") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/flag-icon-css/css/flag-icon.min.css">
<?php
}elseif ($this->uri->segment(2) == "modules_weather_icon") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/weather-icon/css/weather-icons-wind.min.css">
<?php
}elseif ($this->uri->segment(2) == "auth_login") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-social/bootstrap-social.css">
<?php
}elseif ($this->uri->segment(2) == "auth_register") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/jquery-selectric/selectric.css">
<?php
}elseif ($this->uri->segment(2) == "features_post_create") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<?php
}elseif ($this->uri->segment(2) == "features_posts") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/jquery-selectric/selectric.css">
<?php
}elseif ($this->uri->segment(2) == "features_profile") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/summernote/summernote-bs4.css">
<?php
}elseif ($this->uri->segment(2) == "features_setting_detail") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/codemirror/theme/duotone-dark.css">
<?php
}elseif ($this->uri->segment(2) == "features_tickets") { ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/chocolat/dist/css/chocolat.css">
<?php
} ?>

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/components.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-social/bootstrap-social.css">

  <style type="text/css">
    @media (min-width: 992px){
      .namauser {
        overflow: hidden;
        display: none;
      }
    }
  </style>

  <script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
<!-- Start GA -->
<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>

<script type="text/javascript">
  $(document).ready(function() {
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
      })
  </script>

<!-- /END GA --></head>

<?php
if ($this->uri->segment(2) == "layout_transparent") {
  $this->load->view('dist/_partials/layout-2');
  $this->load->view('dist/_partials/sidebar-2');
}elseif ($this->uri->segment(2) == "layout_top_navigation") {
  $this->load->view('dist/_partials/layout-3');
  $this->load->view('dist/_partials/navbar');
}elseif ($this->uri->segment(1) != "" && $this->uri->segment(1) != "auth" && $this->uri->segment(2) != "auth_forgot_password"&& $this->uri->segment(2) != "auth_register" && $this->uri->segment(2) != "auth_reset_password" && $this->uri->segment(2) != "errors_503" && $this->uri->segment(2) != "errors_403" && $this->uri->segment(2) != "errors_404" && $this->uri->segment(2) != "errors_500" && $this->uri->segment(2) != "utilities_contact" && $this->uri->segment(2) != "utilities_subscribe") {
  $this->load->view('dist/_partials/layout');
  $this->load->view('dist/_partials/sidebar');
}
?>
