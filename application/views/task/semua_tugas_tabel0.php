<div class="col-md-12 content-dalam">
	<div class="row">
		<div class=" col-md-12" style="box-shadow: 2px 2px 8px #000000,  0 0 5px #b5cdf2;">
			<div class=" task-board">
				<div class="table-responsive p-2">
					<br />
					<div class="form-group">
						<form action="?" method="post">

							<div class="row" style="background:#9bdaeb; border:solid 2px;">

								<div class="col-md-2">
									<div class="form-group">

										<div class="button-group">
											Nama PIC
											<!-- Basic dropdown -->
											<button class="btn btn-primary dropdown-toggle mr-4" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-users fa-2x "></span></button>

											<div class="dropdown-menu" style=" height: auto; max-height: 200px; overflow-x: hidden;">
												<?php
												foreach ($pics as $key => $value) {
												?>
													<a class="dropdown-item">
														<!-- Default unchecked -->
														<div class="custom-control custom-checkbox" data-value="<?= $value["user_id"] ?>">
															<input type="checkbox" class="custom-control-input" value="<?= $value["user_id"] ?>" name="pic[]">
															<img src="<?php echo base_url("assets/template/img/crew/" . $value['foto']) ?>" title="<?= $value['nama'] ?>" class="img-fluid rounded" width="10%">
															<label class="custom-control-label" for="checkbox1"><?= $value["nama"] ?></label>
														</div>
													</a>
												<?php
												}
												?>
											</div>
										</div>
									</div>
								</div>


								<div class="col-md-6">
									<div class="row">
										<div class="col-md-5">
											<div class="row">
												<label>Tanggal Mulai:</label>
												<input type="date" class="form-control" name="start_date">
											</div>
										</div>
										<div class="col-md-1">
										</div>
										<div class="col-md-5">
											<div class="row">
												<label>Tanggal Akhir:</label>
												<input type="date" class="form-control" name="end_date">
											</div>
										</div>
										<div class="col-md-1">
											<label>&nbsp</label><br />

										</div>

									</div>
								</div>




								<div class="col-md-4">
									<label>Search</label><br />
									<div class="row">
										<div class="col-md-7">
											<input type="text" class="form-control" name="search"> </input>
										</div>
										<div class="col-md-4">
											<button class="btn btn-success"><span class="fa fa-filter"> </span> Filter</button>
										</div>

										<div class="col-md-1">
										</div>
									</div>
								</div>
							</div>
					</div>
					</form>
					<div class="row">
						<div class="col-md-12 text-center">
							<button class="btn btn-primary fa-sm" style="" data-toggle="modal" data-target="#modal_tambah_tugas"><i class="fa fa-plus-circle"> Tambah Tugas</i></button>
							<!-- <button class="btn btn-warning fa-sm" style="" data-toggle="modal" data-target="#modal_tambah_kategori"><i class="fa fa-plus-circle"> Tambah Kategori</i></button> -->
							<button class="btn btn-warning fa-sm " style="" data-toggle="modal" data-target="#modal_print_laporan"><i class="fa fa-print"> Print Laporan</i></button>
						</div>
					</div>
				</div>




			</div>

			<!-- Modal tambah tugas ----------------------------- -->
			<div id="modal_tambah_tugas" class="modal fade " role="dialog">
				<div class="modal-dialog modal-lg ">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header" style="background:#007bff; ">
							<h4 class="modal-title" style="color:white">Tambah Tugas</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>

						</div>
						<form action="<?= base_url('index.php/task/tambah_task_baru/') ?>" method="POST" enctype="multipart/form-data">
							<div class="modal-body biru-langit" style="">
								<div class="form-group ">
									<div class="row">
										<div class="col-md-6">
											<label><b>Sasaran Kegiatan :</b></label> &nbsp;&nbsp;
											<select id="id_sasaran_kegiatan" name="id_sasaran_kegiatan" class="form-control" style="height:2.5rem">
												<option disabled selected value> -- Pilih Sasaran Kegiatan -- </option>
												<?php
												foreach ($sasaranKegiatans as $sasaranKegiatan) {
												?>
													<option value="<?= $sasaranKegiatan["id_sasaran_kegiatan"] ?>"><?= $sasaranKegiatan["nama_sasaran_kegiatan"] ?></option>
												<?php
												}
												?>
											</select>
										</div>
										<div class="col-md-6">
											<label><b>indikator kinerja:</b></label> &nbsp;&nbsp;
											<select id="id_indikator_kinerja" name="id_indikator_kinerja" class="form-control" style="height:2.5rem">
												<option disabled selected value> -- Pilih Indikator kinerja -- </option>
												<?php
												foreach ($indikatorKinerjas as $indikatorKinerja) {
												?>
													<option value="<?= $indikatorKinerja["id_indikator_kinerja"] ?>" class="indikatorKinerja indikatorKinerjaNo<?= $indikatorKinerja["id_sasaran_kegiatan"] ?>" style="display:none"><?= $indikatorKinerja["nama_indikator_kinerja"] ?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
									<label><b>Nama Tugas:</b></label> &nbsp;&nbsp;
									<input type="text" class="form-control" name="title">
									<label><b>Deskripsi Tugas:</b></label> &nbsp;&nbsp;
									<input type="text" class="form-control" name="description">
									<div class="row">
										<div class="col-md-6">
											<label><b>No ST:</b></label> &nbsp;&nbsp;
											<input type="text" class="form-control" name="no_ST">
										</div>
										<div class="col-md-6">
											<label><b>Lampiran ST:</b></label> &nbsp;&nbsp;
											<input type="file" id="fileST" name="fileST">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label><b>Kategori :</b></label> &nbsp;&nbsp;
											<select id="id_kategori" name="id_kategori" class="form-control" style="height:2.5rem">
												<option disabled selected value> -- Pilih Kategori -- </option>
												<?php
												foreach ($categories as $category) {
												?>
													<option value="<?= $category["id_project"] ?>"><?= $category["project_name"] ?></option>
												<?php
												}
												?>
											</select>
										</div>
										<div class="col-md-6">
											<label><b>Status</b></label>
											<select id="id_status" name="id_status" class="form-control" style="height:2.5rem">

											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label><b>Tanggal Mulai Tugas:</b></label> &nbsp;&nbsp;
												<input type="date" class="form-control" name="start_date">
											</div>
											<div class="col-md-6">
												<label><b>Tanggal Akhir Tugas:</b></label> &nbsp;&nbsp;
												<input type="date" class="form-control" name="end_date">
											</div>
										</div>
									</div>
								</div>

								<div class="form-group ">
									<label>Ditugaskan kepada</label>
									<select name="id_petugas[]" class="form-control" multiple style="height:140px;">
										<?php
										foreach ($users as $user) {
										?>
											<option value="<?= $user["user_id"] ?>"><?= $user["nama"] ?></option>

										<?php
										}
										?>
									</select>
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
			<!-- ------------------------------------ modal end ---------------------------- -->



			<!-- Modal print laporan ----------------------------- -->
			<div id="modal_print_laporan" class="modal fade " role="dialog">
				<div class="modal-dialog modal-lg ">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header" style="background:#007bff; ">
							<h4 class="modal-title" style="color:white">Print Laporan </h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>

						</div>
						<form action="<?= base_url('index.php/taskPrint/cetakLaporan2/') ?>" method="POST" target="_blank">
							<div class="modal-body biru-langit" style="">
								<div class="form-group ">
									<div class="row">
										<div class="col-md-6">
											<label><b>Tanggal Mulai Tugas:</b></label> &nbsp;&nbsp;
											<input type="date" class="form-control" name="start_date">
										</div>
										<div class="col-md-6">
											<label><b>Tanggal Akhir Tugas:</b></label> &nbsp;&nbsp;
											<input type="date" class="form-control" name="end_date">
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer " style="background:#007bff">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
								<input type="submit" class="btn btn-default" value="Print">
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- ------------------------------------ modal print laporan end ---------------------------- -->


			<!-- Modal Cascading ----------------------------- -->
			<div id="modal_show_cascading" class="modal fade " role="dialog">
				<div class="modal-dialog modal-lg ">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header" style="background:#007bff; ">
							<h4 class="modal-title" style="color:white">Cascading </h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>

						</div>
						<form action="<?= base_url('index.php/taskPrint/cetakLaporan2/') ?>" method="POST" target="_blank">
							<div class="modal-body biru-langit" style="">
								<div class="form-group ">
									<div class="row" id="masukanCascadingDisini">
										<div class="col-md-12">
											<div style="background:#d0c86b; padding:10px;">
												<i class="fas fa-dot-circle text-primary"> Sasaran Kegiatan :</i> <br />
												<i class="fas fa-chart-line text-primary"> Indikator kinerja :</i> (Target : ) <br />
											</div>
										</div>
										<div class="col-md-12 text-center">
											<i class="fas fa-arrow-circle-down text-right fa-lg"></i>
										</div>
										<div class="col-md-12" style="padding-left:70px;">
											<div style="background:#d0c86b; padding:10px;">
												<i class="fas fa-dot-circle text-primary"> Sasaran Kegiatan :</i> <br />
												<i class="fas fa-chart-line text-primary"> Indikator kinerja :</i> (Target : ) <br />
											</div>
										</div>
										<div class="col-md-12 text-center">
											<i class="fas fa-arrow-circle-down text-right fa-lg"></i>
										</div>
										<div class="col-md-12" style="padding-left:140px;">
											<div style="background:#d0c86b; padding:10px;">
												<i class="fas fa-dot-circle text-primary"> Sasaran Kegiatan :</i> <br />
												<i class="fas fa-chart-line text-primary"> Indikator kinerja :</i> (Target : ) <br />
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer " style="background:#007bff">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- ------------------------------------ modal Cascading END ---------------------------- -->

			<table class="table table-hover table-bordered table-stripped">
				<thead>
					<th>No</th>
					<th width="20%">Kegiatan</th>
					<th width="30%">Kategori</th>
					<th width="15%">Mulai</th>
					<th width="15%">Selesai</th>
					<th width="15%">PIC</th>
					<th>Keterangan</th>
					<th>Status</th>
					<!-- <th>Aksi</th> -->
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($tasks as $key => $value) {
					?>
						<tr>

							<td rowspan="2" class="text-center"><?php echo $no++; ?></td>
							<td><a href="<?= base_url("index.php/task/proyek/" . $value["id_project"]) ?>" style="font-weight:normal">
									<?= $value['title'] ?></a>
							</td>
							<td><i class="fas fa-dot-circle text-primary"> Sasaran Kegiatan :</i> <?= $value["nama_sasaran_kegiatan"]; ?> <br />
								<i class="fas fa-chart-line text-primary"> Indikator kinerja :</i> <?= $value["nama_indikator_kinerja"]; ?> <br />
								<i class="fas fa-bullseye text-primary"> Target :</i> <?= $value["target"]; ?> <br />
								<i class="fas fa-poll text-primary"> Realisasi :</i> <?= $value["realisasi"]; ?> <br />
								<i class="fas fa-tasks text-primary"> Kategori :</i>
								<a href="<?= base_url("index.php/task/proyek/" . $value["id_project"]) ?>" style="font-weight:normal">
									<?= $value["project_name"] ?>
								</a><br/>
								<a href="#" class="btn btn-info btn-sm showCascading" idIndikatorKinerja="<?=$value["id_indikator_kinerja"]?>"><i class="fas fa-share-alt "></i> Show Cascading</a>
							</td>
							<td><i class="fas fa-calendar-plus  text-primary"></i> <?= date('d/m/Y', strtotime($value['start_date'])) ?></td>
							<td><i class="fas fa-calendar-check  text-primary"></i> <?= date('d/m/Y', strtotime($value['end_date'])) ?></td>
							<td>
								<?php
								$photopro = "";
								$users = $this->task_model->getUserTaskDetail($value["id_task_detail"]);
								if ($users) {
									foreach ($users as $ukey => $uvalue) {
								?>
										<img src="<?php echo base_url("assets/template/img/crew/" . $uvalue['foto']) ?>" title="<?= $uvalue['nama'] ?>" class="img-fluid rounded" width="30%">
								<?php
										$photopro = base_url("assets/template/img/crew/" . $uvalue['foto']);
									}
								}
								?>
							</td>
							<td class="<?php echo (new DateTime('now') > new DateTime($value['end_date'])) && $value['id_state'] != 3 ? 'table-danger' : '' ?>">
								<i class="fa fa-file-text text-primary" aria-hidden="true"> No ST :</i> <a href="<?= base_url() . $value["link_ST"] ?>" target="_blank"><?= $value["no_ST"]; ?></a><br>
								<i class="fa fa-folder-open text-primary" aria-hidden="true"></i> <br />
								<?php

								$lampirans = $this->task_model->getLampiranTask($value["id_task_detail"]);
								$nolampiran = 1;
								foreach ($lampirans as $ukey => $uvalue) {
									echo "<a href='" . base_url($uvalue['link']) . "'> Lampiran" . $nolampiran++ . "</a>";
								}
								?>

							</td>

							<td rowspan="2" class="<?php echo $value['id_state'] == 1 ? 'table-primary' : '';
													echo $value['id_state'] == 2 ? 'table-warning' : '';
													echo $value['id_state'] == 3 ? 'table-success' : '' ?>"><?= $value['status_name'] ?></td>
						</tr>
						<tr>
							<?php
							$query_komentars = $this->task_model->get_comment($value["id_task_detail"]);
							?>
							<td>
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit_id_<?= $value["id_task_detail"] ?>" data-dismiss="modal"><i class="fas fa-edit"></i> </button>
								<!-- Modal Edit Task ----------------------------- -->
								<div id="modal_edit_id_<?= $value["id_task_detail"] ?>" class="modal fade " role="dialog">
									<div class="modal-dialog modal-lg ">

										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header" style="background:#007bff; ">
												<h4 class="modal-title" style="color:white">Edit Penugasan</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>

											</div>
											<form action="<?= base_url('task/edit_task/' . $value['id_detail']) ?>" method="POST" enctype="multipart/form-data">
												<div class="modal-body biru-langit">
													<div class="row">
														<div class="col-md-6">
															<label><b>Sasaran Kegiatan :</b></label> &nbsp;&nbsp;
															<select name="id_sasaran_kegiatan" class="form-control" style="height:2.5rem" onchange="onchangeSasaran(this, 'id_indikator_kinerja_<?= $value['id_detail'] ?>')">
																<option disabled selected value> -- Pilih Sasaran Kegiatan -- </option>
																<?php
																foreach ($sasaranKegiatans as $sasaranKegiatan) {
																?>
																	<option value="<?= $sasaranKegiatan["id_sasaran_kegiatan"] ?>" <?= $sasaranKegiatan["id_sasaran_kegiatan"] == $value['id_sasaran_kegiatan'] ? 'selected' : '' ?>><?= $sasaranKegiatan["nama_sasaran_kegiatan"] ?></option>
																<?php
																}
																?>
															</select>
														</div>
														<div class="col-md-6">
															<label><b>indikator kinerja:</b></label> &nbsp;&nbsp;
															<select name="id_indikator_kinerja" class="form-control" style="height:2.5rem" id="id_indikator_kinerja_<?= $value['id_detail'] ?>">
																<option disabled selected value> -- Pilih Indikator kinerja -- </option>
																<?php
																foreach ($indikatorKinerjas as $indikatorKinerja) {
																?>
																	<option value="<?= $indikatorKinerja["id_indikator_kinerja"] ?>" class="indikatorKinerja indikatorKinerjaNo<?= $indikatorKinerja["id_sasaran_kegiatan"] ?>" style="display:none"><?= $indikatorKinerja["nama_indikator_kinerja"] ?></option>
																<?php
																}
																?>
															</select>
														</div>
													</div>
													<label><b>Nama Tugas:</b></label> &nbsp;&nbsp;
													<input type="text" class="form-control" name="title" value="<?= $value['title'] ?>">
												</div>
												<div class="modal-footer " style="background:#007bff">
													<button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
													<input type="submit" class="btn btn-default" value="Simpan">
												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- ------------------------------------ modal Edit Task end ---------------------------- -->
								<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-trash-alt"></i></i></button>

							</td>
							<td colspan="5">
								<div class="row">
									<div class="col-md-4">
										<i class="fas fa-comments  text-primary"></i> Komentar (<?= count($query_komentars) ?>)
									</div>
									<div class="col-md-8" style="text-align:right">
										<?php if (count($query_komentars) > 0) { ?>
											<button type="button" class="btn btn-warning btn-sm lihatSemuaKomentar" placeholder="<?= $value["id_task_detail"] ?>"><i class="fas fa-eye"> </i> Lihat Seluruh komentar </button>
										<?php } ?>
										<button type="button" class="btn btn-primary btn-sm tambah-komentar-button" placeholder="<?= $value["id_task_detail"] ?>"><i class="fas fa-plus-circle"> </i> Tambah komentar </button>
									</div>
								</div>
								<div class="row loading-tambah-komentar" style="display:none">
									<div class="col-md-12">
										<p id="loadingResponse"></p>
									</div>
								</div>
								<div class="row tambah-komentar<?= $value["id_task_detail"] ?>" style="display:none">
									<div class="col-md-12">
										<form id="formKomentar<?= $value["id_task_detail"] ?>" method="post" action="contact_me.php">
											<label><b>Tambah Komentar Baru:</b></label> &nbsp;&nbsp;
											<textarea id="textareaKomentar<?= $value["id_task_detail"] ?>" rows="2" class="form-control" name="komentar" style="height:4em;"></textarea>
											<input type="file" id="file<?= $value["id_task_detail"] ?>_attach" name="file_attach[]" multiple />
											<input type="hidden" id="idTask<?= $value["id_task_detail"] ?>_attach" name="id_task_detail" value="<?= $value["id_task_detail"] ?>" />
											<input type="hidden" id="idUser<?= $value["id_task_detail"] ?>_attach" name="id_user" value="<?php echo $this->session->userdata('user_id_iman') ?>" />
											<a class="btn btn-success btn-sm kirim-komentar" placeholder="<?= $value["id_task_detail"] ?>" style="float:right"><i class="fas fa-paper-plane"> </i> Kirim </a>
										</form>
									</div>
								</div>
								<br />
								<div class="kolom-komentar<?= $value["id_task_detail"] ?>">
									<?php
									$i = 1;
									foreach ($query_komentars as $key3 => $komentar) {
									?>

										<div class="row komentarTaskId<?= $value["id_task_detail"] ?>" style="display:none" <?php if ($i > 1) echo 'style="display:none"'; ?>>
											<div class="col-md-1">
												<img src="<?php echo  base_url("assets/template/img/crew/" . $komentar['foto']);; ?>" class="img-fluid rounded-circle">
											</div>
											<div class="col-md-8">
												<p class="media-comment" style="color:black; position: relative; background: #dad1d1; font-size: 12px; border-radius: 7px; padding: 10px">
													<?= date('d/m/Y | H:i', strtotime($komentar['created_at'])) ?> <br />
													<?= $komentar['komentar'] ?>


													<?php
													$data = $this->task_model->get_lampiran_comment($komentar["id_komentar"]);
													if ($data) {
													?>
														<br /><br />Lampiran : <br />
													<?php
													}
													foreach ($data as $key4 => $lampiran) {
														echo '<a href="' . base_url() . $lampiran["link"] . '" target="_blank">' . $lampiran["nama_file"] . '</a><br/>';
													}
													?>
												</p>
											</div>
											<div class="col-md-1">
											</div>
										</div>
									<?php
										$i++;
									}
									?>
								</div>

							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
			</table>
			</table>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>


<?php

function custom_footer()
{
	$ci = &get_instance();
?>
	<script>
		$("#datatable").DataTable({
			"pageLength": 20
		});
	</script>
	<script>
		var options = [];
		$('.tambah-komentar-button').on('click', function(event) {
			var id_task_detail = $(this).attr("placeholder");
			var targetClass = '.tambah-komentar' + id_task_detail;
			$(targetClass).show();
			$(this).hide();
		});

		$("#id_sasaran_kegiatan").change(function() {
			var id_sasaran_kegiatan = $("#id_sasaran_kegiatan").val();
			var id_sasaran_kegiatanNo = ".indikatorKinerjaNo" + id_sasaran_kegiatan;
			$(".indikatorKinerja").hide();
			$("#id_indikator_kinerja").val("");
			$(id_sasaran_kegiatanNo).show();
		});

		function onchangeSasaran(selectedObj, target) {
			var id_sasaran_kegiatan = selectedObj.value;
			var id_sasaran_kegiatanNo = ".indikatorKinerjaNo" + id_sasaran_kegiatan;
			$(".indikatorKinerja").hide();
			$("#" + target).val("");
			$(id_sasaran_kegiatanNo).show();
		}

		$("#id_kategori").change(function() {
			var id_kategori = $('#id_kategori').val();
			$.ajax({
				url: "<?php echo base_url('index.php/task/get_category') ?>",
				type: "POST",
				data: {
					id_project: id_kategori
				},
				success: function(result) {
					var data2 = JSON.parse(result);
					$('#id_status').empty();
					for (var i = 0; i < data2.length; i++) {
						$('#id_status').append($('<option>', {
							value: data2[i].id_status,
							text: data2[i].status_name
						}));
					}
				},
				fail: function(xhr, textStatus, errorThrown) {
					alert('gagal koneksi ke server');
				}
			});
		});

		$( '.showCascading' ).on( 'click', function( event ) {
		  $('#modal_show_cascading').modal('show');
		  var idIndikator = $(this).attr('idIndikatorKinerja');
			$.ajax({ //ajax form submit
				url: "<?php echo base_url('index.php/task/showCascading') ?>",
				type: "POST",
				data: {id_indikator_kinerja: idIndikator},
				dataType: "json",
				success: function(result) {
					$('#masukanCascadingDisini').empty();
					var paddingLength = 10;
					for (var i = result.length-1; i >= 0; i--) {
						if (i != result.length-1){
								$('#masukanCascadingDisini').append(
									`
									<div class="col-md-12 text-center">
										<i class="fas fa-arrow-circle-down text-right fa-lg"></i>
									</div>
									`
								);
						}
						$('#masukanCascadingDisini').append(
							`
									<div class="col-md-12" style="padding-left:`+ paddingLength +`px;">
										<div style="background:#d0c86b; padding:10px;">
											<i class="fas fa-dot-circle text-primary"> Sasaran Kegiatan :</i> `+ result[i]["nama_sasaran_kegiatan"] +` <br />
											<i class="fas fa-chart-line text-primary"> Indikator kinerja :</i> `+ result[i]["nama_indikator_kinerja"] +`<br />
											<i class="fas fa-bullseye text-primary"> Target :</i> `+ result[i]["target"] +` <br />
											<i class="fas fa-poll text-primary"> Realisasi :</i> `+ result[i]["realisasi"] +` <br />

										</div>
									</div>
							`
						);
						paddingLength += 70;
					}

				},
				fail: function(xhr, textStatus, errorThrown) {
					alert('server gagal merespon');
				}
			}).done(function(res) { //fetch server "json" messages when done
				if (res.type == "error") {

				}
				if (res.type == "done") {
				}
			});


		  /*var idSasaranKegiatan = $(this).parent().parent().prev().prev().attr('idSasaranKegiatan');
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
			*/
		});


		$(".lihatSemuaKomentar").click(function() {
			var id_task_detail = $(this).attr("placeholder");
			var targetClass = '.komentarTaskId' + id_task_detail;
			$(targetClass).show();
			$(this).hide();
		});

		$(".kirim-komentar").click(function() {
			var allowed_file_size = "5048576"; //1 MB allowed file size
			var allowed_file_types = ['image/png', 'image/gif', 'image/jpeg', 'image/pjpeg',
				'application/x-zip-compressed', 'application/pdf', 'application/msword',
				'application/vnd.openxmlformats-officedocument.wordprocessingml.document', //docx
				'application/vnd.ms-excel', //xls
				'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', //xlsx
				'application/vnd.ms-powerpoint', //ppt
				'application/vnd.ms-powerpoint', //pps
				'application/vnd.openxmlformats-officedocument.presentationml.presentation', //pptx
				'application/vnd.openxmlformats-officedocument.presentationml.slideshow' //ppsx
			]; //Allowed file types
			var border_color = "#C2C2C2"; //initial input border color
			var maximum_files = 3; //Maximum number of files allowed

			var id_task_detail = $(this).attr("placeholder");
			var idTarget = '#textareaKomentar' + id_task_detail;
			var formKomentar = '#formKomentar' + id_task_detail;
			var idFiles = '#file' + id_task_detail + "_attach";

			var komentar = $(idTarget).val();



			proceed = true;


			//check file size and type before upload, works in all modern browsers
			if (window.File && window.FileReader && window.FileList && window.Blob) {
				var total_files_size = 0;
				if ($(idFiles).get(0).files.length > maximum_files) {
					alert("Can not select more than " + maximum_files + " file(s)");
					proceed = false;
				}

				$($(idFiles).get(0).files).each(function(i, ifile) {
					if (ifile.value !== "") { //continue only if file(s) are selected
						if (allowed_file_types.indexOf(ifile.type) === -1) { //check unsupported file
							alert(ifile.name + " is not allowed!");
							proceed = false;
						}
						total_files_size = total_files_size + ifile.size; //add file size to total size
					}
				});
				if (total_files_size > allowed_file_size) {
					alert("Mohon pastikan lampiran data kurang dari 5 MB!");
					proceed = false;
				}
			}

			var form_data = new FormData($(formKomentar)[0]); //Creates new FormData object

			//if everything's ok, continue with Ajax form submit
			if (proceed) {
				$.ajax({ //ajax form submit
					url: "<?php echo base_url('index.php/task/tambahKomentar') ?>",
					type: "POST",
					beforeSend: function() {
						$('.loading-tambah-komentar').show();
						$('#loadingResponse').text(komentar);
					},
					data: form_data,
					dataType: "json",
					contentType: false,
					cache: false,
					processData: false,
					success: function(result) {
						//var data = $.parseJSON(result);
						//alert(data);
						var lampiranJadi = "";
						for (var i = 0; i < result.length; i++) {
							if (i == 0) {
								lampiranJadi = `<br/><br/>Lampiran :<br/>`
							}
							lampiranJadi += '<a href="<?= base_url() ?>' + result[i]["link"] + '" target="_blank">' + result[i]["nama_file"] + '</a><br>';
						}
						var kolomKomentarId = '.kolom-komentar' + id_task_detail;
						$('.loading-tambah-komentar').hide();
						$('.tambah-komentar' + id_task_detail).hide();
						$('.tambah-komentar-button').show();


						$(kolomKomentarId).prepend(`
	 						<div class='row'>
	 								<div class='col-md-1'>
	 									<img src='` + "<?= base_url("assets/template/img/crew/" . $ci->session->userdata('foto_iman')) ?>" + `' class='img-fluid rounded-circle'>
	 								</div>
	 								<div class='col-md-8'>
	 										<p class='media-comment' style='color:black; position: relative; background: #dad1d1; font-size: 12px; border-radius: 7px; padding: 10px'>
	 											` + $.datepicker.formatDate('dd/mm/yy', new Date()) + `<br/>
	 											` + komentar +
							lampiranJadi +
							`</p>
	 								</div>
	 								<div class='col-md-1'>
	 								</div>
	 						</div>
	 						`);
					},
					fail: function(xhr, textStatus, errorThrown) {
						alert('kirim komentar gagal');
					}
				}).done(function(res) { //fetch server "json" messages when done
					if (res.type == "error") {
						$("#contact_results").html('<div class="error">' + res.text + "</div>");
					}
					if (res.type == "done") {
						$("#contact_results").html('<div class="success">' + res.text + "</div>");
					}
				});
			}
		});

		$('.dropdown-menu div').on('click', function(event) {

			var $target = $(event.currentTarget),
				val = $target.attr('data-value'),
				$inp = $target.find('input'),
				idx;

			if ((idx = options.indexOf(val)) > -1) {
				options.splice(idx, 1);
				setTimeout(function() {
					$inp.prop('checked', false)
				}, 0);
			} else {
				options.push(val);
				setTimeout(function() {
					$inp.prop('checked', true)
				}, 0);
			}

			$(event.target).blur();

			console.log(options);
			return false;
		});
	</script>


<?php
}
?>
