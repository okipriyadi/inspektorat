<div class="row body-low-bg pb-4">
	<div class="col-md-12 content-dalam">
		<div class="row">
            <div class="offset-1 col-md-10" style="box-shadow: 2px 2px 8px #000000,  0 0 5px #b5cdf2;">
                <div class=" task-board">
                    <div class="table-responsive p-2">
                        <table class="table table-hover table-bordered table-stripped" id="datatable">
                            <thead>
                                <th>No</th>
                                <th width="20%">Kategori</th>
                                <th width="30%">Kegiatan</th>
                                <th width="15%">Mulai</th>
                                <th width="15%">Selesai</th>
                                <th>Status</th>
                                <th width="15%">PIC</th>
                                <th>Keterangan</th>
                                <!-- <th>Aksi</th> -->
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($tasks as $key => $value) {
                                    # code...
                                    foreach($value as $tvalue){
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++;?></td>
                                        <td><?= $tvalue['project_name']?></td>
                                        <td><?= $tvalue['title']?></td>
                                        <td><?= date('d-F-Y', strtotime($tvalue['start_date']))?></td>
                                        <td><?= date('d-F-Y', strtotime($tvalue['end_date']))?></td>
                                        <td class="<?php echo $tvalue['id_state']==1?'table-primary':'';echo $tvalue['id_state']==2?'table-warning':'';echo $tvalue['id_state']==3?'table-success':''?>"><?= $tvalue['status_name']?></td>
                                        <td>
                                            <?php
                                            foreach ($userT[$tvalue['id_detail']] as $ukey => $uvalue) {
                                                # code...
                                                ?>
                                                <img src="<?php echo base_url("assets/template/img/crew/".$uvalue['foto'])?>" title="<?= $uvalue['nama']?>" class="img-fluid rounded" width="30%">
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td class="<?php echo (new DateTime('now') > new DateTime($tvalue['end_date']))&&$tvalue['id_state']!=3?'table-danger':''?>">
                                            <?php
                                            if($tvalue['id_state']!=3){
                                                $d1 = new DateTime($tvalue['end_date']);
                                                $d2 = new DateTime('now');
                                                $diff = $d1->diff($d2);
                                                if($d2 > $d1){
                                                    echo '+'.$diff->days.' hari';
                                                }else{
                                                    echo '-'.$diff->days.' hari';
                                                }
                                            }
                                            if(!empty($tvalue['link'])){
                                                foreach ($tvalue['link'] as $lkey => $lvalue) {
                                                    # code...
                                                    echo '<a href="'.base_url().$lvalue['link'].'" target="_blank">L '.(1+$lkey).'</a> ';
                                                }
                                            }
											if(!empty($tvalue['linkurl'])){
                                                foreach ($tvalue['linkurl'] as $lkey => $lvalue) {
                                                    # code...
                                                    echo '<a href="'.$lvalue['link'].'" target="_blank">URL '.(1+$lkey).'</a> ';
                                                }
                                            }
                                            ?>
                                        </td>
                                        <!-- <td class="text-center"><button class="btn btn-info">Detail</button></td> -->
                                    </tr>
                                    <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
foreach ($userT as $key => $value) {
    # code...
    if(!empty($value)){
    ?>
    <div id="list_user_<?php echo $key;?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-header" style="background:#007bff;">
                <h4 style="color:white;">PIC</h4>
            </div>
            <ul class="list-group">
                <?php
            foreach ($value as $ukey => $uvalue) {
                # code...
            ?>
                <li class="list-group-item"><?=$uvalue['nama']?></li>
            <?php }?>
            </ul>
            <div class="modal-footer" style="background:#007bff;">
                <button type="button" class="btn btn-primary" style="background:#fff;color:black;" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
    <?php
    }
}
?>
<?php

function custom_footer()
{
?>
	<script>
		$("#datatable").DataTable({
			"pageLength": 20
		});
	</script>


<?php
}?>