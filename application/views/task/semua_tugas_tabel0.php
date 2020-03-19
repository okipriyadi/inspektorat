<div class="row body-low-bg pb-4">
	<div class="col-md-12 content-dalam">
		<div class="row">
            <div class="offset-1 col-md-10" style="box-shadow: 2px 2px 8px #000000,  0 0 5px #b5cdf2;">
                <div class=" task-board">
                    <div class="table-responsive p-2">
                        <table class="table table-hover table-bordered table-stripped" id="datatable">
                            <thead>
                                <th>No</th>
                                <th width="20%">Kegiatan</th>
                                <th width="30%">Kategori</th>
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
																?>
                                    <tr>

																				<td class="text-center"><?php echo $no++;?></td>
																				<td><a href="<?= base_url("index.php/task/proyek/".$value["id_project"]) ?>" style="font-weight:normal">
                                    						<?= $value['title']?></a>
																					</td>
																						<td><a href="<?= base_url("index.php/task/proyek/".$value["id_project"]) ?>" style="font-weight:normal">
		                                        <?= $value["project_name"]?></a></td>
		                                        <td><?= date('d-F-Y', strtotime($value['start_date']))?></td>
		                                        <td><?= date('d-F-Y', strtotime($value['end_date']))?></td>
		                                        <td class="<?php echo $value['id_state']==1?'table-primary':'';echo $value['id_state']==2?'table-warning':'';echo $value['id_state']==3?'table-success':''?>"><?= $value['status_name']?></td>
		                                        <td>
		                                            <?php
																									$users = $this->task_model->getUserTaskDetail($value["id_task_detail"]);
			                                            foreach ($users as $ukey => $uvalue) {
		                                            ?>
		                                                <img src="<?php echo base_url("assets/template/img/crew/".$uvalue['foto'])?>" title="<?= $uvalue['nama']?>" class="img-fluid rounded" width="30%">
		                                            <?php
		                                            	}
		                                            ?>
		                                        </td>
		                                        <td class="<?php echo (new DateTime('now') > new DateTime($value['end_date']))&&$value['id_state']!=3?'table-danger':''?>">
		                                            <?php

																									$lampirans = $this->task_model->getLampiranTask($value["id_task_detail"]);
																									$nolampiran = 0;
																									foreach ($lampirans as $ukey => $uvalue) {
		                                        					echo "<a href='". base_url($uvalue['link']) ."'> Lampiran-". $nolampiran++ ."</a>";
		                                            	}
		                                            ?>

		                                        </td>

                                    	</tr>

                                    <?php
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
/*
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
*/
function custom_footer(){
    ?>
    <script>
        $("#datatable").DataTable({
            "pageLength":20
        });
    </script>
    <?php
}
?>
