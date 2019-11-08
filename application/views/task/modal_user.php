<div class="modal-header" style="background:#007bff; ">
    <h4 class="modal-title text-white">Tambah Petugas</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-content">
    <form action="<?php echo base_url();?>index.php/task/addpetugas" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_task_detail" value="<?php echo $id_task_detail;?>">
        <div class="row" style="padding:4px;">
            <div class="col-sm-3">
            Dibuat Oleh : 
            </div>
        </div>
        <div class="row" style="padding:4px;">
            <div class="col-sm-8">
                <?php echo $user['nama'];?>
            </div>
        </div>
        <hr>
        <div class="row" style="padding:4px;">
            <div class="col-sm-3">
            Petugas : 
            </div>
        </div>
        <div class="row" style="padding:4px;">
            <div class="col-sm-8">
                <?php
                if($petugas){
                foreach ($petugas as $key => $value) {
                    # code...
                    
                    ?>
                    <div class="row">
                        <div class="col-sm-8">
                            <?php echo $value['nama'];?>
                        </div>
                    </div>
                    <?php
                }}
                ?>
            </div>
        </div>
        <hr>
        <div class="box-checkbox" style="overflow-y: scroll;">
        <?php
        foreach ($users as $key => $value) {
            # code...
            $ketemu=false;
        ?>
        <div class="row" style="padding:4px;">
            <div class="col-sm-8">
                <?php echo $value['nama'];?>
            </div>
            <div class="col-sm-4">
                <?php
                if($petugas){
                foreach ($petugas as $pkey => $pvalue) {
                    # code...
                    if($pvalue['user_id']==$value['user_id']){
                        $ketemu=true;
                        ?>
                        <input type="checkbox" name="petugas[]" id="" value="<?php echo $value['user_id'];?>" checked>
                        <?php
                    }
                }}
                if(!$ketemu){
                    ?>
                    <input type="checkbox" name="petugas[]" id="" value="<?php echo $value['user_id'];?>">
                    <?php
                }
                ?>
            </div>
        </div>
        <?php 
        }
        ?>
        </div>
<div class="modal-footer " style="background:#007bff">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
    <button type="submit" class="btn btn-default">Simpan</button>
</div>
</form>    								
</div>

