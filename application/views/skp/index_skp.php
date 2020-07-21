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
          															<td><?= $indikatorKinerja["nama_indikator_kinerja"] ?> </td>
          															<td><?= $indikatorKinerja["target"]?></td>
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
