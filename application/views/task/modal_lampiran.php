<div class="modal-content">
    <div class="modal-header" style="background:#007bff; ">
        <h4 class="modal-title text-white">Edit</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <form action="<?php echo base_url();?>index.php/task/add_lampiran" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_task_detail" value="<?php echo $id_detail;?>">
    <div class="form-group " style="padding:4px;">
        <label ><b>Nama Tugas:</b></label> &nbsp;&nbsp;
        <input type="text" class="form-control" name="title" value="<?php echo $task['title'];?>">
        <label ><b>Deskripsi Tugas:</b></label> &nbsp;&nbsp;
        <input type="text" class="form-control" name="description" value="<?php echo $task['description'];?>">
        <div class="form-group">
            <div class ="row">
                <div class="col-md-6">
                <label ><b>Tanggal Mulai Tugas:</b></label> &nbsp;&nbsp;
                <input type="date" class="form-control" name="start_date" value="<?php echo date("Y-m-d",strtotime($task['start_date'])); ?>">
                </div>
                <div class="col-md-6">
                <label ><b>Tanggal Akhir Tugas:</b></label> &nbsp;&nbsp;
                <input type="date" class="form-control" name="end_date" value="<?php echo date("Y-m-d",strtotime($task['end_date'])); ?>">
                </div>
            </div>
        </div>
    </div>
    <?php 
    if($task_lampiran){?>
        <div class="row" style="padding:4px;">
            <div class="col-sm-3">
            Lampiran : 
            </div>
        </div>
        <div id="lampir" style="padding:4px;">
            <div class="row">
                <div class="col-sm-12">
                    File
                </div>
            </div>
        <?php 
        foreach ($task_lampiran as $key => $value) {
            # code...
            ?>
            <div class="row" style="margin-bottm:4px;">
                <div class="col-sm-8">
                <a href="<?php echo $value['link'];?>">Lampiran <?php echo 1+$key;?></a>
                </div>
                <div class="col-sm-4">
                <button class="btn btn-danger" type="button" onclick="hapusLampiran(<?php echo $value['id_task_lampiran'];?>,<?php echo $value['id_task_detail'];?>)">Hapus</button>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
    <?php }?>
        <div id="lampir-link" style="padding:4px;">
            <?php if($task_lampiran_link){?>
            <div class="row">
                <div class="col-sm-12">
                    Link
                </div>
            </div>
            <?php
            foreach ($task_lampiran_link as $key => $value) {
                # code...
                ?>
                <div class="row" style="margin-bottm:4px;">
                    <div class="col-sm-8">
                    <a href="<?php echo $value['link'];?>">Lampiran <?php echo 1+$key;?></a>
                    </div>
                    <div class="col-sm-4">
                    <button class="btn btn-danger" type="button" onclick="hapusLampiranLink(<?php echo $value['id_task_lampiran_link'];?>,<?php echo $value['id_task_detail'];?>)">Hapus</button>
                    </div>
                </div>
                <?php
            }
            ?>
            <?php
        }?>
        </div>
        <div id="form-task" style="padding:4px;">
            <div class="row" style="padding:4px;">
                <div class="col-sm-4">File</div>
                <div class="col-sm-8">
                    <input type="file" name="lampiran[]" multiple>
                </div>
            </div>
            <div class="row" style="padding:4px;">
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