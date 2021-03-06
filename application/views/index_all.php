<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Title  -->
  <title>Inspektorat</title>

  <!-- Favicon  -->
  <link rel="icon" href="<?php echo base_url() ?>assets/template/img/logo_inspektorat.ico">

  <!-- Core Style CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/core-style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/plugin/datatable/datatables.min.css">
  <script src="https://kit.fontawesome.com/ffb330e033.js" crossorigin="anonymous"></script>


  <!-- Responsive CSS -->
  <link href="<?php echo base_url() ?>assets/template/css/responsive.css" rel="stylesheet">
  <?php if (function_exists("custom_head")) {
    custom_head();
  }
  ?>
  <style type="text/css">
    .box_shadow {
      box-shadow: 2px 2px 8px #000000, 0 0 5px #b5cdf2;
    }

    .img-header {
      height: 55px;
    }

    .display_block {
      display: block;
    }

    .content-dalam {
      margin-left: 30px;
      margin-right: 30px;
    }


    .judul_halaman {
      color: white;
      margin-top: 5px;
      margin-bottom: 5 px;
      text-shadow: 2px 2px 8px #000000, 0 0 5px #b5cdf2;
      display: inline-block;
    }

    .main-content-tambahan {
      padding-top: 10px
    }

    .body-here {
      margin: 40px
    }

    .form-control {
      border: 1px solid #ced4da;
    }

    select.form-control:not([size]):not([multiple]) {
      height: calc(3rem + 6px);
    }
  </style>
  <style>
    .img-header {
      height: 55px;
    }

    .bottom-header {
      height: 70px;
    }

    .top-header {
      background: rgb(2, 0, 36);
      background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(22, 9, 121, 1) 0%, rgba(0, 104, 255, 1) 100%);
      color: #fff;
    }

    .icon-container {
      border-radius: 50%;
      background-color: blue;
      margin: 20px 0px 0px 10px;
      height: 25px;
      width: 25px;
    }

    .background-overlay:before {
      background-color: #02275d;
      opacity: 0.7;
    }

    ol.number-list li {
      margin-left: 40px;
      list-style-type: lower-greek;
      color: #9f9f9f;
    }
  </style>

</head>

<body>
  <!-- Header Area Start -->
  <header class="header-area">
    <?php
    include "header_top.php";
    ?>
    <!-- Middle Header Area -->
    <?php
    //include "header_middle.php";
    ?>
    <!-- Bottom Header Area -->
    <?php
    include "menu.php";
    ?>
  </header>
  <div style="background-color:#9bdaeb">
    <div class="container" style="padding-top:5px;background-image:url('<?php echo base_url() ?>assets/template/img/menpan.JPG');">
      <div class="col-md-12" style="text-align:left">
        <h4 style="text-align:left;padding:10px" class="judul_halaman"><b><?= $judul ?></b></h4>
      </div>
    </div>
  </div>

  <!-- Header Area End -->

  <!-- Welcome Blog Slide Area Start -->
  <section class="main-content-wrapper main-content-tambahan">
    <div class="container">
      <?php
      include $content;
      ?>
    </div>

  </section>

  <!-- Catagory Posts Area End -->


  <!-- Footer Area Start -->
  <?php
  include "footer.php";
  ?>
  <!-- Footer Area End -->

  <!-- jQuery (Necessary for All JavaScript Plugins) -->

  <?php
  include "jquery_footer.php";
  ?>
  <?php if (function_exists("custom_footer")) {
    custom_footer();
  }
  ?>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script>
    tinymce.init({
      selector: 'textarea#berita_c',
      menubar: false
    });
  </script>
</body>

</html>