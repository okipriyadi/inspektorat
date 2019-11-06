<div class="modal-content">
<div class="modal-header" style="background:#007bff; ">
    <h4 class="modal-title text-white">Tambah Lampiran</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
    <form action="<?php echo base_url();?>index.php/task/add_lampiran" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_task_detail" value="<?php echo $id_detail;?>">
    <?php 
    if(isset($task_lampiran)){?>
        <div class="row">
            <div class="col-sm-3">
            Lampiran : 
            </div>
        </div>
        <div id="lampir">
        <?php 
        foreach ($task_lampiran as $key => $value) {
            # code...
            ?>
            <div class="row" style="margin-bottm:4px;">
                <div class="col-sm-8">
                <a href="<?php echo $value['link'].$value['nama'];?>">Lampiran <?php echo 1+$key;?></a>
                </div>
                <div class="col-sm-4">
                <button class="btn btn-danger" type="button" onclick="hapusLampiran(<?php echo $value['id_task_lampiran'];?>,<?php echo $value['id_task_detail'];?>)">Hapus</button>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
        <?php
        }?>
        <div id="form-task">
            <div class="row">
                <div class="col-sm-4">File</div>
                <div class="col-sm-8">
                    <input type="file" name="lampiran[]" multiple>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">Url</div>
                <div class="col-sm-8">
                    <input type="text" name="link" id="" class="form-control">
                </div>
            </div>
        </div>
        <div class="modal-footer " style="background:#007bff">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-default">Simpan</button>
        </div>								
        </form>
</div>

