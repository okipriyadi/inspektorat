<div class="bottom-header">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="main-menu">
                    <nav class="navbar navbar-expand-lg" style="z-index:900">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#gazetteMenu" aria-controls="gazetteMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>
                        <div class="collapse navbar-collapse" id="gazetteMenu">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?= base_url()?>">Beranda <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Berita</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="index.html">Home</a>
                                        <a class="dropdown-item" href="catagory.html">Catagory</a>
                                        <a class="dropdown-item" href="single-post.html">Single Post</a>
                                        <a class="dropdown-item" href="about-us.html">About Us</a>
                                        <a class="dropdown-item" href="contact.html">Contact</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url()?>event" >Event</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Task</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo base_url()?>task/semuaTugas">Semua Tugas</a>
                                        <a class="dropdown-item" href="<?php echo base_url()?>task" >Perorang</a>
                                        <a class="dropdown-item" href="<?php echo base_url()?>task/perproyek">Perproyek</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url()?>evalrb_ext" target="_blank">Evalrb</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url()?>isma" target="_blank">ISMA</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url()?>survei">SURVEI</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url()?>evalsakip" target="_blank">EVALSAKIP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url()?>apip" target="_blank">PMLKA</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">E-ARSIP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://wbs.menpan.go.id" target="_blank">WBS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">E-Consulting</a>
                                </li>
                                <li class="nav-item">
                                  <?php
                                    if($this->session->userdata('login_iman')==true){
                                  ?>
                                      <a class="nav-link" href="<?= base_url()?>index.php/welcome/logout" >Logout</a>
                                  <?php
                                  }else{
                                    ?>
                                      <a class="nav-link" href="#" onclick="show_login_form()">Login</a>
                                  <?php
                                  }
                                  ?>
                                </li>
                            </ul>
                            <!-- Search Form -->
                            <div class="header-search-form mr-auto">
                                <form action="#">
                                    <input type="search" placeholder="Input your keyword then press enter..." id="search" name="search">
                                    <input class="d-none" type="submit" value="submit">
                                </form>
                            </div>
                            <!-- Search btn -->
                            <div id="searchbtn">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function show_login_form(){
  $("#login-form").css("display","inline-block");
  $("#username").focus();
}
</script>
