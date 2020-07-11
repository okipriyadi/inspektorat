<div class="bottom-header">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="main-menu">
                    <nav class="navbar navbar-expand-lg" style="z-index:900">

                        <div class="navbar-brand">
                            <div class="row">
                                <div class="col-3">
                                    <img src="<?php echo base_url() ?>assets/template/img/logo_inspektorat.png" class="img-header">
                                </div>
                                <div class="col-6">
                                    <a href="" class="text-grey">Inspektorat</a><br>
                                    <a href="" class="text-primary">Kementerian PANRB</a>
                                </div>
                            </div>
                        </div>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#gazetteMenu" aria-controls="gazetteMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>
                        <div class="collapse navbar-collapse" id="gazetteMenu">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?= base_url() ?>">Beranda <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Profil</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Layanan Informasi</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        <!-- <a class="dropdown-item" href="<?= base_url() ?>index.php/welcome/sop_tl">SOP Pemantauan TL</a> -->
                                        <a class="dropdown-item" href="<?= base_url() ?>index.php/welcome/piagam_audit">Internal Audit Charter</a>
                                        <a class="dropdown-item" href="<?= base_url() ?>index.php/welcome/proses_bisnis">Proses Bisnis Inspektorat</a>
                                        <a class="dropdown-item" href="<?= base_url() ?>index.php/welcome/sop_inspektorat">SOP</a>
                                        <a class="dropdown-item" href="<?= base_url() ?>assets/dokumen/Renstra 210420201512.pdf">RENSTRA 2020-2024</a>
                                        <a class="dropdown-item" href="<?= base_url() ?>assets/dokumen/LAKIP 2019 Revised 10022020 TTD.pdf">LAKIP 2019</a>
                                        <a class="dropdown-item" href="<?= base_url() ?>assets/dokumen/Perjanjian Kinerja Inspektorat 2020.pdf">Perjanjian Kinerja 2020</a>
                                        <a class="dropdown-item" href="<?= base_url() ?>assets/dokumen/Permenpan 25 2019 OTK Kemenpanrb.pdf">OTK Inspektorat</a>
                                        <a class="dropdown-item" href="<?= base_url() ?>assets/dokumen/MR Inspektorat.pdf">Manajemen Risiko 2019</a>
                                        <a class="dropdown-item" href="<?= base_url() ?>index.php/welcome/maklumat_pelayanan">Maklumat Pelayanan</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url() ?>event">Publikasi</a>
                                </li>
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Layanan</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        <!-- <a class="dropdown-item" href="<?= base_url() ?>index.php/welcome/sop_tl">SOP Pemantauan TL</a> -->
                                        <a class="dropdown-item" href="<?php echo base_url() ?>evalrb_ext" target="_blank">Evalrb</a>
                                        <a class="dropdown-item" href="<?php echo base_url() ?>isma">Audit</a>
                                        <a class="dropdown-item" href="<?php echo base_url() ?>manajemen-risiko">Manajemen Risiko & Benturan Kepentingan</a>
                                        <a class="dropdown-item" href="<?php echo base_url() ?>survei">SURVEI</a>
                                        <a class="dropdown-item" href="<?php echo base_url() ?>evalsakip" target="_blank">EVALSAKIP</a>
                                        <a class="dropdown-item" href="<?php echo base_url() ?>apip" target="_blank">PMLKA</a>
                                        <a class="dropdown-item" href="http://wbs.menpan.go.id" target="_blank">WBS</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Task</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo base_url() ?>task/semuaTugasTabel">Semua Tugas Tabel</a>
                                        <a class="dropdown-item" href="<?php echo base_url() ?>task/semuaTugas">Semua Tugas</a>
                                        <a class="dropdown-item" href="<?php echo base_url() ?>task">Perorang</a>
                                        <a class="dropdown-item" href="<?php echo base_url() ?>task/perproyek">Tambah/Edit Tugas</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://inspektorat.menpan.go.id/e-consulting">E-Consulting</a>
                                </li>
                                <li class="nav-item">
                                    <?php
                                    if ($this->session->userdata('login_iman') == true) {
                                    ?>
                                        <a class="nav-link" href="<?= base_url() ?>index.php/welcome/logout">Logout</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a class="nav-link" href="#" onclick="show_login_form()">Login</a>
                                    <?php
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function show_login_form() {
        $("#login-form").css("display", "inline-block");
        $("#username").focus();
    }
</script>