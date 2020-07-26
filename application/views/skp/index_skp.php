<style type="text/css">
table, th, td {
  border: 2px solid black;
	padding :7px
}

thead {
	background-color: #bfbfe7;
}
</style>
<div class="row body-low-bg ">
	<div class="col-md-12 content-dalam">
		<div class="row">
				<div class="col-md-12" style="box-shadow: 2px 2px 8px #000000,  0 0 5px #b5cdf2; overflow:auto">
					<br/>
					<div class="row">
						<div class="col-md-11 content-dalam">
							  <table class=" " >
									<thead>
											<th>No</th>
											<th>Sasaran Kegiatan</th>
											<th>No</th>
											<th>Indikator Kinerja</th>
											<th>Target</th>
                      <th>Realisasi</th>
									</thead>
									<tbody  >
										<?php
											$i = 1;

											foreach ($sasaranKegiatans as $key => $sasaranKegiatan) {
												$j=1;
												$indikatorKinerjas = $this->skp_model->getAllIndikatorKinerjaByIdSasaran($sasaranKegiatan["id_sasaran_kegiatan"]);
												$counterColspan = count($indikatorKinerjas);
                        if ($counterColspan==0){
                          ?>
                                  <tr>
                                    <?php
                                        echo '<td >'. $i .'</td>';
                                        echo '<td >'. $sasaranKegiatan["nama_sasaran_kegiatan"].' </td>';

                                     ?>

                                    <td>-</td>
                                    <td>- </td>
                                    <td>-</td>
                                  </tr>
                          <?php
                                $j++;


                        }else{
          												foreach ($indikatorKinerjas as $key => $indikatorKinerja) {
          										?>
          														<tr>
          															<?php
          															 	if($j==1){
          																	echo '<td rowspan="'.$counterColspan .'">'. $i .'</td>';
          																	echo '<td rowspan="'.$counterColspan .'">'. $sasaranKegiatan["nama_sasaran_kegiatan"].' </td>';
          																}
          															 ?>

          															<td><?= $j ?></td>
          															<td idIndikatorKinerja="<?= $indikatorKinerja['id_indikator_kinerja'] ?>" idSasaranKegiatan="<?= $indikatorKinerja['id_sasaran_kegiatan'] ?>" idIndikatorParent="<?= $indikatorKinerja['id_indikator_parent'] ?>">
                                            <?= $indikatorKinerja["nama_indikator_kinerja"] ?>
                                        </td>
          															<td><?= $indikatorKinerja["target"]?></td>
                                        <td><?= $indikatorKinerja["realisasi"]?> <br/>

                                              <center><button type="button" class="btn btn-primary btn-sm editIndikator"><i class="fas fa-edit"></i> </button></center>

                                        </td>
          														</tr>
          										<?php
          													$j++;
          												}
                          }
												$sasaranKegiatanChilds = $this->skp_model->getSasaranKegiatanById($sasaranKegiatan["id_sasaran_kegiatan"]);
												//foreach ($sasaranKegiatanChilds as $key => $sasaranKegiatanChild) {
										?>
<!--
														<tr>
															<td><?= $i ?></td>
															<td><?= $sasaranKegiatan["nama_sasaran_kegiatan"] ?></td>
															<td><?= $j ?></td>
															<td> </td>
															<td></td>
														</tr> -->
										<?php
													//$j++
												//}
												$i++;
											}
										 ?>
									</tbody>
								</table>
								<br/><br/>
						</div>
					</div>
				</div>
				<br/><br/>
		</div>

	</div>
	<br/>
</div>
<br/>




<!-- Modal Edit Indikator ----------------------------- -->
<div id="modal_edit_indikator" class="modal fade " role="dialog">
  <div class="modal-dialog modal-lg ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background:#007bff; ">
        <h4 class="modal-title" style="color:white">Cascading </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <form  action="<?=base_url('skp/edit_indikator_kinerja')?>" method="POST" >
          <div class="modal-body biru-langit" style="">
            <div class="form-group ">
              <div class ="row" id="masukanCascadingDisini">
                <div class="col-md-12">
                        <div class="col-md-10" >
                          <br/>
                          <div class="row">
                            <div class="col-md-4">
                                <label>indikator Kinerja : </label>
                            </div>
                            <div class="col-md-8">
                                <input type="hidden" id="idSasaranKegiatan" name="id_sasaran_kegiatan" class="form-control">
                                <input type="hidden" id="idIndikatorKinerja" name="id_indikator_kinerja" class="form-control">
                                <input type="hidden" id="idIndikatorParent" name="id_indikator_parent" class="form-control">
                                <input type="text" id="indikatorKinerja" name="nama_indikator_kinerja" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-10" >
                          <br/>
                          <div class="row">
                            <div class="col-md-4">
                                <label>Target : </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="target" name="target" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-10" >
                          <br/>
                          <div class="row">
                            <div class="col-md-4">
                                <label>Realisasi : </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="realisasi" name="realisasi" class="form-control">
                            </div>
                          </div>
                        </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer " style="background:#007bff">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-default" value="Simpan">
          </div>
        </form>
    </div>
  </div>
</div>
<!-- ------------------------------------ modal edit indikator END ---------------------------- -->


<?php

function custom_footer(){
	 $ci =& get_instance();
?>
<script>
$( '.editIndikator' ).on( 'click', function( event ) {
  $('#modal_edit_indikator').modal('show');
  var idIndikator = $(this).parent().parent().prev().prev().attr('idIndikatorKinerja');
  var idSasaranKegiatan = $(this).parent().parent().prev().prev().attr('idSasaranKegiatan');
  var idIndikatorParent = $(this).parent().parent().prev().prev().attr('idIndikatorParent');
  var indikator = $(this).parent().parent().prev().prev().text();
  var target = $(this).parent().parent().prev().text();
  var realisasi = $(this).parent().parent().text();
  $('#idIndikatorKinerja').val(idIndikator);
  $('#idSasaranKegiatan').val(idSasaranKegiatan);
  $('#idIndikatorParent').val(idIndikatorParent);
  $('#indikatorKinerja').val($.trim(indikator));//trim untuk menghilangka white space
  $('#target').val($.trim(target));
  $('#realisasi').val($.trim(realisasi));

});

</script>


<?php
}
?>
