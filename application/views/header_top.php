<div class="top-header">
  <div class="container-fluid container-header">
    <div class="row">
      <div class="col-sm-6">
        <div class="row">
          <div class="col-sm-9 ml-3 pr-0" style="display: inline-flex;">
            <div class="text-white text-center icon-container">
              <i class="fas fa-building"></i>
            </div>
            <small class="text-white" style="margin-top: 25px;">Jl. Jendral Sudirman Kav 69 Lt 5</small>
            <div class="text-white text-center icon-container">
              <i class="fas fa-phone"></i>
            </div>
            <small class="text-white" style="margin-top: 25px;">0857-3648-0699</small>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <?php
        if ($this->session->userdata('login_iman') == true) {
        ?>
          <div style="position:relative; color:white; float:right;margin-left:auto; margin-right:0 ; margin-top: 10px">
            <span style=" display: inline-block;margin-left:auto"><?= $this->session->userdata('nama_iman') ?></span>
            <img src="<?php echo base_url("assets/template/img/crew/" . $this->session->userdata('foto_iman')) ?>" style="display: inline-block; position: relative; height:50px; margin-top:0px; margin-right:0px; border-radius: 50%; ">

          </div>
        <?php
        }
        ?>
        <div id="login-form" style="<?php if (!isset($pesan)) {
                                      echo "display:none ;";
                                    } ?>; position:relative; color:white; float:right;margin-left:auto; margin-right:0 ; margin-top:25px;">
          <form action="<?= base_url() ?>index.php/welcome/do_login" method="post">
            <input type="text" placeholder="Username" id="username" name="username">
            <input type="password" placeholder="Password" name="password">
            <input type="submit" class="btn btn-primary" value="Login" name="login">
            <?php
            if (isset($pesan)) {
              echo "<p style='color:red;font-weight:bold'>" . $pesan . "</p>";
            }
            ?>
          </form>
        </div>

      </div>

    </div>
  </div>
</div>