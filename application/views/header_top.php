<div class="top-header">
    <div class="container">
        <div class="row " >
            <img src="<?php echo base_url() ?>assets/template/img/logo_inspektorat.png" style="display: inline-block; position: absolute; height:80px; margin-top:0px">
            <h4 style="display: inline-block;  margin-top:25px; margin-left: 100px">
              <a href="<?php base_url()?>">
                <b style="color:white">INSPEKTORAT</b>
                <b style="color:#b5cdf2">KEMENTERIAN PANRB</b>
              </a>
            </h4>
            <?php
            if($this->session->userdata('login_iman')==true){
            ?>
              <div style="position:relative; color:white; float:right;margin-left:auto; margin-right:0 ; margin-top: 10px">
                  <span style=" display: inline-block;margin-left:auto"><?= $this->session->userdata('nama_iman')?></span>
                  <img src="<?php echo base_url("assets/template/img/crew/".$this->session->userdata('foto_iman'))?>" style="display: inline-block; position: relative; height:50px; margin-top:0px; margin-right:0px; border-radius: 50%; ">

              </div>
            <?php
            }
            ?>
            <div id="login-form" style="<?php if(!isset($pesan)){ echo "display:none ;" ;} ?>; position:relative; color:white; float:right;margin-left:auto; margin-right:0 ; margin-top:25px;">
              <form action="<?= base_url()?>index.php/welcome/do_login" method="post">
                <input type="text" placeholder="Username" id="username" name="username">
                <input type="password" placeholder="Password" name="password">
                <input type="submit" class="btn btn-primary" value="Login" name="login">
                <?php
                  if(isset($pesan)){
                    echo "<p style='color:red;font-weight:bold'>".$pesan."</p>";
                  }
                ?>
              </form>
            </div>

        </div>
    </div>
</div>
