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
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/style.css">
  <script src="https://kit.fontawesome.com/ffb330e033.js" crossorigin="anonymous"></script>


  <!-- Responsive CSS -->
  <link href="<?php echo base_url() ?>assets/template/css/responsive.css" rel="stylesheet">
  <?php if (function_exists("custom_head")) {
    custom_head();
  } ?>

  <style>
    .img-header {
      height: 55px;
    }

    .bottom-header {
      height: 70px;
    }

    .top-header {
      background: rgb(5, 0, 84);
      background: linear-gradient(90deg, rgba(5, 0, 84, 1) 0%, rgba(17, 1, 132, 1) 58%, rgba(0, 18, 96, 1) 67%);
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

    .marquee-content-items li {
      background-color: rgba(5, 0, 84, 1);
    }

    .marquee-content-items li:nth-child(even) {
      background-color: rgba(5, 0, 84, 1);
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
  include "news_slider.php";
  ?>
  <!-- Welcome Blog Slide Area End -->
  <!-- Latest News Marquee Area Start -->
  <?php
  include "schedule_slider.php";
  ?>
  <!-- Latest News Marquee Area End -->

  <!-- Main Content Area Start -->
  <section class="main-content-wrapper section_padding_100">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Gazette Welcome Post -->
          <?php
          include "news_main.php";
          ?>
          <?php
          include "most_popular.php";
          ?>
        </div>

        <div class="col-12 col-lg-3 col-md-6">
          <?php
          include "sidebar.php";
          ?>
        </div>
      </div>
    </div>
    <!-- Main Content Area End -->

  </section>
  <!-- Catagory Posts Area End -->

  <!-- Video Posts Area Start -->
  <?php
  //include "post_area.php";
  ?>
  <!-- Video Posts Area End -->

  <!-- Editorial Area Start -->
  <?php
  //include "editorial_area.php"; -->
  ?>
  <!-- Editorial Area End -->

  <!-- Footer Area Start -->
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