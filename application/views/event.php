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
  <link rel="icon" href="img/core-img/favicon.ico">

  <!-- Core Style CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/core-style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/style.css">
  <script src="https://kit.fontawesome.com/ffb330e033.js" crossorigin="anonymous"></script>


  <!-- Responsive CSS -->
  <link href="<?php echo base_url() ?>assets/template/css/responsive.css" rel="stylesheet">
  <?php if (function_exists("custom_css")) {
    custom_css();
  } ?>

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
  <!-- Header Area End -->

  <!-- Welcome Blog Slide Area Start -->
  <?php
  //include "news_slider.php";
  ?>
  <div class="row">
    <div class="col-12" style="background-color:#b5cdf2">
      <center>
        <iframe style="margin-top:20px" src="https://calendar.google.com/calendar/embed?src=inspektorat.menpanrb%40gmail.com&ctz=Asia%2FJakarta" style="border-width:0" width="1300" height="850" frameborder="0" scrolling="no"></iframe>
      </center>
    </div>
  </div>

  <?php
  include "footer.php";
  ?>
  <!-- Footer Area End -->

  <!-- jQuery (Necessary for All JavaScript Plugins) -->

  <?php
  include "jquery_footer.php";
  ?>
</body>

</html>