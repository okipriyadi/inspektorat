<div class="modal-header" style="background:#007bff; ">
    <h4 class="modal-title text-white">Tambah Lampiran</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-content">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-3">
            PJ : 
            </div>
        </div>
        <?php 
        $user = explode(",",$user);
        foreach ($user as $key => $value) {
            # code...
            echo 1+$key.". ".$value;
            echo "<br>";
        }?>
        <?php
        foreach ($users as $key => $value) {
            # code...
        ?>
        <div class="row">
            <div class="col-sm-8">
                User
            </div>
            <div class="col-sm-4">
                <input type="checkbox" name="" id="">
            </div>
        </div>
        <?php 
        }
        ?>
    								
</div>
<div class="modal-footer " style="background:#007bff">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
    <button type="button" class="btn btn-default">Simpan</button>
</div>
</form>
